<?php
    include("../navbar.php");
    
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
    <link rel="stylesheet" href="interaction_style.css">
    <title>View User Feedbacks</title>
</head>
<body>
<div class="header" id="headercontainer">  
            <button type="button" class="btn btn-dark btn-lg" id="btn_menu"><span class="glyphicon glyphicon-menu-hamburger"></span></button>   
            <h2 id="headertitle">VIEW USER FEEDBACKS</h2>
        </div> 
    <div id="container">
        
        <br><br>
        
        <div class="app_reviewsdiv">
            <div class="div_btnstar">
                <button type="button" class="btn_star_rating" id="btn_allreviews">All Reviews</button>

                <!--five star-->
                <button type="button" class="btn_star_rating" id="btn_fivestar">5 
                    <i class="bi bi-star-fill text-warning mr-1 main_star"></i>
                    <i class="bi bi-star-fill text-warning mr-1 main_star"></i>
                    <i class="bi bi-star-fill text-warning mr-1 main_star"></i>
                    <i class="bi bi-star-fill text-warning mr-1 main_star"></i>
                    <i class="bi bi-star-fill text-warning mr-1 main_star"></i></button>

                <!--four star-->
                <button type="button" class="btn_star_rating" id="btn_fourstar">4
                    <i class="bi bi-star-fill text-warning mr-1 main_star"></i>
                    <i class="bi bi-star-fill text-warning mr-1 main_star"></i>
                    <i class="bi bi-star-fill text-warning mr-1 main_star"></i>
                    <i class="bi bi-star-fill text-warning mr-1 main_star"></i></button>

                <!--three star-->
                <button type="button" class="btn_star_rating" id="btn_threestar">3
                    <i class="bi bi-star-fill text-warning mr-1 main_star"></i>
                    <i class="bi bi-star-fill text-warning mr-1 main_star"></i>
                    <i class="bi bi-star-fill text-warning mr-1 main_star"></i></button>

                <!--two star-->
                <button type="button" class="btn_star_rating" id="btn_twostar">2
                    <i class="bi bi-star-fill text-warning mr-1 main_star"></i>
                    <i class="bi bi-star-fill text-warning mr-1 main_star"></i></button>

                <!--one star-->
                <button type="button" class="btn_star_rating" id="btn_onestar">1
                    <i class="bi bi-star-fill text-warning mr-1 main_star"></i></button>
                </div>

            <br><br>
            <div class="viewreviews_div">
                        <?php
                        
                        if(isset($_GET['star_rating'])){
                            $result = $conn->query("select * from tbl_appreviews where fld_rating='$_GET[star_rating]' order by fld_datetime DESC");
                        }else{
                            $result = $conn->query("select * from tbl_appreviews order by fld_datetime DESC");
                        }

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
                    </div>

            
        </div>
    </div>
</body>
    <script src="interaction_script.js"></script>
</html>