<?php get_header(); ?>
	<section class="container front" role="banner">
		<div>
			<div class="main-titles">
				<img src="<?php echo get_template_directory_uri(); ?>/img/logo-home.svg">
				<p class="tagline">A fancy artist boy based in Washington D.C.</p>
			</div><!-- main-titles -->
			<div class="front-bg-pics">
				<span class="bgg-overlay"></span>
				<div>
				<?php 
				$doc_root = strlen($_SERVER['DOCUMENT_ROOT']);
				$imgs = glob(get_theme_root().'/ts/front/*');
				$front_pics = array(0);
				$mid_pics = array(1,2);
				$back_pics = array(3,4);
				
				$counter = 0;
				foreach ($imgs as $img) {
					$img = substr($img, $doc_root);
					
					if(in_array($counter,$front_pics)){
						echo '<img class="bg-pic-'.$counter.'" src="'.$img.'">';
					} else if(in_array($counter,$mid_pics)){
						echo '<img class="bg-pic-'.$counter.'" src="'.$img.'">';
					} else {
						echo '<img class="bg-pic-'.$counter.'" src="'.$img.'">';
					}
					$counter++;
				}		
				?>
				</div>
				<p class="see-work">
					<a class="arrow" href="#front-gal">
					<span class="down-icon"></span>
					</a>
					<span class="recent-text">Recent work</span>
				</p>
			</div><!-- front-bg-pics -->
		</div><!-- front div -->
	</section>
	
	
			
	<section id="front-gal" class="front-thumbnails" role="main">
		<div>
			<h2><span>Latest Work</span></h2>
			<div class="controls">
				<div>
					<div>
						<span class="prev"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow-left.png"></span>
						<span class="next"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow-right.png"></span>
					</div>
				</div>
			</div>
			<div id="home-car" class="home-holder">
			<?php
			
			$args = array(
				'showposts' => 8
			);
		
			$the_query = new WP_Query($args); 
			?>
				<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?> 	
				<div class="slide">
					<a class="artwork" href="<?php the_permalink(); ?>"><span class="caption"><?php the_title(); ?></span><?php the_post_thumbnail();?></a>
				</div> 
			 	<?php endwhile; ?>  
			 	
			</div>
		</div>
	</section>
	
<?php get_footer(); ?>