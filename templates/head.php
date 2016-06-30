<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	
	<?php wp_head(); ?>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/evil-icons/1.7.8/evil-icons.min.css">
	<script src="https://cdn.jsdelivr.net/evil-icons/1.7.8/evil-icons.min.js"></script>
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:site" content="@surgemedia" />
	<meta name="twitter:description" content="To find out more or read this article please click through to our website." />
	<meta name="twitter:title" content="<?php the_title(); ?>" />
	<meta name="twitter:image" content="<?php echo aq_resize(getFeaturedUrl(),100,100,true,true,true); ?>" />
	<meta property="og:url"                content="<?php echo get_permalink(); ?>" />
	<meta property="og:image"              content="<?php echo getFeaturedUrl(); ?>" />
	<meta property="og:type"               content="article" />
	<meta property="og:title"              content="<?php the_title(); ?>" />
	<meta property="og:description"        content="<?php echo truncate(get_the_content(),50,''); ?>" />
</head>