<?php
/**
* Template Name: Blog Template
*/
?>
<?php while (have_posts()) : the_post(); ?>
<?php 
$featuredPost = get_field('featured_blog')[0];
$featuredPost_img = get_field('featured_banner',get_field('featured_blog')[0]);
$featuredPostLink = get_permalink($featuredPost);
includePart('templates/molecule-blog-jumbotron.php',$featuredPost_img,get_post($featuredPost)->post_title,'size-s blog',$featuredPostLink); ?>

<section id="work" class="container-fluid">
    <?php 

     $spacer_title = get_field('spacer_title');
     $spacer_text = get_field('spacer_text');
     $spacer_image = get_field('spacer_image');
                     ?>
  
    <div class="row">
        <?php
        $args = array (
            'post_type'  =>  array( 'post' ),
             'post__not_in' => array($featuredPost),
        );
        // The Query
        $query = new WP_Query( $args );
        // The Loop
        
        

        if ( $query->have_posts() ) { while ( $query->have_posts() ) { $query->the_post();
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

        if ($query->post_count % 4 == 0) {
           includePart('templates/blog-spacer.php',
                    'col-md-8',
                     $spacer_title,
                     $spacer_text,
                     $spacer_image
            );
        } elseif ($query->post_count % 3 != 0) {
           includePart('templates/blog-spacer.php',
                    'col-md-4',
                     $spacer_title,
                     $spacer_text,
                     $spacer_image                   
            );
        }
        wp_reset_postdata();


        ?>

    </div>
</section>
<?php endwhile; ?>
