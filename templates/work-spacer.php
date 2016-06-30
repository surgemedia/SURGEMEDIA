<?php //debug($args) ?>
<article class="text-center spacer work-obj <?php echo $args[1]; ?>" style="background-image:url( <?php echo $args[4]; ?>)">
<div class="overlay-layer">
	<h3><?php echo $args[2]; ?></h3>
	<?php echo apply_filters('the_content', $args[3]); ?>
	<a class="btn" href="#service-narbar">Back to top</a>
	</div>
</article>