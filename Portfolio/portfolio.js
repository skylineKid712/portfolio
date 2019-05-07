$(document).ready(function() {
    $("span").click(function(){
        $('head').append('<link rel="stylesheet" href="darkMode.css" type="text/css" />');
    });
    $("#menu").accordion();
    
});