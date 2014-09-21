<?php get_header(); ?>

	<section class="container front" role="main">
		<!--<div class="logo-holder"><img src="<?php echo get_template_directory_uri(); ?>/logos/logo_01.png"></div>-->
		<div class="main-titles">
			<h1>Tanoory Studios</h1>
			<p>Artist based in Washington DC</p>
		</div>
		<p class="see-work"><a href="#front-gal">See My Work<br><span class="arrow">&#x21e7;</span></a></p>
	</section>
	
	<section>
	<div id="front-gal" class="front-gal-holder">
		<div class="front-gallery">
		<?php 
		
		$doc_root = strlen($_SERVER['DOCUMENT_ROOT']);
		$imgs = glob(get_theme_root().'/ts/front/*');
	
		foreach ($imgs as $img) {
			$img = substr($img, $doc_root);
			$img_name = preg_replace("/\\.[^.\\s]{3,4}$/", "", basename($img));
			$img_title = ucwords(str_replace('-', ' ', basename($img_name)));
			$img_url = $img_name;
			echo '<div><p><a href="'.$img_url.'">'.$img_title.'</a></p><img src="'.$img.'"></div>';
		}		
		?>
		</div>
		<div class="controls">
			<span class="prev">&#10094;</span>
			<span class="next">&#10095;</span>
		</div>
	</div>
	</section>
	
<?php get_footer(); ?>