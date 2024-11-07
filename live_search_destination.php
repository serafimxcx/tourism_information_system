<?php
  include("connect.php");
  session_start();
 
  if (isset($_POST['query'])) {
      $querydestination = "select * from tbl_destinations where fld_name LIKE '{$_POST['query']}%' LIMIT 100";
      $resultdestination = mysqli_query($conn, $querydestination);

      echo "<br>";
        if(mysqli_num_rows($resultdestination) > 0) {
            
            while ($row = mysqli_fetch_array($resultdestination)) {
            echo "<div class='d_result' destination_id='$row[id]' destination_name='$row[fld_name]' >". $row['fld_name']."</div>";
            }
            
        } 

     
        
        if(mysqli_num_rows($resultdestination) == 0 ) {
            echo "
            <div class='text-center'>
                Couldn't find any results.
            </div>
            ";
        }
        echo "<br>";
  }
?>