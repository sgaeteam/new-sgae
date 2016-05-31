<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>SGAE - Sistema para Gerenciamento de Auto Escolas</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<!--==============GOOGLE FONT - OPEN SANS=================-->
<link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

<!--==============MAIN CSS FOR COMING SOON PAGE=================-->

<link href="css/hosting.css" rel="stylesheet" media="all">

<!--==============Mordernizr =================-->

<script src="js/modernizr.js"></script>
<!--===================FLEX SLIDER=======================-->

<link rel="stylesheet" href="css/flexslider.css" />
<script src="js/jquery-1.9.0.min.js"></script>
<script src="js/jquery.maskedinput-1.3.js"></script>
<script src="js/jquery.flexslider.js"></script>
<script type="text/javascript">
  $(window).load(function() {
     $('.flexslider').flexslider({
        animation: "slide",
		useCSS: Modernizr.touch
      });
  });
</script>

<!--==============CONTACT FORM=================-->
<script src="js/contact_form.js"></script>
</head>
<body id="home" data-spy="scroll" data-target=".navbar-collapse" data-offset="100">

<!--==============Logo & Menu Bar=================-->

<nav class="navbar navbar-default navbar-fixed-top" role="navigation"> 
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="#"> <img src="images/flathost-logo.png" alt="logo"></a> </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="#home">HOME</a></li>
        <li class="hidden-sm"><a href="#features">Funcionalidades</a></li>
        <li class="hidden-sm"><a href="#testimonials">Clientes</a></li>
        <li><a href="#pricing">Planos e Pre&ccedil;os</a></li>
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ajuda <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="blog.html">Manual</a></li>
            <li><a href="blog-post.html">V&iacute;deos Tutoriais</a></li>
          </ul>
        </li>
        <li><a href="#contact">CONTATO</a></li>
        <li><a href="#" role="button" data-toggle="modal" data-target="#Login" class="btn btn-success">Entrar</a></li>        
        <!--<li><a href="#" role="button" data-toggle="modal" data-target="#Login">Login</a></li>-->
        <!--<li><a href="whmcs/register.php" role="button" class="btn btn-success">Sign Up</a></li>-->
      </ul>
      </li>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
    
  </div>
</nav>

<!--==============HEADER =================-->
<div class="jumbotron masthead"> 
  
  <!--==============Hero Unit=================-->
  <div class="container">
    <div class="flexslider">
      <ul class="slides">
        <li>
          <div class="hero-unit">
            <h1>SGAE</h1>
            <h2>Sistema para Gest&atilde;o de Auto Escolas</h2>
            <h3>O SGAE &eacute; um sistema de gest&atilde;o completo, 100% na nuvem, e completamente adapt&aacute;vel a qualquer que seja o tamanho do seu neg&oacute;cio.</h3>
            <div class="slider-actions text-center"> <a href="#" class="btn btn-success btn-lg">Experimente Gr&aacute;tis </a> <a href="#" class="btn btn-danger btn-lg">Planos e Pre&ccedil;os </a> </div>
          </div>
        </li>
        <li>
          <div class="slide2">
            <p><img src="images/img_responsive.png" alt="server" class="img-responsive center-block"></p>
            <h1>Utilize em diversos dispositivos</h1>
          </div>
        </li>
        <li>
          <div class="slide3">
            <p class="pull-left"><img src="images/img_nuvem.png" alt="server" class="img-responsive"></p>
            <h1>Sistema de gest&atilde;o 100% na nuvem</h1>
            <h3>Flathost is a bootstrap based responsive minimal, flat and afforable hosting template with easy customization and great support </h3>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>

<!--==============Content Area=================-->

