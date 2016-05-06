
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add New Membership</title>
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
    <a class="navbar-brand" href="#">Add New Membership</a>
  </div>

  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">

      <li class="active"><a href="/PHP_Fitness/admin/admin-membership.php">Return Home</a></li>
    </ul>
  </div>
</nav>

<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $errors = array();

      if (empty($_POST['membership_type'])) {
        $errors[] = 'You forgot to enter membership type.';
      } else {
        $mt= trim($_POST['membership_type']);
      }

      if (empty($_POST['membership_price'])) {
        $errors[] = 'You forgot to enter the membership price.';
      } else {
        $mp = trim($_POST['membership_price']);
      }

      if (empty($_POST['membership_duration'])) {
        $errors[] = 'You forgot to enter membership duration.';
      } else {
        $md = trim($_POST['membership_duration']);
      }

      if (empty($_POST['membership_comment'])) {
        $errors[] = 'You forgot to enter membership comment.';
      } else {
        $mc = trim($_POST['membership_comment']);
      }

      if (empty($_POST['mem_image'])) {
        $errors[] = 'You forgot to enter membership image.';
      } else {
        $mi = trim($_POST['mem_image']);
      }

      if (empty($errors)) {

      require ('mysqli_connect.php');

      $mt = mysqli_real_escape_string($dbc, trim($mt));
      $mp = mysqli_real_escape_string($dbc, trim($mp));
      $md = mysqli_real_escape_string($dbc, trim($md));
      $mc = mysqli_real_escape_string($dbc, trim($mc));
      $mi = mysqli_real_escape_string($dbc, trim($mi));


      $sql = "INSERT INTO membership (membership_type, membership_price, membership_duration, membership_comment, mem_image)
      VALUES ('$mt', '$mp', '$md', '$mc', '$mi')";

      $r = @mysqli_query($dbc, $sql);

      if ($r) {
          echo "<h3 class=\"added\"> Membership added successfully<h3>";
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
  <form role ="form" class="frm1" action="membership-addnew.php" method="post">
    <div class="form-group">
      <label >Membership Type:</label><input name="membership_type" class = "form-control" value="<?php if (isset($_POST['membership_type'])) echo $_POST['membership_type']; ?>">
      <label >Membership Price:</label><input name="membership_price" class ="form-control" value="<?php if (isset($_POST['membership_price'])) echo $_POST['membership_price']; ?>">
      <label >Membership Duration:</label><input name="membership_duration" class = "form-control" value="<?php if (isset($_POST['membership_duration'])) echo $_POST['membership_duration']; ?>">
      <label >Membership Comment:</label><input name="membership_comment" class = "form-control" value="<?php if (isset($_POST['membership_comment'])) echo $_POST['membership_comment']; ?>">
      <label >Membership Image:</label><input name="mem_image" class = "form-control" value="<?php if (isset($_POST['mem_image'])) echo $_POST['mem_image']; ?>">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
  </div>

    <script type="text/javascript" src="javascript/bootstrap.js"></script>
  </body>
</html>
