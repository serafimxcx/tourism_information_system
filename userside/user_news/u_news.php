<?php
    include("../../navbar.php");

    if(isset($_GET["news_category"])){
        $news_category = $_GET["news_category"];
    }

    if(isset($_GET["news_id"])){
        $news_id = $_GET["news_id"];
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
    $img_news = "";
    $content = "";
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
    <link rel="stylesheet" href="u_newstyle.css">
    <title>News</title>
</head>
<body>
    <!--header-->
    <?php include_once("../../header.php"); ?>

    <div class="container fluid">
        <div class="contentdiv">
        <br>
            <div class="row" id="title_div">
                <div class="col-sm-6">
                    <h1 id="page-title"><a href="/tourism_information_system/userside/user_news/u_news.php">News</a></h1>
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
            <div class="news_menudiv">
                <table id="tbl_d_menu">
                    <tr>
                        <td><a href="/tourism_information_system/userside/user_news/u_news.php?news_category=News Info" style=' 
                        <?php if($news_category =="News Info"){ echo "color: #00bd1c;"; } ?>'>News Info</a></td>
                        <td><a href="/tourism_information_system/userside/user_news/u_news.php?news_category=Business" style=' 
                        <?php if($news_category =="Business"){ echo "color: #00bd1c;"; } ?>'>Business</a</td>
                        <td><a href="/tourism_information_system/userside/user_news/u_news.php?news_category=Lifestyle" style=' 
                        <?php if($news_category =="Lifestyle"){ echo "color: #00bd1c;"; } ?>'>Lifestyle</a></td>
                        <td><a href="/tourism_information_system/userside/user_news/u_news.php?news_category=Entertainment" style=' 
                        <?php if($news_category =="Entertainment"){ echo "color: #00bd1c;"; } ?>'>Entertainment</a></td>
                        <td><a href="/tourism_information_system/userside/user_news/u_news.php?news_category=Technology" style=' 
                        <?php if($news_category =="Technology"){ echo "color: #00bd1c;"; } ?>'>Technology</a></td>
                    </tr>
                </table>
            </div>

            <div class="result_newsdiv" style='<?php 
                if(isset($_GET["news_id"])){
                    echo "display: none";
                }else{
                    echo "display: block";
                }
            
            ?>'>
                <div class="row">
                    <?php 
                        
                        if(isset($news_category) && empty($_GET["municipality"])){
                            $result = $conn->query("select * from tbl_news where fld_category like '$news_category' order by fld_datetime DESC");
                        }else if(empty($news_category) && isset($_GET["municipality"])){
                            $result = $conn->query("select * from tbl_news where admin_id = '$_GET[municipality]' order by fld_datetime DESC");
                        }else if(isset($news_category) && isset($_GET["municipality"])){
                            $result = $conn->query("select * from tbl_news where admin_id = '$_GET[municipality]' and fld_category like '$news_category' order by fld_datetime DESC");
                        }else{
                            $result = $conn->query("select * from tbl_news order by fld_datetime DESC");
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
                        
    
                                echo "<div class='news_container' news_id='{$row['id']}' news_category='{$row['fld_category']}'>
                                    <div class='shortcutsdiv' >";
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
                                        <div class='centeredtxt'>
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

            <div class="n_newsdiv" style='<?php 
            if(isset($_GET["news_id"])){
                echo "display: block";
            }else{
                echo "display: none";
            }
            ?>'>
                <div class="n_news">
                    <table width="100%">
                        <tr>
                            <td>
                            <button type="button" class="btn_back" id="btn_back" news_category='<?php echo $news_category?>' ><img id='back_icon' src='/tourism_information_system/btn_icons/back_icon.png'/><span id="txt_back">Back</span></button>
                            </td>
                            <td style="text-align: right;">
                            <img  class='btn_bookmark' news_id='<?php echo $news_id?>' title='Add to Bookmark' src=
                                <?php 
                                $resultCheck = $conn->query("select * from tbl_bookmarks where user_id='$user_id' and news_id='$news_id'") ;
                                $resultLikes = $conn->query("select * from tbl_bookmarks where news_id='$news_id'") ;

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
                                $result = $conn->query("select tbl_admin.fld_name, tbl_news.id, tbl_news.fld_category, tbl_news.fld_title, tbl_news.fld_datetime, tbl_news.fld_images, tbl_news.fld_content from tbl_news, tbl_admin where tbl_news.admin_id = tbl_admin.id and tbl_news.id = '$news_id'");

                                while($row = $result->fetch_assoc()){
                                    $date = date_create($row["fld_datetime"]);
                                        $date_time = date_format($date,"F j, Y h:i:s A");
                                        if(!empty($row["fld_images"])){
                                            $img_news = explode(",", $row['fld_images']);
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
                            
                            if(!empty($img_news)){
                                $counter = 0;
                                foreach ($img_news as $values) {
                                    if ($counter % 3 === 0) {
                                        echo "</div><div class='row'>";
                                    }
                                    echo "<div class='news_imagesdiv col-md-4'>";
                                    echo "<img src='/tourism_information_system/adminside/news/uploaded_otherimages/" . "$values' alt='Image' class='img_news'>";
                                    echo "</div>";
                                    $counter++;
                                }
                            }

                        ?>
                    </div>
                    <br>
                    <div class="row">
                            <?php 
                                echo "<p class='news_content'>". nl2br($content) ."</p>";
                            ?>
                    </div>
                </div>

                <!--comments-->
                <div class="news_comment_div">
                    <h2><b>Comments</b></h2><br><br>
                    <form enctype="multipart/form-data" id="add_comment_form">
                            <table width="100%">
                                <input type="hidden" name="txt_news_id" id="txt_news_id" value="<?php echo $news_id;?>">
                                <tr>
                                    <td width="10%"><img src='<?php 
                                    if(!isset($_SESSION["user_id"])){
                                        echo "/tourism_information_system/img_shortcuts/noprofile.jpg";
                                    }else{
                                        echo $user_profpic;
                                    }
                                    
                                    
                                    ?>' alt='Image' id='mini_dp'></td>
                                    <td width="90%"><textarea name="txt_content" data_type="txt" class="form-control" id="txt_content" placeholder="Post a comment..."></textarea></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><img id="add_image_comment" src="/tourism_information_system/btn_icons/add_image_story.png" alt="add-image"/>
                                        <input id="imagePostComment" type="file" data_type="img"
                                            name="imgs_comment[]" placeholder="Photo" multiple>&nbsp;
                                            <br><br>
                                        <div id="previewFilesComment"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><div class="btncontainer">
                                        <button type="button" class="btn_setupcomment" id="btn_cancelcomment">Cancel</button>
                                        <button type="button" class="btn_setupcomment" id="btn_savecomment">Post</button></div></td>
                                </tr>
                            </table>
                        
                        </form>
                        <br><br>

                        <div id="view_comments_div">
                    
                        </div>

                    </div>
                    
                </div>
            

            </div>



        </div>
        <br><br>
    </div>

    <br><br>
</body>
    <script src="u_newscript.js"></script>
</html>