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

    $("#container").click(function(){
        $("#navbar").css({"display":"none"});
            $("#btn_menu").css({"margin-left":"0"});
    });
});

function del(id){ //confirms the user if they want to delete a specific users
    if(confirm("Are you sure you want to close this account? ")){
        window.location.href = "user_accounts.php?txtdel=" + id;
    }
}

function sendEmail(email, username){
   cParam="";
   cParam = "user_email="+email;
   cParam += "&username="+username;

   $.ajax({
        "type":"POST",
        "url":"sendverification.php",
        "data":cParam,
        "success": function(text){
            alert(text);
            $("#verify_message").addClass("hidden");
        },
        "beforeSend":function(){
            $("#verify_message").html(" - Loading....");
			$("#verify_message").removeClass("hidden");
        }
   });
}


