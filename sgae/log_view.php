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

if (isset($_GET['login'])) {
    $login = $_GET['login'];
    $pdo  = $registry->get('sgaedb');
	$stmt = $pdo->prepare("select u.*, l.url, l.msg, l.ip, l.timestamp, l.priority from usuario u, log l where u.login = l.login and l.login = :login and l.unidade_id = :unidade_id ");
	$stmt->bindParam(":login", $login);
	$stmt->bindParam(":unidade_id", $usuarioUnidade);
	$stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    	
    if ($stmt->rowCount() > 0) {

                $login = $result['login'];
                $nome = $result['nome'];
                $senha = $result['senha'];
                $email = $result['email'];
                $perfil = $result['perfil_id'];
                $unidade = $result['unidade_id'];
                $status = $result['inativo'];
                
                $url = $result['url'];
                $msg = $result['msg'];
                $timestamp = date("j/m/Y - g:ia",$result['timestamp']);
                $ip = $result['ip'];
                $prioridade = $result['priority'];
    }
    else {
        header('location: log_list.php');
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
                    <li><a href="#">Auditoria</a></li>
                    <li class="active">Visualizar</li>
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
                                                    Visualiza&ccedil;&atilde;o dos dados
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
                                                                <label class="control-label col-md-3" for="login">Usu&aacute;rio</label>
                                                                <div class="col-md-9">
                                                                    <input disabled="" type="text" class="form-control" id="login" name="login" value="<?php echo $login; ?>" autofocus required/>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3" for="email">E-mail</label>
                                                                <div class="col-md-9">
                                                                    <input disabled="" type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                                                                </div>
                                                            </div>   
                                                    </div>                                                      
                                        </div>
                                        <div class="row">                                        
                                                    <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3" for="nome">Nome completo</label>
                                                                <div class="col-md-9">
                                                                    <input disabled="" type="text" class="form-control" id="nome" name="nome" value="<?php echo $nome; ?>" required>
                                                                </div>
                                                            </div>   
                                                    </div>
                                                    <div div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3" for="perfil">Perfil</label>
                                                            <div class="col-md-9">
                                                                <select disabled="" id="perfil" class="form-control" name="perfil" class="required">
                                                                    <?php 
                                                                        $pdo  = $registry->get('sgaedb');
                                                                        $stmt = $pdo->prepare("SELECT * FROM perfil ORDER BY tipo ASC"); 
                                                                        $stmt->execute();
                                                                        $perfilItem = $stmt->fetchAll();
                                                                        foreach ($perfilItem as $item) {
                                                                            if ($item['id'] == $perfil) {
                                                                                    echo "<option selected="."selected"." value=".$item['id'].">".$item['tipo']."</option>";                                                                            
                                                                            } 
                                                                            else {
                                                                                    echo "<option value=".$item['id'].">".$item['tipo']."</option>";
                                                                            }
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                        </div>                                                    
                                        <div class="row">
                                                <div div class="col-md-6">
                                               <div class="form-group">
                                                   <label class="control-label col-md-3">IP</label>
                                                   <div class="col-md-9">
                                                       <input disabled="" type="text" class="form-control" id="ip" name="ip" value="<?php echo $ip; ?>">
                                                   </div>                 
                                               </div>
                                            </div>
                                               <div div class="col-md-6">
                                               <div class="form-group">
                                                   <label class="control-label col-md-3">Prioridade</label>
                                                   <div class="col-md-9">
                                                       <input disabled="" type="text" class="form-control" id="prioridade" name="prioridade" value="<?php echo $prioridade; ?>">
                                                   </div>                 
                                               </div>
                                            </div>
                                                                                                          
                                        </div>
                                         <div class="row">
                                            <div class="col-md-12">
                                               <div class="form-group">
                                                   <label class="control-label col-md-1" style="width:12.50%">URL</label>
                                                   <div class="col-md-11" style="width:87.50%">
                                                       <input disabled="" type="text" class="form-control" id="url" name="url" value="<?php echo $url; ?>">
                                                   </div>                 
                                               </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div div class="col-md-12">
                                               <div class="form-group">
                                                   <label class="control-label col-md-1" style="width:12.50%">Opera&ccedil;&atilde;o</label>
                                                   <div class="col-md-11" style="width:87.50%">
                                                       <input disabled="" type="text" class="form-control" id="acao" name="acao" value="<?php echo $msg; ?>">
                                                   </div>                 
                                               </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div div class="col-md-6">
                                               <div class="form-group">
                                                   <label class="control-label col-md-3">Data</label>
                                                   <div class="col-md-9">
                                                       <input disabled="" type="text" class="form-control" id="data" name="data" value="<?php echo $timestamp; ?>">
                                                   </div>                 
                                               </div>
                                            </div>
                                            <div div class="col-md-6">
                                                         <div class="form-group">
                                                             <label class="control-label col-md-3">Status</label>
                                                             <div class="col-md-9">
                                                                <?php 
                                                                    if ($status == 0) {
                                                                ?>
                                                                         <label class="radio-inline">
                                                                            <input disabled="" name="status" id="optionsRadiosInline1" type="radio" checked="" value="0">Ativo</label>
                                                                         <label class="radio-inline">
                                                                            <input disabled="" name="status" id="optionsRadiosInline2" type="radio" value="1">Inativo</label>
                                                                <?php 
                                                                    } 
                                                                    else { 
                                                                ?>                                                                         
                                                                         <label class="radio-inline">
                                                                            <input disabled="" name="status" id="optionsRadiosInline1" type="radio" value="0">Ativo</label>
                                                                         <label class="radio-inline">
                                                                            <input disabled="" name="status" id="optionsRadiosInline2" type="radio" checked="" value="1">Inativo</label>
                                                                <?php 
                                                                    } 
                                                                ?>                                                                                                                                         
                                                             </div>   
                                                         </div>
                                                    </div>
                                            </br></br>
                                            <div class="form-group form-actions">
                                                <div class="col-md-9 col-md-offset-5">
                                                    <button type="button" onclick="location.href='log_list.php?loadCriteria=true'" class="btn btn-labeled btn-success btn-responsive"><span class="btn-label"><i class="livicon" data-name="arrow-left" data-size="17" data-loop="true" data-c="#fff" data-hc="#fff" title="Voltar"></i></span>&nbsp;Voltar</button>
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