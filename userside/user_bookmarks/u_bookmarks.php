<?php
    include("../../navbar.php");

    if(isset($_GET["category"])){
        $category = $_GET["category"];
    }



    $name = "";
    $profpic = "";


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
    }else{
        // Redirect to the login page
       echo "<script>window.location.href='/tourism_information_system/index.php?not_logged_in=true';</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="u_bookmarkstyle.css">
    <title>Bookmarks</title>
</head>
<body>
    <!--header-->
    <?php include_once("../../header.php"); ?>

    <div class="container fluid">
        <div class="contentdiv">
        <br>
            <div class="row" id="title_div">
                <div class="col-sm-6">
                    <h1 id="page-title">Bookmarks</h1>
                </div>
            </div>
            <div class="bookmarks_menudiv">
                <table id="tbl_d_menu">
                    <tr>
                        <td><a href="/tourism_information_system/userside/user_bookmarks/u_bookmarks.php?category=Destinations" style=' 
                        <?php if($category =="Destinations"){ echo "color: #00bd1c;"; } ?>'>Destinations</a></td>
                        <td><a href="/tourism_information_system/userside/user_bookmarks/u_bookmarks.php?category=Events" style=' 
                        <?php if($category =="Events"){ echo "color: #00bd1c;"; } ?>'>Events</a</td>
                        <td><a href="/tourism_information_system/userside/user_bookmarks/u_bookmarks.php?category=News" style=' 
                        <?php if($category =="News"){ echo "color: #00bd1c;"; } ?>'>News</a></td>
                        <td><a href="/tourism_information_system/userside/user_bookmarks/u_bookmarks.php?category=Travel Tips" style=' 
                        <?php if($category =="Travel Tips"){ echo "color: #00bd1c;"; } ?>'>Travel Tips</a></td>
                        <td><a href="/tourism_information_system/userside/user_bookmarks/u_bookmarks.php?category=Travel Guidelines" style=' 
                        <?php if($category =="Travel Guidelines"){ echo "color: #00bd1c;"; } ?>'>Travel Guidelines</a></td>
                    </tr>
                </table>
            </div>

            <div class="result_div">
                <div class="row">
                    <?php 
                    
                    if($category == "Destinations"){
                        include_once("bookmark_destinations.php");
                    }else if($category == "Events"){
                        include_once("bookmark_events.php");
                    }else if($category == "News"){
                        include_once("bookmark_news.php");
                    }else if($category == "Travel Tips"){
                        include_once("bookmark_tips.php");
                    }else if($category == "Travel Guidelines"){
                        include_once("bookmark_guidelines.php");
                    }
                
                    ?>
                </div>
            </div>

            
         
            



        </div>
        <br><br>
    </div>

    <br><br>
</body>
    <script src="u_bookmarkscript.js"></script>
</html>