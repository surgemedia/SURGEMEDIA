<?php
/**
* Template Name: Blog Template
*/
?>
<?php while (have_posts()) : the_post(); ?>
<?php 
$featuredPost = get_field('featured_blog')[0];
$featuredPostLink = get_permalink($featuredPost);
includePart('templates/molecule-blog-jumbotron.php',getFeaturedUrl($featuredPost),get_post($featuredPost)->post_title,'size-s blog',$featuredPostLink); ?>

<section id="work" class="container-fluid">

  
    <div class="row">
        <?php
        $args = array (
            'post_type'  =>  array( 'post' ),
             'post__not_in' => array($featuredPost),
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
