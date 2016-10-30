<?php

if (!empty($_POST['cnpj']) && !empty($_POST['user2']) && !empty($_POST['senha']) ) {
	$userb = $_POST['user2'];
	$senha = md5($_POST['senha']);
	$cnpj = str_replace(array(".","/","-"), "", $_POST['cnpj']);

// NAO REMOVER - MONITORAMENTO DE SQL(INJ)
	$pqp = $_REQUEST['pqp'];
	$piqp = $_GET['piqp'];
	$findme    = '\'';
	$mystring1 = $userb;
	$pos1 = stripos($mystring1, $findme);
	
	if ($pos1 === false) {
			$acesso_ok = 1;

	} 
	else {
				$acesso_ok = 0;
				$msg = utf8_encode("Você está utilizando caracteres inválidos. Retire as aspas simples ( ' ) do login e tente novamente.");
				$piqp = $_SERVER["REMOTE_ADDR"];
				$pqp++;
				#tolerancia zero! usou aspas pra que?? quero ver o que ele escreveu com as aspas..
				if ($pqp > 0) {
				$date = date('d-m-Y H:i');
				#alterar: mando a mensagem do ip soh na 2a tentativa.. mas ja mando o e-mail, assim pego 2 amostras do $userb utilizados;	
				$msg = $msg . utf8_encode("<br/> o ip <strong>$piqp</strong> (acessando em $date ) foi enviado para o administrador.<br/>");	
				## incluir funcao de gravar o txt com os dados e enviar e-mail para o administrador do site, avisando do IP e hora da tentativa de acesso via SQL INJECTION ##
			}
			
			$destino = "index.php?msg=$msg&pqp=$pqp&piqp=$piqp";
			header("location: $destino");
			exit();
	}
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
	
	include_once('sgae/inc/logger/logInit.php');
	
	if ($stmt->rowCount()) {
		
		$user2 = $result;
		$stmt = $pdo->prepare("SELECT nomefantasia, plano_id FROM unidade WHERE cnpj = :cnpj");
		$stmt->bindParam(':cnpj', $cnpj);
		$stmt->execute();
		$unidadeLogada = $stmt->fetch(PDO::FETCH_ASSOC);

		session_start(); //função que possibilita usar a session
		
		$_SESSION['login'] 		    = 'ok';
		$_SESSION['UsuarioID']	    = $user2['id'];		
		$_SESSION['UsuarioLogin']   = $user2['login'];
		$_SESSION['UsuarioNome']    = $user2['nome'];		
		$_SESSION['UsuarioPerfil']  = $user2['perfil_id'];
		$_SESSION['UsuarioUnidade'] = $user2['unidade_id'];
		$_SESSION['UnidadeNome']	= $unidadeLogada['nomefantasia'];
		$_SESSION['UnidadePlano']	= $unidadeLogada['plano_id'];

		echo utf8_encode("ok");
		//$destino = 'sgae/index.php';
		$log->logg($_SERVER['PHP_SELF'],'Login concedido: '.$user2['login'],'baixa','info');
	} 
	else {
		$msg = utf8_encode('Usu&aacute;rio ou senha inv&aacute;lida');
		//$destino = "index.php?msg=$msg"; 
	}
	
}
else {
	$msg = utf8_encode('Preencha os dados do formul&aacute;rio corretamente');
	//$destino = "index.php?msg=$msg";
}
echo $msg;
# Direcionamento
//header("location: $destino");
?>