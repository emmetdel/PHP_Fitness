<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pages Edit</title>
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
      <li><a href="admin-feature-box.php">Feature Boxes</a></li>
      <li><a href="admin-membership.php">Membership</a></li>
      <li><a href="admin-classes.php">Classes</a></li>
      <li><a href="admin-testimonials.php">Testimonials</a></li>
      <li><a href="admin-image-upload.php">Images Page</a></li>
      <li><a href="admin-bookings.php">Bookings</a></li>
      <li class="active"><a href="#">Pages Edit</a></li>
      <li><a href="../public/testimonials.php">Logout</a></li>
    </ul>
  </div>
</nav>
<div class="container page">

          <?php
                  $page_title = 'View the Pages Edit';
                  echo '<h1>Pages Edit</h1>';

                  require ('mysqli_connect.php');

                  // Define the query:
                  $q = "SELECT page_id, page_name, page_details, page_images FROM pages";
                  $r = @mysqli_query ($dbc, $q);

                  // Count the number of returned rows:
                  $num = mysqli_num_rows($r);

                  if ($num > 0) { // If it ran OK, display the records.

                    // Print how many users there are:
                    echo "<p>There are currently $num pages.</p>\n";

                    // Table header:
                    echo '<table class="table table-striped test-table" align="center" cellspacing="3" cellpadding="3" width="75%">
                    <tr>
                      <td align="left"><b>Page Name</b></td>
                      <td align="left"><b>Page Details</b></td>
                      <td align="left"><b>Page Images</b></td>
                    </tr>
                  ';

                    // Fetch and print all the records:
                    while ($row = mysqli_fetch_array($r)) {
                      echo '<tr>
                        <td align="left">' . $row['page_name'] . '</td>
                        <td align="left">' . $row['page_details'] . '</td>
                        <td align="left">' . $row['page_images'] . '</td>
                        <td align="left"><a href="edit_pages/pages-edit.php?id=' . $row['page_id'] . '">Edit</a></td>
                        <td align="left"><a href="delete/delete-page.php?id=' . $row['page_id'] . '">Delete</a></td>
                      </tr>
                      ';
                    }
                    echo '<td align="left"><a href="add-new/pages-addnew.php">Add</a></td>';
                    echo '</table>';
                    mysqli_free_result ($r);

                  } else { // If no records were returned.
                    echo '<p class="error">There are currently no pages to edit.</p>';
                  }

                  mysqli_close($dbc);
        ?>
</div>
    <script type="text/javascript" src="javascript/bootstrap.js"></script>
  </body>
</html>
