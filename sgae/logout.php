<?php
//p�gina para "matar" a session (e tudo que tem l�)

session_start();
session_destroy();

header('location: ../index.php');
//header('location: ../site/index.php');
?>
