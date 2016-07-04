<?php
/* 
 * This class is used for logging purposes
 * It also contains useful user functions, to get ip for example
 *
 * Written by: Alejandro U Alvarez http://urbanoalvarez.es
 * Last Updated: March 21, 2008
 *
 */


class Logs
{
	var $pdo;

	function __construct(){
		include(dirname(__FILE__)."/../config.php");
		$this->pdo = $registry->get('sgaedb');
	}
	
	# Envia e-mail, notificando o administrador do log de alterações
	function newLog($msg,$by){
		$from = 'From: <sgaeteam@gmail.com>';
		$subject = 'Log of SGAE changed';
		$body = 'The log of SGAE has changed:\n $msg\n Hi, sgaeteam@gmail.com';
		return mail('sgaeteam@gmail.com',$subject,$body,$from);
	}
	
	//the following function will log any activity in the pages with the code "$log->logg(parameters);" in them:
	function logg($page=1,$msg=1,$priority='notSet',$color='blue',$mail='no'){
		if($page == 1 || $msg == 1){
			if($page == 1){
				$page = $_SERVER['PHP_SELF']; //get full page direction (Ej. /index.php
				$pages = explode('/',$page); //explode the / and take 1 (Only suitable for first level pages)
				$name = explode('.',$pages[1]); //explode the .php, and leave only the "name" ($name[0])
				$page = $name[0]; //Now the page name is in the form of "log" for the page "/log.php"
			}
			//Use the following arrays to store the default pages:
			//
			$high = array('log'); //for the example the important page is log.php
			$medium = array('test'); //for the example the medium is test.php
			//
			if($priority == 'notSet'){ //If priority was left blank
				//Now perform the check to see if page is important:
				if(in_array($page,$high)){
					$priority = 'High';
					$color = 'red';
				}else if(in_array($page,$medium)){
					$priority = 'Medium';
					$color = 'yellow';
				}else{
					$priority = 'Low';
				}
			}
			if($msg == 1){ //This are the default messages to use when no arguments are given.
				$msg = 'Acesso autorizado &agrave; p&aacute;gina '.$page;
			}

		}
		if($mail=='yes'){
			$this->newLog($msg,$_SESSION['UsuarioLogin']);
		}
		return $this->addLog($msg,$_SESSION['UsuarioLogin'],time(),ip(),$priority,$color);
	}
	
	function addLog($msg,$user,$timestamp,$ip,$priority,$class){

    	$stmt = $this->pdo->prepare("INSERT INTO log (msg,user,timestamp,ip,priority,class)
										  VALUES	 (:msg,:user,:timestamp,:ip,:priority,:class)"); 
		$stmt->bindParam(":msg",$msg);
		$stmt->bindParam(":user",$user);
		$stmt->bindParam(":timestamp",$timestamp);
		$stmt->bindParam(":ip",$ip);
		$stmt->bindParam(":priority",$priority);
		$stmt->bindParam(":class",$class);

		if($stmt->execute()){
			return true;
		}
		else{
			return false;
		}
	}
	
	function error($msg){
		echo '<tr>';
    	echo '<td colspan="6">'.$msg.'</td>';
    	echo '</tr>';
	}
	
	//This function generates the icon code depending on the class (color)
	//In the folder "icons/" there are some other optional icons that you can asign to make it more flexible
	function genIcon($c){
		switch($c){
			case 'red':
				$img = 'exclamation';
				break;
			case 'danger':
				$img = 'cancel';
				break;
			case 'yellow':
				$img = 'shield';
				break;
			case 'green':
				$img = 'accept';
				break;
			case 'blue':
				$img = 'help';
				break;
			default:
				$img = 'resultset_next';
		}
		return '<img src="icons/'.$img.'.png" alt="Icon '.$c.'" width="16" height="16" border="0" class="wp-smiley" />';	
	}
	
	//This functions displays the logs in a table
	function displayLogs(){
		
		$stmt = $this->pdo->prepare("SELECT *
									   FROM log 
									  WHERE timestamp >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)
								   ORDER BY timestamp DESC, priority ASC");
		$stmt->execute();
   		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

	//	if(!$results || ($stmt->rowCount() < 0)){
		if($stmt->rowCount() < 0){	
		   $this->error('Erro ao exibir a informação!');
		   return;
	    }
	    
	    if($stmt->rowCount() == 0){
		   $this->error('Sem registros!');
		   return;
	    }

        foreach ($results as $result) {	
    		$time = date("g:ia - j/m/Y",$result['timestamp']);
			$icon = $this->genIcon($result['class']);
			$user = $result['user'];
			$ip = $result['ip'];
			
			//loop is set up:
			echo '<tr class="'.$result['class'].'">';
			echo '<td width="16">'.$icon.'</td>'; //icon
			echo '<td>'.$result['msg'].'</td>'; //msg
			echo '<td>'.$user.'</td>'; //user
			echo '<td>'.$time.'</td>'; //timestamp
			echo '<td>'.$ip.'</td>'; //ip
			echo '<td>'.$result['priority'].'</td>'; //priority
		    echo '</tr>';				  
        }	  
	}

	//This function displays messages:
	function displayMsg($name){
		if(isset($_SESSION[$name.'_msg'])){ //there is a message stored:
			echo '<p class="alertMsg">'.$_SESSION[$name.'_msg'].'. Go see the <a href="log.php">log page</a> to see the changes there.</p>';
			unset($_SESSION[$name.'_msg']);
		}
	}
};
?>