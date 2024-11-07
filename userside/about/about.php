<?php
    include("../../navbar.php");

    $name = "";
    $profpic = "";
    $user_profpic="";
    $i_category = "";
    $date_time = "";
    $img_tips = "";
    $content = "";


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
    <link rel="stylesheet" href="aboutstyle.css">
    <title>About</title>
</head>
<body>
    <!--header-->
    <?php include_once("../../header.php"); ?>

    <br>
    <div class="image-container">
        <div class="overlay_image">
            <div class="center_container">
                <h1 id="centertitle">About Us</h1>
                <h3 class="centersubtitle">FordaTravel is designed specifically for the travel industry, providing an intuitive platform for creating, managing, and publishing captivating travel content.</h3><br>
                <a href="#container_content_div"><button type="button" class="btn_about" id="btn_content">See More</button></a> &nbsp;
                <a href= '<?php 
                                    
                                    if(!isset($_SESSION["username"])){
                                        echo "/tourism_information_system/index.php?not_logged_in=true";
                                    }else{
                                        echo "/tourism_information_system/userside/about/about.php?write_review=true";
                                    }


                                    ?>'><button type="button" class="btn_about" ><img class='write_icon' src='/tourism_information_system/btn_icons/write_icon.png'/>&nbsp;&nbsp;<span id="span_review">Tell us your feedbacks or report a problem.</span></button></a>
            </div>
        </div>
        <div class='myImage'>
            <img src='/tourism_information_system/img_shortcuts/about_bg.jpg' alt='Image' class='bg_image'>
        </div>
    </div>



    <div class="container_index" id="container_content_div">
        <div class="contentdiv">
            <div class="row vmh_div">
                <div class="col-lg">
                    <h1 class="contenttitle">Vision</h1>
                    <p class="content_vmh">
                    Our vision is to be the leading global platform that inspires and connects people through transformative travel experiences.
                    We envision a world where individuals from all walks of life come together to explore, learn, and create lasting memories, fostering a deep appreciation for the diversity of our planet.
                    </p>
                </div>

                <div class="col-lg">
                    <h1 class="contenttitle">Mission</h1>
                    <p class="content_vmh">
                    Our mission is to provide a comprehensive travel platform that empowers individuals to discover, plan, and share their unique travel journeys.
                    We are committed to leveraging technology to make travel accessible, sustainable, and enriching for everyone.
                    </p>
                </div>

            </div>

            <div class="row who_div">
                <div class="col-lg">
                    <h1 class="who_title"><a href='#teamdiv'>Who we are</a></h1>
                </div>

                <div class="col-lg">
                Our team consists of travel enthusiasts, developers, and designers who share a common goal - to inspire and connect people through the magic of travel.
                We believe in the transformative power of travel stories and aim to provide tools that enable users to create engaging, and informative content.
                </div>
            </div>
            
            <div class="row team_div" id="teamdiv">
            
                <div class="col-lg">
                    <div class="n_teamdiv">
                        <img src="/tourism_information_system/img_shortcuts/about_founder.jpg" alt="founder" class="about_imgteam">
                        <h3 class="about_nameteam">John Gabriel Coronado</h3>
                        <h4>CEO, Founder</h4><br>
                        <p>Lorem ipsum dolor sit amet. Non doloremque harum non facilis incidunt ut laboriosam sunt quo unde quia aut quia quia. In obcaecati dolor 33 galisum aperiam in provident fugit ut porro autem ut consequuntur sunt sit quia distinctio! Eum exercitationem minima aut quod quia et corrupti nisi. Sit molestiae rerum vel dicta explicabo ut unde inventore ut dolorem omnis est nostrum totam At amet fuga aut voluptatem corrupti.</p>
                    </div>

                </div>

                <div class="col-lg">
                    <div class="n_teamdiv">
                        <img src="/tourism_information_system/img_shortcuts/noprofile.jpg" alt="founder" class="about_imgteam">
                        <h3 class="about_nameteam">John Doe</h3>
                        <h4>COO</h4><br>
                        <p>Lorem ipsum dolor sit amet. Non doloremque harum non facilis incidunt ut laboriosam sunt quo unde quia aut quia quia. In obcaecati dolor 33 galisum aperiam in provident fugit ut porro autem ut consequuntur sunt sit quia distinctio! Eum exercitationem minima aut quod quia et corrupti nisi. Sit molestiae rerum vel dicta explicabo ut unde inventore ut dolorem omnis est nostrum totam At amet fuga aut voluptatem corrupti.</p>
                    </div>

                </div>

                <div class="col-lg">
                    <div class="n_teamdiv">
                        <img src="/tourism_information_system/img_shortcuts/noprofile.jpg" alt="founder" class="about_imgteam">
                        <h3 class="about_nameteam">Ella Musk</h3>
                        <h4>CFO</h4><br>
                        <p>Lorem ipsum dolor sit amet. Non doloremque harum non facilis incidunt ut laboriosam sunt quo unde quia aut quia quia. In obcaecati dolor 33 galisum aperiam in provident fugit ut porro autem ut consequuntur sunt sit quia distinctio! Eum exercitationem minima aut quod quia et corrupti nisi. Sit molestiae rerum vel dicta explicabo ut unde inventore ut dolorem omnis est nostrum totam At amet fuga aut voluptatem corrupti.</p>
                    </div>

                </div>
            </div>

            <!--footer-->
            <?php include("../../footer.php"); ?>

            
                
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
                    <button type="button" class="btn_back" id="btn_back"><img id='back_icon' src='/tourism_information_system/btn_icons/back_icon.png'/><span id="txt_back">Back</span></button>
                    <form onload="return false;">
                    <input type="hidden" name="hasReview" id="hasReview">
                    <br>
                        <div class="submit_star_div">
                            <i class="bi bi-star-fill star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                            <i class="bi bi-star-fill star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                            <i class="bi bi-star-fill star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                            <i class="bi bi-star-fill star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                            <i class="bi bi-star-fill star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                        </div>
                        <br>
                        <table width="100%">
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
</body>
    <script src="aboutscript.js"></script>
</html>