<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../../PHPMailer/src/Exception.php';
    require '../../PHPMailer/src/PHPMailer.php';
    require '../../PHPMailer/src/SMTP.php';

    include("../../connect.php");
    
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['user_email']);
    $verification_code = md5(uniqid(rand(), true));

  
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

                echo "Verification Sent.";

                $conn->query("update tbl_users set fld_code = '$verification_code' where fld_username= '$username'");

            

        

    
    $conn->close();
?>