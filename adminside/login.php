<?php 
    include("connect.php");
    session_start();
    //date and time now
    date_default_timezone_set('Asia/Manila');
    $dateNow = date("Y-m-d H:i:s");

    $user = "";
    $pass = "";
    $admin_id="";
    $admin_type="";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $inptuser = $_POST['txt_username'];
        $inptpass = $_POST['txt_password'];

        $result = $conn->query("select * from tbl_admin where fld_username like '$inptuser'");
        while($row = $result -> fetch_assoc()){
            $user = $row['fld_username'];
            $pass = $row['fld_password'];
            $admin_id = $row['id'];
            $admin_type = $row['fld_type'];
        }
        if($inptpass == "" || $inptuser =="") {
            $response = array('success'=>false,'message'=>'Login Failed. Wrong Input. Please Try Again.');

            header('Content-Type: application/json');
            echo json_encode($response);
        }
        elseif ($inptuser == $user && $inptpass == $pass) {
            $response = array('success'=>true, 'message'=>" You are successfully logged in. Welcome $inptuser");
            $_SESSION['adminusername'] = $inptuser;
            $_SESSION['admin_id'] = $admin_id;
            $_SESSION['admin_type'] = $admin_type;
            $conn->query("insert into a_activity_log(admin_id, fld_activity, fld_datetime)values('$admin_id', ' has logged in', '$dateNow')");
            
            header('Content-Type: application/json');
            echo json_encode($response);
        
        } else {
            $response = array('success'=>false, 'message'=>'Login Failed. Wrong Input. Please Try Again.');

            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }
?>