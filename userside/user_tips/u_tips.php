<?php
    include("../../navbar.php");

    if(isset($_GET["tips_id"])){
        $tips_id = $_GET["tips_id"];
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
    $i_category = "";
    $date_time = "";
    $img_tips = "";
    $content = "";
    $user_id = "";
    $username = "";


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
    <link rel="stylesheet" href="u_tipstyle.css">
    <title>Travel Tips</title>
</head>
<body>
    <!--header-->
    <?php include_once("../../header.php"); ?>

    <div class="container fluid">
        <div class="contentdiv">
        <br>
            <div class="row" id="title_div">
                <div class="col-sm-6">
                    <h1 id="page-title"><a href="/tourism_information_system/userside/user_tips/u_tips.php">Travel Tips</a></h1>
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

            <div class="result_tipsdiv" style='<?php 
                if(isset($_GET["tips_id"])){
                    echo "display: none";
                }else{
                    echo "display: block";
                }
            
            ?>'>
                
                    <?php 
                        
                        if(isset($_GET["municipality"])){
                            $result = $conn->query("select * from tbl_tips where admin_id = '$_GET[municipality]' order by fld_datetime DESC");
                        }else{
                            $result = $conn->query("select * from tbl_tips order by fld_datetime DESC");
                        }
                        
                        
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='row'>
                                    <div class='tips_container'>
                                        <div class='shortcutsdiv' >";
                                        
                                        echo "<div class='centeredtxt'>
                                                <h4 class='tips_title'>{$row['fld_title']}</h4>";
                                                $date = date_create("{$row["fld_datetime"]}");
                                                $date_time = date_format($date,"F j, Y h:i A");
                                        echo "<span class='tips_date'>$date_time</span>
                                                </div>
                                        </div><br>
                                        <button type='button' class='btn_more' tips_id='$row[id]'><span id='txt_more'>View Full Details</span><img id='more_icon' src='/tourism_information_system/btn_icons/more_icon.png'/></button>
                                    </div>
                                </div>";
                            
                        }
                        
                    ?>
                
            </div>

            <div class="n_tipsdiv" style='<?php 
            if(isset($_GET["tips_id"])){
                echo "display: block";
            }else{
                echo "display: none";
            }
            ?>'>
                <table width="100%">
                    <tr>
                        <td>
                        <button type="button" class="btn_back" id="btn_back"><img id='back_icon' src='/tourism_information_system/btn_icons/back_icon.png'/><span id="txt_back">Back</span></button>
                        </td>
                        <td style="text-align: right;">
                        <img  class='btn_bookmark' tips_id='<?php echo $tips_id?>' title='Add to Bookmark' src=
                            <?php 
                            $resultCheck = $conn->query("select * from tbl_bookmarks where user_id='$user_id' and tips_id='$tips_id'") ;

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
                            $result = $conn->query("select tbl_admin.fld_name, tbl_tips.id, tbl_tips.fld_title, tbl_tips.fld_datetime, tbl_tips.fld_images, tbl_tips.fld_content from tbl_tips, tbl_admin where tbl_tips.admin_id = tbl_admin.id and tbl_tips.id = '$tips_id'");

                            while($row = $result->fetch_assoc()){
                                $date = date_create($row["fld_datetime"]);
                                    $date_time = date_format($date,"F j, Y h:i:s A");
                                    if(!empty($row["fld_images"])){
                                        $img_tips = explode(",", $row['fld_images']);
                                    }
                                    $content = $row["fld_content"];
                                   

                                echo "<h1 class='txt_headline'>$row[fld_title]</h1>
                                <h5 class='txt_publish'>Published by: $row[fld_name] - $date_time</h5>";
                            }
                        ?>
                    </div>
                </div>

                <br>
                <div class="row">
                        <?php 
                            echo "<p class='tips_content'>". nl2br($content) ."</p>";
                        ?>
                </div>
                <br>
                <div class="row">
                    <?php 
                        
                        if(!empty($img_tips)){
                            $counter = 0;
                            foreach ($img_tips as $values) {
                                if ($counter % 3 === 0) {
                                    echo "</div><div class='row'>";
                                }
                                echo "<div class='tips_imagesdiv col-md-4'>";
                                echo "<img src='/tourism_information_system/adminside/tips/uploaded_otherimages/" . "$values' alt='Image' class='img_tips'>";
                                echo "</div>";
                                $counter++;
                            }
                        }

                    ?>
                </div>
            

            </div>



        </div>
        <br><br>
    </div>

    <br><br>
</body>
    <script src="u_tipscript.js"></script>
</html>