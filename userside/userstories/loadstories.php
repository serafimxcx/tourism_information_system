<?php 
include("../../connect.php");
session_start();

if(!isset($_SESSION["user_id"])){
    $user_id = "";
}else{
    $user_id = $_SESSION["user_id"];
}


$loadstories = "";

    if(isset($_POST["trending"])){

        if(isset($_POST["searchStory"])){
                $writer_id = "";
                $destination_id = "";
                $event_id="";

                $resultwriter_id = $conn->query("select * from tbl_users where fld_username like '%$_POST[searchStory]%' or fld_name like '%$_POST[searchStory]%' LIMIT 1");
                while($row=$resultwriter_id->fetch_assoc()){
                    $writer_id = $row["id"];
                }

                $resultdestination_id = $conn->query("select * from tbl_destinations where fld_name like '%$_POST[searchStory]%' LIMIT 1");
                while($row=$resultdestination_id->fetch_assoc()){
                    $destination_id = $row["id"];
                }

                $resultevent_id = $conn->query("select * from tbl_events where fld_title like '%$_POST[searchStory]%' LIMIT 1");
                while($row=$resultevent_id->fetch_assoc()){
                    $event_id = $row["id"];
                }

                $checktrending = $conn->query("select tbl_stories.fld_date, tbl_likes.story_id, COUNT(*) as like_count 
                FROM tbl_likes, tbl_stories
                where tbl_likes.story_id = tbl_stories.id and(tbl_stories.fld_title like '%$_POST[searchStory]%' or tbl_stories.fld_content like '%$_POST[searchStory]%' or tbl_stories.writer_id = '$writer_id' or tbl_stories.destination_id = '$destination_id' or tbl_stories.event_id='$event_id')
                GROUP BY tbl_likes.story_id 
                ORDER BY like_count DESC, tbl_stories.fld_date DESC");
        }else{
            $checktrending = $conn->query("select tbl_stories.fld_date, tbl_likes.story_id, COUNT(*) as like_count 
            FROM tbl_likes, tbl_stories
            where tbl_likes.story_id = tbl_stories.id
            GROUP BY tbl_likes.story_id 
            ORDER BY like_count DESC, tbl_stories.fld_date DESC");
        }
       
        
        while($row = $checktrending->fetch_assoc()){
            $result = $conn->query("select * from tbl_stories where id='$row[story_id]'");
            
            while($row = $result->fetch_assoc()){
            
                $getwriter = $conn->query("select * from tbl_users where id='$row[writer_id]'");
                while($row2 = $getwriter->fetch_assoc()){
                    $writer_profpic = '/tourism_information_system/userside/img_profile/'.$row2["fld_profpic"];
                    $writer_username = $row2["fld_username"];
                    $writer_name = $row2["fld_name"];
                }

                if($row["fld_storyimages"]==""){
                    $img_stories = "";
                }else{
                    $img_stories = explode(",", $row["fld_storyimages"]);
                }

                $date = date_create($row["fld_date"]);
                $date_time = date_format($date,"F j, Y h:i:s A");
                

                $loadstories .= "<div class='i_stories'>
                    <table>
                        <tr>
                            <td><img src='$writer_profpic' alt='Image' id='mini_dp'><br><br></td>
                            <td align='left'><span id='story_writer_name'>$writer_name</span>
                            <span id='story_writer_username'>@$writer_username</span><br>
                            <span id='story_datetime'>$date_time</span><br>";

                            if(!empty($row["destination_id"])){
                                $resultdestination = $conn->query("select * from tbl_destinations where id = '$row[destination_id]'");
                                while($row_d = $resultdestination->fetch_assoc()){
                                    $loadstories .= "<a href='/tourism_information_system/userside/user_destinations/user_destinations.php?destination_type=$row_d[fld_type]&destination_id=$row_d[id]'><span id='story_destination'><i class='bi bi-geo-alt-fill'></i> $row_d[fld_name]</span></a><br>";
                                }
                                
                            }
    
                            if(!empty($row["event_id"])){
                                $resultdestination = $conn->query("select * from tbl_events where id = '$row[event_id]'");
                                while($row_e = $resultdestination->fetch_assoc()){
                                    $loadstories .= "<a href='/tourism_information_system/userside/user_events/u_events.php?event_type=$row_e[fld_type]&event_id=$row_e[id]'><span id='story_event'><i class='bi bi-calendar3-event-fill'></i> $row_e[fld_title]</span></a><br>";
                                }
                                
                            }
                            
    
                            $loadstories .= "<br>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td align='left'><b>$row[fld_title]</b><br></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td align='left'>".nl2br($row["fld_content"])."</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td align='left'><div class='row'>";
                            if(!empty($img_stories)){

                                $imageURL = "../img_stories/";
                                foreach($img_stories as $values){
                                    $typefile = explode(".", $values);

                                    if(strtoupper($typefile[1]) == "MP4"){
                                        $loadstories .= "<br><div class='col-sm'>
                                        <video class='storyvideos' controls>
                                            <source src='$imageURL"."$values' type='video/mp4'>
                                        </video>
                                        </div>
                                        ";
                                    }else{
                                        $loadstories .= "<br><div class='col-sm'>
                                        <img src='$imageURL" . "$values' alt='Image' class='storyimages'>
                                        </div>
                                        ";
                                    }
                                    

                                    
                                }
                            }
                        $loadstories .= "</div></td>
                        </tr>
                    </table>
                    <br>
                    <table width='100%'>
                        <tr>
                            <td>
                            <img  class='btn_like' story_id=$row[id] src='";
                            $resultCheck = $conn->query("select * from tbl_likes where user_id='$user_id' and story_id='$row[id]'") ;
                            $resultLikes = $conn->query("select * from tbl_likes where story_id='$row[id]'") ;
                            $resultComments = $conn->query("select * from tbl_comments where story_id='$row[id]'") ;

                            $numlikes = mysqli_num_rows($resultLikes);
                            $numcomments = mysqli_num_rows($resultComments);
                            
                            if(mysqli_num_rows($resultCheck) == 0){
                                $loadstories .= "/tourism_information_system/btn_icons/unlike_heart.png";
                            }else{
                                $loadstories .= "/tourism_information_system/btn_icons/like_heart.png";
                            }
                        
                            
                            $loadstories .= "' />&nbsp;<span class='numlikes' numlikes_id=$row[id]>$numlikes</span>
                            </td>
                            <td><img  class='btn_comment' onclick=post_comment('$row[id]') src='/tourism_information_system/btn_icons/comment_icon.png'/>&nbsp;<span class='numcomments' numcomments_id=$row[id]>$numcomments</span></td>";
                        $loadstories .= "</tr>
                    </table>
                </div>";
            }
        }
    }elseif(isset($_POST["searchStory"])){
        $writer_id = "";
        $destination_id = "";
        $event_id="";

        $resultwriter_id = $conn->query("select * from tbl_users where fld_username like '%$_POST[searchStory]%' or fld_name like '%$_POST[searchStory]%' LIMIT 1");
        while($row=$resultwriter_id->fetch_assoc()){
            $writer_id = $row["id"];
        }

        $resultdestination_id = $conn->query("select * from tbl_destinations where fld_name like '%$_POST[searchStory]%' LIMIT 1");
        while($row=$resultdestination_id->fetch_assoc()){
            $destination_id = $row["id"];
        }

        $resultevent_id = $conn->query("select * from tbl_events where fld_title like '%$_POST[searchStory]%' LIMIT 1");
        while($row=$resultevent_id->fetch_assoc()){
            $event_id = $row["id"];
        }


        $result = $conn->query("select * from tbl_stories where fld_title like '%$_POST[searchStory]%' or fld_content like '%$_POST[searchStory]%' or writer_id = '$writer_id' or destination_id = '$destination_id' or event_id='$event_id' order by fld_date DESC ");

        while($row = $result->fetch_assoc()){
            
            $getwriter = $conn->query("select * from tbl_users where id='$row[writer_id]'");
            while($row2 = $getwriter->fetch_assoc()){
                $writer_profpic = '/tourism_information_system/userside/img_profile/'.$row2["fld_profpic"];
                $writer_username = $row2["fld_username"];
                $writer_name = $row2["fld_name"];
            }

            if($row["fld_storyimages"]==""){
                $img_stories = "";
            }else{
                $img_stories = explode(",", $row["fld_storyimages"]);
            }

            $date = date_create($row["fld_date"]);
            $date_time = date_format($date,"F j, Y h:i:s A");
            

            $loadstories .= "<div class='i_stories'>
                <table>
                    <tr>
                        <td><img src='$writer_profpic' alt='Image' id='mini_dp'><br><br></td>
                        <td align='left'><span id='story_writer_name'>$writer_name</span>
                        <span id='story_writer_username'>@$writer_username</span><br>
                        <span id='story_datetime'>$date_time</span><br>";

                        if(!empty($row["destination_id"])){
                            $resultdestination = $conn->query("select * from tbl_destinations where id = '$row[destination_id]'");
                            while($row_d = $resultdestination->fetch_assoc()){
                                $loadstories .= "<a href='/tourism_information_system/userside/user_destinations/user_destinations.php?destination_type=$row_d[fld_type]&destination_id=$row_d[id]'><span id='story_destination'><i class='bi bi-geo-alt-fill'></i> $row_d[fld_name]</span></a><br>";
                            }
                            
                        }

                        if(!empty($row["event_id"])){
                            $resultdestination = $conn->query("select * from tbl_events where id = '$row[event_id]'");
                            while($row_e = $resultdestination->fetch_assoc()){
                                $loadstories .= "<a href='/tourism_information_system/userside/user_events/u_events.php?event_type=$row_e[fld_type]&event_id=$row_e[id]'><span id='story_event'><i class='bi bi-calendar3-event-fill'></i> $row_e[fld_title]</span></a><br>";
                            }
                            
                        }
                        

                        $loadstories .= "<br></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align='left'><b>$row[fld_title]</b><br></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align='left'>".nl2br($row["fld_content"])."</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align='left'><div class='row'>";
                        if(!empty($img_stories)){

                            $imageURL = "../img_stories/";
                            foreach($img_stories as $values){
                                $typefile = explode(".", $values);

                                if(strtoupper($typefile[1]) == "MP4"){
                                    $loadstories .= "<br><div class='col-sm'>
                                    <video class='storyvideos' controls>
                                        <source src='$imageURL"."$values' type='video/mp4'>
                                    </video>
                                    </div>
                                    ";
                                }else{
                                    $loadstories .= "<br><div class='col-sm'>
                                    <img src='$imageURL" . "$values' alt='Image' class='storyimages'>
                                    </div>
                                    ";
                                }
                                

                                
                            }
                        }
                    $loadstories .= "</div></td>
                    </tr>
                </table>
                <br>
                <table width='100%'>
                    <tr>
                        <td>
                        <img  class='btn_like' like_id=$row[id] story_id=$row[id] src='";
                        $resultCheck = $conn->query("select * from tbl_likes where user_id='$user_id' and story_id='$row[id]'") ;
                        $resultLikes = $conn->query("select * from tbl_likes where story_id='$row[id]'") ;
                        $resultComments = $conn->query("select * from tbl_comments where story_id='$row[id]'") ;

                        $numlikes = mysqli_num_rows($resultLikes);
                        $numcomments = mysqli_num_rows($resultComments);
                        
                        if(mysqli_num_rows($resultCheck) == 0){
                            $loadstories .= "/tourism_information_system/btn_icons/unlike_heart.png";
                        }else{
                            $loadstories .= "/tourism_information_system/btn_icons/like_heart.png";
                        }
                    
                        
                        $loadstories .= "' />&nbsp;<span class='numlikes' numlikes_id=$row[id]>$numlikes</span>
                        </td>
                        <td><img  class='btn_comment' onclick=post_comment('$row[id]') src='/tourism_information_system/btn_icons/comment_icon.png'/>&nbsp;<span class='numcomments' numcomments_id=$row[id]>$numcomments</span></td>";
                    $loadstories .= "</tr>
                </table>
            </div>";
        }

    }else{
        $result = $conn->query("select * from tbl_stories order by fld_date DESC ");

        while($row = $result->fetch_assoc()){
            
            $getwriter = $conn->query("select * from tbl_users where id='$row[writer_id]'");
            while($row2 = $getwriter->fetch_assoc()){
                $writer_profpic = '/tourism_information_system/userside/img_profile/'.$row2["fld_profpic"];
                $writer_username = $row2["fld_username"];
                $writer_name = $row2["fld_name"];
            }

            if($row["fld_storyimages"]==""){
                $img_stories = "";
            }else{
                $img_stories = explode(",", $row["fld_storyimages"]);
            }

            $date = date_create($row["fld_date"]);
            $date_time = date_format($date,"F j, Y h:i:s A");
            

            $loadstories .= "<div class='i_stories'>
                <table>
                    <tr>
                        <td><img src='$writer_profpic' alt='Image' id='mini_dp'><br><br></td>
                        <td align='left'><span id='story_writer_name'>$writer_name</span>
                        <span id='story_writer_username'>@$writer_username</span><br>
                        <span id='story_datetime'>$date_time</span><br>";

                        if(!empty($row["destination_id"])){
                            $resultdestination = $conn->query("select * from tbl_destinations where id = '$row[destination_id]'");
                            while($row_d = $resultdestination->fetch_assoc()){
                                $loadstories .= "<a href='/tourism_information_system/userside/user_destinations/user_destinations.php?destination_type=$row_d[fld_type]&destination_id=$row_d[id]'><span id='story_destination'><i class='bi bi-geo-alt-fill'></i> $row_d[fld_name]</span></a><br>";
                            }
                            
                        }

                        if(!empty($row["event_id"])){
                            $resultdestination = $conn->query("select * from tbl_events where id = '$row[event_id]'");
                            while($row_e = $resultdestination->fetch_assoc()){
                                $loadstories .= "<a href='/tourism_information_system/userside/user_events/u_events.php?event_type=$row_e[fld_type]&event_id=$row_e[id]'><span id='story_event'><i class='bi bi-calendar3-event-fill'></i> $row_e[fld_title]</span></a><br>";
                            }
                            
                        }
                        

                        $loadstories .= "<br></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align='left'><b>$row[fld_title]</b><br></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align='left'>".nl2br($row["fld_content"])."</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align='left'><div class='row'>";
                        if(!empty($img_stories)){

                            $imageURL = "../img_stories/";
                            foreach($img_stories as $values){
                                $typefile = explode(".", $values);

                                if(strtoupper($typefile[1]) == "MP4"){
                                    $loadstories .= "<br><div class='col-sm'>
                                    <video class='storyvideos' controls>
                                        <source src='$imageURL"."$values' type='video/mp4'>
                                    </video>
                                    </div>
                                    ";
                                }else{
                                    $loadstories .= "<br><div class='col-sm'>
                                    <img src='$imageURL" . "$values' alt='Image' class='storyimages'>
                                    </div>
                                    ";
                                }
                                

                                
                            }
                        }
                    $loadstories .= "</div></td>
                    </tr>
                </table>
                <br>
                <table width='100%'>
                    <tr>
                        <td>
                        <img  class='btn_like' like_id=$row[id] story_id=$row[id] src='";
                        $resultCheck = $conn->query("select * from tbl_likes where user_id='$user_id' and story_id='$row[id]'") ;
                        $resultLikes = $conn->query("select * from tbl_likes where story_id='$row[id]'") ;
                        $resultComments = $conn->query("select * from tbl_comments where story_id='$row[id]'") ;

                        $numlikes = mysqli_num_rows($resultLikes);
                        $numcomments = mysqli_num_rows($resultComments);
                        
                        if(mysqli_num_rows($resultCheck) == 0){
                            $loadstories .= "/tourism_information_system/btn_icons/unlike_heart.png";
                        }else{
                            $loadstories .= "/tourism_information_system/btn_icons/like_heart.png";
                        }
                    
                        
                        $loadstories .= "' />&nbsp;<span class='numlikes' numlikes_id=$row[id]>$numlikes</span>
                        </td>
                        <td><img  class='btn_comment' onclick=post_comment('$row[id]') src='/tourism_information_system/btn_icons/comment_icon.png'/>&nbsp;<span class='numcomments' numcomments_id=$row[id]>$numcomments</span></td>";
                    $loadstories .= "</tr>
                </table>
            </div>";
        }
    }

    echo $loadstories;

        
    
    
?>