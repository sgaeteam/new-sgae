$(document).ready(function() {

	// Inicializar o datatable
    var oTable = $('#ajax_table').dataTable();  

	$('#buscar').on('click',function(){
		var user = $(this).attr('id');

		// Resgatando os campos do formulario
		var nomeFiltro = $('#nomeFiltro').val();
		var usuarioFiltro = $('#usuarioFiltro').val();
		var perfilFiltro = $('#perfilFiltro').val();
		if ($('#statusAtivoFiltro').is(':checked')) {
			var statusFiltro = $('#statusAtivoFiltro').val();
		} 
		else {	
			var statusFiltro = $('#statusInativoFiltro').val();
		}

		if(user != '') { 
			$.ajax({
				// Alterar a chamada do exec a utilizar conforme a entidade com parametros
				url: 'usuario_exec.php?act=select',
				contentType: 'application/json; charset=utf-8',
				dataType: 'json',
				type: 'GET',
				data: { 
				        nomeFiltro: nomeFiltro, 
				        usuarioFiltro: usuarioFiltro, 
				        perfilFiltro: perfilFiltro,
				        statusFiltro: statusFiltro 
				},        		
				success: function(s) {
					console.log(s);
					oTable.fnClearTable();
					if (s !== null) {
					 	for(var i = 0; i < s.length; i++) {
	                         // Alterar para definir a quantidade de colunas da tabela
	                         oTable.fnAddData([
			                                    s[i][0],
												s[i][1],
												s[i][2],
												s[i][3],
												s[i][4],
												s[i][5]									
	                                      	 ]);										
						} 
					}
					showDiv();							
				},
				beforeSend: function(){
					$('.loader').css({display:"block"});
				},
				complete: function(){
				    $('.loader').css({display:"none"});
				},
				error: function(e) {
				   console.log(e.responseText);
				   showDiv();							
				}
			});
		}
	});
});