<?php
include('inc/config.php');
include('inc/verificasession.php');

$usuarioID      = $_SESSION['UsuarioID'];
$usuarioLogin   = $_SESSION['UsuarioLogin'];
$usuarioNome    = $_SESSION['UsuarioNome'];
$usuarioPerfil  = $_SESSION['UsuarioPerfil'];
$usuarioUnidade = $_SESSION['UsuarioUnidade'];
$unidadeNome    = $_SESSION['UnidadeNome'];

?>

<!-- Include header here-->
    <?php include 'header.php';?>

    <div class="wrapper row-offcanvas row-offcanvas-left">
        <aside class="right-side">
            <!-- Main content -->
            <section class="content-header">
                <h1>Seja Bem vindo(a) ao SGAE, <?php echo utf8_encode($usuarioNome);?> </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <a href="index.php">
                            <i class="livicon" data-name="home" data-size="14" data-color="#333" data-hovercolor="#333"></i> Painel de Controle
                            <li><a href="#">Planos</a></li>
                        </a>
                    </li>
                </ol>
            </section>
            <section class="content">

                  <!--============== Pricing ==============-->
                   <div class="container-fluid">
                     <div class="col-md-12 col-md-offset-4">
                      <div class="error-container">
                        <div class="error-main">
                          <h1>
                            <i class="livicon" data-name="lock" data-s="100" data-c="#ffbc60" data-hc="#ffbc60" data-eventtype="click" data-iteration="15" data-duration="2000"></i>
                              Acesso não autorizado.
                            </h1>
                        </div>
                      </div>
                     </div>
                    </div>
                    <div class="row PageHead" id="error">
                        <h3>O plano adquirido por sua Unidade ou seu perfil não permite acesso a esta funcionalidade.</h3>
                        <h3>Faça um upgrade no seu plano e garanta acesso a funcionalidade desejada.</h3>
                    </div>
                      <div class="row PageHead" id="pricing">
                        <div class="col-md-12">
                          <h1>Planos feitos para seu bolso</h1>
                          <h3>Nossos planos n&atilde;o tem custo de implanta&ccedil;&atilde;o e voc&ecirc; pode pagar mensalmente.</h3>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6 col-md-3 PlanPricing Danger">
                          <div class="planName"> <span class="price">R$ 150</span>
                            <h3>B&aacute;sico</h3>
                            <p>Plano Mensal</p>
                          </div>
                          <div class="planFeatures">
                            <ul>
                              <li> 1 GB Storage Space</li>
                              <li>10 GB Monthly Bandwidth</li>
                              <li>10 Sub-domains</li>
                              <li>25 Email Accounts</li>
                              <li>Control panel</li>
                              <li>24/7 Support</li>
                            </ul>
                          </div>
                          <p> <a href="#" role="button" class="btn btn-danger btn-lg">Solicitar </a> </p>
                        </div>
                        <div class="col-sm-6 col-md-3 PlanPricing Alert">
                          <div class="planName"> <span class="price">R$ 200</span>
                            <h3>Intermedi&aacute;rio I</h3>
                            <p>Plano Mensal</p>
                          </div>
                          <div class="planFeatures">
                            <ul>
                              <li> 5 GB Storage Space</li>
                              <li>50 GB Monthly Bandwidth</li>
                              <li>20 Sub-domains</li>
                              <li>50 Email Accounts</li>
                              <li>Control panel</li>
                              <li>24/7 Support</li>
                            </ul>
                          </div>
                          <p> <a href="#" role="button" class="btn btn-alert btn-lg">Solicitar </a> </p>
                        </div>
                        <div class="col-sm-6 col-md-3 PlanPricing Alert">
                          <div class="planName"> <span class="price">R$ 250</span>
                            <h3>Intermedi&aacute;rio II</h3>
                            <p>Plano Mensal</p>
                          </div>
                          <div class="planFeatures">
                            <ul>
                              <li> 10 GB Storage Space</li>
                              <li>Unlimited Bandwidth</li>
                              <li>50 Sub-domains</li>
                              <li>100 Email Accounts</li>
                              <li>Control panel</li>
                              <li>24/7 Support</li>
                            </ul>
                          </div>
                          <p> <a href="#" role="button" class="btn btn-alert btn-lg">Solicitar </a> </p>
                        </div>
                        <div class="col-sm-6 col-md-3 PlanPricing">
                          <div class="planName"> <span class="price">R$ 300</span>
                            <h3>Completo</h3>
                            <p>Plano Mensal</p>
                          </div>
                          <div class="planFeatures">
                            <ul>
                              <li> 20 GB Storage Space</li>
                              <li>Unlimited Bandwidth</li>
                              <li>100 Sub-domains</li>
                              <li>200 Email Accounts</li>
                              <li>Control panel</li>
                              <li>24/7 Support</li>
                            </ul>
                          </div>
                          <p> <a href="#" role="button" class="btn btn-success btn-lg">Solicitar </a> </p>
                        </div>
                      </div>
                      
                      <!--============== Compare Plans ==============-->
                      
                      <div class="row PageHead">
                        <div class="col-md-12">
                          <h1>Comparar Planos</h1>
                          <h3>Tabela de compara&ccedil;&atilde;o de planos</h3>
                        </div>
                      </div>
                      <div class="row ComparePlans">
                        <div class="col-md-3 CompareList hidden-sm hidden-xs">
                          <div class="planHead1"></div>
                          <div class="planFeatures">
                            <ul>
                              <li>Implanta&ccedil;&atilde;o</li>
                              <li> Multi Domain </li>
                              <li> Storage Space</li>
                              <li>Monthly Bandwidth</li>
                              <li> MySQL Databases</li>
                              <li>Sub-domains</li>
                              <li>Email Accounts</li>
                              <li> Shared 128bit SSL</li>
                              <li>Control panel</li>
                              <li>24/7 Support</li>
                            </ul>
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-3 pricing2">
                          <div class="planHead3">
                            <h3>B&aacute;sico</h3>
                          </div>
                          <div class="planFeatures">
                            <ul class="visible-sm visible-xs">
                              <li>Setup Fee : NA</li>
                              <li> Multi Domain : Up to 2 </li>
                              <li> Storage Space 1 GB</li>
                              <li>Monthly Bandwidth 10 GB</li>
                              <li> MySQL Databases : 5</li>
                              <li>Sub-domains : 2</li>
                              <li>Email Accounts : 25</li>
                              <li> Shared 128bit SSL : No</li>
                              <li>Control panel : Yes</li>
                              <li>24/7 Support : No</li>
                            </ul>
                            <ul class="hidden-sm hidden-xs">
                              <li>NA</li>
                              <li> Up to 2 </li>
                              <li> 1 GB</li>
                              <li>10 GB</li>
                              <li> 5</li>
                              <li>2</li>
                              <li>25</li>
                              <li><img src="img/cross.png" alt="cross"> </li>
                              <li> <img src="img/tick.png" alt="tick"></li>
                              <li><img src="img/cross.png" alt="cross"> </li>
                            </ul>
                          </div>
                          <p> <a href="#" role="button" class="btn btn-danger btn-lg">Solicitar </a> </p>
                        </div>
                        <div class="col-sm-6 col-md-3 pricing3">
                          <div class="planHead4">
                            <h3>Intermedi&aacute;rio</h3>
                          </div>
                          <div class="planFeatures">
                            <ul class="visible-sm visible-xs">
                              <li>Setup Fee : NA</li>
                              <li> Multi Domain : Up to 2 </li>
                              <li> Storage Space 1 GB</li>
                              <li>Monthly Bandwidth 10 GB</li>
                              <li> MySQL Databases : 5</li>
                              <li>Sub-domains : 2</li>
                              <li>Email Accounts : 25</li>
                              <li> Shared 128bit SSL : No</li>
                              <li>Control panel : Yes</li>
                              <li>24/7 Support : Yes</li>
                            </ul>
                            <ul class="hidden-sm hidden-xs">
                              <li>NA</li>
                              <li> Up to 2 </li>
                              <li> 1 GB</li>
                              <li>10 GB</li>
                              <li> 5</li>
                              <li>2</li>
                              <li>25</li>
                              <li><img src="img/cross.png" alt="cross"> </li>
                              <li> <img src="img/tick.png" alt="tick"></li>
                              <li><img src="img/tick.png" alt="tick"> </li>
                            </ul>
                          </div>
                          <p> <a href="#" role="button" class="btn btn-alert btn-lg">Solicitar </a> </p>
                        </div>
                        <div class="col-sm-6 col-md-3 col-sm-offset-3 col-md-offset-0 pricing1">
                          <div class="planHead2">
                            <h3>Completo</h3>
                          </div>
                          <div class="planFeatures">
                            <ul class="visible-sm visible-xs">
                              <li>Setup Fee : NA</li>
                              <li> Multi Domain : Up to 2 </li>
                              <li> Storage Space 1 GB</li>
                              <li>Monthly Bandwidth 10 GB</li>
                              <li> MySQL Databases : 5</li>
                              <li>Sub-domains : 2</li>
                              <li>Email Accounts : 25</li>
                              <li> Shared 128bit SSL : Yes</li>
                              <li>Control panel : Yes</li>
                              <li>24/7 Support : Yes</li>
                            </ul>
                            <ul class="hidden-sm hidden-xs">
                              <li>NA</li>
                              <li> Up to 2 </li>
                              <li> 1 GB</li>
                              <li>10 GB</li>
                              <li> 5</li>
                              <li>2</li>
                              <li>25</li>
                              <li><img src="img/tick.png" alt="tick"> </li>
                              <li> <img src="img/tick.png" alt="tick"></li>
                              <li><img src="img/tick.png" alt="tick"> </li>
                            </ul>
                          </div>
                          <p> <a href="#" role="button" class="btn btn-success btn-lg">Solicitar </a> </p>
                        </div>
                      </div>
                    </div>
                    <!--Container Closed--> 

            </section>
        </aside>  
    </div>

<!-- Include footer here-->   
<?php include 'footer.php';?>