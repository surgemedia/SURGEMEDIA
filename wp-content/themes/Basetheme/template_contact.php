<?php
/**
* Template Name: Contact Template
*/
?>
<?php while (have_posts()) : the_post(); ?>
<?php // includePart('templates/molecule-small-jumbotron.php',getFeaturedUrl(),get_the_content(),false); ?>
<?php 
        $image = getFeaturedUrl();
         $image_url = aq_resize($image,1920,1080,true,true,true);
         // $size = $args[3];
         // $quote = $arg[4];
          ?>
<section id="jumbotron" class="big-background <?php echo $size; ?>" style="background-image:url('<?php echo $image ?>');">
    <div class="pattern-bg"></div>
        <div id="contactus" class="container">
         <h1 class="text-center"><?php the_title(); ?></h1>
            <div class=" text-center col-md-10 col-md-offset-1">
            <p><?php the_content(); ?></p>
            </div>
        <div class="col-md-6">
            <?php displayGravityForm(get_field('contact_form')) ?>
        </div>
         </div>
    </section>

<section id="contact-info">
     <div class="big-paragraph row">

        <main class="quote text-center">
        <h2>Our Contact Details</h2>
       <ul class="list-unstyled col-md-8 col-md-offset-2">
           <li><i class="surge-icon-phone"></i> <span><?php the_field('phone') ?></span></li>
           <li><i class=" surge-icon-at"></i> <span><?php the_field('email') ?></span></li>
           <li><i class="surge-icon-map "></i> <span><?php echo get_field('address')['address']; ?></span></li>
           <li><i class="surge-icon-mail"></i> <span><?php the_field('mail_address') ?></span></li>
       </ul>
        </main>
       
        
        
    </div>
</section>


<section>
      <?php 

$location = get_field('address');

if( !empty($location) ):
?>
<div class="acf-map">
  <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
</div>
<?php endif; ?>

</section>
<?php endwhile; ?>
