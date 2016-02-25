<?php 
	$image = $args[1];
	$color = $args[2];
	// $client = $args[3];
	$service = $args[3]; 
	$case_study_url = $args[4]; //correct
	$work_home_j = $args[5];
	$client_name = $args[6];
	 ?>


	<article data-groups='["<?php echo strtolower($service); ?>"]' class="work-obj col-md-4 col-sm-12 col-xs-12 shuffle__sizer" style="background-image:url('<?php echo aq_resize($image,610,485,true,true,true) ?>');">
		<div class="overlay" style="background-color:<?php echo $color; ?>">
			<hgroup>
				<h1><a href="<?php echo $case_study_url.'#'.$work_home_j; ?>"><?php echo $client_name ?></a></h1>
				<h2><?php echo $service ?></h2>
			</hgroup>
		</div>
	</article>
			

	