<?php
  include("connect.php");
  session_start();
 
  if (isset($_POST['search_municipal'])) {
      $query = "select * from tbl_admin where fld_name LIKE '{$_POST['search_municipal']}%' and fld_type like '%Municipality%' LIMIT 100";
      $result = mysqli_query($conn, $query);

      echo "<br>";
        if(mysqli_num_rows($result) > 0) {
            
            while ($row = mysqli_fetch_array($result)) {
            echo "<div class='admin_result' admin_id='$row[id]' admin_name='$row[fld_name]' ><span>". $row['fld_name']."</div>";
            }
            
        } 

     
        
        if(mysqli_num_rows($result) == 0 ) {
            echo "
            <div class='text-center'>
                Couldn't find any results.
            </div>
            ";
        }
        echo "<br>";
  }
?>