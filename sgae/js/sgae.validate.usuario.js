$(document).ready(function() {
    
	toastr.options = {"closeButton": true,
					  "positionClass": "toast-top-right",
					  "showDuration": "1000",
					  "hideDuration": "1000",
					  "timeOut": "5000",
					  "extendedTimeOut": "1000",
					  "showEasing": "swing",
					  "hideEasing": "linear",
					  "showMethod": "fadeIn",
					  "hideMethod": "fadeOut"
	};
			
	$("#botao_usuario_form_submit").click(function(event){
        
        var error_free=true;
        var email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
        
        var usuarioNome = $('#nome').val();
		var usuarioLogin = $('#login').val();
		var usuarioPerfil = $('#perfil').val();
		var usuarioEmail  = $('#email').val();
		var senhaAtual = $('#senhaAtual').val();
		var senhaNova = $('#senhaNova').val();
		var senhaConfirma = $('#senhaConfirma').val();

		
		toastr.remove();
		
	    if (usuarioPerfil == '') {
	        toastr['error']('Por favor, preencha o campo.', 'Perfil');
	        error_free=false;
	    }
	    
	    if (usuarioNome == '') {
	        toastr['error']('Por favor, preencha o campo.', 'Nome completo');
	        error_free=false;
	    }
	    
	    if (usuarioEmail != '' && !email_regex.test(usuarioEmail)) {
	    	toastr['error']('Por favor, informe um endereço de e-mail válido.', 'E-mail');
	    	error_free=false;
	    }
	    
	    if (usuarioLogin == '') {
	        toastr['error']('Por favor, preencha o campo.', 'Usuário');
	        error_free=false;
	    }

	    if (senhaNova != senhaConfirma) {
	        toastr['error']('A senha informada não confere.', 'Confirmar nova senha');
	        error_free=false;
	    }	  
	    
	    if (senhaConfirma == '') {
	        toastr['error']('Por favor, preencha o campo.', 'Confirmar nova senha');
	        error_free=false;
	    }	

	    if (senhaNova == '') {
	        toastr['error']('Por favor, preencha o campo.', 'Nova senha');
	        error_free=false;
	    }	
	    
	    if (senhaAtual == '') {
	        toastr['error']('Por favor, preencha o campo.', 'Senha atual');
	        error_free=false;
	    }	
	    
	    if (!error_free){
		 event.preventDefault();
		 return false;
	    } 
	    
	}); 

});