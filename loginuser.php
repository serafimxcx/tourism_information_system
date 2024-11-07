<?php 
    include("connect.php");
    session_start();

    $user = "";
    $pass = "";
    $user_type="";
    $admin_id = "";
    $admin_type="";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $inptuser = $_POST['txt_username'];
        $inptpass = $_POST['txt_password'];

        $result = $conn->query("select * from tbl_users where fld_username like '$inptuser'");
        while($row = $result -> fetch_assoc()){
            $id = $row['id'];
            $user = $row['fld_username'];
            $pass = $row['fld_password'];
            $isVerified = $row['fld_isVerified'];
            $user_type = $row['fld_type'];
        }

        if($inptpass == "" || $inptuser =="") {
            $response = array('success'=>false,'message'=>'Login Failed. Blank Input. Please Try Again. ');

            header('Content-Type: application/json');
            echo json_encode($response);
        }
        
     
        elseif ($inptuser == $user && $inptpass == $pass) {
            if($isVerified == 0){
                $response = array('success'=>false,'message'=>'Login Failed. Account not verified. Please check your email for verification. ');

            }else{
                $response = array('success'=>true, 'message'=>" You are successfully logged in. Welcome $inptuser");
                $_SESSION['username'] = $inptuser;
                $_SESSION['user_id'] = $id;
                $_SESSION['user_type'] = $user_type;

                if($user_type == "Municipality" || $user_type == "Business"){
                    $result = $conn->query("select * from tbl_admin where fld_username like '$inptuser'");
                    while($row = $result -> fetch_assoc()){
                        $admin_id = $row['id'];
                        $admin_type = $row['fld_type'];
                    }

                    $_SESSION['admin_id'] = $admin_id;
                    $_SESSION['admin_type'] = $admin_type;
                    $_SESSION['adminusername'] = $inptuser;
                }

            }
            
            
            header('Content-Type: application/json');
            echo json_encode($response);
        
        }
        else {
            $response = array('success'=>false, 'message'=>'Login Failed. Wrong Input. Please Try Again.');

            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }
?>