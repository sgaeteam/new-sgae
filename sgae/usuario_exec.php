<?php
include_once("inc/verificasession.php");

if ( isset($_REQUEST['act']) && !empty($_REQUEST['act']) ) {
	
	include('inc/config.php');
	$act = $_REQUEST['act'];
	
	# Redirecionamento default:
	$destino = "usuario_list.php";
	
	switch ($act) { 

		case 'insert':

			$login 	 = $_POST['login'];
			$nome  	 = $_POST['nome'];	
			//$senha 	 = md5($_POST['senha']);
			$senha 	 = md5("12345");
			$email	 = $_POST['email'];	
			$perfil  = $_POST['perfil'];		
			$unidade = $_POST['unidade'];			
			$inativo = $_POST['status'];			
			
            $pdo  = $registry->get('sgaedb');
        	$stmt = $pdo->prepare("INSERT INTO usuario (login,nome,senha,email,perfil_id,unidade_id,inativo)
								   VALUES (:login,:nome,:senha,:email,:perfil,:unidade,:inativo)"); 
			$stmt->bindParam(":login", $login);
			$stmt->bindParam(":nome", $nome);
			$stmt->bindParam(":senha", $senha);
			$stmt->bindParam(":email", $email);
			$stmt->bindParam(":perfil", $perfil);
			$stmt->bindParam(":unidade", $unidade);
			$stmt->bindParam(":inativo", $inativo);
        	$stmt->execute();
        	
			$msg = md5(104);
			
			$destino = "usuario_insert.php?msg=".$msg;

			break;
		
	
		case 'update':

			$idusu 	 = $_POST['idusu'];
			$login 	 = $_POST['login'];
			$nome  	 = $_POST['nome'];	
			$senha 	 = $_POST['senha'];
			$email	 = $_POST['email'];	
			$perfil  = $_POST['perfil'];		
			$unidade = $_POST['unidade'];			
			$inativo = $_POST['status'];
			
			$pdo  = $registry->get('sgaedb');
        	$stmt = $pdo->prepare("UPDATE usuario 
        							  SET login=:login,
										  nome=:nome,
										  senha=:senha,
										  email=:email,
										  perfil_id=:perfil,
										  unidade_id=:unidade,
										  inativo=:inativo
									WHERE id=:id");			
			$stmt->bindParam(":login", $login);
			$stmt->bindParam(":nome", $nome);
			$stmt->bindParam(":senha", $senha);
			$stmt->bindParam(":email", $email);
			$stmt->bindParam(":perfil", $perfil);
			$stmt->bindParam(":unidade", $unidade);
			$stmt->bindParam(":inativo", $inativo);
			$stmt->bindParam(":id", $idusu);
        	$stmt->execute();
			
			$msg = md5(101);
			
			$destino = "usuario_edit.php?idusu=".$idusu."&msg=".$msg;

			break;
		

		case 'delete':		

			$idusu = $_REQUEST['idusu'];
			
			if ($idusu == 1) {
				$msg = md5(100);
			}
			else {
				$pdo  = $registry->get('sgaedb');
        		$stmt = $pdo->prepare("UPDATE usuario 
        								  SET inativo=1
										WHERE id=:id");	
				$stmt->bindParam(":id", $idusu);
		     	$stmt->execute();
				$msg = md5(102);
			}
			
			$destino = "usuario_list.php?msg=".$msg;
	
			break;
		
	
		case 'react':	

			$idusu = $_REQUEST['idusu'];
			$pdo  = $registry->get('sgaedb');
    		$stmt = $pdo->prepare("UPDATE usuario 
    								  SET inativo=:inativo
									WHERE id=:id");	
			$stmt->bindParam(":id", $idusu);
	     	$stmt->execute();
	     	
			$msg = md5(103);

			$destino = "usuario_list.php?msg=".$msg;

			break;
			
			
		case 'select':	
			
			$nome    = $_GET['nomeFiltro'];
			$usuario = $_GET['usuarioFiltro'];
			$perfil  = $_GET['perfilFiltro'];
			$status  = $_GET['statusFiltro'];
			$unidade = $_SESSION['UsuarioUnidade'];

			$pdo  = $registry->get('sgaedb');
			
			if (empty($nome) && empty($usuario) && empty($perfil)) {
			
				$type = "all"; 
	    		$stmt = $pdo->prepare("SELECT usuario.id,usuario.nome,usuario.login,usuario.email,perfil.tipo,unidade.nomefantasia
            	                         FROM usuario, perfil, unidade
            	                        WHERE usuario.perfil_id = perfil.id 
            	                          AND usuario.unidade_id = unidade.id 
            	                          AND usuario.unidade_id = :unidade_id
            	                          AND usuario.inativo = :inativo
									   ORDER BY usuario.nome ASC");	
				$stmt->execute(array(':unidade_id'=>$unidade,':inativo'=>$status));	
				
			} elseif (!empty($nome) && empty($usuario) && empty($perfil)) {
			
				$type = "nome"; 
	    		$stmt = $pdo->prepare("SELECT usuario.id,usuario.nome,usuario.login,usuario.email,perfil.tipo,unidade.nomefantasia
            	                         FROM usuario, perfil, unidade
            	                        WHERE usuario.perfil_id = perfil.id 
            	                          AND usuario.unidade_id = unidade.id 
            	                          AND usuario.unidade_id = :unidade_id
            	                          AND usuario.inativo = :inativo
            	                          AND usuario.nome LIKE :nome
									   ORDER BY usuario.nome ASC");
				$stmt->execute(array(':unidade_id'=>$unidade,':inativo'=>$status,':nome'=>"%$nome%"));

			} elseif (empty($nome) && !empty($usuario) && empty($perfil) ) {
			
				$type = "usuario"; 
	    		$stmt = $pdo->prepare("SELECT usuario.id,usuario.nome,usuario.login,usuario.email,perfil.tipo,unidade.nomefantasia
            	                         FROM usuario, perfil, unidade
            	                        WHERE usuario.perfil_id = perfil.id 
            	                          AND usuario.unidade_id = unidade.id 
            	                          AND usuario.unidade_id = :unidade_id
            	                          AND usuario.inativo = :inativo
            	                          AND usuario.login LIKE :usuario
									   ORDER BY usuario.nome ASC");	
				$stmt->execute(array(':unidade_id'=>$unidade,':inativo'=>$status,':usuario'=>"%$usuario%"));	
			
			} elseif (empty($nome) && empty($usuario) && !empty($perfil) ) {			
			
				$type = "perfil"; 
	    		$stmt = $pdo->prepare("SELECT usuario.id,usuario.nome,usuario.login,usuario.email,perfil.tipo,unidade.nomefantasia
            	                         FROM usuario, perfil, unidade
            	                        WHERE usuario.perfil_id = perfil.id 
            	                          AND usuario.unidade_id = unidade.id 
            	                          AND unidade_id = :unidade_id
            	                          AND usuario.inativo = :inativo
										  AND usuario.perfil_id = :perfil_id                 
									   ORDER BY usuario.nome ASC");	
				$stmt->bindParam(":unidade_id", $unidade);
				$stmt->bindParam(":inativo", $status);
				$stmt->bindParam(":perfil_id", $perfil);
				$stmt->execute();
							
			} elseif (!empty($nome) && !empty($usuario) && empty($perfil) ) {			
			
				$type = "nome&usuario"; 
	    		$stmt = $pdo->prepare("SELECT usuario.id,usuario.nome,usuario.login,usuario.email,perfil.tipo,unidade.nomefantasia
            	                         FROM usuario, perfil, unidade
            	                        WHERE usuario.perfil_id = perfil.id 
            	                          AND usuario.unidade_id = unidade.id 
            	                          AND unidade_id = :unidade_id
            	                          AND usuario.inativo = :inativo
            	                          AND usuario.nome LIKE :nome
            	                          AND usuario.login LIKE :usuario       
									   ORDER BY usuario.nome ASC");
				$stmt->execute(array(':unidade_id'=>$unidade,':inativo'=>$status,':nome'=>"%$nome%",':usuario'=>"%$usuario%"));	
			
			} elseif (!empty($nome) && empty($usuario) && !empty($perfil) ) {	
			
				$type = "nome&perfil"; 
	    		$stmt = $pdo->prepare("SELECT usuario.id,usuario.nome,usuario.login,usuario.email,perfil.tipo,unidade.nomefantasia
            	                         FROM usuario, perfil, unidade
            	                        WHERE usuario.perfil_id = perfil.id 
            	                          AND usuario.unidade_id = unidade.id 
            	                          AND unidade_id = :unidade_id
            	                          AND usuario.inativo = :inativo
            	                          AND usuario.nome LIKE :nome
            	                          AND usuario.perfil_id = :perfil_id
									   ORDER BY usuario.nome ASC");
				$stmt->execute(array(':unidade_id'=>$unidade,':inativo'=>$status,':nome'=>"%$nome%",':perfil_id'=>$perfil));	
							
			} elseif (empty($nome) && !empty($usuario) && !empty($perfil) ) {			
			
				$type = "usuario&perfil"; 
	    		$stmt = $pdo->prepare("SELECT usuario.id,usuario.nome,usuario.login,usuario.email,perfil.tipo,unidade.nomefantasia
            	                         FROM usuario, perfil, unidade
            	                        WHERE usuario.perfil_id = perfil.id 
            	                          AND usuario.unidade_id = unidade.id 
            	                          AND unidade_id = :unidade_id
            	                          AND usuario.inativo = :inativo
            	                          AND usuario.login LIKE :usuario 
            	                          AND usuario.perfil_id = :perfil_id 
									   ORDER BY usuario.nome ASC");
				$stmt->execute(array(':unidade_id'=>$unidade,':inativo'=>$status,':usuario'=>"%$usuario%",':perfil_id'=>$perfil));	
							
			} elseif (!empty($nome) && !empty($usuario) && !empty($perfil) ) {			
			
				$type = "nome&usuario&perfil"; 
	    		$stmt = $pdo->prepare("SELECT usuario.id,usuario.nome,usuario.login,usuario.email,perfil.tipo,unidade.nomefantasia
            	                         FROM usuario, perfil, unidade
            	                        WHERE usuario.perfil_id = perfil.id 
            	                          AND usuario.unidade_id = unidade.id 
            	                          AND unidade_id = :unidade_id
            	                          AND usuario.inativo = :inativo
            	                          AND usuario.nome LIKE :nome            	                          
            	                          AND usuario.login LIKE :usuario                        
            	                          AND usuario.perfil_id = :perfil_id 
									   ORDER BY usuario.nome ASC");
				$stmt->execute(array(':unidade_id'=>$unidade,':inativo'=>$status,':nome'=>"%$nome%",':usuario'=>"%$usuario%",':perfil_id'=>$perfil));	
							
			}			
			
			$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($stmt->rowCount() > 0) {
            	
                foreach ($results as $result) {	
					
            		$return[] = array($result['nome'],
            						  $result['login'],
            						  $result['email'],
            						  $result['tipo'],
            						  $result['nomefantasia'],
            						  $result['id']);
                }	                            

            }
			else {
            		$return[] = null;//array('','','','','','');
			}
            	
			echo json_encode($return);
			
			break;
	}
}

if ($act <> 'select') {

	header("location: $destino");
	
}
?>