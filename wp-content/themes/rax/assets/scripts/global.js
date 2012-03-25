/* ---------------------------------------------------------------------
Global JavaScript & jQuery
 
Target Browsers: All
Authors: Chris Bennett
------------------------------------------------------------------------ */
 
var NERD = NERD || {};

jQuery(function($) {
    var slideTimer;

    var $nav = $('#carousel-nav li');
    var isActive = false;
    $nav.each(function (idx) {
       $(this).find('a').click(function(e) {
           e.preventDefault();
           clearTimeout(slideTimer);
           $nav
               .removeClass('active')
               .eq(idx)
               .addClass('active');
           $('.slide')
               .removeClass('active')
               .eq(idx)
               .addClass('active')
               .mouseover(function() { clearTimeout(slideTimer); isActive = false; })
               .mouseout(function() { if (!isActive) doNav(); });
               
            doNav();

           // Enable the slideshow timer
           function doNav() {
               isActive = true;
               slideTimer = setTimeout(function() {
                   var nextIdx = (idx < $nav.length - 1 ? idx + 1 : 0);
                   $nav.eq(nextIdx).find('a').click();
               }, 1000);
           }
           return false;
       });
    }).eq(0).find('a').click();
});