<?php
include_once 'header.php'
?>

<section class="signup-form">
	<h2> Sign up </h2>
	<div class="signup-form-form">
		<form action="includes/signup.inc.php" method="post">
			<input type="text" name="name" placeholder="full name...">
			<input type="text" name="email" placeholder="email...">
			<input type="text" name="uid" placeholder="username...">
			<input type="password" name="pwd" placeholder="password...">
			<input type="password" name="pwdrepeat" placeholder="repeat password...">

			<button type="submit" name="submit">Sign up</button>
		</form>
	</div>

	<?php

    // error handling
    if(isset($_GET['error'])) {
		if($_GET['error'] == "emptyinput")
			echo "<p>fill in all fields</p>";

		if($_GET['error'] == "invaliduid") 
			echo "<p>invalid username</p>";

		if($_GET['error'] == "invalidemail")
			echo "<p>invalid email</p>";

		if($_GET['error'] == "passwordsdontmatch")
			echo "<p>passwords dont match</p>";

		if($_GET['error'] == "stmtfailed")
			echo "<p>error, something went wrong. Please try again. </p>";

		if($_GET['error'] == "usernametaken")
			echo "<p>username already in use, please choose another</p>";

		if($_GET['error'] == "none")
			header("location: ./login.php");

	}
	?>
</section>

<?php
include_once 'footer.php';
?>