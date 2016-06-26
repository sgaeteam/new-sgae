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
    $('#ajax_table').dataTable().fnClearTable();
    $('.loader').css({display:"none"});
    document.getElementById('tabela').style.display='none';
}

function hideDiv() {
    document.getElementById('ajax_form').reset();
    $('#ajax_table').dataTable().fnClearTable();
    $('.loader').css({display:"none"});
    document.getElementById('tabela').style.display='none';
}