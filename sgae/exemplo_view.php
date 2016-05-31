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
                    <li class="active">Visualizar "Nome do item de menu"</li>
                </ol>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <i class="livicon" data-name="eye-open" data-c="#fff" data-hc="#fff" data-size="18" data-loop="true"></i>
                                                    Visualização dos dados
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
                                                                <label class="control-label col-md-3" for="campo1">Campo 1 *</label>
                                                                <div class="col-md-9">
                                                                    <input disabled="" type="text" class="form-control" id="campo1" placeholder="Exibir o campo bloqueado">
                                                                </div>
                                                            </div>
                                                         
                                                    </div>
                                                    <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3" for="campo2">Campo 2 *</label>
                                                                <div class="col-md-9">
                                                                    <input disabled="" type="text" class="form-control" id="campo2" placeholder="Exibir o campo bloqueado">
                                                                </div>
                                                            </div>   
                                                    </div>
                                        </div>
                                        <div class="row">
                                                    <div div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3" for="campo3">Campo 3 *</label>
                                                            <div class="col-md-9">
                                                                <select disabled="" id="campo3" class="form-control">
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
                                                             <label class="control-label col-md-3">Campo 4 *</label>
                                                             <div class="col-md-9">
                                                                 <label class="radio-inline">
                                                                    <input disabled="" name="optionsRadiosInline" id="optionsRadiosInline1" type="radio" checked="" value="option1">Ativo</label>
                                                                 <label class="radio-inline">
                                                                    <input disabled="" name="optionsRadiosInline" id="optionsRadiosInline2" type="radio" checked="" value="option2">Inativo</label>
                                                             </div>   
                                                         </div>
                                                    </div>
                                        </div>
                                    </form>
                                    </br></br>
                                    <div class="form-group form-actions">
                                                <div class="col-md-9 col-md-offset-5">
                                                    <button type="button" onclick="location.href='exemplo_list.php'" class="btn btn-labeled btn-success btn-responsive"><span class="btn-label"><i class="livicon" data-name="arrow-left" data-size="17" data-loop="true" data-c="#fff" data-hc="#fff" title="Voltar"></i></span>&nbsp;Voltar</button>
                                                </div>
                                    </div>    
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
<?php include 'footer.php';?>