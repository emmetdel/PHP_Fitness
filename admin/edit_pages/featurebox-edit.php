
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Edit Feature Boxes</title>
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
    <a class="navbar-brand" href="#">Edit Feature Boxes</a>
  </div>

  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">

      <li class="active"><a href="/PHP_Fitness/admin/admin-feature-box.php">Return Home</a></li>
    </ul>
  </div>
</nav>
<div class="container page">

<form role ="form" class="frm1" action="index.html" method="post">
  <div class="form-group">
    <label for="title">Title:</label><input class = "form-control" id="title">
    <label for="image">Image:</label><input class = "form-control" id="image">
    <label for="desc">Description:</label><input class ="form-control" id="desc">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>

</div>
    <script type="text/javascript" src="javascript/bootstrap.js"></script>
  </body>
</html>
