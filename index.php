<?php
    include("navbar.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>FordaTravel</title>
</head>
<body>
    <!--header-->
    
    <?php 
        include_once("header.php");
    ?>
<div id="container">
<br>
    <div class="slideshow-container">
        <div class="overlay_slideimages">
            <div class="center_container">
                <h3 class="centersubtitle">Unleashing Seamless Travel Experiences with</h3>
                <h1 id="centertitle">FordaTravel</h1>
                <h3 class="centersubtitle">Crafting Adventures, One Content at a Time.</h3><br>
                <a href="#container_content_div"><button type="button" id="btn_content">See Content</button></a>
            </div>
        </div>

        <?php
            $result = $conn->query("select * from tbl_destinations");
            

            while($row = $result->fetch_assoc()){
                $img_destinations = explode(",", $row["fld_images"]);
                $imageURL = '/tourism_information_system/adminside/destinations/uploaded_otherimages/';
                foreach($img_destinations as $values){
            
                    echo "<div class='mySlides'>
                    <img src='$imageURL" . "$values' alt='Image' class='uploaded_images'>
                    </div>";
                    
                }
            }
            ?>
    </div>

    

    <!--contents-->
    <div class="container_index" id="container_content_div">
    

        <div class="contentdiv">
            

            <br><br><br>
            
            <!--destination shortcuts btn-->
            <h1 class="contenttitle">Where to Next?</h1>
                <div class="destination_nav_div">
                    <table class="destination_nav">
                        <tr>
                            <td>
                                <div class="shortcutsdiv">
                                <a href="/tourism_information_system/userside/user_destinations/user_destinations.php?destination_type=Hotel">
                                    <img src="./img_shortcuts/hotel.jpg" class="btn_shortcuts" >
                                    <div class="overlay">
                                    <div class="centeredtxt">Hotels</div>
                                    </div>
                                    
                                </a>
                                </div>
                            </td>
                            <td>
                                <div class="shortcutsdiv">
                                <a href="/tourism_information_system/userside/user_destinations/user_destinations.php?destination_type=Resort">
                                    <img src="./img_shortcuts/resort.jpg" class="btn_shortcuts" >
                                    <div class="overlay">
                                    <div class="centeredtxt">Resorts</div>
                                    </div>
                                    
                                </a>
                                </div>
                            </td>
                            <td>
                                <div class="shortcutsdiv">
                                <a href="/tourism_information_system/userside/user_destinations/user_destinations.php?destination_type=Restaurant">
                                    <img src="./img_shortcuts/restaurant.jpeg" class="btn_shortcuts" >
                                    <div class="overlay">
                                    <div class="centeredtxt">Restaurants</div>
                                    </div>
                                    
                                </a>
                                </div>
                            </td>
                            <td>
                                <div class="shortcutsdiv">
                                <a href="/tourism_information_system/userside/user_destinations/user_destinations.php?destination_type=Historical Landmark">
                                    <img src="./img_shortcuts/historical.jpg" class="btn_shortcuts" >
                                    <div class="overlay">
                                    <div class="centeredtxt">Historical Landmarks</div>
                                    </div>
                                    
                                </a>
                                </div>
                            </td>
                            <td>
                                <div class="shortcutsdiv">
                                <a href="/tourism_information_system/userside/user_destinations/user_destinations.php?destination_type=Museum">
                                    <img src="./img_shortcuts/museum.jpg" class="btn_shortcuts">
                                    <div class="overlay">
                                    <div class="centeredtxt">Museums</div>
                                    </div>
                                    
                                </a>
                                </div>
                            </td>
                            <td>
                                <div class="shortcutsdiv">
                                <a href="/tourism_information_system/userside/user_destinations/user_destinations.php?destination_type=Natural Wonder">
                                    <img src="./img_shortcuts/natural.jpg" class="btn_shortcuts" >
                                    <div class="overlay">
                                    <div class="centeredtxt">Natural Wonders</div>
                                    </a>
                                    </div>
                                    
                                </div>
                            </td>
                            <td>
                                <div class="shortcutsdiv">
                                <a href="/tourism_information_system/userside/user_destinations/user_destinations.php?destination_type=Pasalubong Center">
                                    <img src="./img_shortcuts/pasalubong.jpg" class="btn_shortcuts" >
                                    <div class="overlay">
                                    <div class="centeredtxt">Pasalubong Centers</div>
                                    </div>
                                    
                                </a>
                                </div>
                            </td>
                        </tr>
                    </table>

                </div>
                
                <br>
                <div class="slidediv">
                    <button id="slideLeft_d" class="btn_slide" type="button">Previous</button>
                    <button id="slideRight_d" class="btn_slide" type="button">Next</button>

                    
                
                </div>
                <br><br><br>
                <!--events shortcut btn-->
                <h1 class="contenttitle">Events</h1>
                <div class="row event_nav_div" style="padding: 6px;">

                    <div class="col-lg">
                        <div class="shortcutsdiv_e">
                        <a href="/tourism_information_system/userside/user_events/u_events.php?event_type=Festival">
                            <img src="./img_shortcuts/festival.jpg" class="btn_shortcuts" >
                            <div class="overlay">
                            <div class="centeredtxt">Festivals</div>

                            </div>
                        </a>
                        </div>
                    </div>

                    <div class="col-lg">
                        <div class="shortcutsdiv_e">
                        <a href="/tourism_information_system/userside/user_events/u_events.php?event_type=Fiesta">
                            <img src="./img_shortcuts/feast.jpg" class="btn_shortcuts" >
                            <div class="overlay">
                            <div class="centeredtxt">Fiesta</div>
                            </div>
                        </a>
                        </div>
                    </div>

                    <div class="col-lg">
                        <div class="shortcutsdiv_e">
                        <a href="/tourism_information_system/userside/user_events/u_events.php?event_type=Others">
                            <img src="./img_shortcuts/otherevents.jpg" class="btn_shortcuts" >
                            <div class="overlay">
                            <div class="centeredtxt">Others</div>
                            </div>
                        </a>
                        </div>
                    </div>
                </div>
                <br>
                <div class="btndiv">
                <a href="/tourism_information_system/userside/user_events/u_events.php">
                    <button type="button" class="btn_viewAll" id="btn_viewAllEvents">View All Events</button>
                </a>
                </div>
                <br><br><br>
                <!--top stories-->
                <h1 class="contenttitle">Latest Stories</h1>
                <div class="row" style="padding: 6px;"> 
                    <div id="storiescontainer">
                        <div id="load_stories_div">
                            <?php 
                                $result = $conn->query("select * from tbl_stories order by fld_date DESC LIMIT 1");

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
                                                    <td><img src='$writer_profpic' alt='Image' id='mini_storydp'><br><br></td>
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
                                                                <video class='storyvideos' controls>
                                                                    <source src='$imageURL"."$values' type='video/mp4'>
                                                                </video>
                                                                </div>
                                                                ";
                                                            }else{
                                                                echo "<br><div class='col-sm'>
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
                                        </div>";
                                    }
                                
                                
                            ?>
                    </div>
                </div>
                <!--DDED-->
                </div>
                <br>
                <div class="btndiv">
                <a href="/tourism_information_system/userside/userstories/userstories.php">
                    <button type="button" class="btn_viewAll" id="btn_viewAllStories">Read More</button>
                </a>
                </div>
                <br><br><br>
                <!--News-->
                <h1 class="contenttitle">Latest News</h1>
                <div class="row" style="padding: 6px;"> 
                    <div class="result_newsdiv">
                        <div class="row">
                            <?php 
                                
                            
                                    $result = $conn->query("select * from tbl_news order by fld_datetime DESC LIMIT 3");
                                
                                
                                    
                                $numColumns = 3;
                                $columnData = array_fill(0, $numColumns, []);
            
                                if ($result->num_rows > 0) {
                                    $columnIndex = 0;
                                    while ($row = $result->fetch_assoc()) {
                                        $columnData[$columnIndex][] = $row;
                                        $columnIndex = ($columnIndex + 1) % $numColumns;
                                        
                                    }
                                }
            
                                for ($i = 0; $i < $numColumns; $i++) {
                                    echo "<div class='col-lg'>";
                                    foreach ($columnData[$i] as $row) {
                                
            
                                        echo "<div class='news_container' news_id='{$row['id']}' news_category='{$row['fld_category']}'>
                                            <div class='newsshortcutsdiv' >";
                                            if(!isset($news_category)){
                                                if("{$row["fld_category"]}" == "News Info"){
                                                    echo "<div class='category_newsinfo'>NEWS INFO</div>";
                                                }elseif("{$row["fld_category"]}" == "Business"){
                                                    echo "<div class='category_business'>BUSINESS</div>";
                                                }elseif("{$row["fld_category"]}" == "Lifestyle"){
                                                    echo "<div class='category_lifestyle'>LIFESTYLE</div>";
                                                }elseif("{$row["fld_category"]}" == "Entertainment"){
                                                    echo "<div class='category_et'>ENTERTAINMENT</div>";
                                                }elseif("{$row["fld_category"]}" == "Technology"){
                                                    echo "<div class='category_tech'>TECHNOLOGY</div>";
                                                }
                                            }
                                            
                                            echo "<img src='/tourism_information_system/adminside/news/uploaded_mainimages/{$row['fld_mainimage']}' alt='Image' class='mainImage'>
                                                <div class='newscenteredtxt'>
                                                    <h4 class='news_title'>{$row['fld_title']}</h4>";
                                                    $date = date_create("{$row["fld_datetime"]}");
                                                    $date_time = date_format($date,"F j, Y h:i A");
                                            echo "<span class='news_date'>$date_time</span>
                                                    </div>
                                            </div>
                                        </div>";
                                    }
                                    echo "</div>";
                                }
                            
                            ?>
                        </div>
                    </div>
                </div>
                <br>
                <div class="btndiv">
                <a href="/tourism_information_system/userside/user_news/u_news.php">
                    <button type="button" class="btn_viewAll" id="btn_viewAllNews">Read More</button>
                </a>
                </div>
                <br><br><br>
                <!--Travel tips-->
                <h1 class="contenttitle">Travel Tips</h1>
                <div class="row" style="padding: 6px;">
                <div class="result_tipsdiv">
                        <div class="row">
                            <?php 
                                
                            
                                    $result = $conn->query("select * from tbl_tips order by fld_datetime DESC LIMIT 3");
          
                                $numColumns = 3;
                                $columnData = array_fill(0, $numColumns, []);
            
                                if ($result->num_rows > 0) {
                                    $columnIndex = 0;
                                    while ($row = $result->fetch_assoc()) {
                                        $columnData[$columnIndex][] = $row;
                                        $columnIndex = ($columnIndex + 1) % $numColumns;
                                        
                                    }
                                }
            
                                for ($i = 0; $i < $numColumns; $i++) {
                                    echo "<div class='col-lg'>";
                                    foreach ($columnData[$i] as $row) {
                                
            
                                        echo "<div class='tips_container' tips_id='{$row['id']}'>
                                            <div class='tipsshortcutsdiv' >";
                                            
                                            echo "<div class='tipscenteredtxt'>
                                                    <h4 class='tips_title'>{$row['fld_title']}</h4>";
                                                    $date = date_create("{$row["fld_datetime"]}");
                                                    $date_time = date_format($date,"F j, Y h:i A");
                                            echo "<span class='tips_date'>$date_time</span>
                                                    </div>
                                            </div>
                                        </div>";
                                    }
                                    echo "</div>";
                                }
                            
                            ?>
                        </div>
                    </div>
                </div>
                <br>
                <div class="btndiv">
                <a href="/tourism_information_system/userside/user_tips/u_tips.php">
                    <button type="button" class="btn_viewAll" id="btn_viewAllTips">Read More</button>
                </a>
                </div>
        </div>
        
    </div>
    <br><br>
    
    

    <!--modal for user login-->
    <div id="user_login_modal" style="
    <?php 
        if(isset($_GET['not_logged_in'])){
            echo 'display: flex';
        }else{
            echo 'display:none';
        }
    ?>">
        <div id="user_login_div">

            <div class="container fluid">
                <form onload="return false;">
                    <h2 style="text-align: center;">Login to your account</h2><br>
                    <table width="100%">
                        <tr class="login_row">
                            <td class="login_col"><span class="login_icon glyphicon glyphicon-user"></span></td>
                            <td class="login_col"><input type="text"  class="txt_login" name="txt_username" id="txt_username" placeholder="Username"></td>
                        </tr>
                        <tr class="login_row">
                            <td class="login_col"><span class="login_icon glyphicon glyphicon-lock"></span></td>
                            <td class="login_col"><input type="password"  class="txt_login" name="txt_password" id="txt_password" placeholder="Password"></td>
                        </tr>
                        <tr>
                            
                            <td colspan="2">
                            <div class="row">
                                <div class="col-lg" style="padding: 2px;">
                                <button type="button" class="btn btn-success" id="btn_loginuser">Login Account</button>
                                </div>
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <table width="100%">
                                <tr>
                                    <td width="15%" ><hr></td><td width="70%" align="center">or create new account as</td><td width="15%"><hr></td>
                                </tr>
                                </table>
                            </td>
                        </tr>
                        <tr >
                            <td colspan="2">
                            <div class="row">
                                <div class="col-lg-6" style="padding: 2px;">
                                <button type="button" class="btn btn-success btn_newacc" id="btn_newuser">User</button>
                                </div>
                                <div class="col-lg-6" style="padding: 2px;">
                                <button type="button" class="btn btn-success btn_newacc" id="btn_newuseradmin">Municipality or Business</button>
                                </div>
                                </div>
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center;">
                                <br><br>
                                <a href="forgetpass.php" target="_blank"><span id="btn_fpw">Forget password?</span></a>
                            </td>
                        </tr>
                    </table>
                </form>
                
                

            </div>
        </div> 
    </div>

    <!--footer-->
    <?php include("footer.php"); ?>

    </div>

</body>
    <script src="script.js"></script>
</html>