<?php
  include("../../connect.php");
  session_start();
 
  if (isset($_POST['query'])) {
      $query = "select * from tbl_tips where fld_title LIKE '{$_POST['query']}%' LIMIT 100";
      $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "<br>";
        while ($row = mysqli_fetch_array($result)) {
        echo "<div class='tips_result' tips_id='$row[id]'>". $row['fld_title']."</div>";
      }
      echo "<br>";
    } else {
      echo "<br>
      <div class='text-center'>
          Not found.
      </div><br>
      ";
    }
  }
?>