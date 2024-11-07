function a_del(a_id){ //confirms the user if they want to delete a specific amenity
    if(confirm("Are you sure you want to delete this record? ")){
        window.location.href = "amenities.php?txtdelamenity=" + a_id;
    }
}

function a_edit(a_id){ //redirect the user to the modal to update a specific amenity
    window.location.href = "amenities.php?txteditamenity=" + a_id;
    document.getElementById("amenities_modal").style.display = "flex";
}

function rf_del(rf_id){ //confirms the user if they want to delete a specific room feature
    if(confirm("Are you sure you want to delete this record? ")){
        window.location.href = "amenities.php?txtdelroomfeat=" + rf_id;
    }
}

function rf_edit(rf_id){ //redirect the user to the modal to update a specific room feature
    window.location.href = "amenities.php?txteditroomfeat=" + rf_id;
    document.getElementById("roomfeatures_modal").style.display = "flex";
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


    $("#btn_addamenities").click(function(){
        $("#amenities_modal").css({"display":"flex"});
    });

    $("#btn_addroomfeats").click(function(){
        $("#roomfeatures_modal").css({"display":"flex"});
    });

    $("#btn_cancel1").click(function(){
        window.location.href = "amenities.php";
    });

    $("#btn_cancel2").click(function(){
        window.location.href = "amenities.php";
    });


});