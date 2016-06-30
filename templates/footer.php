<footer id="footer" class="content-info" role="contentinfo">
  <div class="container">
  <div class="row">
  	<div class="col-lg-12 text-center"><i class="surge-logo-symbol"></i></div>
    <div class="col-xs-12 col-lg-6 signUp col-lg-push-3">
    <?php $frontpage_ID = get_option('page_on_front'); ?>
        <?php displayGravityForm(get_field('email_sign_up',$frontpage_ID)) ?>
        
    </div>

    
    
    <div class="col-xs-12 col-lg-3 col-sm-6 col-sm-push-6 followUs col-lg-push-3">
    	<span class="title text-center">Follow Us</span>
   	
        <ul>
        <?php
            $homeId = 5;
            // debug(get_post_meta(get_the_ID()));
            // check if the repeater field has rows of data
            if( have_rows('social_icons', $homeId) ):
                // loop through the rows of data
                while ( have_rows('social_icons',$homeId) ) : the_row(); 
               
                    if(get_sub_field('show')){?>
                        
                    <li>
                        <a href="<?php echo get_sub_field('url') ?>" target="_blank">
                            <i class="fa fa-<?php echo  get_sub_field('icon')?>"></i>
                        </a>
                    </li>
                 
        
        <?php       }
                endwhile;

            else :

                // no rows found

            endif;

        ?>
    		
    	</ul>
    </div>

    <div class="col-xs-12 col-lg-3 col-sm-6 col-sm-pull-6 copyRight col-lg-pull-9">
        <span class="title"><?php echo date("Y"); ?> &copy; Surge Media</span>
        <?php
                    if (has_nav_menu('footer-menu')) :
                      wp_nav_menu(['theme_location' => 'footer-menu']);
                    endif;
                ?>
    </div>
    <?php includePart('templates/atom-chatrify.php') ?>
  </div>
  </div>
  
</footer>
