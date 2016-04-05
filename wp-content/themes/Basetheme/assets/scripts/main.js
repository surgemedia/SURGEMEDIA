/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };
  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    } 
  };
  // Load Events
  $(document).ready(UTIL.loadEvents);
})(jQuery); // Fully reference jQuery after this point.

(function($) {
  if($('#video-bg').data('video-id')){
  $('#video-bg').YTPlayer({
    videoId: $('#video-bg').data('video-id'),
     playerVars: {
      modestbranding: 0,
      autoplay: 1,
      controls: 0,
      showinfo: 0,
      wmode: 'transparent',
      branding: 0,
      rel: 0,
      autohide: 0
    },
    callback: function() {
      // console.log($('#video-bg').data('video-id'));
    }
    });   
  }
})(jQuery);

(function($) {
/*================================
=            Carousel            =
================================*/
// Home
$('#carousel-id').carousel({
  interval: 5000,
  pause: false
});
// Case Study
$('.caseStudy-paragrah').each(function(){
        $(this).carousel({
          pause: true,
          interval: false
        });
    });
})(jQuery);



(function($) {
/*======================================
=            Scrolling down            =
======================================*/
function slickScroll(trigger_class,offset){
    jQuery(trigger_class).click(function(e){
      e.preventDefault();
      var location = $(this).attr('href');
      jQuery('html, body').animate({
          scrollTop: jQuery(location).offset().top - offset
      }, 500);
      return false;
  });
}
slickScroll('.slickScroll',40);
})(jQuery);

(function($) {
/*======================================
=            Dropdown js           =
======================================*/
  $('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
      event.preventDefault(); 
      event.stopPropagation(); 
      $(this).parent().siblings().removeClass('open');
      $(this).parent().toggleClass('open');
  });


})(jQuery);
(function($) {
function isNear( element, distance, event ) {

    var left = element.offset().left - distance,
        top = element.offset().top - distance,
        right = left + element.width() + 2*distance,
        bottom = top + element.height() + 2*distance,
        x = event.pageX,
        y = event.pageY;

    return ( x > left && x < right && y > top && y < bottom );

};

$( 'body' ).mousemove( function( event ) {

    if( isNear( $( '#navtag' ), 150, event ) ) {
        $('#navtag').addClass('hover_effect');
    } else {
        $('#navtag').removeClass('hover_effect');
       
    };

});           

})(jQuery);