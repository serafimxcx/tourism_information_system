<?php

    include("../../connect.php");
    
    $username = mysqli_real_escape_string($conn, $_POST['txt_username']);
    $password = mysqli_real_escape_string($conn, $_POST['txt_password']);
    $email = mysqli_real_escape_string($conn, $_POST['txt_email']);
    $imgproof = mysqli_real_escape_string($conn, $_POST['txt_proof']);
    $admintype = mysqli_real_escape_string($conn, $_POST['slct_admintype']);

    $dateNow = date("Y-m-d");
    $verification_code = md5(uniqid(rand(), true));

    $checkuser = $conn->query("select * from tbl_users where fld_username like '$username'");
    $checkuseremail = $conn->query("select * from tbl_users where fld_email like '$email'");
        if(mysqli_num_rows($checkuser) == 0 && mysqli_num_rows($checkuseremail) == 0){
            

            $insert = $conn->query("insert into tbl_users(fld_type, fld_username, fld_password, fld_email, fld_code, fld_datejoin, fld_isVerified, fld_imgproof) values ('$admintype', '$username', '$password', '$email', 'None', '$dateNow', '0', '$imgproof')");
         

            if($insert){
                
                $response = array('success'=>true, 'message'=>"The admin will review your registration. Just wait for the verification in your email.");
                echo json_encode($response);
            }else{
                $response = array('success'=>true, 'message'=>"Registration Failed.");
                echo json_encode($response);
            }
            

        }else{
            $response = array('success'=>true, 'message'=>"Account is already existing. Please try again something new.");
            echo json_encode($response);
        }
   
    $conn->close();
?>