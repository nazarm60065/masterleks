$(document).ready(function () {

    $(document).ready(function () {
        $('.slider-slick').slick({
            dots: true,
            slidesToShow: 4,
            outline: false,
            arrows: false,
            slidesToScroll: 4,
            responsive: [
                                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                    }
                },
                {
                    breakpoint: 1199,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,

                    }
                }
            ]

        });
    });

    $(document).ready(function () {
        $('.category').slick({

            slidesToShow: 2,
            outline: false,
            arrows: false,
            slidesToScroll: 2,
            responsive: [
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: true,
                    }
                },
                {
                    breakpoint: 1199,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: true,


                    }
                }
            ]

        });
    });
 var button = $('.main-nav-block-button');

    button.click(function(){

        if(button.hasClass('opened')){
            button.removeClass('opened');
        }
        else{
            button.addClass('opened');
        }
    });

    button.click(function() {
        $('.top-nav__element').toggleClass("opened");
        $('.header').toggleClass("opened");
        $('.main').toggleClass("opened");
        $('.main-blackout').toggleClass("opened");
        $('.block-top-nav__nav').toggleClass("opened");
        $('.top-nav').toggleClass("opened");
        $('.top-vav__element').toggleClass("opened");



    });
});
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


