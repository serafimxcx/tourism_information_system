<?php 
    include("../../connect.php");
    session_start();

    //date and time now
    date_default_timezone_set('Asia/Manila');
    $dateNow = date("Y-m-d H:i:s");

    $user_id = $_SESSION['user_id'];

    $query="update tbl_reviewsratings set fld_locationrate='$_POST[loc_rating]', fld_cleanrate='$_POST[clean_rating]', fld_servicerate='$_POST[service_rating]', fld_valuerate='$_POST[values_rating]', fld_content='". mysqli_real_escape_string($conn, $_POST["txt_content"])."', fld_datetime ='$dateNow' where user_id='$user_id' and destination_id='$_POST[destination_id]'";
    
    mysqli_query($conn, $query) or die(mysqli_error($conn));

  
    echo "";
?>