<?php
/**
* Template Name: Showcase Template
*/
?>
<?php while (have_posts()) : the_post(); ?>
<?php 

 $image_url = getFeaturedUrl();
 ?>
<?php includePart('templates/molecule-small-jumbotron.php',$image_url,get_the_title(),'size-s',true); ?>
<div id="listjs-wrapper">
<div class="white-bg">
    <div id="service-narbar" class="container filter-group filter--service">
     <!-- <input class="search" placeholder="Search" /> -->
        <ul>
    <?php 
    $media_list = get_field('media');
    $tag0_list = array();
    $tag1_list = array();

    $sizeof = sizeof($media_list);
    for ($i=0; $i < $sizeof; $i++) { 
        array_push($tag0_list, trim($media_list[$i]['tag_one']));
        array_push($tag1_list, trim($media_list[$i]['tag_two']));
      }
    
    $tag0_list = array_values(array_flip(array_flip($tag0_list)));
    $tag1_list = array_values(array_flip(array_flip($tag1_list)));

    $tags0_list_sizeof = sizeof($tag0_list);
    $tags1_list_sizeof = sizeof($tag1_list);

    for ($tags_i=0; $tags_i < $tags0_list_sizeof; $tags_i++) { 
      if(strlen($tag0_list[$tags_i]) > 0 ){
      ?>

         <li>
                 <label>
                  <input id="" type="checkbox" data-filter="tag0" class="filter filter0" value="<?php echo trim($tag0_list[$tags_i]); ?>"> <?php echo $tag0_list[$tags_i] ?>
                </label>           
            </li>
    <?php } }
    unset($tags_i);
     for ($tags_i=0; $tags_i < $tags1_list_sizeof; $tags_i++) { 
       if(strlen($tag1_list[$tags_i]) > 0 ){ 
        ?>
         <li>
                 <label>
                  <input id="" type="checkbox" data-filter="tag1" class="filter filter1" value="<?php echo trim($tag1_list[$tags_i]); ?>"> <?php echo $tag1_list[$tags_i] ?>
                </label>           
            </li>
    <?php }  } ?>
        </ul>
    </div>
</div>
<ul class="list">
<?php //debug(get_field('media'));

 for ($i=0; $i < sizeof($media_list); $i++) { 
     if($media_list[$i]['acf_fc_layout'] == 'video'){
        //odebug($media_list[$i]);
        get_component([ 'template' =>'showcase-video-obj',
                        'vars' => [
                            'video' => $media_list[$i]['url'],
                            'image' => $media_list[$i]['thumbnail'],
                            'title' => $media_list[$i]['title'],
                            'subtitle' => $media_list[$i]['subtitle'],
                            'tag0' => $media_list[$i]['tag_one'],
                            'tag1' => $media_list[$i]['tag_two'],

                            'color' => hex2rgba( $media_list[$i]['background_color'] , 0.8),
                            'class' => 'showcase-obj col-md-6 col-sm-12 col-xs-12 shuffle__sizer'
                        ]
                     ]);
     } elseif ($media_list[$i]['acf_fc_layout'] == 'website') {
        get_component([ 'template' =>'showcase-website-obj',
                        'vars' => [
                            'website' => $media_list[$i]['url'],
                        ]
                     ]);
     }
 } ?>
 </ul>
  </div>
<div class="modal fade" id="caseStudyModal" tabindex="-1" role="dialog" aria-labelledby="caseStudyModal">
  <div class="modal-dialog" role="document">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><div data-icon="ei-close" data-size="s">
        </button>
    <div class="modal-content">
      <div id="replaceable" class=""></div>
    </div>
  </div>
</div>
<script>
  jQuery('#caseStudyModal').on('hidden.bs.modal', function (e) {
   jQuery('#replaceable').empty();
  });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/1.2.0/list.js"></script>
<script>
    
var options = {
    valueNames: [ 'title','tag0','tag1' ]
    };

    var datalist = new List('listjs-wrapper', options);


    var activeFilters = [];

    //filter
    jQuery('.filter0').change(function() {
        var isChecked = this.checked;
        var value = jQuery(this).val();
        jQuery(this).parent('label').addClass('active');

        // console.log(value);
        if(isChecked){
            //  add to list of active filters (case sensitive)
            activeFilters.push(value);
        }
        else
        {
            // remove from active filters
            activeFilters.splice(activeFilters.indexOf(value), 1);
        jQuery(this).parent('label').removeClass('active');

        }
        
        datalist.filter(function (item) {
            if(activeFilters.length > 0)
            {
                return(activeFilters.indexOf(item.values().tag0)) > -1;
            }
            return true;
        });
     });
    jQuery('.filter1').change(function() {
        var isChecked = this.checked;
        var value = jQuery(this).val();
        jQuery(this).parent('label').addClass('active');
        // console.log(value);
        if(isChecked){
            //  add to list of active filters (case sensitive)
            activeFilters.push(value);
        }
        else
        {
            // remove from active filters
            activeFilters.splice(activeFilters.indexOf(value), 1);
            jQuery(this).parent('label').removeClass('active');


        }
        
        datalist.filter(function (item) {
            if(activeFilters.length > 0)
            {
                return(activeFilters.indexOf(item.values().tag1)) > -1;
            }
            return true;
        });
     });
</script>
<script type="text/javascript">
function getFrameContent(button){
  jQuery('#replaceable').empty();
  var html;
  var frame;
  frame = jQuery(button).data('contentid');
  html = jQuery('[data-frameid="'+frame+'"]').clone();
  jQuery('#replaceable').html(html);
}
</script>
<?php endwhile; ?>
