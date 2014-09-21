<?php get_header(); ?>

<?php 

$etsy_card = get_post_meta($post->ID, 'etsy-card', true);
$etsy_shirt = get_post_meta($post->ID, 'etsy-shirt', true);
$etsy_ill = get_post_meta($post->ID, 'etsy-ill', true);
$etsy_group = get_post_meta($post->ID, 'etsy-group', true);

$prev_post = get_adjacent_post(true, '', true);
$next_post = get_adjacent_post(true, '', false);

$actual_link = 'http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]';

?>

<?php while (have_posts()) : the_post(); ?>
	<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
		<div class="post-top">
			<h2>
			<?php
					if($prev_post) {
						echo '<span class="post-link-left">';
						previous_post_link('%link','<img src="'.get_template_directory_uri().'/img/arrow-left.png" />', TRUE);
						echo '</span>';
					} else {
						echo '';
					} ?>
				<span class="post-link-main"><?php the_title(); ?></span>
				<?php
					if($next_post) {
						echo '<span class="post-link-right">';
						next_post_link('%link','<img src="'.get_template_directory_uri().'/img/arrow-right.png" />', TRUE);
						echo '</span>';
					} else {
						echo '';
					} ?>
			</h2>
		</div>
		<div class="post-bottom">
			<div class="holder">
				<div class="controls">
					<a class="prev">Previous</a>
					<a class="next">Next</a>
				</div>
				<div class="slideshow">
				<div class="entry-content gallery">
					<?php the_content(); ?>
					<div class="gallery-thumbs"></div>
				</div>

			</div>
		</div>
		<div class="side-bar">
				<div class="side-holder">
					<?php
						if ($etsy_card || $etsy_shirt || $etsy_ill || $etsy_group) {
							echo '<div class="etsy"><img src="'.get_template_directory_uri().'/img/icons_etsy-title.png">';
						}
						if ($etsy_card) {
							echo '<a class="etsy-card" href="'.$etsy_card.'" target="_blank"><span>Card</span></a>';
						}
						if ($etsy_shirt) {
							echo '<a class="etsy-shirt" href="'.$etsy_shirt.'" target="_blank"><span>Shirt</span></a>';
						}
						if ($etsy_ill) {
							echo '<a class="etsy-ill" href="'.$etsy_ill.'" target="_blank"><span>Art</span></a>';
						}
						if ($etsy_group) {
							echo '<a class="etsy-group" href="'.$etsy_group.'" target="_blank"><span>Group</span></a>';
						}
						if ($etsy_card || $etsy_shirt || $etsy_ill || $etsy_group) {
							echo '</div>';
						}
					?>
					<div class="social">
						<span class="face">
						<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" target="blank"><img src="<?php echo get_template_directory_uri() ?>/img/trans.png" /></a>
						</span>
						<span class="twit"><a href="http://twitter.com/share"><img src="<?php echo get_template_directory_uri() ?>/img/trans.png" /></a></span>
						<span class="pint"><a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());"><img style="margin: 0 0 -5px 0;" onclick="doPinIt();" src="<?php echo get_template_directory_uri() ?>/img/trans.png" alt="Pin It" /></a></span>
					</div>
				</div>
			</div>
	</article>
<?php endwhile; // End the loop ?>
		
<?php get_footer(); ?>