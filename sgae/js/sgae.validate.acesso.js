$(document).ready(function() {
    
  
  var acessoInsertTable = $('#acesso_insert_table').DataTable({ "sPaginationType":"full_numbers", stateSave: true,"lengthMenu": [[-1],["Todos"]] });
   acessoInsertTable.search("").draw('page');
 
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
			
	$("#botao_acesso_form_submit").click(function(event){
        
        var error_free=true;
        
        var acessoPerfil = $('#perfilFiltro').val();
		var acessoPlano = $('#planoFiltro').val();
		
		toastr.remove();
		
	    if (acessoPerfil == '') {
	        toastr['error']('Por favor, preencha o campo.', 'Perfil');
	        error_free=false;
	    }
	    
	    if (acessoPlano == '') {
	        toastr['error']('Por favor, preencha o campo.', 'Plano');
	        error_free=false;
	    }
	    
	    if (!error_free){
		 event.preventDefault();
		 return false;
	    } 
	    
	}); 

});