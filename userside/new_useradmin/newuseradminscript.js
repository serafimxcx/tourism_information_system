$(function(){
    $("#btn_create").click(function(){
        $("#btn_create").attr("disabled",true);
        var emailPattern = /[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/;

        if($("#slct_admintype").val() == ""){
            alert("Choose whether you want to register as municipality or business.");
            $("#slct_admintype").focus();
            $("#btn_create").attr("disabled",false);
        }else if($("#txt_proof").val() == ""){
            alert("Image Proof is blank. Please input something.");
            $("#txt_proof").focus();
            $("#btn_create").attr("disabled",false);
        }else if($("#txt_username").val() == ""){
            alert("Username is blank. Please input something.");
            $("#txt_username").focus();
            $("#btn_create").attr("disabled",false);
        }else if($("#txt_password").val() == ""){
            alert("Password is blank. Please input something.");
            $("#txt_password").focus();
            $("#btn_create").attr("disabled",false);
        }else if($("#txt_email").val() == ""){
            alert("Email is blank. Please input something.");
            $("#txt_email").focus();
            $("#btn_create").attr("disabled",false);
        }else if(emailPattern.test($("#txt_email").val()) == false){
            alert("Invalid Email. Please try again.");
            $("#txt_email").focus();
            $("#btn_create").attr("disabled",false);
        }else if($("#txt_password").val() != $("#txt_password2").val()){
            alert("Password does not match.");
            $("#txt_password2").focus();
            $("#btn_create").attr("disabled",false);
        }else{
            var cParam = "";

            cParam = "txt_username="+$("#txt_username").val();
            cParam += "&txt_password="+$("#txt_password").val();
            cParam += "&txt_email="+$("#txt_email").val();
            cParam += "&slct_admintype="+$("#slct_admintype").val();
            cParam += "&txt_proof="+$("#txt_proof").val();

            $.ajax({
                "type": 'POST',
                "url": 'register_useradmin.php',
                "data": cParam,
                "dataType": 'json',
                "success": function (response) {
                    if(response.exist){
                        alert("Username already exist");
                        $("#message").addClass("hidden");
                        $("#btn_create").attr("disabled",false);
                        window.location.href="newuser.php";
                        
                    }
                    else if(response.success){
                        alert(response.message);
                        $("#message").addClass("hidden");
                        $("#btn_create").attr("disabled",false);
                        var pattern = /review your registration/;
                        if(pattern.test(response.message) == true){
                            window.location.href="/tourism_information_system/index.php?not_logged_in=true";
                        }else{
                            window.location.href="new_useradmin.php";
                        }
                        
                        
                    }
                    
                },
                "beforeSend":function() {
                    $("#message").html("Saving....");
                    $("#message").removeClass("hidden"); // Show message
                    
                }
            });
        }
        
        
    });

    $("#btn_proceed").click(function(){
        window.location.href = "/tourism_information_system/index.php?not_logged_in=true";
    });

    $(".profile_tip").click(function(){
        alert("How to find URL ID: \n1. Make sure the photo has a public access. \n2. Copy the link. \n3. Get the URL ID in the link. \n\nSample link: \nhttps://drive.google.com/file/d/1_Kg8wL1aztfoexPJmU9-3T_0uaHAqqoa/view?usp=sharing \n\nURL ID: \n1_Kg8wL1aztfoexPJmU9-3T_0uaHAqqoa ");
    });
});