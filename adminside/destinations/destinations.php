<?php
    include("../navbar.php");
    include("../connect.php");

    $statusMsg = "";
    $insertValuesSQL = "";
    $arr_Amenities = "";
    $arr_Roomfeats = "";
    $arr_socials = "";
    $mainImage = "";

    $name="";
    $type="";
    $description="";
    $address="";
    $contactno="";
    $email="";
    $latitude="";
    $longitude="";
    $price="";
    $operatinghours="";
    $amenities="";
    $roomfeats="";
    $socials="";
    $totaltxtsocial="1";

    //date and time now
    date_default_timezone_set('Asia/Manila');
    $dateNow = date("Y-m-d H:i:s");


    if(isset($_POST["checkAmenities"])){
        $arr_Amenities = implode(",", $_POST["checkAmenities"]);
    }

    if(isset($_POST["checkRoomfeats"])){
        $arr_Roomfeats = implode(",", $_POST["checkRoomfeats"]);
    }

    //-------------------start- updating existing destination----------------------

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
        //---------------end- for uploading the main image of the destination---------------------
        
        $arr_socials = implode(",", $_POST["txt_socials"]);
        $arr_type = implode(",", $_POST["checkType"]);

        //----------------start- for uploading the other images of the destination and declaring the values for insert query------------------------
       
        $targetDir = "uploaded_otherimages/";
        $fileNames = array_filter($_FILES["img_destinations"]["name"]);
        $allowTypes = array('jpg','png','jpeg','gif','pdf', 'JPG', 'JPEG', 'PNG', 'GIF');
        $fileIMGs = implode(",", $fileNames);

        if(!empty($fileNames) && $mainImage !== ""){
            foreach($_FILES["img_destinations"]["name"] as $key=>$val){
                $fileName = basename($_FILES["img_destinations"]["name"][$key]);
                $targetFilePath = $targetDir . $fileName;
                $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

                // Allow certain file formats
                if(in_array($fileType, $allowTypes)){
                    // Upload file to server
                    if(move_uploaded_file($_FILES["img_destinations"]["tmp_name"][$key], $targetFilePath)){
                        // Declaring the values for update query
                        $updateValuesSQL = "fld_name = '".mysqli_real_escape_string($conn, $_POST["txt_name"])."', fld_type = '".$arr_type."', fld_description = '".mysqli_real_escape_string($conn, $_POST["txt_description"])."', fld_address = '".mysqli_real_escape_string($conn, $_POST["txt_address"])."', fld_longitude = '".mysqli_real_escape_string($conn, $_POST["txt_longitude"])."', fld_latitude = '".mysqli_real_escape_string($conn, $_POST["txt_latitude"])."', fld_contactno = '".mysqli_real_escape_string($conn, $_POST["txt_contactno"])."', fld_email = '".mysqli_real_escape_string($conn, $_POST["txt_email"])."', fld_price = '".mysqli_real_escape_string($conn, $_POST["txt_price"])."', fld_operating = '".mysqli_real_escape_string($conn, $_POST["txt_operating"])."', fld_amenities = '".$arr_Amenities."',fld_roomfeats = '".$arr_Roomfeats."', fld_mainimage = '".$mainImage."', fld_images = '".$fileIMGs."', fld_socials = '".$arr_socials."' ";
                    }else{
                        $statusMsg = "Sorry, there was an error uploading your file.";
                        echo "<script> alert('$statusMsg'); </script>";
                    }
                }else{
                    $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
                    echo "<script> alert('$statusMsg'); </script>";
                }
            }
            

        }elseif($mainImage == "" && !empty($fileNames)){
            foreach($_FILES["img_destinations"]["name"] as $key=>$val){
                $fileName = basename($_FILES["img_destinations"]["name"][$key]);
                $targetFilePath = $targetDir . $fileName;
                $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

                // Allow certain file formats
                if(in_array($fileType, $allowTypes)){
                    // Upload file to server
                    if(move_uploaded_file($_FILES["img_destinations"]["tmp_name"][$key], $targetFilePath)){
                        // Declaring the values for update query
                        $updateValuesSQL = "fld_name = '".mysqli_real_escape_string($conn, $_POST["txt_name"])."', fld_type = '".$arr_type."', fld_description = '".mysqli_real_escape_string($conn, $_POST["txt_description"])."', fld_address = '".mysqli_real_escape_string($conn, $_POST["txt_address"])."', fld_longitude = '".mysqli_real_escape_string($conn, $_POST["txt_longitude"])."', fld_latitude = '".mysqli_real_escape_string($conn, $_POST["txt_latitude"])."', fld_contactno = '".mysqli_real_escape_string($conn, $_POST["txt_contactno"])."', fld_email = '".mysqli_real_escape_string($conn, $_POST["txt_email"])."', fld_price = '".mysqli_real_escape_string($conn, $_POST["txt_price"])."', fld_operating = '".mysqli_real_escape_string($conn, $_POST["txt_operating"])."', fld_amenities = '".$arr_Amenities."',fld_roomfeats = '".$arr_Roomfeats."', fld_images = '".$fileIMGs."', fld_socials = '".$arr_socials."' ";
                    }else{
                        $statusMsg = "Sorry, there was an error uploading your file.";
                        echo "<script> alert('$statusMsg'); </script>";
                    }
                }else{
                    $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
                    echo "<script> alert('$statusMsg'); </script>";
                }
            }
        }elseif(empty($fileNames) && $mainImage !== ""){
            $updateValuesSQL = "fld_name = '".mysqli_real_escape_string($conn, $_POST["txt_name"])."', fld_type = '".$arr_type."', fld_description = '".mysqli_real_escape_string($conn, $_POST["txt_description"])."', fld_address = '".mysqli_real_escape_string($conn, $_POST["txt_address"])."', fld_longitude = '".mysqli_real_escape_string($conn, $_POST["txt_longitude"])."', fld_latitude = '".mysqli_real_escape_string($conn, $_POST["txt_latitude"])."', fld_contactno = '".mysqli_real_escape_string($conn, $_POST["txt_contactno"])."', fld_email = '".mysqli_real_escape_string($conn, $_POST["txt_email"])."', fld_price = '".mysqli_real_escape_string($conn, $_POST["txt_price"])."', fld_operating = '".mysqli_real_escape_string($conn, $_POST["txt_operating"])."', fld_amenities = '".$arr_Amenities."',fld_roomfeats = '".$arr_Roomfeats."', fld_mainimage = '".$mainImage."', fld_socials = '".$arr_socials."' ";
        }elseif(empty($fileNames) && $mainImage == ""){
            $updateValuesSQL = "fld_name = '".mysqli_real_escape_string($conn, $_POST["txt_name"])."', fld_type = '".$arr_type."', fld_description = '".mysqli_real_escape_string($conn, $_POST["txt_description"])."', fld_address = '".mysqli_real_escape_string($conn, $_POST["txt_address"])."', fld_longitude = '".mysqli_real_escape_string($conn, $_POST["txt_longitude"])."', fld_latitude = '".mysqli_real_escape_string($conn, $_POST["txt_latitude"])."', fld_contactno = '".mysqli_real_escape_string($conn, $_POST["txt_contactno"])."', fld_email = '".mysqli_real_escape_string($conn, $_POST["txt_email"])."', fld_price = '".mysqli_real_escape_string($conn, $_POST["txt_price"])."', fld_operating = '".mysqli_real_escape_string($conn, $_POST["txt_operating"])."', fld_amenities = '".$arr_Amenities."',fld_roomfeats = '".$arr_Roomfeats."', fld_socials = '".$arr_socials."' ";
        }

        if(!empty($updateValuesSQL)){
            $result = $conn->query("select * from tbl_destinations where id like '$_POST[txt_id]'");
                while($row = $result->fetch_assoc()){
                    $conn->query("insert into a_activity_log(admin_id, fld_activity, fld_datetime)values('$admin_id', ' has updated a destination [ ".$row['fld_name']." ] [ ".mysqli_real_escape_string($conn, $_POST["txt_name"])." ]', '$dateNow')");
                }
            //insertion of the values in the sql query
            $update = $conn->query("update tbl_destinations set $updateValuesSQL where id like '$_POST[txt_id]'");
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
        //----------------end- for uploading the other images of the destination and declaring the values for insert query------------------------
        
    }
    //-------------------end- updating existing destination----------------------

    //--------------start- adding new hotel/resort---------------------------
    elseif(isset($_POST['txt_name'])){

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
            echo "<script> alert('$statusMsg'); </script>";
        }
        //---------------end- for uploading the main image of the destination---------------------
        
        $arr_socials = implode(",", $_POST["txt_socials"]);
        $arr_type = implode(",", $_POST["checkType"]);

        //----------------start- for uploading the other images of the destination and declaring the values for insert query------------------------
        $targetDir = "uploaded_otherimages/";        
        $fileNames = array_filter($_FILES["img_destinations"]["name"]);
        $allowTypes = array('jpg','png','jpeg','gif','pdf', 'JPG', 'JPEG', 'PNG', 'GIF');
        $fileIMGs = implode(",", $fileNames);

        if($fileNames){
            foreach($_FILES["img_destinations"]["name"] as $key=>$val){
                $fileName = basename($_FILES["img_destinations"]["name"][$key]);
                $targetFilePath = $targetDir . $fileName;
                $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

                // Allow certain file formats
                if(in_array($fileType, $allowTypes)){
                    // Upload file to server
                    if(move_uploaded_file($_FILES["img_destinations"]["tmp_name"][$key], $targetFilePath)){
                        // Declaring the values for insert query
                        $insertValuesSQL = "('$admin_id', '".mysqli_real_escape_string($conn, $_POST["txt_name"])."', '".$arr_type."','".mysqli_real_escape_string($conn, $_POST["txt_description"])."','".mysqli_real_escape_string($conn, $_POST["txt_address"])."','".mysqli_real_escape_string($conn, $_POST["txt_longitude"])."','".mysqli_real_escape_string($conn, $_POST["txt_latitude"])."','".mysqli_real_escape_string($conn, $_POST["txt_contactno"])."','".mysqli_real_escape_string($conn, $_POST["txt_email"])."','".mysqli_real_escape_string($conn, $_POST["txt_price"])."', '".mysqli_real_escape_string($conn, $_POST["txt_operating"])."', '".$arr_Amenities."','".$arr_Roomfeats."', '".$mainImage."', '".$fileIMGs."', '".$arr_socials."')";
                    }else{
                        $statusMsg = "Sorry, there was an error uploading your file.";
                        echo "<script> alert('$statusMsg'); </script>";
                    }
                }else{
                    $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
                    echo "<script> alert('$statusMsg'); </script>";
                }
            }
            
            if(!empty($insertValuesSQL)){
                //insertion of the values in the sql query
                $insert = $conn->query("insert into tbl_destinations (admin_id, fld_name, fld_type, fld_description, fld_address, fld_longitude, fld_latitude, fld_contactno, fld_email, fld_price, fld_operating, fld_amenities, fld_roomfeats, fld_mainimage, fld_images, fld_socials) values $insertValuesSQL");
                if($insert){
                    $conn->query("insert into a_activity_log(admin_id, fld_activity, fld_datetime)values('$admin_id', ' has added a new destination [ ".mysqli_real_escape_string($conn, $_POST["txt_name"])." ]', '$dateNow')");
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

        }else{
            $statusMsg = 'Please select a file to upload.';
            echo "<script> alert('$statusMsg'); </script>";
        }
        //----------------end- for uploading the other images of the destination and declaring the values for insert query------------------------
        
    }
    //--------------end- adding new hotel/resort---------------------------

    //-------------------start- deleting destination--------------------------------------
    elseif(isset($_GET['txtdel'])){
        $result = $conn->query("select * from tbl_destinations where id like '$_GET[txtdel]'");
        while($row = $result->fetch_assoc()){
            $conn->query("insert into a_activity_log(admin_id, fld_activity, fld_datetime)values('$admin_id', ' has remove a destination [ ".$row['fld_name']." ]', '$dateNow')");
        }
        
        $deleted = $conn->query("delete from tbl_destinations where id like '$_GET[txtdel]'");

        if($deleted){
            $statusMsg = 'Deleted Successfully.';
            echo "<script> alert('$statusMsg'); location.href='destinations.php';</script>";
        }
        
    }
    //-------------------end- deleting destination--------------------------------------
    
    //--------------------------start- getting the info of the destination through id------------------------------------
    elseif(isset($_GET['txtedit'])){
        $result = $conn -> query("select * from tbl_destinations where id like '$_GET[txtedit]'");
        while($row = $result->fetch_assoc()){
            $name = $row["fld_name"];
            $description = $row["fld_description"];
            $address = $row["fld_address"];
            $contactno = $row["fld_contactno"];
            $email = $row["fld_email"];
            $latitude = $row["fld_latitude"];
            $longitude = $row["fld_longitude"];
            $price = $row["fld_price"];
            $operatinghours = $row["fld_operating"];
            $amenities = explode(",", $row["fld_amenities"]);
            $roomfeats = explode(",",$row["fld_roomfeats"]);
            $socials = explode(",", $row["fld_socials"]);
            $type = explode(",", $row["fld_type"]);
        }
    }
    //--------------------------end- getting the info of the destination through id------------------------------------

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="destinationstyle.css">
    <title>Manage Destinations</title>
</head>
<body>
<div class="header" id="headercontainer">  
            <button type="button" class="btn btn-dark btn-lg" id="btn_menu" 
            <?php 
                if($_SESSION["admin_type"] == "Business Admin"){
                    echo "style='display: none;'";
                }?>
            ><span class="glyphicon glyphicon-menu-hamburger"></span></button>   
            <h2 id="headertitle">MANAGE DESTINATIONS</h2>
        </div>
    <div id="container">
        
        <br>
        <!--viewing of inserted destinations-->
        <div class="destination_container">
        <br>
          
            <div class='destinationdiv'>
                <br>
                <!--search feature-->
                <div class="searchdiv">
                    <form action="destinations.php" method="get">
                        <table>
                            <tr>
                                <td style="padding-top: 3px;"><span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;<label> Search: </label>&nbsp;</td>
                                <td><input type="text" class="form-control" name="search_name" onchange="this.form.submit()"> </td>
                            </tr>
                        </table>
                        
                    </form>
                </div>
                <br>
                <hr>
                <br>
                <div id="addbtndiv" 
                <?php 
                    if($_SESSION["admin_type"] == "Business Admin"){
                        $result = $conn->query("select * from tbl_destinations where admin_id = '$_SESSION[admin_id]'");

                        if(mysqli_num_rows($result) == 1){
                            echo "style='display: none'";
                        }else{
                            echo "style='display: block'";
                        }
                    }
                
                ?>>
                    <button type="button" class="btn btn-info" id="btn_add_destination"><span class="glyphicon glyphicon-plus"></span> &nbsp;Add New Destination</button>&nbsp;
                </div>
                <table class='table table-bordered'>
                        
                        <?php
                            if($admintype != "Head Admin"){
                                if(isset($_GET["search_name"])){
                                    $result =  $conn->query("select * from tbl_destinations where admin_id like '$admin_id' and fld_name like '$_GET[search_name]%'");
                                   
                                }else{
                                    $result = $conn->query("select * from tbl_destinations where admin_id like '$admin_id'");
                                    
                                }

                                echo "<tr>
                                <th>Destination</th><th>Type</th><th>Price Range</th><th>Address</th><th>Latitude</th><th>Longitude</th><th>Contact</th><th></th><th></th>
                                </tr>";
    
                                while($row = $result->fetch_assoc()){
                                    echo "<tr>
                                    <td>$row[fld_name]</td>
                                    <td>$row[fld_type]</td>
                                    <td>$row[fld_price]</td>
                                    <td>$row[fld_address]</td>
                                    <td>$row[fld_latitude]</td>
                                    <td>$row[fld_longitude]</td>
                                    <td>$row[fld_contactno]</td>
                                    <td style='text-align:center;'><button type='button' class='btn btn-warning' onclick=edit('$row[id]')><span class='glyphicon glyphicon-edit'></span></button></td>
                                    <td style='text-align:center;'><button type='button' class='btn btn-danger' onclick=del('$row[id]')><span class='glyphicon glyphicon-trash'></span></button></td>
                                    </tr>";
                                }
            
                                
                            }else{
                                if(isset($_GET["search_name"])){
                                    $result =  $conn->query("select tbl_admin.fld_name as admin_name, tbl_destinations.id, tbl_destinations.fld_name as destination_name, tbl_destinations.fld_type, tbl_destinations.fld_price, tbl_destinations.fld_address, tbl_destinations.fld_latitude, tbl_destinations.fld_longitude, tbl_destinations.fld_contactno from tbl_destinations, tbl_admin where tbl_destinations.admin_id = tbl_admin.id and (tbl_destinations.fld_name like '$_GET[search_name]%' or tbl_admin.fld_name like '$_GET[search_name]%')");
                                   
                                }else{
                                    $result = $conn->query("select tbl_admin.fld_name as admin_name, tbl_destinations.id, tbl_destinations.fld_name as destination_name, tbl_destinations.fld_type, tbl_destinations.fld_price, tbl_destinations.fld_address, tbl_destinations.fld_latitude, tbl_destinations.fld_longitude, tbl_destinations.fld_contactno from tbl_destinations, tbl_admin where tbl_destinations.admin_id = tbl_admin.id");
                                    
                                }

                                echo "<tr>
                                <th>Writer</th><th>Destination</th><th>Type</th><th>Price Range</th><th>Address</th><th>Latitude</th><th>Longitude</th><th>Contact</th><th></th><th></th>
                                </tr>";
    
                                while($row = $result->fetch_assoc()){
                                    echo "<tr>
                                    <td>$row[admin_name]</td>
                                    <td>$row[destination_name]</td>
                                    <td>$row[fld_type]</td>
                                    <td>$row[fld_price]</td>
                                    <td>$row[fld_address]</td>
                                    <td>$row[fld_latitude]</td>
                                    <td>$row[fld_longitude]</td>
                                    <td>$row[fld_contactno]</td>
                                    <td style='text-align:center;'><button type='button' class='btn btn-warning' onclick=edit('$row[id]')><span class='glyphicon glyphicon-edit'></span></button></td>
                                    <td style='text-align:center;'><button type='button' class='btn btn-danger' onclick=del('$row[id]')><span class='glyphicon glyphicon-trash'></span></button></td>
                                    </tr>";
                                }
                                
                            }

                            
                        
                        ?>
                </table>
            </div>
        </div>

        <!--modal for adding/editing hotels or resorts-->
        <div class="modal" id="destination_modal" style="
        <?php
        if(isset($_GET["txtedit"])){
            echo 'display:flex;';
        }else{
            echo 'display:none;';
        }
        ?>
        
        ">
            <div id="div_add_destination">
                <?php
                if(isset($_GET['txtedit'])){
                    echo "<h2>Edit Existing Destination</h2>";
                }else{
                    echo "<h2>Add New Destination</h2>";
                }
                ?>
                <br>
                <form action="destinations.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm">
                        <label>Name: </label> <input type="text"  class="form-control" name="txt_name" id="txt_name" value="<?php echo $name; ?>" required>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <label>Type:</label><br><br>
                        <div class="col-sm">
                            <table>
                                <tr>
                                    <td><input type="checkbox" name="checkType[]" id="checkType[]" value='Hotel' <?php if(isset($_GET['txtedit'])){foreach($type as $values){ if($values == 'Hotel'){ echo "checked"; } }} ?>>&nbsp;&nbsp;<br><br></td>
                                    <td>Hotel<br><br></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkType[]" id="checkType[]" value='Resort' <?php if(isset($_GET['txtedit'])){foreach($type as $values){ if($values == 'Resort'){ echo "checked"; } }} ?>><br><br></td>
                                    <td>Resort<br><br></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkType[]" id="checkType[]" value='Restaurant' <?php if(isset($_GET['txtedit'])){foreach($type as $values){ if($values == 'Restaurant'){ echo "checked"; } }} ?>><br><br></td>
                                    <td>Restaurant<br><br></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkType[]" id="checkType[]" value='Pasalubong Center' <?php if(isset($_GET['txtedit'])){foreach($type as $values){ if($values == 'Pasalubong Center'){ echo "checked"; } }} ?>><br><br></td>
                                    <td>Pasalubong Center<br><br></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-sm">
                            <table>
                                    <tr>
                                        <td><input type="checkbox" name="checkType[]" id="checkType[]" value='Historical Landmark' <?php if(isset($_GET['txtedit'])){foreach($type as $values){ if($values == 'Historical Landmark'){ echo "checked"; } }} ?>>&nbsp;&nbsp;<br><br></td>
                                        <td>Historical Landmark<br><br></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="checkType[]" id="checkType[]" value='Museum' <?php if(isset($_GET['txtedit'])){foreach($type as $values){ if($values == 'Museum'){ echo "checked"; } }} ?>><br><br></td>
                                        <td>Museum<br><br></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="checkType[]" id="checkType[]" value='Natural Wonder' <?php if(isset($_GET['txtedit'])){foreach($type as $values){ if($values == 'Natural Wonder'){ echo "checked"; } }} ?>><br><br></td>
                                        <td>Natural Wonder<br><br></td>
                                    </tr>
                                </table>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-sm">
                            <label>Description</label><textarea name="txt_description" class="form-control" id="txt_description" maxlength="60000"><?php echo $description;?></textarea>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-sm">
                            <label>Email: </label> <input type="text"  class="form-control" name="txt_email" id="txt_email" value="<?php echo $email; ?>" required>
                        </div>
                        <div class="col-sm">
                            <label>Contact Number: </label> <input type="text"  class="form-control" name="txt_contactno" id="txt_contactno" value="<?php echo $contactno; ?>" required>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-sm">
                            <label>Address: </label> <input type="text"  class="form-control" name="txt_address" id="txt_address" value="<?php echo $address; ?>" required>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-sm">
                            <label>Latitude: </label> <input type="text"  class="form-control" name="txt_latitude" id="txt_latitude" value="<?php echo $latitude; ?>" required> 
                        </div><br>
                        <div class="col-sm">
                            <label>Longitude: </label> <input type="text"  class="form-control" name="txt_longitude" id="txt_longitude" value="<?php echo $longitude; ?>" required>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-sm">
                            <label>Price Range: </label> <input type="text"  class="form-control" name="txt_price" id="txt_price" placeholder="Php 0.00 - 0.00" value="<?php echo $price; ?>" required>
                        </div><br>
                        <div class="col-sm">
                            <label>Operating Hours: </label> <input type="text"  class="form-control" name="txt_operating" id="txt_operating" placeholder="0:00am to 0:00pm, 24 hours" value="<?php echo $operatinghours; ?>" required>
                        </div>
                    </div><br><br>
                    <div class="row">
                        <div class="col-sm">
                            <label>Amenities:</label><br><br>
                            <table>
                                <?php
                                    $result = $conn->query("select * from tbl_amenities");
                            
                                    if(isset($_GET['txtedit'])){
                                        while($row = $result->fetch_assoc()){
                                            echo "
                                            <tr><td><input type=checkbox name=checkAmenities[] id=checkAmenities value='$row[fld_amenity]'";
                                            foreach($amenities as $values){
                                                if($values == $row["fld_amenity"]){
                                                    echo "checked";
                                                }
                                            }
                                            echo "><br><br></td>
                                            <td>&nbsp;&nbsp; $row[fld_amenity] <br><br></td>
                                            </tr>
                                            ";
                                        }
                                    }else{
                                        while($row = $result->fetch_assoc()){
                                            echo "
                                            <tr><td><input type=checkbox name=checkAmenities[] id=checkAmenities value='$row[fld_amenity]'><br><br></td>
                                            <td>&nbsp;&nbsp; $row[fld_amenity] <br><br></td>
                                            </tr>
                                        ";
                                        }
                                    }
                                
                                ?>
                            </table>
                        </div>
                        <div class="col-sm">
                            <label>Room Features</label><br><br>
                            <table>
                                <?php
                                $result = $conn->query("select * from tbl_roomfeats");
                                if(isset($_GET['txtedit'])){
                                    while($row = $result->fetch_assoc()){
                                        echo "
                                        <tr><td><input type=checkbox name=checkRoomfeats[] id=checkRoomfeats value='$row[fld_roomfeats]'";
                                        foreach($roomfeats as $values){
                                            if($values == $row["fld_roomfeats"]){
                                                echo "checked";
                                            }
                                        }
                                        echo "><br><br></td>
                                        <td>&nbsp;&nbsp; $row[fld_roomfeats] <br><br></td>
                                        </tr>
                                        ";
                                    }
                                }else{
                                    while($row = $result->fetch_assoc()){
                                        echo "
                                        <tr><td><input type=checkbox name=checkRoomfeats[] id=checkRoomfeats value='$row[fld_roomfeats]'><br><br></td>
                                        <td>&nbsp;&nbsp; $row[fld_roomfeats] <br><br></td>
                                        </tr>
                                        ";
                                    }
                                }
                                
                                ?>
                            </table>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-sm">
                            <label>Featured Image:</label><input type="file" class="form-control" name="img_main" id="img_main">
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-sm">
                            <label>Other Images:</label><input type="file" class="form-control" name="img_destinations[]" id="img_destination" multiple>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-sm">
                            <label>Socials</label>
                                <?php 
                                    if(isset($_GET['txtedit'])){
                                        foreach($socials as $values){
                                            echo "<input type='text' class='form-control' name='txt_socials[]' id='txt_socials$totaltxtsocial' value='$values'><br id='new_id$totaltxtsocial'>";
                                            $totaltxtsocial += 1;
                                            
                                        }

                                        $totaltxtsocial -= 1;
                                        echo "<div id='newtxtsocial'></div>
                                        <input type='hidden' value='$totaltxtsocial' id='totaltxtsocial'>
                                        <button type='button' class='btn btn-secondary' id='btn_addsocial_edt'>Add another social</button>
                                        <button type='button' class='btn btn-secondary' id='btn_removesocial_edt'>Remove social</button>";

                                    }else{
                                        echo "<input type='text' class='form-control' name='txt_socials[]' id='txt_socials'><br>
                                        <div id='newtxtsocial'></div>
                                        <input type='hidden' value='$totaltxtsocial' id='totaltxtsocial'>
                                        <button type='button' class='btn btn-secondary' id='btn_addsocial'>Add another social</button>
                                        <button type='button' class='btn btn-secondary' id='btn_removesocial'>Remove social</button>";
                                    }
                                ?>
                        </div>
                    </div>

                    <div style="width:100%; text-align: right;">
                        <button type="button" class="btn btn-danger" id="btn_cancel">Cancel</button>
                        <?php
                            if(isset($_GET['txtedit'])){
                                echo "
                                <input type=hidden name=txt_id value=$_GET[txtedit]>
                                <button type='submit' class='btn btn-primary'><span class='glyphicon glyphicon-save'></span> &nbsp;Update Destination</button>";
                            }else{
                                echo "<button type='submit' class='btn btn-primary'><span class='glyphicon glyphicon-save'></span> &nbsp;Save Destination</button>";
                            }
                        ?> 
                       
                    </div>
                </form>
                <br>
            </div>
        </div>
        <br><br>
    </div>
</body>
    <script src="destinationscript.js"></script>
</html>