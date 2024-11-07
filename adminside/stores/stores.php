<?php
    include("../navbar.php");
    include("../connect.php");

    $name = "";
    $address = "";
    $latitude = "";
    $longitude = "";

    //date and time now
    date_default_timezone_set('Asia/Manila');
    $dateNow = date("Y-m-d H:i:s");

    //--------------start- updating existing store----------------------------------
    if(isset($_POST['txt_id'])){
        $targetDir = "uploaded_images/";
        $fileName = basename($_FILES["img_store"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

        if(!empty($_FILES["img_store"]["name"])){
            // Allow certain file formats
            $allowTypes = array('jpg','png','jpeg','gif','pdf');
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["img_store"]["tmp_name"], $targetFilePath)){
                    $result = $conn->query("select * from tbl_stores where id like '$_POST[txt_id]'");
                    while($row = $result->fetch_assoc()){
                        $conn->query("insert into a_activity_log(admin_id, fld_activity, fld_datetime)values('$admin_id', ' has updated a store [ ".$row['fld_name']." ] [ ".mysqli_real_escape_string($conn, $_POST["txt_name"])." ]', '$dateNow')");
                    }
                    // updating image file name into database
                    $update = $conn->query("update tbl_stores set fld_name = '".mysqli_real_escape_string($conn, $_POST["txt_name"])."', fld_address = '".mysqli_real_escape_string($conn, $_POST["txt_address"])."', fld_latitude = '$_POST[txt_latitude]', fld_longitude = '$_POST[txt_longitude]', fld_mainimage = '".$fileName."' where id like '$_POST[txt_id]'");
                    if($update){
                        $statusMsg = "Updated Successfully. ";
                        echo "<script> alert('$statusMsg'); </script>";
                    }else{
                        $statusMsg = "File upload failed, please try again. ";
                        echo "<script> alert('$statusMsg'); </script>";
                    } 
                }else{
                    $statusMsg = "Sorry, there was an error uploading your file.";
                    echo "<script> alert('$statusMsg'); </script>";
                }
            }else{
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload. ';
                echo "<script> alert('$statusMsg'); </script>";
            }
        }else{
            $result = $conn->query("select * from tbl_stores where id like '$_POST[txt_id]'");
            while($row = $result->fetch_assoc()){
                $conn->query("insert into a_activity_log(admin_id, fld_activity, fld_datetime)values('$admin_id', ' has updated a store [ ".$row['fld_name']." ] [ ".mysqli_real_escape_string($conn, $_POST["txt_name"])." ]', '$dateNow')");
            }

            $update = $conn->query("update tbl_stores set fld_name = '".mysqli_real_escape_string($conn, $_POST["txt_name"])."', fld_address = '".mysqli_real_escape_string($conn, $_POST["txt_address"])."', fld_latitude = '$_POST[txt_latitude]', fld_longitude = '$_POST[txt_longitude]' where id like '$_POST[txt_id]'");
            if($update){
                $statusMsg = "Updated Successfully. ";
                echo "<script> alert('$statusMsg'); </script>";
            }else{
                $statusMsg = "File upload failed, please try again. ";
                echo "<script> alert('$statusMsg'); </script>";
            } 
        }
    }
    //--------------end- updating existing store----------------------------------


    //--------------start- adding new store---------------------------
    elseif(isset($_POST['txt_name'])){
        $targetDir = "uploaded_images/";
        $fileName = basename($_FILES["img_store"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

        if(!empty($_FILES["img_store"]["name"])){
            // Allow certain file formats
            $allowTypes = array('jpg','png','jpeg','gif','pdf');
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["img_store"]["tmp_name"], $targetFilePath)){
                    // Insert image file name into database
                    $insert = $conn->query("insert into tbl_stores (admin_id, fld_name, fld_address, fld_latitude, fld_longitude, fld_mainimage) values ('$admin_id', '".mysqli_real_escape_string($conn, $_POST["txt_name"])."', '".mysqli_real_escape_string($conn, $_POST["txt_address"])."', '$_POST[txt_latitude]', '$_POST[txt_longitude]', '".$fileName."')");
                    if($insert){
                        $conn->query("insert into a_activity_log(admin_id, fld_activity, fld_datetime)values('$admin_id', ' has added a new store [ ".mysqli_real_escape_string($conn, $_POST["txt_name"])." ]', '$dateNow')");
                        $statusMsg = "Added Successfully. ";
                        echo "<script> alert('$statusMsg'); </script>";
                    }else{
                        $statusMsg = "File upload failed, please try again.";
                        echo "<script> alert('$statusMsg'); </script>";
                    } 
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
    }
    //--------------end- adding new store---------------------------

    //-------------------start- deleting store--------------------------------------
    elseif(isset($_GET['txtdel'])){
        $result = $conn->query("select * from tbl_stores where id like '$_GET[txtdel]'");
        while($row = $result->fetch_assoc()){
            $conn->query("insert into a_activity_log(admin_id, fld_activity, fld_datetime)values('$admin_id', ' has remove a store [ ".$row['fld_name']." ]', '$dateNow')");
        }
            
        $deleted = $conn->query("delete from tbl_stores where id like '$_GET[txtdel]'");

        if($deleted){
            $statusMsg = 'Deleted Successfully.';
            echo "<script> alert('$statusMsg'); location.href='stores.php';</script>";
        }
        
    }
    //-------------------end- deleting store--------------------------------------

    //--------------------------start- getting the info of the stores through id------------------------------------
    elseif(isset($_GET['txtedit'])){
        $result = $conn -> query("select * from tbl_stores where id like '$_GET[txtedit]'");
        while($row = $result->fetch_assoc()){
            $name = $row["fld_name"];
            $address = $row["fld_address"];
            $latitude = $row["fld_latitude"];
            $longitude = $row["fld_longitude"];
        }
    }
    //--------------------------end- getting the info of the stores through id------------------------------------
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="storestyle.css">
    <title>Manage Stores</title>
</head>
<body>
<div class="header" id="headercontainer">  
            <button type="button" class="btn btn-dark btn-lg" id="btn_menu"><span class="glyphicon glyphicon-menu-hamburger"></span></button>   
            <h2 id="headertitle">MANAGE STORES</h2>
        </div> 
    <div id="container">
        

        <br><br>

        <!--viewing of inserted stores-->
        <div class='storesdiv'>
        <br>
            <!--search feature-->
            <div class="searchdiv">
                <form action="stores.php" method="get">
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
                <button type="button" class="btn btn-info" id="btn_add_store"><span class="glyphicon glyphicon-plus"></span> &nbsp;Add Store</button>&nbsp;
            </div>

            <table class='table table-bordered'>
                <?php
                if($admintype != "Head Admin"){
                    if(isset($_GET["search_name"])){
                        $result =  $conn->query("select * from tbl_stores where admin_id like '$admin_id' and fld_name like '$_GET[search_name]%'");
                       
                    }else{
                        $result = $conn->query("select * from tbl_stores where admin_id like '$admin_id'");
                        
                    }

                    echo "<tr>
                    <th>Name</th><th>Address</th><th>Latitude</th><th>Longitude</th><th></th><th></th>
                    </tr>";

                    while($row = $result->fetch_assoc()){
                        echo "<tr>
                        <td>$row[fld_name]</td>
                        <td>$row[fld_address]</td>
                        <td>$row[fld_latitude]</td>
                        <td>$row[fld_longitude]</td>
                        <td style='text-align:center;'><button type='button' class='btn btn-warning' onclick=edit('$row[id]')><span class='glyphicon glyphicon-edit'></span></button></td>
                        <td style='text-align:center;'><button type='button' class='btn btn-danger' onclick=del('$row[id]')><span class='glyphicon glyphicon-trash'></span></button></td>
                        </tr>";
                    }

                    
                }else{
                    if(isset($_GET["search_name"])){
                        $result =  $conn->query("select tbl_admin.fld_name as admin_name, tbl_stores.id, tbl_stores.fld_name as store_name, tbl_stores.fld_address, tbl_stores.fld_latitude, tbl_stores.fld_longitude from tbl_stores, tbl_admin where tbl_stores.admin_id = tbl_admin.id and (tbl_stores.fld_name like '$_GET[search_name]%' or tbl_admin.fld_name like '$_GET[search_name]%')");
                       
                    }else{
                        $result = $conn->query("select tbl_admin.fld_name as admin_name, tbl_stores.id, tbl_stores.fld_name as store_name, tbl_stores.fld_address, tbl_stores.fld_latitude, tbl_stores.fld_longitude from tbl_stores, tbl_admin where tbl_stores.admin_id = tbl_admin.id");
                        
                    }

                    echo "<tr>
                    <th>Writer</th><th>Name</th><th>Address</th><th>Latitude</th><th>Longitude</th><th></th><th></th>
                    </tr>";

                    while($row = $result->fetch_assoc()){
                        echo "<tr>
                        <td>$row[admin_name]</td>
                        <td>$row[store_name]</td>
                        <td>$row[fld_address]</td>
                        <td>$row[fld_latitude]</td>
                        <td>$row[fld_longitude]</td>
                        <td style='text-align:center;'><button type='button' class='btn btn-warning' onclick=edit('$row[id]')><span class='glyphicon glyphicon-edit'></span></button></td>
                        <td style='text-align:center;'><button type='button' class='btn btn-danger' onclick=del('$row[id]')><span class='glyphicon glyphicon-trash'></span></button></td>
                        </tr>";
                    }
                    
                }
                ?>
            </table>    
        </div>

        <!--modal for adding/editing guidelines-->
        <div class="modal" id="stores_modal" style="
        <?php
        if(isset($_GET["txtedit"])){
            echo 'display:flex;';
        }else{
            echo 'display:none;';
        }
        ?>
        
        ">
            <div id="div_add_store">
            <?php
            if(isset($_GET["txtedit"])){
                echo '<h2>Edit Existing Store</h2>';
            }else{
                echo '<h2>Add New Store</h2>';
            }
            ?>
                <br>

                <form action="stores.php" method="post" enctype="multipart/form-data">
                <table width="100%">
                    <tr>
                        <td><label>Name: </label> <input type="text" name="txt_name" class="form-control" id="txt_name" value ="<?php echo $name;?>" required><br></td>
                    </tr>
                    <tr>
                        <td><label>Address: </label> <input type="text" name="txt_address" class="form-control" id="txt_address" value ="<?php echo $address;?>"  required><br></td>
                    </tr>
                    <tr>
                        <td><label>Latitude: </label> <input type="text" name="txt_latitude" class="form-control" id="txt_latitude" value ='<?php echo $latitude;?>'  required><br></td>
                    </tr>
                    <tr>
                    <td><label>Longitude</label><input type="text" name="txt_longitude" class="form-control" id="txt_longitude" value ='<?php echo $longitude;?>'  required><br></td>
                    </tr>
                    <tr>
                        <td><label>Image: </label> <input type="file" name="img_store" class="form-control" id="img_store" ><br></td>
                    </tr>
                </table>
                
                <div style="width:100%; text-align: right;">
                    <button type="button" class="btn btn-danger" id="btn_cancel">Cancel</button>
                    <?php
                        if(isset($_GET['txtedit'])){
                            echo "
                            <input type=hidden name=txt_id value=$_GET[txtedit]>
                            <button type='submit' class='btn btn-primary'><span class='glyphicon glyphicon-save'></span> &nbsp;Update Stores</button>";
                        }else{
                            echo "<button type='submit' class='btn btn-primary'><span class='glyphicon glyphicon-save'></span> &nbsp;Save Stores</button>";
                        }
                    ?> 
                    
                </div>
                </form>
            </div>
        </div>

    </div>
</body>
    <script src="storescript.js"></script>
</html>