$(document).ready(function() {
	
	var loadDataTable = function(){
	   
	    var user = $(this).attr('id');
	
		// Resgatando os campos do formulario
		var usuarioFiltro = $('#usuarioFiltro').val();
		var prioridadeFiltro = $('#prioridadeFiltro').val();
		var dataIniFiltro = $('#dataIniFiltro').val();
		var dataFimFiltro = $('#dataFimFiltro').val();
		
		if (dataIniFiltro == '' || dataFimFiltro == '') {
			toastr.remove();
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
			if(dataFimFiltro == '') {
			  toastr['error']('Por favor, preencha o campo.', 'Data Final');	
			}
			if(dataIniFiltro == '') {
			  toastr['error']('Por favor, preencha o campo.', 'Data Inicial');	
			}
			
			return false;
		}
		
		if(user != '') { 
			$.ajax({
				// Alterar a chamada do exec a utilizar conforme a entidade com parametros
				url: 'log_exec.php?act=select',
				contentType: 'application/json; charset=utf-8',
				dataType: 'json',
				type: 'GET',
				data: { 
				        usuarioFiltro: usuarioFiltro, 
				        prioridadeFiltro: prioridadeFiltro,
				        dataIniFiltro: dataIniFiltro, 
				        dataFimFiltro: dataFimFiltro
				},        		
				success: function(s) {
					//console.log(s);
					if (s !== null) {
						oTable.clear().draw();
					 	for(var i = 0; i < s.length; i++) {
					 		oTable.row.add([ s[i][0], s[i][1], s[i][2], s[i][3], s[i][4], s[i][5],"<a class='btn default btn-xs green-stripe' style='padding: 1px 5px; display: inline;' href=log_view.php?login="+s[i][6]+"><span class='glyphicon glyphicon-eye-open'></span> Exibir</a>"+
												"<a class='btn default btn-xs yellow-stripe' disabled style='padding: 1px 5px; display: inline;'><span class='glyphicon glyphicon-pencil'></span> Alterar</a>"+
												"<a class='btn default btn-xs red-stripe' disabled style='padding: 1px 5px; display: inline;'><span class='glyphicon glyphicon-trash'></span> Excluir</a>"]).draw(false);
					 	}
					}
					showDiv();							
				},
				beforeSend: function(){
					$.blockUI({ message: $('#preloader'), 
						            css: { border: 'none',
						                   padding: '15px',
						                   backgroundColor: '#fff',        
						                   '-webkit-border-radius': '10px',
						                   '-moz-border-radius': '10px',
                     					   opacity: .9, color: '#fff'
                     					 } 
                     		 });
				},
				complete: function(){
					oTable.page(parseInt(localStorage.getItem('log_search_ajax_table_page'),10)).draw( 'page' );
				    $.unblockUI();
				},
				error: function(e) {
				   //console.log(e.responseText);
				   $.unblockUI();
				   showDiv();							
				}
			});
		}
	}
	
	//Criação do DataTable
	var oTable = $('#ajax_table').DataTable({ "sPaginationType":"full_numbers", stateSave: true,
											  fnRowCallback: function(nRow, aData, iDisplayIndex, iDisplayIndexFull) 
															{
														       if (aData[5] == "baixa") {
														           $(nRow).css('background-color', '#1bc398');
														       } else {
														       	  if (aData[5] == "alta") {
														             $(nRow).css('background-color', '#EF6F61');
														    	  } else {
														    	  	 $(nRow).css('background-color', '#ec971f');
														    	  }
														       }
														     }
	});
	
	//Evento para capturar a mudança de página do DataTable e armazenar a última visitada.
	oTable.on('page.dt', function() { 
		localStorage.setItem('log_search_ajax_table_page', oTable.page.info().page);
	});
	
	//Condição criada para realizar a busca automática
	var loadCriteria = $('#loadCriteria').val();
	if (loadCriteria == 1) {
		loadDataTable();
	} else {
		//Reinicia o DataTable
		oTable.search("").draw();
		oTable.page.len( 10 ).draw();
		localStorage.setItem('log_search_ajax_table_page', 0);
	}
	
	//Evento configurado para realizar a busca quando o botão for clicado
	$('#buscar').on('click',function(){
		//Reinicia o DataTable
		oTable.search("").draw('page');
		oTable.page.len( 10 ).draw();
		localStorage.setItem('log_search_ajax_table_page', 0);
		//Faz nova busca
		loadDataTable();
	});
	
});