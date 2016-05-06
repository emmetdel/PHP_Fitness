
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add New Testimonial</title>
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
    <a class="navbar-brand" href="#">Add New Testimonial</a>
  </div>

  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li class="active"><a href="/PHP_Fitness/admin/admin-testimonials.php">Return Home</a></li>
    </ul>
  </div>
</nav>
<div class="container page">

  <?php

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $errors = array();

        if (empty($_POST['test_name'])) {
          $errors[] = 'You forgot to enter your testimonial name.';
        } else {
          $tn = trim($_POST['test_name']);
        }

        if (empty($_POST['test_comment'])) {
          $errors[] = 'You forgot to enter the testimonial comment.';
        } else {
          $tc = trim($_POST['test_comment']);
        }

        if (empty($_POST['test_date'])) {
          $errors[] = 'You forgot to enter test date';
        } else {
          $td = trim($_POST['test_date']);
        }

        if (empty($errors)) {

        require ('mysqli_connect.php');

        $tn = mysqli_real_escape_string($dbc, trim($tn));
        $tc = mysqli_real_escape_string($dbc, trim($tc));
        $td = mysqli_real_escape_string($dbc, trim($td));

        $sql = "INSERT INTO testimonials (test_name, test_comment, test_date)
        VALUES ('$tn', '$tc', '$td')";

        $r = @mysqli_query($dbc, $sql);

        if ($r) {
            echo "<h3 class=\"added\"> Testimonials added successfully<h3>";
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
  <form role ="form" class="frm1" action="testimonials-addnew.php" method="post">
    <div class="form-group">
      <label >Author Name:</label><input name="test_name" class = "form-control" value="<?php if (isset($_POST['test_name'])) echo $_POST['test_name']; ?>">
      <label >Comment:</label><input name="test_comment" class = "form-control" value="<?php if (isset($_POST['test_comment'])) echo $_POST['test_comment']; ?>">
      <label >Date:</label><input name="test_date" class ="form-control" value="<?php if (isset($_POST['test_date'])) echo $_POST['test_date']; ?>">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
  </div>

</div>
    <script type="text/javascript" src="javascript/bootstrap.js"></script>
  </body>
</html>
