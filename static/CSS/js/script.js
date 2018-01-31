jQuery(function($) {
    $(window).load(function() {
        //Executes when the complete page is fully loaded, including all frames, objects and images
        $('.client-gallery').fadeIn('slow');
    });
});

jQuery(window).resize(function($) {
    //jQuery
});

jQuery(document).ready(function($) {
    //Executes when HTML document is loaded and DOM is ready

    //Initilize AniView
    $('.aniview').AniView();

    //Mobile Navigation
    var freezeVp = function(e) {
        e.preventDefault();
    };
    function stopBodyScrolling (bool) {
        if (bool === true) {
            document.body.addEventListener("touchmove", freezeVp, false);
        } else {
            document.body.removeEventListener("touchmove", freezeVp, false);
        }
    }
    $('.menu-trigger').click(function(){
        stopBodyScrolling(true);
        $('#nav-mobile').addClass('fadeIn open');
        $('body').css({
            "overflow-y": "hidden"
        });
    });
    $('#nav-mobile .close').click(function(){
        stopBodyScrolling(false);
        $('body').css({
            "overflow-y": "auto"
        });
        $('#nav-mobile').removeClass('fadeIn open');
    });

    //Brand Film Overlay
    $('.watch-film').click(function(){
        $('#brand-film').addClass('open fadeIn');
    });
    $('.overlay').click(function(){
        $(this).removeClass('open fadeIn');
    });

    //Slick Sliders
    $('.gallery-main').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        adaptiveHeight: true,
        respondTo: 'slider',
        swipe: false,
        speed: 300,
        asNavFor: '.gallery-nav'
    });
    $('.gallery-nav').slick({
        slidesToShow: 5,
        slidesToScroll: 2,
        asNavFor: '.gallery-main',
        dots: false,
        centerMode: false,
        respondTo: 'slider',
        focusOnSelect: true
    });
});
