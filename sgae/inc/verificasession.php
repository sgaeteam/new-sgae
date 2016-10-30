<?php

// Verifica o acesso e Inautoriza acesso se ainda nao tiver feito o login (se nao passou pelo dologin)

session_start();
if ( !isset($_SESSION['login']) ) {
	$msg = md5(003);
	header('Window-target: _parent');
	header("location: ./index.php?msg=$msg");
	exit;
}

// Verifica o Controle de acesso e Inautoriza acesso se ainda nao tiver permissão

if ( isset($_SESSION['UsuarioPerfil']) && isset($_SESSION['UnidadePlano']) ) {
	include('inc/config.php');
	$pdo = $registry->get('sgaedb');
	$stmt = $pdo->prepare("SELECT * 
						     FROM acesso_pagina, pagina
	 					    WHERE acesso_pagina.pagina_id = pagina.id
						      AND acesso_pagina.inativo = 0
						      AND acesso_pagina.perfil_id = :perfil 
						      AND acesso_pagina.plano_id =  :plano
						      AND pagina.nome = :pagina");
 
	$stmt->bindParam(':perfil', $_SESSION['UsuarioPerfil']);
	$stmt->bindParam(':plano', $_SESSION['UnidadePlano']);
					
	$page = $_SERVER['PHP_SELF']; //get full page direction (Ej. /index.php
	$pages = explode('/sgae/',$page); //explode the / and take 1 (Only suitable for first level pages)
	$name = explode('.',$pages[1]); //explode the .php, and leave only the "name" ($name[0])
	$page = $name[0]; //Now the page name is in the form of "log" for the page "/log.php"
	
	$stmt->bindParam(':pagina', $page); 
	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);

	if ($stmt->rowCount() == 0) {
		header('Window-target: _parent');
		header("location: ./planos.php");
		exit;
	}
}

?>