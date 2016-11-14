$(window).scroll( function() {
    var st = $(this).scrollTop();

    $('header').css({ 'opacity' : (1.4 - st/400) });
});

// This code runs when jQuery is ready
$(function() {
    "use strict";
    
    // Adjust .intro section height to same as window height
    var wH = $(window).height();
    $('#hero-carousel .item').css("height", wH); 

});

  