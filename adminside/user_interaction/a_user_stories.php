<?php
    include("../navbar.php");
    
    if(isset($_GET['txtdel'])){
        $result = $conn->query("select tbl_users.fld_username, tbl_stories.id from tbl_users, tbl_stories where tbl_stories.id like '$_GET[txtdel]' and tbl_stories.writer_id = tbl_users.id");

        while($row = $result->fetch_assoc()){
            $conn->query("insert into a_activity_log(admin_id, fld_activity, fld_datetime)values('$admin_id', ' has remove a story [ ".$row['id']." ] of [ ".$row['fld_username']." ]', '$dateNow')");
        }
            
        $deleteuserstory = $conn->query("delete from tbl_replies where story_id like '$_GET[txtdel]'");
        $deleteuserstory = $conn->query("delete from tbl_comments where story_id like '$_GET[txtdel]'");
        $deleteuserstory = $conn->query("delete from tbl_stories where id like '$_GET[txtdel]'");

        if( $deleteuserstory){
            $statusMsg = 'Story Deleted Successfully.';
            echo "<script> alert('$statusMsg'); location.href='a_user_stories.php';</script>";
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="interaction_style.css">
    <title>Manage User Stories</title>
</head>
<body>
<div class="header" id="headercontainer">  
            <button type="button" class="btn btn-dark btn-lg" id="btn_menu"><span class="glyphicon glyphicon-menu-hamburger"></span></button>   
            <h2 id="headertitle">MANAGE USER STORIES</h2>
        </div>
    <div id="container">
         
        <br><br>
        
        <div class="storiesdiv">
            <!--search feature-->
            <div class="searchdiv">
                <form action="a_user_stories.php" method="get">
                    <table>
                        <tr>
                            <td style="padding-top: 3px;"><span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;<label> Search: </label>&nbsp;</td>
                            <td><input type="text" class="form-control" name="search_name" onchange="this.form.submit()"> </td>
                        </tr>
                    </table>
                    
                </form>
            </div>
            <br><br>

            <table class="table table-bordered">
                <tr>
                    <th>ID</th><th>Writer</th><th>Title</th><th>Content</th><th>Date</th><th>Comments</th><th></th><th></th>
                </tr>
                <?php
                    if(isset($_GET["search_name"])){
                       $result =  $conn->query("select tbl_users.fld_username, tbl_stories.id, tbl_stories.fld_title, tbl_stories.fld_content, tbl_stories.fld_storyimages, tbl_stories.fld_date from tbl_stories, tbl_users where tbl_stories.writer_id = tbl_users.id and (tbl_users.fld_username like '$_GET[search_name]%' or tbl_stories.id like '$_GET[search_name]%')");
                       
                    }else{
                       $result = $conn->query("select tbl_users.fld_username, tbl_stories.id, tbl_stories.fld_title, tbl_stories.fld_content, tbl_stories.fld_storyimages, tbl_stories.fld_date from tbl_stories, tbl_users where tbl_stories.writer_id = tbl_users.id order by tbl_stories.fld_date DESC");
                        
                    }

                    while($row = $result->fetch_assoc()){
                        echo "<tr>
                            <td>$row[id]</td>
                            <td>$row[fld_username]</td>
                            <td>$row[fld_title]</td>
                            <td>$row[fld_content]</td>
                            <td>$row[fld_date]</td>
                            <td>";
                            
                            $resultcomments = $conn->query("select * from tbl_comments where story_id ='$row[id]'");
                            $numcomments = mysqli_num_rows($resultcomments);

                            echo $numcomments;
                            
                            echo "</td>
                            <td><button type='button' class='btn btn-warning' onclick=viewstory('$row[id]')><span class='glyphicon glyphicon-resize-full'></span></button></td>
                            <td><button type='button' class='btn btn-danger' onclick=del_story('$row[id]')><span class='glyphicon glyphicon-trash'></span></button></td>
                        </tr>";
                    }
                    

                
                    
                ?>
            </table>
        </div>
    </div>

    <div class="modal" id="viewstory_modal" style="
        <?php
        if(isset($_GET["story_id"])){
            echo 'display:block;';
            $story_id= $_GET["story_id"]; 
        }else{
            echo 'display:none;';
        }
        ?>
        
        ">

        <div id="viewstory_div">
            <div id="load_story_div">
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
                                            <span id='story_datetime'>$date_time</span><br><br>
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

                                                $imageURL = "/tourism_information_system/userside/img_stories/";
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
                                    
                                    
                                </div>";
                        }
                ?>
                <br><hr> 
                <h5>COMMENTS</h5>
                <br>
                <div id="view_comments_div">
                
                </div>
            </div>
        </div>
    </div>
</body>
    <script src="interaction_script.js"></script>
</html>