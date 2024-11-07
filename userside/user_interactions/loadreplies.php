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

    $query = "select * from tbl_replies where comment_id=".intval($_REQUEST["comment_id"]);

    $result = mysqli_query($conn,$query) or die(mysqli_error($conn));

    $replies = "";

    while($row = mysqli_fetch_assoc($result)){
        $getUserQuery = "select * from tbl_users where id=". intval($row["user_id"]);
        $resultGetUser = mysqli_query($conn,$getUserQuery) or die(mysqli_error($conn));
        while($row2 = mysqli_fetch_assoc($resultGetUser)){
            $writer_profpic = '/tourism_information_system/userside/img_profile/'.$row2["fld_profpic"];
            $writer_username = $row2["fld_username"];
            $writer_name = $row2["fld_name"];
            $writer_id = $row2["id"];
        }


        $date = date_create($row["fld_datetime"]);
        $date_time = date_format($date,"F j, Y h:i:s A");

        $replies .= "<div class='i_replies'>
                        <table>
                            <tr>
                                <td>";

                                $resultwriterid = $conn->query("select * from tbl_stories where id='".intval($_REQUEST["story_id"])."'");

                                while($rowwriter = $resultwriterid->fetch_assoc()){
                                    $writer_id_comment = $rowwriter["writer_id"];
                                }

                                if($writer_id_comment == $user_id){
                                    $replies .= "<img  class='btn_deletereply' comment_id=$_REQUEST[comment_id] delete_id=$row[id] src='/tourism_information_system/btn_icons/delete2_icon.png' title='Delete Reply'/>";
                                }
                                
                                $replies .= "</td>
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
                           
                        </table>
                      
                        
                        <br>
                    </div>";
    }

    echo $replies;
?>
