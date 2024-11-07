<?php 
    include("../../connect.php");
    session_start();

    $user_id = $_SESSION['user_id'];

    $get_content = array();

    $query = "select * from tbl_reviewsratings where user_id='$user_id' and destination_id='". intval($_REQUEST["destination_id"])."'";
    $getUserReview = mysqli_query($conn, $query) or die(mysqli_error($conn));

    if(mysqli_num_rows($getUserReview) > 0){
        while($row = mysqli_fetch_assoc($getUserReview)){
            $date = date_create($row["fld_datetime"]);
            $date_time = date_format($date,"F j, Y h:i:s A");
    
            $get_content = array(
                'hasReview'    => '1',
                'user_id'		=>	$row["user_id"],
                'destination_id'		=>	$row["destination_id"],
                'location_rating'	=>	$row["fld_locationrate"],
                'clean_rating'	=>	$row["fld_cleanrate"],
                'service_rating'	=>	$row["fld_servicerate"],
                'value_rating'	=>	$row["fld_valuerate"],
                'content'		=>	$row["fld_content"],
                'datetime'		=>	$date_time
            );
    
        }

    }

    echo json_encode($get_content);

    
?>