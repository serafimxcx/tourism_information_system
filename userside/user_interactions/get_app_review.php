<?php 
    include("../../connect.php");
    session_start();

    $user_id = $_SESSION['user_id'];

    $get_content = array();

    $query = "select * from tbl_appreviews where user_id='$user_id'";
    $getUserReview = mysqli_query($conn, $query) or die(mysqli_error($conn));

    if(mysqli_num_rows($getUserReview) > 0){
        while($row = mysqli_fetch_assoc($getUserReview)){
            $date = date_create($row["fld_datetime"]);
            $date_time = date_format($date,"F j, Y h:i:s A");
    
            $get_content = array(
                'hasReview'    => '1',
                'user_id'		=>	$row["user_id"],
                'rating'	=>	$row["fld_rating"],
                'content'		=>	$row["fld_content"],
                'datetime'		=>	$date_time
            );
    
        }

    }

    echo json_encode($get_content);

    
?>