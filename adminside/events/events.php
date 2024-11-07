<?php
    include("../navbar.php");
    include("../connect.php");

    $statusMsg = "";
    $insertValuesSQL = "";
    $mainImage = "";
    $fileIMGs = "";

    $type="";
    $title="";
    $content="";
    $location="";
    $startdate="";
    $enddate="";


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
        $fileNames = array_filter($_FILES["img_events"]["name"]);
        $allowTypes = array('jpg','png','jpeg','gif','pdf');
        $fileIMGs = implode(",", $fileNames);

        if(!empty($fileNames) && $mainImage !== ""){
            foreach($_FILES["img_events"]["name"] as $key=>$val){
                $fileName = basename($_FILES["img_events"]["name"][$key]);
                $targetFilePath = $targetDir . $fileName;
                $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

                // Allow certain file formats
                if(in_array($fileType, $allowTypes)){
                    // Upload file to server
                    if(move_uploaded_file($_FILES["img_events"]["tmp_name"][$key], $targetFilePath)){
                        // Declaring the values for update query
                        $updateValuesSQL = "fld_type = '$_POST[slct_type]', fld_title = '".mysqli_real_escape_string($conn, $_POST["txt_title"])."', fld_content = '".mysqli_real_escape_string($conn, $_POST["txt_content"])."',   fld_mainimage = '".$mainImage."', fld_images = '".$fileIMGs."', fld_location = '$_POST[txt_location]', fld_startdate = '$_POST[txt_startdate]', fld_enddate = '$_POST[txt_enddate]' ";
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
            foreach($_FILES["img_events"]["name"] as $key=>$val){
                $fileName = basename($_FILES["img_events"]["name"][$key]);
                $targetFilePath = $targetDir . $fileName;
                $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

                // Allow certain file formats
                if(in_array($fileType, $allowTypes)){
                    // Upload file to server
                    if(move_uploaded_file($_FILES["img_events"]["tmp_name"][$key], $targetFilePath)){
                        // Declaring the values for update query
                        $updateValuesSQL = "fld_type = '$_POST[slct_type]', fld_title = '".mysqli_real_escape_string($conn, $_POST["txt_title"])."', fld_content = '".mysqli_real_escape_string($conn, $_POST["txt_content"])."', fld_images = '".$fileIMGs."', fld_location = '$_POST[txt_location]', fld_startdate = '$_POST[txt_startdate]', fld_enddate = '$_POST[txt_enddate]' ";
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
            $updateValuesSQL = "fld_type = '$_POST[slct_type]', fld_title = '".mysqli_real_escape_string($conn, $_POST["txt_title"])."', fld_content = '".mysqli_real_escape_string($conn, $_POST["txt_content"])."',   fld_mainimage = '".$mainImage."', fld_location = '$_POST[txt_location]', fld_startdate = '$_POST[txt_startdate]', fld_enddate = '$_POST[txt_enddate]' ";
           
        }elseif(empty($fileNames) && $mainImage == ""){
            //updating the values in the sql query
            $updateValuesSQL = "fld_type = '$_POST[slct_type]', fld_title = '".mysqli_real_escape_string($conn, $_POST["txt_title"])."', fld_content = '".mysqli_real_escape_string($conn, $_POST["txt_content"])."', fld_location = '$_POST[txt_location]', fld_startdate = '$_POST[txt_startdate]', fld_enddate = '$_POST[txt_enddate]' ";
           
        }

        if(!empty($updateValuesSQL)){
            $result = $conn->query("select * from tbl_events where id like '$_POST[txt_id]'");
                while($row = $result->fetch_assoc()){
                    $conn->query("insert into a_activity_log(admin_id, fld_activity, fld_datetime)values('$admin_id', ' has updated a destination [ ".$row['fld_title']." ] [ ".mysqli_real_escape_string($conn, $_POST["txt_title"])." ]', '$dateNow')");
                }
            //updating the values in the sql query
            $update = $conn->query("update tbl_events set $updateValuesSQL where id like '$_POST[txt_id]'");
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
        //----------------end- for uploading the other images of the events and declaring the values for update query------------------------
        
    }
    //-------------------end- updating existing event----------------------

    //--------------start- adding new event---------------------------
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
            $statusMsg = 'Upload Failed. Please select a file to upload for main image.';
            echo "<script> alert('$statusMsg'); window.location.href='events.php'; </script>";
        }
        //---------------end- for uploading the main image of the event---------------------
        

        //----------------start- for uploading the other images of the event and declaring the values for insert query------------------------
        $targetDir = "uploaded_otherimages/";        
        $fileNames = array_filter($_FILES["img_events"]["name"]);
        $allowTypes = array('jpg','png','jpeg','gif','pdf');
        $fileIMGs = implode(",", $fileNames);

        if($fileNames){
            foreach($_FILES["img_events"]["name"] as $key=>$val){
                $fileName = basename($_FILES["img_events"]["name"][$key]);
                $targetFilePath = $targetDir . $fileName;
                $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

                // Allow certain file formats
                if(in_array($fileType, $allowTypes)){
                    // Upload file to server
                    if(move_uploaded_file($_FILES["img_events"]["tmp_name"][$key], $targetFilePath)){
                        // Declaring the values for insert query
                        $insertValuesSQL = "('$admin_id', '$_POST[slct_type]', '".mysqli_real_escape_string($conn, $_POST["txt_title"])."','".mysqli_real_escape_string($conn, $_POST["txt_content"])."', '".$mainImage."', '".$fileIMGs."', '$_POST[txt_location]', '$_POST[txt_startdate]', '$_POST[txt_enddate]', '$dateNow')";
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
            $insertValuesSQL = "('$admin_id', '$_POST[slct_type]', '".mysqli_real_escape_string($conn, $_POST["txt_title"])."','".mysqli_real_escape_string($conn, $_POST["txt_content"])."', '".$mainImage."', '".$fileIMGs."', '$_POST[txt_location]', '$_POST[txt_startdate]', '$_POST[txt_enddate]', '$dateNow')";
        }
        
        if(!empty($insertValuesSQL) && !empty($mainImage)){
            //insertion of the values in the sql query
            $insert = $conn->query("insert into tbl_events (admin_id, fld_type, fld_title, fld_content, fld_mainimage, fld_images, fld_location, fld_startdate, fld_enddate, fld_datetime) values $insertValuesSQL");
            if($insert){
                $conn->query("insert into a_activity_log(admin_id, fld_activity, fld_datetime)values('$admin_id', ' has added a new event [ ".mysqli_real_escape_string($conn, $_POST["txt_title"])." ]', '$dateNow')");
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
    //--------------end- adding new event---------------------------

    //-------------------start- deleting event--------------------------------------
    elseif(isset($_GET['txtdel'])){
        $result = $conn->query("select * from tbl_events where id like '$_GET[txtdel]'");
        while($row = $result->fetch_assoc()){
            $conn->query("insert into a_activity_log(admin_id, fld_activity, fld_datetime)values('$admin_id', ' has remove an event [ ".$row['fld_title']." ]', '$dateNow')");
        }
            
        $deleted = $conn->query("delete from tbl_events where id like '$_GET[txtdel]'");

        if($deleted){
            $statusMsg = 'Deleted Successfully.';
            echo "<script> alert('$statusMsg'); location.href='events.php';</script>";
        }
        
    }
    //-------------------end- deleting event--------------------------------------

     //--------------------------start- getting the info of the event through id------------------------------------
     elseif(isset($_GET['txtedit'])){
        $result = $conn -> query("select * from tbl_events where id like '$_GET[txtedit]'");
        while($row = $result->fetch_assoc()){
            $type = $row["fld_type"];
            $title = $row["fld_title"];
            $content = $row["fld_content"];
            $location = $row["fld_location"];
            $startdate = $row["fld_startdate"];
            $enddate = $row["fld_enddate"];
        }
    }
    //--------------------------end- getting the info of the event through id------------------------------------
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="eventstyle.css">
    <title>Manage Events</title>
</head>
<body>
<div class="header" id="headercontainer">  
            <button type="button" class="btn btn-dark btn-lg" id="btn_menu"><span class="glyphicon glyphicon-menu-hamburger"></span></button>   
            <h2 id="headertitle">MANAGE EVENTS</h2>
        </div>
    <div id="container">
        
        <br><br>

        <!--viewing of inserted events-->
        <div class='eventsdiv'>
            <br>
            <!--search feature-->
            <div class="searchdiv">
                <form action="events.php" method="get">
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
                <button type="button" class="btn btn-info" id="btn_add_event"><span class="glyphicon glyphicon-plus"></span> &nbsp;Add New Event</button>&nbsp;
            </div>

            <table class='table table-bordered'>
                <?php
                if($admintype != "Head Admin"){
                    if(isset($_GET["search_name"])){
                        $result =  $conn->query("select * from tbl_events where admin_id like '$admin_id' and fld_title like '$_GET[search_name]%'");
                       
                    }else{
                        $result = $conn->query("select * from tbl_events where admin_id like '$admin_id'");
                        
                    }

                    echo "<tr>
                    <th>Type</th><th>Title</th><th>Location</th><th>Start Date</th><th>End Date</th><th>Published Date and Time</th><th></th><th></th>
                    </tr>";

                    while($row = $result->fetch_assoc()){
                        echo "<tr>
                        <td>$row[fld_type]</td>
                        <td>$row[fld_title]</td>
                        <td>$row[fld_location]</td>
                        <td>$row[fld_startdate]</td>
                        <td>$row[fld_enddate]</td>
                        <td>$row[fld_datetime]</td>
                        <td style='text-align:center;'><button type='button' class='btn btn-warning' onclick=edit('$row[id]')><span class='glyphicon glyphicon-edit'></span></button></td>
                        <td style='text-align:center;'><button type='button' class='btn btn-danger' onclick=del('$row[id]')><span class='glyphicon glyphicon-trash'></span></button></td>
                        </tr>";
                    }

                    
                }else{
                    if(isset($_GET["search_name"])){
                        $result =  $conn->query("select tbl_admin.fld_name, tbl_events.id, tbl_events.fld_type, tbl_events.fld_title, tbl_events.fld_title, tbl_events.fld_location, tbl_events.fld_startdate, tbl_events.fld_enddate, tbl_events.fld_datetime from tbl_events, tbl_admin where tbl_events.admin_id = tbl_admin.id and (tbl_events.fld_title like '$_GET[search_name]%' or tbl_admin.fld_name like '$_GET[search_name]%')");
                       
                    }else{
                        $result = $conn->query("select tbl_admin.fld_name, tbl_events.id, tbl_events.fld_type, tbl_events.fld_title, tbl_events.fld_title, tbl_events.fld_location, tbl_events.fld_startdate, tbl_events.fld_enddate, tbl_events.fld_datetime from tbl_events, tbl_admin where tbl_events.admin_id = tbl_admin.id");
                        
                    }

                    echo "<tr>
                    <th>Writer</th><th>Type</th><th>Title</th><th>Location</th><th>Start Date</th><th>End Date</th><th>Published Date and Time</th><th></th><th></th>
                    </tr>";

                    while($row = $result->fetch_assoc()){
                        echo "<tr>
                        <td>$row[fld_name]</td>
                        <td>$row[fld_type]</td>
                        <td>$row[fld_title]</td>
                        <td>$row[fld_location]</td>
                        <td>$row[fld_startdate]</td>
                        <td>$row[fld_enddate]</td>
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
        <div class="modal" id="events_modal" style="
        <?php
        if(isset($_GET["txtedit"])){
            echo 'display:flex;';
        }else{
            echo 'display:none;';
        }
        ?>
        
        ">
            <div id="div_add_event">
            <?php
            if(isset($_GET["txtedit"])){
                echo '<h2>Edit Existing Event</h2>';
            }else{
                echo '<h2>Add New Event</h2>';
            }
            ?>
                
                
                <br>

                <form action="events.php" method="post" enctype="multipart/form-data">
                    <table width="100%">
                        <tr>
                            <td width="50%"><label>Type of Event: &nbsp;&nbsp;</label>
                                <select name="slct_type" class="form-control" id="slct_type">
                                <option value="">Select...</option>
                                <option value="Festival" <?php if($type == "Festival"){ echo "selected";} ?>>Festival</option>
                                <option value="Fiesta" <?php if($type == "Fiesta"){ echo "selected";} ?>>Fiesta</option>
                                <option value="Others" <?php if($type == "Others"){ echo "selected";} ?>>Others</option>
                            </select><br></td>
                        </tr>
                        <tr>
                            <td width="100%"><label>Title: &nbsp;&nbsp;</label> <input type="text" name="txt_title" class="form-control" id="txt_title" value="<?php echo $title; ?>" required><br></td>
                        </tr>
                        <tr>
                            <td width="100%"><label>Content: &nbsp;&nbsp;</label> <textarea type="text" name="txt_content" class="form-control" id="txt_content" required><?php echo $content; ?></textarea><br></td>
                        </tr>
                        <tr>
                            <td width="100%"><label>Location: &nbsp;&nbsp;</label> <input type="text" name="txt_location" class="form-control" id="txt_location" value="<?php echo $location; ?>" required><br></td>
                        </tr>
                        <tr>
                            <td width="100%"><label>Start Date: &nbsp;&nbsp;</label> <input type="date" name="txt_startdate" class="form-control" id="txt_startdate" value="<?php echo $startdate; ?>"><br></td>
                        </tr>
                        <tr>
                            <td width="100%"><label>End Date: &nbsp;&nbsp;</label> <input type="date" name="txt_enddate" class="form-control" id="txt_enddate" value="<?php echo $enddate; ?>"><br></td>
                        </tr>
                        <tr>
                            <td class="td_input"><label>Featured Image:</label><input type="file" name="img_main" class="form-control" id="img_main"><br></td>
                        </tr>
                        <tr>
                            <td class="td_input"><label>Other Images:</label><input type="file" name="img_events[]" class="form-control" id="img_events" multiple><br></td>
                        </tr>
                    </table>
                    <div style="width:100%; text-align: right;">
                        <button type="button" class="btn btn-danger" id="btn_cancel">Cancel</button>
                        <?php
                            if(isset($_GET['txtedit'])){
                                echo "
                                <input type=hidden name=txt_id value=$_GET[txtedit]>
                                <button type='submit' class='btn btn-primary'><span class='glyphicon glyphicon-save'></span> &nbsp;Update Event</button>";
                            }else{
                                echo "<button type='submit' class='btn btn-primary'><span class='glyphicon glyphicon-save'></span> &nbsp;Save Event</button>";
                            }
                        ?> 
                       
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>
    <script src="eventscript.js"></script>
</html>