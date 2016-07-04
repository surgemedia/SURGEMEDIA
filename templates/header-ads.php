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
    <div id="navtag" class="hidden-xs hover_effect">
      <a class="brand" href="<?= esc_url(home_url('/')); ?>"><i class="surge-logo-symbol"></i></a>
      <nav class="navbar navbar-default col-xs-12 ">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#primary-navigation" aria-expanded="false">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

        <div class="collapse navbar-collapse " id="primary-navigation">
            <?php
                if (has_nav_menu('ads_navigation')) :
                  wp_nav_menu(['theme_location' => 'ads_navigation','depth'=> 7,'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'nav navbar-nav']);
                endif;
            ?>
        </div>
      </nav>
    </div>
    <div class="row">
       <div id="navtag-mobile" class="hidden-lg hidden-md hidden-sm">
      <a class="brand" href="<?= esc_url(home_url('/')); ?>"><i class="surge-logo-long"></i></a>
      <nav class="navbar navbar-default col-xs-12 ">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#primary-navigation1" aria-expanded="false">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

        <div class="collapse navbar-collapse" id="primary-navigation1">
            <?php
                if (has_nav_menu('primary_navigation')) :
                  wp_nav_menu(['theme_location' => 'primary_navigation','depth'=> 7,'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'nav navbar-nav']);
                endif;
            ?>
        </div>
      </nav>
    </div>
    </div>
  </div>
</header>
