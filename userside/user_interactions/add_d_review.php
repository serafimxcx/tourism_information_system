<?php 
    include("../../connect.php");
    session_start();

    //date and time now
    date_default_timezone_set('Asia/Manila');
    $dateNow = date("Y-m-d H:i:s");

    $user_id = $_SESSION['user_id'];

    $query = "insert into tbl_reviewsratings (user_id, destination_id, fld_locationrate, fld_cleanrate, fld_servicerate, fld_valuerate, fld_content, fld_datetime)
    values ('$user_id', '$_POST[destination_id]', '$_POST[loc_rating]', '$_POST[clean_rating]', '$_POST[service_rating]', '$_POST[values_rating]','". mysqli_real_escape_string($conn, $_POST["txt_content"])."', '$dateNow' )";
    
    mysqli_query($conn, $query) or die(mysqli_error($conn));

    echo "";
?>