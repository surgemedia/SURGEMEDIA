<footer id="footer" class="content-info" role="contentinfo">
  <div class="container">
  <div class="row">
  	<div class="col-lg-12 text-center"><i class="surge-logo-symbol"></i></div>
    <div class="col-lg-3 copyRight">
    <span class="title"><?php echo date("Y"); ?> &copy; Surge Media</span>
    <?php
                if (has_nav_menu('footer-menu')) :
                  wp_nav_menu(['theme_location' => 'footer-menu']);
                endif;
            ?>
    
     </div>
    <div class="col-lg-6 signUp">
    <?php $frontpage_ID = get_option('page_on_front'); ?>
    	<?php displayGravityForm(get_field('email_sign_up',$frontpage_ID)) ?>
    	<!-- form goes here -->
        <!-- <div class="gf_browser_chrome gform_wrapper" id="gform_wrapper_3"><a id="gf_3" class="gform_anchor"></a><form method="post" enctype="multipart/form-data" target="gform_ajax_frame_3" id="gform_3" action="/PinnacleProperties/property-search/#gf_3">
                        <div class="gform_heading">
                            <h3 class="gform_title">Sign Up for our newsletter. It's awesome</h3>
                            <span class="gform_description"></span>
                        </div>
                        <div class="gform_body"><ul id="gform_fields_3" class="gform_fields top_label form_sublabel_below description_below"><li id="field_3_1" class="gfield field_sublabel_below field_description_below"><label class="gfield_label" for="input_3_1"></label><div class="ginput_container ginput_container_email">
                            <input name="input_1" id="input_3_1" type="text" value="" class="medium" tabindex="1" placeholder="Your Email">
                        </div></li>
                            </ul></div>
        <div class="gform_footer top_label"> <input type="submit" id="gform_submit_button_3" class="gform_button button" value="SING UP" tabindex="2" onclick="if(window[&quot;gf_submitting_3&quot;]){return false;}  window[&quot;gf_submitting_3&quot;]=true;  "> <input type="hidden" name="gform_ajax" value="form_id=3&amp;title=1&amp;description=1&amp;tabindex=1">
            <input type="hidden" class="gform_hidden" name="is_submit_3" value="1">
            <input type="hidden" class="gform_hidden" name="gform_submit" value="3">
            
            <input type="hidden" class="gform_hidden" name="gform_unique_id" value="">
            <input type="hidden" class="gform_hidden" name="state_3" value="WyJbXSIsImE4MWYyNDE4Y2U3NTM1ODMyYmVmM2I2NTRlZTk1MWVhIl0=">
            <input type="hidden" class="gform_hidden" name="gform_target_page_number_3" id="gform_target_page_number_3" value="0">
            <input type="hidden" class="gform_hidden" name="gform_source_page_number_3" id="gform_source_page_number_3" value="1">
            <input type="hidden" name="gform_field_values" value="">
            
        </div>
                        </form>
                        </div> -->
    </div>
    <div class="col-lg-3 followUs">
    	<span class="title text-center">Follow Us</span>
   	
        <ul>
        <?php
            // debug(get_post_meta(get_the_ID()));
            // check if the repeater field has rows of data
            if( have_rows('social_icons') ):
                // loop through the rows of data
                while ( have_rows('social_icons') ) : the_row(); 
               
                    if(get_sub_field('show')){?>
                        
                    <li>
                        <a href="<?php echo get_sub_field('url') ?>">
                            <i class="fa fa-<?php echo  get_sub_field('icon')?>"></i>
                        </a>
                    </li>
                 
        
        <?php       }
                endwhile;

            else :

                // no rows found

            endif;

        ?>
    		<!-- <li><a href=""><i class="fa fa-facebook"></i></a></li>
                        <li><a href=""><i class="fa fa-instagram"></i></a></li>
                        <li><a href=""><i class="fa fa-youtube-play"></i></a></li>
                        <li><a href=""><i class="fa fa-linkedin"></i></a></li>
            <li><a href=""><i class="fa fa-twitter"></i></a></li> -->
    	</ul>
    </div>
  </div>
  </div>
  
</footer>
