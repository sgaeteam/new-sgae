<?php
include_once("inc/verificasession.php");
include_once("inc/logger/logInit.php");

if ( isset($_REQUEST['act']) && !empty($_REQUEST['act']) ) {
	
	include('inc/config.php');
	$act = $_REQUEST['act'];
	
	# Redirecionamento default:
	$destino = "log_list.php";
	
	switch ($act) { 


		case 'select':	
			
			$dtInicio   = $_GET['dataIniFiltro'];
			$dtFim		= $_GET['dataFimFiltro'];
			$unidade	= $_SESSION['UsuarioUnidade'];

			$pdo  = $registry->get('sgaedb');
			
			if (empty($dtInicio) && empty($dtFim)) {
			
				$type 	 = "all"; 
				$p_array = array(':unidade_id'=>$unidade);
	    		$p_where = "timestamp >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)
            	            AND unidade_id = :unidade_id";	

			} elseif (!empty($dtInicio) && empty($dtFim)) {
#---> continuar			
				$type 	 = "dtInicio";
				$p_array = array(':unidade_id'=>$unidade,':inativo'=>$status,':nome'=>"%$nome%");
	    		$p_where = "AND usuario.unidade_id 	= :unidade_id
            	            AND usuario.inativo 	= :inativo
            	            AND usuario.nome 	 LIKE :nome";
	    		
			} elseif (empty($dtInicio) && !empty($dtFim)) {
			
				$type 	 = "dtFim"; 
	    		$p_array = array(':unidade_id'=>$unidade,':inativo'=>$status,':usuario'=>"%$usuario%");
	    		$p_where = "AND usuario.unidade_id 	= :unidade_id
            	            AND usuario.inativo 	= :inativo
            	            AND usuario.login 	 LIKE :usuario";
							
			} elseif (!empty($dtInicio) && !empty($dtFim)) {			
			
				$type 	 = "dtInicio&dtFim";
				$p_array = array(':unidade_id'=>$unidade,':inativo'=>$status,':nome'=>"%$nome%",':usuario'=>"%$usuario%",':perfil_id'=>$perfil);
	    		$p_where = "AND unidade_id 			= :unidade_id
	    					AND usuario.inativo 	= :inativo
	    					AND usuario.nome 	 LIKE :nome
            	            AND usuario.login 	 LIKE :usuario 
            	            AND usuario.perfil_id 	= :perfil_id"; 

			}

			$sql = "SELECT * ".
            	   "  FROM log ".
            	   " WHERE ". 
            	   	   $p_where.
				   " ORDER BY  timestamp DESC, priority ASC ";

			$stmt = $pdo->prepare($sql);		
			$stmt->execute($p_array);			
			$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($stmt->rowCount() > 0) {
            	
                foreach ($results as $result) {	
					
					$time = date("j/m/Y - g:ia",$result['timestamp']);
					
            		$return[] = array($result['url'],
            						  $result['msg'],
            						  $result['login'],
            						  $time,
            						  $result['ip'],
            						  $result['priority'],
            						  $result['class']);
                }

                echo json_encode($return);	                            

            }
			else { 
            	
            	echo json_encode(null);
				  
			}
			
			break;
	}
}

if ($act <> 'select') {

	header("location: $destino");
	
}
?>