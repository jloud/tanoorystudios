<?php
/*
Template Name: Work
*/
get_header(); ?>

<?php 

$query_cat = new WP_Query('posts_per_page=-1');

?>

<section>

<div id="filters" class="buttons">
<button class="spots" data-filter=".spots">Spots</button>
<button class="all is-checked" data-filter="*">Everything</button>
<button class="illustration" data-filter=".illustration">Illustration</button>
</div>

<h2><span><?php echo $title; ?></span></h2>
<div class="work-page">
	<div class="thumb-holder">
	<?php while ($query_cat->have_posts()) : $query_cat->the_post(); ?>
		<div class="thumb <?php foreach((get_the_category()) as $category) { 
				echo $category->slug;
			} ?> " id="post-<?php the_ID(); ?>">
			<a href="<?php the_permalink(); ?>"><span class="work-title" ><span><?php the_title(); ?></span></span><?php the_post_thumbnail();?></a>
			<!--<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>-->
		</div>
	<?php endwhile; wp_reset_postdata(); ?>
	</div>
</div>

</section>
			
<?php get_footer(); ?>


