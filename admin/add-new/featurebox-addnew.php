
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add New Feature Box</title>
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
    <a class="navbar-brand" href="#">Add New Feature Box</a>
  </div>

  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">

      <li class="active"><a href="/PHP_fitness/admin/admin-feature-box.php">Return Home</a></li>
    </ul>
  </div>
</nav>

<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $errors = array();

      if (empty($_POST['offer_title'])) {
        $errors[] = 'You forgot to enter offer title.';
      } else {
        $title = trim($_POST['offer_title']);
      }

      if (empty($_POST['offer_desc'])) {
        $errors[] = 'You forgot to enter the offer description.';
      } else {
        $desc = trim($_POST['offer_desc']);
      }

      if (empty($_POST['offer_image'])) {
        $errors[] = 'You forgot to enter offer image.';
      } else {
        $image = trim($_POST['offer_image']);
      }

      if (empty($errors)) {

      require ('mysqli_connect.php');

      $title = mysqli_real_escape_string($dbc, trim($title));
      $desc = mysqli_real_escape_string($dbc, trim($desc));
      $image = mysqli_real_escape_string($dbc, trim($image));


      $sql = "INSERT INTO feature_box (offer_title, offer_desc, offer_image)
      VALUES ('$title', '$desc', '$image')";

      $r = @mysqli_query($dbc, $sql);

      if ($r) {
          echo "<h3 class=\"added\"> Feature Box added successfully<h3>";
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
<form role ="form" class="frm1" action="featurebox-addnew.php" method="post">
  <div class="form-group">
    <label >Offer Title:</label><input name="offer_title" class = "form-control" value="<?php if (isset($_POST['offer_title'])) echo $_POST['offer_title']; ?>">
    <label >Offer Description:</label><input name="offer_desc" class ="form-control" value="<?php if (isset($_POST['offer_desc'])) echo $_POST['offer_desc']; ?>">
    <label >Offer Image:</label><input name="offer_image" class = "form-control" value="<?php if (isset($_POST['offer_image'])) echo $_POST['offer_image']; ?>">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>

    <script type="text/javascript" src="javascript/bootstrap.js"></script>
  </body>
</html>
