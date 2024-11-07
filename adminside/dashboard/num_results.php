<?php 
    
    $resultadmins = $conn->query("select * from tbl_admin");
    $no_of_admins = mysqli_num_rows($resultadmins);

    $resultusers = $conn->query("select * from tbl_users");
    $no_of_users = mysqli_num_rows($resultusers);

    $resultuserverified = $conn->query("select * from tbl_users where fld_isVerified='1'");
    $no_of_verified = mysqli_num_rows($resultuserverified);

    $resultuserunverified = $conn->query("select * from tbl_users where fld_isVerified='0'");
    $no_of_unverified = mysqli_num_rows($resultuserunverified);

    $resultdestinations = $conn->query("select * from tbl_destinations");
    $no_of_destinations = mysqli_num_rows($resultdestinations);

    $resultevents = $conn->query("select * from tbl_events");
    $no_of_events = mysqli_num_rows($resultevents);

    $resultnews = $conn->query("select * from tbl_news");
    $no_of_news = mysqli_num_rows($resultnews);

    $resulttips = $conn->query("select * from tbl_tips");
    $no_of_tips = mysqli_num_rows($resulttips);

    $resultguidelines = $conn->query("select * from tbl_guidelines");
    $no_of_guidelines = mysqli_num_rows($resultguidelines);

    $resulthotlines = $conn->query("select * from tbl_hotlines");
    $no_of_hotlines = mysqli_num_rows($resulthotlines);

    $resulthospitals = $conn->query("select * from tbl_hospitals");
    $no_of_hospitals = mysqli_num_rows($resulthospitals);

    $resultstores = $conn->query("select * from tbl_stores");
    $no_of_stores = mysqli_num_rows($resultstores);

    $resultstories = $conn->query("select * from tbl_stories");
    $no_of_stories = mysqli_num_rows($resultstories);

    $resultcomments = $conn->query("select * from tbl_comments");
    $no_of_comments = mysqli_num_rows($resultcomments);

    $resultreplies = $conn->query("select * from tbl_replies");
    $no_of_replies = mysqli_num_rows($resultreplies);

    $resultreviews = $conn->query("select * from tbl_reviewsratings");
    $no_of_reviews = mysqli_num_rows($resultreviews);
?>