<?php
    include("../navbar.php");
    include("../connect.php");

    $statusMsg = "";
    $insertValuesSQL = "";
    $mainImage = "";
    $fileIMGs = "";

    $category="";
    $title="";
    $content="";


    //date and time now
    date_default_timezone_set('Asia/Manila');
    $dateNow = date("Y-m-d H:i:s");

    //getting the writer
    $result = $conn -> query("select * from tbl_admin where fld_username like '$username'");
        while($row = $result->fetch_assoc()){
            $writer = $row["fld_name"];
            $admintype = $row["fld_type"];
        }
    
    //-------------------start- updating existing news----------------------

    if(isset($_POST['txt_id'])){
        //----------------start- for uploading the main image---------------------
        $maintargetDir = "uploaded_mainimages/";
        $mainfileName = basename($_FILES["img_main"]["name"]);
        $maintargetFilePath = $maintargetDir . $mainfileName;
        $mainfileType = pathinfo($maintargetFilePath,PATHINFO_EXTENSION);

        if(!empty($_FILES["img_main"]["name"])){
            // Allow certain file formats
            $allowTypes = array('jpg','png','jpeg','gif','pdf', 'JPG', 'JPEG', 'PNG', 'GIF');
            if(in_array($mainfileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["img_main"]["tmp_name"], $maintargetFilePath)){
                    
                    $mainImage = $mainfileName;
                }else{
                    $statusMsg = "Sorry, there was an error uploading your file.";
                    echo "<script> alert('$statusMsg'); </script>";
                }
            }else{
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
                echo "<script> alert('$statusMsg'); </script>";
            }
        }else{
            $mainImage = "";
        }
        //---------------end- for uploading the main image of the news---------------------
        
        //----------------start- for uploading the other images of the news and declaring the values for update query------------------------
       
        $targetDir = "uploaded_otherimages/";
        $fileNames = array_filter($_FILES["img_news"]["name"]);
        $allowTypes = array('jpg','png','jpeg','gif','pdf');
        $fileIMGs = implode(",", $fileNames);

        if(!empty($fileNames) && $mainImage !== ""){
            foreach($_FILES["img_news"]["name"] as $key=>$val){
                $fileName = basename($_FILES["img_news"]["name"][$key]);
                $targetFilePath = $targetDir . $fileName;
                $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

                // Allow certain file formats
                if(in_array($fileType, $allowTypes)){
                    // Upload file to server
                    if(move_uploaded_file($_FILES["img_news"]["tmp_name"][$key], $targetFilePath)){
                        // Declaring the values for update query
                        $updateValuesSQL = "fld_category='$_POST[slct_category]', fld_title = '".mysqli_real_escape_string($conn, $_POST["txt_title"])."', fld_content = '".mysqli_real_escape_string($conn, $_POST["txt_content"])."',   fld_mainimage = '".$mainImage."', fld_images = '".$fileIMGs."' ";
                    }else{
                        $statusMsg = "Sorry, there was an error uploading your file.";
                        echo "<script> alert('$statusMsg'); </script>";
                    }
                }else{
                    $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
                    echo "<script> alert('$statusMsg'); </script>";
                }
            }
            

        }elseif(!empty($fileNames) && $mainImage == ""){
            //updating the values in the sql query
            foreach($_FILES["img_news"]["name"] as $key=>$val){
                $fileName = basename($_FILES["img_news"]["name"][$key]);
                $targetFilePath = $targetDir . $fileName;
                $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

                // Allow certain file formats
                if(in_array($fileType, $allowTypes)){
                    // Upload file to server
                    if(move_uploaded_file($_FILES["img_news"]["tmp_name"][$key], $targetFilePath)){
                        // Declaring the values for update query
                        $updateValuesSQL = "fld_category='$_POST[slct_category]', fld_title = '".mysqli_real_escape_string($conn, $_POST["txt_title"])."', fld_content = '".mysqli_real_escape_string($conn, $_POST["txt_content"])."', fld_images = '".$fileIMGs."' ";
                    }else{
                        $statusMsg = "Sorry, there was an error uploading your file.";
                        echo "<script> alert('$statusMsg'); </script>";
                    }
                }else{
                    $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
                    echo "<script> alert('$statusMsg'); </script>";
                }
            }
           
        }elseif(empty($fileNames) && $mainImage != ""){
            //updating the values in the sql query
            $updateValuesSQL = "fld_category='$_POST[slct_category]', fld_title = '".mysqli_real_escape_string($conn, $_POST["txt_title"])."', fld_content = '".mysqli_real_escape_string($conn, $_POST["txt_content"])."',   fld_mainimage = '".$mainImage."' ";
           
        }elseif(empty($fileNames) && $mainImage == ""){
            //updating the values in the sql query
            $updateValuesSQL = "fld_category='$_POST[slct_category]', fld_title = '".mysqli_real_escape_string($conn, $_POST["txt_title"])."', fld_content = '".mysqli_real_escape_string($conn, $_POST["txt_content"])."' ";
           
        }

        if(!empty($updateValuesSQL)){
            $result = $conn->query("select * from tbl_news where id like '$_POST[txt_id]'");
                while($row = $result->fetch_assoc()){
                    $conn->query("insert into a_activity_log(admin_id, fld_activity, fld_datetime)values('$admin_id', ' has updated a news [ ".$row['fld_title']." ] [ ".mysqli_real_escape_string($conn, $_POST["txt_title"])." ]', '$dateNow')");
                }
            //updating the values in the sql query
            $update = $conn->query("update tbl_news set $updateValuesSQL where id like '$_POST[txt_id]'");
            if($update){
                $statusMsg = "Updated Successfully. ";
                echo "<script> alert('$statusMsg'); </script>";
            }else{
                $statusMsg = "File upload failed, please try again.";
                echo "<script> alert('$statusMsg'); </script>";
            } 
                 
        }else{
            $statusMsg = 'Upload Failed';
            echo "<script> alert('$statusMsg'); </script>";
        }
        //----------------end- for uploading the other images of the news and declaring the values for update query------------------------
        
    }
    //-------------------end- updating existing news----------------------

     //--------------start- adding news---------------------------
     elseif(isset($_POST['txt_title'])){
        

        //----------------start- for uploading the main image---------------------
        $maintargetDir = "uploaded_mainimages/";
        $mainfileName = basename($_FILES["img_main"]["name"]);
        $maintargetFilePath = $maintargetDir . $mainfileName;
        $mainfileType = pathinfo($maintargetFilePath,PATHINFO_EXTENSION);

        if(!empty($_FILES["img_main"]["name"])){
            // Allow certain file formats
            $allowTypes = array('jpg','png','jpeg','gif','pdf', 'JPG', 'JPEG', 'PNG', 'GIF');
            if(in_array($mainfileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["img_main"]["tmp_name"], $maintargetFilePath)){
                    
                    $mainImage = $mainfileName;
                }else{
                    $statusMsg = "Sorry, there was an error uploading your file.";
                    echo "<script> alert('$statusMsg'); </script>";
                }
            }else{
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
                echo "<script> alert('$statusMsg'); </script>";
            }
        }else{
            $statusMsg = 'Please select a file to upload.';
            echo "<script> alert('$statusMsg'); window.location.href='news.php'; </script>";
        }
        //---------------end- for uploading the main image of the event---------------------
        

        //----------------start- for uploading the other images of the event and declaring the values for insert query------------------------
        $targetDir = "uploaded_otherimages/";        
        $fileNames = array_filter($_FILES["img_news"]["name"]);
        $allowTypes = array('jpg','png','jpeg','gif','pdf');
        $fileIMGs = implode(",", $fileNames);

        if($fileNames){
            foreach($_FILES["img_news"]["name"] as $key=>$val){
                $fileName = basename($_FILES["img_news"]["name"][$key]);
                $targetFilePath = $targetDir . $fileName;
                $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

                // Allow certain file formats
                if(in_array($fileType, $allowTypes)){
                    // Upload file to server
                    if(move_uploaded_file($_FILES["img_news"]["tmp_name"][$key], $targetFilePath)){
                        // Declaring the values for insert query
                        $insertValuesSQL = "('$admin_id', '$_POST[slct_category]','".mysqli_real_escape_string($conn, $_POST["txt_title"])."','".mysqli_real_escape_string($conn, $_POST["txt_content"])."', '".$mainImage."', '".$fileIMGs."', '$dateNow')";
                    }else{
                        $statusMsg = "Sorry, there was an error uploading your file.";
                        echo "<script> alert('$statusMsg'); </script>";
                    }
                }else{
                    $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
                    echo "<script> alert('$statusMsg'); </script>";
                }
            }
            
            
        }elseif(empty($fileNames)){
            //insertion of the values in the sql query
            $insertValuesSQL = "('$admin_id', '$_POST[slct_category]', '".mysqli_real_escape_string($conn, $_POST["txt_title"])."','".mysqli_real_escape_string($conn, $_POST["txt_content"])."', '".$mainImage."', '".$fileIMGs."', '$dateNow')";
          
        }

        if(!empty($insertValuesSQL) && !empty($mainImage)){
            //insertion of the values in the sql query
            $insert = $conn->query("insert into tbl_news (admin_id, fld_category, fld_title, fld_content, fld_mainimage, fld_images, fld_datetime) values $insertValuesSQL");
            if($insert){
                $conn->query("insert into a_activity_log(admin_id, fld_activity, fld_datetime)values('$admin_id', ' has added a news [ ".mysqli_real_escape_string($conn, $_POST["txt_title"])." ]', '$dateNow')");
                $statusMsg = "Added Successfully. ";
                echo "<script> alert('$statusMsg'); </script>";
            }else{
                $statusMsg = "File upload failed, please try again.";
                echo "<script> alert('$statusMsg'); </script>";
            } 
                 
        }else{
            $statusMsg = 'Upload Failed';
            echo "<script> alert('$statusMsg'); </script>";
        }
        //----------------end- for uploading the other images of the event and declaring the values for insert query------------------------
        
    }
    //-------------------------------------end- adding news-------------------------------------------

    //-------------------start- deleting news--------------------------------------
    elseif(isset($_GET['txtdel'])){
        $result = $conn->query("select * from tbl_news where id like '$_GET[txtdel]'");
        while($row = $result->fetch_assoc()){
            $conn->query("insert into a_activity_log(admin_id, fld_activity, fld_datetime)values('$admin_id', ' has remove a news [ ".$row['fld_title']." ]', '$dateNow')");
        }
            
        $deleted = $conn->query("delete from tbl_news where id like '$_GET[txtdel]'");

        if($deleted){
            $statusMsg = 'Deleted Successfully.';
            echo "<script> alert('$statusMsg'); location.href='news.php';</script>";
        }
        
    }
    //-------------------------------------end- deleting news---------------------------------------
    
    //--------------------------start- getting the info of the tips through id------------------------------------
    elseif(isset($_GET['txtedit'])){
        $result = $conn -> query("select * from tbl_news where id like '$_GET[txtedit]'");
        while($row = $result->fetch_assoc()){
            $title = $row["fld_title"];
            $content = $row["fld_content"];
            $category = $row["fld_category"];
        }
    }
    //--------------------------end- getting the info of the tips through id------------------------------------
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="newsstyle.css">
    <title>Manage News</title>
