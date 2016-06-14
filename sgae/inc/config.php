<?php
include_once('Database.class.php');
include_once('Registry.class.php');

$registry = Registry::getInstance();

try
{
    # Tentar obter a conexão
    $registry->get('sgaedb');
}
catch (RuntimeException $e)
{
    # Armazenar nova instância da conexão no Registry
    $registry->set('sgaedb', Database::conexao());
}
?>