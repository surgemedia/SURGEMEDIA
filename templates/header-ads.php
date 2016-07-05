<script>
  jQuery(document).ready(function() {
    function isiPhone(){
    return (
        
        (navigator.platform.indexOf("iPhone") != -1) ||
        //Detect iPod
        (navigator.platform.indexOf("iPod") != -1)
    );
}

    if(navigator.userAgent.match(/iPad/i) != null || isiPhone()){
    jQuery('.work-obj').addClass('hover_effect');
    jQuery('#navtag').addClass('hover_effect');
    };
    if(navigator.userAgent.match(/iPad/i) != null) {
      jQuery('#navtag-mobile').addClass('hidden');
    }
});
</script>
<header class="banner" role="banner">
  <div class="container">
    <div id="adsNavtag" class="hidden-xs hover_effect">
      <a class="brand" href="<?= esc_url(home_url('/')); ?>"><i class="surge-logo-symbol"></i></a>
    </div>
  </div>
</header>
