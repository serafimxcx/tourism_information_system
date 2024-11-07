<?php
    include("../../connect.php");
    include("../../notification_function.php");
    session_start();

    if(!isset($_SESSION["username"])){
        $response = "not login";
     }else{
        //date and time now
        date_default_timezone_set('Asia/Manila');
        $dateNow = date("Y-m-d H:i:s");

        $user_id = $_SESSION['user_id'];

        $checkrepostQuery = "select * from tbl_reposts where user_id='$user_id' and story_id='".intval($_REQUEST["story_id"])."'";
        $resultCheck =  mysqli_query($conn,$checkrepostQuery) or die(mysqli_error($conn));


        $response="";
        $response .= '{';
        if(mysqli_num_rows($resultCheck) !== 0){
            $query = "delete from tbl_reposts where user_id='$user_id' and story_id='".intval($_REQUEST["story_id"])."'";
            mysqli_query($conn,$query) or die(mysqli_error($conn));

            $response .= '"url":"/tourism_information_system/btn_icons/repost_icon.png",';
        }else{
            $query = "insert into tbl_reposts (user_id, story_id, fld_datetime)
            values(".intval($user_id).",".intval($_REQUEST["story_id"]).",'". $dateNow."')";

            addNotification($user_id, 'repost', intval($_REQUEST["story_id"]));

            mysqli_query($conn,$query) or die(mysqli_error($conn));
            $response .= '"url":"/tourism_information_system/btn_icons/repost_true_icon.png",';
        }

        $checknumrepostQuery = "select * from tbl_reposts where story_id='".intval($_REQUEST["story_id"])."'";
            $resultreposts =  mysqli_query($conn,$checknumrepostQuery) or die(mysqli_error($conn));

            $numreposts = mysqli_num_rows($resultreposts);

        $response .= '"numreposts":"'.$numreposts.'"';
        $response .= '}';
     }
    


    echo $response;

?>