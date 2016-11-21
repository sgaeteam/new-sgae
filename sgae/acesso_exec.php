<?php
include_once("inc/verificasession.php");
include_once("inc/logger/logInit.php");

if ( isset($_REQUEST['act']) && !empty($_REQUEST['act']) ) {
	
	$act = $_REQUEST['act'];
	
	# Redirecionamento default:
	$destino = "acesso_list.php?loadCriteria=true";
	
	switch ($act) { 

		case 'insert':

			$nome  	 = $_POST['nome'];	
			$inativo = $_POST['status'];			
			
            $pdo  = $registry->get('sgaedb');
        	$stmt = $pdo->prepare("INSERT INTO pagina (nome,inativo)
								   VALUES (:nome,:inativo)"); 
			$stmt->bindParam(":nome", $nome);
			$stmt->bindParam(":inativo", $inativo);
        	$stmt->execute();
        	$lastId = $pdo->lastInsertId();
        	
			$msg = md5(204);
			
			$destino = "pagina_insert.php?msg=".$msg;
			$log->logg($_SERVER['PHP_SELF'].'?act=insert&id='.$lastId,
					   'Inclusão da Página: '.$nome,
					   'baixa','success'); 


			break;
		
	
		case 'update':

			$idusu 	 = $_POST['idusu'];
			$nome  	 = $_POST['nome'];			
			$inativo = $_POST['status'];
			
			$pdo  = $registry->get('sgaedb');
        	$stmt = $pdo->prepare("UPDATE pagina 
        							  SET nome=:nome,
										  inativo=:inativo
									WHERE id=:id");	
			$stmt->bindParam(":nome", $nome);
			$stmt->bindParam(":inativo", $inativo);
			$stmt->bindParam(":id", $idusu);
        	$stmt->execute();
			
			$msg = md5(201);
			
			$destino = "pagina_edit.php?idusu=".$idusu."&msg=".$msg;
			$log->logg($_SERVER['PHP_SELF'].'?act=update&id='.$idusu,
					   'Alteração da Página: '.$nome,
					   'media','warning'); 


			break;
		

		case 'delete':		

			$idusu = $_REQUEST['idusu'];
			
			$pdo  = $registry->get('sgaedb');
    		$stmt = $pdo->prepare("SELECT nome
    								 FROM pagina 
									WHERE id=:id");	
			$stmt->bindParam(":id", $idusu);
	     	$stmt->execute();
			$result = $stmt->fetchColumn();
			
    		$stmt = $pdo->prepare("UPDATE pagina 
    								  SET inativo=1
									WHERE id=:id");	
			$stmt->bindParam(":id", $idusu);
	     	$stmt->execute();
			$msg = md5(202);
			
			$destino = "pagina_list.php?loadCriteria=true&msg=".$msg;
			$log->logg($_SERVER['PHP_SELF'].'?act=delete&id='.$idusu,
					   'Exclusão da Página: '.$result,
					   'alta','danger'); 
	
			break;
		
	
		case 'react':	

			$idusu = $_REQUEST['idusu'];
			$pdo  = $registry->get('sgaedb');
    		$stmt = $pdo->prepare("SELECT nome
    								 FROM pagina 
									WHERE id=:id");	
			$stmt->bindParam(":id", $idusu);
	     	$stmt->execute();
			$result = $stmt->fetchColumn();			
			
    		$stmt = $pdo->prepare("UPDATE pagina 
    								  SET inativo=:inativo
									WHERE id=:id");	
			$stmt->bindParam(":id", $idusu);
	     	$stmt->execute();
	     	
			$msg = md5(203);

			$destino = "pagina_list.php?msg=".$msg;
			$log->logg($login,$_SERVER['PHP_SELF'].'?act=react&id='.$idusu,
					   'Reativação da Página: '.$result,
					   'media','warning'); 

			break;
			
			
		case 'select':	
			
			$plano   = $_GET['planoFiltro'];
			$perfil  = $_GET['perfilFiltro'];			
			$status  = $_GET['statusFiltro'];
		    $form_param = array($plano,$perfil,$status);
			session_start();
			$_SESSION['form_param']	 = $form_param;
	        
			$pdo  = $registry->get('sgaedb');
			
			if (empty($plano) && empty($perfil)) {
			
				$type 	 = "all"; 
				$p_array = array(':inativo'=>$status);
	    		$p_where = " acesso_pagina.inativo = :inativo";	
			
				
			} elseif (!empty($plano) && empty($perfil)) {			
			
				$type 	 = "plano";
	    		$p_array = array(':plano_id'=>$plano,':inativo'=>$status);
	    		$p_where = " acesso_pagina.inativo = :inativo
							AND acesso_pagina.plano_id = :plano_id";
							
			} elseif (empty($plano) && !empty($perfil)) {			
			
				$type 	 = "perfil";
	    		$p_array = array(':perfil_id'=>$perfil,':inativo'=>$status);
	    		$p_where = " acesso_pagina.inativo = :inativo
							AND acesso_pagina.perfil_id = :perfil_id";
	    		
			} elseif (!empty($plano) && !empty($perfil)) {			
			
				$type 	 = "plano&perfil";
	    		$p_array = array(':plano_id'=>$plano,':perfil_id'=>$perfil,':inativo'=>$status);
	    		$p_where = " acesso_pagina.inativo = :inativo
							AND acesso_pagina.plano_id = :plano_id
							AND acesso_pagina.perfil_id = :perfil_id";
			}			
				   
			$sql =  "SELECT acesso_pagina.id AS aep_id,
							acesso_pagina.inativo AS aep_inativo,
            				plano.nome AS pl_nome,
            				perfil.tipo AS pr_tipo,
            				pagina.nome AS pag_nome".
				    "  FROM acesso_pagina,plano,perfil,pagina ".
				    " WHERE acesso_pagina.plano_id = plano.id ".
					"   AND acesso_pagina.perfil_id = perfil.id ".
					"   AND acesso_pagina.pagina_id = pagina.id ".
					"   AND ".$p_where.
					" ORDER BY plano.nome ASC, perfil.tipo ASC, pagina.nome ASC";

			$stmt = $pdo->prepare($sql);		
			$stmt->execute($p_array);			
			$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($stmt->rowCount() > 0) {
            	
                foreach ($results as $result) {	
					
            		$return[] = array($result['aep_id'],
            						  $result['aep_inativo'],
					            	  $result['pl_nome'],
					            	  $result['pr_tipo'],
					            	  $result['pag_nome']);
                }

                echo json_encode($return);	                            

            }
			else { 
            	
            	echo json_encode(null);
				  
			}
			
			break;
	}
}

if ($act <> 'select') {

	header("location: $destino");
	
}
?>