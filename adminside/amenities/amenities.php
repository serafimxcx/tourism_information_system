<?php
    include("../navbar.php");
    include("../connect.php");

    $statusMsg = "";
    $amenity = "";
    $roomfeat = "";

    //------------------------------START OF AMENITIES-------------------------------------

    //--------------start- updating existing amenity----------------------------------
    if(isset($_POST['txt_a_id'])){
        $targetDir = "uploaded_icons/amenities/";
        $fileName = basename($_FILES["img_a_icon"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

        if(!empty($_FILES["img_a_icon"]["name"])){
            // Allow certain file formats
            $allowTypes = array('jpg','png','jpeg','gif','pdf');
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["img_a_icon"]["tmp_name"], $targetFilePath)){
                    // updating image file name into database
                    $update = $conn->query("update tbl_amenities set fld_amenity = '$_POST[txt_amenity]', fld_a_icon = '".$fileName."' where id like '$_POST[txt_a_id]'");
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
            $statusMsg = 'Please select a file to upload.';
            echo "<script> alert('$statusMsg'); </script>";
        }
    }
    //--------------end- updating existing amenity----------------------------------

    //--------------start- adding new amenity---------------------------
    elseif(isset($_POST['txt_amenity'])){
        $targetDir = "uploaded_icons/amenities/";
        $fileName = basename($_FILES["img_a_icon"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

        if(!empty($_FILES["img_a_icon"]["name"])){
            // Allow certain file formats
            $allowTypes = array('jpg','png','jpeg','gif','pdf');
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["img_a_icon"]["tmp_name"], $targetFilePath)){
                    // Insert image file name into database
                    $insert = $conn->query("insert into tbl_amenities (fld_amenity, fld_a_icon) values ('$_POST[txt_amenity]', '".$fileName."')");
                    if($insert){
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
    //--------------end- adding new amenity---------------------------

    //-------------------start- deleting amenity--------------------------------------
    elseif(isset($_GET['txtdelamenity'])){
            
        $deleted = $conn->query("delete from tbl_amenities where id like '$_GET[txtdelamenity]'");

        if($deleted){
            $statusMsg = 'Deleted Successfully.';
            echo("<script> alert('$statusMsg'); location.href='amenities.php';    </script>");
        }
        
    }
    //-------------------end- deleting amenity--------------------------------------

    //--------------------------start- getting the info of the amenity through id------------------------------------
    elseif(isset($_GET['txteditamenity'])){
        $result = $conn -> query("select * from tbl_amenities where id like '$_GET[txteditamenity]'");
        while($row = $result->fetch_assoc()){
            $amenity = $row["fld_amenity"];
        }
    }
    //--------------------------end- getting the info of the amenity through id------------------------------------

    //------------------------------END OF AMENITIES-------------------------------------


    //------------------------------START OF ROOM FEATURES-------------------------------------

    //--------------start- updating existing room feature----------------------------------
    if(isset($_POST['txt_rf_id'])){
        $targetDir = "uploaded_icons/room_features/";
        $fileName = basename($_FILES["img_rf_icon"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

        if(!empty($_FILES["img_rf_icon"]["name"])){
            // Allow certain file formats
            $allowTypes = array('jpg','png','jpeg','gif','pdf');
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["img_rf_icon"]["tmp_name"], $targetFilePath)){
                    // updating image file name into database
                    $update = $conn->query("update tbl_roomfeats set fld_roomfeats = '$_POST[txt_roomfeat]', fld_rf_icon = '".$fileName."' where id like '$_POST[txt_rf_id]'");
                    if($update){
                        $statusMsg = "Updated Successfully.";
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
    //--------------end- updating existing room feature----------------------------------

     //----------------------start- adding new roomfeatures---------------------------
    elseif(isset($_POST['txt_roomfeat'])){
        $targetDir = "uploaded_icons/room_features/";
        $fileName = basename($_FILES["img_rf_icon"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

        if(!empty($_FILES["img_rf_icon"]["name"])){
            // Allow certain file formats
            $allowTypes = array('jpg','png','jpeg','gif','pdf');
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["img_rf_icon"]["tmp_name"], $targetFilePath)){
                    // Insert image file name into database
                    $insert = $conn->query("insert into tbl_roomfeats (fld_roomfeats, fld_rf_icon) values ('$_POST[txt_roomfeat]', '".$fileName."')");
                    if($insert){
                        $statusMsg = "Added Successfully. ";
                        echo "<script> alert('$statusMsg'); </script>";
                    }else{
                        $statusMsg = "File upload failed, please try again. ";
                        echo "<script> alert('$statusMsg'); </script>";
                    } 
                }else{
                    $statusMsg = "Sorry, there was an error uploading your file. ";
                    echo "<script> alert('$statusMsg'); </script>";
                }
            }else{
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload. ';
                echo "<script> alert('$statusMsg'); </script>";
            }
        }else{
            $statusMsg = 'Please select a file to upload. ';
            echo "<script> alert('$statusMsg'); </script>";
        }
    }
    //----------------------end- adding new roomfeatures---------------------------
    
    //-------------------start- deleting room feature--------------------------------------
    elseif(isset($_GET['txtdelroomfeat'])){
            
        $deleted = $conn->query("delete from tbl_roomfeats where id like '$_GET[txtdelroomfeat]'");

        if($deleted){
            $statusMsg = 'Deleted Successfully.';
            echo "<script> alert('$statusMsg'); location.href='amenities.php';  </script>";
        }
        
    }
    //-------------------end- deleting room feature--------------------------------------

    //--------------------------start- getting the info of the room feature through id------------------------------------
    elseif(isset($_GET['txteditroomfeat'])){
        $result = $conn -> query("select * from tbl_roomfeats where id like '$_GET[txteditroomfeat]'");
        while($row = $result->fetch_assoc()){
            $roomfeat = $row["fld_roomfeats"];
        }
    }
    //--------------------------end- getting the info of the room feature through id------------------------------------

    //------------------------------END OF ROOM FEATURES-------------------------------------
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="amenitystyle.css">
    <title>Manage Amenities and Room Features</title>
</head>
<body>
    <div class="header" id="headercontainer">
            <button type="button" class="btn btn-dark btn-lg" id="btn_menu"><span class="glyphicon glyphicon-menu-hamburger"></span></button>
            <h2 id="headertitle">MANAGE AMENITIES AND ROOM FEATURES</h2>
        </div>
    <div id="container">
        

        <br>

       <div class="a_rfcontainer">
            <!--viewing for inserted amenities-->
            <div class="a_rfdiv" id="amenitydiv">
                <table>
                    <tr>
                    <td><button type="button" class="btn btn-info" id="btn_addamenities" title="Add New Amenities"><span class="glyphicon glyphicon-plus"></span></button></td>
                        <td style="padding-right: 10px;"><h4>AMENITIES</h4></td>
                        
                    </tr>
                </table>
                <br>
                <table class="table table-bordered">
                    <tr>
                        <th>Icon</th><th>Amenity</th><th></th><th></th>
                    </tr>
                    <?php
                    $result = $conn->query("select * from tbl_amenities");
                    while($row=$result->fetch_assoc()){
                        $imageURL = 'uploaded_icons/amenities/'.$row["fld_a_icon"];
                        echo "
                        <tr>
                            <td style='text-align:center; width: 20%;'><img src='$imageURL' alt='Image' width='auto' height='30px' ></td>
                            <td style='width: 40%;'>$row[fld_amenity]</td>
                            <td style='text-align:center; width: 20%;'><button type='button' class='btn btn-warning' onclick=a_edit('$row[id]')><span class='glyphicon glyphicon-edit'></span></button></td>
                            <td style='text-align:center; width: 20%;'><button type='button' class='btn btn-danger' onclick=a_del($row[id])><span class='glyphicon glyphicon-trash'></span></button></td>
                            
                        </tr>
                        ";
                    }
                    ?>
                </table>
            </div>
            
            <!--viewing for inserted room features-->
            <div class="a_rfdiv" id="roomfeatdiv">
                <table>
                    <tr>
                    <td><button type="button" class="btn btn-info" id="btn_addroomfeats" title="Add New Room Features"><span class="glyphicon glyphicon-plus"></span></button></td>
                        <td style="padding-right: 10px;"><h4>ROOM FEATURES</h4></td>
                        
                    </tr>
                </table>
                    <br>
                <table class="table table-bordered">
                    <tr>
                        <th>Icon</th><th>Room Features</th><th></th><th></th>
                    </tr>
                    <?php
                    $result = $conn->query("select * from tbl_roomfeats");
                    while($row=$result->fetch_assoc()){
                        $imageURL = 'uploaded_icons/room_features/'.$row["fld_rf_icon"];
                        echo "
                        <tr>
                            <td style='text-align:center; width: 20%;'><img src='$imageURL' alt='Image' width='auto' height='30px' ></td>
                            <td style='width: 40%;'>$row[fld_roomfeats]</td>
                            <td style='text-align:center; width: 20%;'><button type='button' class='btn btn-warning' onclick=rf_edit('$row[id]')><span class='glyphicon glyphicon-edit'></span></button></td>
                            <td style='text-align:center; width: 20%;'><button type='button' class='btn btn-danger' onclick=rf_del($row[id])><span class='glyphicon glyphicon-trash'></span></button></td>
                            
                        </tr>
                        ";
                    }
                    ?>
                </table>
            </div>
       </div>
        
        <!--modal for adding/editing amenities-->
        <div class="modal" id="amenities_modal" style="
        <?php
        if(isset($_GET["txteditamenity"])){
            echo 'display:flex;';
        }else{
            echo 'display:none;';
        }
        ?>
        
        ">
            <div id="div_addamenities">
                <?php
                if(isset($_GET['txteditamenity'])){
                    echo "<h2>Edit Existing Amenity</h2>";
                }else{
                    echo "<h2>Add New Amenity</h2>";
                }
                ?>
                <br>
                <form action="amenities.php" method="post" enctype="multipart/form-data">
                    <label>Amenity: </label><br>
                    <input type="text" class="form-control" id="txt_amenity" name="txt_amenity" value='<?php echo $amenity;?>'><br>
                    <label>Icon: </label><br>
                    <input type="file" class="form-control" id="img_a_icon" name="img_a_icon"><br>
                    <div style="width:100%; text-align: right;">
                        <button type="button" class="btn btn-danger" id="btn_cancel1">Cancel</button>
                        <?php
                            if(isset($_GET['txteditamenity'])){
                                echo "
                                <input type=hidden name=txt_a_id value=$_GET[txteditamenity]>
                                <button type='submit' class='btn btn-primary'><span class='glyphicon glyphicon-save'></span> &nbsp;Update Amenity</button>";
                            }else{
                                echo "<button type='submit' class='btn btn-primary'><span class='glyphicon glyphicon-save'></span> &nbsp;Save Amenity</button>";
                            }
                        ?>
                    </div>
                </form>
                <br>
            </div>
        </div>
        
        <!--modal for adding/editing room feature-->
        <div class="modal" id="roomfeatures_modal" style="
        <?php
        if(isset($_GET["txteditroomfeat"])){
            echo 'display:flex;';
        }else{
            echo 'display:none;';
        }
        ?>
        
        ">
            <div id="div_addroomfeat">
                <?php
                if(isset($_GET['txteditroomfeat'])){
                    echo "<h2>Edit Existing Room Feature</h2>";
                }else{
                    echo "<h2>Add New Room Feature</h2>";
                }
                ?>
                <br>
                <form action="amenities.php" method="post" enctype="multipart/form-data">
                    <label>Room Feature: </label><br>
                    <input type="text" class="form-control" id="txt_roomfeat" name="txt_roomfeat" value='<?php echo $roomfeat;?>'><br>
                    <label>Icon: </label><br>
                    <input type="file" class="form-control" id="img_rf_icon" name="img_rf_icon"><br>
                    <div style="width:100%; text-align: right;">
                        <button type="button" class="btn btn-danger" id="btn_cancel2">Cancel</button>
                        <?php
                            if(isset($_GET['txteditroomfeat'])){
                                echo "
                                <input type=hidden name=txt_rf_id value=$_GET[txteditroomfeat]>
                                <button type='submit' class='btn btn-primary'><span class='glyphicon glyphicon-save'></span> &nbsp;Update Room Feature</button>";
                            }else{
                                echo "<button type='submit' class='btn btn-primary'><span class='glyphicon glyphicon-save'></span> &nbsp;Save Room Feature</button>";
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
    <script src="amenityroomfeatscript.js"></script>
</html>