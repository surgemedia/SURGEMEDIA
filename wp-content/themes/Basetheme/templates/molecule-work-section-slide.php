<section class="container-fluid"  
style="background-image: url('<?php echo $background_image; ?>')" >
<?php if(sizeof($repeater) > 1) {?>
<div class="controls <?php if($count % 2 == 0 ){ echo "left"; } ?>">
    <div onclick="jQuery('#<?php echo $carsoul_id ?>').carousel('next')" class="next-btn">
    <div data-icon="ei-chevron-right" data-size="m"></div></div>
    <div onclick="jQuery('#<?php echo $carsoul_id ?>').carousel('prev')" class="prev-btn">
    <div data-icon="ei-chevron-left" data-size="m"> </div></div>
</div>
<?php } ?>
    <div class="row">
        <div class="ghost-paragraph col-md-6 <?php if($count % 2 == 0 ){ echo "pull-right"; } ?>">
            <div class="col-md-11 <?php if($count % 1 == 0 ){ echo "pull-right"; } ?>">
               
                <h2><?php echo $section_title; ?></h2>
                <p><?php truncate($section_content,200,''); ?></p>
                
                <?php if($url): ?>
                <a class="url" target="_blank" href="<?php echo $url ?> "><?php
                $url_dirty = $url;
                $url_dirty = explode('www.',$url_dirty)[1];
                $url_clean = explode('/',$url_dirty)[0];
                echo $url_clean;
                ?></a>
                <?php endif; ?>

                <?php  
                $button_text =   'Watch Video';
                if($video){
                if(strpos($video,'youtube')){}
                if(strpos($video,'codepen')){
                    $button_text = "See Code";
                }
                preg_match('/src="(.+?)"/', $video, $matches);
                 $src = explode('/embed/',$matches[1])[1].'&rel=0';
                  ?>
                 <!-- Button trigger modal -->
                <button onclick="getFrameContent(this);" type="button" class="text-btn" data-toggle="modal" data-target="#caseStudyModal" data-contentid="<?php echo $carsoul_id.$i ?>">
               <?php echo $button_text; ?>
                </button>
                <div class="hiddenFrame" data-frameid="<?php echo $carsoul_id.$i ?>" >
                <iframe src="https://www.youtube.com/embed/<?php echo $src ?>" frameborder="0" allowfullscreen=""></iframe>
                </div>

                    
     
                 <?php  }  ?>
                
            </div>
            <?php  echo edit_post_link('edit', '<p>', '</p>'); ?>

        </div>

    </section>


    <?php // if(get_field('code_example') ){debug(get_field('code_example'));} ?>
                <?php //if(get_field('design')){ debug(get_field('design')); } ?>
                <?php
                // if(get_field('video')){
                //  $video_url = get_field('video');
                //  preg_match('/src="(.+?)"/', $video_url, $matches);
                // $src = $matches[1];
                //  debug($src);
                // }
                ?>