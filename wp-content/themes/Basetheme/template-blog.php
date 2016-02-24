<?php
/**
* Template Name: Blog Template
*/
?>
<?php while (have_posts()) : the_post(); ?>
<?php includePart('templates/molecule-small-jumbotron.php',getFeaturedUrl(),get_the_title(),'size-s',true); ?>

<section id="work" class="container-fluid">

    <div class="big-paragraph row">
        <?php includePart('templates/molecule-quote-main.php',get_the_content(),'',''); ?>
    </div>
  
    <div class="row">
        <?php
        $args = array (
            'post_type'  =>  array( 'post' ),
        );
        // The Query
        $query = new WP_Query( $args );
        // The Loop
        if ( $query->
        have_posts() ) {
        while ( $query->
        have_posts() ) {
        $query->
        the_post();
        // debug(getFeaturedUrl( get_the_id() ));
        if(has_post_thumbnail( get_the_id())){
            includePart('templates/work-obj.php',
            getFeaturedUrl( get_the_id() ),
            hex2rgba( get_field('overlay_color') , 0.8),
            get_the_date(),
            get_permalink(),
            '',
            get_the_title()
            );
        }
        }
        } else {
        echo 'no posts found';
        }
        // Restore original Post Data
        wp_reset_postdata();
        ?>
    </div>
</section>
<?php endwhile; ?>