<div class="container"> 
  <!--============== Main Features ==============-->
  
  <div class="row mainFeatures" id="features">
    <div class="col-sm-6 col-md-4">
      <div class="img-thumbnail"> <img src="images/img_security.png" width="85" height="88" alt="secure">
        <div class="caption">
          <h4>Seguro e confi&aacute;vel</h4>
          <p>Cuidamos da seguran&ccedil;a de suas informa&ccedil;&otilde;es garantindo o tr&aacute;fego e armazenamento seguro de todos os dados de sua empresa.</p>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-4">
      <div class="img-thumbnail"> <img src="images/img_network.png" width="85" height="88" alt="secure">
        <div class="caption">
          <h4>Consolida&ccedil;&atilde;o dos Dados</h4>
          <p>Sistema integrado de gest&atilde;o que permite o controle de v&aacute;rias unidades da Empresa ao mesmo tempo, com dados precisos, completos e em tempo real.</p>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-0">
      <div class="img-thumbnail"> <img src="images/img_pc.png" width="85" height="88" alt="secure">
        <div class="caption">
          <h4>Disponibilidade de Acesso</h4>
          <p>Acesse e tenha controle de todos os dados da empresa aonde voc&ecirc; estiver, inclusive utilizando dispositivos m&oacute;veis, com acesso a qualquer hora e de qualquer lugar, pela Internet.</p>
        </div>
      </div>
    </div>
  </div>
  
  <!--============== Other Features ==============-->
  
  <div class="row PageHead">
    <div class="col-md-12">
      <h1>Agilidade, Credibilidade e Efici&ecirc;ncia</h1>
      <h3>Gerencie totalmente sua Auto Escola</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6 features"> <img src="images/setup_icon.png" alt="icon" class="img-responsive">
      <h4>Painel de Controle</h4>
      <p>O Painel de Controle permite que voc&ecirc; tenha uma vis&atilde;o ampla das principais informa&ccedil;&otilde;es da empresa com acesso as informa&ccedil;&otilde;es de pagamento, documentos e movimenta&ccedil;&atilde;o financeira.</p>
    </div>
    <div class="col-sm-6 features"> <img src="images/backup_icon.png" alt="icon" class="img-responsive">
      <h4>Constant Backups</h4>
      <p>Your hosting account is backed up 4 times a day as standard, with our backup integration. We use dedicated backup servers, providing fast & easy individual file rollback abilities.</p>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6 features"> <img src="images/git_icon.png" alt="icon" class="img-responsive">
      <h4>GIT/SVN Support</h4>
      <p>Web Developers love using version control systems. All of our hosting accounts can use GIT & SVN command line tools on our servers. Simply request SSH access to get started.</p>
    </div>
    <div class="col-sm-6 features"> <img src="images/script_icon.png" alt="icon" class="img-responsive">
      <h4>280+ Install Scripts</h4>
      <p>All our hosting accounts allow you to install popular software such as Wordpress, Drupal, Joolma and Magento in one easy step. Upgrading your software is just as easy!</p>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6 features"> <img src="images/cpanel_icon.png" alt="icon" class="img-responsive">
      <h4>cPanel Included</h4>
      <p>All hosting accounts come with the latest version of cPanel. This makes life easy for you to do routine tasks such as setting up email addresses and managing MySQL databases.</p>
    </div>
    <div class="col-sm-6 features"> <img src="images/php_icon.png" alt="icon" class="img-responsive">
      <h4>Latest PHP &amp; MySQL</h4>
      <p>Our network runs the latest stable and secure versions of PHP & MySQL. We also implement strict security and firewall rules protecting your website from unwanted visitors 24/7.</p>
    </div>
  </div>
  
  <!--============== Features Layout ==============-->
  
  <div class="row FeatLayout">
    <div class="col-md-5 Featimg"> <img src="images/img_imac.png" alt="feature" class="img-responsive center-block"></div>
    <div class="col-md-7">
      <h1>Mais recursos</h1>
      <p class="lead">Veja mais o que o sistema tem dispon&iacute;vel para sua Empresa</p>
      <p>Al&eacute;m de todos os benef&iacute;cios, o SGAE ainda oferece suporte e suas d&uacute;vidas sempre respondidas. Constantes atualiza&ccedil;&otilde;es gratuitas e novos recursos sempre est&atilde;o sendo desenvolvidos por nossa equipe </p>
      <ul class="ticklist">
        <li>Contrata&ccedil;&atilde;o R&aacute;pida</li>
        <li>Suporte Eficiente</li>
        <li>Atualiza&ccedil;&otilde;es Constantes</li>
        <li>Seguran&ccedil;a</li>
        <li>F&aacute;cil Utiliza&ccedil;&atilde;o</li>
        <li>Manuais e Tutoriais</li>
      </ul>
    </div>
  </div>
  
  <!--============== Testimonials ==============-->
  <div class="row PageHead" id="testimonials">
    <div class="col-md-12">
      <h1>Clientes e Parceiros</h1>
      <h3>Kind words from our valuable customers</h3>
    </div>
  </div>
  <div class="row Testimonials">
    <div class="col-sm-6 col-md-4 tm-data">
      <div class="img-thumbnail"> <img src="images/client1.jpg" alt="client">
        <div class="caption">
          <p>Flathost servers are having high physical security and power redundancy Your data will be secure with us.</p>
          <h5>James, Envato</h5>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-4 tm-data">
      <div class="img-thumbnail"> <img src="images/client2.jpg" alt="client">
        <div class="caption">
          <p>With our ultra mordern servers and optical cables, your data will be transfered to end user in milliseconds.</p>
          <h5>Mariya, Activeden</h5>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-0 tm-data">
      <div class="img-thumbnail"> <img src="images/client3.jpg" alt="client">
        <div class="caption">
          <p>We have a dedicated team of support for sales and support to help you in anytime. You can also chat with us.</p>
          <h5>Steven, Microlancer</h5>
        </div>
      </div>
    </div>
  </div>
  
  <!--============== Partners List ==============-->
  
  <div class="row PartnersList"> <img src="images/logo1.jpg" alt="logo"> <img src="images/logo2.jpg" alt="logo"> <img src="images/logo3.jpg" alt="logo"> <img src="images/logo4.jpg" alt="logo"> <img src="images/logo5.jpg" alt="logo"> </div>
  
  <!--============== Pricing ==============-->
  <div class="row PageHead" id="pricing">
    <div class="col-md-12">
      <h1>Planos feitos para seu bolso</h1>
      <h3>Nossos planos n&atilde;o tem custo de implanta&ccedil;&atilde;o e voc&ecirc; pode pagar mensalmente.</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6 col-md-3 PlanPricing Danger">
      <div class="planName"> <span class="price">R$ 100</span>
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
      <div class="planName"> <span class="price">R$ 150</span>
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
      <div class="planName"> <span class="price">R$ 200</span>
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
      <div class="planName"> <span class="price">R$ 250</span>
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
          <li><img src="images/cross.png" alt="cross"> </li>
          <li> <img src="images/tick.png" alt="tick"></li>
          <li><img src="images/cross.png" alt="cross"> </li>
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
          <li><img src="images/cross.png" alt="cross"> </li>
          <li> <img src="images/tick.png" alt="tick"></li>
          <li><img src="images/tick.png" alt="tick"> </li>
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
          <li><img src="images/tick.png" alt="tick"> </li>
          <li> <img src="images/tick.png" alt="tick"></li>
          <li><img src="images/tick.png" alt="tick"> </li>
        </ul>
      </div>
      <p> <a href="#" role="button" class="btn btn-success btn-lg">Solicitar </a> </p>
    </div>
  </div>
