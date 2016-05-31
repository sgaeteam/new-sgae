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
            <div class="alert alert-success alert-dismissable margin5">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Unidade: <?php echo utf8_encode($unidadeNome);  ?> </strong>
            </div>
            <!-- Main content -->
            <section class="content-header">
                <h1>Administra&ccedil;&atilde;o > Cadastro > Usu&aacute;rio</h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <a href="index.php">
                            <i class="livicon" data-name="home" data-size="14" data-color="#333" data-hovercolor="#333"></i> Painel de Controle
                        </a>
                    </li>
                </ol>
            </section>
            <section class="content">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet box default">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="livicon" data-name="edit" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                Gerenciamento de Usu&aacute;rios
                            </div>
                            <div class="pull-right" id="tools"></div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-toolbar">
                                <div class="btn-group">
                                    <button id="sample_editable_1_new" class="btn btn-custom" onclick="location.href='usuario_insert.php'">
                                        Novo
                                        <i class="fa fa-plus"></i>
                                    </button>
                                    <button id="sample_editable_1_new" class="btn btn-danger" onclick="location.href='usuario_ilist.php'">
                                        Inativos
                                    </button>                                    
                                </div>
                            </div>
                            <div id="sample_editable_1_wrapper" class="">
                            <?php
                                if (isset($_GET['msg'])) {
                                    
                                    $msg = $_GET['msg'];

                                    echo "<span class=\"contador\">";
                                    include('inc/mensagens.php');
                                    echo "</span><br/><br/><br/>";
                                }
                            ?>
                                <table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_editable_1" role="grid">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1">Nome</th>
                                        <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="
                                                 Full Name
                                            : activate to sort column ascending" style="width: 350px;">E-mail</th>
                                        <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="
                                                 Points
                                            : activate to sort column ascending" style="width: 150px;">Usu&aacute;rio</th>
                                        <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="
                                                 Notes
                                            : activate to sort column ascending" style="width: 50px;">Perfil</th>
                                        <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="
                                                 Notes
                                            : activate to sort column ascending" style="width: 150px;">Unidade</th>    
                                        <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="
                                                 Edit
                                            : activate to sort column ascending" style="width: 50px;">Editar</th>
                                        <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="
                                                 Delete
                                            : activate to sort column ascending" style="width: 50px;">Desabilitar</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $ssql = "SELECT * FROM usuario, perfil, unidade WHERE usuario.perfil_id = perfil.id and usuario.unidade_id = unidade.id and usuario.inativo = 0 ORDER BY usuario.nome DESC";
                                            $rs = mysql_query($ssql);
                                            $num_total_registros = mysql_num_rows($rs);

                                            if ($num_total_registros > 0) {

                                                for ($i = 0; $i < $num_total_registros; $i++) {

                                                    $id = mysql_result($rs, $i, 'id');
                                                    $login = mysql_result($rs, $i, 'login');
                                                    $nome = mysql_result($rs, $i, 'nome');
                                                    $email = mysql_result($rs, $i, 'email');
                                                    $perfil = mysql_result($rs, $i, 'tipo');
                                                    $unidade = mysql_result($rs, $i, 'nomefantasia');


                                                    if (($i % 2) == 1) { 
                                        ?>                                       
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1"><?php echo utf8_encode($nome);?></td>
                                                            <td><?php echo $email;?></td>
                                                            <td><?php echo $login;?></td>
                                                            <td class="center"><?php echo utf8_encode($perfil);?></td>
                                                            <td class="center"><?php echo utf8_encode($unidade);?></td>
                                                            <td align="center">
                                                                <a class="edit" href="usuario_edit.php?idusu=<?php echo $id; ?>"><img src="img/bt_edit.gif" width="20" height="17" title="editar" alt="editar" border="0" align="absmiddle" style="padding-right:10px;"/></a>
                                                            </td>
                                                            <td align="center">
                                                                <a class="delete" href="usuario_exec.php?act=delete&idusu=<?php echo $id; ?>"><img src="img/bt_del.gif" width="20" height="17" title="desabilitar" alt="desabilitar" border="0" align="absmiddle" style="padding-right:10px;"/></a>
                                                            </td>                                                            
                                                        </tr>
                                        <?php      
                                                    } 
                                                    
                                                    else if (($i % 2) == 0) { 
                                        ?>
                                                        <tr role="row" class="even">
                                                            <td class="sorting_1"><?php echo utf8_encode($nome);?></td>
                                                            <td><?php echo $email;?></td>
                                                            <td><?php echo $login;?></td>
                                                            <td class="center"><?php echo utf8_encode($perfil);?></td>
                                                            <td class="center"><?php echo utf8_encode($unidade);?></td>
                                                            <td align="center">
                                                                <a class="edit" href="usuario_edit.php?idusu=<?php echo $id; ?>"><img src="img/bt_edit.gif" width="20" height="17" title="editar" alt="editar" border="0" align="absmiddle" style="padding-right:10px;"/></a>
                                                            </td>
                                                            <td align="center">
                                                                <a class="delete" href="usuario_exec.php?act=delete&idusu=<?php echo $id; ?>"><img src="img/bt_del.gif" width="20" height="17" title="desabilitar" alt="desabilitar" border="0" align="absmiddle" style="padding-right:10px;"/></a>
                                                            </td>  
                                                        </tr>
                                        <?php       
                                                    } 
                                                }
                                            } 
                                            else {

                                                echo ('<div id="nada_consta" align="center"><span class="txt">Nenhum resultado encontrado!</span></div>');
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                    </div> 
            </section>
        </aside>  
    </div>

<!-- Include footer here-->   
<?php include 'footer.php';?>