<?php
include_once 'header.php'
?>

<section class="signup-form">
	<h2> Log in </h2>
	<div class="signup-form-form">
		<form action=includes/login.inc.php method="post">
			<input type="text" name="uid" placeholder="username/email...">
			<input type="password" name="pwd" placeholder="password...">

			<button type="submit" name="submit">Log in</button>
		</form>
	</div>
	<?php

    // error handling
	if(isset($_GET['error'])) {
		if($_GET['error'] == "emptyinput")
			echo "<p>fill in all fields</p>";

		if($_GET['error'] == "wronglogin")
			echo "<p>incorrect login information</p>";
	}
	?>
	
</section>

<?php
include_once 'footer.php';
?> 