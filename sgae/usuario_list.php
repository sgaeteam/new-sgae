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
<?php include 'header.php';?>
    
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <aside class="right-side">
            <!-- Main content -->
            <section class="content-header">
                <h1>Unidade: <?php echo utf8_encode($unidadeNome);?></h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="livicon" data-name="home" data-size="14" data-loop="true"></i>Painel de Controle</a></li>
                    <li><a href="#">Administra&ccedil;&atilde;o</a></li>
                    <li><a href="#">Cadastro</a></li>
                    <li><a href="#">Usu&aacute;rio</a></li>                    
                    <li class="active">Buscar</li>
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
                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <i class="livicon" data-name="doc-portrait" data-c="#fff" data-hc="#fff" data-size="18" data-loop="true"></i>
                                                    Informe os crit&eacute;rios para busca
                                                </h3>
                                                <!--
                                                <span class="pull-right">
                                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                                </span> -->
                             </div>
                            <div class="panel-body">
                                    <!--<form class="form-horizontal">-->
                                    <form class="form-horizontal" method="post" action="" id="ajax_form">
                                        <div class="row">
                                                    <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3" for="nomeFiltro">Nome</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control" id="nomeFiltro" placeholder="Digite o nome">
                                                                </div>
                                                            </div>
                                                         
                                                    </div>
                                                    <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3" for="usuarioFiltro">Usu&aacute;rio</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control" id="usuarioFiltro" placeholder="Digite o login">
                                                                </div>
                                                            </div>   
                                                    </div>
                                        </div>
                                        <div class="row">
                                                    <div div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3" for="perfilFiltro">Perfil</label>
                                                            <div class="col-md-9">
                                                                <select id="perfilFiltro" class="form-control">
                                                                    <option>Selecione o perfil</option>
                                                                    <?php 
                                                                    	$registry = Registry::getInstance();
                                                                        $pdo  = $registry->get('sgaedb');
                                                                    	$stmt = $pdo->prepare("SELECT * FROM perfil ORDER BY tipo ASC"); 
                                                                    	$stmt->execute();
                                                                    	$perfilItem = $stmt->fetchAll();
                                                                        foreach ($perfilItem as $item) {
                                                                            echo "<option value=".$item['id'].">".$item['tipo']."</option>";
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div div class="col-md-6">
                                                         <div class="form-group">
                                                             <label class="control-label col-md-3">Status</label>
                                                             <div class="col-md-9">
                                                                 <label class="radio-inline">
                                                                    <input name="status" id="optionsRadiosInline1" type="radio" checked="" value="0">Ativo</label>
                                                                 <label class="radio-inline">
                                                                    <input name="status" id="optionsRadiosInline2" type="radio" value="1">Inativo</label>
                                                             </div>   
                                                         </div>
                                                    </div>
                                        </div>
                                    </form>
                                    </br></br>
                                    <div class="form-group form-actions">
                                                <div class="col-md-9 col-md-offset-4">

                                                    <button type="button" onclick="javascript:document.getElementById('tabela').style.display='block';" class="btn btn-labeled btn-success btn-responsive"><span class="btn-label"><i class="livicon" data-name="search" data-size="17" data-loop="true" data-c="#fff" data-hc="#fff" title="Buscar"></i></span>&nbsp;Buscar</button>

                                                    <button type="button" onclick="javascipt:document.getElementById('tabela').style.display='none';" class="btn btn-labeled btn-danger btn-responsive"><span class="btn-label"><i class="livicon" data-name="remove-circle" data-size="17" data-loop="true" data-c="#fff" data-hc="#fff" title="Limpar"></i></span>Limpar</button>

                                                    <button type="button" onclick="location.href='usuario_insert.php'" class="btn btn-labeled btn-warning btn-responsive"><span class="btn-label"><i class="livicon" data-name="plus-alt" data-size="17" data-loop="true" data-c="#fff" data-hc="#fff" title="Buscar"></i></span>&nbsp;&nbsp;Novo</button>

                                                </div>
                                    </div>  
                                    </br></br></br>  

                                       
                                    <div id="tabela" class="panel panel-primary" style="display:none;">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <i class="livicon" data-name="pencil" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                                  Resultado da busca
                                            </h4>
                                    </div>
                            <br />
                            
                            <div class="panel-body">
                            <table class="table table-bordered " id="table">
                                <thead>
                                    <tr class="filters">
                                        <th>Nome</th>
                                        <th>Usu&aacute;rio</th>
                                        <th>E-mail</th>
                                        <th>Perfil</th>
                                        <th>Unidade</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                	$stmt2 = $pdo->prepare("SELECT usuario.id,usuario.nome,usuario.login,usuario.email,perfil.tipo,unidade.nomefantasia
                                	                          FROM usuario, perfil, unidade
                                	                         WHERE usuario.perfil_id = perfil.id 
                                	                           AND usuario.unidade_id = unidade.id 
                                	                           AND usuario.inativo = 0 
                                	                        ORDER BY usuario.nome DESC"); 
                                	$stmt2->execute();
                                    $results = $stmt2->fetchAll();
                                    
                                    if ($stmt2->rowCount() > 0) {
                                        foreach ($results as $result) {
                                ?>
                                            <tr>
                                                <td width="18%"><?php echo $result['nome'];?></td>
                                                <td width="18%"><?php echo $result['login'];?></td>
                                                <td width="19%"><?php echo $result['email'];?></td>
                                                <td width="19%"><?php echo $result['tipo'];?></td>
                                                <td width="19%"><?php echo $result['nomefantasia'];?></td>
                                                <td width="7%">
                                                    <a href="usuario_view.php?idusu=<?php echo $result['id']; ?>">
                                                        <i class="livicon" data-name="eye-open" data-size="19" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Visualizar"></i>
                                                    </a>
        
                                                    <a href="usuario_edit.php?idusu=<?php echo $result['id']; ?>">
                                                        <i class="livicon" data-name="pen" data-size="19" data-loop="true" data-c="#F89A14" data-hc="#f56954" title="Alterar"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#delete_confirm_<?php echo $result['id']; ?>" data-id="<?php echo $result['id']; ?>">
                                                        <i class="livicon" data-name="trash" data-size="19" data-loop="true" data-c="#f56954" data-hc="#f56954" title="Excluir"></i>
                                                    </a>
                                                    
                                                </td>
                                             </tr>

                                             <!-- Modal for showing delete confirmation -->
					                            <div class="modal fade" id="delete_confirm_<?php echo $result['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
					                                <div class="modal-dialog">
					                                    <div class="modal-content">
					                                        <div class="modal-header">
					                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					                                            <h4 class="modal-title" id="user_delete_confirm_title">
					                                                Excluir
					                                            </h4>
					                                        </div>
					                                        <div class="modal-body">
					                                            Você deseja excluir o usuário <strong><?php echo $result['login'];?></strong>? Esta operação não poderá ser desfeita.
					                                        </div>
					                                        <div class="modal-footer">
					                                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
					                                            <a href="usuario_exec.php?act=delete&idusu=<?php echo $result['id']; ?>" id="modalDelete" type="button" class="btn btn-danger">Excluir</a>
					                                        </div>
					                                    </div>
					                                </div>
					                            </div>
                                <?php
                                        }
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>   </div>          
                            </div>
                        </div>
                    </div> 
                </div>  
            </section>
        </aside>  
    </div>

<!-- Include footer here-->   
<?php include 'footer.php';?>