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

if (isset($_GET['idusu']) && is_numeric($_GET['idusu'])) {
    $idusu = $_GET['idusu'];
    $sql = "select * from usuario where id = '$idusu'";
    $res = mysql_query($sql);
    $num = mysql_num_rows($res);
    if ($num > 0) {

                $login = mysql_result($res, $i, 'login');
                $nome = mysql_result($res, $i, 'nome');
                $email = mysql_result($res, $i, 'email');
                $perfil = mysql_result($res, $i, 'perfil_id');
                $unidade = mysql_result($res, $i, 'unidade_id');       
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
                                Editar Usu&aacute;rio
                            </div>
                            <div class="pull-right" id="tools"></div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-toolbar">
                            <form class="form-horizontal" action="usuario_exec.php" method="post">
                            <fieldset>
                                <div class="row">
                                <div style="display: block;" class="col-md-6 display-no">
                                    <div style="" class="form-group">
                                        <label for="input-text-2">
                                            Usu&aacute;rio</label>
                                        <input class="form-control" id="input-text-2" placeholder="insira usuario" type="text" name="login" value="<?php echo $login; ?>" autofocus>
                                    </div>
                                    <div style="position: static;" class="form-group">
                                        <label for="input-text-1">
                                            Nome completo</label>
                                        <input class="form-control" id="input-text-1" placeholder="insira nome" type="text" name="nome" value="<?php echo utf8_encode($nome) ; ?>">
                                    </div>
                                    <div style="position: static;" class="form-group">
                                        <label for="input-text-3">
                                            E-mail</label>
                                        <input class="form-control" id="input-text-3" placeholder="insira e-mail" type="email"  name="email" value="<?php echo $email; ?>">
                                    </div>
                                </div>
                                <div style="display: block;" class="col-md-6 display-no">
                                    <div style="position: static;" class="form-group">
                                        <label for="select-1">
                                            Perfil</label>                                            
                                            <select class="form-control" name="perfil">
                                            <?php  $sqltipo = "select * from perfil";
                                                   $restipo = mysql_query($sqltipo);
                                              
                                                   while ($rowTipo = mysql_fetch_array($restipo)) {
                                                        if ($rowTipo['id'] == $perfil) {
                                                            $selected = "selected='selected'";
                                                        } 
                                                        else {
                                                                $selected = "";
                                                        }
                                                
                                            ?>
                                          
                                              <option <?=$selected; ?> value="<?=$rowTipo['id']; ?>"><?php echo utf8_encode($rowTipo['tipo']); ?></option>
                                           
                                            <?php  } ?>  
                                            </select>
                                    </div>
                                    <div style="position: static;" class="form-group">
                                        <label for="select-2">
                                            Unidade</label>
                                            <select class="form-control" name="unidade">
                                            <?php  $sqltipo = "select * from unidade";
                                                   $restipo = mysql_query($sqltipo);
                                              
                                                   while ($rowTipo = mysql_fetch_array($restipo)) {
                                                        if ($rowTipo['id'] == $unidade) {
                                                            $selected = "selected='selected'";
                                                        } 
                                                        else {
                                                                $selected = "";
                                                        }
                                                
                                            ?>
                                          
                                              <option <?=$selected; ?> value="<?=$rowTipo['id']; ?>"><?php echo utf8_encode($rowTipo['nomefantasia']); ?></option>
                                           
                                            <?php   } ?>  
                                            </select>
                                    </div>
                                    <br>
                                    <div class="btn-group">
                                        <input type="hidden" name="act" value="update" />
                                        <input type="hidden" name="idusu" value="<?=$idusu; ?>" />
                                        <button type="submit" class="btn btn-default" name="sub" value="Atualizar">
                                            Confirmar</button>
                                        <button type="submit" class="btn btn-default" onclick="location.href='usuario_list.php'">
                                            Voltar</button>
                                    </div>
                                </div>
                                </div>
                            </fieldset>
                            </form> 
                            </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                         </div>
                    </div> 
            </section>
        </aside>  
    </div>

<!-- Include footer here-->   
<?php include 'footer.php';?>