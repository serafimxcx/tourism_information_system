<?php 
    include("../../connect.php");
    session_start();

    $name = "";
    $profpic = "";



    $query = "select * from tbl_comments where story_id=".intval($_REQUEST["story_id"]);

    $result = mysqli_query($conn,$query) or die(mysqli_error($conn));

    $comments = "";

    while($row = mysqli_fetch_assoc($result)){
        $getUserQuery = "select * from tbl_users where id=". intval($row["user_id"]);
        $resultGetUser = mysqli_query($conn,$getUserQuery) or die(mysqli_error($conn));
        while($row2 = mysqli_fetch_assoc($resultGetUser)){
            $writer_profpic = '/tourism_information_system/userside/img_profile/'.$row2["fld_profpic"];
            $writer_username = $row2["fld_username"];
            $writer_name = $row2["fld_name"];
            $writer_id = $row2["id"];
        }

        if($row["fld_commentimages"]==""){
            $img_comments = "";
        }else{
            $img_comments = explode(",", $row["fld_commentimages"]);
        }

        $date = date_create($row["fld_datetime"]);
        $date_time = date_format($date,"F j, Y h:i:s A");

        $comments .= "<div class='i_comments'>
                        <table>
                            <tr>
                                <td><img  class='btn_deletecomment' delete_id=$row[id] src='/tourism_information_system/btn_icons/delete2_icon.png' title='Delete Comment'/></td>
                                <td><img src='$writer_profpic' alt='Image' id='mini_dp'><br><br></td>
                                <td align='left'><span id='story_writer_name'>$writer_name</span>
                                <span id='story_writer_username'>@$writer_username</span><br>
                                <span id='story_datetime'>$date_time</span><br><br>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td align='left'>$row[fld_content]</td>
        
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td align='left'><div class='row'>";
                                    if(!empty($img_comments)){

                                        $imageURL = "../img_comments/";
                                        foreach($img_comments as $values){
                                            $typefile = explode(".", $values);

                                            if(strtoupper($typefile[1]) == "MP4"){
                                                $comments .= "<br><div class='col-sm'>
                                                <video class='storyvideos' controls>
                                                    <source src='$imageURL"."$values' type='video/mp4'>
                                                </video>
                                                </div>
                                                ";
                                            }else{
                                                $comments .= "<br><div class='col-sm'>
                                                <img src='$imageURL" . "$values' alt='Image' class='storyimages'>
                                                </div>
                                                ";
                                            }
                                            

                                            
                                        }
                                    }
                                $comments .= "</div> <br> <h5 class='btn_reply' comment_id='$row[id]' style='cursor: pointer;'>View Replies</h5> <br></td>
                            </tr>
                        </table>
                        <div class='view_repliesdiv' id='view_replies_div".$row["id"]."'>
                
                        </div>
                        
                        <br>
                    </div>";
    }

    echo $comments;
?>

