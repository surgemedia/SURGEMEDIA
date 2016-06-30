<?php 
	$content = $args[1];
	$small = $args[2];
	$title = $args[3];


 ?>
 <?php if($title != ''){ ?>
	<h1 class="text-center">
		<?php echo $title; ?>
	</h1>
<?php } ?>
<main class="quote text-center"><?php echo str_replace(array("\r\n","\r","\n","\\r","\\n","\\r\\n"),"<br/>",$content); ?></main>
 <?php if($small != ''){ ?>
<small class="col-lg-12 text-center"><?php echo $small ?></small>
<?php } ?>