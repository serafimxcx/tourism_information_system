<?php
  include("../../connect.php");
  session_start();
 
  if (isset($_POST['query'])) {
      $query = "select * from tbl_news where fld_title LIKE '{$_POST['query']}%' LIMIT 100";
      $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "<br>";
        while ($row = mysqli_fetch_array($result)) {
        echo "<div class='news_result' news_id='$row[id]' news_category='$row[fld_category]'>". $row['fld_title']."</div>";
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