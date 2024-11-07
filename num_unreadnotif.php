<?php 
include("connect.php");
session_start();


if(isset($_SESSION["user_id"])){
$result = $conn->query("select DISTINCT tbl_usernotif.id as notif_id, tbl_usernotif.user_id, tbl_usernotif.status, tbl_usernotif.content_id, tbl_usernotif.notification_type, tbl_usernotif.fld_datetime, tbl_stories.id, tbl_stories.writer_id, tbl_instigator.fld_name as instigator_name, tbl_instigator.id as instigator_id, tbl_comments.user_id, tbl_comments.id
    from tbl_usernotif, tbl_stories, tbl_users as tbl_instigator, tbl_comments, tbl_likes, tbl_reposts
    where (
        (tbl_usernotif.content_id = tbl_stories.id and tbl_stories.writer_id = '$_SESSION[user_id]') 
    or (tbl_usernotif.content_id = tbl_comments.id and tbl_comments.user_id = '$_SESSION[user_id]')
    
    )
     and tbl_usernotif.user_id = tbl_instigator.id and tbl_usernotif.status = 'unread'
    
    GROUP BY tbl_usernotif.id 
    ORDER BY tbl_usernotif.id DESC");

   

$num_unread = mysqli_num_rows($result);

echo $num_unread;
}


?>