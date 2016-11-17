$(document).ready(function() {
	
	var loadDataTable = function(){
	   
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
					//console.log(s);
					if (s !== null) {
						oTable.clear().draw();
					 	for(var i = 0; i < s.length; i++) {
					 		oTable.row.add([s[i][0],s[i][1],s[i][2],s[i][3],s[i][4],"<a class='btn default btn-xs green-stripe' style='padding: 1px 5px; display: inline;' href=usuario_view.php?idusu="+s[i][5]+"><span class='glyphicon glyphicon-eye-open'></span> Exibir</a>"+
												"<a class='btn default btn-xs yellow-stripe' style='padding: 1px 5px; display: inline;' href=usuario_edit.php?idusu="+s[i][5]+"><span class='glyphicon glyphicon-pencil'></span> Alterar</a>"+
												"<a class='btn default btn-xs red-stripe' style='padding: 1px 5px; display: inline;' href=# data-toggle='modal' data-target=#delete_confirm_"+s[i][5]+" data-id="+s[i][5]+"><span class='glyphicon glyphicon-trash'></span> Excluir</a>"+
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
					                            "</div>"]).draw(false);
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
					oTable.page(parseInt(localStorage.getItem('usuario_search_ajax_table_page'),10)).draw( 'page' );
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
	var oTable = $('#ajax_table').DataTable({ "sPaginationType":"full_numbers", stateSave: true });
	
	//Evento para capturar a mudança de página do DataTable e armazenar a última visitada.
	oTable.on('page.dt', function() { 
		localStorage.setItem('usuario_search_ajax_table_page', oTable.page.info().page);
	});
	
	//Condição criada para realizar a busca automática
	var loadCriteria = $('#loadCriteria').val();
	if (loadCriteria == 1) {
		loadDataTable();
	} else {
		//Reinicia o DataTable
		oTable.search("").draw();
		oTable.page.len( 10 ).draw();
		localStorage.setItem('usuario_search_ajax_table_page', 0);
	}
	
	//Evento configurado para realizar a busca quando o botão for clicado
	$('#buscar').on('click',function(){
		//Reinicia o DataTable
		oTable.search("").draw('page');
		oTable.page.len( 10 ).draw();
		localStorage.setItem('usuario_search_ajax_table_page', 0);
		//Faz nova busca
		loadDataTable();
	});
	
});