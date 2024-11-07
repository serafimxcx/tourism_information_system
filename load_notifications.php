<?php 
    include("connect.php");
    session_start();

    $loadnotif = "";

    if(isset($_SESSION["user_id"])){
        $query = "select DISTINCT tbl_usernotif.id as notif_id, tbl_usernotif.user_id, tbl_usernotif.status, tbl_usernotif.content_id, tbl_usernotif.notification_type, tbl_usernotif.fld_datetime, tbl_stories.id, tbl_stories.writer_id, tbl_instigator.fld_name as instigator_name, tbl_instigator.id as instigator_id, tbl_comments.user_id, tbl_comments.id
    from tbl_usernotif, tbl_stories, tbl_users as tbl_instigator, tbl_comments, tbl_likes, tbl_reposts
    where (
        (tbl_usernotif.content_id = tbl_stories.id and tbl_stories.writer_id = '$_SESSION[user_id]') 
    or (tbl_usernotif.content_id = tbl_comments.id and tbl_comments.user_id = '$_SESSION[user_id]')
    
    )
     and tbl_usernotif.user_id = tbl_instigator.id
    
    GROUP BY tbl_usernotif.id 
    ORDER BY tbl_usernotif.id DESC";


    $result = mysqli_query($conn, $query);

   

    while($row = mysqli_fetch_assoc($result)){

        


        if($_SESSION["user_id"] != $row["instigator_id"]){
            $loadnotif .= "<div class='notif_records' notif_id= '$row[notif_id]' content_id='";

            if($row["notification_type"] == "reply"){
                $resultcomment = $conn->query("select * from tbl_comments where id = '$row[content_id]'");

                while($rowcomment = $resultcomment->fetch_assoc()){
                    $loadnotif .= $rowcomment['story_id'];
                }
            }else{
                $loadnotif .= $row["content_id"];
            }
            
            $loadnotif .= "' ";
                if($row["status"] == 'unread'){
                    $loadnotif .= "style='background-color: #cecece;'>";
                }else{
                    $loadnotif .= "style='background-color: white;'>";
                }
            
                if($row["notification_type"] == "like"){
                    $loadnotif .= "$row[instigator_name] liked your post.";
                }
                if($row["notification_type"] == "comment"){
                    $loadnotif .= "$row[instigator_name] commented on your post.";
                }

                if($row["notification_type"] == "reply"){
                    $loadnotif .= "$row[instigator_name] replied to your comment.";
                }

                if($row["notification_type"] == "repost"){
                    $loadnotif .= "$row[instigator_name] reposted your post.";
                }
            
            $loadnotif .= "</div>";
        }
    }

    }
    

    echo $loadnotif;

?>