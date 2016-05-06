<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Home</title>
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
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="membership.php">Membership</a></li>
      <li><a href="classes.php">Classes</a></li>
     <li><a href="testimonials.php">Testimonials</a></li>
      <li><a href="facilities.php">Facilities</a></li>
      <li><a href="contact.php">Contact Us</a></li>
      <li><a href="login.php">Login</a></li>
    </ul>
  </div>
</nav>
<div class="container page">
  <div class="col-md-12 hero-image">
    <div class=" col-md-4 hero-image-text">
      <h1>Club Fitness</h1>
      <h4>Celebrating health</h4>
    </div>
  </div>
  <div class="container" id="test1">
    <?php
      include('../functions/functions.php');
      getFeature();
    ?>
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
