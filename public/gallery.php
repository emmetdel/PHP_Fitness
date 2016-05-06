


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
      <li><a href="index.php">Home</a></li>
      <li><a href="membership.php">Membership</a></li>
      <li><a href="classes.php">Classes</a></li>
     <li><a href="testimonials.php">Testimonials</a></li>
      <li><a href="facilities.php">Facilities</a></li>
      <li class="active"><a href="gallery.php">Gallery</a></li>

      <li><a href="contact.php">Contact Us</a></li>
      <li><a href="login.php">Login</a></li>
    </ul>
  </div>
</nav>

  </div>
  <div class="container" id="test1">
  <style type="text/css">

  body
  {
   background:#fff;
  }
  img
  {
   width:auto;
   box-shadow:0px 0px 20px #cecece;
   -moz-transform: scale(0.7);
   -moz-transition-duration: 0.6s;
   -webkit-transition-duration: 0.6s;
   -webkit-transform: scale(0.7);

   -ms-transform: scale(0.7);
   -ms-transition-duration: 0.6s;
  }
  img:hover
  {
    box-shadow: 20px 20px 20px #dcdcdc;
   -moz-transform: scale(0.8);
   -moz-transition-duration: 0.6s;
   -webkit-transition-duration: 0.6s;
   -webkit-transform: scale(0.8);

   -ms-transform: scale(0.8);
   -ms-transition-duration: 0.6s;

  }
  </style>

  <body>

  <?php
  $folder_path = '../admin/uploads/'; //image's folder path

  $num_files = glob($folder_path . "*.{JPG,jpg,gif,png,bmp}", GLOB_BRACE);

  $folder = opendir($folder_path);

  if($num_files > 0)
  {
   while(false !== ($file = readdir($folder)))
   {
    $file_path = $folder_path.$file;
    $extension = strtolower(pathinfo($file ,PATHINFO_EXTENSION));
    if($extension=='jpg' || $extension =='png' || $extension == 'gif' || $extension == 'bmp')
    {
     ?>
              <?php echo "<div class='col-md-4'>" ?>
              <a href="<?echo $file_path; ?>"><img src="<?php echo $file_path; ?>"  height="250" /></a>
              <?php echo "</div>" ?>
              <?php
    }
   }
  }
  else
  {
   echo "the folder was empty !";
  }
  closedir($folder);
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
