<?php
    include("../navbar.php");
    include("../connect.php");

    $statusMsg = "";
    $insertValuesSQL = "";
    $fileIMGs = "";

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
    
    //-------------------start- updating existing guidelines----------------------

    if(isset($_POST['txt_id'])){
        
        //----------------start- for uploading the other images of the guidelines and declaring the values for update query------------------------
       
        $targetDir = "uploaded_otherimages/";
        $fileNames = array_filter($_FILES["img_guides"]["name"]);
        $allowTypes = array('jpg','png','jpeg','gif','pdf', 'JPG', 'JPEG', 'PNG', 'GIF', 'mp4', 'MP4');
        $fileIMGs = implode(",", $fileNames);

        if($fileNames){
            foreach($_FILES["img_guides"]["name"] as $key=>$val){
                $fileName = basename($_FILES["img_guides"]["name"][$key]);
                $targetFilePath = $targetDir . $fileName;
                $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

                // Allow certain file formats
                if(in_array($fileType, $allowTypes)){
                    // Upload file to server
                    if(move_uploaded_file($_FILES["img_guides"]["tmp_name"][$key], $targetFilePath)){
                        // Declaring the values for update query
                        $updateValuesSQL = "fld_title = '".mysqli_real_escape_string($conn, $_POST["txt_title"])."', fld_content = '".mysqli_real_escape_string($conn, $_POST["txt_content"])."', fld_images = '".$fileIMGs."' ";
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
            //updating the values in the sql query
            $updateValuesSQL = "fld_title = '".mysqli_real_escape_string($conn, $_POST["txt_title"])."', fld_content = '".mysqli_real_escape_string($conn, $_POST["txt_content"])."' ";
            
        }

        if(!empty($updateValuesSQL)){
            $result = $conn->query("select * from tbl_guidelines where id like '$_POST[txt_id]'");
                while($row = $result->fetch_assoc()){
                    $conn->query("insert into a_activity_log(admin_id, fld_activity, fld_datetime)values('$admin_id', ' has updated a travel guideline [ ".$row['fld_title']." ] [ ".mysqli_real_escape_string($conn, $_POST["txt_title"])." ]', '$dateNow')");
                }
            //updating the values in the sql query
            $update = $conn->query("update tbl_guidelines set $updateValuesSQL where id like '$_POST[txt_id]'");
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
        //----------------end- for uploading the other images of the guidelines and declaring the values for update query------------------------
        
    }
    //-------------------end- updating existing guidelines----------------------
    
    //--------------start- adding guidelines---------------------------
    elseif(isset($_POST['txt_title'])){
        
        //----------------start- for uploading the other images of the guidelines and declaring the values for insert query------------------------
        $targetDir = "uploaded_otherimages/";        
        $fileNames = array_filter($_FILES["img_guides"]["name"]);
        $allowTypes = array('jpg','png','jpeg','gif','pdf', 'JPG', 'JPEG', 'PNG', 'GIF', 'mp4', 'MP4');
        $fileIMGs = implode(",", $fileNames);

        if($fileNames){
            foreach($_FILES["img_guides"]["name"] as $key=>$val){
                $fileName = basename($_FILES["img_guides"]["name"][$key]);
                $targetFilePath = $targetDir . $fileName;
                $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

                // Allow certain file formats
                if(in_array($fileType, $allowTypes)){
                    // Upload file to server
                    if(move_uploaded_file($_FILES["img_guides"]["tmp_name"][$key], $targetFilePath)){
                        // Declaring the values for insert query
                        $insertValuesSQL = "('$writer', '".mysqli_real_escape_string($conn, $_POST["txt_title"])."','".mysqli_real_escape_string($conn, $_POST["txt_content"])."', '".$fileIMGs."', '$dateNow')";
                    }else{
                        $statusMsg = "Sorry, there was an error uploading your file.";
                        echo "<script> alert('$statusMsg'); </script>";
                    }
                }else{
                    $insertValuesSQL = "('$writer', '$_POST[txt_title]','$_POST[txt_content]', '".$fileIMGs."', '$dateNow')";
                }
            }
            
           

        }elseif(empty($fileNames)){
            //insertion of the values in the sql query
            $insertValuesSQL = "('$admin_id', '".mysqli_real_escape_string($conn, $_POST["txt_title"])."','".mysqli_real_escape_string($conn, $_POST["txt_content"])."', '".$fileIMGs."', '$dateNow')";
            
        }

        if(!empty($insertValuesSQL)){
            //insertion of the values in the sql query
            $insert = $conn->query("insert into tbl_guidelines (admin_id, fld_title, fld_content, fld_images, fld_datetime) values $insertValuesSQL");
            if($insert){
                $conn->query("insert into a_activity_log(admin_id, fld_activity, fld_datetime)values('$admin_id', ' has added a new travel guideline [ ".mysqli_real_escape_string($conn, $_POST["txt_title"])." ]', '$dateNow')");
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
        //----------------end- for uploading the other images of the guidelines and declaring the values for insert query------------------------
        
    }
    //-------------------------------------end- adding guidelines----------------------------------------------

    //-------------------start- deleting guidelines--------------------------------------
    elseif(isset($_GET['txtdel'])){
        $result = $conn->query("select * from tbl_guidelines where id like '$_GET[txtdel]'");
        while($row = $result->fetch_assoc()){
            $conn->query("insert into a_activity_log(admin_id, fld_activity, fld_datetime)values('$admin_id', ' has remove a travel guideline [ ".$row['fld_title']." ]', '$dateNow')");
        }

        $deleted = $conn->query("delete from tbl_guidelines where id like '$_GET[txtdel]'");

        if($deleted){
            $statusMsg = 'Deleted Successfully.';
            echo "<script> alert('$statusMsg'); location.href='guidelines.php';</script>";
        }
        
    }
    //-------------------end- deleting guidelines--------------------------------------

    //--------------------------start- getting the info of the guidelines through id------------------------------------
    elseif(isset($_GET['txtedit'])){
        $result = $conn -> query("select * from tbl_guidelines where id like '$_GET[txtedit]'");
        while($row = $result->fetch_assoc()){
            $title = $row["fld_title"];
            $content = $row["fld_content"];
        }
    }
    //--------------------------end- getting the info of the guidelines through id------------------------------------
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="guidelinestyle.css">
    <title>Manage Travel Guidelines</title>
</head>
<body>
    <div class="header" id="headercontainer">  
            <button type="button" class="btn btn-dark btn-lg" id="btn_menu"><span class="glyphicon glyphicon-menu-hamburger"></span></button>   
            <h2 id="headertitle">MANAGE TRAVEL GUIDELINES</h2>
        </div>
    <div id="container">
         
        <br><br>

        <!--viewing of inserted guidelines-->
        <div class='guidelinesdiv'>
            <br>
            <!--search feature-->
            <div class="searchdiv">
                <form action="guidelines.php" method="get">
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
                <button type="button" class="btn btn-info" id="btn_add_guides"><span class="glyphicon glyphicon-plus"></span> &nbsp;Add Guidelines</button>&nbsp;
            </div>

            <table class='table table-bordered'>
                
                <?php
                if($admintype != "Head Admin"){
                    if(isset($_GET["search_name"])){
                        $result =  $conn->query("select * from tbl_guidelines where admin_id like '$admin_id' and fld_title like '$_GET[search_name]%'");
                       
                    }else{
                        $result = $conn->query("select * from tbl_guidelines where admin_id like '$admin_id'");;
                        
                    }

                    echo "<tr>
                    <th>Title</th><th>Published Date and Time</th><th></th><th></th>
                    </tr>";

                    while($row = $result->fetch_assoc()){
                        echo "<tr>
                        <td>$row[fld_title]</td>
                        <td>$row[fld_datetime]</td>
                        <td style='text-align:center;'><button type='button' class='btn btn-warning' onclick=edit('$row[id]')><span class='glyphicon glyphicon-edit'></span></button></td>
                        <td style='text-align:center;'><button type='button' class='btn btn-danger' onclick=del('$row[id]')><span class='glyphicon glyphicon-trash'></span></button></td>
                        </tr>";
                    }

                }else{
                    if(isset($_GET["search_name"])){
                        $result =  $conn->query("select tbl_admin.fld_name, tbl_guidelines.id, tbl_guidelines.fld_title, tbl_guidelines.fld_datetime from tbl_guidelines, tbl_admin where tbl_guidelines.admin_id = tbl_admin.id and (tbl_guidelines.fld_title like '$_GET[search_name]%' or tbl_admin.fld_name like '$_GET[search_name]%')");
                       
                    }else{
                        $result = $conn->query("select tbl_admin.fld_name, tbl_guidelines.id, tbl_guidelines.fld_title, tbl_guidelines.fld_datetime from tbl_guidelines, tbl_admin where tbl_guidelines.admin_id = tbl_admin.id");;
                        
                    }

                    echo "<tr>
                    <th>Writer</th><th>Title</th><th>Published Date and Time</th><th></th><th></th>
                    </tr>";

                    while($row = $result->fetch_assoc()){
                        echo "<tr>
                        <td>$row[fld_name]</td>
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

        <!--modal for adding/editing guidelines-->
        <div class="modal" id="guides_modal" style="
        <?php
        if(isset($_GET["txtedit"])){
            echo 'display:flex;';
        }else{
            echo 'display:none;';
        }
        ?>
        
        ">
            <div id="div_add_guides">
            <?php
            if(isset($_GET["txtedit"])){
                echo '<h2>Edit Existing Guidelines</h2>';
            }else{
                echo '<h2>Add New Guidelines</h2>';
            }
            ?>
                <br>

                <form action="guidelines.php" method="post" enctype="multipart/form-data">
                <table width="100%">
                    <tr>
                        <td><label>Title:</label> <input type="text" name="txt_title" class="form-control" id="txt_title" value="<?php echo $title;?>" required><br></td>
                    </tr>
                    <tr>
                        <td><label>Content:</label> <textarea type="text" name="txt_content" class="form-control" id="txt_content" required><?php echo $content;?></textarea><br></td>
                    </tr>
                    <tr>
                        <td class="td_input"><label>Images:</label><input type="file" name="img_guides[]" class="form-control" id="img_guides" multiple><br></td>
                    </tr>
                </table>
                
                <div style="width:100%; text-align: right;">
                    <button type="button" class="btn btn-danger" id="btn_cancel">Cancel</button>
                    <?php
                        if(isset($_GET['txtedit'])){
                            echo "
                            <input type=hidden name=txt_id value=$_GET[txtedit]>
                            <button type='submit' class='btn btn-primary'><span class='glyphicon glyphicon-save'></span> &nbsp;Update Guidelines</button>";
                        }else{
                            echo "<button type='submit' class='btn btn-primary'><span class='glyphicon glyphicon-save'></span> &nbsp;Save Guidelines</button>";
                        }
                    ?> 
                    
                </div>
                </form>
            </div>
        </div>





    </div>
</body>
    <script src="guidelinescript.js"></script>
</html>