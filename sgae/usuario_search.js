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
					//oTable.fnClearTable();
					if (s !== null) {
					 	for(var i = 0; i < s.length; i++) {
	                         // Alterar para definir a quantidade de colunas da tabela
	                         oTable.fnAddData([
			                                    s[i][0],
												s[i][1],
												s[i][2],
												s[i][3],
												s[i][4],
												"<a class='btn default btn-xs green-stripe' style='width:60px' href=usuario_view.php?idusu="+s[i][5]+">Ver</a>"+
												"<a class='btn default btn-xs yellow-stripe' style='width:60px' href=usuario_edit.php?idusu="+s[i][5]+">Alterar</a>"+
												"<a class='btn default btn-xs red-stripe' style='width:60px' href=# data-toggle='modal' data-target=#delete_confirm_"+s[i][5]+" data-id="+s[i][5]+">Excluir</a>"+
												"<div class='modal fade' id='delete_confirm_"+s[i][5]+"' tabindex='-1' role='dialog' aria-labelledby='user_delete_confirm_title' aria-hidden='true'>"+
					                            "    <div class='modal-dialog'>"+
					                            "        <div class='modal-content'>"+
					                            "            <div class='modal-header'>"+
					                            "                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>"+
					                            "                <h4 class='modal-title' id='user_delete_confirm_title'>"+
					                            "                    Excluir"+
					                            "                </h4>"+
					                            "            </div>"+
					                            "            <div class='modal-body'>"+
					                            "               Você deseja excluir o usuário <strong>"+s[i][1]+"</strong>? Esta operação não poderá ser desfeita."+
					                            "            </div>"+
					                            "            <div class='modal-footer'>"+
					                            "                <button type='button' class='btn btn-warning' data-dismiss='modal'>Cancelar</button>"+
					                            "                <a href=usuario_exec.php?act=delete&idusu="+s[i][5]+" id='modalDelete' type='button' class='btn btn-danger'>Excluir</a>"+
					                            "            </div>"+
					                            "        </div>"+
					                            "    </div>"+
					                            "</div>"                                	
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