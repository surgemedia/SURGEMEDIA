<?php 
		$image = $args[1]; 
		$content = $args[2];
		 $image_url = aq_resize($image,1920,1080,true,true,true);
		 $size = $args[3];
		 $link = $args[4];
		  ?>
<section id="jumbotron" class="big-background <?php echo $size; ?>" style="background-image:url('<?php echo $image ?>');">
    <div class="pattern-bg"></div>
        <div class="container">
            <div class="text-center"><h1 class="alt"><?php echo $content; ?></h1>
            <a href="<?php echo $link; ?>" class="btn blue">Find out More</a>
			
            </div>
        </div>
    </section>