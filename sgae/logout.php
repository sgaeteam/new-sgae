<?php
//página para "matar" a session (e tudo que tem lá)

session_start();
session_destroy();

header('location: ../index.php');
//header('location: ../site/index.php');
?>
