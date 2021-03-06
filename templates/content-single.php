<?php while (have_posts()) : the_post(); ?>
<?php 
    $top_background;
    if(strlen(get_field('featured_banner',get_the_id()))>0){
	   $top_background = get_field('featured_banner',get_the_id());
    } else {
        $top_background = getFeaturedUrl();
    }
	if(strpos($top_background,'default') > 0 ){
		$top_background = 'http://www.surgemedia.com.au/wp-content/uploads/2016/01/photo-1439508472515-4899b144f04d.jpeg';
	};
	includePart('templates/molecule-small-jumbotron.php',$top_background,'','size-s',false);
 ?>

  <article <?php post_class('container basic'); ?>>
    <div class="entry-content mt-1">
    	<h2 class="text-center alt"><strong><?php the_title(); ?></strong></h2>

      <?php the_content(); ?>
    </div>
    <div class="controls-posts">
      <div class="glyphicon glyphicon-th"><a href="<?php echo site_url(); ?>/blog" ></a></div>
      <?php next_post_link("<div class='glyphicon glyphicon-chevron-left'>%link</div>","");?>
      <?php previous_post_link("<div class='glyphicon glyphicon-chevron-right'>%link</div>","");?>
    </div>
    <?php  comments_template(); ?>
  </article>
<?php endwhile; ?>
