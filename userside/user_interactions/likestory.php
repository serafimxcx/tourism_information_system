<?php
    include("../../connect.php");
    include_once("../../notification_function.php");
    session_start();

    if(!isset($_SESSION["username"])){
        $response = "not login";
     }else{
        //date and time now
    date_default_timezone_set('Asia/Manila');
    $dateNow = date("Y-m-d H:i:s");

    $user_id = $_SESSION['user_id'];

    $checkLikeQuery = "select * from tbl_likes where user_id='$user_id' and story_id='".intval($_REQUEST["story_id"])."'";
    $resultCheck =  mysqli_query($conn,$checkLikeQuery) or die(mysqli_error($conn));


    $response="";
    $response .= '{';
    if(mysqli_num_rows($resultCheck) !== 0){
        $query = "delete from tbl_likes where user_id='$user_id' and story_id='".intval($_REQUEST["story_id"])."'";
        mysqli_query($conn,$query) or die(mysqli_error($conn));

        
        $response .= '"url":"/tourism_information_system/btn_icons/unlike_heart.png",';
    }else{
        $query = "insert into tbl_likes (user_id, story_id, fld_datetime)
        values(".intval($user_id).",".intval($_REQUEST["story_id"]).",'". $dateNow."')";

        addNotification($user_id, 'like', intval($_REQUEST["story_id"]));

        mysqli_query($conn,$query) or die(mysqli_error($conn));
        $response .= '"url":"/tourism_information_system/btn_icons/like_heart.png",';
    }

    $checknumLikeQuery = "select * from tbl_likes where story_id='".intval($_REQUEST["story_id"])."'";
        $resultLikes =  mysqli_query($conn,$checknumLikeQuery) or die(mysqli_error($conn));

        $numlikes = mysqli_num_rows($resultLikes);

    $response .= '"numlikes":"'.$numlikes.'"';
    $response .= '}';
     }

    


    echo $response;

?>