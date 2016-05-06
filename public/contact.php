<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Contact us</title>
    <link rel="stylesheet" href="css/bootstrap.css" media="screen"  charset="utf-8">
    <link rel="stylesheet" href="css/style.css" media="screen"  charset="utf-8">
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
    <a class="navbar-brand" href="#">Fitness Centre</a>
  </div>

  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
      <li><a href="membership.php">Membership</a></li>
      <li><a href="classes.php">Classes</a></li>
      <li><a href="testimonials.php">Testimonials</a></li>
      <li><a href="facilities.php">Facilities</a></li>
      <li><a href="gallery.php">Gallery</a></li>

      <li class="active"><a href="contact.php">Contact Us</a></li>
      <li><a href="login.php">Login</a></li>
    </ul>
  </div>
</nav>
<div class="container page">
  <div class="col-md-12 hero-image">
    <div class=" col-md-4 hero-image-text">
      <h1>Contact Us</h1>
      <h4>Find out how to contact us.</h4>
    </div>
  </div>
  <div class="container" id="test">
    <div class="test col-md-6">
      <h3>Email</h3>
      <img src="http://placehold.it/140x180">

        <p><i>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</i></p>

    </div>
    <div class="test col-md-6">
      <h3>Telephone</h3>
      <img src="http://placehold.it/140x180">
      <p>
        <i>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</i>
      </p>
    </div>
    <div class="test col-md-6">
      <h3>Address</h3>
      <img src="http://placehold.it/140x180">

        <p><i>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</i></p>

    </div>
    <div class="test col-md-6">
      <h3>Directions</h3>
      <img src="http://placehold.it/140x180">
      <p>
        <i>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</i>
      </p>
    </div>

    <?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

          $errors = array();

          if (empty($_POST['con_name'])) {
            $errors[] = 'You forgot to enter your name.';
          } else {
            $tn = trim($_POST['con_name']);
          }

          if (empty($_POST['con_num'])) {
            $errors[] = 'You forgot to enter your phone number.';
          } else {
            $tc = trim($_POST['con_num']);
          }

          if (empty($_POST['con_ema'])) {
            $errors[] = 'You forgot to enter your email';
          } else {
            $td = trim($_POST['con_ema']);
          }

          if (empty($_POST['con_com'])) {
            $errors[] = 'You forgot to enter your comment';
          } else {
            $ti = trim($_POST['con_com']);
          }

          if (empty($errors)) {

          require ('../admin/mysqli_connect.php');

          $tn = mysqli_real_escape_string($dbc, trim($tn));
          $tc = mysqli_real_escape_string($dbc, trim($tc));
          $td = mysqli_real_escape_string($dbc, trim($td));
          $ti = mysqli_real_escape_string($dbc, trim($ti));

          $sql = "INSERT INTO contact (name, telephone_no, email, comment_box)
          VALUES ('$tn', '$tc', '$td', '$ti')";

          $r = @mysqli_query($dbc, $sql);

          if ($r) {
              echo "<h3 class=\"added\"> Thank you. We will be in touch shortly. </h3>";
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
    <form role ="form" class="frm1" action="contact.php" method="post">
      <div class="form-group">
        <label >Name:</label><input name="con_name" class = "form-control" value="<?php if (isset($_POST['con_name'])) echo $_POST['con_name']; ?>">
        <label >Telephone No:</label><input name="con_num" class = "form-control" value="<?php if (isset($_POST['con_num'])) echo $_POST['con_num']; ?>">
        <label >Email:</label><input name="con_ema" class ="form-control" value="<?php if (isset($_POST['con_ema'])) echo $_POST['con_ema']; ?>">
        <label >Comment:</label><textarea name="con_com" class ="form-control" value="<?php if (isset($_POST['con_com'])) echo $_POST['con_com']; ?>"></textarea>
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>

    </div>
    <footer>
      <div class="container">
        <div class="col-md-4">
          <h4>Footer 1</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>
        </div>
        <div class="col-md-4">
          <h4>Footer 1</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
          </p>
        </div>
        <div class="col-md-4">
          <h4>Footer 1</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
          </p>
        </div>
      </div>
    </footer>
  </div>

</div>

    <script type="text/javascript" src="javascript/bootstrap.js"></script>
  </body>
</html>
