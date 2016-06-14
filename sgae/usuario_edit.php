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

if (isset($_GET['idusu']) && is_numeric($_GET['idusu'])) {
    $idusu = $_GET['idusu'];
    $pdo  = $registry->get('sgaedb');
	$stmt = $pdo->prepare("select * from usuario where id = :id");
	$stmt->bindParam(":id", $idusu);	
	$stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    	
    if ($stmt->rowCount() > 0) {

                $login = $result['login'];
                $nome = $result['nome'];
                $email = $result['email'];
                $perfil = $result['perfil_id'];
                $unidade = $result['unidade_id'];
    }
    else {
        header('location: usuario_list.php');
        exit;
    }

}

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
                    <li class="active">Editar Usu&aacute;rio</li>
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
                                                    Informe os dados para alteração
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
                                                                <label class="control-label col-md-3" for="campo1">Usu&aacute;rio*</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control" id="campo1" name="login" value="<?php echo $login; ?>" autofocus/>
                                                                </div>
                                                            </div>
                                                         
                                                    </div>
                                                    <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3" for="campo2">E-mail</label>
                                                                <div class="col-md-9">
                                                                    <input type="email" class="form-control" id="campo2" placeholder="Trazer preenchido o campo">
                                                                </div>
                                                            </div>   
                                                    </div>
                                        </div>
                                        <div class="row">
                                                    <div div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3" for="campo3">Campo 3</label>
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
                                                             <label class="control-label col-md-3">Campo 4</label>
                                                             <div class="col-md-9">
                                                                 <label class="radio-inline">
                                                                    <input name="optionsRadiosInline" id="optionsRadiosInline1" type="radio" checked="" value="0">Ativo</label>
                                                                 <label class="radio-inline">
                                                                    <input name="optionsRadiosInline" id="optionsRadiosInline2" type="radio" checked="" value="1">Inativo</label>
                                                             </div>   
                                                         </div>
                                                    </div>
                                        </div>
                                    </form>
                                    </br></br>
                                    <div class="form-group form-actions">
                                                <div class="col-md-9 col-md-offset-5">

                                                    <button type="button" onclick="" class="btn btn-labeled btn-success btn-responsive"><span class="btn-label"><i class="livicon" data-name="save" data-size="17" data-loop="true" data-c="#fff" data-hc="#fff" title="Alterar"></i></span>&nbsp;Alterar</button>

                                                    <button type="button" onclick="location.href='usuario_list.php'" class="btn btn-labeled btn-warning btn-responsive"><span class="btn-label"><i class="livicon" data-name="remove-circle" data-size="17" data-loop="true" data-c="#fff" data-hc="#fff" title="Cancelar"></i></span>Cancelar</button>

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