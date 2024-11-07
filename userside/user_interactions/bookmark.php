<?php
    include("../../connect.php");
    session_start();

    if(!isset($_SESSION["username"])){
       $response = "not login";
    }else{
        //date and time now
    date_default_timezone_set('Asia/Manila');
    $dateNow = date("Y-m-d H:i:s");

    $user_id = $_SESSION['user_id'];
    $id = "";

    if(isset($_REQUEST["destination_id"])){
        $id = "destination_id";
    }elseif(isset($_REQUEST["event_id"])){
        $id = "event_id";
    }elseif(isset($_REQUEST["news_id"])){
        $id = "news_id";
    }elseif(isset($_REQUEST["tips_id"])){
        $id = "tips_id";
    }elseif(isset($_REQUEST["guidelines_id"])){
        $id = "guidelines_id";
    }


    $checkLikeQuery = "select * from tbl_bookmarks where user_id='$user_id' and $id='".intval($_REQUEST["$id"])."'";
        $resultCheck =  mysqli_query($conn,$checkLikeQuery) or die(mysqli_error($conn));

        $response="";
        $response .= '{';
        if(mysqli_num_rows($resultCheck) !== 0){
            $query = "delete from tbl_bookmarks where user_id='$user_id' and $id='".intval($_REQUEST["$id"])."'";
            mysqli_query($conn,$query) or die(mysqli_error($conn));

            
            $response .= '"url":"/tourism_information_system/btn_icons/bookmark_false.png",';
        }else{
            $query = "insert into tbl_bookmarks (user_id, $id, fld_datetime)
            values(".intval($user_id).",".intval($_REQUEST["$id"]).",'". $dateNow."')";

            mysqli_query($conn,$query) or die(mysqli_error($conn));
            $response .= '"url":"/tourism_information_system/btn_icons/bookmark_true.png",';
        }

        $checknumLikeQuery = "select * from tbl_bookmarks where $id='".intval($_REQUEST["$id"])."'";
            $resultLikes =  mysqli_query($conn,$checknumLikeQuery) or die(mysqli_error($conn));

            $numlikes = mysqli_num_rows($resultLikes);

        $response .= '"numlikes":"'.$numlikes.'"';
        $response .= '}';


        
    }

    echo $response;
    

    
    

?>