<?php 
    include("../../connect.php");
    session_start();

    $average_rating = 0;
	$total_review = 0;
	$five_star_review = 0;
	$four_star_review = 0;
	$three_star_review = 0;
	$two_star_review = 0;
	$one_star_review = 0;
	$total_rating = 0;
	$review_content = array();

	$query = "select * from tbl_appreviews";

	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	while($row = mysqli_fetch_assoc($result)){
        $date = date_create($row["fld_datetime"]);
        $date_time = date_format($date,"F j, Y h:i:s A");

		$review_content[] = array(
			'rating'		=>	$row["fld_rating"],
            'user_review'	=>	$row["fld_content"],
			'datetime'		=>	$date_time
		);

		if($row["fld_rating"] == '5')
		{
			$five_star_review++;
		}

		if($row["fld_rating"] == '4')
		{
			$four_star_review++;
		}

		if($row["fld_rating"] == '3')
		{
			$three_star_review++;
		}

		if($row["fld_rating"] == '2')
		{
			$two_star_review++;
		}

		if($row["fld_rating"] == '1')
		{
			$one_star_review++;
		}

		$total_review++;

		$total_rating = $total_rating + $row["fld_rating"];

	}

	$average_rating = $total_rating / $total_review;

	$output = array(
		'average_rating'	=>	number_format($average_rating, 1),
		'total_review'		=>	$total_review,
		'five_star_review'	=>	$five_star_review,
		'four_star_review'	=>	$four_star_review,
		'three_star_review'	=>	$three_star_review,
		'two_star_review'	=>	$two_star_review,
		'one_star_review'	=>	$one_star_review,
		'review_data'		=>	$review_content
	);

	echo json_encode($output);
?>