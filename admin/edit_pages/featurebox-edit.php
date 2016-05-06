
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Edit Feature Boxes</title>
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
    <a class="navbar-brand" href="#">Edit Feature Boxes</a>
  </div>

  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li class="active"><a href="/PHP_Fitness/admin/admin-feature-box.php">Return Home</a></li>
    </ul>
  </div>
</nav>
<div class="container page">
<?php

$page_title = 'Edit a Feature Box';
echo '<h1>Edit a Feature Box</h1>';

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
	if (empty($_POST['offer_title'])) {
		$errors[] = 'You forgot to enter your offer title.';
	} else {
		$ot = mysqli_real_escape_string($dbc, trim($_POST['offer_title']));
	}

	// Check for a time:
	if (empty($_POST['offer_desc'])) {
		$errors[] = 'You forgot to enter your offer description.';
	} else {
		$od = mysqli_real_escape_string($dbc, trim($_POST['offer_desc']));
	}

	// Check for an date:
	if (empty($_POST['offer_image'])) {
		$errors[] = 'You forgot to enter your offer image.';
	} else {
		$oi = mysqli_real_escape_string($dbc, trim($_POST['offer_image']));
	}

	if (empty($errors)) { // If everything's OK.

		//  Test for unique email address:
		// $q = "SELECT user_id FROM users WHERE name='$fn' AND user_id != $id";
		// $r = @mysqli_query($dbc, $q);
		// if (mysqli_num_rows($r) == 0) {

			// Make the query:
			$q = "UPDATE feature_box SET offer_title='$ot', offer_desc='$od', offer_image='$oi' WHERE offer_id=$id LIMIT 1";
			$r = @mysqli_query ($dbc, $q);
			if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.

				// Print a message:
				echo '<p>The offer has been edited.</p>';

			} else { // If it did not run OK.
				echo '<p class="error">The class could not be edited due to a system error. We apologize for any inconvenience.</p>'; // Public message.
				echo '<p>' . mysqli_error($dbc) . '<br />Query: ' . $q . '</p>'; // Debugging message.
			}

		// } else { // Already registered.
			// echo '<p class="error">The class has already been registered.</p>';
		// }

	} else { // Report the errors.

		echo '<p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p>';

	} // End of if (empty($errors)) IF.

} // End of submit conditional.

// Always show the form...

// Retrieve the user's information:
$q = "SELECT offer_id, offer_title, offer_desc, offer_image FROM feature_box WHERE offer_id=$id";
$r = @mysqli_query ($dbc, $q);

if (mysqli_num_rows($r) == 1) { // Valid user ID, show the form.

	// Get the user's information:
	$row = mysqli_fetch_array ($r);

	// Create the form:
	echo '<form action="featurebox-edit.php" method="post">
<p>Offer Title: <input type="text" name="offer_title" size="15" maxlength="15" value="' . $row[1] . '" /></p>
<p>Offer Description: <input type="text" name="offer_desc" size="15" maxlength="30" value="' . $row[2] . '" /></p>
<p>Offer Image: <input type="text" name="offer_image" size="20" maxlength="500" value="' . $row[3] . '"  /> </p>
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
