<?php
    include("../../navbar.php");

    if(isset($_GET["event_type"])){
        $event_type = $_GET["event_type"];
    }

    if(isset($_GET["event_id"])){
        $event_id = $_GET["event_id"];
    }

    $municipal_name = "";

    if(isset($_GET["municipality"])){
        $d_admin_id = $_GET["municipality"];

        $result = $conn->query("select * from tbl_admin where id = '$d_admin_id'");
        while($row=$result->fetch_assoc()){
            $municipal_name = $row["fld_name"];
        }
    }

    

    $name = "";
    $profpic = "";
    $user_profpic="";

    $status="";
    $content="";
    $location="";
    $f_startdate="";
    $f_enddate="";
    $f_pdate="";
    $img_events="";
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
                $user_profpic = '../img_profile/'.$row["fld_profpic"];
            }
            
            
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="u_events.css">
    <title>Events</title>
</head>
<body>
    <!--header-->
    <?php include_once("../../header.php"); ?>

    <div class="container fluid">
        <div class="contentdiv">
        <br>
            <div class="row" id="title_div">
                <div class="col-sm-6">
                    <h1 id="page-title"><a href="/tourism_information_system/userside/user_events/u_events.php">Events</a></h1>
                </div>
                <div class="col-sm-6">
                    <div class="searchdiv_m">
                            <div id="search_m">
                                <span class="glyphicon glyphicon-search">&nbsp;&nbsp;</span><input type="text" name="txt_search_m" id="txt_search_m" autocomplete="off" placeholder="Search Municipality " value ='<?php echo $municipal_name;?>'> 
                                <div id="search_result_m"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="events_menudiv">
                <table id="tbl_d_menu">
                    <tr>
                        <td><a href="/tourism_information_system/userside/user_events/u_events.php?event_type=Festival" style=' 
                        <?php if($event_type =="Festival"){ echo "color: #00bd1c;"; } ?>'>Festivals</a></td>
                        <td><a href="/tourism_information_system/userside/user_events/u_events.php?event_type=Fiesta" style=' 
                        <?php if($event_type =="Fiesta"){ echo "color: #00bd1c;"; } ?>'>Fiesta</a</td>
                        <td><a href="/tourism_information_system/userside/user_events/u_events.php?event_type=Others" style=' 
                        <?php if($event_type =="Others"){ echo "color: #00bd1c;"; } ?>'>Others</a></td>
                        
                    </tr>
                </table>
            </div>

            <div class="result_eventsdiv" style='<?php 
                if(isset($_GET["event_id"])){
                    echo "display: none";
                }else{
                    echo "display: block";
                }
            
            ?>'>
                <div class="eventscontainer">
                    <div id="load_events_div">
                    <?php 
                    $status="";

                    if(isset($event_type) && empty($_GET["municipality"])){
                        $result = $conn->query("select * from tbl_events where fld_type like '$event_type' order by fld_datetime DESC");
                    }else if(empty($event_type) && isset($_GET["municipality"])){
                        $result = $conn->query("select * from tbl_events where admin_id = '$_GET[municipality]' order by fld_datetime DESC");
                    }else if(isset($event_type) && isset($_GET["municipality"])){
                        $result = $conn->query("select * from tbl_events where admin_id = '$_GET[municipality]' and fld_type like '$event_type' order by fld_datetime DESC");
                    }else{
                        $result = $conn->query("select * from tbl_events order by fld_datetime DESC");
                    }

                    while($row = $result->fetch_assoc()){
                        $content = $row["fld_content"];
                        $preview = substr($content, 0, 500);

                        $currentDate = date("Y-m-d");
                        $startdate = $row["fld_startdate"];
                        $enddate = $row["fld_enddate"];

                        if($currentDate < $startdate){
                            $status = "<span id='status_nys'>Event not yet started</span>";
                        }elseif($currentDate > $enddate){
                            $status = "<span id='status_f'>Event Finished</span>";
                        }else{
                            $status = "<span id='status_o'>Event Ongoing</span>";
                        }

                        echo "<div class='i_event'>
                            <div class='row'>
                                <div class='i_event_img col-sm-4'>
                                    <img src='/tourism_information_system/adminside/events/uploaded_mainimages/{$row['fld_mainimage']}' alt='Image' class='mainImage'>
                                </div>
                                <div class='i_event_info col-sm-8'>
                                    <h2><b>$row[fld_title]</b></h2>";

                                    if(!isset($_GET["event_type"])){
                                        echo "<h4>$row[fld_type]</h4>";
                                    }

                                echo "$status<br><br><br>
                                <p class='d_content'>$preview...</p><br>
                                <button type='button' class='btn_more' event_id='$row[id]' event_type='$row[fld_type]'><span id='txt_more'>View Full Details</span><img id='more_icon' src='/tourism_information_system/btn_icons/more_icon.png'/></button>
                                </div>
                            </div>
                        </div>";
                    }
                    ?>
                    </div>
                </div>

            </div>

            <div class="n_eventsdiv" style='<?php 
            if(isset($_GET["event_id"])){
                echo "display: block";
            }else{
                echo "display: none";
            }
            ?>'>
                <div class="n_events">
                    <table width="100%">
                        <tr>
                            <td>
                                <button type="button" class="btn_back" id="btn_back" event_type='<?php echo $event_type?>' ><img id='back_icon' src='/tourism_information_system/btn_icons/back_icon.png'/><span id="txt_back">Back</span></button>
                            </td>
                            <td style="text-align: right;">
                            <img  class='btn_bookmark' event_id='<?php echo $event_id?>' title='Add to Bookmark' src=
                                <?php 
                                $resultCheck = $conn->query("select * from tbl_bookmarks where user_id='$user_id' and event_id='$event_id'") ;
                                $resultLikes = $conn->query("select * from tbl_bookmarks where event_id='$event_id'") ;

                                if(mysqli_num_rows($resultCheck) == 0){
                                    echo "'/tourism_information_system/btn_icons/bookmark_false.png'";
                                }else{
                                    echo "'/tourism_information_system/btn_icons/bookmark_true.png'";
                                }
                                ?>
                            
                                />
                            </td>
                        </tr>
                    </table>
                    
                    <div class="row">
                        <div class="col">
                            
                                <?php 
                                    $result = $conn->query("select tbl_admin.fld_name, tbl_events.id, tbl_events.fld_type, tbl_events.fld_title, tbl_events.fld_title, tbl_events.fld_location, tbl_events.fld_startdate, tbl_events.fld_enddate, tbl_events.fld_datetime, tbl_events.fld_mainimage, tbl_events.fld_images, tbl_events.fld_content from tbl_events, tbl_admin where tbl_events.admin_id = tbl_admin.id and tbl_events.id='$event_id'");

                                    while($row = $result->fetch_assoc()){
                                        $content = $row["fld_content"];
                                        $location = $row["fld_location"];
                                        $writer = $row["fld_name"];
                                        $pdate = $row["fld_datetime"];
                                        if(!empty($row["fld_images"])){
                                            $img_events = explode(",", $row['fld_images']);
                                        }

                                        $currentDate = date("Y-m-d");
                                        $startdate = $row["fld_startdate"];
                                        $enddate = $row["fld_enddate"];

                                        $c_startdate = date_create($startdate);
                                        $f_startdate = date_format($c_startdate,"F j, Y");

                                        $c_enddate = date_create($enddate);
                                        $f_enddate = date_format($c_enddate,"F j, Y");

                                        $c_pdate = date_create($pdate);
                                        $f_pdate = date_format($c_pdate,"F j, Y h:i:s A");

                                        if($currentDate < $startdate){
                                            $status = "<span id='status_nys'>Event not yet started</span>";
                                        }elseif($currentDate > $enddate){
                                            $status = "<span id='status_f'>Event Finished</span>";
                                        }else{
                                            $status = "<span id='status_o'>Event Ongoing</span>";
                                        }

                                        echo "<div id='d_title'>
                                        <h1><b>$row[fld_title]</b></h1>
                                        <h5>Published by: $writer </h5>
                                        <h5>$f_pdate </h5>
                                        </div>

                                        <div class='mainImagecontainer'>
                                            <img src='/tourism_information_system/adminside/events/uploaded_mainimages/{$row['fld_mainimage']}' alt='Image' class='i_mainImage'>
                                        </div>";

                                    }
                                ?>
                            
                        </div>
                    </div>
                    <br><br>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <?php 
                                echo "<table class='tb_info'>
                                    <tr>
                                        <td><b>Location: </b>&nbsp;&nbsp;</td>
                                        <td>$location</td>
                                    </tr>
                                    <tr>
                                        <td><b>Start Date: </b>&nbsp;&nbsp;</td>
                                        <td>$f_startdate</td>
                                    </tr>
                                    <tr>
                                        <td><b>End Date: </b>&nbsp;&nbsp;</td>
                                        <td>$f_enddate</td>
                                    </tr>
                                    <tr>
                                        <td><b>Status: </b>&nbsp;&nbsp;</td>
                                        <td>$status</td>
                                    </tr>
                                </table>
                                
                                <br>";
                            ?>
                        </div>
                    </div>
                    <table width="100%">
                        <tr>
                            <td width="35%" style="vertical-align: middle"><hr></td>
                            <td width="30%" align="center" style="vertical-align: middle"><h3><b>About</b></h3></td>
                            <td width="35%" style="vertical-align: middle"><hr></td>
                        </tr>
                    </table>
                            <br>
                    <div class="row">
                        <div class="col">
                            
                            <p class="d_content"><?php echo nl2br($content)?></p>
                        </div>
                    </div><br>
                    <hr>
                    <br>
                    <div class="row">
                    <?php 
                        
                        if(!empty($img_events)){
                            $counter = 0;
                            foreach ($img_events as $values) {
                                if ($counter % 3 === 0) {
                                    echo "</div><div class='row'>";
                                }
                                echo "<div class='event_imagesdiv col-md-4'>";
                                echo "<img src='/tourism_information_system/adminside/events/uploaded_otherimages/" . "$values' alt='Image' class='img_events'>";
                                echo "</div>";
                                $counter++;
                            }
                        }

                    
                    
                    ?>
                    </div>
                    
                    <br>
                </div>

                <div class="event_comment_div">
                    <h2><b>Comments</b></h2><br><br>
                    <form enctype="multipart/form-data" id="add_comment_form">
                            <table width="100%">
                                <input type="hidden" name="txt_event_id" id="txt_event_id" value="<?php echo $event_id;?>">
                                <tr>
                                    <td width="10%"><img src='<?php 
                                    if(!isset($_SESSION["user_id"])){
                                        echo "/tourism_information_system/img_shortcuts/noprofile.jpg";
                                    }else{
                                        echo $user_profpic;
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

                        <div id="view_comments_div">
                    
                        </div>

                    </div>
                    
                </div>
            </div>
            <br>
        </div>
    
    </div>
    
    <br><br>
</body>
    <script src="u_eventscript.js"></script>
</html>