/**
 * Created by Susan Dangol
 */
var $ =jQuery;

var winWidth = $(window).width();

$(document).ready(function () {
    sliderInit();
    addClassInit();
    navInit();
    mcustomInit();

});


/*------------------------------- Functions Starts -------------------------------*/
function sliderInit() {
    $('.banner-slider').slick({
        arrows: false,
        dots: true,
        autoplay: true,
        speed: 500,
        fade: true,
        pauseOnHover: false,
        cssEase: 'linear',
        slidesToShow: 1,
        slidesToScroll: 1,
        responsive: [
            {
                // breakpoint: 667,
                // settings: {
                //     arrows: true,
                //     dots: false
                // }
            }
        ]
    });

}

function addClassInit() {
    $(".menu-btn").click(function(){
        $(".menu-btn").toggleClass("active");
        $("body").toggleClass("show-menu");
    });

    $(".navigation .close-btn").click(function(){
        $("body").removeClass("show-menu");
    });

    $('.common-select').on('change', function (e) {
        var $optionSelected = $("option:selected", this);
        $optionSelected.tab('show')
    });
}

function navInit() {

}

function mcustomInit() {
    $( ".bar" ).each(function() {
        let value = $(this).attr('data-value');
        let maxvalue = $(this).attr('max-value');
        percent = value * 100 / maxvalue;

        //$(this).css('width', percent+'%' );

        //With animation as asked :
        $(this).animate({width: percent+'%' }, 2000);


    });
}



/*-------------------------------- Functions Ends --------------------------------*/
