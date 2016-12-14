<?php 
session_start();
$usuarioLogin      = $_SESSION['UsuarioLogin'];
$cnpj              = $_SESSION['UnidadeCNPJ'];
$_SESSION['login'] = "lock";

?>
<!DOCTYPE html>
<html>

<head>
    <title> Acesso Bloqueado | SGAE </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- global level css -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <!-- end of global level css -->
    <!-- page level css -->
    <link href="css/pages/lockscreen.css" rel="stylesheet" />
    <link rel="stylesheet" href="vendors/formcolorloader/gradient/fort.css" />
    <!-- end of page level css -->
</head>

<body>
    <div class="top">
        <div class="colors"></div>
    </div>
    <div class="container">
        <div class="login-container">
            <div id="output">
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
            </div>
            <div class="avatar"></div>
            <div class="form-box">
                <!--<form method="POST" name="screen">-->
                <!--    <div class="form">-->
                <!--        <p class="form-control-static"><?php echo $usuarioLogin ?></p>-->
                <!--        <input type="password" name="user" class="form-control" placeholder="Senha">-->
                <!--        <button class="btn btn-info btn-block login" id="index" type="submit">OK</button>-->
                <!--    </div>-->
                <!--</form>-->
                <form method="post" action="../dologin.php" id="myForm">
                  <div class="form-group">
                    <input class="form-control input-lg" type="password" name="senha" id="senha" size="20" placeholder="Senha"/>
                  </div>
                  <div class="form-group">
                    <input type="submit" id="btn-login" name="sub" value="Acessar o sistema" class="btn btn-success btn-lg"/>
                    <input type="hidden" name="user2" value="<?php echo $usuarioLogin; ?>" />
                    <input type="hidden" name="cnpj" value="<?php echo $cnpj; ?>" />
                  </div>
                </form>
            </div>
        </div>
    </div>
    <!-- global js -->
    <script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="vendors/holder/holder.js"></script>
    <!-- end of global js -->
    <!-- begining of page level js-->
    <script src="js/lockscreen.js"></script>
    <script src="vendors/formcolorloader/gradient/fort.js"></script>
    <script>
    gradient();
    </script>
    <!-- end of page level js-->
</body>
</html>
