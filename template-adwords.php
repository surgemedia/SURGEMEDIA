<?php
/**
 * Template Name: Adwords Template
 */
?>
<?php while (have_posts()) : the_post(); ?>
<?php 
	$top_background = getFeaturedUrl();
	if(strpos($top_background,'default') > 0 ){
		$top_background = '/wp-content/uploads/2016/01/photo-1439508472515-4899b144f04d.jpeg';
	};
	includePart('templates/molecule-small-jumbotron.php',$top_background,'','size-xs',false);
 ?>

  <article <?php post_class('container basic'); ?>>
    <div class="entry-content mt-1">
    	<h2 class="text-center alt"><strong><?php the_title(); ?></strong></h2>
      <?php the_content(); ?>
    </div>
  </article>
<?php endwhile; ?>
