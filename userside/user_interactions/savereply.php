<?php 
    include("../../connect.php");
    include_once("../../notification_function.php");
    session_start();

    if(!isset($_SESSION['user_id'])){
        echo "not login";
    }else{
        //date and time now
        date_default_timezone_set('Asia/Manila');
        $dateNow = date("Y-m-d H:i:s");

        $user_id = $_SESSION['user_id'];

        $query = "insert into tbl_replies (user_id, story_id, comment_id, fld_content, fld_datetime)
        values ('$user_id', '$_POST[story_id]', '$_POST[comment_id]', '". mysqli_real_escape_string($conn, $_POST["txt_reply"])."', '$dateNow' )";



        mysqli_query($conn, $query) or die(mysqli_error($conn));

        addNotification($user_id, 'reply', $_POST["comment_id"]);

        echo "";
    }
    
?>