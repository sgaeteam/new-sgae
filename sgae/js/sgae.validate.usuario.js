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
        
        var usuarioNome = $('#nome').val();
		var usuarioLogin = $('#login').val();
		var usuarioPerfil = $('#perfil').val();
		
		toastr.remove();
		
	    if (usuarioPerfil == '') {
	        toastr['error']('Por favor, preencha o campo.', 'Perfil');
	        error_free=false;
	    }
	    
	    if (usuarioNome == '') {
	        toastr['error']('Por favor, preencha o campo.', 'Nome completo');
	        error_free=false;
	    }
	    if (usuarioLogin == '') {
	        toastr['error']('Por favor, preencha o campo.', 'Usuário');
	        error_free=false;
	    }
	    
	    if (!error_free){
		 event.preventDefault();
		 return false;
	    } 
	    
	}); 

});