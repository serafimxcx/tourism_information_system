<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
include("connect.php");


$user_email = $_POST["user_email"];

$response="";

$query = "select * from tbl_users where fld_email like '$user_email'";

$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) == 0){
    $response = "Account does not exist.";
}else{
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
        $mail->addAddress($user_email);

        //email content
        $mail->isHTML(true);
        $mail->Subject = 'Code to change password (FordaTravel Account)';
        $mail->Body = "Copy the following code: $verification_code";
        
        // Send the email
        $mail->send();

        $conn->query("update tbl_users set fld_code = '$verification_code' where fld_email= '$user_email'");
    $response = "Code sent. Please check your email.";
}

echo $response;

?>