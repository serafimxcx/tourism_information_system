<?php
    include("../../navbar.php");

    $name = "";
    $profpic = "";
    $user_profpic="";


    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $user_id = $_SESSION['user_id'];

        $result = $conn -> query("select * from tbl_users where fld_username like '$username'");
        while($row = $result->fetch_assoc()){
            if($row["fld_name"] == ""){
                $name = "";
            }else{
                $name = $row["fld_name"];
                $user_profpic = '../img_profile/'.$row["fld_profpic"];
            }
            
            
        }
    }else{
        // Redirect to the login page
       echo "<script>window.location.href='/tourism_information_system/index.php?not_logged_in=true';</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="securitystyle.css">
    <title>Change Password</title>
</head>
<body>
    <!--header-->
    <?php include_once("../../header.php"); ?>

    <div class="container fluid">
        <div class="contentdiv">
        <br>
            <div class="row" id="title_div">
                <div class="col-sm">
                    <h1 id="page-title">Change Password</h1>
                </div>
            </div>
            <hr>

            <div class="change_div">
                <table>
                    <tr>
                        <td style="vertical-align: middle;">Current Password: </td>
                        <td style="vertical-align: middle;"><input type="password" class="form-control txt_pass" id="txt_currentpass"></td>
                    </tr>
                    <tr>
                        <td style="vertical-align: middle;">New Password: </td>
                        <td style="vertical-align: middle;"><input type="password" class="form-control txt_pass" id="txt_newpass"></td>
                    </tr>
                    <tr>
                        <td style="vertical-align: middle;">Re-enter New Password: </td>
                        <td style="vertical-align: middle;"><input type="password" class="form-control txt_pass" id="txt_newpass2"></td>
                    </tr>
                </table>
                <br><br>
                <button type="button" class="btn_cpass" id="btn_cancel"> Cancel</button> 
                <button type="button" class="btn_cpass" id="btn_changepass"> Change Password</button>
                

            </div>


        </div>   
    </div>

    <br><br>
</body>
    <script src="securityscript.js"></script>
</html>