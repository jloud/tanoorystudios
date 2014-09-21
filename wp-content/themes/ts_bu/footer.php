<div class="clearfooter"></div>
</div><!--main-content-->

<footer class="main-footer">
	<div class="footer-logo">
		<p><span>Tanoory Studios</span></p>
	</div>
	<div class="holder">
		<?php
	        wp_nav_menu( array(
	        	'menu'		=> 'mainmenu',
	            'container' => false,
	            'depth' => 0,
	            'items_wrap' => '<ul class="footer-menu">%3$s</ul>',
	        ) );
	    ?>
	    <ul class="social">
	    	<li><a>Facebook</a></li>
	    	<li><a>Twitter</a></li>
	    	<li><a>Pinterest</a></li>
	    </ul>
	    <p>&#169; Tanoory Studios</p>
	</div>
</footer>

</div><!--wrapper -->

<?php wp_footer(); ?>
	
</body>
</html>