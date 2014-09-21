<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" <?php language_attributes(); ?> > <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" <?php language_attributes(); ?> > <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" <?php language_attributes(); ?> "> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?> > <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>">

	<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>

	<!-- Mobile viewport optimized: j.mp/bplateviewport -->
	<meta name="viewport" content="width=device-width" />

	<!-- Favicon and Feed -->
	<link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">

	<!--  iPhone Web App Home Screen Icon -->
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-icon-ipad.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-icon-retina.png" />
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-icon.png" />

	<!-- Enable Startup Image for iOS Home Screen Web App -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/mobile-load.png" />

	<!-- Startup Image iPad Landscape (748x1024) -->
	<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-load-ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)" />
	<!-- Startup Image iPad Portrait (768x1004) -->
	<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-load-ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)" />
	<!-- Startup Image iPhone (320x460) -->
	<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-load.png" media="screen and (max-device-width: 320px)" />

<?php wp_head(); ?>

<script type="text/javascript" async src="//assets.pinterest.com/js/pinit.js"></script>

</head>

<body <?php body_class(); ?>>

<div class="bg-overlay"></div>

<div class="wrapper">

	<div class="contain-to-grid">
		<!-- Starting the Top-Bar -->
		<nav class="top-bar">
		    <section class="nav-section">
		    <div>
		    <div class="logo"><a href="<?php echo home_url(); ?>"></a></div>
		    <a href="#" class="mobile-button"></a>
		
		    <?php
	        wp_nav_menu( array(
	            'theme_location' => 'primary',
	            'container' => false,
	            'depth' => 0,
	            'items_wrap' => '<ul class="main-nav">%3$s</ul>'
	        ) );
				?>
		    <!--<div class="social-media">
					<span class="face"><img src="<?php echo get_template_directory_uri(); ?>/img/icons_sm-fb.png"></span>
					<span class="twit"><img src="<?php echo get_template_directory_uri(); ?>/img/icons_sm-tw.png"></span>
					<span class="pint"><img src="<?php echo get_template_directory_uri(); ?>/img/icons_sm-pi.png"></span>
				</div>-->
		  </div>
		  </section>
		</nav>
		<!-- End of Top-Bar -->
	</div>
	
	<div class="contact">
		<div class="holder">
			<div class="profile">
			<img src="<?php echo get_template_directory_uri() ?>/img/profile.jpg">
			</div>
			<div class="email-form">
			<?php include (TEMPLATEPATH.'/cust-email-form.php'); ?>
			</div>
		</div>
	</div>
	
	<div class="main-content">
