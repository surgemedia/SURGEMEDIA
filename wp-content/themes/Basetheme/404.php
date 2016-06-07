<?php while (have_posts()) : the_post(); ?>
<?php 
	$top_background = getFeaturedUrl();
	if(strpos($top_background,'default') > 0 ){
		$top_background = 'http://localhost/surgemedia/wp-content/uploads/2016/01/photo-1439508472515-4899b144f04d.jpeg';
	};
	includePart('templates/molecule-small-jumbotron.php',$top_background,'','size-xs',false);
 ?>

  <article <?php post_class('container basic'); ?>>
    <div class="entry-content mt-1">
    	<h2 class="text-center alt"><strong>Sorry, there isn't a page here</strong></h2>
      <p>Looks like you got a bit lost, click the link below to return to the home page.</p>
      <a href="/">Go Home</a>
    </div>
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    <?php // comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
