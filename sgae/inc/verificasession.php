<?php
//Controle de acesso 
//Inautoriza acesso se ainda nao tiver feito o login (se nao passou pelo dologin)
session_start();
if ( !isset($_SESSION['login']) ) {
	$msg = md5(003);
	header('Window-target: _parent');
	header("location: ./index.php?msg=$msg");
	exit;
}
?>
