<?php
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
                <h1>Unidade: <?php echo $unidadeNome;?></h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="livicon" data-name="home" data-size="14" data-loop="true"></i>Painel de Controle</a></li>
                    <li><a href="#">Administra&ccedil;&atilde;o</a></li>
                    <li><a href="#">Cadastro</a></li>
                    <li><a href="#">Plano</a></li>
                    <li class="active">Cadastrar</li>
                </ol>
            </section>
            <section class="content">
            <?php
                if (isset($_GET['msg'])) {                
            ?>
                <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-success alert-dismissable margin5 fade in" >
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
                                                    Informe os dados para cadastro
                                                </h3>
                                                <!--
                                                <span class="pull-right">
                                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                                </span> -->
                             </div>
                            <div class="panel-body">
                                    <form class="form-horizontal" action="plano_exec.php" method="post">
                                        <div class="row">
                                                    <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3" for="nome">Plano*</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o nome" required>
                                                                </div>
                                                            </div>
                                                         
                                                    </div>                                            
                                                    <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3" for="descricao">Descri&ccedil;&atilde;o*</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Digite a descrição do plano" value="<?php echo $descricao; ?>" required>
                                                                </div>
                                                            </div>   
                                                    </div>
                                        </div>   
                                        <div class="row">                                        
                                                    <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3" for="valor">Valor (R$)*</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control" id="valor" name="valor" placeholder="Digite um valor" value="<?php echo $valor; ?>" required>
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
                                                    </br></br>
                                                    <div class="form-group form-actions">
                                                        <div class="col-md-9 col-md-offset-5">
                                                            <input type="hidden" name="act" value="insert" />
                                                            <button type="submit" class="btn btn-labeled btn-success btn-responsive"><span class="btn-label"><i class="livicon" data-name="save" data-size="17" data-loop="true" data-c="#fff" data-hc="#fff" title="Salvar"></i></span>&nbsp;Salvar</button>
                                                            <button type="button" onclick="location.href='plano_list.php?loadCriteria=true'" class="btn btn-labeled btn-warning btn-responsive"><span class="btn-label"><i class="livicon" data-name="remove-circle" data-size="17" data-loop="true" data-c="#fff" data-hc="#fff" title="Voltar"></i></span>Voltar</button>
                                                        </div>
                                                    </div>                                                      
                                        </div>
                                    </form>
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