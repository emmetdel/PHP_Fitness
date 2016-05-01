
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Edit Classes</title>
    <link rel="stylesheet" href="/group_website/public/css/bootstrap.css" media="screen"  charset="utf-8">
    <link rel="stylesheet" href="/group_website/public/css/style.css" media="screen"  charset="utf-8">
    <link rel="stylesheet" href="/group_website/public/css/admin-style.css" media="screen"  charset="utf-8">
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
    <a class="navbar-brand" href="#">Edit Classes</a>
  </div>

  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li class="active"><a href="/group_website/admin/admin-classes.php">Return Home</a></li>
    </ul>
  </div>
</nav>
<div class="container page">

<!-- <form role ="form" class="frm1" action="index.html" method="post">
  <div class="form-group">
    <label for="class-name">Class Name:</label><input class = "form-control" id="class-name">
    <label for="class-time">Class Time:</label><input class = "form-control" id="class-time">
    <label for="date">Date:</label><input class ="form-control" id="date">
    <label for="instructor">Instructor:</label><input class ="form-control" id="instructor">
    <label for="fee">Fee:</label><input class ="form-control" id="fee">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form> -->

<?php

$page_title = 'Edit a User';
echo '<h1>Edit a User</h1>';

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
	if (empty($_POST['name'])) {
		$errors[] = 'You forgot to enter your name.';
	} else {
		$fn = mysqli_real_escape_string($dbc, trim($_POST['name']));
	}

	// Check for a time:
	if (empty($_POST['time'])) {
		$errors[] = 'You forgot to enter your class time.';
	} else {
		$ti = mysqli_real_escape_string($dbc, trim($_POST['time']));
	}

	// Check for an date:
	if (empty($_POST['date'])) {
		$errors[] = 'You forgot to enter your date.';
	} else {
		$da = mysqli_real_escape_string($dbc, trim($_POST['date']));
	}

  // Check for an instructor:
  if (empty($_POST['instructor'])) {
    $errors[] = 'You forgot to enter instructor.';
  } else {
    $in = mysqli_real_escape_string($dbc, trim($_POST['instructor']));
  }

  // Check for an instructor:
  if (empty($_POST['fee'])) {
    $errors[] = 'You forgot to enter a fee.';
  } else {
    $fee = mysqli_real_escape_string($dbc, trim($_POST['fee']));
  }

	if (empty($errors)) { // If everything's OK.

		//  Test for unique email address:
		$q = "SELECT user_id FROM users WHERE name='$fn' AND user_id != $id";
		$r = @mysqli_query($dbc, $q);
		if (mysqli_num_rows($r) == 0) {

			// Make the query:
			$q = "UPDATE users SET name='$fn', time='$ti', email='$e' WHERE user_id=$id LIMIT 1";
			$r = @mysqli_query ($dbc, $q);
			if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.

				// Print a message:
				echo '<p>The class has been edited.</p>';

			} else { // If it did not run OK.
				echo '<p class="error">The class could not be edited due to a system error. We apologize for any inconvenience.</p>'; // Public message.
				echo '<p>' . mysqli_error($dbc) . '<br />Query: ' . $q . '</p>'; // Debugging message.
			}

		} else { // Already registered.
			echo '<p class="error">The class has already been registered.</p>';
		}

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
$q = "SELECT first_name, last_name, email FROM users WHERE user_id=$id";
$r = @mysqli_query ($dbc, $q);

if (mysqli_num_rows($r) == 1) { // Valid user ID, show the form.

	// Get the user's information:
	$row = mysqli_fetch_array ($r);

	// Create the form:
	echo '<form action="classes-edit.php" method="post">
<p>First Name: <input type="text" name="first_name" size="15" maxlength="15" value="' . $row[0] . '" /></p>
<p>Last Name: <input type="text" name="last_name" size="15" maxlength="30" value="' . $row[1] . '" /></p>
<p>Email Address: <input type="text" name="email" size="20" maxlength="60" value="' . $row[2] . '"  /> </p>
<p><input type="submit" name="submit" value="Submit" /></p>
<input type="hidden" name="id" value="' . $id . '" />
</form>';

} else { // Not a valid user ID.
	echo '<p class="error">This page has been accessed in error.</p>';
}

mysqli_close($dbc);

?>

</div>
    <script type="text/javascript" src="javascript/bootstrap.js"></script>
  </body>
</html>
