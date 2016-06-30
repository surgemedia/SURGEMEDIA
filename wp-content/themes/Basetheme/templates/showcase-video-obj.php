<?php 
	// $image = $args[1];
	// $color = $args[2];
	// // $client = $args[3];
	// $service = $args[3]; 
	// $case_study_url = $args[4]; //correct
	// $work_home_j = $args[5];
	// $client_name = $args[6];
	 ?>


<?php 

		$vars['video'] = explode('embed%2F',urlencode($vars['video'])); 
		$vars['video'] = explode('%3',$vars['video'][1])[0]; 
		// $vars['finalFrame'] = '<iframe width="100%" height="450" src="https://www.youtube.com/embed/'.$vars['video'].'?enablejsapi=1&modestbranding=1&showinfo=0" frameborder="0" allowfullscreen></iframe>';
			//echo $vars['video'];



		?>
		<li data-groups='["<?php echo strtolower($vars['tags']); ?>"]' class="work-obj col-md-4 col-sm-12 col-xs-12" style="background-image:url('<?php echo aq_resize($vars['image'],610,485,true,true,true) ?>');">
		<div class="overlay" style="background-color:<?php echo $vars['color']; ?>">
			<hgroup>
		<button onclick="getFrameContent(this);" type="button" class="text-btn" data-toggle="modal" data-target="#caseStudyModal" data-contentid="<?php echo $vars['video'] ?>">
				<h1 class="title"><?php echo $vars['title'] ?></h1>
				<h2 class="title"><?php echo $vars['subtitle']  ?></h2>
				</button>
			</hgroup>
					<div class="hiddenFrame" data-frameid="<?php echo $vars['video'] ?>" >
                <iframe src="https://www.youtube.com/embed/<?php echo $vars['video'] ?>" frameborder="0" allowfullscreen=""></iframe>
                </div>
		</div>
			<ul class="hiddenFrame">
				<small class="tag0"><?php echo trim($vars['tag0']); ?></small>
				<small class="tag1"><?php echo trim($vars['tag1']); ?></small>
					</ul>
			</li>

	
		
			