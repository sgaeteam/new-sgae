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
<script src="js/sgae.auth.js"></script>
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


<!--==============Content Area=================-->

<div class="container"> 

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
        <div id="ack"></div>
        <form method="post" action="dologin.php" id="myForm">
          <div class="form-group">
            <input class="form-control input-lg" type="text" name="cnpj" id="cnpj" size="15" placeholder="CNPJ"/>
          </div>			
          <div class="form-group">
            <input class="form-control input-lg" type="text" name="user2" id="user2" size="50" placeholder="Usu&aacute;rio"/>
          </div>
          <div class="form-group">
            <input class="form-control input-lg" type="password" name="senha" id="senha" size="20" placeholder="Senha"/>
          </div>
          <div class="form-group">
            <input type="submit" id="btn-login" name="sub" value="Acessar o sistema" class="btn btn-success btn-lg"/>
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