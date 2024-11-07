$(function(){
    $("#btn_menu").click(function(){
        if($("#navbar").css("display")=="none"){
            $("#navbar").css({"display":"block"});
            if (window.matchMedia('(max-width: 750px)').matches) {
                $("#btn_menu").css({"margin-left":"0"});
            } else {
                $("#btn_menu").css({"margin-left":"25%"});
            }
            
        }else if($("#navbar").css("display")=="block"){
            $("#navbar").css({"display":"none"});
            $("#btn_menu").css({"margin-left":"0"});
        }
    });

    $(".container").click(function(){
        $("#navbar").css({"display":"none"});
            $("#btn_menu").css({"margin-left":"0"});
    });

    $("#btn_cancel").click(function(){  
        if(confirm("Are you sure to cancel?")){
            window.location.href="/tourism_information_system/userside/userprofile/profile.php";
        }
    });

    $("#btn_changepass").click(function(){  
        if($("#txt_currentpass").val() == ""){
            alert("Blank Input.");
            $("#txt_currentpass").focus();
        }else if($("#txt_newpass").val() == ""){
            alert("Blank Input.");
            $("#txt_newpass").focus();
        }else if($("#txt_newpass2").val() == ""){
            alert("Blank Input.");
            $("#txt_newpass2").focus();
        }else if($("#txt_newpass2").val() != $("#txt_newpass").val()){
            alert("New Password does not match.");
            $("#txt_newpass2").focus();
        }else{
            UpdatePassword();
        }

       
    });

});

function UpdatePassword(){
    cParam = "";

    cParam = "txt_currentpass="+$("#txt_currentpass").val();
    cParam += "&txt_newpass="+$("#txt_newpass").val();

    $.ajax({
        "type":"POST",
        "url": "updatepassword.php",
        "data": cParam,
        "success": function(text){
            if(text == "success"){
                alert("Password Updated Successfully");
                window.location.href="/tourism_information_system/userside/userprofile/profile.php";
            }else{
                alert("Password Updated Unsuccessfully. Current password does not match.");
                $("#txt_currentpass").val("");
                $("#txt_newpass").val("");
                $("#txt_newpass2").val("");
            }
           
        }
    });

}