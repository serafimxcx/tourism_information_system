<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Forget Password</title>
</head>
<body class="fpw_body">
    <div class="fpw_container">
        <div class="fpw_div" id="inptemail_div">
            <h1 id="title">FordaTravel</h1>
            <hr>
            <br>
            <span>Enter your registered email: </span><br><br>
            <input type="text" name="txt_email_fpw" class="form-control" id="txt_email_fpw">
            <br>
            <button type="button" id="btn_sendcode" class="btn btn-success">Send Code</button><br><br>
            <b><span id="message"></span></b>

            <br><br>
        </div>

        <div class="fpw_div" id="changepass_div" style="display: none;">
            <h1 id="title">FordaTravel</h1>
            <hr>
            <br>
            <span>Enter Code: </span><br><br>
            <input type="text" name="txt_code" class="form-control" id="txt_code">
            <br>
            <span>New Password: </span><br><br>
            <input type="password" name="txt_password1" class="form-control" id="txt_password1">
            <br>
            <span>Re-type Password: </span><br><br>
            <input type="password" name="txt_password2" class="form-control" id="txt_password2">
            <br>
            <button type="button" id="btn_updatepass" class="btn btn-success">Update Password</button><br><br>
            <b><span id="message"></span></b>

            <br><br>
        </div>
    </div>

    <br><br>
</body>
    <script>
        $(function(){
            $("#btn_sendcode").click(function(){
                var emailPattern = /[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/;

                if($("#txt_email_fpw").val() == ""){
                    alert("Please enter your email.");
                    $("#txt_email_fpw").focus();

                }else if(emailPattern.test($("#txt_email_fpw").val()) == false){
                    alert("Invalid Email. Please try again.");
                    $("#txt_email_fpw").focus();
                }else{
                    var cParam = "user_email="+$("#txt_email_fpw").val();

                    $.ajax({
                        "type": "POST",
                        "url": "sendcode_fpw.php",
                        "data": cParam,
                        "success": function(text){
                            alert(text);
                            $("#message").html("");
                            $("#inptemail_div").css({"display":"none"});
                            $("#changepass_div").css({"display":"block"});
                        },
                        "beforeSend": function() {
                            $("#message").html("Loading...");
                            
                        }
                    });
                }
                
            });

            $("#btn_updatepass").click(function(){
                if($("#txt_code").val() == ""){
                    alert("Please enter the code that was sent to you.");
                    $("#txt_code").focus();
                }else if($("#txt_password1").val() == ""){
                    alert("Blank input. Please enter a password.");
                    $("#txt_password1").focus();
                }else if($("#txt_password2").val() == ""){
                    alert("Blank input. Please re-type your password.");
                    $("#txt_password2").focus();
                }else if($("#txt_password1").val() != $("#txt_password2").val()){
                    alert("Password does not match.");
                    $("#txt_password2").focus();
                }else{
                    var cParam = "";

                    cParam = "code="+$("#txt_code").val();
                    cParam += "&password="+$("#txt_password1").val();
                    cParam += "&email="+$("#txt_email_fpw").val();

                    $.ajax({
                        "type":"POST",
                        "url": "fpw_updatepass.php",
                        "data": cParam,
                        "success": function(text){
                            if(text !== ""){
                                alert(text);
                            }else{
                                alert("Password updated successfully.");
                                window.location.href="index.php?not_logged_in=true";
                            }

                        }
                    });
                }
            });
        });
    </script>
</html>