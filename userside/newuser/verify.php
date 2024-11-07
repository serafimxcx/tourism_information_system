<?php
    include("../../connect.php");

    $message = "";

    if(isset($_GET["code"])){
        $code = $_GET["code"];

        $result = $conn->query("select * from tbl_users where fld_code = '$code' LIMIT 1");

        while($row = $result->fetch_assoc()){
            if($row["fld_type"] == "Municipality" || $row["fld_type"] == "Business" ){
            
                $conn -> query("insert into tbl_admin(fld_type, fld_username, fld_password, fld_email, admin_user_id) values('$row[fld_type] Admin', '$row[fld_username]', '$row[fld_password]', '$row[fld_email]', '$row[id]')");
            }
                
        }

        $verify = $conn->query("update tbl_users set fld_isVerified = 1 where fld_code= '$code'");

        
        if($verify){
            $message = "<b>Congratulations!!!</b><br><br>Your account has been successfully verified.";
        }else{
            $message = "Verification Failed.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Verification</title>
    <link rel="stylesheet" href="newuserstyle.css">
</head>
<body>
    <div id="verifycontainer">
        <div id="verifydiv">
            <h1><?php echo $message; ?></h1>
            <br><br>
            <button type="button" id="btn_proceed">You can now proceed to login your account</button>
        </div>
    </div>
</body>
    <script src="newuserscript.js"></script>
</html>