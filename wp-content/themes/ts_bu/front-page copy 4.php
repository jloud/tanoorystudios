<?php get_header(); ?>
	<section class="container front" role="banner">
		<div>
			<div class="main-titles">
				<!--<h1>Tanoory<br><span class="studios">Studios</span></h1>-->
				<img src="<?php echo get_template_directory_uri(); ?>/img/logo-home.svg">
				<ul class="options">
					<li class="front-spots"><a href="category/spots"><span>Spots</span></a></li>
					<li class="front-ills"><a href="category/illustrations"><span>Illustration</span></a></li>
					<!--<li class="front-logos"><a href="category/logos"><span>Logos</span></a></li>-->
					<li class="clearfix"></li>
				</ul>
				<p class="see-work">
					<a class="arrow" href="#front-gal">
					<span class="down-icon"></span>
					<span class="recent-text">Recent work</span>
					</a>
				</p>
			</div><!-- main-titles -->
			<div class="front-bg-pics">
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
				/*foreach ($imgs as $img) {
					$img = substr($img, $doc_root);
					
					if(in_array($counter,$front_pics)){
						echo '<img class="bg-pic-'.$counter.'" data-stellar-ratio="0.4" src="'.$img.'">';
					} else if(in_array($counter,$mid_pics)){
						echo '<img class="bg-pic-'.$counter.'" data-stellar-ratio="0.3" src="'.$img.'">';
					} else {
						echo '<img class="bg-pic-'.$counter.'" data-stellar-ratio="0.2" src="'.$img.'">';
					}
					$counter++;
				}		*/
				?>
				</div>
			</div><!-- front-bg-pics -->
		</div><!-- front div -->
	</section>
	
	
			
	<section id="front-gal" class="front-thumbnails" role="main">
		<div>
			<h2><span>Latest Work</span></h2>
			<div class="controls">
				<div>
					<div>
						<span class="prev"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow-left-wh.png"></span>
						<span class="next"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow-right-wh.png"></span>
					</div>
				</div>
			</div>
			<div class="front-holder">
			<?php
			
			$args = array(
				'showposts' => 8
			);
		
			$the_query = new WP_Query($args); 
			?>
				<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?> 	
				<div class="front-thumb">
					<div>
					<a class="img-main" href="<?php the_permalink(); ?>"><span><?php the_title(); ?></span><?php the_post_thumbnail();?></a>
					<img class="img-placeholder" src="<?php echo get_template_directory_uri(); ?>/img/front-gallery-tran.png">
					</div>
				</div> 
			 	<?php endwhile; ?>  
			 	
			</div>
		</div>
	</section>
	
<?php get_footer(); ?>