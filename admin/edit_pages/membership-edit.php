
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Edit Memberships</title>
    <link rel="stylesheet" href="/PHP_Fitness/public/css/bootstrap.css" media="screen"  charset="utf-8">
    <link rel="stylesheet" href="/PHP_Fitness/public/css/style.css" media="screen"  charset="utf-8">
    <link rel="stylesheet" href="/PHP_Fitness/public/css/admin-style.css" media="screen"  charset="utf-8">
  </head>
  <body>
    <nav class="navbar navbar-default">
<div class="container-fluid">

  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">Edit Memberships</a>
  </div>

  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">

      <li class="active"><a href="/PHP_Fitness/admin/admin-membership.php">Return Home</a></li>
    </ul>
  </div>
</nav>
<div class="container page">

<!-- <form role ="form" class="frm1" action="index.html" method="post">
  <div class="form-group">
    <label for="mem-type">Membership Type:</label><input class = "form-control" id="mem-type">
    <label for="price">Price:</label><input class = "form-control" id="price">
    <label for="duration">Duration:</label><input class ="form-control" id="duration">
    <label for="comment">Comment:</label><input class ="form-control" id="comment">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form> -->

<?php

$page_title = 'Edit a Membership';
echo '<h1>Edit a Membership</h1>';

// Check for a valid user ID, through GET or POST:
if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { // From view_users.php
	$id = $_GET['id'];
} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { // Form submission.
	$id = $_POST['id'];
} else { // No valid ID, kill the script.
	echo '<p class="error">This page has been accessed in error.</p>';
	exit();
}

  require ('mysqli_connect.php');

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$errors = array();

	// Check for a name:
	if (empty($_POST['membership_type'])) {
		$errors[] = 'You forgot to enter a membership type.';
	} else {
		$mt = mysqli_real_escape_string($dbc, trim($_POST['membership_type']));
	}

	// Check for a time:
	if (empty($_POST['membership_price'])) {
		$errors[] = 'You forgot to enter a membership price.';
	} else {
		$mp = mysqli_real_escape_string($dbc, trim($_POST['membership_price']));
	}

	// Check for an date:
	if (empty($_POST['membership_duration'])) {
		$errors[] = 'You forgot to enter a membership duration.';
	} else {
		$md = mysqli_real_escape_string($dbc, trim($_POST['membership_duration']));
	}

	if (empty($_POST['membership_comment'])) {
		$errors[] = 'You forgot to enter a membership comment.';
	} else {
		$mc = mysqli_real_escape_string($dbc, trim($_POST['membership_comment']));
	}

	if (empty($_POST['mem_image'])) {
		$errors[] = 'You forgot to enter a membership image.';
	} else {
		$mi = mysqli_real_escape_string($dbc, trim($_POST['mem_image']));
	}

	if (empty($errors)) { // If everything's OK.

			// Make the query:
			$q = "UPDATE membership SET membership_type='$mt', membership_price='$mp', membership_duration='$md', membership_comment='$mc', mem_image='$mi' WHERE mem_id=$id LIMIT 1";

			$r = @mysqli_query ($dbc, $q);
			if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.

				// Print a message:
				echo '<p>The membership has been edited.</p>';

			} else { // If it did not run OK.
				echo '<p class="error">The membership could not be edited due to a system error. We apologize for any inconvenience.</p>'; // Public message.
				echo '<p>' . mysqli_error($dbc) . '<br />Query: ' . $q . '</p>'; // Debugging message.
			}

		// } else { // Already registered.
		// 	echo '<p class="error">The class has already been registered.</p>';
		// }

	} else { // Report the errors.

		echo '<p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p>';

	} // End of if (empty($errors)) IF.

// End of submit conditional.
}
// Always show the form...

// Retrieve the user's information:
$q = "SELECT mem_id, membership_type, membership_price, membership_duration, membership_comment, mem_image FROM membership WHERE mem_id=$id";
$r = @mysqli_query ($dbc, $q);

if (mysqli_num_rows($r) == 1) { // Valid user ID, show the form.

	// Get the user's information:
	$row = mysqli_fetch_array ($r);

	// Create the form:
	echo '<form action="membership-edit.php" method="post">
<p>Membership Type: <input type="text" name="membership_type" size="15" maxlength="15" value="' . $row[1] . '" /></p>
<p>Membership Price: <input type="text" name="membership_price" size="15" maxlength="30" value="' . $row[2] . '" /></p>
<p>Membership Duration: <input type="text" name="membership_duration" size="20" maxlength="60" value="' . $row[3] . '"  /> </p>
<p>Membership Comment: <input type="text" name="membership_comment" size="20" maxlength="60" value="' . $row[4] . '"  /> </p>
<p>Membership Image: <input type="text" name="mem_image" size="20" maxlength="500" value="' . $row[5] . '"  /> </p>
<p><input type="submit" name="submit" value="Submit" /></p>
<input type="hidden" name="id" value="' . $id . '" />
</form>';

} else {
	echo '<p class="error">This page has been accessed in error.</p>';
}

mysqli_close($dbc);

?>
</div>
    <script type="text/javascript" src="javascript/bootstrap.js"></script>
  </body>
</html>
