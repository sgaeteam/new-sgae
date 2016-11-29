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
			
	$("#botao_plano_form_submit").click(function(event){
        
        var error_free=true;
        
        var planoValor = $('#valor').val();
		var planoDescricao = $('#descricao').val();
		var planoNome = $('#nome').val();
		
		toastr.remove();
		
	    if (planoValor == '') {
	        toastr['error']('Por favor, preencha o campo.', 'Valor');
	        error_free=false;
	    }
	    
	    if (isNaN(planoValor)) {
	        toastr['error']('Por favor, informe apenas números.', 'Valor');
	        error_free=false;
	    }
	    
	    if (planoDescricao == '') {
	        toastr['error']('Por favor, preencha o campo.', 'Descrição');
	        error_free=false;
	    }
	    if (planoNome == '') {
	        toastr['error']('Por favor, preencha o campo.', 'Plano');
	        error_free=false;
	    }
	    
	    if (!error_free){
		 event.preventDefault();
		 return false;
	    } 
	    
	}); 

});