import "./main-slider.mustache"
import "./main-slider.sass"

$(document).ready(function() {
    $('.main-slider').slick({
        dots: true,
        centerPadding: 0,
        arrows: false,
        adaptiveHeight: true,
        dotsClass: 'main-slider__dots',
        autoplay: true
    });
});