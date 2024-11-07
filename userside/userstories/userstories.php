<?php
    include("../../navbar.php");

    $name = "";
    $profpic = "";
    $user_profpic="";
    $about = "";
    $searchstory="";
    $username = "";
    $user_id = "";

    if(isset($_GET["searchstory"])){
        $searchstory=$_GET["searchstory"];
    }

   


    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $user_id = $_SESSION['user_id'];

        $result = $conn -> query("select * from tbl_users where fld_username like '$username'");
        while($row = $result->fetch_assoc()){
            if($row["fld_name"] == ""){
                $name = "";
                $about = "";
            }else{
                $name = $row["fld_name"];
                $profpic = '../img_profile/'.$row["fld_profpic"];
                $about = $row["fld_about"];
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
    <link rel="stylesheet" href="userstoriesstyle.css">
    <title>Stories</title>
</head>
<body>
    <!--header-->
    <?php include_once("../../header.php"); ?>
    

    <!--stories-->
    <div class="container fluid">
        <div class="contentdiv">
            <br>
            <div class="row" id="title_div">
                <div class="col-sm-2 story_header">
                    <h1 id="page-title"><a id="btn_restartstory">Our Stories</a></h1>
                </div>
                <div class="col-sm-6 story_header">
                    <div class="searchdiv_story">
                        <div id="search_story">
                            <span class="glyphicon glyphicon-search">&nbsp;&nbsp;</span><input type="text" name="txt_search_story" id="txt_search_story" autocomplete="off" placeholder="Search story "> 
                        
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 story_header">
                    <div class="sortdiv">
                        <div id="sort">
                            <button type="button" id="btn_sort"><img id='trending_icon' src='/tourism_information_system/btn_icons/trending_icon.png'/><span id="txt_trending">See What's Trending</span></button>
                        </div>
                    </div>
                </div>
            </div>
        
            
            
            <div id="storiescontainer">
                <div id="load_stories_div">
                        
                </div>
            </div>
        </div>

    </div>

     <!--add story modal-->
     <?php 
      include_once("../user_interactions/modal_addstory.php");
    ?>
    
    <!--modal for adding comment-->
    <?php 
      include_once("../user_interactions/modal_addcomment.php");
    ?>

    <!--modal for share external-->
    <?php 
      include_once("../user_interactions/modal_sharediv.php");
    ?>

    <!--modal for view image modal-->
    <?php 
      include_once("../../viewimage_modal.php");
    ?>

    <!--add story button-->
    <button type="button" id="btn_addstory" title="Add New Story"><img id='addstory_icon' src='/tourism_information_system/btn_icons/add_story_icon.png'/></button>

    <br><br>
    
</body>
    <script src="userstoriesscript.js"></script>
</html>