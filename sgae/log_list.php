<?php
include('inc/config.php');
include('inc/verificasession.php');

$usuarioID      = $_SESSION['UsuarioID'];
$usuarioLogin   = $_SESSION['UsuarioLogin'];
$usuarioNome    = $_SESSION['UsuarioNome'];
$usuarioPerfil  = $_SESSION['UsuarioPerfil'];
$usuarioUnidade = $_SESSION['UsuarioUnidade'];
$unidadeNome    = $_SESSION['UnidadeNome'];

header('Content-Type: text/html; charset=utf-8');
?>
<!-- Include header here-->
<?php include 'header.php'; ?>

    
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <aside class="right-side">
            <!-- Main content -->
            <section class="content-header">
                <h1>Unidade: <?php echo utf8_encode($unidadeNome);?></h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="livicon" data-name="home" data-size="14" data-loop="true"></i>Painel de Controle</a></li>
                    <li><a href="#">Administra&ccedil;&atilde;o</a></li>
                    <li><a href="#">Cadastro</a></li>
                    <li class="active">Auditoria</li>
                </ol>
            </section>
            <section class="content">
            <?php
                if (isset($_GET['msg'])) {                
            ?>                
    	            <div class="row">
    	                    <div class="col-lg-12">
    				            <div class="alert alert-success alert-dismissable margin5">
    				                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    				                <strong>
                                        <?php
                                                $msg = $_GET['msg'];
                                                include('inc/mensagens.php');
                                        ?>
                                    </strong>
    				            </div>
    		            	</div>
    		        </div>
            <?php
                }
            ?>   		        
	        </section>
            <section class="content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                                <div id="tabela" class="panel panel-primary" style="display:block;">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <i class="livicon" data-name="pencil" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                            Resultado da Auditoria
                                        </h4>
                                    </div>
                                    <br/>
                                    <div class="panel-body">
                                        <table class="table table-bordered " id="ajax_table" align="center">
                                            <thead>
                                                <tr class="filters">
                                                    <th style="width:160px">Acesso</th>
                                                    <th style="width:40px">Usu&aacute;rio</th>
                                                    <th style="width:35px">Data</th>                                                    
                                                    <th style="width:35px">IP</th>
                                                    <th style="width:120px">Prioridade</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tabelaAjax" align="center">
                                            <?php
                                                $pdo  = $registry->get('sgaedb');
                                            	$stmt = $pdo->prepare(" SELECT *
                                    									   FROM log 
                                    									  WHERE timestamp >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)
                                    								   ORDER BY timestamp DESC, priority ASC"); 
                                            	$stmt->execute();
                                                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                
                                                if ($stmt->rowCount() > 0) {
                                                    foreach ($results as $result) {
                                                		$time = date("g:ia - j/m/Y",$result['timestamp']);
                                            			//$icon = $this->genIcon($result['class']);
                                            			$user = $result['user'];
                                            			$ip = $result['ip'];
                                            		    if ( $result['priority'] == 'high') {
                                            ?>		
                                                			<tr class="danger">
                                                                <td width="18%"><?php echo $result['msg'];?></td>
                                                                <td width="18%"><?php echo $result['user'];?></td>
                                                                <td width="19%"><?php echo $time;?></td>
                                                                <td width="19%"><?php echo $result['ip'];?></td>
                                                                <td width="19%"><?php echo $result['priority'];?></td>
                                                			</tr>;	                                                        
                                            <?php			
                                                        } 
                                                        else {
                                            ?>
                                                            <tr class="info">
                                                                <td width="18%"><?php echo $result['msg'];?></td>
                                                                <td width="18%"><?php echo $result['user'];?></td>
                                                                <td width="19%"><?php echo $time;?></td>
                                                                <td width="19%"><?php echo $result['ip'];?></td>
                                                                <td width="19%"><?php echo $result['priority'];?></td>
                                                			</tr>;	                                                        
                                            <?php			
                                                        }
                                                    }
                                                }
                                            ?>
                                            </tbody>                                            
                                        </table>
                                    </div>
                                </div>
                            </div>   
                        </div>         
                    </div> 
                </div>  
            </section>
        </aside>  
    </div>
<!-- Include footer here-->   
<?php include 'footer.php'; ?>