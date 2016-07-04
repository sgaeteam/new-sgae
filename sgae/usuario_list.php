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
                                                        <input name="statusFiltro" id="statusAtivoFiltro" type="radio" checked="" value="0">Ativo</label>
                                                     <label class="radio-inline">
                                                        <input name="statusFiltro" id="statusInativoFiltro" type="radio" value="1">Inativo</label>
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
                                        <button type="button" onclick="location.href='usuario_insert.php'" class="btn btn-labeled btn-warning btn-responsive"><span class="btn-label"><i class="livicon" data-name="plus-alt" data-size="17" data-loop="true" data-c="#fff" data-hc="#fff" title="Buscar"></i></span>&nbsp;&nbsp;Novo</button>
                                    </div>
                                </div>  
                                </br></br></br>
                                <div id="preloader" style="display:none;">
                                 <h1 style="color: black;"><img src="img/loader.gif"/> Aguarde...</h1> 
                                </div>
                                <div id="tabela" class="panel panel-primary" style="display:none;">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <i class="livicon" data-name="pencil" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                            Resultado da busca
                                        </h4>
                                    </div>
                                    <br/>
                                    <div class="panel-body">
                                        <table class="table table-bordered " id="ajax_table">
                                            <thead>
                                                <tr class="filters">
                                                    <th style="width:160px">Nome</th>
                                                    <th style="width:40px">Usu&aacute;rio</th>
                                                    <th style="width:50px">E-mail</th>
                                                    <th style="width:35px">Perfil</th>
                                                    <th style="width:120px">Unidade</th>
                                                    <th style="width:117px">Ações</th>
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
<script type="text/javascript" src="usuario_search.js"></script>
<!-- Include footer here-->   
<?php include 'footer.php';?>