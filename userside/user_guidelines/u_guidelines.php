<?php
    include("../../navbar.php");

    if(isset($_GET["guidelines_id"])){
        $guidelines_id = $_GET["guidelines_id"];
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
    $img_guidelines = "";
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
    <link rel="stylesheet" href="u_guidelinestyle.css">
    <title>Travel Guidelines</title>
</head>
<body>
    <!--header-->
    <?php include_once("../../header.php"); ?>

    <div class="container fluid">
        <div class="contentdiv">
        <br>
            <div class="row" id="title_div">
                <div class="col-sm-6">
                    <h1 id="page-title"><a href="u_guidelines.php">Travel Guidelines</a></h1>
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

            <div class="guidelines_menudiv">
                <table id="tbl_d_menu">
                    <tr>
                        <td><a href="/tourism_information_system/userside/user_guidelines/u_guidelines.php" style="color: #00bd1c; ">Travel Guidelines</a</td>
                        <td><a href="/tourism_information_system/userside/user_hotlines/u_hotlines.php">Hotlines</a</td>
                        <td><a href="/tourism_information_system/userside/user_hospitals/u_hospitals.php">Hospitals</a></td>
                        <td><a href="">Stores</a></td>
                    </tr>
                </table>
            </div>

            <div class="result_guidelinesdiv" style='<?php 
                if(isset($_GET["guidelines_id"])){
                    echo "display: none";
                }else{
                    echo "display: block";
                }
            
            ?>'>
                
                    <?php 
                        if(isset($_GET["municipality"])){
                            $result = $conn->query("select * from tbl_guidelines where admin_id = '$_GET[municipality]' order by fld_datetime DESC");
                        }else{
                            $result = $conn->query("select * from tbl_guidelines order by fld_datetime DESC");
                        }
                        
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='row'>
                                    <div class='guidelines_container'>
                                        <div class='shortcutsdiv' >";
                                        
                                        echo "<div class='centeredtxt'>
                                                <h4 class='guidelines_title'>{$row['fld_title']}</h4>";
                                                $date = date_create("{$row["fld_datetime"]}");
                                                $date_time = date_format($date,"F j, Y h:i A");
                                        echo "<span class='guidelines_date'>$date_time</span>
                                                </div>
                                        </div><br>
                                        <button type='button' class='btn_more' guidelines_id='$row[id]'><span id='txt_more'>View Full Details</span><img id='more_icon' src='/tourism_information_system/btn_icons/more_icon.png'/></button>
                                    </div>
                                </div>";
                            
                        }
                        
                    ?>
                
            </div>

            <div class="n_guidelinesdiv" style='<?php 
            if(isset($_GET["guidelines_id"])){
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
                        <img  class='btn_bookmark' guidelines_id='<?php echo $guidelines_id?>' title='Add to Bookmark' src=
                            <?php 
                            $resultCheck = $conn->query("select * from tbl_bookmarks where user_id='$user_id' and guidelines_id='$guidelines_id'") ;

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
                            $result = $conn->query("select tbl_admin.fld_name, tbl_guidelines.id, tbl_guidelines.fld_title, tbl_guidelines.fld_datetime, tbl_guidelines.fld_images, tbl_guidelines.fld_content from tbl_guidelines, tbl_admin where tbl_guidelines.admin_id = tbl_admin.id and tbl_guidelines.id = '$guidelines_id'");

                            while($row = $result->fetch_assoc()){
                                $date = date_create($row["fld_datetime"]);
                                    $date_time = date_format($date,"F j, Y h:i:s A");
                                    if(!empty($row["fld_images"])){
                                        $img_guidelines = explode(",", $row['fld_images']);
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
                            echo "<p class='guidelines_content'>". nl2br($content) ."</p>";
                        ?>
                </div>
                <br>
                <div class="row">
                    <?php 
                        
                        if(!empty($img_guidelines)){
                            $counter = 0;
                            foreach ($img_guidelines as $values) {
                                if ($counter % 3 === 0) {
                                    echo "</div><div class='row'>";
                                }
                                echo "<div class='guidelines_imagesdiv col-md-4'>";
                                echo "<img src='/tourism_information_system/adminside/guidelines/uploaded_otherimages/" . "$values' alt='Image' class='img_guidelines'>";
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
    <!--footer-->
</body>
    <script src="u_guidelinescript.js"></script>
</html>