<?php
/**
* Template Name: Home Page Template
*/
?>
<?php while (have_posts()) : the_post(); ?>
<?php
$exlude = array();
?>
<?php
$client = wp_get_post_terms(get_field('selected_work')[0], 'clients', array("fields" => "all"))[0];
// debug($client);
?>
<script type="text/javascript">
function getFrameContent(button){
  jQuery('#replaceable').empty();
  var html;
  var frame;
  frame = jQuery(button).data('contentid');
  html = jQuery('[data-frameid="'+frame+'"]').clone();
  jQuery('#replaceable').html(html);
}
</script>
<div class="case-header text-center" style="background-image: url('<?php echo getFeaturedUrl(null,'full');  ?>')" >
    <div class="container">
        <h1><?php echo $client->name; ?></h1>
        <ul class="col-md-6 list-unstyled col-md-offset-3">
        <?php 
        $services_ids =  get_field('selected_work');
        $service_nav = [];
        // debug($services_ids[0]);
        for ($i=0; $i < sizeof($services_ids); $i++) { 
         array_push($service_nav,wp_get_post_terms($services_ids[$i], 'services', array("fields" => "all"))[0]->name);
        } ?>
        <?php for ($i=0; $i < sizeof( $service_nav ); $i++) { ?>
              <li class=""><a href="#<?php echo $service_nav[$i] ?>"><?php echo $service_nav[$i] ?></a></li>
        <?php } ?>
        </ul>
    </div>
</div>
<section id="client-desc" class=" container-fluid content-block grey-bg">
    <div class="row">
        <div class="col-lg-5 logo text-center">
            <img src="<?php echo get_field('logo',$client) ?>" alt="<?php echo $client->name; ?>">
        </div>
        <div class="col-lg-7 description text-center">
            <?php echo apply_filters( 'the_content',$client->description); ?>
        </div>
    </div>
</section>




<?php
// WP_Query arguments
$args = array (
            'post_type'              => array( 'work' ),
'posts_per_page'	=> -1,
'post__in' => get_field('selected_work'),
'orderby' => 'post__in'
);
// The Query
$query = new WP_Query( $args );
// The Loop
$count = 1;
if ( $query->have_posts() ) {
while ( $query->have_posts() ) {
$query->the_post();
?>
<?php // debug(get_field('paragraphs',$post->id)) ?>
<?php $carsoul_id = 'caseStudy'.$count; ?>
<?php $service = wp_get_post_terms(get_the_id(), 'services', array("fields" => "all"))[0]->name;
 ?>
<div id="<?php echo $carsoul_id; ?>" class=" slide caseStudy-paragrah" >
  <!-- Indicators -->
  
  <div id="<?php echo $service ?>" class="carousel-inner" role="listbox">
	<?php 
	
	$repeater = get_field('paragraphs',$post->id);
	for ($i=0; $i < sizeof($repeater); $i++) { ?>
			<div class="item <?php if($i == 0){echo 'active';} ?>">
				<?php 
				$background_image = $repeater[$i]['background_image'];
				$section_title = $repeater[$i]['section_title'];
				$section_content = $repeater[$i]['content'];

				$video = $repeater[$i]['video'];
				$url = $repeater[$i]['url'];
				 ?>
				<?php include(locate_template('templates/molecule-work-section-slide.php')); ?>
 			</div>
	       <?php } ?>
    </div>
  </div>
<?php 
$count++;
}
} else {
// no posts found
}
// Restore original Post Data
wp_reset_postdata();
?>
<div id="more_projects">
  
</div>
<?php endwhile; ?>
<!-- Modal -->
<div class="modal fade" id="caseStudyModal" tabindex="-1" role="dialog" aria-labelledby="caseStudyModal">
  <div class="modal-dialog" role="document">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><div data-icon="ei-close" data-size="s">
        </button>
    <div class="modal-content">
      <div id="replaceable" class=""></div>
    </div>
  </div>
</div>
<script>
  jQuery('#caseStudyModal').on('hidden.bs.modal', function (e) {
   jQuery('#replaceable').empty();
  });
</script>


