<?php
    include("../navbar.php");
    include("../../connect.php");

    if ($_SESSION['admin_type'] == "System Admin" || $_SESSION['admin_type'] == "Head Admin") {
        //do nothing
    }else{
        // Redirect to the login page
        echo "<script>alert('You dont have access to this page.'); window.location.href='../adminlogin.php';</script>";
    }

    $no_of_admins = 0;
    $no_of_users = 0;
    $no_of_verified = 0;
    $no_of_unverified = 0;
    $no_of_destinations = 0;
    $no_of_events = 0;
    $no_of_news = 0;
    $no_of_tips = 0;
    $no_of_guidelines = 0;
    $no_of_hotlines = 0;
    $no_of_hospitals = 0;
    $no_of_stores = 0;
    $no_of_stories = 0;
    $no_of_comments = 0;
    $no_of_replies = 0;
    $no_of_reviews = 0;

    include("num_results.php");
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="dashboardstyle.css">
    <title>Dashboard</title>
</head>
<body>
<div class="header" id="headercontainer">  
            <button type="button" class="btn btn-dark btn-lg" id="btn_menu"><span class="glyphicon glyphicon-menu-hamburger"></span></button>   
            <h2 id="headertitle">FordaTravel - Dashboard</h2>
        </div> 
    <div id="container">
        
        <br><br><br>
        <div class="dashboard_row row">
            

            <!--left column-->
            <div class="dashboard_col col-sm">
                <div id="activitylog_div">
                    <h5 class="txt">ACTIVITY LOG</h5><hr><br>

                        <table width="100%">

                            <?php 
                                $result = $conn->query("select tbl_admin.fld_name, a_activity_log.fld_activity, a_activity_log.fld_datetime from a_activity_log, tbl_admin where a_activity_log.admin_id = tbl_admin.id order by a_activity_log.fld_datetime DESC LIMIT 3");

                                while($row = $result->fetch_assoc()){
                                    echo "<tr>
                                        <td>$row[fld_name] $row[fld_activity] on ".date_format(date_create($row["fld_datetime"]), "F j, Y h:i:s A").".<br><br></td>
                                    </tr>";
                                }
                            ?>
                        </table>
                    
                        <h5 id='btn_viewallact' style='cursor: pointer;'>View All</h5>

                </div>

                <div id="feedbacks_div">
                    <h5 class="txt">APP FEEDBACKS</h5><hr><br>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="average_div">
                                <h1 class="average_rating"><span id="average_rating">0.0</span> / 5.0</h1>
                                <div class="average_star_div">
                                    <i class="bi bi-star-fill star-light mr-1 main_star"></i>
                                    <i class="bi bi-star-fill star-light mr-1 main_star"></i>
                                    <i class="bi bi-star-fill star-light mr-1 main_star"></i>
                                    <i class="bi bi-star-fill star-light mr-1 main_star"></i>
                                    <i class="bi bi-star-fill star-light mr-1 main_star"></i>
                                </div>
                                
                                <div class="total_review_div"><span class="total_review">0</span> Reviews</div>
                            </div>
                        </div>
                        <div class="col-sm-7" id="total_star_div">
                            <div class="total_review_div2">
                                Out of <span class="total_review"></span> Ratings
                            </div>
                            <!--five star total review-->
                            <div class="row">
                                <div class="star_div col-3">
                                    <i class="bi bi-star-fill text-warning mr-1 main_star"></i>
                                    <i class="bi bi-star-fill text-warning mr-1 main_star"></i>
                                    <i class="bi bi-star-fill text-warning mr-1 main_star"></i>
                                    <i class="bi bi-star-fill text-warning mr-1 main_star"></i>
                                    <i class="bi bi-star-fill text-warning mr-1 main_star"></i>
                                </div>
                                <div class="col-7">
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" id="five_star_progress"></div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    &nbsp;<span id="total_five_star_review">0</span>
                                </div>
                            </div>

                            <!--fours star total review-->
                            <div class="row">
                                <div class="star_div col-3">
                                    <i class="bi bi-star-fill text-warning mr-1 main_star"></i>
                                    <i class="bi bi-star-fill text-warning mr-1 main_star"></i>
                                    <i class="bi bi-star-fill text-warning mr-1 main_star"></i>
                                    <i class="bi bi-star-fill text-warning mr-1 main_star"></i>
                                </div>
                                <div class="col-7">
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" id="four_star_progress"></div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    &nbsp;<span id="total_four_star_review">0</span>
                                </div>
                            </div>

                            <!--three star total review-->
                            <div class="row">
                                <div class="star_div col-3">
                                    <i class="bi bi-star-fill text-warning mr-1 main_star"></i>
                                    <i class="bi bi-star-fill text-warning mr-1 main_star"></i>
                                    <i class="bi bi-star-fill text-warning mr-1 main_star"></i>
                                </div>
                                <div class="col-7">
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" id="three_star_progress"></div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    &nbsp;<span id="total_three_star_review">0</span>
                                </div>
                            </div>

                            <!--two star total review-->
                            <div class="row">
                                <div class="star_div col-3">
                                    <i class="bi bi-star-fill text-warning mr-1 main_star"></i>
                                    <i class="bi bi-star-fill text-warning mr-1 main_star"></i>
                                </div>
                                <div class="col-7">
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" id="two_star_progress"></div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    &nbsp;<span id="total_two_star_review">0</span>
                                </div>
                            </div>

                            <!--one star total review-->
                            <div class="row">
                                <div class="star_div col-3">
                                    <i class="bi bi-star-fill text-warning mr-1 main_star"></i>
                                </div>
                                <div class="col-7">
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" id="one_star_progress"></div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    &nbsp;<span id="total_one_star_review">0</span>
                                </div>
                            </div>
                        </div>
                    </div>  

                    <!--view reviews-->
                    <hr>
                    <div class="viewreviews_div">
                        <?php
                        $result = $conn->query("select * from tbl_appreviews order by fld_datetime DESC LIMIT 2");
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
                                        <td align='left'>";
                                        
                                        $html = '';

                
                                        for($star = 1; $star <= 5; $star++)
                                        {
                                            $class_name = '';

                                            if($row["fld_rating"] >= $star)
                                            {
                                                $class_name = 'text-warning';
                                            }
                                            else
                                            {
                                                $class_name = 'star-light';
                                            }

                                            $html .= '<i class="bi bi-star-fill '.$class_name.' mr-1"></i>';
                                        }
                                    


                                    
                                        echo $html;

                                    echo "<br><br></td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td align='left'>$row[fld_content]</td>
                                    </tr>

                                    
                                  
                                </table>
                                <br><br>

                                
                                
                            </div>";
                        }
                        ?>
                        <h5 id='btn_viewreviews' style='cursor: pointer;'>View More</h5>
                    </div>
                </div>
            </div>

            <!--right column: no of content/user/admin specifics-->
            <div class="dashboard_col col-sm">
                <div class="row">
                    <div class="no_user_admin_div col-sm" id="admin_div">
                        <table width="100%">
                            <tr>
                                <td><h5 class="txt">ADMIN</h5></td>
                                <td style="text-align:right;"><div class="num_useradmin"><span><?php echo $no_of_admins; ?></span></div></td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <div class="row">
                    <div class="admin_col col-sm" id="destination_div">
                        <span class="num_contents"><?php echo $no_of_destinations ;?></span>
                        <h5 class="admin_txt"> Posted Destinations</h5>
                    </div>
                    <div class="admin_col col-sm" id="events_div">
                        <span class="num_contents"><?php echo $no_of_events ;?></span>
                        <h5 class="admin_txt"> Posted Events</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="admin_col col-sm" id="news_div">
                        <span class="num_contents"><?php echo $no_of_news ;?></span>
                        <h5 class="admin_txt"> Published News</h5>
                    </div>
                    <div class="admin_col col-sm" id="tips_div">
                        <span class="num_contents"><?php echo $no_of_tips ;?></span>
                        <h5 class="admin_txt"> Published Tips</h5>
                    </div>
                    <div class="admin_col col-sm" id="guidelines_div">
                        <span class="num_contents"><?php echo $no_of_guidelines ;?></span>
                        <h5 class="admin_txt"> Published Travel Guidelines</h5>
                    </div>
                </div>

                <div class="row">
                    <div class="admin_col col-sm" id="hotlines_div">
                        <span class="num_contents"><?php echo $no_of_hotlines ;?></span>
                        <h5 class="admin_txt"> Posted Hotlines</h5>
                    </div>
                    <div class="admin_col col-sm" id="hospitals_div">
                        <span class="num_contents"><?php echo $no_of_hospitals ;?></span>
                        <h5 class="admin_txt"> Posted Hospitals</h5>
                    </div>
                    <div class="admin_col col-sm" id="stores_div">
                        <span class="num_contents"><?php echo $no_of_stores ;?></span>
                        <h5 class="admin_txt"> Posted Stores</h5>
                        
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="no_user_admin_div col-sm" id="user_div">
                        <table width="100%">
                            <tr>
                                <td><h5 class="txt">REGISTERED USERS</h5></td>
                                <td style="text-align:right;"><div class="num_useradmin"><span><?php echo $no_of_users; ?></span></div></td>
                            </tr>
                        </table>
                        <hr>
                        <table class="user_verify_div">
                            <tr>
                                <td><span><?php echo $no_of_verified; ?></td>
                                <td>Verified Users</td>
                                <td><span><?php echo $no_of_unverified; ?></td>
                                <td>Unverified Users</td>
                                
                            </tr>
                        </table>
                    </div>
                </div>

                
                <div class="row">
                    <div class="admin_col col-sm" id="stories_div">
                        <span class="num_contents"><?php echo $no_of_stories ;?></span>
                        <h5 class="admin_txt">Posted Stories</h5>
                    </div>
                    
                    <div class="admin_col col-sm" id="reviews_div">
                        <span class="num_contents"><?php echo $no_of_reviews ;?></span>
                        <h5 class="admin_txt">Destination's Reviews and Ratings</h5>
                    </div>
                </div>
                
            </div>
        </div>

    </div>
</body>
    <script src="dashboardscript.js"></script>
</html>