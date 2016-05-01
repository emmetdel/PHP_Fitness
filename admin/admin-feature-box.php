<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Feature Boxes</title>
    <link rel="stylesheet" href="../public/css/bootstrap.css" media="screen"  charset="utf-8">
    <link rel="stylesheet" href="../public/css/style.css" media="screen"  charset="utf-8">
    <link rel="stylesheet" href="../public/css/admin-style.css" media="screen"  charset="utf-8">
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
      <li class="active"><a href="#">Feature Boxes</a></li>
      <li><a href="admin-membership.php">Membership</a></li>
      <li><a href="admin-classes.php">Classes</a></li>
      <li><a href="admin-testimonials.php">Testimonials</a></li>
      <li><a href="admin-image-upload.php">Images Page</a></li>
      <li><a href="admin-bookings.php">Bookings</a></li>
      <li><a href="admin-pages-edit.php">Pages Edit</a></li>
      <li><a href="../public/testimonials.php">Logout</a></li>
    </ul>
  </div>
</nav>
<div class="container page">
    <?php

            $page_title = 'View the Feature Boxes';
            echo '<h1>Feature Boxes</h1>';

            require ('mysqli_connect.php');

            // Define the query:
            $q = "SELECT offer_id, offer_title, offer_desc, offer_image FROM feature_box";
            $r = @mysqli_query ($dbc, $q);

            // Count the number of returned rows:
            $num = mysqli_num_rows($r);

            if ($num > 0) { // If it ran OK, display the records.

              // Print how many users there are:
              echo "<p>There are currently $num feature boxes.</p>\n";

              // Table header:
              echo '<table class="table table-striped test-table" align="center" cellspacing="3" cellpadding="3" width="75%">
              <tr>
                <td align="left"><b>Title</b></td>
                <td align="left"><b>Image</b></td>
                <td align="left"><b>Description</b></td>
              </tr>
            ';

              // Fetch and print all the records:
              while ($row = mysqli_fetch_array($r)) {
                echo '<tr>
                  <td align="left">' . $row['offer_title'] . '</td>
                  <td align="left">' . $row['offer_image'] . '</td>
                  <td align="left">' . $row['offer_desc'] . '</td>
                  <td align="left"><a href="edit_pages/featurebox-edit.php?id=' . $row['offer_id'] . '">Edit</a></td>
                  <td align="left"><a href="delete/delete-confirmation.php?id=' . $row['offer_id'] . '">Delete</a></td>
                  <td align="left"><a href="add-new/featurebox-addnew.php">Add</a></td>
                </tr>
                ';
              }

              echo '</table>';
              mysqli_free_result ($r);

            } else { // If no records were returned.
              echo '<p class="error">There are currently no feature boxes.</p>';
            }

            mysqli_close($dbc);

          ?>
</div>
    <script type="text/javascript" src="javascript/bootstrap.js"></script>
  </body>
</html>
