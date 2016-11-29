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
			
	$("#botao_perfil_form_submit").click(function(event){
        
        var error_free=true;
        
        var perfilSigla = $('#sigla').val();
		var perfilDescricao = $('#descricao').val();
		var perfilTipo = $('#tipo').val();
		
		toastr.remove();
		
	    if (perfilSigla == '') {
	        toastr['error']('Por favor, preencha o campo.', 'Sigla');
	        error_free=false;
	    }
	    
	    if (perfilDescricao == '') {
	        toastr['error']('Por favor, preencha o campo.', 'Descrição');
	        error_free=false;
	    }
	    
	    if (perfilTipo == '') {
	        toastr['error']('Por favor, preencha o campo.', 'Perfil');
	        error_free=false;
	    }
	    
	    if (!error_free){
		 event.preventDefault();
		 return false;
	    } 
	    
	}); 

});