<article class="casestudy-obj col-lg-4">
    <a href="<?php echo get_post_permalink(); ?>" title="<?php the_title(); ?>">
    <?php $client = wp_get_post_terms($post->ID, 'clients', array("fields" => "all"))[0]; ?>
    <img src="<?php echo aq_resize(get_field('logo', $client), 250,150,false,true,true) ?>"  alt="<?php the_title(); ?>">
    </a>
</article>