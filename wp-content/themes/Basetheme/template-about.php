<?php
/**
* Template Name: About Template
*/
?>
<?php while (have_posts()) : the_post(); ?>
	<?php 
	$image = getFeaturedUrl(); 
	$image_url = aq_resize($image,1920,1080,true,true,true);
		  ?>
<section id="jumbotron" class="big-background" style="background-image:url('<?php echo $image ?>');">
    <div class="pattern-bg"></div>
        <div class="container">
            <div class="quote text-center"><?php the_content(); ?>
			
			<i class="surge-icon-quotation_mark_start"></i>
			<i class="surge-icon-quotation_mark_end"></i>
            </div>

        </div>
    </section>


    <section id="about" class="container-fluid teal-dark-bg text-white">
        <div class="row">

			<?php

// check if the repeater field has rows of data
if( have_rows('paragraphs') ):

 	// loop through the rows of data
    while ( have_rows('paragraphs') ) : the_row(); ?>
<div class="col-md-6 text-center">
       <div class="text-puff">
       <h2 class="alt"><?php the_sub_field('title'); ?></h2>
       <p><?php the_sub_field('content'); ?></p>
       </div>
</div>

<?php
    endwhile;

else :

    // no rows found

endif;

?>
        </div>
    </section>
    <?php $staff_bg = get_field('our_staff_background'); ?>

    <section id="our_staff" style="background-image:url('<?php echo $staff_bg ?>');">
    <div class="pattern-bg">

    <div class="container text-center" >
    <div class="text-puff">
	    <h2 class="alt">Our Staff</h2>
	    <p><?php the_field('our_staff'); ?></p>
       </div>
       </div>
       </div>
    </section>
    <section id="staff-objs" class="container-fluid">
<?php 
		// WP_Query arguments
		$args = array (
			'post_type'              => array( 'staff' ),
			'posts_per_page'	=> -1,
			'post__in' => get_field('staff_members'),
            'orderby' => 'post__in'
		);

		// The Query
		$query = new WP_Query( $args );

		// The Loop
		$count = 1;
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post(); 

		 $image = getFeaturedUrl(); 
		 $image_url = aq_resize($image,840,540,true,true,true);
				?>
    	<article class="row <?php the_field('color') ?>" data-staff-name="Aegir Brands">
    	<div data-panel="<?php echo 'staff'.$count; ?>" class="col-md-6 description <?php  if($count % 2 == 0){ echo "pull-left"; } else { echo "pull-right";} ?>">
    		<span  onclick="contactOpen('<?php echo 'staff'.$count; ?>','col-md-6','col-md-12')">
            <div data-icon="ei-close" data-size="m">
            </div>
            </span>
    		<a class="c link" onclick="contactOpen('<?php echo 'staff'.$count; ?>','col-md-6','col-md-12')" type="button">
			More Details
			</a>
    		<div class="hidebox">
    		<h1><?php the_title() ?></h1>
    		<small><?php the_field('job_title'); ?></small>
    		</div>
    		<div class="textbox">
			<p><?php truncate(get_the_content(),50,''); ?></p>
	    		<ul>
	    			<li><i class="surge-icon-mail"></i><a href=""><?php the_field('email'); ?></a></li>
	    			<li><i class="surge-icon-phone"></i><a href=""><?php the_field('phone'); ?></a></li>
	    		</ul>
    		</div>
    	   </div>
    	  <div class="img col-md-6 ">
             <img src="<?php echo $image_url; ?>" />
          </div>
    	</article>
    <?php 
		$count++;
			}
		} else {
			// no posts found
		}

		// Restore original Post Data
		wp_reset_postdata();
	?>
    	</section>
        <script>
            function contactOpen(data,remove,add){
  if( jQuery('[data-panel="'+data+'"]').hasClass(remove) ){
  jQuery('[data-panel="'+data+'"]').removeClass(remove);
  jQuery('[data-panel="'+data+'"]').addClass(add);
    } else {
      jQuery('[data-panel="'+data+'"]').removeClass(add);
     jQuery('[data-panel="'+data+'"]').addClass(remove);
    }
}
        </script>

    <?php endwhile; ?>