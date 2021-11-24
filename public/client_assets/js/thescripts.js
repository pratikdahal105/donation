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

    $('.stories-slider').slick({
        arrows: true,
        dots: false,
        autoplay: true,
        speed: 500,
        fade: true,
        pauseOnHover: false,
        cssEase: 'linear',
        slidesToShow: 1,
        slidesToScroll: 1,
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

    $(".search-btn").click(function(){
        $(".search-btn").toggleClass("active");
        $("body").toggleClass("show-search");
    });


    $('.common-select').on('change', function (e) {
        var $optionSelected = $("option:selected", this);
        $optionSelected.tab('show')
    });


    var sum = 0;
    $('#service-table table tr td:nth-child(2)').each(function() {
        sum = sum + parseFloat($(this).html());
    });
    $('.total').html(sum.toString());


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




$(document).ready(function(){

    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;

    $(".next").click(function(){

        current_fs = $(this).parent();
        next_fs = $(this).parent().next();

//Add Class Active
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

//show the next fieldset
        next_fs.show();
//hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now) {
// for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                next_fs.css({'opacity': opacity});
            },
            duration: 600
        });
    });

    $(".previous").click(function(){

        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();

//Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

//show the previous fieldset
        previous_fs.show();

//hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now) {
// for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_fs.css({'opacity': opacity});
            },
            duration: 600
        });
    });

    $('.radio-group .radio').click(function(){
        $(this).parent().find('.radio').removeClass('selected');
        $(this).addClass('selected');
    });

    $(".submit").click(function(){
        return false;
    })

});

/*-------------------------------- Functions Ends --------------------------------*/
