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
<?php include 'header.php'; ?>
    
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <aside class="right-side">
            <!-- Main content -->
            <section class="content-header">
                <h1>Unidade: <?php echo $unidadeNome;?></h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="livicon" data-name="home" data-size="14" data-loop="true"></i>Painel de Controle</a></li>
                    <li><a href="#">Administra&ccedil;&atilde;o</a></li>
                    <li><a href="#">Cadastro</a></li>
                    <li><a href="#">Acesso</a></li>                    
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
                            <?php
                                if ($_GET['loadCriteria'] === 'true' && isset($_SESSION['form_param'])) { 
                                    $nomeFiltro = $_SESSION['form_param'][0];
                                    $usuarioFiltro = $_SESSION['form_param'][1];
                                    $perfilFiltro = $_SESSION['form_param'][2];
                                    $statusFiltro = $_SESSION['form_param'][3];
                                    $loadCriteria = 1;
                                    
                                } else {
                                    unset($_SESSION['form_param']);
                                    $nomeFiltro = "";
                                    $usuarioFiltro = "";
                                    $perfilFiltro = "";
                                    $statusFiltro = 0;
                                    $loadCriteria = 0;
                                }
                                //print_r(var_dump($_SESSION)); // Para debugar a Session
                            ?>
                           
                            <div class="panel-body">
                                <!--<form class="form-horizontal">-->
                                <form class="form-horizontal" method="post" action="" id="ajax_form">
                                    <input type="hidden" id="loadCriteria" value="<?php echo $loadCriteria; ?>"/>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="planoFiltro">Plano</label>
                                                <div class="col-md-9">
                                                    <select id="planoFiltro" class="form-control">
                                                        <option value="">Selecione o plano</option>
                                                        <?php
                                                            if ($_GET['loadCriteria'] === 'true' && isset($_SESSION['form_param'])) { 
                                                        
                                                                $pdo  = $registry->get('sgaedb');
                                                            	$stmt = $pdo->prepare("SELECT * FROM plano WHERE inativo = 0 ORDER BY nome ASC"); 
                                                            	$stmt->execute();
                                                            	$planoItem = $stmt->fetchAll();
                                                                foreach ($planoItem as $plano) {
                                                                    if ($planoFiltro === $plano['id'] ) {
                                                                        echo "<option value=".$plano['id']." selected>".$plano['nome']."</option>";
                                                                    }
                                                                    echo "<option value=".$plano['id'].">".$plano['nome']."</option>";
                                                                }
                                                            } else { 
                                                                $pdo  = $registry->get('sgaedb');
                                                            	$stmt = $pdo->prepare("SELECT * FROM plano WHERE inativo = 0 ORDER BY nome ASC"); 
                                                            	$stmt->execute();
                                                            	$planoItem = $stmt->fetchAll();
                                                                foreach ($planoItem as $plano) {
                                                                    echo "<option value=".$plano['id'].">".$plano['nome']."</option>";
                                                                }
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="perfilFiltro">Perfil</label>
                                                <div class="col-md-9">
                                                    <select id="perfilFiltro" class="form-control">
                                                        <option value="">Selecione o perfil</option>
                                                        <?php
                                                            if ($_GET['loadCriteria'] === 'true' && isset($_SESSION['form_param'])) { 
                                                        
                                                                $pdo  = $registry->get('sgaedb');
                                                            	$stmt = $pdo->prepare("SELECT * FROM perfil WHERE inativo = 0 ORDER BY tipo ASC"); 
                                                            	$stmt->execute();
                                                            	$perfilItem = $stmt->fetchAll();
                                                                foreach ($perfilItem as $perfil) {
                                                                    if ($perfilFiltro === $perfil['id'] ) {
                                                                        echo "<option value=".$perfil['id']." selected>".$perfil['tipo']."</option>";
                                                                    }
                                                                    echo "<option value=".$perfil['id'].">".$perfil['tipo']."</option>";
                                                                }
                                                            } else { 
                                                                $pdo  = $registry->get('sgaedb');
                                                            	$stmt = $pdo->prepare("SELECT * FROM perfil WHERE inativo = 0  ORDER BY tipo ASC"); 
                                                            	$stmt->execute();
                                                            	$perfilItem = $stmt->fetchAll();
                                                                foreach ($perfilItem as $perfil) {
                                                                    echo "<option value=".$perfil['id'].">".$perfil['tipo']."</option>";
                                                                }
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
                                                    <?php 
                                                        if($statusFiltro == 0) {
                                                            echo "<input name=\"statusFiltro\" id=\"statusAtivoFiltro\" type=\"radio\" checked=\"\" value=\"0\">Ativo</label>";
                                                            echo "<label class=\"radio-inline\">";
                                                            echo "<input name=\"statusFiltro\" id=\"statusInativoFiltro\" type=\"radio\" value=\"1\">Inativo</label>";
                                                        } else {         
                                                            echo "<input name=\"statusFiltro\" id=\"statusAtivoFiltro\" type=\"radio\"  value=\"0\">Ativo</label>";
                                                            echo "<label class=\"radio-inline\">";
                                                            echo "<input name=\"statusFiltro\" id=\"statusInativoFiltro\" type=\"radio\" checked=\"\" value=\"1\">Inativo</label>";
                                                        }
                                                    ?>                                                            
                                                </div>   
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                </br></br>
                                <div class="form-group form-actions">
                                    <div class="col-md-9 col-md-offset-4">
                                        <button type="button" onclick="prepareDiv()" id="buscar" class="btn btn-labeled btn-success btn-responsive"><span class="btn-label"><i class="livicon" data-name="search" data-size="17" data-loop="true" data-c="#fff" data-hc="#fff" title="Buscar"></i></span>&nbsp;Buscar</button>
                                        <button type="button" onclick="hideDiv()" class="btn btn-labeled btn-danger btn-responsive"><span class="btn-label"><i class="livicon" data-name="remove-circle" data-size="17" data-loop="true" data-c="#fff" data-hc="#fff" title="Limpar"></i></span>Limpar</button>
                                        <button type="button" onclick="location.href='acesso_insert.php'" class="btn btn-labeled btn-warning btn-responsive"><span class="btn-label"><i class="livicon" data-name="plus-alt" data-size="17" data-loop="true" data-c="#fff" data-hc="#fff" title="Buscar"></i></span>&nbsp;&nbsp;Novo</button>
                                    </div>
                                </div>  
                                </br></br></br>
                                <div id="preloader" style="display:none;">
                                 <h1 style="color: black;"><img src="img/loader.gif"/> Aguarde...</h1> 
                                </div>
                                <div id="tabela" class="panel panel-primary filterable" style="display:none;">
                                    <div class="panel-heading clearfix ">
                                        <div class="panel-title pull-left">
                                            <div class="caption">
                                                <i class="livicon" data-name="pencil" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                                Resultado da busca
                                            </div>
                                        </div>
                                        <div id="tools" class="tools pull-right">
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="panel-body table-responsive">
                                        <table class="table table-bordered " id="ajax_table">
                                            <thead>
                                                <tr class="filters">
                                                    <th style="width:320px">Plano</th>
                                                    <th style="width:315px">Perfil</th>
                                                    <th style="width:315px">P&aacute;gina</th>
                                                    <th style="width:10px">Ações</th>
                                                </tr>
                                            </thead> 
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
<!-- Include scripts here-->
<script type="text/javascript" src="acesso_search.js"></script>
<!-- Include footer here-->   
<?php include 'footer.php';?>