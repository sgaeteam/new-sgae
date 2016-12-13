<?php

if (!empty($_POST['cnpj']) && !empty($_POST['user2']) && !empty($_POST['senha']) ) {
	$userb = $_POST['user2'];
	$senha = md5($_POST['senha']);
	$cnpj = str_replace(array(".","/","-"), "", $_POST['cnpj']);

	include_once("sgae/inc/config.php");
    $pdo = $registry->get('sgaedb');
	$stmt = $pdo->prepare("SELECT * FROM usuario 
							WHERE login = :userb 
							   && senha = :senha 
							   && unidade_id = (SELECT id FROM unidade WHERE cnpj = :cnpj)
							  AND inativo = 0");
	$stmt->bindParam(':userb', $userb);
	$stmt->bindParam(':senha', $senha);
	$stmt->bindParam(':cnpj', $cnpj);
	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if ($stmt->rowCount() > 0) {
		
		session_start();
		
		// Se o acesso veio da tela bloqueada, encaminhar para o index sem preenchimento da sessao
		
		if (isset($_SESSION['login']) && $_SESSION['login'] == "lock") {
			$_SESSION['login'] = 'ok';
			header('Window-target: _self');
			header("location: sgae/index.php");
			exit;
		}
		else {
		
			// Se o acesso veio da tela de login, encaminhar para o index com preenchimento da sessao
			
			$user2 = $result;
			$stmt = $pdo->prepare("SELECT nomefantasia, plano_id FROM unidade WHERE cnpj = :cnpj");
			$stmt->bindParam(':cnpj', $cnpj);
			$stmt->execute();
			$unidadeLogada = $stmt->fetch(PDO::FETCH_ASSOC);
	
			$_SESSION['login'] 		    = 'ok';
			$_SESSION['UsuarioID']	    = $user2['id'];		
			$_SESSION['UsuarioLogin']   = $user2['login'];
			$_SESSION['UsuarioNome']    = $user2['nome'];		
			$_SESSION['UsuarioPerfil']  = $user2['perfil_id'];
			$_SESSION['UsuarioUnidade'] = $user2['unidade_id'];
			$_SESSION['UnidadeCNPJ']	= $_POST['cnpj'];
			$_SESSION['UnidadeNome']	= $unidadeLogada['nomefantasia'];
			$_SESSION['UnidadePlano']	= $unidadeLogada['plano_id'];
	
			echo utf8_encode("ok");
		}
	} 
	else {
		$msg = utf8_encode('Usu&aacute;rio ou senha inv&aacute;lida');
	}
}
else {
	$msg = utf8_encode('Preencha os dados do formul&aacute;rio corretamente');
}
echo $msg;
?>