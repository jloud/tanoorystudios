<div class="clearfooter"></div>
</div><!--main-content-->

<footer class="main-footer">
	<div class="footer-logo">
		<p><span>Tanoory Studios</span></p>
	</div>
	<div class="holder">
		<?php
	        wp_nav_menu( array(
	        	'menu'		=> 'footer-menu',
	            'container' => false,
	            'depth' => 0,
	            'items_wrap' => '<ul class="footer-menu">%3$s</ul>',
	        ) );
	    ?>
	    <a class="copyright" href="<?php echo home_url(); ?>">&#169; Tanoory Studios</a>
	</div>
</footer>

</div><!--wrapper -->

<?php wp_footer(); ?>
	
</body>
</html>