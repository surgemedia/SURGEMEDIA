<?php
/**
 * Template Name: Home Page Template
 */
?>

<?php while (have_posts()) : the_post(); ?>


<?php get_template_part('templates/carousel'); ?>

<section id="main-content" class="row ">
	<div class="container">
		<main class="quote text-center"><?php the_content(); ?>
		<i class="surge-icon-quotation_mark_start"></i>
		<i class="surge-icon-quotation_mark_end"></i>
		</main>
		<small class="col-lg-12 text-center"><?php the_field('quote_footer'); ?></small>
		
	</div>
</section>



<section id="work" class="container-fluid">

<div class="row">
<?php 
// debug(get_field('featured_work'));
$featured_work = get_field('featured_work');
$case_study_home = array();
$work_home = array();

for ($i=0; $i < sizeof($featured_work); $i++) { 
	$obj = $featured_work[$i];
	$case_study_obj = $obj[case_study];
	$work_type = $obj[type_of_work];
	array_push($work_home, $work_type);
	array_push($case_study_home, $case_study_obj->ID);


}
for ($j=0; $j < sizeof($case_study_home); $j++) {
		$args = array ( 
		'post_type' => array( 'work' ),
		'tax_query' => array(
                                array(
                                'taxonomy' => 'services',
                                'field' => 'slug',
                                'terms' => $work_home[$j],
                                )
                            ),
		'post__in' => get_field('selected_work',$case_study_home[$j]),
		'orderby' => 'post__in'
		);
		$case_study_url = get_permalink($case_study_home[$j]);

			$case_query = new WP_Query( $args );
			if ( $case_query->have_posts() ) {
			while ( $case_query->have_posts() ) { 
					$case_query->the_post();
					// debug($case_study_url);
	 		includePart('templates/work-obj.php',
	 			aq_resize(getFeaturedUrl( get_the_id() ), 645,485,true,true,true),
	 			hex2rgba( get_field('overlay_color') , 0.8),
	 			wp_get_post_terms(get_the_id(), 'services', array("fields" => "all"))[0]->name,
	 			$case_study_url,
	 			$work_home[$j],
	 			wp_get_post_terms(get_the_id(), 'clients', array("fields" => "all"))[0]->name
	 			);

			} 
		}
	wp_reset_postdata();
	
}
		 ?>
	</div>
</section>

<section id="casestudy">
	<hgroup class="text-center">
		<h1>Our Clients</h1>
		<p>The passion for what we do comes through  <br> our Outstanding Clients</p>
	</hgroup>
	<div class="container-fluid">
	<?php 
		// WP_Query arguments
		$args = array (
			'post_type'              => array( 'case_study' ),
			'posts_per_page'	=> -1,
			'post__in' => get_field('featured_case_study'),
		);

		// The Query
		$query = new WP_Query( $args );
		// The Loop
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				include(locate_template('templates/casestudy-obj.php'));
			}
		} else {
			// no posts found
		}

		// Restore original Post Data
		wp_reset_postdata();
	?>
	</article>

	</div>
</section>
<?php endwhile; ?>


