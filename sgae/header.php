<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>.:: SGAE ::. Sistema para Gerenciamento de Auto Escolas</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- global css -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="css/styles/black.css" rel="stylesheet" type="text/css" id="colorscheme" />
    <link href="css/panel.css" rel="stylesheet" type="text/css" />
    <link href="css/metisMenu.css" rel="stylesheet" type="text/css" />
    <!-- end of global css -->
    <!--page level css -->
    <link href="vendors/fullcalendar/css/fullcalendar.css" rel="stylesheet" type="text/css" />
    <link href="css/pages/calendar_custom.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" media="all" href="vendors/jvectormap/jquery-jvectormap.css" />
    <link rel="stylesheet" href="vendors/animate/animate.min.css">
    <link rel="stylesheet" href="css/only_dashboard.css" />
    <link rel="stylesheet" type="text/css" href="vendors/datatables/extensions/bootstrap/dataTables.bootstrap.css" />
    <link href="css/pages/tables.css" rel="stylesheet" type="text/css" />
    <link href="css/pages/advbuttons.css" rel="stylesheet" type="text/css" />
    <link href="css/plano.css" rel="stylesheet" type="text/css" />
    <link href="css/foundation-datepicker.css" rel="stylesheet" type="text/css" />
    <!--end of page level css-->
    <!-- global js -->
    <script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="vendors/fullcalendar/jquery-ui.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <!-- livicons -->
    <script src="vendors/livicons/minified/raphael-min.js" type="text/javascript"></script>
    <script src="vendors/livicons/minified/livicons-1.4.min.js" type="text/javascript"></script>
    <script src="js/metisMenu.js" type="text/javascript"></script>
    <script src="vendors/holder/holder.js" type="text/javascript"></script>
    <!-- end of global js -->
    <!-- begining of page level js -->
    <!-- todolist -->
    <script src="js/todolist.js"></script>
    <!-- EASY PIE CHART JS -->
    <script src="vendors/charts/easypiechart.min.js"></script>
    <script src="vendors/charts/jquery.easypiechart.min.js"></script>
    <script src="vendors/charts/jquery.easingpie.js"></script>
    <!-- for calendar-->
    <script src="vendors/fullcalendar/moment.min.js" type="text/javascript"></script>
    <script src="vendors/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
    <!-- Realtime Server Load -->
    <script src="vendors/charts/jquery.flot.min.js" type="text/javascript"></script>
    <script src="vendors/charts/jquery.flot.resize.min.js" type="text/javascript"></script>
    <!-- Sparkline Chart -->
    <script src="vendors/charts/jquery.sparkline.js"></script>
    <!-- Back to Top -->
    <script type="text/javascript" src="vendors/countUp/countUp.js"></script>
    <!-- maps -->
    <script src="vendors/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="vendors/jscharts/Chart.js"></script>
    <script src="js/dashboard.js" type="text/javascript"></script>
    <script src="js/jquery.blockUI-2.7.0.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="vendors/datatables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="vendors/datatables/extensions/bootstrap/dataTables.bootstrap.js"></script>
    <script src="js/josh.js" type="text/javascript"></script>
    <script src="js/foundation-datepicker.js"></script>

