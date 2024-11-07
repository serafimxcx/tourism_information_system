var rating_data = 0;

$(function(){
   getReview();

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

    $("#btn_back").click(function(){
        window.location.href = "about.php";
        
    });

    $("#btn_savereview").click(function(){
        if($("#hasReview").val() == 0){
            AddReview(); 
        }else{
            UpdateReview();
        }
    });

    //-------------start- rating/reviews---------------------------

    // mouseenter submit star
    $(document).on('mouseenter', '.submit_star', function(){
        var rating = $(this).data('rating');

        reset_background();

        for(var count = 1; count <= rating; count++)
        {
            $('#submit_star_'+count).addClass('text-warning');
        }
    });

    //mouseleave submit star
    $(document).on('mouseleave', '.submit_star', function(){

        reset_background();

        for(var count = 1; count <= rating_data; count++)
        {

            $('#submit_star_'+count).removeClass('star-light');
            $('#submit_star_'+count).addClass('text-warning');
        }

    });

    // on click submit star
    $(document).on('click', '.submit_star', function(){
        rating_data = $(this).data('rating');

    });

    

    $("#btn_cancelreview").click(function(){
        Reset();
    });



});

//function reset bg star
function reset_background()
{
    for(var count = 1; count <= 5; count++)
    {

        $('#submit_star_'+count).addClass('star-light');
        $('#submit_star_'+count).removeClass('text-warning');

    }
}

function Reset(){
    $("#txt_content").val("");
    reset_background();

    rating_data = 0;
}

function AddReview(){
    var cData = "";
    cData = "&rating_data="+rating_data;
    cData += "&txt_content="+$("#txt_content").val();

    $.ajax({
        "type":"POST",
        "url":"../user_interactions/add_app_review.php",
        "data": cData,
        "success": function(text){
            if(text !== ""){
                alert(text);
            }else{
                alert("Review Posted Successfully.");
                window.location.href = "/tourism_information_system/userside/about/about.php";
                Reset();
            }
        }
    });

}

function getReview(){
   
    var cParam = "";

    $.ajax({
        "type":"POST",
        "url": "../user_interactions/get_app_review.php",
        "data": cParam,
        "dataType": "JSON",
        "success": function(data){
            if(data.hasReview == 1){
                $("#hasReview").val(data.hasReview);
                $("#span_review").html("Rewrite your review");
                $("#span_btnpost").html("Update");   
            }else{
                $("#hasReview").val(0);
            }
            
            $("#txt_content").val(data.content);

            var rating_data = data.rating;
            rating_data = data.rating;

            for(var count = 1; count <= rating_data; count++)
            {
                $('#submit_star_'+count).addClass('text-warning');
            }

        }
    });
}

function UpdateReview(){
    var cData = "";
    cData += "&rating_data="+rating_data;
    cData += "&txt_content="+$("#txt_content").val();

    $.ajax({
        "type":"POST",
        "url":"../user_interactions/update_app_review.php",
        "data": cData,
        "success": function(text){
            if(text !== ""){
                alert(text);
            }else{
                alert("Review Updated Successfully.");
                window.location.href = "/tourism_information_system/userside/about/about.php";
                Reset();
            }
        }
    });

}