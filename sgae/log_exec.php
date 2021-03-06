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
			$usuario    = $_GET['usuarioFiltro'];
			$prioridade = $_GET['prioridadeFiltro'];
			$unidade	= $_SESSION['UsuarioUnidade'];
			$form_param = array($usuario,$prioridade,$dtInicio,$dtFim);
			
			session_start();
			$_SESSION['form_param'] = $form_param;			
			$unidade = $_SESSION['UsuarioUnidade'];			

			$pdo  = $registry->get('sgaedb');
			
			$dtInicio   = $dtInicio.' 00:00:01';
			$dtFim		= $dtFim.' 23:59:59';
			if (!empty($dtInicio) && !empty($dtFim) && empty($usuario) && empty($prioridade)) {
			
				$type 	 = "dtInicio&dtFim"; 
				$p_array = array(':unidade_id'=>$unidade,':dtInicio'=>$dtInicio,':dtFim'=>$dtFim);
	    		$p_where = " log.unidade_id = :unidade_id
	    					 AND timestamp between UNIX_TIMESTAMP(STR_TO_DATE(:dtInicio, '%d/%m/%Y %H:%i:%s')) AND UNIX_TIMESTAMP(STR_TO_DATE(:dtFim, '%d/%m/%Y %H:%i:%s')) ";	

			} elseif (!empty($dtInicio) && !empty($dtFim) && !empty($usuario) && empty($prioridade)) {
		
				$type 	 = "nome";
				$p_array = array(':unidade_id'=>$unidade,':dtInicio'=>$dtInicio,':dtFim'=>$dtFim,':usuario'=>"%$usuario%");
	    		$p_where = " log.unidade_id = :unidade_id
	    					 AND timestamp between UNIX_TIMESTAMP(STR_TO_DATE(:dtInicio, '%d/%m/%Y %H:%i:%s')) AND UNIX_TIMESTAMP(STR_TO_DATE(:dtFim, '%d/%m/%Y %H:%i:%s'))
            	             AND log.login LIKE :usuario";
	    		
			} elseif (!empty($dtInicio) && !empty($dtFim) && empty($usuario) && !empty($prioridade)) {
			
				$type 	 = "prioridade";
				$p_array = array(':unidade_id'=>$unidade,':dtInicio'=>$dtInicio,':dtFim'=>$dtFim,':prioridade'=>"%$prioridade%");
	    		$p_where = " log.unidade_id = :unidade_id
	    					 AND timestamp between UNIX_TIMESTAMP(STR_TO_DATE(:dtInicio, '%d/%m/%Y %H:%i:%s')) AND UNIX_TIMESTAMP(STR_TO_DATE(:dtFim, '%d/%m/%Y %H:%i:%s'))
            	             AND log.priority LIKE :prioridade";
							
			} elseif (!empty($dtInicio) && !empty($dtFim) && !empty($usuario) && !empty($prioridade)) {			
			
				$type 	 = "all";
				$p_array = array(':unidade_id'=>$unidade,':dtInicio'=>$dtInicio,':dtFim'=>$dtFim,':usuario'=>"%usuario%",':prioridade'=>"%$prioridade%");
	    		$p_where = " log.unidade_id = :unidade_id
	    					 AND timestamp between UNIX_TIMESTAMP(STR_TO_DATE(:dtInicio, '%d/%m/%Y %H:%i:%s')) AND UNIX_TIMESTAMP(STR_TO_DATE(:dtFim, '%d/%m/%Y %H:%i:%s'))
	    					 AND log.login LIKE :usuario
            	             AND log.prioridade LIKE :prioridade"; 

			} else {
				$type 	 = "blank"; 
				$p_array = array(':unidade_id'=>$unidade);
	    		$p_where = "timestamp >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) AND unidade_id = :unidade_id";	
			}

			$sql = "SELECT * ".
            	   "  FROM log ".
            	   " WHERE ". 
            	   	   $p_where.
				   " ORDER BY id DESC";

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
            						  $result['login']);
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