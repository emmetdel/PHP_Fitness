
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add New Page</title>
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
    <a class="navbar-brand" href="#">Add New Page</a>
  </div>

  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">

      <li class="active"><a href="/PHP_Fitness/admin/admin-pages-edit.php">Return Home</a></li>
    </ul>
  </div>
</nav>
<div class="container page">
  <?php

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $errors = array();

        if (empty($_POST['page_name'])) {
          $errors[] = 'You forgot to enter your page name.';
        } else {
          $pn = trim($_POST['page_name']);
        }

        if (empty($_POST['page_details'])) {
          $errors[] = 'You forgot to enter the page details.';
        } else {
          $pd = trim($_POST['page_details']);
        }

        if (empty($_POST['page_images'])) {
          $errors[] = 'You forgot to enter page images.';
        } else {
          $pi = trim($_POST['page_images']);
        }

        if (empty($errors)) {

        require ('mysqli_connect.php');

        $pn = mysqli_real_escape_string($dbc, trim($pn));
        $pd = mysqli_real_escape_string($dbc, trim($pd));
        $pi = mysqli_real_escape_string($dbc, trim($pi));

        $sql = "INSERT INTO pages (page_name, page_details, page_images)
        VALUES ('$pn', '$pd', '$pi')";

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
  <form role ="form" class="frm1" action="pages-addnew.php" method="post">
    <div class="form-group">
      <label >Page Name:</label><input name="page_name" class = "form-control" value="<?php if (isset($_POST['page_name'])) echo $_POST['page_name']; ?>">
      <label >Page Details:</label><input name="page_details" class = "form-control" value="<?php if (isset($_POST['page_details'])) echo $_POST['page_details']; ?>">
      <label >Page Images:</label><input name="page_images" class ="form-control" value="<?php if (isset($_POST['page_images'])) echo $_POST['page_images']; ?>">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
  </div>

</div>
    <script type="text/javascript" src="javascript/bootstrap.js"></script>
  </body>
</html>
