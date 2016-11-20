<?php
include_once("inc/verificasession.php");
include_once("inc/logger/logInit.php");

if ( isset($_REQUEST['act']) && !empty($_REQUEST['act']) ) {
	
	$act = $_REQUEST['act'];
	
	# Redirecionamento default:
	$destino = "perfil_list.php?loadCriteria=true";
	
	switch ($act) { 

		case 'insert':

			$tipo  				= $_POST['tipo'];	
			$descricao			= $_POST['descricao'];	
			$sigla  			= $_POST['sigla'];	
			$inativo			= $_POST['status'];			
			
            $pdo  = $registry->get('sgaedb');
        	$stmt = $pdo->prepare("INSERT INTO perfil (tipo,descricao,sigla,inativo)
								   VALUES (:tipo,:descricao,:sigla,:inativo)"); 
			$stmt->bindParam(":tipo", $tipo);
			$stmt->bindParam(":descricao", $descricao);
			$stmt->bindParam(":sigla", $sigla);
			$stmt->bindParam(":inativo", $inativo);
        	$stmt->execute();
        	$lastId = $pdo->lastInsertId();
        	
			$msg = md5(224);
			
			$destino = "perfil_insert.php?msg=".$msg;
			$log->logg($_SERVER['PHP_SELF'].'?act=insert&id='.$lastId,
					   'Inclusão do Perfil: '.$tipo,
					   'baixa','success'); 


			break;
		
	
		case 'update':

			$idusu 				= $_POST['idusu'];
			$tipo  				= $_POST['tipo'];	
			$descricao			= $_POST['descricao'];	
			$sigla  			= $_POST['sigla'];	
			$inativo			= $_POST['status'];
			
			$pdo  = $registry->get('sgaedb');
        	$stmt = $pdo->prepare("UPDATE perfil 
        							  SET tipo=:tipo,
        								  descricao=:descricao,
        								  sigla=:sigla,
										  inativo=:inativo
									WHERE id=:id");	
			$stmt->bindParam(":tipo", $tipo);
			$stmt->bindParam(":descricao", $descricao);
			$stmt->bindParam(":sigla", $sigla);
			$stmt->bindParam(":inativo", $inativo);
			$stmt->bindParam(":id", $idusu);
        	$stmt->execute();
			
			$msg = md5(221);
			
			$destino = "perfil_edit.php?idusu=".$idusu."&msg=".$msg;
			$log->logg($_SERVER['PHP_SELF'].'?act=update&id='.$idusu,
					   'Alteração do Perfil: '.$tipo,
					   'media','warning'); 


			break;
		

		case 'delete':		

			$idusu = $_REQUEST['idusu'];
			
			$pdo  = $registry->get('sgaedb');
    		$stmt = $pdo->prepare("SELECT tipo
    								 FROM perfil 
									WHERE id=:id");	
			$stmt->bindParam(":id", $idusu);
	     	$stmt->execute();
			$result = $stmt->fetchColumn();
			
    		$stmt = $pdo->prepare("UPDATE perfil 
    								  SET inativo=1
									WHERE id=:id");	
			$stmt->bindParam(":id", $idusu);
	     	$stmt->execute();
			$msg = md5(222);
			
			$destino = "perfil_list.php?loadCriteria=true&msg=".$msg;
			$log->logg($_SERVER['PHP_SELF'].'?act=delete&id='.$idusu,
					   'Exclusão do Perfil: '.$result,
					   'alta','danger'); 
	
			break;
		
	
		case 'react':	

			$idusu = $_REQUEST['idusu'];
			$pdo  = $registry->get('sgaedb');
    		$stmt = $pdo->prepare("SELECT tipo
    								 FROM perfil 
									WHERE id=:id");	
			$stmt->bindParam(":id", $idusu);
	     	$stmt->execute();
			$result = $stmt->fetchColumn();			
			
    		$stmt = $pdo->prepare("UPDATE perfil 
    								  SET inativo=:inativo
									WHERE id=:id");	
			$stmt->bindParam(":id", $idusu);
	     	$stmt->execute();
	     	
			$msg = md5(223);

			$destino = "perfil_list.php?msg=".$msg;
			$log->logg($login,$_SERVER['PHP_SELF'].'?act=react&id='.$idusu,
					   'Reativação do Perfil: '.$result,
					   'media','warning'); 

			break;
			
			
		case 'select':	
			
			$tipo    = $_GET['nomeFiltro'];
			$status  = $_GET['statusFiltro'];
		    $form_param = array($tipo,$status);
			session_start();
			$_SESSION['form_param']	 = $form_param;
	        
			$pdo  = $registry->get('sgaedb');
			
			if (empty($tipo)) {
			
				$type 	 = "all"; 
				$p_array = array(':inativo'=>$status);
	    		$p_where = " perfil.inativo = :inativo";	

			} elseif (!empty($tipo)) {
			
				$type 	 = "tipo";
				$p_array = array(':inativo'=>$status,':tipo'=>"%$tipo%");
	    		$p_where = " perfil.inativo 	= :inativo
            	             AND perfil.tipo LIKE :tipo";
	    		
			}

			$sql = "SELECT perfil.tipo, 
						   case 
							  when inativo = 0 then 'Ativo'
							  when inativo = 1 then 'Inativo'
						   end as inativo,
						   perfil.descricao,
						   perfil.sigla,
						   perfil.id".
            	   "  FROM perfil ".
            	   " WHERE ". 
            	   	   $p_where.
				   " ORDER BY perfil.tipo ASC";

			$stmt = $pdo->prepare($sql);		
			$stmt->execute($p_array);			
			$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($stmt->rowCount() > 0) {
            	
                foreach ($results as $result) {	
					
            		$return[] = array($result['tipo'],
					            	  $result['descricao'],
					            	  $result['sigla'],
            						  $result['inativo'],
            						  $result['id']);
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