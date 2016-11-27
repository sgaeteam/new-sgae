window.setTimeout(function() {  
    $(".alert-success").animate({opacity: 0}, 500).hide('slow');
}, 3000);

$("div.alert").on("click", "button.close", function() {
    $(this).parent().animate({opacity: 0}, 500).hide('slow');
});

function showDiv() {
    document.getElementById('tabela').style.display='block';
}

function prepareDiv() {
    $("#ajax_table").DataTable().clear().draw();
    $("#ajax_table").DataTable().search("").draw();
    $("#ajax_table").DataTable().page.len( 10 ).draw();
    $('.loader').css({display:"none"});
    document.getElementById('tabela').style.display='none';
}

function hideDiv() {
    document.getElementById('ajax_form').reset();
    $("#ajax_table").DataTable().clear().draw();    
    $("#ajax_table").DataTable().search("").draw();
    $("#ajax_table").DataTable().page.len( 10 ).draw();
    $('.loader').css({display:"none"});
    toastr.remove();
    document.getElementById('tabela').style.display='none';
}

//Configuração do calendário. Para utilizá-lo, basta incluir um fild com id igual a 'dataIniFiltro' e 'dataFimFiltro'
var checkin = $('#dataIniFiltro').fdatepicker({
		    language: 'pt_br',
			onRender: function (date) { return date.valueOf(); }
}).on('changeDate', function (ev) {
		if (ev.date.valueOf() > checkout.date.valueOf()) {
			var newDate = new Date(ev.date)
			newDate.setDate(newDate.getDate() + 1);
			checkout.update(newDate);
		}
		checkin.hide();
		$('#dataFimFiltro')[0].focus();
}).data('datepicker');

var checkout = $('#dataFimFiltro').fdatepicker({
		     language: 'pt_br',
		     onRender: function (date) { return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';	}
}).on('changeDate', function (ev) {
		checkout.hide();
}).data('datepicker');