<?php
/**
* Template Name: Services Template
*/
?>
<?php while (have_posts()) : the_post(); ?>
<?php 
$spacer_title = get_field('spacer_title');
$spacer_text = get_field('spacer_text');
$spacer_image = get_field('spacer_image');

$paragraph = get_field('services_paragraph');
 $image_url = getFeaturedUrl();
 ?>
 <?php for ($i=0; $i < sizeof($paragraph); $i++) { ?>
<?php if($paragraph[$i]['hashtag'] == $_GET['service']){
    $image_url = $paragraph[$i]['image']; 
  } } ?>
<?php includePart('templates/molecule-small-jumbotron.php',$image_url,get_field('title'),'size-s',true); ?>
<div class="white-bg">
    <div id="service-narbar" class="container filter-group filter--service">
        <ul>
            <li>
                <a class="<?php if($_GET['service'] =='All'){ echo 'active';} ?> " href="?service=All">
                    All
                </a>             
            </li>
            <li>
                <a class="<?php if($_GET['service'] =='Design') { echo 'active';}?> " href="?service=Design">
                    Design
                </a>               
            </li>
            <li >
                <a class="<?php if($_GET['service'] =='Development'){ echo 'active';} ?> " href="?service=Development">
                    Web
                </a>            
            </li>
            <li >
                <a class="<?php if($_GET['service'] =='Video'){ echo 'active';} ?> " href="?service=Video">
                    Video
                </a>
            </li>
        </ul>
    </div>
</div>
<section id="work" class="container-fluid">
    <?php// if(isset($_GET["service"])){ ?>
    
    <?php for ($i=0; $i < sizeof($paragraph); $i++) { ?>
    <?php if($paragraph[$i]['hashtag'] == $_GET['service']){ ?>
    <div class="big-paragraph row">
        <?php includePart('templates/molecule-quote-main.php',$paragraph[$i]['paragraph'],'',''); ?>
    </div>
   <?php } ?>
  
    <?php    } ?>
     <?php if('All' == $_GET['service']){ ?>
    <div class="big-paragraph row">

   <?php 
   if(strlen(trim(get_the_content())) > 0){
   $temp_content = '<p>'.get_the_content().'</p>'; 
   ?>
        <?php includePart('templates/molecule-quote-main.php',$temp_content,'',''); 
    } ?>
    </div>
   <?php } ?>
    
    <div class="row">
        <?php
        $case_study_urls = Array();
        $work_objs = Array();
        //Check wether the page is all or a one of the options
        if($_GET["service"] == 'All' OR  isset($_GET["service"]) == false){
        	  $args = array (
	        	'post_type'  =>  array( 'work' ),
                'posts_per_page' => -1,
                'orderby' => 'rand',
	        );
	        
	    } else {
            $tempVars = [
                'sort_type' => strtolower($_GET["service"]).'_order',
            ];
            $args;
            if(sizeof(get_field($tempVars['sort_type']) > 0)){
        		$args = array (
        	        'post_type'  =>  array( 'work' ),
                    'post__in' => get_field($tempVars['sort_type']),
                    'orderby' => 'post__in',
        	        'tax_query' => array(
        	                                array(
        	                                'taxonomy' => 'services',
        	                                'field' => 'slug',
        	                                'terms' => $_GET["service"]),
        	                                )
        	                         
        	        );
          } else {
                $args = array (
                    'post_type'  =>  array( 'work' ),
                    'posts_per_page' => -1, 
                    'orderby' => 'rand', 
                    'tax_query' => array(
                                            array(
                                            'taxonomy' => 'services',
                                            'field' => 'slug',
                                            'terms' => $_GET["service"]),
                                            )
                                     
                    );

        	    }
        };
        // The Query
        $query = new WP_Query( $args );
        $clientCount = 0;
        // The Loop
        if ( $query->have_posts() ) { while ( $query->have_posts() ) { $query->the_post();
                array_push($work_objs,get_post());

         } } else { array_push($work_objs,''); }
        // Restore original Post Data
        wp_reset_postdata();
        $obj_num=0;
        for ($i=0; $i < sizeof($work_objs); $i++) { 
            $post_id = $work_objs[$i]->ID;

            //debug(getCaseStudyLink( wp_get_post_terms($work_objs[$i]->ID,'clients', array("fields" =>
             //  "all"))[0]->term_id ));
            if(has_post_thumbnail($work_objs[$i]->ID) && getCaseStudyLink( wp_get_post_terms($work_objs[$i]->ID,'clients', array("fields" =>
                "all"))[0]->term_id ) != 'false'){
                includePart('templates/work-obj.php',
                getFeaturedUrl($work_objs[$i]->ID ),
                hex2rgba( get_field('overlay_color',$work_objs[$i]) , 0.8),
                wp_get_post_terms($work_objs[$i]->ID, 'services', array("fields" =>
                "all"))[0]->name,
                getCaseStudyLink( wp_get_post_terms($work_objs[$i]->ID,'clients', array("fields" =>
                "all"))[0]->term_id ),
                wp_get_post_terms($work_objs[$i]->ID, 'services', array("fields" =>
                "all"))[0]->name,
                wp_get_post_terms($work_objs[$i]->ID, 'clients', array("fields" =>
                "all"))[0]->name
                );
                $obj_num++;
            } 
        }
   
        if ( $obj_num % 3 > 0) {
            
           includePart('templates/work-spacer.php',
                    'col-md-'.(8/($obj_num % 3)),
                     $spacer_title,
                     $spacer_text,
                     $spacer_image
            );
        } 
        ?>
    </div>
</section>
<?php endwhile; ?>
