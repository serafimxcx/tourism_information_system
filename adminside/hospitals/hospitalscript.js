function del(id){ //confirms the user if they want to delete a specific hospital
    if(confirm("Are you sure you want to delete this record? ")){
        window.location.href = "hospitals.php?txtdel=" + id;
    }
}

function edit(id){ //redirect the user to the modal to update a specific hospital
    window.location.href = "hospitals.php?txtedit=" + id;
    document.getElementById("hospitals_modal").style.display = "flex";
}

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

    $("#btn_add_hospital").click(function(){
        $("#hospitals_modal").css({"display":"flex"});
    });

    $("#btn_cancel").click(function(){
        window.location.href = "hospitals.php";
    });
});