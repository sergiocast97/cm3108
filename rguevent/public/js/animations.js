/*
$( function(){

    // Nav Bar colour transition
    $(".box").mouseenter(function(){

        // Showing button
        $(".button", this).css({opacity: 1.0, visibility: "visible"}).animate({opacity: 0.0});

    });
    
    // Nav Bar back to original colour
    $(".box").mouseleave(function(){

        // Hiding button
        $(".button", this).css({opacity: 0.0, visibility: "hidden"}).animate({opacity: 1.0});
        
    });

});
*/

/**
 * Event 'View' Button animations
 */
$(document).ready(function() {
    $(document).on('mouseenter','.box', function() {
        // Showing button
        $(".button", this).css({opacity: 1.0, visibility: "visible", cursor: "pointer"});
    })
    
    $(document).on('mouseleave','.box', function() {
        // Hiding button
        $(".button", this).css({opacity: 0.0, visibility: "hidden"});
    })
})