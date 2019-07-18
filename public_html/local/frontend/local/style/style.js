$(document).ready(function () {
    $('.search__link').click(function() {
        $('.input_search_area').toggleClass("show");

    });
    var button = $('.mobil-menu__block-button');
    button.click(function(){

        if(button.hasClass('opened')){
            button.removeClass('opened');
        }
        else{
            button.addClass('opened');
        }
    });
    button.click(function() {
        $('body').toggleClass("fix_overflow");
        $('#mobile_menu').toggleClass("active");
    });
});
