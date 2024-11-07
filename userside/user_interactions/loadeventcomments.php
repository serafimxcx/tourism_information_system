<?php 
    include("../../connect.php");
    session_start();

    $name = "";
    $profpic = "";
    $username = "";
    $user_id = "";


    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $user_id = $_SESSION['user_id'];

        $result = $conn -> query("select * from tbl_users where fld_username like '$username'");
        while($row = $result->fetch_assoc()){
            if($row["fld_name"] == ""){
                $name = "";
            }else{
                $name = $row["fld_name"];
                $profpic = '../img_profile/'.$row["fld_profpic"];
            }
            
            
        }
    }

    $query = "select * from tbl_eventcomments where event_id=".intval($_REQUEST["event_id"]);

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
                                <td>";

                                $resultwriterid = $conn->query("select * from tbl_events where id='".intval($_REQUEST["event_id"])."'");

                                while($rowwriter = $resultwriterid->fetch_assoc()){
                                    $writer_id_comment = $rowwriter["admin_id"];
                                }

                                $resultuseradmin  = $conn->query("select * from tbl_admin where id='$writer_id_comment'");

                                while($rowadmin = $resultuseradmin->fetch_assoc()){
                                    $admin_user_id = $rowadmin["admin_user_id"];
                                }

                                if($admin_user_id == $user_id){
                                    $comments .= "<img  class='btn_deletecomment' delete_id=$row[id] src='/tourism_information_system/btn_icons/delete2_icon.png' title='Delete Comment'/>";
                                }
                                
                                $comments .= "</td>
                                <td><img src='$writer_profpic' alt='Image' class='mini_dp'><br><br></td>
                                <td align='left'><span id='event_writer_name'>$writer_name</span>
                                <span id='event_writer_username'>@$writer_username</span><br>
                                <span id='event_datetime'>$date_time</span><br><br>
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

                                        $imageURL = "../img_eventcomments/";
                                        foreach($img_comments as $values){
                                            $typefile = explode(".", $values);

                                            if(strtoupper($typefile[1]) == "MP4"){
                                                $comments .= "<br><div class='col-sm'>
                                                <video class='eventvideos' controls>
                                                    <source src='$imageURL"."$values' type='video/mp4'>
                                                </video>
                                                </div>
                                                ";
                                            }else{
                                                $comments .= "<br><div class='col-sm'>
                                                <img src='$imageURL" . "$values' alt='Image' class='eventimages'>
                                                </div>
                                                ";
                                            }
                                            

                                            
                                        }
                                    }
                                $comments .= "</div> <br> <h5 class='btn_reply' comment_id='$row[id]' style='cursor: pointer;'>View Replies</h5> <br></td>
                            </tr>
                        </table>
                        <table width='100%' id='reply_div".$row["id"]."' style='display:none;'>
                            <form onload='return false;'>
                                <tr>
                                    <td width='10%'></td>
                                    <td width='5%'><img src='";
                                    if(!isset($_SESSION["user_id"])){
                                        $comments .= "/tourism_information_system/img_shortcuts/noprofile.jpg";
                                     }else{
                                        $comments .= $profpic;
                                     }
                                    $comments .= "' alt='Image' id='mini_dp'>&nbsp;</td>
                                    <td width='85%'> <textarea  class='form-control' id='txt_reply".$row["id"]."' name='txt_reply".$row["id"]."'> </textarea> <br></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td><div class='btncontainer'>
                                    <button type='button' class='btn_reply2' comment_id='$row[id]' id='btn_cancelreply'>Cancel</button>
                                    <button type='button' class='btn_reply2' comment_id='$row[id]' id='btn_savereply'>Add Reply</button></div></td>
                                </tr>
                            </form>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                    <br><br>
                                    <div id='view_replies_div".$row["id"]."'>
                
                                    </div>
                                    </td>
                                </tr>
                        </table>
                        
                        <br>
                    </div>";
    }

    echo $comments;
?>

