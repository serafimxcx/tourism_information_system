<?php

    include("../../connect.php");
    session_start();
    $admin_id = $_SESSION['admin_id'];

    //date and time now
    date_default_timezone_set('Asia/Manila');
    $dateNow = date("Y-m-d H:i:s");

    $result = $conn->query("select tbl_users.fld_username, tbl_replies.story_id from tbl_users, tbl_stories, tbl_comments, tbl_replies where tbl_replies.id like '$_REQUEST[reply_id]' and tbl_replies.user_id = tbl_users.id ");

    while($row = $result->fetch_assoc()){
        $conn->query("insert into a_activity_log(admin_id, fld_activity, fld_datetime)values('$admin_id', ' has remove a reply of [ ".$row['fld_username']." ] to a comment in the story [ ".$row['story_id']." ] ', '$dateNow')");
    }

    $query = "delete from tbl_replies
                where id=".intval($_REQUEST["reply_id"]);
    mysqli_query($conn,$query) or die(mysqli_error($conn)."<br>".$query);

    echo "";

?>
