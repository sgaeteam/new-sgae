<script src="js/sgae.validate.acesso.js" type="text/javascript"></script>
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
    <script src="js/sgae.validate.acesso.js" type="text/javascript"></script>
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
                                    <form class="form-horizontal" action="acesso_exec.php" method="post">
                                        <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3" for="planoFiltro">Plano</label>
                                                            <div class="col-md-9">
                                                                <select id="planoFiltro" name="plano" class="form-control">
                                                                    <option value="">Selecione o plano</option>
                                                                    <?php
                                                                        $pdo  = $registry->get('sgaedb');
                                                                    	$stmt = $pdo->prepare("SELECT * FROM plano WHERE inativo = 0 ORDER BY nome ASC"); 
                                                                    	$stmt->execute();
                                                                    	$planoItem = $stmt->fetchAll();
                                                                        foreach ($planoItem as $plano) {
                                                                            echo "<option value=".$plano['id'].">".$plano['nome']."</option>";
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
                                                                <select id="perfilFiltro" name="perfil" class="form-control">
                                                                    <option value="">Selecione o perfil</option>
                                                                    <?php
                                                                        $pdo  = $registry->get('sgaedb');
                                                                    	$stmt = $pdo->prepare("SELECT * FROM perfil WHERE inativo = 0  ORDER BY tipo ASC"); 
                                                                    	$stmt->execute();
                                                                    	$perfilItem = $stmt->fetchAll();
                                                                        foreach ($perfilItem as $perfil) {
                                                                            echo "<option value=".$perfil['id'].">".$perfil['tipo']."</option>";
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>                                            
                                        </div>
                                        <div class="row">
                                            <div id="tabela" class="panel panel-primary filterable">
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
                                                    <table class="table table-bordered " id="acesso_insert_table">
                                                        <thead>
                                                            <tr class="filters">
                                                                <th style="width:10px"><input type="checkbox" id="check_all_none" checked></input></th>
                                                                <th style="width:800px">P&aacute;gina</th>
                                                            </tr>
                                                        </thead> 
                                                         <tbody>
                                                        <?php
                                                           $pdo = $registry->get('sgaedb');
                                                           $stmt = $pdo->prepare("SELECT * FROM pagina WHERE inativo = 0 ORDER BY nome ASC"); 
                                                           $stmt->execute();
                                                           $paginaItem = $stmt->fetchAll();
                                                           foreach ($paginaItem as $pagina) {
                                                               echo "<tr align=\"center\"><td><input type=\"checkbox\" class=\"flat-red\" name=\"paginas[]\" value=".$pagina['id']." checked/></td><td>".$pagina['nome']."</td></tr>";
                                                           }
                                                        ?>
                                                    </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                                                        
                                            </br>
                                            <div class="form-group form-actions">
                                                <div class="col-md-9 col-md-offset-5">
                                                    <input type="hidden" name="act" value="insert" />
                                                    <button id = "botao_acesso_form_submit" type="submit" class="btn btn-labeled btn-success btn-responsive"><span class="btn-label"><i class="livicon" data-name="save" data-size="17" data-loop="true" data-c="#fff" data-hc="#fff" title="Salvar"></i></span>&nbsp;Salvar</button>
                                                    <button type="button" onclick="location.href='acesso_list.php?loadCriteria=true'" class="btn btn-labeled btn-warning btn-responsive"><span class="btn-label"><i class="livicon" data-name="remove-circle" data-size="17" data-loop="true" data-c="#fff" data-hc="#fff" title="Voltar"></i></span>Voltar</button>
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