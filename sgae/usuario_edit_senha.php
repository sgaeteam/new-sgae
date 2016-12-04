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
                <h1>Unidade: <?php echo $unidadeNome;?></h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="livicon" data-name="home" data-size="14" data-loop="true"></i>Painel de Controle</a></li>
                    <li class="active">Mudar senha</li>
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
                                                    Informe os dados para altera&ccedil;&atilde;o
                                                </h3>
                                                <!--
                                                <span class="pull-right">
                                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                                </span> -->
                             </div>
                            <div class="panel-body">
                                    <form class="form-horizontal" action="usuario_exec.php" method="post">
                                        <div class="row">
                                                    <div class="col-md-9">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3" for="login">Senha atual*</label>
                                                                <div class="col-md-9">
                                                                    <input type="password" class="form-control" id="senhaAtual" name="senhaAtual" placeholder="Digite a senha"/>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3" for="email">Nova senha*</label>
                                                                <div class="col-md-9">
                                                                    <input type="password" class="form-control" id="senhaNova" name="senhaNova" placeholder="Digite a nova senha"/>
                                                                </div>
                                                            </div>   
                                                    </div>                                                      

                                                    <div class="col-md-9">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3" for="login">Confirmar nova senha*</label>
                                                                <div class="col-md-9">
                                                                    <input type="password" class="form-control" id="senhaConfirma" name="senhaConfirma" placeholder="Digite a confirmação da senha"/>
                                                                </div>
                                                            </div>
                                                    </div> 
                                        </div>                                                    
                                        </br></br>
                                        <div class="form-group form-actions">
                                            <div class="col-md-9 col-md-offset-5"> 
                                                <input type="hidden" name="idusu" value="<?php echo $idusu; ?>" />
                                                <input type="hidden" name="login" value="<?php echo $usuarioLogin; ?>" />
                                                <input type="hidden" name="act" value="updateSenha" />
                                                <button id="botao_usuario_form_submit" type="submit" class="btn btn-labeled btn-success btn-responsive"><span class="btn-label"><i class="livicon" data-name="save" data-size="17" data-loop="true" data-c="#fff" data-hc="#fff" title="Alterar"></i></span>&nbsp;Alterar</button>
                                                <button type="button" onclick="location.href='index.php'" class="btn btn-labeled btn-warning btn-responsive"><span class="btn-label"><i class="livicon" data-name="remove-circle" data-size="17" data-loop="true" data-c="#fff" data-hc="#fff" title="Voltar"></i></span>Voltar</button>
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
<script src="js/sgae.validate.usuario.js" type="text/javascript"></script>
<?php include 'footer.php';?>