function del(id){ //confirms the user if they want to delete a specific destination
    if(confirm("Are you sure you want to delete this record? ")){
        window.location.href = "destinations.php?txtdel=" + id;
    }
}

function edit(id){ //redirect the user to the modal to update a specific destination
    window.location.href = "destinations.php?txtedit=" + id;
    document.getElementById("destinations_modal").style.display = "flex";
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

    $("#btn_addsocial").click(function(){
        var new_txtsocial_no = parseInt($('#totaltxtsocial').val()) + 1;
        $('#totaltxtsocial').val(new_txtsocial_no);
        var new_txtsocial = "<input type='text' class='form-control' name='txt_socials[]' id='new_" + new_txtsocial_no + "'><br id='new_id"+new_txtsocial_no+"'>";
        $('#newtxtsocial').append(new_txtsocial);
    });

    $("#btn_addsocial_edt").click(function(){
        var new_txtsocial_no = parseInt($('#totaltxtsocial').val()) + 1;
        $('#totaltxtsocial').val(new_txtsocial_no);
        var new_txtsocial = "<input type='text' class='form-control' name='txt_socials[]' id='new_" + new_txtsocial_no + "'><br id='new_id"+new_txtsocial_no+"'>";
        $('#newtxtsocial').append(new_txtsocial);
    });

    $("#btn_removesocial").click(function(){
        var last_txtsocial_no = $('#totaltxtsocial').val();
        if (last_txtsocial_no > 1) {
            $('#new_' + last_txtsocial_no).remove();
            $('#new_id' + last_txtsocial_no).remove();
            $('#totaltxtsocial').val(last_txtsocial_no - 1);
        }
    });

    $("#btn_removesocial_edt").click(function(){
        var last_txtsocial_no = $('#totaltxtsocial').val();
        if (last_txtsocial_no > 1) {
            $('#txt_socials' + last_txtsocial_no).remove();
            $('#new_id' + last_txtsocial_no).remove();
            $('#totaltxtsocial').val(last_txtsocial_no - 1);
        }
    });

    $("#btn_add_destination").click(function(){
        $("#destination_modal").css({"display":"flex"});
    });

    $("#btn_cancel").click(function(){
        window.location.href = "destinations.php";
    });
    
    
});