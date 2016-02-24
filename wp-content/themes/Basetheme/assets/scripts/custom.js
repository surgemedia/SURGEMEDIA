

(function($) { 

    /*====================================
    =            smoothScroll            =
    ====================================*/
   $('a.smoothScroll').smoothScroll({
        offset: -50,
        easing: 'easeOutQuart', 
      });



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

/*==========================================
=            Youtube background            =
==========================================*/
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
  /*=============================================
  = Enabling multi-level navigation =
  ===============================================*/

}(jQuery));

