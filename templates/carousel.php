<?php 
$videoid = get_field('video_background');
$videoid = explode('/embed/',htmlentities($videoid))[1];
$videoid = explode('?',$videoid)[0];


$carousel = get_field('carousel');
?>
<section id="jumbotron" class="big-background" >
  <!-- <div id="video-bg" class="hidden-xs hidden-sm" style="background-image:url(<?php the_field('video_background_thumb') ?>); background-size:cover;" ></div> -->
  <div class="pattern-bg">
<div class="container">
<div id="carousel-id" class="carousel slide row" data-ride="carousel">
    
    <div class="carousel-inner">
             <?php 
                 for ($i=0; $i < sizeof($carousel); $i++) { 
                if($i == 1){
                    $active = 'active'; } else { $active = ''; }
                include(locate_template('templates/carousel-slide.php'));
                }; 
            ?>
    </div>
    <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
    <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div>
</div>
</div>
  <video id="video-bg" autoplay loop muted preload="auto">
    <source src="wp-content/themes/Basetheme/home-vid.mp4" type="video/mp4">
  </video>
</section>

