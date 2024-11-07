<?php 
    include("../../connect.php");
    session_start();

    $user_id = $_SESSION['user_id'];

    $targetDir = "../img_profile/";
    $fileName = basename($_FILES["img_profile"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    if(!empty($_FILES["img_profile"]["name"])){
        // Allow certain file formats
        $allowTypes = array('jpg','png','jpeg','gif','pdf', 'JPG', 'PNG', 'JPEG', 'GIF', 'PDF');
        if(in_array($fileType, $allowTypes)){
            // Upload file to server
            if(move_uploaded_file($_FILES["img_profile"]["tmp_name"], $targetFilePath)){
                // updating image file name into database
                $update = $conn->query("update tbl_users set fld_name = '".mysqli_real_escape_string($conn, $_POST["txt_name"])."', fld_about = '".mysqli_real_escape_string($conn, $_POST["txt_about"])."', fld_profpic = '".$fileName."' where id like '$user_id'");

                if($user_type == "Municipality" || $user_type == "Business"){
                    $conn->query("update tbl_admin set fld_name = '".mysqli_real_escape_string($conn, $_POST["txt_name"])."' where admin_user_id = '$user_id'");
                }
                if($update){
                    $response = array('success'=>true, 'message'=>"Profile Updated Successfully.");
                    echo json_encode($response);
                }else{
                    $response = array('success'=>false, 'message'=>"File upload failed, please try again.");
                    echo json_encode($response);
                } 
            }else{
                $response = array('success'=>false, 'message'=>"Sorry, there was an error uploading your file.");
                echo json_encode($response);
            }
        }else{
            $response = array('success'=>false, 'message'=>"Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.");
            echo json_encode($response);
        }
    }else{
        $update = $conn->query("update tbl_users set fld_name = '".mysqli_real_escape_string($conn, $_POST["txt_name"])."', fld_about = '".mysqli_real_escape_string($conn, $_POST["txt_about"])."' where id like '$user_id'");
                if($update){
                    $response = array('success'=>true, 'message'=>"Profile Updated Successfully.");
                    echo json_encode($response);
                }else{
                    $response = array('success'=>false, 'message'=>"File upload failed, please try again.");
                    echo json_encode($response);
                } 
    }


?>