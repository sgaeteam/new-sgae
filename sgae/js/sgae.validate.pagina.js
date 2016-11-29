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
			
	$("#botao_pagina_form_submit").click(function(event){
        
        var error_free=true;
        
        var paginaNome = $('#nome').val();
		
		toastr.remove();
		
	    if (paginaNome == '') {
	        toastr['error']('Por favor, preencha o campo.', 'Página');
	        error_free=false;
	    }
	    
	    if (!error_free){
		 event.preventDefault();
		 return false;
	    } 
	    
	}); 

});