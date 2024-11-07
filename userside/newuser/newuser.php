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
    <title>User Registration</title>
    <link rel="stylesheet" href="newuserstyle.css">
</head>
<body>
    
        <div class="container_fluid">
        <div class="row create_accdiv">
            <div class="col-lg-6 create_col">
            </div>

            <div class="col-lg-6 create_col">
                <div id="registrationdiv">
                    <form onload="return false;">
                        <h1 id="h1txt">Create your account</h1>
                        <h3>Join our community today and be guided with your travel.</h3>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="txt_username">Enter desired username</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control txt_create" name="txt_username" id="txt_username" >
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="txt_password">Enter desired password</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control txt_create" name="txt_password" id="txt_password" >
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-6" >
                                <label for="txt_password2">Retype password</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control txt_create" name="txt_password2" id="txt_password2" >
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="txt_email">Enter your email</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control txt_create" name="txt_email" id="txt_email">
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-sm-12">
                                <button type="button" id="btn_create">Create Account</button>
                            </div>
                        </div>
                    </form>
                    <br>
                    <div id="message" class="hidden">Please wait...</div>
                </div>
            </div>
        </div>
        </div>
   <!--footer-->
   <?php include_once("../../footer.php"); ?>
</body>
    <script src="newuserscript.js"></script>
</html>