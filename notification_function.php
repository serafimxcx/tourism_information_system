<?php 
function addNotification($user_id, $type, $content_id) {
    include("connect.php");

    //date and time now
    date_default_timezone_set('Asia/Manila');
    $dateNow = date("Y-m-d H:i:s");

    $query = "insert into tbl_usernotif (user_id, notification_type, content_id, fld_datetime) VALUES ($user_id, '$type', $content_id, '$dateNow')";
    mysqli_query($conn, $query);
}

?>