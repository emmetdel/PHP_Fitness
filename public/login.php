<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Testimonials Page</title>
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
      <li><a href="#">Home</a></li>
      <li><a href="#">Membership</a></li>
      <li><a href="#..">Classes</a></li>
      <li><a href="/PHP_Fitness/public/testimonials.php">Testimonials</a></li>
      <li><a href="#">Facilities</a></li>
      <li><a href="#">Contact Us</a></li>
      <li  class="active"><a href="/group_website/admin/admin-feature-box.php">Login</a></li>
    </ul>
  </div>
</nav>
<div class="container page">

  <?php
    $cookieName = "myCookie";
    $username = "admin";
    $password = "admin";
    $hoursCookieExists = 36;
    $dashboardURL = "http://localhost/PHP_Fitness/admin/admin-bookings.php";

    if( isset($_POST['pw']) and $_POST['pw'] == $password and isset($_POST['un']) and $_POST['un'] == $username )
    {
    	$cval = $hoursCookieExists > 0 ? (time() + ($hoursCookieExists * 60 * 60)) : '';
    	setcookie($cookieName,'good',$cval);
    	header("Location: $dashboardURL");
    	exit;
    }else {
      echo "<div class=\"error1\">";
      echo "<h3>Please try again</h3>";
      echo "</div>";

    }
  ?>

<form role="form" method="POST" action="<?php echo($_SERVER['PHP_SELF']) ?>">
  <div class="form-group login-form">
    <h4>Username: </h4><input type="text" name="un" value="" class = "form-control">
    <h4>Password: </h4><input type="password" name="pw" value="" class = "form-control">
    <input type="submit" name="login" value="Login" class="btn btn-default butt">
  </div>
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
