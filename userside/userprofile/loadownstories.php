
                        <?php 
                            $result = $conn->query("select * from tbl_stories where writer_id like '$user_id' order by fld_date DESC ");

                            if(mysqli_num_rows($result) != 0){
                                while($row = $result->fetch_assoc()){
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
                                                <td><img src='$profpic' alt='Image' id='mini_dp'><br><br></td>
                                                <td align='left'><span id='story_writer_name'>$name</span>
                                                <span id='story_writer_username'>@$username</span><br>
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
                                                <td align='left'>".nl2br($row["fld_content"])."</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td align='left' ><div class='row'>";
                                                if(!empty($img_stories)){
    
                                                    $imageURL = "../img_stories/";
                                                    foreach($img_stories as $values){
                                                        $typefile = explode(".", $values);

                                                        if(strtoupper($typefile[1]) == "MP4"){
                                                            echo "<br><div class='col-sm'>
                                                            <video class='storyvideos' controls>
                                                                <source src='$imageURL"."$values' type='video/mp4'>
                                                            </video>
                                                            </div>
                                                            ";
                                                        }else{
                                                            echo "<br><div class='col-sm' >
                                                            <img src='$imageURL" . "$values' alt='Image' class='storyimages'>
                                                            </div>
                                                            ";
                                                        }
                                                        

                                                        
                                                    }
                                                }
                                            echo "</div></td>
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
                                                    echo "/tourism_information_system/btn_icons/unlike_heart.png";
                                                }else{
                                                    echo "/tourism_information_system/btn_icons/like_heart.png";
                                                }
                                            
                                                
                                                echo "' />&nbsp;<span class='numlikes' numlikes_id=$row[id]>$numlikes</span>
                                                </td>
                                                <td><img  class='btn_comment' onclick=post_comment('$row[id]') src='/tourism_information_system/btn_icons/comment_icon.png'/>&nbsp;<span class='numcomments' numcomments_id=$row[id]>$numcomments</span></td>";
                                                

                                            echo "</tr>
                                        </table>
                                    </div>";
                                }
                            }else{
                                echo "<div class='nostory_div'>
                                    You have no story at the moment.
                                </div>";
                            }
                            
                        ?>
              