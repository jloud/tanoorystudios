<?php get_header(); ?>

	<section class="container front" role="banner">
		<div>
			<!--<div class="logo-holder"><img src="<?php echo get_template_directory_uri(); ?>/logos/logo_01.png"></div>-->
			<div class="main-titles">
				<h1>Tanoory<br><span class="studios">Studios</span></h1>
				<p>Artist based in Washington DC</p>
			</div>
			<div class="options">
				<ul>
					<li class="front-spots"><a href="category/spots"><span>Spots</span></a></li>
					<li class="front-ills"><a href="category/illustration"><span>Illustration</span></a></li>
					<li class="front-logos"><a href="category/logos"><span>Logos</span></a></li>
				</ul>
			</div>
			<p class="see-work"><a href="#front-gal"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow-down.png"></a></p>
		</div>
	</section>
	
	<section id="front-gal" class="front-thumbnails" role="main">
		<div>
			<h2><span>Latest Work</span></h2>
			<div class="front-holder">
			<?php
			
			$args = array(
				'showposts' => 6
			);
			
			$counter = 1;
			$the_query = new WP_Query($args); 
			?>
			
			<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>			
				<div <?php post_class('front-thumb num-'.$counter) ?> id="post-<?php the_ID(); ?>">
					<a href="<?php the_permalink(); ?>"><span><?php the_title(); ?></span><?php the_post_thumbnail();?></a>
				</div>
			<?php $counter++ ?>
			
			<?php endwhile;?>
				<div class="clearfix"></div>
			</div>
		</div>
	</section>
	
<?php get_footer(); ?>

<!--
$query_cat = new WP_Query('cat=9,posts_per_page=-1'); ?>
		<?php while ($query_cat->have_posts()) : $query_cat->the_post(); ?>
		<div <?php post_class('thumb') ?> id="post-<?php the_ID(); ?>">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a>
			
			
			<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
		</div>
		<?php endwhile; wp_reset_postdata(); ?>-->