<?php get_header(); ?>

<!-- Row for main content area -->
	<div class="small-12 large-8 columns" role="main">
	
	<?php
	//if(!is_paged()){
	if(!is_paged()){
		$postnum = 3;
	} else {
		$postnum = 10;
	}
	?>
	
	<?php 
		$args = array(
			'posts_per_page' => $postnum
		);
		$home_query = new WP_Query($args)
	?>
	
	

	
	<?php if ($home_query -> have_posts()) : while ( $home_query -> have_posts() ) : $home_query -> the_post();
	?>
			<?php get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile; ?>
	
	
	
	
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		
	<?php endif; // end have_posts() check ?>
	
	
	
	<?php /* Display navigation to next/previous pages when applicable */ ?>
	<?php if ( function_exists('reverie_pagination') ) { reverie_pagination(); } else if ( is_paged() ) { ?>
		<nav id="post-nav">
			<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'reverie' ) ); ?></div>
			<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'reverie' ) ); ?></div>
		</nav>
	<?php } ?>
	
	<?php wp_reset_query(); ?>

	</div>
	<?php get_sidebar(); ?>
		
<?php get_footer(); ?>