</head>
<body class="skin-josh">
    <header class="header">
        <a href="index.php" class="logo">
            <img src="img/logoSGAE.png" alt="Logo">
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
            <div class="navbar-left">
                <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="img/img_menu_administracao.png" width="35" class="img-circle img-responsive pull-left" height="35" alt="riot">
                            <div class="riot">
                                <div>Administra&ccedil;&atilde;o<span><i class="caret"></i>
                                    </span>
                                </div>
                            </div>
                        </a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="">Cadastro</a>
                            <ul class="dropdown-menu">
                              <li><a href="usuario_list.php?loadCriteria=false">Usu&aacute;rio</a></li>
                              <li><a href="unidade_list.php?loadCriteria=false">Unidade</a></li>
                              <li><a href="pagina_list.php?loadCriteria=false">P&aacute;gina</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="log_list.php">Auditoria</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Pagamentos</a></li>
                    </ul>
                </li>
                </ul>
                <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="img/img_menu_disponibilidade.png" width="35" class="img-circle img-responsive pull-left" height="35" alt="riot">
                            <div class="riot">
                                <div>Disponibilidade<span><i class="caret"></i>
                                    </span>
                                </div>
                            </div>
                        </a>
                    <ul class="dropdown-menu">
                          <li><a href="#">Aulas Te&oacute;ricas</a></li>
                          <li><a href="#">Aulas Pr&aacute;ticas</a></li>
                    </ul>
                </li>
                </ul>
                <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="img/img_menu_cadastro.png" width="35" class="img-circle img-responsive pull-left" height="35" alt="riot">
                            <div class="riot">
                                <div>Cadastro<span><i class="caret"></i></span>
                                </div>
                            </div>
                        </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Alunos</a></li>
                        <li><a href="#">Cursos</a></li>
                        <li><a href="#">Instrutores</a></li>
                        <li><a href="#">Categorias</a></li>
                        <li><a href="#">Ve&iacute;culos</a></li>
                        <li><a href="#">Conte&uacute;do Pr&aacute;tico</a></li>
                        <li><a href="#">Infra&ccedil;&otilde;es</a></li>
                        <li><a href="#">Exames</a></li>
                        <li><a href="#">Escalas</a></li>
                        <li><a href="#">Turmas</a></li>
                        <li><a href="#">Disciplinas</a></li>
                        <li><a href="#">Grade</a></li>
                        <li><a href="#">Salas</a></li>
                        <li><a href="#">Feriados</a></li>
                        <li><a href="#">Tabela de Pre&ccedil;os</a></li>
                        <li><a href="#">Mensagens</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Itens de Caixa</a></li>
                        <li><a href="#">Bancos</a></li>
                        <li><a href="#">Contas Correntes</a></li>
                        <li><a href="#">Estoque</a></li>
                        <li><a href="#">Fornecedores</a></li>
                        <li><a href="#">Tabela de Consumos</a></li>
                    </ul>
                </li>
                </ul>
                <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="img/img_menu_movimentacao.png" width="35" class="img-circle img-responsive pull-left" height="35" alt="riot">
                            <div class="riot">
                                <div>Movimenta&ccedil;&atilde;o<span><i class="caret"></i></span>
                                </div>
                            </div>
                        </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Matr&iacute;cula</a></li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Programa&ccedil;&atilde;o de Aulas</a>
                            <ul class="dropdown-menu">
                              <li><a tabindex="-1" href="#">T&eacute;oricas</a></li>
                              <li><a href="#">Pr&aacute;ticas</a></li>
                             </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Entregas</a>
                            <ul class="dropdown-menu">
                              <li><a tabindex="-1" href="#">LADV</a></li>
                             </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Alunos</a>
                            <ul class="dropdown-menu">
                              <li><a tabindex="-1" href="#">Requerimentos</a></li>
                              <li><a href="#">Pend&ecirc;ncias</a></li>
                              <li><a href="#">Reposi&ccedil;&otilde;es</a></li>
                              <li><a href="#">Frequ&ecirc;ncia (te&oacute;rica e pr&aacute;tica)</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Biometria</a>
                            <ul class="dropdown-menu">
                              <li><a tabindex="-1" href="#">Aula Te&oacute;rica</a></li>
                              <li><a href="#">Aula Pr&aacute;tica</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Caixa</a>
                            <ul class="dropdown-menu">
                              <li><a tabindex="-1" href="#">Geral</a></li>
                              <li><a href="#">Individual</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Contas Corrente</a></li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Contas a Pagar</a>
                            <ul class="dropdown-menu">
                              <li><a tabindex="-1" href="#">Lan&ccedil;amento</a></li>
                              <li><a href="#">Baixa</a></li>
                              <li><a href="#">Cancelamento</a></li>
                              <li><a href="#">Situa&ccedil;&atilde;o (Atraso, a Pagar e Pagas)</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Contas a Receber</a>
                            <ul class="dropdown-menu">
                              <li><a tabindex="-1" href="#">Cart&otilde;es de Cr&eacute;dito</a></li>
                              <li><a href="#">Cheques Pr&eacute;-datados</a></li>
                              <li><a href="#">Notas Promiss&oacute;rias</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Consumos</a></li>
                    </ul>
                </ul>
                </li>
                </ul>
                <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="img/img_menu_relatorio.png" width="35" class="img-circle img-responsive pull-left" height="35" alt="riot">
                            <div class="riot">
                                <div>Relat&oacute;rio<span><i class="caret"></i></span>
                                </div>
                            </div>
                        </a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Alunos</a>
                            <ul class="dropdown-menu">
                              <li><a tabindex="-1" href="#">Ativos</a></li>
                              <li><a href="#">Inativos</a></li>
                              <li><a href="#">Avalia&ccedil;&atilde;o (aptos e inaptos)</a></li>
                              <li><a href="#">Aniversariantes</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Instrutores</a>
                            <ul class="dropdown-menu">
                              <li><a tabindex="-1" href="#">Escalas</a></li>
                              <li><a href="#">Horas (extras e trabalhadas)</a></li>
                              <li><a href="#">Avalia&ccedil;&otilde;es (te&oacute;ricas e pr&aacute;ticas)</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Ve&iacute;culos</a>
                            <ul class="dropdown-menu">
                              <li><a tabindex="-1" href="#">Hor&aacute;rios (vagos, ocupados, indispon&iacute;vel)</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Recebimentos</a>
                            <ul class="dropdown-menu">
                              <li><a tabindex="-1" href="#">Por Aluno ou Geral</a></li>
                              <li><a href="#">Por Origem (Cart&atilde;o, Cheque, Nota, Dinheiro)</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Programa&ccedil;&atilde;o</a>
                            <ul class="dropdown-menu">
                              <li><a tabindex="-1" href="#">Aluno</a></li>
                              <li><a href="#">Instrutor</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Biom&eacute;trico</a>
                            <ul class="dropdown-menu">
                              <li><a tabindex="-1" href="#">Frequ&ecirc;ncia (aula te&oacute;rica e pr&aacute;tica por aluno)</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Consumos</a></li>
                        <li><a href="#">Extratos Banc&aacute;rios</a></li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">2ª Via</a>
                            <ul class="dropdown-menu">
                              <li><a tabindex="-1" href="#">Recibo</a></li>
                              <li><a href="#">Ficha de Matr&iacute;cula</a></li>
                              <li><a href="#">Contrato</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Cont&aacute;bil</a></li>
                        <li><a href="#">Balancete</a></li>
                        <li><a href="#">Razonete</a></li>
                        <li><a href="#">Livro Caixa</a></li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Estat&iacute;sticos</a>
                            <ul class="dropdown-menu">
                              <li><a tabindex="-1" href="#">Matr&iacute;cula por Curso</a></li>
                              <li><a href="#">Aulas Ministradas</a></li>
                              <li><a href="#">Aptos e Inaptos</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Gerenciais</a>
                            <ul class="dropdown-menu">
                              <li><a tabindex="-1" href="#">Receitas</a></li>
                              <li><a href="#">Despesas</a></li>
                              <li><a href="#">Meios de Procura</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                </ul>
                <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="img/img_menu_ajuda.png" width="35" class="img-circle img-responsive pull-left" height="35" alt="riot">
                            <div class="riot">
                                <div>Ajuda<span><i class="caret"></i></span>
                                </div>
                            </div>
                        </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Documenta&ccedil;&atilde;o</a></li>
                        <li><a href="#">Sobre o SGAE</a></li>
                    </ul>
                </li>
                </ul>
            </div>
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="livicon" data-name="message-flag" data-loop="true" data-color="#42aaca" data-hovercolor="#42aaca" data-size="28"></i>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu dropdown-messages pull-right">
                            <li class="dropdown-title">4 New Messages</li>
                            <li class="unread message">
                                <a href="javascript:;" class="message"> <i class="pull-right" data-toggle="tooltip" data-placement="top" title="Mark as Read"><span class="pull-right ol livicon" data-n="adjust" data-s="10" data-c="#287b0b"></span></i>
                                    <img src="img/authors/avatar.jpg" class="img-responsive message-image" alt="icon" />
                                    <div class="message-body">
                                        <strong>Riot Zeast</strong>
                                        <br>Hello, You there?
                                        <br>
                                        <small>8 minutes ago</small>
                                    </div>
                                </a>
                            </li>
                            <li class="unread message">
                                <a href="javascript:;" class="message">
                                    <i class="pull-right" data-toggle="tooltip" data-placement="top" title="Mark as Read"><span class="pull-right ol livicon" data-n="adjust" data-s="10" data-c="#287b0b"></span></i>
                                    <img src="img/authors/avatar1.jpg" class="img-responsive message-image" alt="icon" />
                                    <div class="message-body">
                                        <strong>John Kerry</strong>
                                        <br>Can we Meet ?
                                        <br>
                                        <small>45 minutes ago</small>
                                    </div>
                                </a>
                            </li>
                            <li class="unread message">
                                <a href="javascript:;" class="message">
                                    <i class="pull-right" data-toggle="tooltip" data-placement="top" title="Mark as Read">
                                        <span class="pull-right ol livicon" data-n="adjust" data-s="10" data-c="#287b0b"></span>
                                    </i>
                                    <img src="img/authors/avatar5.jpg" class="img-responsive message-image" alt="icon" />
                                    <div class="message-body">
                                        <strong>Jenny Kerry</strong>
                                        <br>Dont forgot to call...
                                        <br>
                                        <small>An hour ago</small>
                                    </div>
                                </a>
                            </li>
                            <li class="unread message">
                                <a href="javascript:;" class="message">
                                    <i class="pull-right" data-toggle="tooltip" data-placement="top" title="Mark as Read">
                                        <span class="pull-right ol livicon" data-n="adjust" data-s="10" data-c="#287b0b"></span>
                                    </i>
                                    <img src="img/authors/avatar4.jpg" class="img-responsive message-image" alt="icon" />
                                    <div class="message-body">
                                        <strong>Ronny</strong>
                                        <br>Hey! sup Dude?
                                        <br>
                                        <small>3 Hours ago</small>
                                    </div>
                                </a>
                            </li>
                            <li class="footer">
                                <a href="#">View all</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="livicon" data-name="bell" data-loop="true" data-color="#e9573f" data-hovercolor="#e9573f" data-size="28"></i>
                            <span class="label label-warning">7</span>
                        </a>
                        <ul class=" notifications dropdown-menu">
                            <li class="dropdown-title">You have 7 notifications</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <i class="livicon danger" data-n="timer" data-s="20" data-c="white" data-hc="white"></i>
                                        <a href="#">after a long time</a>
                                        <small class="pull-right">
                                            <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                            Just Now
                                        </small>
                                    </li>
                                    <li>
                                        <i class="livicon success" data-n="gift" data-s="20" data-c="white" data-hc="white"></i>
                                        <a href="#">Jef's Birthday today</a>
                                        <small class="pull-right">
                                            <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                            Few seconds ago
                                        </small>
                                    </li>
                                    <li>
                                        <i class="livicon warning" data-n="dashboard" data-s="20" data-c="white" data-hc="white"></i>
                                        <a href="#">out of space</a>
                                        <small class="pull-right">
                                            <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                            8 minutes ago
                                        </small>
                                    </li>
                                    <li>
                                        <i class="livicon bg-aqua" data-n="hand-right" data-s="20" data-c="white" data-hc="white"></i>
                                        <a href="#">New friend request</a>
                                        <small class="pull-right">
                                            <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                            An hour ago
                                        </small>
                                    </li>
                                    <li>
                                        <i class="livicon danger" data-n="shopping-cart-in" data-s="20" data-c="white" data-hc="white"></i>
                                        <a href="#">On sale 2 products</a>
                                        <small class="pull-right">
                                            <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                            3 Hours ago
                                        </small>
                                    </li>
                                    <li>
                                        <i class="livicon success" data-n="image" data-s="20" data-c="white" data-hc="white"></i>
                                        <a href="#">Lee Shared your photo</a>
                                        <small class="pull-right">
                                            <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                            Yesterday
                                        </small>
                                    </li>
                                    <li>
                                        <i class="livicon warning" data-n="thumbs-up" data-s="20" data-c="white" data-hc="white"></i>
                                        <a href="#">David liked your photo</a>
                                        <small class="pull-right">
                                            <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                            2 July 2014
                                        </small>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">View all</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="img/authors/avatar3.jpg" width="35" class="img-circle img-responsive pull-left" height="35" alt="riot">
                            <div class="riot">
                                <div>Sair<span><i class="caret"></i></span>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header bg-light-blue">
                                <img src="img/authors/avatar3.jpg" class="img-responsive img-circle" alt="User Image">
                                <p class="topprofiletext"><?php echo $usuarioLogin ?></p>
                            </li>
                            <!-- Menu Body -->
                            <li>
                                <a href="#">
                                    <i class="livicon" data-name="user" data-s="18"></i> Meus Dados
                                </a>
                            </li>
                            <li role="presentation"></li>
                            <li>
                                <a href="#">
                                    <i class="livicon" data-name="gears" data-s="18"></i> Mudar senha
                                </a>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="lockscreen.html">
                                        <i class="livicon" data-name="lock" data-s="18"></i> Bloquear
                                    </a>
                                </div>
                                <div class="pull-right">
                                    <a href="logout.php">
                                        <i class="livicon" data-name="sign-out" data-s="18"></i> Sair
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>