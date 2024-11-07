<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../../PHPMailer/src/Exception.php';
    require '../../PHPMailer/src/PHPMailer.php';
    require '../../PHPMailer/src/SMTP.php';

    include("../../connect.php");
    
    $username = mysqli_real_escape_string($conn, $_POST['txt_username']);
    $password = mysqli_real_escape_string($conn, $_POST['txt_password']);
    $email = mysqli_real_escape_string($conn, $_POST['txt_email']);
    $dateNow = date("Y-m-d");
    $verification_code = md5(uniqid(rand(), true));

    $checkuser = $conn->query("select * from tbl_users where fld_username like '$username'");
    $checkuseremail = $conn->query("select * from tbl_users where fld_email like '$email'");
        if(mysqli_num_rows($checkuser) == 0 && mysqli_num_rows($checkuseremail) == 0){
            $mail = new PHPMailer(true);
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
                //server setting
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'coronado.webhost01@gmail.com'; // Your Gmail email address
                $mail->Password = 'lqofayezawqskvwb'; // Your Gmail password
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                //sender and recipient
                $mail->setFrom('coronado.webhost01@gmail.com', 'Admin-FordaTravel');
                $mail->addAddress($email, $username);

                //email content
                $mail->isHTML(true);
                $mail->Subject = 'Account Verification';
                $mail->Body = "Click the following link to verify your account: <a href='http://localhost/tourism_information_system/userside/newuser/verify.php?code=$verification_code'>Verify Account</a>";
                
                // Send the email
                $mail->send();

            $insert = $conn->query("insert into tbl_users(fld_type, fld_username, fld_password, fld_email, fld_code, fld_datejoin, fld_isVerified) values ('User', '$username', '$password', '$email', '$verification_code', '$dateNow', '0')");
         

            if($insert){
                
                $response = array('success'=>true, 'message'=>"Please check your email to successfully verify your account.");
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