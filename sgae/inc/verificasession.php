<?php
//Controle de acesso 
//Inautoriza acesso se ainda n�o tiver feito o login (se n�o passou pelo dologin)
session_start();
if ( !isset($_SESSION['login']) ) {
	$msg = md5(003);
	header('Window-target: _parent');
	header("location: ./index.php?msg=$msg");
	exit;
}
?>
