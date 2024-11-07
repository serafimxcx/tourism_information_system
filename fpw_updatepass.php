<?php 
    include("connect.php");

    $code = $_POST["code"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    $result = $conn->query("select * from tbl_users where fld_code like '$code' and fld_email like '$email'");

    if(mysqli_num_rows($result) == 0){
        echo "You entered a wrong code. $email - $code";
    }else{
        $query = "update tbl_users set fld_password='$password' where fld_code like '$code' and fld_email like '$email'";
        mysqli_query($conn, $query);

        echo "";
    }
?>