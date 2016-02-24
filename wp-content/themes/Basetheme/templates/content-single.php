<?php while (have_posts()) : the_post(); ?>
<?php includePart('templates/molecule-small-jumbotron.php',getFeaturedUrl(),get_the_title(),'size-s',false); ?>

  <article <?php post_class('container'); ?>>
    <div class="entry-content mt-1">
      <?php the_content(); ?>
    </div>
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    <?php // comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
