$(document).ready(function() {
    
    $("#btn-login").click( function() {
    
     $("div#ack").empty();

     $('#btn-login').attr('disabled', 'disabled');
     $('#btn-login').attr('value', 'Autenticando...');
                     
      if( $("#cnpj").val() == "" && $("#user2").val() == "" && $("#senha").val() == "") {
        $("div#ack").fadeIn(1000, function(){      
           $("div#ack").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Preencha todos os campos do formulário!</div>');
		   window.setTimeout(function(){ $('div#ack').fadeOut(); }, 3000);
		});
		 $('#btn-login').removeAttr('disabled');
		 $('#btn-login').attr('value', 'Acessar o sistema');
      } else {
        $.post( $("#myForm").attr("action"),
	            $("#myForm :input").serializeArray(),
    			function(data) {
    			     if (data == "ok") {
    			       $('#btn-login').attr('value', 'Redirecionando...');
    			       setTimeout(' window.location.href = "sgae/index.php"; ',1000);
    			     } else {
    			        $("div#ack").fadeIn(1000, function(){      
                           $("div#ack").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+data+'!</div>');
                           window.setTimeout(function(){
                             $('div#ack').fadeOut();
                           }, 3000);
    			        });
    			        $('#btn-login').attr('value', 'Acessar o sistema');
    			        $('#btn-login').removeAttr('disabled');
    			     }
			    });
      }    
	  
	  $("#myForm").submit( function() {
	      return false;	
	  });
   });
   
   $("#myForm")[0].reset();
   
});