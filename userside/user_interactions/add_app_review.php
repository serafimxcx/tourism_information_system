<?php 
    include("../../connect.php");
    session_start();

    //date and time now
    date_default_timezone_set('Asia/Manila');
    $dateNow = date("Y-m-d H:i:s");

    $user_id = $_SESSION['user_id'];

    $query = "insert into tbl_appreviews (user_id, fld_rating, fld_content, fld_datetime)
    values ('$user_id', '$_POST[rating_data]', '". mysqli_real_escape_string($conn, $_POST["txt_content"])."', '$dateNow' )";
    
    mysqli_query($conn, $query) or die(mysqli_error($conn));

    echo "";
?>