<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Image Upload Page</title>
    <link rel="stylesheet" href="../public/css/bootstrap.css" media="screen"  charset="utf-8">
    <link rel="stylesheet" href="../public/css/style.css" media="screen"  charset="utf-8">
    <link rel="stylesheet" href="../public/css/admin-style.css" media="screen"  charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../public/css/dropzone.css" />
    <script type="text/javascript" src="/PHP_Fitness/public/js/dropzone.js"></script>
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
    <a class="navbar-brand" href="#">Admin Section</a>
  </div>

  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li><a href="admin-feature-box.php">Feature</a></li>
      <li><a href="admin-membership.php">Membership</a></li>
      <li><a href="admin-classes.php">Classes</a></li>
      <li><a href="admin-testimonials.php">Testimonials</a></li>
      <li class="active"><a href="admin-image-upload.php">Upload</a></li>
      <li><a href="admin-bookings.php">Bookings</a></li>
      <li><a href="admin-pages-edit.php">Pages Edit</a></li>
      <li><a href="admin-contact.php">Contact</a></li>

      <li><a href="../public/index.php">Logout</a></li>
    </ul>
  </div>
</nav>
<div class="container page">
  <h1>Drag + Drop Images Here</h1>
  <div class="image_upload_div">
  	<form action="upload.php" class="dropzone">
      </form>
  </div>
  </html>
  </body>
</html>
