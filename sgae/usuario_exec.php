<?php
include_once("inc/verificasession.php");

if ( isset($_REQUEST['act']) && !empty($_REQUEST['act']) ) {
	
	include_once('inc/conexao.php');
	
	$act = $_REQUEST['act'];

	switch ($act) { 


		case 'insert':

			$login 	 = $_POST['login'];
			$nome  	 = $_POST['nome'];	
			//$senha 	 = md5($_POST['senha']);
			$senha 	 = md5("12345");
			$email	 = $_POST['email'];	
			$perfil  = $_POST['perfil'];		
			$unidade = $_POST['unidade'];			
											
			$sql = "insert into usuario 
					(`login`,`nome`,`senha`,`email`,`perfil_id`,`unidade_id`,`inativo`)
					values ('$login','$nome','$senha','$email','$perfil','$unidade','0')";
			$res = mysql_query($sql);
			$idusu = mysql_insert_id();		//ID da Ultima cadastrada
			
			$msg = md5(104);

			break;
		
	
		case 'update':

			$idusu 	 = $_POST['idusu'];
			$login 	 = $_POST['login'];
			$nome  	 = $_POST['nome'];	
			$email	 = $_POST['email'];	
			$perfil  = $_POST['perfil'];		
			$unidade = $_POST['unidade'];

			$sql = "update usuario set 	login='$login',
										nome='$nome',
										email='$email',
										perfil_id='$perfil',
										unidade_id='$unidade'							
					where id = '$idusu'";
						
			$res = mysql_query($sql);		
			$msg = md5(101);

			break;
		

		case 'delete':		

			$idusu = $_REQUEST['idusu'];
			
			if ($idusu == 1) {
				$msg = md5(100);
			}
			else {
				$sql = "update usuario set inativo = '1' where id = $idusu";
				$res = mysql_query($sql);
				$msg = md5(102);
			}
	
			break;
		
	
		case 'react':	

			$idusu = $_REQUEST['idusu'];
			$sql = "update usuario set inativo = '0' where id = $idusu";
			$res = mysql_query($sql);
			$msg = md5(103);

			break;
		
	}
}

header("location: usuario_list.php?msg=$msg");
?>