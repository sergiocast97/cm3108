$( function(){

    // Nav Bar colour transition
    $(".events_area .events_single").mouseenter(function(){

        // Showing button
        $(".button", this).css({opacity: 1.0, visibility: "visible"}).animate({opacity: 0.0});

    });
    
    // Nav Bar back to original colour
    $(".events_area .events_single").mouseleave(function(){

        // Hiding button
        $(".button", this).css({opacity: 0.0, visibility: "hidden"}).animate({opacity: 1.0});
        
    });

});

