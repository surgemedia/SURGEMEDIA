<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<?php
/**
* Template Name: Contact Template
*/
?>
<?php while (have_posts()) : the_post(); ?>
<?php // includePart('templates/molecule-small-jumbotron.php',getFeaturedUrl(),get_the_content(),false); ?>
<?php 
        $image = getFeaturedUrl();
         $image_url = aq_resize($image,1920,1080,true,true,true);
         // $size = $args[3];
         // $quote = $arg[4];
          ?>
<section id="jumbotron" class="big-background <?php echo $size; ?>" style="background-image:url('<?php echo $image ?>');">
    <div class="pattern-bg"></div>
        <div id="contactus" class="container">
         <h1 class="text-center"><?php the_title(); ?></h1>
            <div class=" text-center col-md-10 col-md-offset-1">
            <p><?php the_content(); ?></p>
            </div>
        <div class="col-md-6">
            <?php displayGravityForm(get_field('contact_form')) ?>
        </div>
         </div>
    </section>

<section id="contact-info">
     <div class="big-paragraph row">

        <main class="quote text-center">
        <h2>Our Contact Details</h2>
       <ul class="list-unstyled col-md-8 col-md-offset-2">
           <li><i class="surge-icon-phone"></i> <span><?php the_field('phone') ?></span></li>
           <li><i class=" surge-icon-at"></i> <span><?php the_field('email') ?></span></li>
           <li><i class="surge-icon-map "></i> <span><?php echo get_field('address')['address']; ?></span></li>
           <li><i class="surge-icon-mail"></i> <span><?php the_field('mail_address') ?></span></li>
       </ul>
        </main>

    </div>
</section>

<?php the_field('map'); ?>

<section>
      <?php 

$location = get_field('address');

if( !empty($location) ):
?>
<div class="acf-map">
  <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
</div>
<?php endif; ?>

</section>
<?php endwhile; ?>

<script type="text/javascript">
(function($) {

/*
*  new_map
*
*  This function will render a Google Map onto the selected jQuery element
*
*  @type  function
*  @date  8/11/2013
*  @since 4.3.0
*
*  @param $el (jQuery element)
*  @return  n/a
*/

function new_map( $el ) {
  
  // var
  var $markers = $el.find('.marker');
  
  
  // vars
  var args = {
    zoom    : 16,
    center    : new google.maps.LatLng(0, 0),
    mapTypeId : google.maps.MapTypeId.ROADMAP,
    scrollwheel: false
  };
  
  
  // create map           
  var map = new google.maps.Map( $el[0], args);
  
  
  // add a markers reference
  map.markers = [];
  
  
  // add markers
  $markers.each(function(){
    
      add_marker( $(this), map );
    
  });
  
  
  // center map
  center_map( map );
  
  
  // return
  return map;
  
}

/*
*  add_marker
*
*  This function will add a marker to the selected Google Map
*
*  @type  function
*  @date  8/11/2013
*  @since 4.3.0
*
*  @param $marker (jQuery element)
*  @param map (Google Map object)
*  @return  n/a
*/

function add_marker( $marker, map ) {

  // var
  var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

  // create marker
  var marker = new google.maps.Marker({
    position  : latlng,
    map     : map
  });

  // add to array
  map.markers.push( marker );

  // if marker contains HTML, add it to an infoWindow
  if( $marker.html() )
  {
    // create info window
    var infowindow = new google.maps.InfoWindow({
      content   : $marker.html()
    });

    // show info window when marker is clicked
    google.maps.event.addListener(marker, 'click', function() {

      infowindow.open( map, marker );

    });
  }

}

/*
*  center_map
*
*  This function will center the map, showing all markers attached to this map
*
*  @type  function
*  @date  8/11/2013
*  @since 4.3.0
*
*  @param map (Google Map object)
*  @return  n/a
*/

function center_map( map ) {

  // vars
  var bounds = new google.maps.LatLngBounds();

  // loop through all markers and create bounds
  $.each( map.markers, function( i, marker ){

    var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

    bounds.extend( latlng );

  });

  // only 1 marker?
  if( map.markers.length == 1 )
  {
    // set center of map
      map.setCenter( bounds.getCenter() );
      map.setZoom( 16 );
  }
  else
  {
    // fit to bounds
    map.fitBounds( bounds );
  }

}

/*
*  document ready
*
*  This function will render each map when the document is ready (page has loaded)
*
*  @type  function
*  @date  8/11/2013
*  @since 5.0.0
*
*  @param n/a
*  @return  n/a
*/
// global var
var map = null;

$(document).ready(function(){

  $('.acf-map').each(function(){

    // create map
    map = new_map( $(this) );

  });

});

})(jQuery);
</script>
