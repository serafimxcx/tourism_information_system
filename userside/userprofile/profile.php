<?php
    include("../../navbar.php");

    $name = "";
    $profpic = "";
    $about = "";


    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $user_id = $_SESSION['user_id'];

        $result = $conn -> query("select * from tbl_users where fld_username like '$username'");
        while($row = $result->fetch_assoc()){
            if($row["fld_name"] == ""){
                $name = "";
                $profpic = "";
                $about = "";
            }else{
                $name = $row["fld_name"];
                $profpic = '../img_profile/'.$row["fld_profpic"];
                $about = nl2br($row["fld_about"]);
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
    <link rel="stylesheet" href="profilestyle.css">
    <title>Profile</title>
</head>
<body>
    <!--header-->
    <?php include_once("../../header.php"); ?>

    <div class="container fluid">
        <div class="contentdiv">
            
            
            <!--setup container for profile page for newly created account-->
            <?php include_once("setupprofile.php"); ?>

            <div class="profilecontainer" style="<?php
                if($name == ""){
                    echo "display:none;";

                }else{
                    echo "display:block;";
                }
                ?>">
        
                <?php
                    echo "<img src='$profpic' alt='Image' id='profile_pic'>"; 
                ?>

                <div id="userinfocontainer">
                    
                    <div class="div_btn_option">
                        <button type="button" id="btn_option"><i class="bi bi-three-dots-vertical"></i></button>
                        <div id="dropdown_option">
                            <?php 
                                if($_SESSION["user_type"] == "Municipality"){
                                    echo "
                                    <a href='/tourism_information_system/adminside/destinations/destinations.php' target='_blank'>Manage Contents</a>

                                    ";
                                }
                                if($_SESSION["user_type"] == "Business"){
                                    echo "
                                    <a href='/tourism_information_system/adminside/destinations/destinations.php' target='_blank'>Add your business</a>

                                    ";
                                }
                            ?>
                            <a href="/tourism_information_system/userside/user_bookmarks/u_bookmarks.php?category=Destinations">Bookmarks</a>
                            <a href="profile.php?updateprofile=true">Update Profile</a>
                            <a href="/tourism_information_system/userside/security/security.php">Change Password</a>
                            
                        </div>
                    </div>

                    <h3><?php echo $name;?></h3>
                    <h5><?php echo '@'.$username;?></h5><br>
                    <div id="aboutdiv">
                        <p><?php echo $about;?></p><br>
                        <button type="button" class="btn_userinfo" id="btn_post">Post Story</button>
                    </div>
                    <br>
                    <table width="100%" class="table">
                        <tr>
                            <th class="menu_profile" id="menu_stories" style='
                            <?php if(!isset($_GET["showlikes"]) && !isset($_GET["showreposts"])){echo "border-bottom: 5px solid #00DB58;"; }?>'>Stories</th>
                            <th class="menu_profile" id="menu_reposts" style='
                            <?php if(isset($_GET["showreposts"])){echo "border-bottom: 5px solid #00DB58;"; }?>'>Reposts</th>
                            <th class="menu_profile" id="menu_likes" style='
                            <?php if(isset($_GET["showlikes"])){echo "border-bottom: 5px solid #00DB58;"; }?>'>Likes</th>
                        </tr>
                    </table>

                    <div id="load_stories_div">
                    <?php 
                        if(!isset($_GET["showlikes"]) && !isset($_GET["showreposts"])){
                            include_once("loadownstories.php");
                        }elseif(isset($_GET["showlikes"])){
                            include_once("loadlikes.php");
                        }elseif(isset($_GET["showreposts"])){
                            include_once("loadreposts.php");
                        }

                    ?>
                    </div>
                    
                </div>

            </div>
        </div>
    </div>
    
    <!--modal for update profile-->
    <div class="modal" id="update_profile_modal" style="
        <?php
        if(isset($_GET["updateprofile"])){
            echo 'display:block;';
        }else{
            echo 'display:none;';
        }
        ?>
        
        ">
        <div id="update_profile_div">
            <form enctype="multipart/form-data" id="update_profile_form">
                <h1>Update Profile</h1><br><br>
                <tr>
                    <td>Name<br><br></td>
                </tr>
                <tr>
                    <td><input type="text" name="txt_name" id="txt_updatename" class="inpt_update" value='<?php echo $name;?>'><br><br></td>
                </tr>
                <tr>
                    <td>About <br><br></td>
                </tr>
                <tr>
                    <td><textarea name="txt_about" id="txt_about" class="inpt_update" maxlength="1000"><?php echo $about;?></textarea><br><br></td>
                </tr>
                <tr>
                    <td>Profile Picture <br><br></td>
                </tr>
                <tr>
                    <td><input id="img_profile" class="form-control" type="file" name="img_profile" placeholder="Photo" capture><br><br></td>
                </tr>
                <tr>
                    <td><div class="btncontainer">
                        <button type="button" class="btn_setup" id="btn_cancelupdate">Cancel</button>
                        <button type="button" class="btn_setup" id="btn_updateinfo2">Update</button></div></td>
                </tr>

            </form>

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

    <br><br>
</body>
    <script src="profilescript.js"></script>
</html>