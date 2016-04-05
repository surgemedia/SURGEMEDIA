<?php
/**
* Template Name: About Template
*/
?>
<?php while (have_posts()) : the_post(); ?>
	<?php 
	$image = getFeaturedUrl(); 
	$image_url = aq_resize($image,1920,1080,true,true,true);
		  ?>
<section id="jumbotron" class="big-background" style="background-image:url('<?php echo $image ?>');">
    <div class="pattern-bg"></div>
        <div class="container">
            <div class="quote text-center"><?php the_content(); ?>
			
			<i class="surge-icon-quotation_mark_start"></i>
			<i class="surge-icon-quotation_mark_end"></i>
            </div>

        </div>
    </section>


    <section id="about" class="container-fluid teal-dark-bg text-white">
        <div class="row">

			<?php

// check if the repeater field has rows of data
if( have_rows('paragraphs') ):

 	// loop through the rows of data
    while ( have_rows('paragraphs') ) : the_row(); ?>
<div class="container text-center">
       <div class="text-puff">
       <h2 class="alt"><?php the_sub_field('title'); ?></h2>
       <p><?php the_sub_field('content'); ?></p>
       </div>
</div>

<?php
    endwhile;

else :

    // no rows found

endif;

?>
        </div>
    </section>

    <section id="our_skills">
      <div class="">
        <div class="container text-center" >
          <div class="text-puff">
            <h2 class="alt">Our Skills</h2>
            <p><?php the_field('our_skills'); ?></p>
          </div>
          <div class="button-skills">
            <div data-icon="ei-close" data-size="m">
            </div>
            <div class="buttons">
            <?php
               // check if the repeater field has rows of data
               if( have_rows('our_skills_button') ):
                 // loop through the rows of data
                   while ( have_rows('our_skills_button') ) : the_row();
                       // display a sub field value?>
                     <div class="button-item">
                       <a href="#" class="button">
                       <?php the_sub_field('title'); ?></a>
                      <div class="content"> <?php the_sub_field('content'); ?> </div>                 
                       <?php if(get_sub_field('link')):?>
                        <a class="link" href="<?php echo get_sub_field("link_url")?>" target="_blank">
                          <div> 
                           <?php if(get_sub_field('link_icon')):?>
                            <i class="surge-icon-<?php echo get_sub_field('icon')?>"></i>
                           <?php endif; ?>
                           <?php the_sub_field('link_text') ?>
                          </div>
                        </a>
                       <?php endif; ?>
                       
                     </div>
                       
               <?php endwhile;
               else :
                   // no rows found
               endif;
             ?>
            </div>
            <div id="contact-form" class="col-lg-6 pull-right">
               <p><?php the_field('over_text_form'); ?></p>
               <?php displayGravityForm(get_field('our_skills_form')); ?>
            </div>
          </div>
        </div>
      </div>
    </section>





    <?php $staff_bg = get_field('our_staff_background'); ?>

    <section id="our_staff" style="background-image:url('<?php echo $staff_bg ?>');">
    <div class="pattern-bg">

    <div class="container text-center" >
    <div class="text-puff">
	    <h2 class="alt">Our Staff</h2>
	    <p><?php the_field('our_staff'); ?></p>
       </div>
       </div>
       </div>
    </section>
    <section id="staff-objs" class="container-fluid">
<?php 
		// WP_Query arguments
		$args = array (
			'post_type'              => array( 'staff' ),
			'posts_per_page'	=> -1,
			'post__in' => get_field('staff_members'),
            'orderby' => 'post__in'
		);

		// The Query
		$query = new WP_Query( $args );

		// The Loop
		$count = 1;
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post(); 

		 $image = getFeaturedUrl(); 
		 $image_url = aq_resize($image,840,540,true,true,true);
				?>
    	<article class="row <?php the_field('color') ?>" >
       <div class="img hidden-md hidden-lg ">
             <img class="img-responsive" src="<?php echo $image_url; ?>" />
          </div>
    	<div data-panel="<?php echo 'staff'.$count; ?>" class="col-md-6 description <?php  if($count % 2 == 0){ echo "pull-left"; } else { echo "pull-right";} ?>">
    		<span  onclick="contactOpen('<?php echo 'staff'.$count; ?>','col-md-6','col-md-12')">
            <div data-icon="ei-close" data-size="m">
            </div>
            </span>

    		<a class="link" onclick="contactOpen('<?php echo 'staff'.$count; ?>','col-md-6','col-md-12')" type="button">
			More Details
			</a>
        
    		<div class="hidebox">
    		<h1><?php the_title() ?></h1>
    		<small><?php the_field('job_title'); ?></small>
    		</div>
    		<div class="textbox">
			<p><?php truncate(get_the_content(),200,''); ?></p>
	    		<ul>
	    			<li><i class="surge-icon-mail"></i>
            <!--email_off-->  
            <a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a>
            <!--/email_off-->  
            </li>
	    			<li><i class="surge-icon-phone"></i><a href="tel:<?php echo trim(str_replace(' ', '', get_field('phone'))); ?>"><?php the_field('phone'); ?></a></li>
	    		</ul>
    		</div>
    	   </div>
    	  <div class="img col-md-6 hidden-sm  hidden-xs">
             <img src="<?php echo $image_url; ?>" />
          </div>
    	</article>
    <?php 
		$count++;
			}
		} else {
			// no posts found
		}

		// Restore original Post Data
		wp_reset_postdata();
	?>
    	</section>
  <script>
      function contactOpen(data,remove,add){
        if( jQuery('[data-panel="'+data+'"]').hasClass(remove) ){
        jQuery('[data-panel="'+data+'"]').removeClass(remove);
        jQuery('[data-panel="'+data+'"]').addClass(add);
          } else {
            jQuery('[data-panel="'+data+'"]').removeClass(add);
           jQuery('[data-panel="'+data+'"]').addClass(remove);
          }
      }
      
      var buttonSkills = {
        buttonExpand : function(){
          jQuery(".button-skills .button-item a:first-child").on("click",function(event){
              event.preventDefault();
              jQuery(this).siblings(".content").css("display","block");
              jQuery(this).siblings(".link").css("display","inline-block");
              jQuery(this).parent().siblings().css("display","none");
              jQuery(".button-skills").addClass("expanded");
              jQuery(".button-skills .icon--ei-close").css("display","block");
              jQuery(".button-skills #contact-form").css("display","block");
              jQuery(".button-skills .buttons").addClass("col-lg-6");

          });
          console.log("loading buttonExpand");
        },
        closeSection : function(){
          jQuery(".button-skills .icon--ei-close").on("click",function(){
              jQuery(this).siblings("#contact-form").css("display","none");
              jQuery(this).siblings(".buttons").removeClass("col-lg-6");
              jQuery(".button-skills .buttons .button-item .content").css("display","none");
              jQuery(".button-skills .buttons .button-item .link").css("display","none");
              jQuery(".button-skills .buttons .button-item").css("display","inline-block");
              jQuery(".button-skills").removeClass("expanded");
              jQuery(this).css("display","none");
              console.log("close");
          });
          console.log("loading closeSection");
        }
      };
      jQuery(window).load(function(){
        buttonSkills.buttonExpand();
        buttonSkills.closeSection();
      });
  </script>

    <?php endwhile; ?>