</div>
<!--Container Closed--> 

<!--============== Domain Search ==============-->

<div class="domain">
  <div class="container">
    <div class="row PageHead">
      <div class="col-md-12">
        <h1>Search Domain</h1>
        <h3>Enter the domain name to register or transfer</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <form action="https://yourwebsite.com/whmcs/domainchecker.php" method="post">
          <input type="hidden" name="direct" value="true" />
          <div class="row">
            <div class="col-sm-12 form-group">
              <div class="input-group">
                <input class="form-control" type="text" name="domain" size="20" placeholder="your domain name" />
                <span class="input-group-btn">
                <select class="btn btn-default" name="ext">
                  <option selected>.com</option>
                  <option>.net</option>
                  <option>.org</option>
                  <option>.biz</option>
                  <option>.com.au</option>
                  <option>.net.au</option>
                  <option>.info</option>
                  <option>.asia</option>
                  <option>.co.nz</option>
                  <option>.org.au</option>
                </select>
                </span> </div>
            </div>
          </div>
          <div class="submitbtn">
            <input type="submit" class="btn btn-success btn-lg" value="Search Domain" />
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!--============== Contact us ==============-->

<div class="container" id="contact">
  <div class="row PageHead">
    <div class="col-md-12">
      <h1>Contate-nos</h1>
      <h3>Mantenha contato com conosco. Estamos aqui para ajud&aacute;-lo</h3>
    </div>
  </div>
  <div class="row ContactUs">
    <div class="col-md-6">
      <div class="row">
        <div class="col-sm-6">
          <h4> Australia </h4>
          <address>
          <strong>Flat Host Pty Ltd</strong><br>
          13/2 Elizabeth Street<br>
          Melbourne VIC 30007<br>
          Australia<br>
          <abbr title="Phone">P:</abbr> +61 3 8376 6284<br>
          <br>
          </address>
        </div>
        <div class="col-sm-6">
          <h4>India</h4>
          <address>
          <strong>Flat Host Pty Ltd</strong><br>
          MG Road<br>
          Pulleppady Jn<br>
          Kochi, India<br>
          <abbr title="Phone">P:</abbr>+91 9 8376 6280<br>
          <br>
          </address>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mapwrap">
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3151.835837652496!2d144.955431!3d-37.817313999999996!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xedc33f230d1355b1!2sEnvato+Pty+Ltd!5e0!3m2!1sen!2sin!4v1408780745585" width="100%" height="250" frameborder="0" style="border:0"></iframe>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <form class="form" id="phpcontactform">
        <div class="form-group">
          <input class="form-control" type="text" placeholder="Nome Completo" name="name" id="name">
        </div>
        <div class="form-group">
          <input class="form-control" type="email" placeholder="Email" name="email" id="email">
        </div>
        <div class="form-group">
          <input class="form-control" type="text" placeholder="Telefone de Contato" name="mobile" id="mobile">
        </div>
        <div class="form-group">
          <textarea class="form-control" rows="10" name="message" placeholder="Sua mensagem" id="message"></textarea>
        </div>
        <div class="form-group">
          <p>
            <input class="btn btn-success btn-lg" type="submit" value="Enviar Mensagem" />
          </p>
          <span class="loading"></span> </div>
      </form>
    </div>
  </div>
