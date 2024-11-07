<?php
  include("connect.php");
  session_start();
 
  if (isset($_POST['query'])) {
      $querydestination = "select * from tbl_destinations where fld_name LIKE '{$_POST['query']}%' or fld_address LIKE '%{$_POST['query']}%'  LIMIT 100";
      $resultdestination = mysqli_query($conn, $querydestination);

      $queryevents = "select * from tbl_events where fld_title LIKE '{$_POST['query']}%' LIMIT 100";
      $resultevents = mysqli_query($conn, $queryevents);

      $querynews = "select * from tbl_news where fld_title LIKE '{$_POST['query']}%' LIMIT 100";
      $resultnews = mysqli_query($conn, $querynews);

      $querytips = "select * from tbl_tips where fld_title LIKE '{$_POST['query']}%' LIMIT 100";
      $resulttips = mysqli_query($conn, $querytips);

      $queryguide = "select * from tbl_guidelines where fld_title LIKE '{$_POST['query']}%' LIMIT 100";
      $resultguides = mysqli_query($conn, $queryguide);

      echo "<br>";
        if(mysqli_num_rows($resultdestination) > 0) {
            
            while ($row = mysqli_fetch_array($resultdestination)) {
            echo "<div class='destination_result' destination_id='$row[id]' destination_type='$row[fld_type]'><span>Destination</span>&nbsp;&nbsp;<span class='bullet'>&#8226;</span>&nbsp;&nbsp;". $row['fld_name']."</div>";
            }
            
        } 

        if(mysqli_num_rows($resultevents) > 0){
            while ($row = mysqli_fetch_array($resultevents)) {
            echo "<div class='event_result' event_id='$row[id]' event_type='$row[fld_type]'><span>Event</span>&nbsp;&nbsp;<span class='bullet'>&#8226;</span>&nbsp;&nbsp;". $row['fld_title']."</div>";
            }
            
        }

        if (mysqli_num_rows($resultnews) > 0) {
            while ($row = mysqli_fetch_array($resultnews)) {
            echo "<div class='news_result' news_id='$row[id]' news_category='$row[fld_category]'><span>News</span>&nbsp;&nbsp;<span class='bullet'>&#8226;</span>&nbsp;&nbsp;". $row['fld_title']."</div>";
          }
         
        }

        if (mysqli_num_rows($resulttips) > 0) {
            while ($row = mysqli_fetch_array($resulttips)) {
            echo "<div class='tips_result' tips_id='$row[id]'><span>Travel Tips</span>&nbsp;&nbsp;<span class='bullet'>&#8226;</span>&nbsp;&nbsp;". $row['fld_title']."</div>";
          }
        } 

        if (mysqli_num_rows($resultguides) > 0) {
          while ($row = mysqli_fetch_array($resultguides)) {
          echo "<div class='guidelines_result' guidelines_id='$row[id]'><span>Travel Guidelines</span>&nbsp;&nbsp;<span class='bullet'>&#8226;</span>&nbsp;&nbsp;". $row['fld_title']."</div>";
        }
      } 
        
        if(mysqli_num_rows($resultdestination) == 0 && mysqli_num_rows($resultevents) == 0 && mysqli_num_rows($resultnews) == 0 && mysqli_num_rows($resulttips) == 0 && mysqli_num_rows($resultguides) == 0) {
            echo "
            <div class='text-center'>
                Couldn't find any results.
            </div>
            ";
        }
        echo "<br>";
  }
?>