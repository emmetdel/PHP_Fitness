
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Edit Testimonials</title>
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
    <a class="navbar-brand" href="#">Edit Testimonials</a>
  </div>

  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">

      <li class="active"><a href="/PHP_Fitness/admin/admin-testimonials.php">Return Home</a></li>
    </ul>
  </div>
</nav>
<div class="container page">

<!-- <form role ="form" class="frm1" action="index.html" method="post">
  <div class="form-group">
    <label for="author">Author:</label><input class = "form-control" id="author">
    <label for="date">Date:</label><input class = "form-control" id="date">
    <label for="comment">Comment:</label><input class ="form-control" id="comment">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form> -->
<?php

$page_title = 'Edit a Testimonial';
echo '<h1>Edit a Testimonial</h1>';

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
  if (empty($_POST['test_name'])) {
    $errors[] = 'You forgot to enter your testimonial author.';
  } else {
    $tn = mysqli_real_escape_string($dbc, trim($_POST['test_name']));
  }

  // Check for a time:
  if (empty($_POST['test_date'])) {
    $errors[] = 'You forgot to enter your testimonial date.';
  } else {
    $td = mysqli_real_escape_string($dbc, trim($_POST['test_date']));
  }

  // Check for an date:
  if (empty($_POST['test_comment'])) {
    $errors[] = 'You forgot to enter your testimonial comment.';
  } else {
    $tc = mysqli_real_escape_string($dbc, trim($_POST['test_comment']));
  }

  if (empty($errors)) { // If everything's OK.


      // Make the query:
      $q = "UPDATE testimonials SET test_name='$tn', test_date='$td', test_comment='$tc' WHERE test_id=$id LIMIT 1";
      $r = @mysqli_query ($dbc, $q);
      if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.

        // Print a message:
        echo '<p>The testimonial has been edited.</p>';

      } else { // If it did not run OK.
        echo '<p class="error">The page could not be edited due to a system error. We apologize for any inconvenience.</p>'; // Public message.
        echo '<p>' . mysqli_error($dbc) . '<br />Query: ' . $q . '</p>'; // Debugging message.
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
$q = "SELECT test_id, test_name, test_date, test_comment FROM testimonials WHERE test_id=$id";
$r = @mysqli_query ($dbc, $q);

if (mysqli_num_rows($r) == 1) { // Valid user ID, show the form.

  // Get the user's information:
  $row = mysqli_fetch_array ($r);

  // Create the form:
  echo '<form action="testimonials-edit.php" method="post">
<p>Testimonial Author: <input type="text" name="test_name" size="15" maxlength="15" value="' . $row[1] . '" /></p>
<p>Testimonial Date: <input type="text" name="test_date" size="20" maxlength="60" value="' . $row[2] . '"  /> </p>
<p>Testimonial Comment: <input type="text" name="test_comment" size="20" maxlength="60" value="' . $row[3] . '"  /> </p>
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
