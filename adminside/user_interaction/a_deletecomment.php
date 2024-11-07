<?php

    include("../../connect.php");
    session_start();
    $admin_id = $_SESSION['admin_id'];

    //date and time now
    date_default_timezone_set('Asia/Manila');
    $dateNow = date("Y-m-d H:i:s");

    $result = $conn->query("select tbl_users.fld_username, tbl_stories.id from tbl_users, tbl_stories, tbl_comments where tbl_comments.id like '$_REQUEST[comment_id]' and tbl_comments.user_id = tbl_users.id and tbl_comments.story_id = tbl_stories.id");

    while($row = $result->fetch_assoc()){
        $conn->query("insert into a_activity_log(admin_id, fld_activity, fld_datetime)values('$admin_id', ' has remove a comment of [ ".$row['fld_username']." ] in story [ ".$row['id']." ] ', '$dateNow')");
    }
            
    $deleteuserstory = $conn->query("delete from tbl_replies where comment_id like '$_REQUEST[comment_id]'");

    $query = "delete from tbl_comments 
                where id=".intval($_REQUEST["comment_id"]);
    mysqli_query($conn,$query) or die(mysqli_error($conn)."<br>".$query);

    echo "";

?>
