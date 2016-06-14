<?php
	ini_set('display_errors', true);
	error_reporting(E_ALL);

	if( $_SERVER['REQUEST_METHOD']=='POST' )
	{
		if( !getPost('nome') )
		{
		    $ssql = "SELECT * FROM usuario, perfil, unidade WHERE usuario.perfil_id = perfil.id and usuario.unidade_id = unidade.id and nome LIKE '".getPost('nome');
		}
		
		echo $sql;//executar a query
		die($sql);

	}
	function getPost( $key ){
		return isset( $_POST[ $key ] ) ? filter( $_POST[ $key ] ) : null;
	}
	function filter( $var ){
		return $var;//faça o tratamento
	}
?>