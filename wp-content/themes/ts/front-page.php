<?php get_header(); ?>
	<section class="container front" role="banner">
		<div>
			<div class="main-titles">
				<span class="logo"></span>
				<p class="tagline">A fancy artist boy based in Washington D.C.</p>
			</div><!-- main-titles -->
			<div class="front-bg-pics">
				<div></div>
			</div><!-- front-bg-pics -->
			<p class="see-work">
				<a class="arrow" href="#front-gal">
					<span class="recent-text">Recent work</span>
					<span class="down-icon"></span>
				</a>
			</p>
		</div><!-- front div -->
	</section>
	
	<section id="front-gal" class="front-thumbnails" role="main">
		<div>
			<h2><span>Latest Work</span></h2>
		  <div class="home-controls prev"><span class="arrow"></span></div>
			<div class="home-controls next"><span class="arrow"></span></div>
			<div id="home-car" class="home-holder">
			<?php
			
			$args = array(
				'showposts' => 8
			);

			$the_query = new WP_Query($args); 
			?>
				<?php while ($the_query -> have_posts()) : $the_query -> the_post();
				$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
				?> 	
				<div class="slide">
					<a class="artwork" href="<?php the_permalink(); ?>">
					<span class="bg-image" style="background-image: url('<?php echo $url; ?>');"></span>
					<span class="caption"><?php the_title(); ?></span></a>
				</div> 
			 	<?php endwhile; ?>  
			 	
			</div>
		</div>
	</section>
	
<?php get_footer(); ?>
<!--
<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?> 	
<div class="slide">
	<a class="artwork" href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?><span class="caption"><?php the_title(); ?></span></a>
</div> 
	<?php endwhile; ?>  -->