</head>
<body>
<div class="header" id="headercontainer">  
            <button type="button" class="btn btn-dark btn-lg" id="btn_menu"><span class="glyphicon glyphicon-menu-hamburger"></span></button>   
            <h2 id="headertitle">MANAGE NEWS</h2>
        </div> 
    <div id="container">
        
        <br><br>

        <!--viewing of inserted events-->
        <div class='newsdiv'>
            <br>
            <!--search feature-->
            <div class="searchdiv">
                <form action="news.php" method="get">
                    <table>
                        <tr>
                            <td style="padding-top: 3px;"><span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;<label> Search: </label>&nbsp;</td>
                            <td><input type="text" class="form-control" name="search_name" onchange="this.form.submit()"> </td>
                        </tr>
                    </table>
                    
                </form>
            </div>
            <br><hr><br>
            <div id="addbtndiv">
                <button type="button" class="btn btn-info" id="btn_add_news"><span class="glyphicon glyphicon-plus"></span> &nbsp;Add News</button>&nbsp;
            </div>

            <table class='table table-bordered'>
                
                <?php
                if($admintype != "Head Admin"){
                    if(isset($_GET["search_name"])){
                        $result =  $conn->query("select * from tbl_news where admin_id like '$admin_id' and fld_title like '$_GET[search_name]%'");
                       
                    }else{
                        $result = $conn->query("select * from tbl_news where admin_id like '$admin_id'");
                        
                    }

                    echo "<tr>
                    <th>Category</th><th>Headline</th><th>Published Date and Time</th><th></th><th></th>
                    </tr>";

                    while($row = $result->fetch_assoc()){
                        echo "<tr>
                        <td>$row[fld_category]</td>
                        <td>$row[fld_title]</td>
                        <td>$row[fld_datetime]</td>
                        <td style='text-align:center;'><button type='button' class='btn btn-warning' onclick=edit('$row[id]')><span class='glyphicon glyphicon-edit'></span></button></td>
                        <td style='text-align:center;'><button type='button' class='btn btn-danger' onclick=del('$row[id]')><span class='glyphicon glyphicon-trash'></span></button></td>
                        </tr>";
                    }
                }else{
                    if(isset($_GET["search_name"])){
                        $result =  $conn->query("select tbl_admin.fld_name, tbl_news.id, tbl_news.fld_category, tbl_news.fld_title, tbl_news.fld_datetime from tbl_news, tbl_admin where tbl_news.admin_id = tbl_admin.id and (tbl_news.fld_title like '$_GET[search_name]%' or tbl_admin.fld_name like '$_GET[search_name]%')");
                       
                    }else{
                        $result = $conn->query("select tbl_admin.fld_name, tbl_news.id, tbl_news.fld_category, tbl_news.fld_title, tbl_news.fld_datetime from tbl_news, tbl_admin where tbl_news.admin_id = tbl_admin.id");
                        
                    }

                    echo "<tr>
                    <th>Writer</th><th>Category</th><th>Headline</th><th>Published Date and Time</th><th></th><th></th>
                    </tr>";

                    while($row = $result->fetch_assoc()){
                        echo "<tr>
                        <td>$row[fld_name]</td>
                        <td>$row[fld_category]</td>
                        <td>$row[fld_title]</td>
                        <td>$row[fld_datetime]</td>
                        <td style='text-align:center;'><button type='button' class='btn btn-warning' onclick=edit('$row[id]')><span class='glyphicon glyphicon-edit'></span></button></td>
                        <td style='text-align:center;'><button type='button' class='btn btn-danger' onclick=del('$row[id]')><span class='glyphicon glyphicon-trash'></span></button></td>
                        </tr>";
                    }
                }

                

                
                ?>
            </table>    
        </div>

        <!--modal for adding/editing event-->
        <div class="modal" id="news_modal" style="
        <?php
        if(isset($_GET["txtedit"])){
            echo 'display:flex;';
        }else{
            echo 'display:none;';
        }
        ?>
        
        ">
            <div id="div_add_news">
            <?php
            if(isset($_GET["txtedit"])){
                echo '<h2>Edit Existing News</h2>';
            }else{
                echo '<h2>Add News</h2>';
            }
            ?>
                <br>

                <form action="news.php" method="post" enctype="multipart/form-data">
                <table width="100%">
                    <tr>
                        <td><label>Category:</label> 
                        <select class="form-control" name="slct_category" id="slct_category">
                            <option value="">Select...</option>
                            <option value="News Info" <?php if($category == "News Info"){ echo "selected";} ?>>News Info</option>
                            <option value="Business" <?php if($category == "Business"){ echo "selected";} ?>>Business</option>
                            <option value="Lifestyle" <?php if($category == "Lifestyle"){ echo "selected";} ?>>Lifestyle</option>
                            <option value="Entertainment" <?php if($category == "Entertainment"){ echo "selected";} ?>>Entertainment</option>
                            <option value="Technology" <?php if($category == "Technology"){ echo "selected";} ?>>Technology</option>
                        </select>
                        <br></td>
                    </tr>
                    <tr>
                        <td><label>Title:</label> <input type="text" name="txt_title" class="form-control" id="txt_title" value="<?php echo $title;?>" required><br></td>
                    </tr>
                    <tr>
                        <td><label>Content:</label> <textarea type="text" name="txt_content" class="form-control" id="txt_content" required><?php echo $content;?></textarea><br></td>
                    </tr>
                    <tr>
                        <td class="td_input"><label>Featured Image:</label><input type="file" name="img_main" class="form-control" id="img_main" ><br></td>
                    </tr>
                    <tr>
                        <td class="td_input"><label>Other Images:</label><input type="file" name="img_news[]" class="form-control" id="img_news" multiple><br></td>
                    </tr>
                </table>
                
                <div style="width:100%; text-align: right;">
                    <button type="button" class="btn btn-danger" id="btn_cancel">Cancel</button>
                    <?php
                        if(isset($_GET['txtedit'])){
                            echo "
                            <input type=hidden name=txt_id value=$_GET[txtedit]>
                            <button type='submit' class='btn btn-primary'><span class='glyphicon glyphicon-save'></span> &nbsp;Update News</button>";
                        }else{
                            echo "<button type='submit' class='btn btn-primary'><span class='glyphicon glyphicon-save'></span> &nbsp;Save News</button>";
                        }
                    ?> 
                    
                </div>
                </form>
            </div>
        </div>


    </div>
</body>
    <script src="newsscript.js"></script>
</html>