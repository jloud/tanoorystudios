<?php
/*
Template Name: Work
*/
get_header(); ?>

<?php 
	$query_ills = new WP_Query('cat=9');
	$query_spots = new WP_Query('category_name=spots');
	$query_logos = new WP_Query('category_name=logos');
?>

<section class="work-page">

<div class="illustrations slider" role="main">

	<div class="controls">
        <span class="prev prev1"><img src="<?php echo get_template_directory_uri(); ?>/img/icons_arrow-left.png"></span>
        <span class="next next1"><img src="<?php echo get_template_directory_uri(); ?>/img/icons_arrow-right.png"></span>
	</div>
	
	<div class="holder">
	
		 <div class="cycle-slideshow" 
		        data-cycle-fx=scrollHorz
		        data-cycle-timeout=0
		        data-cycle-prev=".prev1"
		        data-cycle-next=".next1"
		        data-cycle-slides="> div"
		        >

			<?php while ($query_ills->have_posts()) : $query_ills->the_post(); ?>
				<div <?php post_class('slide') ?> id="post-<?php the_ID(); ?>">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a>
					<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
				</div>
			<?php endwhile; wp_reset_postdata(); ?>

		</div><!--cycle -->

	</div><!--holder -->

</div><!--illustrations -->

</section>
			
<?php get_footer(); ?>


