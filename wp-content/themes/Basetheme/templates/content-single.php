<?php while (have_posts()) : the_post(); ?>
<?php 
	$top_background = getFeaturedUrl();
	if(strpos($top_background,'default') > 0 ){
		$top_background = 'http://www.surgemedia.com.au/wp-content/uploads/2016/01/photo-1439508472515-4899b144f04d.jpeg';
	};
	includePart('templates/molecule-small-jumbotron.php',$top_background,'','size-xs',false);
 ?>

  <article <?php post_class('container basic'); ?>>
    <div class="entry-content mt-1">
    	<h2 class="text-center alt"><strong><?php the_title(); ?></strong></h2>
    	<?php /* ?>
    	<div class="social-bar text-center">
    	<?php 
    		$share_url = urlencode(get_permalink());
    		$twitter_content = 'Just read this awesome post! '.$share_url

    	 ?>
    		<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $share_url; ?>">Facebook</a>
    		<a href="https://twitter.com/home?status=<?php echo $twitter_content; ?> ">Twitter</a>
    		<a href="https://plus.google.com/share?url=<?php echo $share_url; ?> ">Google Plus</a>
    		<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $share_url; ?>&title=<?php the_title(); ?>&summary=&source=<?php echo $share_url; ?> ">Linked in</a>
    	</div>
    	<?php */ ?>
      <?php the_content(); ?>
    </div>
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    <?php // comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
