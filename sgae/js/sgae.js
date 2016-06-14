window.setTimeout(function() {  
    $(".alert-success").animate({opacity: 0}, 500).hide('slow');
}, 3000);

$("div.alert").on("click", "button.close", function() {
    $(this).parent().animate({opacity: 0}, 500).hide('slow');
});