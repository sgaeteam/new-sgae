<?php
include('inc/conexao.php');
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
                    <li>
                        <a href="#">"Menu"</a>
                    </li>
                    <li class="active">Buscar "Nome do item de menu"</li>
                </ol>
            </section>
            <section class="content">
	            <div class="row">
	                    <div class="col-lg-12">
				            <div class="alert alert-success alert-dismissable margin5">
				                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				                <strong>Mensagem com o resultado da exclusão. Se for sucesso, verde. Caso contrário, vermelho. Fazer desaparecer após 3 segundos.</strong>
				            </div>
		            	</div>
		        </div>
	        </section>
            <section class="content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <i class="livicon" data-name="doc-portrait" data-c="#fff" data-hc="#fff" data-size="18" data-loop="true"></i>
                                                    Informe os critérios para busca
                                                </h3>
                                                <!--
                                                <span class="pull-right">
                                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                                </span> -->
                             </div>
                            <div class="panel-body">
                                    <form class="form-horizontal">
                                        <div class="row">
                                                    <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3" for="filtro1">Filtro 1 *</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control" id="filtro1" placeholder="Filtro1">
                                                                </div>
                                                            </div>
                                                         
                                                    </div>
                                                    <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3" for="filtro2">Filtro 2</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control" id="filtro2" placeholder="Filtro 2">
                                                                </div>
                                                            </div>   
                                                    </div>
                                        </div>
                                        <div class="row">
                                                    <div div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3" for="filtro3">Filtro 3</label>
                                                            <div class="col-md-9">
                                                                <select id="filtro3" class="form-control">
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>5</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div div class="col-md-6">
                                                         <div class="form-group">
                                                             <label class="control-label col-md-3">Filtro 4</label>
                                                             <div class="col-md-9">
                                                                 <label class="radio-inline">
                                                                    <input name="optionsRadiosInline" id="optionsRadiosInline1" type="radio" checked="" value="option1">Ativo</label>
                                                                 <label class="radio-inline">
                                                                    <input name="optionsRadiosInline" id="optionsRadiosInline2" type="radio" checked="" value="option2">Inativo</label>
                                                             </div>   
                                                         </div>
                                                    </div>
                                        </div>
                                    </form>
                                    </br></br>
                                    <div class="form-group form-actions">
                                                <div class="col-md-9 col-md-offset-4">

                                                    <button type="button" onclick="javascipt:document.getElementById('tabela').style.display='block';" class="btn btn-labeled btn-success btn-responsive"><span class="btn-label"><i class="livicon" data-name="search" data-size="17" data-loop="true" data-c="#fff" data-hc="#fff" title="Buscar"></i></span>&nbsp;Buscar</button>

                                                    <button type="button" onclick="javascipt:document.getElementById('tabela').style.display='none';" class="btn btn-labeled btn-danger btn-responsive"><span class="btn-label"><i class="livicon" data-name="remove-circle" data-size="17" data-loop="true" data-c="#fff" data-hc="#fff" title="Limpar"></i></span>Limpar</button>

                                                    <button type="button" onclick="location.href='exemplo_insert.php'" class="btn btn-labeled btn-warning btn-responsive"><span class="btn-label"><i class="livicon" data-name="plus-alt" data-size="17" data-loop="true" data-c="#fff" data-hc="#fff" title="Buscar"></i></span>&nbsp;&nbsp;Novo</button>

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
                                        <th>Campo 1</th>
                                        <th>Campo 2</th>
                                        <th>Campo 3</th>
                                        <th>Campo 4</th>
                                        <th>Campo 5</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td width="18%">Campo 1</td>
                                        <td width="18%">Campo 2</td>
                                        <td width="19%">Campo 3</td>
                                        <td width="19%">Campo 4</td>
                                        <td width="19%">Campo 5</td>
                                        <td width="7%">
                                            <a href="exemplo_view.php">
                                                <i class="livicon" data-name="eye-open" data-size="19" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Visualizar"></i>
                                            </a>

                                            <a href="exemplo_edit.php">
                                                <i class="livicon" data-name="pen" data-size="19" data-loop="true" data-c="#F89A14" data-hc="#f56954" title="Editar"></i>
                                            </a>

                                            <a href="#" data-toggle="modal" data-target="#delete_confirm">
                                                <i class="livicon" data-name="trash" data-size="19" data-loop="true" data-c="#f56954" data-hc="#f56954" title="Excluir"></i>
                                            </a>
                                            
                                        </td>
                                     </tr>

                                </tbody>
                            </table>
                            <!-- Modal for showing delete confirmation -->
                            <div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="user_delete_confirm_title">
                                                Excluir
                                            </h4>
                                        </div>
                                        <div class="modal-body">
                                            Você dejesa excluir esse registro? Esta operação não poderá ser desfeita.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                                            <a href="#" type="button" class="btn btn-danger">Excluir</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
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