</div>

<!--============== Footer ==============-->

<div class="footer">
  <div class="container">
    <div class="row footerlinks">
      <div class="col-sm-4 col-md-2">
        <p>CALL US</p>
        <ul>
          <li> +1 4528 254 247</li>
          <li>+1 4002 188 355</li>
        </ul>
      </div>
      <div class="col-sm-4 col-md-2">
        <p>FOLLOW US</p>
        <ul>
          <li><a href="http://twitter.com/surjithctly" target="_blank">Follow on Twitter</a></li>
          <li><a href="http://web3canvas.com" target="_blank">Like us on Facebook</a></li>
          <li><a href="http://surjithctly.in" target="_blank">Join on Linkedin</a> </li>
        </ul>
      </div>
      <div class="col-sm-4 col-md-2">
        <p>COMPANY</p>
        <ul>
          <li> <a href="#">About us</a></li>
          <li><a href="#">Latest from Blog</a></li>
          <li><a href="#">Our Team</a></li>
        </ul>
      </div>
      <div class="col-sm-4 col-md-2">
        <p>EMAIL US</p>
        <ul>
          <li><a href="mailto:support@mail.in" target="_blank">support@mail.com</a></li>
          <li><a href="mailto:mail@mail.in" target="_blank">sales@mail.com</a></li>
        </ul>
      </div>
      <div class="col-sm-4 col-md-2">
        <p>LEGAL TERMS</p>
        <ul>
          <li><a href="#">Terms of use</a></li>
          <li><a href="#">Privacy Policy</a></li>
        </ul>
      </div>
      <div class="col-sm-4 col-md-2">
        <p>Live Chat</p>
        <ul>
          <li> <a href="#" class="btn btn-success btn-small">CHAT WITH US </a> </li>
        </ul>
      </div>
    </div>
    <div class="row copyright">
      <div class="pull-right"><img src="images/logo-footer.png" alt="logo"></div>
      <p>Copyright &copy; 2016. SgaeTeam </p>
    </div>
  </div>
