<?php

if ( isset($_POST['sub']) && !empty($_POST['cnpj']) && !empty($_POST['user2']) && !empty($_POST['senha']) ) {
	$userb = $_POST['user2'];
	$senha = md5($_POST['senha']);
	//$senha = $_POST['senha'];
	
	$cnpj = str_replace(array(".","/","-"), "", $_POST['cnpj']);

// NAO REMOVER - MONITORAMENTO DE SQL(INJ)
	$pqp = $_REQUEST['pqp'];
	$piqp = $_GET['piqp'];
	
	$findme    = '\'';
	
	$mystring1 = $userb;

	$pos1 = stripos($mystring1, $findme);
	
	if ($pos1 === false) {
			$acesso_ok = 1;

	} else {
			$acesso_ok = 0;

			$msg = utf8_encode("Você está utilizando caracteres inválidos. Retire as aspas simples ( ' ) do login e tente novamente.");
			$piqp = $_SERVER["REMOTE_ADDR"];
			$pqp++;
			#tolerancia zero! usou aspas pra que?? quero ver o que ele escreveu com as aspas..
			if ($pqp > 0) {
			$date = date('d-m-Y H:i');
			#alterar: mando a mensagem do ip soh na 2a tentativa.. mas ja mando o e-mail, assim pego 2 amostras do $userb utilizados;	
			$msg = $msg . utf8_encode("<br/> o ip <strong>$piqp</strong> (acessando em $date ) foi enviado para o administrador.<br/>");	
			## incluir funcao de gravar o txt com os dados e enviar e-mail para o administrador do site, avisando do IP e hora da tentativa de acesso via SQL INJECTION
			
			##
			
			}
			
			$destino = "login.php?msg=$msg&pqp=$pqp&piqp=$piqp";			//direcionamento
			header("location: $destino");
			exit();
	}

	

	include_once('sgae/inc/conexao.php');
			
	$sql = "select * from usuario 
			where login = '$userb' 
			   && senha = '$senha' 
			   && unidade_id = (select id from unidade where cnpj = '$cnpj')
			   and inativo = 0 ";	
				   		

	$res = mysql_query($sql) or die(mysql_error());
	$user2 = mysql_fetch_assoc($res);
	$num = mysql_num_rows($res);
	if ($num > 0) {
		
		$sqlUnidadeLogada = "select nomefantasia from unidade where cnpj = '$cnpj'";
		$resUnidadeLogada = mysql_query($sqlUnidadeLogada) or die(mysql_error());
		$unidadeLogada = mysql_fetch_assoc($resUnidadeLogada);

		session_start(); //função que possibilita usar a session
		$_SESSION['login'] 		    = 'ok';
		$_SESSION['tipo'] 	        = 'admin';
		$_SESSION['UsuarioID']	    = $user2['id'];		
		$_SESSION['UsuarioLogin']   = $user2['login'];
		$_SESSION['UsuarioNome']    = $user2['nome'];		
		$_SESSION['UsuarioPerfil']  = $user2['perfil_id'];
		$_SESSION['UsuarioUnidade'] = $user2['unidade_id'];
		$_SESSION['UnidadeNome'] = $unidadeLogada['nomefantasia'];

		//$destino = 'usuarios_list.php';
		$destino = 'sgae/index.php';

						
	} else {
		$msg = md5(001);
		//$destino = "login.php?msg=$msg";
		$destino = "index.php?msg=$msg";
	}
	
}
else {
	$msg = md5(002);
	//$destino = "login.php?msg=$msg";
	$destino = "index.php?msg=$msg";
}

//direcionamento
header("location: $destino");
?>
