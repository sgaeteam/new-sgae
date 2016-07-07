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
                    <li><a href="#">Administra&ccedil;&atilde;o</a></li>
                    <li><a href="#">Cadastro</a></li>
                    <li><a href="#">Usu&aacute;rio</a></li>
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
                                    <form class="form-horizontal" action="usuario_exec.php" method="post">
                                        <div class="row">
                                                    <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3" for="login">Usu&aacute;rio*</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control" id="login" placeholder="Digite o login" name="login" required>
                                                                </div>
                                                            </div>
                                                         
                                                    </div>
                                                    <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3" for="email">E-mail</label>
                                                                <div class="col-md-9">
                                                                    <input type="email" class="form-control" id="email" placeholder="Digite o e-mail" name="email" data-bv-field="validateEmail">
                                                                </div>
                                                            </div>   
                                                    </div>
                                        </div>
                                        <div class="row">
                                                    <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3" for="nome">Nome completo*</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control" id="nome" placeholder="Digite o nome" name="nome" required>
                                                                </div>
                                                            </div>
                                                         
                                                    </div>                                            
                                                    <div div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3" for="perfil">Perfil*</label>
                                                            <div class="col-md-9">
                                                                <select id="perfil" class="form-control" name="perfil" required>
                                                                    <option value="">Selecione o perfil</option>
                                                                    <?php 
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
                                                    </br></br>
                                                    <div class="form-group form-actions">
                                                        <div class="col-md-9 col-md-offset-5">
                                                            <input type="hidden" name="unidade" value="<?php echo $usuarioUnidade; ?>" />
                                                            <input type="hidden" name="act" value="insert" />
                                                            <button type="submit" class="btn btn-labeled btn-success btn-responsive"><span class="btn-label"><i class="livicon" data-name="save" data-size="17" data-loop="true" data-c="#fff" data-hc="#fff" title="Salvar"></i></span>&nbsp;Salvar</button>
                                                            <button type="button" onclick="location.href='usuario_list.php'" class="btn btn-labeled btn-warning btn-responsive"><span class="btn-label"><i class="livicon" data-name="remove-circle" data-size="17" data-loop="true" data-c="#fff" data-hc="#fff" title="Voltar"></i></span>Cancelar</button>
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