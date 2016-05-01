
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add New Class</title>
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
    <a class="navbar-brand" href="#">Add New Booking</a>
  </div>

  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">

      <li class="active"><a href="/group_website/admin/admin-bookings.php">Return Home</a></li>
    </ul>
  </div>
</nav>

<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $errors = array();

      if (empty($_POST['name'])) {
        $errors[] = 'You forgot to enter your name.';
      } else {
        $name = trim($_POST['name']);
      }

      if (empty($_POST['date'])) {
        $errors[] = 'You forgot to enter the date.';
      } else {
        $date = trim($_POST['date']);
      }

      if (empty($_POST['time'])) {
        $errors[] = 'You forgot to enter class time.';
      } else {
        $time = trim($_POST['time']);
      }

      if (empty($_POST['phone'])) {
        $errors[] = 'You forgot to enter your phone number.';
      } else {
        $ph = trim($_POST['phone']);
      }

      if (empty($errors)) {

      require ('mysqli_connect.php');

      $name = mysqli_real_escape_string($dbc, trim($name));
      $date = mysqli_real_escape_string($dbc, trim($date));
      $time = mysqli_real_escape_string($dbc, trim($time));
      $ph = mysqli_real_escape_string($dbc, trim($ph));

      $sql = "INSERT INTO bookings (name, telephone, date_booked, class_time)
      VALUES ('$name', '$ph', '$date', '$time')";

      $r = @mysqli_query($dbc, $sql);

      if ($r) {
          echo "<h3 class=\"added\"> Booking added successfully<h3>";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
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
<form role ="form" class="frm1" action="bookings-addnew.php" method="post">
  <div class="form-group">
    <label >Name:</label><input name="name" class = "form-control" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>">
    <label >Date Booked:</label><input name="date" class = "form-control" value="<?php if (isset($_POST['date'])) echo $_POST['date']; ?>">
    <label >Class Time:</label><input name="time" class ="form-control" value="<?php if (isset($_POST['time'])) echo $_POST['time']; ?>">
    <label >Phone Number:</label><input name="phone" class ="form-control" value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>

    <script type="text/javascript" src="javascript/bootstrap.js"></script>
  </body>
</html>
