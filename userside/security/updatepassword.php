<?php 
    include("../../connect.php");
    session_start();

    $user_id = $_SESSION['user_id'];

    $query = "select * from tbl_users where id='$user_id'";

    $result = mysqli_query($conn,$query) or die(mysqli_error($conn));

    $response="";

    while($row = mysqli_fetch_assoc($result)){
        if($row["fld_password"] != mysqli_real_escape_string($conn, $_POST["txt_currentpass"])){
            $response = "fail";
        }else{
            $queryupdate = "update tbl_users set fld_password='".mysqli_real_escape_string($conn, $_POST["txt_newpass"])."' where id='$user_id'";
            mysqli_query($conn,$queryupdate) or die(mysqli_error($conn));
            $response = "success";
        }
    }

    echo $response;
?>