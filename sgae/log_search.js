$(document).ready(function() {

//$(document).ready(function() {
   // var table = $('#example').DataTable();
     



	// Inicializar o datatable
   // var oTable = $('#ajax_table').dataTable();
   var oTable = $('#ajax_table').DataTable();  

					var tr = $(this).closest('tr');
        			var row = oTable.row( tr );
        			tr.addClass( 'danger' );

 //   $('#ajax_table tbody')
   //     .on( 'load', 'td', function () {
     //       var colIdx = oTable.cell(this).index().column;
 //
   //         $( oTable.cells().nodes() ).removeClass( 'highlight' );
     //       $( oTable.column( colIdx ).nodes() ).addClass( 'danger' );
    //});
    
  //  "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
//	$('td', nRow).closest('tr').css('background', aData[6] === true ? '#eef' : '#fff');
//	return nRow;
//	}
//
//"createdRow": function ( row, data, index ) {
//            if ( data[5].replace(/[\$,]/g, '') * 1 > 150000 ) {
 //               $('td', row).eq(5).addClass('highlight');
   //         }
     //   }
//
//


	$('#buscar').on('click',function(){
		var user = $(this).attr('id');

		// Resgatando os campos do formulario
		var dataIniFiltro = $('#dataIniFiltro').val();
		var dataFimFiltro = $('#dataFimFiltro').val();

		if(user != '') { 
			$.ajax({
				// Alterar a chamada do exec a utilizar conforme a entidade com parametros
				url: 'log_exec.php?act=select',
				contentType: 'application/json; charset=utf-8',
				dataType: 'json',
				type: 'GET',
				data: { 
				        dataIniFiltro: dataIniFiltro, 
				        dataFimFiltro: dataFimFiltro
				},        		
				success: function(s) {
					console.log(s);
					//oTable.fnClearTable();

            var row = "";
            $.each(s, function(index, item){
                row+="<tr class='danger'><td></td></tr>";
            });
            $("#tbody").html(row);    



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
				    $.unblockUI();
				},
				error: function(e) {
				   console.log(e.responseText);
				   $.unblockUI();
				   showDiv();							
				}
			});
		}
	});
});