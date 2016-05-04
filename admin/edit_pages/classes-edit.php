
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Edit Classes</title>
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
    <a class="navbar-brand" href="#">Edit Classes</a>
  </div>

  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li class="active"><a href="/PHP_Fitness/admin/admin-classes.php">Return Home</a></li>
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

$page_title = 'Edit a Class';
echo '<h1>Edit a Class</h1>';

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
	if (empty($_POST['class_name'])) {
		$errors[] = 'You forgot to enter your class name.';
	} else {
		$fn = mysqli_real_escape_string($dbc, trim($_POST['class_name']));
	}

	// Check for a time:
	if (empty($_POST['class_time'])) {
		$errors[] = 'You forgot to enter your class time.';
	} else {
		$ti = mysqli_real_escape_string($dbc, trim($_POST['class_time']));
	}

	// Check for an date:
	if (empty($_POST['class_date'])) {
		$errors[] = 'You forgot to enter your class date.';
	} else {
		$da = mysqli_real_escape_string($dbc, trim($_POST['class_date']));
	}

  // Check for an instructor:
  if (empty($_POST['class_instructor'])) {
    $errors[] = 'You forgot to enter instructor.';
  } else {
    $in = mysqli_real_escape_string($dbc, trim($_POST['class_instructor']));
  }

  // Check for an instructor:
  if (empty($_POST['class_price'])) {
    $errors[] = 'You forgot to enter a fee.';
  } else {
    $fee = mysqli_real_escape_string($dbc, trim($_POST['class_price']));
  }

	if (empty($errors)) { // If everything's OK.

		//  Test for unique email address:
		// $q = "SELECT user_id FROM users WHERE name='$fn' AND user_id != $id";
		// $r = @mysqli_query($dbc, $q);
		// if (mysqli_num_rows($r) == 0) {

			// Make the query:
			$q = "UPDATE classes SET class_name='$fn', class_time='$ti', class_date='$da', class_instructor = '$in', class_price='$fee'  WHERE class_id=$id LIMIT 1";
			$r = @mysqli_query ($dbc, $q);
			if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.

				// Print a message:
				echo '<p>The class has been edited.</p>';

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
$q = "SELECT class_id, class_name, class_time, class_date, class_price , class_instructor FROM classes WHERE class_id=$id";
$r = @mysqli_query ($dbc, $q);

if (mysqli_num_rows($r) == 1) { // Valid user ID, show the form.

	// Get the user's information:
	$row = mysqli_fetch_array ($r);

	// Create the form:
	echo '<form action="classes-edit.php" method="post">
<p>Class Name: <input type="text" name="class_name" size="15" maxlength="15" value="' . $row[1] . '" /></p>
<p>Class Time: <input type="text" name="class_time" size="15" maxlength="30" value="' . $row[2] . '" /></p>
<p>Class Date: <input type="text" name="class_date" size="20" maxlength="60" value="' . $row[3] . '"  /> </p>
<p>Class Price: <input type="text" name="class_price" size="20" maxlength="60" value="' . $row[4] . '"  /> </p>
<p>Class Instructor: <input type="text" name="class_instructor" size="20" maxlength="60" value="' . $row[5] . '"  /> </p>
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
