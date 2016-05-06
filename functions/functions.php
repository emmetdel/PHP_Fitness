<?php



  function getTestimonials(){

    require ('../admin/mysqli_connect.php');

    $q = "SELECT * FROM testimonials";
    $r = @mysqli_query($dbc, $q);

    while ($row = mysqli_fetch_array($r)) {
      echo "<div class='test col-md-6'>";
      echo "<h3>". $row['test_name']."</h3>";
      echo "<p><i>\"". $row['test_comment']."\"</i></p>";
      echo "<p><i>\"". $row['test_date']."\"</i></p>";
      echo "<img height='180' width='140' src=\"".$row['test_image']."\">";
      echo "</div>";

    }
    mysqli_free_result ($r);
  }

  function getClasses(){

    require ('../admin/mysqli_connect.php');

    $q = "SELECT * FROM classes";
    $r = @mysqli_query($dbc, $q);

    while ($row = mysqli_fetch_array($r)) {
      echo "<div class='test col-md-6'>";
      echo "<h3>". $row['class_name']."</h3>";
      echo "<p><b>Class Time</b>: ". $row['class_time']."</p>";
      echo "<p><b>Class Date</b>: ". $row['class_date']."</p>";
      echo "<p><b>Class Price</b>: ". $row['class_price']."</p>";
      echo "<p><b>Class Instructor</b>: ". $row['class_instructor']."</p>";
      echo '<p><a href="bookings.php">Book Now</a></p>';
      echo "<img height='180' width='140' src=\"".$row['class_image']."\">";
      echo "</div>";

    }
    mysqli_free_result ($r);
  }

  function getMemberships(){

    require ('../admin/mysqli_connect.php');

    $q = "SELECT * FROM membership";
    $r = @mysqli_query($dbc, $q);

    while ($row = mysqli_fetch_array($r)) {
      echo "<div class='test col-md-6'>";
      echo "<h3>". $row['membership_type']."</h3>";
      echo "<p><b>Duration</b>: ". $row['membership_duration']."</p>";
      echo "<p><b>Price</b>: ". $row['membership_price']."</p>";
      echo "<p><b>Comment</b>: ". $row['membership_comment']."</p>";
      echo "<img height='180' width='140' src=\"".$row['mem_image']."\">";
      echo "</div>";

    }
    mysqli_free_result ($r);
  }

  function getFeature(){

    require ('../admin/mysqli_connect.php');

    $q = "SELECT * FROM feature_box";
    $r = @mysqli_query($dbc, $q);

    while ($row = mysqli_fetch_array($r)) {
      echo "<div class='test col-md-6'>";
      echo "<h3>". $row['offer_title']."</h3>";
      echo "<p><b>Description</b>: ". $row['offer_desc']."</p>";
      echo "<img height='180' width='140' src=\"".$row['offer_image']."\">";
      echo "</div>";

    }
    mysqli_free_result ($r);
  }


 ?>
