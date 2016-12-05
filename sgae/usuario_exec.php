<?php
include_once("inc/verificasession.php");
include_once("inc/logger/logInit.php");

if ( isset($_REQUEST['act']) && !empty($_REQUEST['act']) ) {
	
	include('inc/config.php');
	$act = $_REQUEST['act'];
	
	# Redirecionamento default:
	$destino = "usuario_list.php?loadCriteria=true";
	
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
        	$lastId = $pdo->lastInsertId();
        	
			$msg = md5(104);
			
			$destino = "usuario_insert.php?msg=".$msg;
			$log->logg($_SERVER['PHP_SELF'].'?act=insert&id='.$lastId,
					   'Inclusão do Usuário: '.$login,
					   'baixa','success'); 


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
			$log->logg($_SERVER['PHP_SELF'].'?act=update&id='.$idusu,
					   'Alteração do Usuário: '.$login,
					   'media','warning'); 

			break;
	
		
		case 'updateSenha':

			$idusu 		 = $_POST['idusu'];
			$login 		 = $_POST['login'];	
			$senhaAtual  = md5($_POST['senhaAtual']);
			$senhaNova	 = md5($_POST['senhaNova']);	
			
    		$stmt = $pdo->prepare("SELECT *
    								 FROM usuario 
									WHERE id=:id
									  AND senha=:senha");	
			$stmt->bindParam(":id", $idusu);
			$stmt->bindParam(":senha", $senhaAtual);			
	     	$stmt->execute();
			
			if ($stmt->rowCount() > 0) {
	        	$stmt = $pdo->prepare("UPDATE usuario 
	        							  SET senha=:senha
										WHERE id=:id");			
				$stmt->bindParam(":senha", $senhaNova);
				$stmt->bindParam(":id", $idusu);
	        	$stmt->execute();
				
				$msg = md5(105);
				$destino = "usuario_edit_senha.php?idusu=".$idusu."&msg=".$msg;
				$log->logg($_SERVER['PHP_SELF'].'?act=update&id='.$idusu,
						   'Alteração de Senha: '.$login,
						   'media','warning'); 
			}
			else {
				$msg = md5(106);
				$destino = "usuario_edit_senha.php?idusu=".$idusu."&msg=".$msg;
			}
			
			break;

			
		case 'delete':		

			$idusu = $_REQUEST['idusu'];
			
			# Se usuário for ADMINISTRADOR, impedir a exclusão!
			if ($idusu == 1) {
				$msg = md5(100);
			}
			else {
				$pdo  = $registry->get('sgaedb');
        		$stmt = $pdo->prepare("SELECT login
        								 FROM usuario 
										WHERE id=:id");	
				$stmt->bindParam(":id", $idusu);
		     	$stmt->execute();
				$result = $stmt->fetchColumn();
				
        		$stmt = $pdo->prepare("UPDATE usuario 
        								  SET inativo=1
										WHERE id=:id");	
				$stmt->bindParam(":id", $idusu);
		     	$stmt->execute();
				$msg = md5(102);
			}
			
			$destino = "usuario_list.php?loadCriteria=true&msg=".$msg;
			$log->logg($_SERVER['PHP_SELF'].'?act=delete&id='.$idusu,
					   'Exclusão do Usuário: '.$result,
					   'alta','danger'); 
	
			break;
		
	
		case 'react':	

			$idusu = $_REQUEST['idusu'];
			$pdo  = $registry->get('sgaedb');
    		$stmt = $pdo->prepare("SELECT login
    								 FROM usuario 
									WHERE id=:id");	
			$stmt->bindParam(":id", $idusu);
	     	$stmt->execute();
			$result = $stmt->fetchColumn();			
			
    		$stmt = $pdo->prepare("UPDATE usuario 
    								  SET inativo=:inativo
									WHERE id=:id");	
			$stmt->bindParam(":id", $idusu);
	     	$stmt->execute();
	     	
			$msg = md5(103);

			$destino = "usuario_list.php?msg=".$msg;
			$log->logg($login,$_SERVER['PHP_SELF'].'?act=react&id='.$idusu,
					   'Reativação do Usuário: '.$result,
					   'media','warning'); 

			break;
			
			
		case 'select':	
			
			$nome    = $_GET['nomeFiltro'];
			$usuario = $_GET['usuarioFiltro'];
			$perfil  = $_GET['perfilFiltro'];
			$status  = $_GET['statusFiltro'];
		    $form_param = array($nome,$usuario,$perfil,$status);
			
			session_start();
			$_SESSION['form_param'] = $form_param;			
			$unidade = $_SESSION['UsuarioUnidade'];			
	        
			$pdo  = $registry->get('sgaedb');
			
			if (empty($nome) && empty($usuario) && empty($perfil)) {
			
				$type 	 = "all"; 
				$p_array = array(':unidade_id'=>$unidade,':inativo'=>$status);
	    		$p_where = "AND usuario.unidade_id 	= :unidade_id
            	            AND usuario.inativo 	= :inativo";	

			} elseif (!empty($nome) && empty($usuario) && empty($perfil)) {
			
				$type 	 = "nome";
				$p_array = array(':unidade_id'=>$unidade,':inativo'=>$status,':nome'=>"%$nome%");
	    		$p_where = "AND usuario.unidade_id 	= :unidade_id
            	            AND usuario.inativo 	= :inativo
            	            AND usuario.nome 	 LIKE :nome";
	    		
			} elseif (empty($nome) && !empty($usuario) && empty($perfil) ) {
			
				$type 	 = "usuario"; 
	    		$p_array = array(':unidade_id'=>$unidade,':inativo'=>$status,':usuario'=>"%$usuario%");
	    		$p_where = "AND usuario.unidade_id 	= :unidade_id
            	            AND usuario.inativo 	= :inativo
            	            AND usuario.login 	 LIKE :usuario";
			
			} elseif (empty($nome) && empty($usuario) && !empty($perfil) ) {			
			
				$type 	 = "perfil";
	    		$p_array = array(':unidade_id'=>$unidade,':inativo'=>$status,':perfil_id'=>$perfil);
	    		$p_where = "AND unidade_id 			= :unidade_id
            	            AND usuario.inativo 	= :inativo
							AND usuario.perfil_id 	= :perfil_id";	
							
			} elseif (!empty($nome) && !empty($usuario) && empty($perfil) ) {			
			
				$type 	 = "nome&usuario";
	    		$p_array = array(':unidade_id'=>$unidade,':inativo'=>$status,':nome'=>"%$nome%",':usuario'=>"%$usuario%");
	    		$p_where = "AND unidade_id 			= :unidade_id
	    					AND usuario.inativo 	= :inativo
            	            AND usuario.nome 	 LIKE :nome
            	            AND usuario.login 	 LIKE :usuario";				 
			
			} elseif (!empty($nome) && empty($usuario) && !empty($perfil) ) {	
			
				$type 	 = "nome&perfil";
	    		$p_array = array(':unidade_id'=>$unidade,':inativo'=>$status,':nome'=>"%$nome%",':perfil_id'=>$perfil);
	    		$p_where = "AND unidade_id 			= :unidade_id
	    					AND usuario.inativo 	= :inativo
            	            AND usuario.nome 	 LIKE :nome
            	            AND usuario.perfil_id 	= :perfil_id";					 
	    		
			} elseif (empty($nome) && !empty($usuario) && !empty($perfil) ) {			
			
				$type 	 = "usuario&perfil";
				$p_array = array(':unidade_id'=>$unidade,':inativo'=>$status,':usuario'=>"%$usuario%",':perfil_id'=>$perfil);
	    		$p_where = "AND unidade_id 			= :unidade_id
	    					AND usuario.inativo 	= :inativo
            	            AND usuario.login 	 LIKE :usuario 
            	            AND usuario.perfil_id 	= :perfil_id"; 
							
			} elseif (!empty($nome) && !empty($usuario) && !empty($perfil) ) {			
			
				$type 	 = "nome&usuario&perfil";
				$p_array = array(':unidade_id'=>$unidade,':inativo'=>$status,':nome'=>"%$nome%",':usuario'=>"%$usuario%",':perfil_id'=>$perfil);
	    		$p_where = "AND unidade_id 			= :unidade_id
	    					AND usuario.inativo 	= :inativo
	    					AND usuario.nome 	 LIKE :nome
            	            AND usuario.login 	 LIKE :usuario 
            	            AND usuario.perfil_id 	= :perfil_id"; 

			}

			$sql = "SELECT usuario.id,usuario.nome,usuario.login,usuario.email,perfil.tipo,unidade.nomefantasia".
            	   "  FROM usuario, perfil, unidade ".
            	   " WHERE usuario.perfil_id  = perfil.id ". 
            	   "   AND usuario.unidade_id = unidade.id ". 
            	   	   $p_where.
				   " ORDER BY usuario.nome ASC";

			$stmt = $pdo->prepare($sql);		
			$stmt->execute($p_array);			
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