<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Delete Testimonial</title>
    <link rel="stylesheet" href="/PHP_fitness/public/css/bootstrap.css" media="screen"  charset="utf-8">
    <link rel="stylesheet" href="/PHP_fitness/public/css/style.css" media="screen"  charset="utf-8">
    <link rel="stylesheet" href="/PHP_fitness/public/css/admin-style.css" media="screen"  charset="utf-8">
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
    <a class="navbar-brand" href="#">Delete Testimonial</a>
  </div>

  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li class="active"><a href="/PHP_fitness/admin/admin-testimonials.php">Return Home</a></li>
    </ul>
  </div>
</nav>
<div class="container page">

  <?php # Script 10.2 - delete_user.php
  // This page is for deleting a user record.
  // This page is accessed through view_users.php.

  $page_title = 'Delete a Testimonial';
  echo '<h1>Delete a Testimonial</h1>';

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

  	if ($_POST['sure'] == 'Yes') { // Delete the record.

  		// Make the query:
  		$q = "DELETE FROM testimonials WHERE test_id=$id LIMIT 1";
  		$r = @mysqli_query ($dbc, $q);
  		if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.

  			// Print a message:
  			echo '<p>The testimonial has been deleted.</p>';

  		} else { // If the query did not run OK.
  			echo '<p class="error">The testimonial could not be deleted due to a system error.</p>'; // Public message.
  			echo '<p>' . mysqli_error($dbc) . '<br />Query: ' . $q . '</p>'; // Debugging message.
  		}

  	} else { // No confirmation of deletion.
  		echo '<p>The testimonial has NOT been deleted.</p>';
  	}

  } else { // Show the form.

  	// Retrieve the user's information:
  	$q = "SELECT test_name FROM testimonials WHERE test_id=$id";
  	$r = @mysqli_query ($dbc, $q);

  	if (mysqli_num_rows($r) == 1) { // Valid user ID, show the form.

  		// Get the user's information:
  		$row = mysqli_fetch_array ($r);

  		// Display the record being deleted:
  		echo "<h3>Testimonial Name: $row[test_name]</h3> Are you sure you want to delete this testimonial?";

  		// Create the form:
  		echo '<form action="delete-testimonial.php" method="post">
  	<input type="radio" name="sure" value="Yes" /> Yes
  	<input type="radio" name="sure" value="No" checked="checked" /> No
  	<input type="submit" name="submit" value="Submit" />
  	<input type="hidden" name="id" value="' . $id . '" />
  	</form>';

  	} else { // Not a valid user ID.
  		echo '<p class="error">This page has been accessed in error.</p>';
  	}

  } // End of the main submission conditional.

  mysqli_close($dbc);


  ?>

</div>
    <script type="text/javascript" src="javascript/bootstrap.js"></script>
  </body>
</html>
