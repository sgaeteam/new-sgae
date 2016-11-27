<?php
include_once("inc/verificasession.php");
include_once("inc/logger/logInit.php");

if ( isset($_REQUEST['act']) && !empty($_REQUEST['act']) ) {
	
	$act = $_REQUEST['act'];
	
	# Redirecionamento default:
	$destino = "acesso_list.php?loadCriteria=true";
	
	switch ($act) { 

		case 'insert':

			$plano   = $_POST['plano'];	
			$perfil  = $_POST['perfil'];	
			$paginas = $_POST['paginas'];
			
		    if (empty($plano) || empty($perfil) || empty($paginas)) {
		    	
		    	$msg = md5(002);
				$destino = "acesso_insert.php?msg=".$msg;
				
			} 
			else {
				
			    $N = count($paginas);
			    $pdo  = $registry->get('sgaedb');

			    for($i=0; $i < $N; $i++) {
			    
					$pagina = $paginas[$i];
					
					// Evitando inserção em duplicidade:
		        	$stmt = $pdo->prepare("SELECT acesso_pagina.id, acesso_pagina.inativo 
		        							 FROM acesso_pagina 
		        							WHERE acesso_pagina.plano_id = :plano_id
											  AND acesso_pagina.perfil_id = :perfil_id 
											  AND acesso_pagina.pagina_id = :pagina_id"); 
					$stmt->bindParam(":plano_id", $plano);
					$stmt->bindParam(":perfil_id", $perfil);					
					$stmt->bindParam(":pagina_id", $pagina);
		        	$stmt->execute();
		        	$result = $stmt->fetch(PDO::FETCH_ASSOC);
		        	$idUpdate = $result['id'];
		        	$inativo = $result['inativo'];
					
					if ($stmt->rowCount() == 0) { 
						
			        	$stmt = $pdo->prepare("INSERT INTO acesso_pagina (plano_id,perfil_id,pagina_id)
											   VALUES (:plano_id,:perfil_id,:pagina_id)"); 
						$stmt->bindParam(":plano_id", $plano);
						$stmt->bindParam(":perfil_id", $perfil);					
						$stmt->bindParam(":pagina_id", $pagina);
			        	$stmt->execute();
			        	$lastId = $pdo->lastInsertId();
			        	
    	        		$stmt = $pdo->prepare("SELECT plano.nome AS pl_nome,
						            				  perfil.tipo AS pr_tipo,
						            				  pagina.nome AS pag_nome
										         FROM acesso_pagina,plano,perfil,pagina
										        WHERE acesso_pagina.plano_id = plano.id
											      AND acesso_pagina.perfil_id = perfil.id
											      AND acesso_pagina.pagina_id = pagina.id
											      AND acesso_pagina.id = :id");
						$stmt->bindParam(":id", $lastId);
				     	$stmt->execute();
						$item = $stmt->fetch(PDO::FETCH_ASSOC);
			        	
						$log->logg($_SERVER['PHP_SELF'].'?act=insert&id='.$lastId,
								   'Inclusão do Acesso: '.$item['pl_nome']." | ".$item['pr_tipo']." | ".$item['pag_nome'],
								   'baixa','success'); 
								   
					}
					else {
						
						if ($inativo == 1) {
							
				    		$stmt = $pdo->prepare("UPDATE acesso_pagina 
				    								  SET inativo=0
													WHERE acesso_pagina.plano_id = :plano_id
													  AND acesso_pagina.perfil_id = :perfil_id 
													  AND acesso_pagina.pagina_id = :pagina_id");	
							$stmt->bindParam(":plano_id", $plano);
							$stmt->bindParam(":perfil_id", $perfil);					
							$stmt->bindParam(":pagina_id", $pagina);
				        	$stmt->execute();	
				        	
	    	        		$stmt = $pdo->prepare("SELECT plano.nome AS pl_nome,
							            				  perfil.tipo AS pr_tipo,
							            				  pagina.nome AS pag_nome
											         FROM acesso_pagina,plano,perfil,pagina
											        WHERE acesso_pagina.plano_id = plano.id
												      AND acesso_pagina.perfil_id = perfil.id
												      AND acesso_pagina.pagina_id = pagina.id
												      AND acesso_pagina.id = :id");
							$stmt->bindParam(":id", $idUpdate);
					     	$stmt->execute();
							$item = $stmt->fetch(PDO::FETCH_ASSOC);
				        	
							$log->logg($_SERVER['PHP_SELF'].'?act=insert&id='.$idUpdate,
									   'Inclusão do Acesso: '.$item['pl_nome']." | ".$item['pr_tipo']." | ".$item['pag_nome'],
									   'baixa','success'); 			        	
						}
					}	
				}
										
				$msg = md5(206);
				$destino = "acesso_insert.php?msg=".$msg;
			}
			
			break;
		

		case 'delete':		

			$idusu = $_REQUEST['idusu'];
			
			$pdo  = $registry->get('sgaedb');
    		$stmt = $pdo->prepare("UPDATE acesso_pagina 
    								  SET inativo=1
									WHERE id=:id");	
			$stmt->bindParam(":id", $idusu);
	     	$stmt->execute();
	     	
			$msg = md5(205);
			$destino = "acesso_list.php?loadCriteria=true&msg=".$msg;

    		$stmt = $pdo->prepare("SELECT plano.nome AS pl_nome,
			            				  perfil.tipo AS pr_tipo,
			            				  pagina.nome AS pag_nome
							         FROM acesso_pagina,plano,perfil,pagina
							        WHERE acesso_pagina.plano_id = plano.id
								      AND acesso_pagina.perfil_id = perfil.id
								      AND acesso_pagina.pagina_id = pagina.id
								      AND acesso_pagina.id = :id");
			$stmt->bindParam(":id", $idusu);
	     	$stmt->execute();
			$item = $stmt->fetch(PDO::FETCH_ASSOC);

			$log->logg($_SERVER['PHP_SELF'].'?act=delete&id='.$idusu,
					   'Exclusão do Acesso: '.$item['pl_nome']." | ".$item['pr_tipo']." | ".$item['pag_nome'],
					   'alta','danger'); 
	
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