
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add New Class</title>
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
    <a class="navbar-brand" href="#">Add New Class</a>
  </div>

  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">

      <li class="active"><a href="/PHP_fitness/admin/admin-classes.php">Return Home</a></li>
    </ul>
  </div>
</nav>

<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $errors = array();

      if (empty($_POST['class_name'])) {
        $errors[] = 'You forgot to enter class name.';
      } else {
        $name = trim($_POST['class_name']);
      }

      if (empty($_POST['class_date'])) {
        $errors[] = 'You forgot to enter the class date.';
      } else {
        $date = trim($_POST['class_date']);
      }

      if (empty($_POST['class_time'])) {
        $errors[] = 'You forgot to enter class time.';
      } else {
        $time = trim($_POST['class_time']);
      }

      if (empty($_POST['class_instructor'])) {
        $errors[] = 'You forgot to enter the class instructor.';
      } else {
        $ci = trim($_POST['class_instructor']);
      }

      if (empty($_POST['class_fee'])) {
        $errors[] = 'You forgot to enter the class fee.';
      } else {
        $cf = trim($_POST['class_fee']);
      }

      if (empty($_POST['class_image'])) {
        $errors[] = 'You forgot to enter the class image.';
      } else {
        $cim = trim($_POST['class_image']);
      }

      if (empty($errors)) {

      require ('mysqli_connect.php');

      $name = mysqli_real_escape_string($dbc, trim($name));
      $date = mysqli_real_escape_string($dbc, trim($date));
      $time = mysqli_real_escape_string($dbc, trim($time));
      $ci = mysqli_real_escape_string($dbc, trim($ci));
      $cf = mysqli_real_escape_string($dbc, trim($cf));
      $cim = mysqli_real_escape_string($dbc, trim($cim));

      $sql = "INSERT INTO classes (class_name, class_time, class_date, class_instructor, class_price, class_image)
      VALUES ('$name', '$time', '$date', '$ci', '$cf', '$cim')";

      $r = @mysqli_query($dbc, $sql);

      if ($r) {
          echo "<h3 class=\"added\"> Class added successfully<h3>";
      } else {
          echo "Error: " . $sql;
      }

      mysqli_close($dbc);

    }else { // Report the errors.

      echo "<div class=\"container\">";

  		echo '<h1>Error!</h1>
  		<p class="error">The following error(s) occurred:<br />';
  		foreach ($errors as $msg) { // Print each error.
  			echo " - $msg<br />\n";
  		}
  		echo '</p><p>Please try again.</p><p><br /></p>';

      echo "</div>";
    }
  }
?>

<div class="container page">
<form role ="form" class="frm1" action="classes-addnew.php" method="post">
  <div class="form-group">
    <label >Class Name:</label><input name="class_name" class = "form-control" value="<?php if (isset($_POST['class_name'])) echo $_POST['class_name']; ?>">
    <label >Class Time:</label><input name="class_time" class ="form-control" value="<?php if (isset($_POST['class_time'])) echo $_POST['class_time']; ?>">
    <label >Class Date:</label><input name="class_date" class = "form-control" value="<?php if (isset($_POST['class_date'])) echo $_POST['class_date']; ?>">
    <label >Class Instructor:</label><input name="class_instructor" class ="form-control" value="<?php if (isset($_POST['class_instructor'])) echo $_POST['class_instructor']; ?>">
    <label >Class Fee:</label><input name="class_fee" class ="form-control" value="<?php if (isset($_POST['class_fee'])) echo $_POST['class_fee']; ?>">
    <label >Class Image:</label><input name="class_image" class ="form-control" value="<?php if (isset($_POST['class_image'])) echo $_POST['class_image']; ?>">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>

    <script type="text/javascript" src="javascript/bootstrap.js"></script>
  </body>
</html>
