<?php
  include("../../connect.php");
  session_start();
 
  if (isset($_POST['query'])) {
      $query = "select * from tbl_events where fld_title LIKE '{$_POST['query']}%' LIMIT 100";
      $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "<br>";
        while ($row = mysqli_fetch_array($result)) {
        echo "<div class='event_result' event_id='$row[id]' event_type='$row[fld_type]'>". $row['fld_title']."</div>";
      }
      echo "<br>";
    } else {
      echo "<br>
      <div class='text-center'>
        Couldn't find any results.
      </div><br>
      ";
    }
  }
?>