<?php 
    include("../../connect.php");
    session_start();

    $average_rating= 0;
    $average_loc_rating = 0;
    $average_clean_rating = 0;
    $average_service_rating = 0;
    $average_value_rating = 0;

	$total_review = 0;

	$total_loc_rating = 0;
	$total_clean_rating = 0;
	$total_service_rating = 0;
	$total_value_rating = 0;
	$review_content = array();

    $query = "select * from tbl_reviewsratings where destination_id='". intval($_REQUEST["destination_id"])."'";

    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    while($row = mysqli_fetch_assoc($result)){
        $date = date_create($row["fld_datetime"]);
        $date_time = date_format($date,"F j, Y h:i:s A");

        $review_content[] = array(
			'user_id'		=>	$row["user_id"],
			'destination_id'		=>	$row["destination_id"],
			'location_rating'	=>	$row["fld_locationrate"],
			'clean_rating'	=>	$row["fld_cleanrate"],
			'service_rating'	=>	$row["fld_servicerate"],
			'value_rating'	=>	$row["fld_valuerate"],
			'content'		=>	$row["fld_content"],
			'datetime'		=>	$date_time
		);

        $total_review++;

        $total_loc_rating = $total_loc_rating + $row["fld_locationrate"];
        $total_clean_rating = $total_clean_rating + $row["fld_cleanrate"];
        $total_service_rating = $total_service_rating + $row["fld_servicerate"];
        $total_value_rating = $total_value_rating + $row["fld_valuerate"];
    }

    $average_loc_rating = $total_loc_rating/$total_review;
    $average_clean_rating = $total_clean_rating/$total_review;
    $average_service_rating = $total_service_rating/$total_review;
    $average_value_rating = $total_value_rating/$total_review;

    $average_rating = ($average_loc_rating + $average_clean_rating + $average_service_rating + $average_value_rating)/4;

    $output = array(
		'average_rating'	=>	number_format($average_rating, 1),
		'average_loc_rating'	=>	number_format($average_loc_rating, 1),
		'average_clean_rating'	=>	number_format($average_clean_rating, 1),
		'average_service_rating'	=>	number_format($average_service_rating, 1),
		'average_value_rating'	=>	number_format($average_value_rating, 1),
		'total_loc_rating'	=>	number_format($total_loc_rating, 1),
		'total_clean_rating'	=>	number_format($total_clean_rating, 1),
		'total_service_rating'	=>	number_format($total_service_rating, 1),
		'total_value_rating'	=>	number_format($total_value_rating, 1),
		'total_review'		=>	$total_review,
		'review_data'		=>	$review_content
	);

	echo json_encode($output);

?>