</div>

<!--==============MODAL LOGIN=================--> 

<!-- Modal -->
<div class="modal fade LoginSignup" id="Login" tabindex="-1" role="dialog" aria-labelledby="LoginLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title">SGAE - Login</h3>
      </div>
      <div class="modal-body">
        <form method="post" action="dologin.php">
          <div class="form-group">
            <input class="form-control input-lg" type="text" name="cnpj" id="cnpj" size="15" placeholder="CNPJ"/>
          </div>			
          <div class="form-group">
            <input class="form-control input-lg" type="text" name="user2" size="50" placeholder="Usu&aacute;rio"/>
          </div>
          <div class="form-group">
            <input class="form-control input-lg" type="password" name="senha" size="20" placeholder="Senha"/>
          </div>
          <div class="form-group">
            <input type="submit" name="sub" value="Acessar o sistema" class="btn btn-success btn-lg"/>
            <?php include_once('sgae/inc/mensagens.php'); ?>  
          </div>
        </form>
      </div>
    </div>
    <!-- /.modal-content --> 
  </div>
  <!-- /.modal-dialog --> 
</div>
<!-- /.modal -->  

<!--===Back to top======--> 
<a href="#" class="scrollup">Scroll</a> 

<!--==============QUERY LIBRARY=================--> 

<script src="js/jquery.easing.1.2.js"></script> 

<!--==============BOOTSTRAP JS=================--> 

<script src="js/bootstrap.min.js"></script> 

<!--==========ONE PAGE SCROLLING SCRIPTS STARTS===============--> 

<script>
            $(function() {
                $('.nav li a').bind('click',function(event){
                    var $anchor2 = $(this).parent();
				    var $anchor = $(this);
					$('.nav  li').removeClass('active');
                    $anchor2.addClass('active');
					
                    $('html, body').stop().animate({
                        scrollTop: $($anchor.attr('href')).offset().top - 80
                    }, 1500,'easeInOutExpo');
                    event.preventDefault();
                });
            });
        </script> 

<!--=============ONE PAGE SCROLLING SCRIPTS ENDS============--> 

<!--=============BACK TO TOP STARTS============--> 

<script>
    $(document).ready(function(){ 
 
        $(window).scroll(function(){
            if ($(this).scrollTop() > 800) {
                $('.scrollup').fadeIn();
            } else {
                $('.scrollup').fadeOut();
            }
        }); 
 
        $('.scrollup').click(function(){
            $("html, body").animate({ scrollTop: 0 }, 600);
            return false;
        });
 
    });
</script> 

<script type="text/javascript">

(function($){
    //Utilização padrão do jQuery
    $(document).ready(function(){
         $("#cnpj").mask("99.999.999/9999-99");
    });
})(jQuery);

</script>

<!--=============BACK TO TOP ENDS============-->

</body>
</html>