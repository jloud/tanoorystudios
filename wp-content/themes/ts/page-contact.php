<?php
/*
Template Name: Contact
*/
get_header(); ?>

<section>

<div class="contact">
<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<div class="profile">
		<?php if ( has_post_thumbnail() ) { 
			the_post_thumbnail(); } ?>
		</div>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			<div class="email-form">
				<?php include (TEMPLATEPATH.'/cust-email-form.php'); ?>
			</div>
		</article>
	<?php endwhile; // End the loop ?>
	
</div><!--contact -->

</section>
			
<?php get_footer(); ?>


