<?php
    include("../../navbar.php");

    if(isset($_GET["destination_type"])){
        $destination_type = $_GET["destination_type"];
    }

    if(isset($_GET["destination_id"])){
        $destination_id = $_GET["destination_id"];
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
    $otherimg_destinations="";
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
    <link rel="stylesheet" href="u_destination.css">
    <title>Destinations</title>
</head>
<body>
    <!--header-->
    <?php include_once("../../header.php"); ?>

    <div class="container fluid">
        <div class="contentdiv">
            <br>
            <div class="row" id="title_div">
                <div class="col-sm-6">
                    <h1 id="page-title">
                    <span id="basedRating"><i class="bi bi-star-fill" <?php 
                    if(isset($_GET["destination_ratings"])){
                        echo "style='color: gold;'";
                    }
                    
                    ?>
                    ></i></span>
                        <a href="/tourism_information_system/userside/user_destinations/user_destinations.php">Destinations</a>
                    </h1>
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
            <div class="destinations_menudiv">
                <table id="tbl_d_menu">
                    <tr>
                        <td><a href="/tourism_information_system/userside/user_destinations/user_destinations.php?destination_type=Hotel" style=' 
                        <?php $pattern="/Hotel/i"; if(preg_match($pattern, $destination_type) == 1){ echo "color: #00bd1c;"; } ?>'>Hotels</a></td>
                        <td><a href="/tourism_information_system/userside/user_destinations/user_destinations.php?destination_type=Resort" style=' 
                        <?php $pattern="/Resort/i"; if(preg_match($pattern, $destination_type) == 1){ echo "color: #00bd1c;"; } ?>'>Resorts</a</td>
                        <td><a href="/tourism_information_system/userside/user_destinations/user_destinations.php?destination_type=Restaurant" style=' 
                        <?php $pattern="/Restaurant/i"; if(preg_match($pattern, $destination_type) == 1){ echo "color: #00bd1c;"; } ?>'>Restaurants</a></td>
                        <td><a href="/tourism_information_system/userside/user_destinations/user_destinations.php?destination_type=Historical Landmark" style=' 
                        <?php $pattern="/Historical Landmark/i"; if(preg_match($pattern, $destination_type) == 1){ echo "color: #00bd1c;"; } ?>'>Historical Landmarks</a></td>
                        <td><a href="/tourism_information_system/userside/user_destinations/user_destinations.php?destination_type=Museum" style=' 
                        <?php $pattern="/Museum/i"; if(preg_match($pattern, $destination_type) == 1){ echo "color: #00bd1c;"; } ?>'>Museums</a></td>
                        <td><a href="/tourism_information_system/userside/user_destinations/user_destinations.php?destination_type=Natural Wonder" style=' 
                        <?php $pattern="/Natural Wonder/i"; if(preg_match($pattern, $destination_type) == 1){ echo "color: #00bd1c;"; } ?>'>Natural Wonders</a></td>
                        <td><a href="/tourism_information_system/userside/user_destinations/user_destinations.php?destination_type=Pasalubong Center" style=' 
                        <?php $pattern="/Pasalubong Center/i"; if(preg_match($pattern, $destination_type) == 1){ echo "color: #00bd1c;"; } ?>'>Pasalubong Centers</a></td>
                    </tr>
                </table>
            </div>

            <div class="result_destinationsdiv" style='<?php 
                if(isset($_GET["destination_id"])){
                    echo "display: none";
                }else{
                    echo "display: block";
                }
            
            ?>'>
                <div class="row">
                    <?php 
                     if(isset($destination_type)){
                        if($destination_type == "Historical Landmark"){
                            echo "<div style='width: 100%; text-align: center;'>
                                        <a href='https://juanguide.com/juanguide-webar/index.html' target='_blank'><button type='button' id='btn_ar'>Experience Web AR Now</button></a>
                                    </div><br><br><br>";
                        }
                     }
                    
                    
                    if(isset($destination_type) && empty($_GET["destination_ratings"]) && empty($_GET["municipality"])){
                        $result = $conn->query("select * from tbl_destinations where fld_type like '%$destination_type%' order by id DESC");
                    }elseif(isset($_GET["destination_ratings"]) && empty($destination_type) && empty($_GET["municipality"])){
                        $result = $conn->query("
                        select tbl_destinations.id, tbl_destinations.admin_id, tbl_destinations.fld_name, tbl_destinations.fld_type, tbl_destinations.fld_description, tbl_destinations.fld_address, tbl_destinations.fld_longitude, tbl_destinations.fld_latitude, tbl_destinations.fld_contactno, tbl_destinations.fld_email, tbl_destinations.fld_price, tbl_destinations.fld_operating, tbl_destinations.fld_amenities, tbl_destinations.fld_roomfeats, tbl_destinations.fld_mainimage, tbl_destinations.fld_images, tbl_destinations.fld_socials,
                        (SELECT AVG(fld_locationrate + fld_cleanrate + fld_servicerate + fld_valuerate) / 4
                        FROM tbl_reviewsratings
                        WHERE tbl_reviewsratings.destination_id = tbl_destinations.id) AS average_rating
                        FROM tbl_destinations
                        order by average_rating DESC
                        ");

                    }elseif(isset($destination_type) && isset($_GET["destination_ratings"]) && empty($_GET["municipality"])){
                        $result = $conn->query("
                        select tbl_destinations.id, tbl_destinations.admin_id, tbl_destinations.fld_name, tbl_destinations.fld_type, tbl_destinations.fld_description, tbl_destinations.fld_address, tbl_destinations.fld_longitude, tbl_destinations.fld_latitude, tbl_destinations.fld_contactno, tbl_destinations.fld_email, tbl_destinations.fld_price, tbl_destinations.fld_operating, tbl_destinations.fld_amenities, tbl_destinations.fld_roomfeats, tbl_destinations.fld_mainimage, tbl_destinations.fld_images, tbl_destinations.fld_socials,
                        (SELECT AVG(fld_locationrate + fld_cleanrate + fld_servicerate + fld_valuerate) / 4
                        FROM tbl_reviewsratings
                        WHERE tbl_reviewsratings.destination_id = tbl_destinations.id) AS average_rating
                        FROM tbl_destinations
                        where tbl_destinations.fld_type like '%$destination_type%'
                        order by average_rating DESC
                        ");

                    }elseif(isset($_GET["municipality"]) && empty($_GET["destination_ratings"]) && empty($destination_type)){
                        $result = $conn->query("select * from tbl_destinations where admin_id = '$_GET[municipality]' order by id DESC");
                    }elseif(isset($_GET["municipality"]) && isset($destination_type) && empty($_GET["destination_ratings"])){
                        $result = $conn->query("select * from tbl_destinations where admin_id = '$_GET[municipality]' and tbl_destinations.fld_type like '%$destination_type%' order by id DESC");
                    }elseif(isset($_GET["municipality"]) && isset($_GET["destination_ratings"]) && isset($destination_type)){
                        $result = $conn->query("
                        select tbl_destinations.id, tbl_destinations.admin_id, tbl_destinations.fld_name, tbl_destinations.fld_type, tbl_destinations.fld_description, tbl_destinations.fld_address, tbl_destinations.fld_longitude, tbl_destinations.fld_latitude, tbl_destinations.fld_contactno, tbl_destinations.fld_email, tbl_destinations.fld_price, tbl_destinations.fld_operating, tbl_destinations.fld_amenities, tbl_destinations.fld_roomfeats, tbl_destinations.fld_mainimage, tbl_destinations.fld_images, tbl_destinations.fld_socials,
                        (SELECT AVG(fld_locationrate + fld_cleanrate + fld_servicerate + fld_valuerate) / 4
                        FROM tbl_reviewsratings
                        WHERE tbl_reviewsratings.destination_id = tbl_destinations.id) AS average_rating
                        FROM tbl_destinations
                        where admin_id = '$_GET[municipality]' and tbl_destinations.fld_type like '%$destination_type%'
                        order by average_rating DESC
                        ");

                    }else{
                        $result = $conn->query("select * from tbl_destinations order by id DESC");
                    }
                    
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
                        echo "<div class='col-sm'>";
                        foreach ($columnData[$i] as $row) {
                    

                            echo "<div class='destinations_container'>
                            <div class='shortcutsdiv' destination_id='{$row['id']}' destination_type='{$row['fld_type']}'>
                                <img src='/tourism_information_system/adminside/destinations/uploaded_mainimages/{$row['fld_mainimage']}' alt='Image' class='mainImage'>
                                <div class='overlay'>
                                <div class='centeredtxt'>{$row['fld_name']}</div>
                                </div>
                            </div>
                            </div>";
                        }
                        echo "</div>";
                    }
                
                    ?>
                </div>
            </div>
            
            <!--destination details-->
            <div class="n_destinationdiv" style='<?php 
                    $pattern_hw = "/historical landmark/i"; 
                    $pattern_museum = "/museum/i"; 
                    
                    if(isset($_GET["destination_id"]) and preg_match($pattern_hw, $_GET["destination_type"])  == false and preg_match($pattern_museum, $_GET["destination_type"])  == false){
                        echo "display: block";
                    }else{
                        echo "display: none";
                    }
    
            ?>'>
                <button type="button" class="btn_back" id="btn_back" destination_type='<?php echo $destination_type?>' ><img id='back_icon' src='/tourism_information_system/btn_icons/back_icon.png'/><span id="txt_back">Back</span></button>
                <div class="row">
                    <div class="col-sm">
                        <div class="slideshow-container">
                            <?php
                                $result = $conn->query("select * from tbl_destinations where id='$destination_id'");
                                

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
                    </div>
                    <div class="col-sm">
                        <div class="destination_infodiv">
                            <?php
                                $result = $conn->query("select * from tbl_destinations where id='$destination_id'");
                                
                                while($row = $result->fetch_assoc()){
                                    $socials = explode(",", $row["fld_socials"]);

                                    echo "<div class='row'>
                                                <div class='col-sm-12'>
                                                    <h1>
                                                    <img  class='btn_bookmark' destination_id='$destination_id' title='Add to Bookmark' src='";
                                                    $resultCheck = $conn->query("select * from tbl_bookmarks where user_id='$user_id' and destination_id='$row[id]'") ;
                                                    $resultLikes = $conn->query("select * from tbl_bookmarks where destination_id='$row[id]'") ;

                                                    if(mysqli_num_rows($resultCheck) == 0){
                                                        echo "/tourism_information_system/btn_icons/bookmark_false.png";
                                                    }else{
                                                        echo "/tourism_information_system/btn_icons/bookmark_true.png";
                                                    }
                                                


                                                    echo "' />
                                                    
                                                    <b>$row[fld_name]</b></h1>
                                                    
                                                
                                                    
                                                </div>
                                          </div>
                                          <div class='row'>
                                                <div class='col-sm-12'>
                                                    <h4><img class='icon_destinations' src='/tourism_information_system/btn_icons/price_icon.png'/> $row[fld_price]</h4>
                                                </div>
                                          </div>
                                          <div class='row'>
                                                <div class='col-sm-12'>
                                                    <h4><img class='icon_destinations' src='/tourism_information_system/btn_icons/operation_icon.png'/> $row[fld_operating]</h4>
                                                </div>
                                          </div>
                                          <div class='row'>
                                                <div class='col-sm-12'>
                                                    <h5><a href='/tourism_information_system/userside/user_destinations/user_destinations.php?view_gallery=true&destination_type=$row[fld_type]&destination_id=$row[id]>'>View Gallery</a></h5>
                                                </div>
                                          </div>
                                            <hr>
                                        
                                          <div class='row'>
                                                <div class='col-sm-12'>
                                                    <a href='https://maps.google.com/maps?q=$row[fld_latitude],$row[fld_longitude]' target='_blank'><img class='icon_destinations' src='/tourism_information_system/btn_icons/location_icon.png'/> $row[fld_address]</a><br><br>
                                                </div>
                                          </div>

                                          <div class='row'>
                                                <div class='col-sm-5'>
                                                    <img class='icon_destinations' src='/tourism_information_system/btn_icons/contact_icon.png'/> <a href='tel:$row[fld_contactno]'>$row[fld_contactno]</a><br><br>
                                                </div>
                                                <div class='col-sm-7'>
                                                    <img class='icon_destinations' src='/tourism_information_system/btn_icons/email_icon.png'/> <a href='mailto:$row[fld_email]'>$row[fld_email]</a><br><br>
                                                </div>
                                                
                                          </div>
                                          
                                          <div class='row'>
                                                <div class='col-sm-12'>
                                                    <h4><b>About</b></h4>
                                                    <p>".nl2br($row["fld_description"])."</p><br>
                                                </div>
                                          </div>
                                        
                                          <div class='row'>
                                                <div class='col-sm-12'>
                                                    <h4><b>Socials</b></h4>";
                                                    foreach($socials as $values){
                                                        echo "<span class='bullet'>&#8226;</span>&nbsp;&nbsp;<a href='$values' target='_blank'>". $values . "</a><br>";
                                                    }
                                            echo    "</div>
                                          </div>
                                          
                                          ";

                                } 
                            
                            
                            ?>
                        </div>
                    </div>
                </div>
                <br>
                <!-- ratings -->
                <hr>
                <div class="row">
                    <div class="col-sm" id="a_rf_div ">
                       <?php 
                        $result = $conn->query("select * from tbl_destinations where id='$destination_id'");

                        while($row = $result->fetch_assoc()){
                            $amenities = explode(",", $row["fld_amenities"]);
                            $roomfeatures = explode(",", $row["fld_roomfeats"]);

                        echo "<table width=100%>
                                <tr>";
                                if($row["fld_amenities"]== ""){
                                    echo "<td></td>";
                                    
                                }else{
                                    echo "<td><h4><b>Property Amenities</b></h4><br></td>";
                                }
                                if($row["fld_roomfeats"] == ""){
                                    echo "<td></td>";  
                                }else{
                                    echo "<td><h4><b>Room Features</b></h4><br>";
                                }
                                    echo "</tr>
                                    <tr>
                                <td class=td_view>";
                                foreach($amenities as $values){
                                    $getIcon = $conn->query("select * from tbl_amenities where fld_amenity like '$values'");
                                    while($row = $getIcon->fetch_assoc()){
                                        $imageURL = '/tourism_information_system/adminside/amenities/uploaded_icons/amenities/'.$row["fld_a_icon"];
                                        echo "<img src='$imageURL' alt='Image' class='a_rf_icons'>".$values . "<br><br>";
                                    } 
                                }
                            echo "</td>
                                <td class=td_view>";
                                foreach($roomfeatures as $values){
                                    $getIcon = $conn->query("select * from tbl_roomfeats where fld_roomfeats like '$values'");
                                    while($row = $getIcon->fetch_assoc()){
                                        $imageURL = '/tourism_information_system/adminside/amenities/uploaded_icons/room_features/'.$row["fld_rf_icon"];
                                        echo "<img src='$imageURL' alt='Image' class='a_rf_icons'>".$values . "<br><br>";
                                    } 
                                }
                            echo "</td>
                            </tr>
                            </table>";
                        }
                                
                       ?>
                    </div>
                    <div class="col-sm" id="review_ratingdiv">
                    <div class="average_rating_div">
                            <table>
                                <tr>
                                    <td><h1><span id="average_rating">0.0</span></h1></td>
                                    <td style="padding-left: 10px;">
                                        <label><span id="desc_rating">None</span></label><br>
                                        <i class="bi bi-star-fill star-light mr-1 main_star"></i>
                                        <i class="bi bi-star-fill star-light mr-1 main_star"></i>
                                        <i class="bi bi-star-fill star-light mr-1 main_star"></i>
                                        <i class="bi bi-star-fill star-light mr-1 main_star"></i>
                                        <i class="bi bi-star-fill star-light mr-1 main_star"></i>
                                        <span><span id="total_review">0</span> Review</span>
                                    </td>
                                    
                                </tr>
                            </table>
                            <br>
                            
                            <div class="row">
                                <div class="col-3">
                                    <b>Location</b>
                                </div>
                                <div class="col-5">
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" id="location_rate_progress"></div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <span id="ave_location_review">0.0</span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-3">
                                    <b>Cleanliness</b>
                                </div>
                                <div class="col-5">
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" id="cleanliness_rate_progress"></div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <span id="ave_cleanliness_review">0.0</span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-3">
                                    <b>Service</b>
                                </div>
                                <div class="col-5">
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" id="service_rate_progress"></div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <span id="ave_service_review">0.0</span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-3">
                                    <b>Value</b>
                                </div>
                                <div class="col-5">
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" id="value_rate_progress"></div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <span id="ave_value_review">0.0</span>
                                </div>
                            </div>
                            <br>
                            <div class="row" style="text-align:center;">
                                <div class="col-5">
                                    <a href= '<?php 
                                    
                                    if(!isset($_SESSION["username"])){
                                        echo "/tourism_information_system/index.php?not_logged_in=true";
                                    }else{
                                        echo "/tourism_information_system/userside/user_destinations/user_destinations.php?write_review=true&destination_type=$destination_type&destination_id=$destination_id";
                                    }


                                    ?>'><img class='icon_destinations' src='/tourism_information_system/btn_icons/write_icon.png'/>&nbsp;&nbsp;<span id="span_review">Write a review </span></a>
                                </div>
                                <div class="col-4">
                                <a href="/tourism_information_system/userside/user_destinations/user_destinations.php?view_reviews=true&destination_type=<?php echo $destination_type?>&destination_id=<?php echo $destination_id?>"><img class='icon_destinations' src='/tourism_information_system/btn_icons/viewreviews_icon.png'/>&nbsp;&nbsp;View reviews</a>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
            
            <!--historical landmarks & museum-->
            <div class="n_destinationdiv" style='<?php 
                    $pattern_hw = "/historical landmark/i"; 
                    $pattern_museum = "/museum/i"; 
                    
                    if(isset($_GET["destination_id"]) and (preg_match($pattern_hw, $_GET["destination_type"])  == true or preg_match($pattern_museum, $_GET["destination_type"])  == true)){
                        echo "display: block";
                    }else{
                        echo "display: none";
                    }
    
            ?>'>
                <button type="button" class="btn_back" id="btn_back_1" destination_type='<?php echo $destination_type?>' ><img id='back_icon' src='/tourism_information_system/btn_icons/back_icon.png'/><span id="txt_back">Back</span></button>

                <div class="title_ndestinationdiv">
                    <?php 
                        $result = $conn->query("select * from tbl_destinations where id='$destination_id'");

                        while($row = $result->fetch_assoc()){
                            echo "<h1 style='text-align: center;'><b>$row[fld_name]</b></h1>";
                        }
                    ?>
                   
                    <table width="100%">
                        <tr>
                            <td width="10%"><i class="bi bi-caret-left-fill control_photo" id="slideLeft_d"></i></td>
                            <td width="80%" class="td_hw_m_photos">
                                
                                <div class="hw_m_photos_div">
                                    <table class="hw_m_photos">
                                        <tr>
                                            <?php 
                                                $result = $conn->query("select * from tbl_destinations where id='$destination_id'");

                                                while($row = $result->fetch_assoc()){

                                                    $img_destinations = explode(",", $row["fld_images"]);
                                                    $imageURL = '/tourism_information_system/adminside/destinations/uploaded_otherimages/';
                                                    foreach($img_destinations as $values){
                                                
                                                        echo "<td>
                                                        <img src='$imageURL" . "$values' alt='Image' class='hw_m_otherimages'>
                                                        </td>";
                                                    }
                                                    
                                                    
                                                }
                                                
                                            ?>
                                        </tr>
                                    </table>
                                </div>
                                
                            </td>
                            <td width="10%" style="text-align: right;"><i class="bi bi-caret-right-fill control_photo" id="slideRight_d"></i></td>
                        </tr>
                    </table>

                    <?php 
                        $result = $conn->query("select * from tbl_destinations where id='$destination_id'");

                        while($row = $result->fetch_assoc()){
                            echo "<br>
                                <h4 style='text-align: center;'><a href='https://maps.google.com/maps?q=$row[fld_latitude],$row[fld_longitude]' target='_blank'><img class='icon_destinations' src='/tourism_information_system/btn_icons/location_icon.png'/> $row[fld_address]</a></h4>
                                <br><br>

                                <p class='hw_m_desc'>$row[fld_description]</p>";
                            
                            $destination_name = $row["fld_name"];
                        }
                        
                    ?>
                    <br><br>

                    <table width="100%">
                        <tr>
                            <td><button type="button" class="btn_back" id="btn_prev_d" destination_id='<?php echo $destination_id?>' destination_name='<?php echo $destination_name?>' ><img id='back_icon' src='/tourism_information_system/btn_icons/prev_icon.png'/><span id="txt_back">Previous</span></button></td>
                            <td style="text-align: right"><button type="button" class="btn_back" id="btn_next_d" destination_id='<?php echo $destination_id?>' destination_name='<?php echo $destination_name?>' ><span id="txt_back">Next</span><img id='back_icon' src='/tourism_information_system/btn_icons/next_icon.png'/></button></td>
                        </tr>
                    
                    </table>

                </div>
                    
            </div>
            

        </div>
    </div>
    
    <!--write review-->
    <div class="modal" id="write_review_modal" style='<?php 
    if(isset($_GET["write_review"])){
        echo "display: block";
    }else{
        echo "display: none";
    }
    ?>'>
        <div id="write_review_div">
            <button type="button" class="btn_back" id="btn_back2" destination_type='<?php echo $destination_type?>' destination_id='<?php echo $destination_id?>' ><img id='back_icon' src='/tourism_information_system/btn_icons/back_icon.png'/><span id="txt_back">Back</span></button>
            <form onload="return false;">
            <input type="hidden" name="hasReview" id="hasReview">
            <br>
                <table>
                    <tr>
                        <td><h5>Rate Location: </h5></td>
                        <td>
                        <div class="submit_star_div">
                            <i class="bi bi-star-fill star-light location_submit_star mr-1" id="location_submit_star_1" data-rating="1"></i>
                            <i class="bi bi-star-fill star-light location_submit_star mr-1" id="location_submit_star_2" data-rating="2"></i>
                            <i class="bi bi-star-fill star-light location_submit_star mr-1" id="location_submit_star_3" data-rating="3"></i>
                            <i class="bi bi-star-fill star-light location_submit_star mr-1" id="location_submit_star_4" data-rating="4"></i>
                            <i class="bi bi-star-fill star-light location_submit_star mr-1" id="location_submit_star_5" data-rating="5"></i>
                        </div>
                        </td>
                    </tr>

                    <tr>
                        <td><h5>Rate Cleanliness: </h5></td>
                        <td>
                        <div class="submit_star_div">
                            <i class="bi bi-star-fill star-light clean_submit_star mr-1" id="clean_submit_star_1" data-rating="1"></i>
                            <i class="bi bi-star-fill star-light clean_submit_star mr-1" id="clean_submit_star_2" data-rating="2"></i>
                            <i class="bi bi-star-fill star-light clean_submit_star mr-1" id="clean_submit_star_3" data-rating="3"></i>
                            <i class="bi bi-star-fill star-light clean_submit_star mr-1" id="clean_submit_star_4" data-rating="4"></i>
                            <i class="bi bi-star-fill star-light clean_submit_star mr-1" id="clean_submit_star_5" data-rating="5"></i>
                        </div>
                        </td>
                    </tr>

                    <tr>
                        <td><h5>Rate Service: </h5></td>
                        <td>
                        <div class="submit_star_div">
                            <i class="bi bi-star-fill star-light service_submit_star mr-1" id="service_submit_star_1" data-rating="1"></i>
                            <i class="bi bi-star-fill star-light service_submit_star mr-1" id="service_submit_star_2" data-rating="2"></i>
                            <i class="bi bi-star-fill star-light service_submit_star mr-1" id="service_submit_star_3" data-rating="3"></i>
                            <i class="bi bi-star-fill star-light service_submit_star mr-1" id="service_submit_star_4" data-rating="4"></i>
                            <i class="bi bi-star-fill star-light service_submit_star mr-1" id="service_submit_star_5" data-rating="5"></i>
                        </div>
                        </td>
                    </tr>

                    <tr>
                        <td><h5>Rate Values: </h5></td>
                        <td>
                        <div class="submit_star_div">
                            <i class="bi bi-star-fill star-light values_submit_star mr-1" id="values_submit_star_1" data-rating="1"></i>
                            <i class="bi bi-star-fill star-light values_submit_star mr-1" id="values_submit_star_2" data-rating="2"></i>
                            <i class="bi bi-star-fill star-light values_submit_star mr-1" id="values_submit_star_3" data-rating="3"></i>
                            <i class="bi bi-star-fill star-light values_submit_star mr-1" id="values_submit_star_4" data-rating="4"></i>
                            <i class="bi bi-star-fill star-light values_submit_star mr-1" id="values_submit_star_5" data-rating="5"></i>
                        </div>
                        </td>
                    </tr>

                    
                </table>
                <br>
                <table width="100%">
                    <input type="hidden" name="txt_destination_id" id="txt_destination_id" value="<?php echo $destination_id;?>">
                    <input type="hidden" name="txt_destination_type" id="txt_destination_type" value="<?php echo $destination_type;?>">
                    <tr>
                        <td width="10%"><img src='<?php echo $user_profpic;?>' alt='Image' id='mini_dp'></td>
                        <td width="90%"><textarea name="txt_content" data_type="txt" class="form-control" id="txt_content" placeholder="Write a review..."></textarea></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><div class="btncontainer">
                            <button type="button" class="btn_setup" id="btn_cancelreview">Cancel</button>
                            <button type="button" class="btn_setup" id="btn_savereview"><span id="span_btnpost">Post</span></button></div></td>
                    </tr>
                </table>

            </form>
            
        </div>
    </div>

    <!--view reviews-->
    <div class="modal" id="viewreviews_modal" style='<?php 
    if(isset($_GET["view_reviews"])){
        echo "display: block";
    }else{
        echo "display: none";
    }
    ?>'>
        <div id="viewreviews_div">
            <button type="button" class="btn_back" id="btn_back3" destination_type='<?php echo $destination_type?>' destination_id='<?php echo $destination_id?>' ><img id='back_icon' src='/tourism_information_system/btn_icons/back_icon.png'/><span id="txt_back">Back</span></button>
            <br><br>
            <?php 
                            $result = $conn->query("select * from tbl_reviewsratings where destination_id='$destination_id' order by fld_datetime DESC ");

                            if(mysqli_num_rows($result) > 0){
                                while($row = $result->fetch_assoc()){
                                    
                                    $getwriter = $conn->query("select * from tbl_users where id='$row[user_id]'");
                                    while($row2 = $getwriter->fetch_assoc()){
                                        $writer_profpic = '/tourism_information_system/userside/img_profile/'.$row2["fld_profpic"];
                                        $writer_username = $row2["fld_username"];
                                        $writer_name = $row2["fld_name"];
                                    }

                                    $date = date_create($row["fld_datetime"]);
                                    $date_time = date_format($date,"F j, Y h:i:s A");
                                   
                                    
                                    echo "<div class='i_reviews'>
                                        <table>
                                            <tr>
                                                <td><img src='$writer_profpic' alt='Image' id='mini_dp'><br><br></td>
                                                <td align='left'><span id='story_writer_name'>$writer_name</span>
                                                <span id='story_writer_username'>@$writer_username</span><br>
                                                <span id='story_datetime'>$date_time</span><br><br>
                                                </td>
                                            </tr>
                                           
                                            <tr>
                                                <td><br><br></td>
                                                <td align='left'>$row[fld_content]<br><br></td>
                                            </tr>

                                            <tr>
                                                <td></td>
                                                <td align='left'>";
                                                
                                            $html = '';

                                            $html .= '<table>';
                                        
                                            
                                            
                                                
                                                $html .= '<tr>';
                                                $html .= '<td>Location: </td>';
                                                $html .= '<td style="padding-left: 20px;">';
                                                for($star = 1; $star <= 5; $star++)
                                                {
                                                    $class_name = '';

                                                    if($row["fld_locationrate"] >= $star)
                                                    {
                                                        $class_name = 'text-warning';
                                                    }
                                                    else
                                                    {
                                                        $class_name = 'star-light';
                                                    }

                                                    $html .= '<i class="bi bi-star-fill '.$class_name.' mr-1"></i>';
                                                }
                                                $html .= '</td>';
                                                $html .= '</tr>';


                                                $html .= '<tr>';
                                                $html .= '<td>Cleanliness: </td>';
                                                $html .= '<td style="padding-left: 20px;">';
                                                for($star = 1; $star <= 5; $star++)
                                                {
                                                    $class_name = '';

                                                    if($row["fld_cleanrate"] >= $star)
                                                    {
                                                        $class_name = 'text-warning';
                                                    }
                                                    else
                                                    {
                                                        $class_name = 'star-light';
                                                    }

                                                    $html .= '<i class="bi bi-star-fill '.$class_name.' mr-1"></i>';
                                                }
                                                $html .= '</td>';
                                                $html .= '</tr>';

                                                $html .= '<tr>';
                                                $html .= '<td>Services: </td>';
                                                $html .= '<td style="padding-left: 20px;">';
                                                for($star = 1; $star <= 5; $star++)
                                                {
                                                    $class_name = '';

                                                    if($row["fld_servicerate"] >= $star)
                                                    {
                                                        $class_name = 'text-warning';
                                                    }
                                                    else
                                                    {
                                                        $class_name = 'star-light';
                                                    }

                                                    $html .= '<i class="bi bi-star-fill '.$class_name.' mr-1"></i>';
                                                }
                                                $html .= '</td>';
                                                $html .= '</tr>';

                                                $html .= '<tr>';
                                                $html .= '<td>Value: </td>';
                                                $html .= '<td style="padding-left: 20px;">';
                                                for($star = 1; $star <= 5; $star++)
                                                {
                                                    $class_name = '';

                                                    if($row["fld_valuerate"] >= $star)
                                                    {
                                                        $class_name = 'text-warning';
                                                    }
                                                    else
                                                    {
                                                        $class_name = 'star-light';
                                                    }

                                                    $html .= '<i class="bi bi-star-fill '.$class_name.' mr-1"></i>';
                                                }
                                                $html .= '</td>';
                                                $html .= '</tr>';
                                            
                                                $html .= '</table>';
                                                echo $html;

                                            echo "</td>
                                            </tr>
                                          
                                        </table>
                                        <br>

                                        
                                        
                                    </div>";
                                }
                            }else{
                                echo "<div align='center'>
                                    This destination has no review as of the moment.
                                </div>";
                            }
                            
                            
                        ?>
        </div>
    </div>

    <!--view gallery-->
    <div class="modal" id="viewgallery_modal" style='<?php 
    if(isset($_GET["view_gallery"])){
        echo "display: block";
    }else{
        echo "display: none";
    }
    ?>'>
        <div id="viewgallery_div">
            <button type="button" class="btn_back" id="btn_back4" destination_type='<?php echo $destination_type?>' destination_id='<?php echo $destination_id?>' ><img id='back_icon' src='/tourism_information_system/btn_icons/back_icon.png'/><span id="txt_back">Back</span></button>
            <br><br>
            <div class="row">
            <?php 
                    
                    
                    $result = $conn->query("select * from tbl_destinations where id='$destination_id'");
                                

                    while($row = $result->fetch_assoc()){
                       
                            $otherimg_destinations = explode(",", $row["fld_images"]);
                            
                        
                        
                    } 

                    if(!empty($otherimg_destinations)){
                        $counter = 0;
                        foreach ($otherimg_destinations as $values) {
                            if ($counter % 3 === 0) {
                                echo "</div><div class='row'>";
                            }
                            echo "<div class='destination_imagesdiv col-md-4'>";
                            echo "<img src='/tourism_information_system/adminside/destinations/uploaded_otherimages/" . "$values' alt='Image' class='img_destinations'>";
                            echo "</div>";
                            $counter++;
                        }
                    }
                
                    ?>
      
        </div>
    </div>



    <br><br>
    <!--footer-->
</body>
<script src="u_destinationscript.js"></script>
</html>