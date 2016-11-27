window.setTimeout(function() {  
    $(".alert-success").animate({opacity: 0}, 500).hide('slow');
}, 3000);

$("div.alert").on("click", "button.close", function() {
    $(this).parent().animate({opacity: 0}, 500).hide('slow');
});

$('#check_all_none').click(function () {
    if ( $(this).is(':checked') ){
        $('.flat-red').prop("checked", true);
    }
    else{
        $('.flat-red').removeAttr("checked");
    }
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
    document.getElementById('tabela').style.display='none';
}