$(document).ready(function () {

    if($('.section-description').height() > 155){
        $('.section-description_show').css({'display': 'block'});
    }
    $('.section-description_show').on('click', function() {
        if(!$(this).hasClass('opened')) {
            $('.section-description__container').animate({
                height: $('.section-description').height()
            }, 500, "linear");
            $(this).text("Скрыть").addClass('opened');
        }else{
            $('.section-description__container').animate({
                height: 155
            }, 500, "linear");
            $(this).text("Развернуть").removeClass('opened');
        }
    })

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
