<p>You can send an email an me below</p>

<form method="post" action="<?php echo get_template_directory_uri(); ?>/cust-email-engine.php">
	<input type="text" name="Name" id="Name" placeholder="Name"/>
	<input type="text" name="Email" id="Email" placeholder="Email"/>
	<textarea name="Message" rows="20" cols="20" id="Message" placeholder="Message"></textarea>
	<input type="submit" name="submit" value="Submit" class="submit-button" />
</form>
