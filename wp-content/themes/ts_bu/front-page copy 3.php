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
					<li class="front-ills"><a href="category/illustrations"><span>Illustration</span></a></li>
					<li class="front-logos"><a href="category/logos"><span>Logos</span></a></li>
				</ul>
			</div>
			<div class="see-work">
			<p><a href="#front-gal">
			<span>Recent</span><br/>
			<span class="arrow"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow-down.png"></span>
			</a></p>
			</div>
			
			<div class="front-bg-pics">
				<div>
				<?php 
				$doc_root = strlen($_SERVER['DOCUMENT_ROOT']);
				$imgs = glob(get_theme_root().'/ts/front/*');
				$bg_item_1 = array(0,1,2,3);
				
				$counter = 0;
				foreach ($imgs as $img) {
					$img = substr($img, $doc_root);
					if(in_array($counter,$bg_item_1)){
						echo '<img class="bg-pic-1" data-stellar-ratio="1" src="'.$img.'">';
					} else {
						echo '<img class="bg-pic-2" data-stellar-ratio="2" src="'.$img.'">';
					}
					$counter++;
				}		
				?>
				</div>
			</div>
		</div>
	</section>
	
	
			
	<section id="front-gal" class="front-thumbnails" role="main">
		<div>
			<h2><span>Latest Work</span></h2>
			<div class="controls"><span class="next">Next</span><span class="prev">Previous</span></div>
			<div class="front-holder">
			<?php
			
			$args = array(
				'showposts' => 8
			);
			
			$counter = 1;
			$variable = 0;
			$the_query = new WP_Query($args); 
			?>
			<div class="front-thumb">
			<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?> 	
			<?php if(($variable + 1) < 3){ ?>  
			
				<a href="<?php the_permalink(); ?>"><span><?php the_title(); ?></span><?php the_post_thumbnail();?></a>
				
				<?php $variable+=1; ?>  
				<?php } else { ?>  
		 		<?php $variable = 1; ?>  
		 		</div> 
		 		<div class="front-thumb">
			 	<a href="<?php the_permalink(); ?>"><span><?php the_title(); ?></span><?php the_post_thumbnail();?></a>
			 	<?php }?>  
			 	<?php endwhile; ?>  
			 	</div> 
			</div>
		</div>
	</section>
	
<?php get_footer(); ?>