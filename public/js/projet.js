/**
 * Created by mekou on 24/04/2017.
 */

$(document).ready(function () {
    //slider initialisation
    $('.slider').slider();

    //Pushpin
    $('.pushpin-demo-nav').each(function() {
        var $this = $(this);
        var $target = $('#' + $(this).attr('data-target'));
        $this.pushpin({
            top: $target.offset().top,
            bottom: $target.offset().top + $target.outerHeight() - $this.height()
        });
    });

    //Gestion du Carousel
    //$('.carousel').carousel();
    $('.carousel.carousel-slider').carousel({fullWidth:true});
    $('.carousel.carousel-slider').carousel({duration:500});

    //Initialize collapse button
    $(".button-collapse").sideNav();

    // Initialize collapsible (uncomment the line below if you use the dropdown variation)
    //$('.collapsible').collapsible();

    // Dropdown-button
    $('.dropdown-button').dropdown({
        hover:true,
        belowOrigin: false,
    });

    $('.tooltipped').tooltip({delay: 50});

    //Button SignIn
    $('.divButtonSign_In').html('<a id="button_signIn" href="/register" class="btn blue wzves-effect">Singn Up</a> <a id="button_signIn" href="/login" class="btn wzves-effect">Singn In</a>');

});