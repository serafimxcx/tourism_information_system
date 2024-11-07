<?php
  include("connect.php");
  session_start();
 
  if (isset($_POST['query'])) {
      $queryevent = "select * from tbl_events where fld_title LIKE '{$_POST['query']}%' LIMIT 100";
      $resultevent = mysqli_query($conn, $queryevent);

      echo "<br>";
        if(mysqli_num_rows($resultevent) > 0) {
            
            while ($row = mysqli_fetch_array($resultevent)) {
            echo "<div class='e_result' event_id='$row[id]' event_name='$row[fld_title]' ><span>". $row['fld_title']."</div>";
            }
            
        } 

     
        
        if(mysqli_num_rows($resultevent) == 0 ) {
            echo "
            <div class='text-center'>
                Couldn't find any results.
            </div>
            ";
        }
        echo "<br>";
  }
?>