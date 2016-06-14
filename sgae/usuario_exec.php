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
			$email	 = $_POST['email'];	
			$perfil  = $_POST['perfil'];		
			$unidade = $_POST['unidade'];
			
			$login 	 = $_POST['login'];
			$nome  	 = $_POST['nome'];	
			//$senha 	 = md5($_POST['senha']);
			$senha 	 = md5("12345");
			$email	 = $_POST['email'];	
			$perfil  = $_POST['perfil'];		
			$unidade = $_POST['unidade'];			
			$inativo = $_POST['status'];
			
			$pdo  = $registry->get('sgaedb');
        	$stmt = $pdo->prepare("UPDATE usuario 
        							  SET login=:login,
										  nome=:nome,										  
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
		
	}
}

header("location: $destino");
?>