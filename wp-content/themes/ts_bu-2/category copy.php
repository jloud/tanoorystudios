<?php
/*
Template Name: Work
*/
get_header(); ?>

<?php 

if (is_category('illustrations')) {
	$query_cat = new WP_Query('cat=9&posts_per_page=-1');
	$title = 'illustrations';
} else if (is_category('spots')) {
	$query_cat = new WP_Query('cat=8&posts_per_page=-1');
	$title = 'spots';
} else {
	$query_cat = new WP_Query('category_name=logos');
	$title = 'logos';
}
?>

<section>
<h2><span><?php echo $title; ?></span></h2>
<div class="work-page">
	<div class="thumb-holder">
	<?php while ($query_cat->have_posts()) : $query_cat->the_post(); ?>
		<div <?php post_class('thumb') ?> id="post-<?php the_ID(); ?>">
			<a href="<?php the_permalink(); ?>"><span><?php the_title(); ?></span><?php the_post_thumbnail();?></a>
			<!--<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>-->
		</div>
	<?php endwhile; wp_reset_postdata(); ?>
	</div>
</div>

</section>
			
<?php get_footer(); ?>


