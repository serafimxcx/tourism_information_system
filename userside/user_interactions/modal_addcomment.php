<div class="modal" id="comment_modal" style="
        <?php
        if(isset($_GET["story_comment_id"])){
            echo 'display:block;';
            $story_id= $_GET["story_comment_id"]; 
        }else{
            echo 'display:none;';
        }
        ?>
        
        ">

        <div id="comment_div">
            <div id="load_comment_div">
                <button type="button" id="btn_back"><img id='back_icon' src='/tourism_information_system/btn_icons/back_icon.png'/><span id="txt_back">Back</span></button>
                <?php 
                    $result = $conn->query("select * from tbl_stories where id='$story_id' order by fld_date DESC ");

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
                            

                            echo "<div class='i_stories'>
                                    <table>
                                        <tr>
                                            <td><img src='$writer_profpic' alt='Image' id='mini_dp'><br><br></td>
                                            <td align='left'><span id='story_writer_name'>$writer_name</span>
                                            <span id='story_writer_username'>@$writer_username</span><br>
                                            <span id='story_datetime'>$date_time</span><br>";

                                            if(!empty($row["destination_id"])){
                                                $resultdestination = $conn->query("select * from tbl_destinations where id = '$row[destination_id]'");
                                                while($row_d = $resultdestination->fetch_assoc()){
                                                    echo "<a href='/tourism_information_system/userside/user_destinations/user_destinations.php?destination_type=$row_d[fld_type]&destination_id=$row_d[id]'><span id='story_destination'><i class='bi bi-geo-alt-fill'></i> $row_d[fld_name]</span></a><br>";
                                                }
                                                
                                            }
                    
                                            if(!empty($row["event_id"])){
                                                $resultdestination = $conn->query("select * from tbl_events where id = '$row[event_id]'");
                                                while($row_e = $resultdestination->fetch_assoc()){
                                                    echo "<a href='/tourism_information_system/userside/user_events/u_events.php?event_type=$row_e[fld_type]&event_id=$row_e[id]'><span id='story_event'><i class='bi bi-calendar3-event-fill'></i> $row_e[fld_title]</span></a><br>";
                                                }
                                                
                                            }
                                            
                    
                                            echo "<br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td align='left'><b>$row[fld_title]</b><br></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td align='left'>$row[fld_content]</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td align='left'><div class='row'>";
                                            if(!empty($img_stories)){

                                                $imageURL = "../img_stories/";
                                                foreach($img_stories as $values){
                                                    $typefile = explode(".", $values);

                                                    if(strtoupper($typefile[1]) == "MP4"){
                                                        echo "<br><div class='col-sm'>
                                                        <video class='c_storyvideos' controls>
                                                            <source src='$imageURL"."$values' type='video/mp4'>
                                                        </video>
                                                        </div>
                                                        ";
                                                    }else{
                                                        echo "<br><div class='col-sm'>
                                                        <img src='$imageURL" . "$values' alt='Image' class='c_storyimages'>
                                                        </div>
                                                        ";
                                                    }
                                                    

                                                    
                                                }
                                            }
                                        echo "</div></td>
                                        </tr>
                                    </table>
                                    <br>
                                    <table width='100%' style='text-align: center'>
                                        <tr>
                                            
                                            <td>
                                            <img  class='btn_like' like_id=$row[id] story_id=$row[id] src='";
                                            $resultCheck = $conn->query("select * from tbl_likes where user_id='$user_id' and story_id='$row[id]'") ;
                                            $resultLikes = $conn->query("select * from tbl_likes where story_id='$row[id]'") ;
                                            $resultComments = $conn->query("select * from tbl_comments where story_id='$row[id]'") ;
                                            $resultReposts = $conn->query("select * from tbl_reposts where story_id='$row[id]'") ;
                                            
                                            $numlikes = mysqli_num_rows($resultLikes);
                                            $numcomments = mysqli_num_rows($resultComments);
                                            $numreposts = mysqli_num_rows($resultReposts);
                                            
                                            if(mysqli_num_rows($resultCheck) == 0){
                                                echo "/tourism_information_system/btn_icons/unlike_heart.png";
                                            }else{
                                                echo "/tourism_information_system/btn_icons/like_heart.png";
                                            }
                                        
                                            
                                            echo "' />&nbsp;<span class='numlikes' numlikes_id=$row[id]>$numlikes</span>
                                            </td>
                                            <td><img  class='btn_comment' onclick=post_comment('$row[id]') src='/tourism_information_system/btn_icons/comment_icon.png'/>&nbsp;<span class='numcomments' numcomments_id=$row[id]>$numcomments</span></td>";
                                            if($row["writer_id"] != $user_id){
                                                echo "<td><img  class='btn_repost' repost_id=$row[id] story_id=$row[id] src='";
                                                if(mysqli_num_rows($resultReposts) == 0){
                                                    echo "/tourism_information_system/btn_icons/repost_icon.png";
                                                }else{
                                                    echo "/tourism_information_system/btn_icons/repost_true_icon.png";
                                                }
                                                echo "'/>&nbsp;<span class='numreposts' numreposts_id=$row[id]>$numreposts</span></td>
                                                <td><img  class='btn_share' src='/tourism_information_system/btn_icons/share_icon.png'/></td>";
                                                
                                            }else{
                                                echo "<td><img  class='btn_repost' repost_id=$row[id] story_id=$row[id] src='";
                                                if(mysqli_num_rows($resultReposts) == 0){
                                                    echo "/tourism_information_system/btn_icons/repost_icon.png";
                                                }else{
                                                    echo "/tourism_information_system/btn_icons/repost_true_icon.png";
                                                }
                                                echo "'/>&nbsp;<span class='numreposts' numreposts_id=$row[id]>$numreposts</span></td>
                                                <td><img  class='btn_share' src='/tourism_information_system/btn_icons/share_icon.png'/></td>
                                                <td><img  class='btn_delete' delete_id=$row[id] src='/tourism_information_system/btn_icons/delete_icon.png'/></td>";
                                            }
                                        echo "</tr>
                                    </table>
                                </div>";
                        }
                ?>
                <div id="user_comment_div">
                    <form enctype="multipart/form-data" id="add_comment_form">
                        <table width="100%">
                            <input type="hidden" name="txt_story_id" id="txt_story_id" value="<?php echo $story_id;?>">
                            <tr>
                                <td width="10%"><img src='<?php 
                                 if(!isset($_SESSION["user_id"])){
                                    echo "/tourism_information_system/img_shortcuts/noprofile.jpg";
                                 }else{
                                    echo $profpic;
                                 }
                                
                                
                                ?>' alt='Image' id='mini_dp'></td>
                                <td width="90%"><textarea name="txt_content" data_type="txt" class="form-control" id="txt_content" placeholder="Post a comment..."></textarea></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><img id="add_image_comment" src="/tourism_information_system/btn_icons/add_image_story.png" alt="add-image"/>
                                    <input id="imagePostComment" type="file" data_type="img"
                                        name="imgs_comment[]" placeholder="Photo" multiple>&nbsp;
                                        <br><br>
                                    <div id="previewFilesComment"></div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><div class="btncontainer">
                                    <button type="button" class="btn_setupcomment" id="btn_cancelcomment">Cancel</button>
                                    <button type="button" class="btn_setupcomment" id="btn_savecomment">Post</button></div></td>
                            </tr>
                        </table>
                    
                    </form>
                    <br><br>

                
                </div>
                <div id="view_comments_div">
                
                </div>
            </div>
        </div>
    </div>