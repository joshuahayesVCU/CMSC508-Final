<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
	<nav>
		<div class = "topnav">

				<a href="index.php">Home</a></li>
				
				<?php
                    // if user is signed in
					if (isset($_SESSION["userUid"])) {
						echo "<a href=includes/logout.inc.php>Log out</a>";
                        echo "<a href=profile.php>Profile</a>";
                        echo "<a href=fitness.php>Fitness</a>";
                        echo "<a href=gear.php>Gear</a>";
                        echo "<a href=climbs.php>Climbs</a>";
                        echo "<a href=store.php>Stores</a>";

                        if ($_SESSION["userid"] === 1) {
                            echo "<a href=climbers.php>Climbers</a>";
                        }
                    }
                    // no user signed in
					else {
						echo "<a href=signup.php>Sign Up</a>";
						echo "<a href=login.php>Log in</a>";

                    }
				?>

		</div>
	</nav>
</body>

