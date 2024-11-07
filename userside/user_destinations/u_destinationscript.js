var loc_rating_data = 0;
var clean_rating_data = 0;
var service_rating_data = 0;
var values_rating_data = 0;

$(function(){

    getReview();

    $("#txt_search_m").keyup(function () {
        var search_municipal = $(this).val();
        if (search_municipal != "") {
            $.ajax({
                url: '/tourism_information_system/live_search_municipal.php',
                method: 'POST',
                data: {
                    search_municipal: search_municipal
                },
                success: function (data) {
                    $('#search_result_m').html(data);
                    $('#search_result_m').css('display', 'block');
                    $('#search_m').css('background-color', 'white');
                    $('#search_m').css('box-shadow', '0px 8px 16px 0px rgba(0,0,0,0.2)');
                

                   
                }
            });
        } else {
            $('#search_result_m').css('display', 'none');
            $('#search_m').css('box-shadow', 'none');
            $('#search_m').css('background-color', 'rgb(239, 239, 239)');
        }
    });
    
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

    $(document.body).on('click', '.shortcutsdiv', function(){
        window.location.href = "user_destinations.php?destination_type="+$(this).attr("destination_type")+"&destination_id="+$(this).attr("destination_id");
    });

    $("#slideRight_d").click(function(){
        $(".hw_m_photos_div").animate( { scrollLeft: '+=460px' }, 1000);

        
    });

    $("#slideLeft_d").click(function(){
        $(".hw_m_photos_div").animate( { scrollLeft: '-=460px' }, 1000);
    });


    $("#btn_back").click(function(){
        window.location.href = "user_destinations.php";
        
    });

    $("#btn_back_1").click(function(){
        window.location.href = "user_destinations.php";
        
    });


    $("#btn_back2").click(function(){
        window.location.href = "user_destinations.php?destination_type="+$(this).attr("destination_type")+"&destination_id="+$(this).attr("destination_id");
        
    });

    $("#btn_back3").click(function(){
        window.location.href = "user_destinations.php?destination_type="+$(this).attr("destination_type")+"&destination_id="+$(this).attr("destination_id");
        
    });

    $("#btn_back4").click(function(){
        window.location.href = "user_destinations.php?destination_type="+$(this).attr("destination_type")+"&destination_id="+$(this).attr("destination_id");
        
    });

    $("#btn_next_d").click(function(){
        var cParam = "destination_id="+$(this).attr("destination_id");
        cParam += "&destination_name="+$(this).attr("destination_name");

        $.ajax({
            "type":"POST",
            "url":"next_d.php",
            "data": cParam,
            "success":function(text){
                var pattern = /max/;
                if(pattern.test(text) == true){
                    alert("There is no historical landmarks or museums.");
                }else{
                    var destination = JSON.parse(text);

                window.location.href = "user_destinations.php?destination_type="+destination.destination_type+"&destination_id="+destination.destination_id;
                }

                
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                console.log('XHR ERROR ' + XMLHttpRequest.status);
                return JSON.parse(XMLHttpRequest.responseText);
            }
        });
    });

    $("#btn_prev_d").click(function(){
        var cParam = "destination_id="+$(this).attr("destination_id");
        cParam += "&destination_name="+$(this).attr("destination_name");

        $.ajax({
            "type":"POST",
            "url":"prev_d.php",
            "data": cParam,
            "success":function(text){
                var pattern = /max/;
                if(pattern.test(text) == true){
                    alert("There is no historical landmarks or museums.");
                }else{
                    var destination = JSON.parse(text);

                window.location.href = "user_destinations.php?destination_type="+destination.destination_type+"&destination_id="+destination.destination_id;
                }

                
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                console.log('XHR ERROR ' + XMLHttpRequest.status);
                return JSON.parse(XMLHttpRequest.responseText);
            }
        });
    });

    $("#basedRating").click(function(){
        var pattern = /destination_type/;
        var pattern2 = /destination_ratings/;
        var pattern3 = /municipality/;
        var newHref = "";
        if(pattern.test(window.location.href) == true || pattern3.test(window.location.href) == true){
            newHref = window.location.href + "&destination_ratings=true";
        }else{
            newHref = window.location.href + "?destination_ratings=true";
        }
        
        if(pattern2.test(window.location.href) == false){
            window.location.href=newHref;
        }
        
        
    });

    $(document).on('click', '.admin_result', function(){
        var pattern = /destination_type/;
        var pattern2 = /destination_ratings/;
        var pattern3 = /municipality/;
        var newHref = "";
        if(pattern.test(window.location.href) == true || pattern2.test(window.location.href) == true){
            newHref = window.location.href + "&municipality="+$(this).attr("admin_id");
        }else{
            newHref = window.location.href + "?municipality="+$(this).attr("admin_id");
        }
        
        if(pattern3.test(window.location.href) == false){
            window.location.href=newHref;
        }

    
    });

    //-------------start- rating/reviews---------------------------

    //start- mouseenter submit star
    $(document).on('mouseenter', '.location_submit_star', function(){
        var rating = $(this).data('rating');

        loc_reset_background();

        for(var count = 1; count <= rating; count++)
        {
            $('#location_submit_star_'+count).addClass('text-warning');
        }
    });

    $(document).on('mouseenter', '.clean_submit_star', function(){
        var rating = $(this).data('rating');

        clean_reset_background();

        for(var count = 1; count <= rating; count++)
        {
            $('#clean_submit_star_'+count).addClass('text-warning');
        }
    });

    $(document).on('mouseenter', '.service_submit_star', function(){
        var rating = $(this).data('rating');

        service_reset_background();

        for(var count = 1; count <= rating; count++)
        {
            $('#service_submit_star_'+count).addClass('text-warning');
        }
    });

    $(document).on('mouseenter', '.values_submit_star', function(){
        var rating = $(this).data('rating');

        values_reset_background();

        for(var count = 1; count <= rating; count++)
        {
            $('#values_submit_star_'+count).addClass('text-warning');
        }
    });

    //end- mouseenter submit star

    //start- mouseleave submit star
    $(document).on('mouseleave', '.location_submit_star', function(){

        loc_reset_background();

        for(var count = 1; count <= loc_rating_data; count++)
        {

            $('#location_submit_star_'+count).removeClass('star-light');
            $('#location_submit_star_'+count).addClass('text-warning');
        }

    });

    $(document).on('mouseleave', '.clean_submit_star', function(){

        clean_reset_background();

        for(var count = 1; count <= clean_rating_data; count++)
        {

            $('#clean_submit_star_'+count).removeClass('star-light');
            $('#clean_submit_star_'+count).addClass('text-warning');
        }

    });

    $(document).on('mouseleave', '.service_submit_star', function(){

        service_reset_background();

        for(var count = 1; count <= service_rating_data; count++)
        {

            $('#service_submit_star_'+count).removeClass('star-light');
            $('#service_submit_star_'+count).addClass('text-warning');
        }

    });

    $(document).on('mouseleave', '.values_submit_star', function(){

        service_reset_background();

        for(var count = 1; count <= values_rating_data; count++)
        {

            $('#values_submit_star_'+count).removeClass('star-light');
            $('#values_submit_star_'+count).addClass('text-warning');
        }

    });
    //end- mouseleave submit star

    //start- on click submit star
    $(document).on('click', '.location_submit_star', function(){
        loc_rating_data = $(this).data('rating');

    });

    $(document).on('click', '.clean_submit_star', function(){
        clean_rating_data = $(this).data('rating');

    });

    $(document).on('click', '.service_submit_star', function(){
        service_rating_data = $(this).data('rating');

    });

    $(document).on('click', '.values_submit_star', function(){
        values_rating_data = $(this).data('rating');

    });
    //end- on click submit star

    //------------end- ratings/reviews--------------------------------------------

    $("#btn_cancelreview").click(function(){
        Reset();
    });

    $("#btn_savereview").click(function(){
        if($("#hasReview").val() == 0){
            AddReview(); 
        }else{
            UpdateReview();
        }
    });

    if($(".n_destinationdiv").css('display')=='block'){
        var slideIndex = 0;
        showSlides();

        function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}
        slides[slideIndex-1].style.display = "block";  
        setTimeout(showSlides, 5000); // Change image every 2 seconds
        }
    }

    $(document.body).on("click",".btn_bookmark",function() {
       
		Bookmark(parseInt($(this).attr("destination_id")));

	});

   
});



//start- function reset bg star
function loc_reset_background()
{
    for(var count = 1; count <= 5; count++)
    {

        $('#location_submit_star_'+count).addClass('star-light');
        $('#location_submit_star_'+count).removeClass('text-warning');

    }
}

function clean_reset_background()
{
    for(var count = 1; count <= 5; count++)
    {

        $('#clean_submit_star_'+count).addClass('star-light');
        $('#clean_submit_star_'+count).removeClass('text-warning');

    }
}

function service_reset_background()
{
    for(var count = 1; count <= 5; count++)
    {

        $('#service_submit_star_'+count).addClass('star-light');
        $('#service_submit_star_'+count).removeClass('text-warning');

    }
}

function values_reset_background()
{
    for(var count = 1; count <= 5; count++)
    {

        $('#values_submit_star_'+count).addClass('star-light');
        $('#values_submit_star_'+count).removeClass('text-warning');

    }
}
//end- function reset bg star

function Reset(){
    $("#txt_content").val("");
    loc_reset_background();
    clean_reset_background();
    service_reset_background();
    values_reset_background();

    loc_rating_data = 0;
    clean_rating_data = 0;
    service_rating_data = 0;
    values_rating_data = 0;
}

function AddReview(){
    var cData = "";
    cData = "destination_id="+$("#txt_destination_id").val();
    cData += "&loc_rating="+loc_rating_data;
    cData += "&clean_rating="+clean_rating_data;
    cData += "&service_rating="+service_rating_data;
    cData += "&values_rating="+values_rating_data;
    cData += "&txt_content="+$("#txt_content").val();

    $.ajax({
        "type":"POST",
        "url":"../user_interactions/add_d_review.php",
        "data": cData,
        "success": function(text){
            if(text !== ""){
                alert(text);
            }else{
                alert("Review Posted Successfully.");
                window.location.href = "/tourism_information_system/userside/user_destinations/user_destinations.php?destination_type="+$("#txt_destination_type").val()+"&destination_id="+$("#txt_destination_id").val();
                Reset();
            }
        }
    });

}

function UpdateReview(){
    var cData = "";
    cData = "destination_id="+$("#txt_destination_id").val();
    cData += "&loc_rating="+loc_rating_data;
    cData += "&clean_rating="+clean_rating_data;
    cData += "&service_rating="+service_rating_data;
    cData += "&values_rating="+values_rating_data;
    cData += "&txt_content="+$("#txt_content").val();

    $.ajax({
        "type":"POST",
        "url":"../user_interactions/update_d_review.php",
        "data": cData,
        "success": function(text){
            if(text !== ""){
                alert(text);
            }else{
                alert("Review Updated Successfully.");
                window.location.href = "/tourism_information_system/userside/user_destinations/user_destinations.php?destination_type="+$("#txt_destination_type").val()+"&destination_id="+$("#txt_destination_id").val();
                Reset();
            }
        }
    });

}

LoadReviews();

function LoadReviews(){
    var cID = "";

    cID = "destination_id="+$("#txt_destination_id").val();

    $.ajax({
        "type":"POST",
        "url":"../user_interactions/loadreviews.php",
        "data": cID,
        "dataType": "JSON",
        success: function(data){
            $("#average_rating").html(data.average_rating);

            if(data.average_rating < 2){
                $("#desc_rating").html("Poor");
            }
            else if(data.average_rating < 3){
                $("#desc_rating").html("Average");
            }
            else if(data.average_rating < 4){
                $("#desc_rating").html("Good");
            }
            else if(data.average_rating < 5){
                $("#desc_rating").html("Excellent");
            }

            $("#total_review").html(data.total_review);

            $("#ave_location_review").html(data.average_loc_rating);
            $("#ave_cleanliness_review").html(data.average_clean_rating);
            $("#ave_service_review").html(data.average_service_rating);
            $("#ave_value_review").html(data.average_value_rating);

            var count_star = 0;

                $('.main_star').each(function(){
                    count_star++;
                    if(Math.floor(data.average_rating) >= count_star)
                    {
                        $(this).addClass('text-warning');
                        $(this).addClass('star-light');
                    }
                });

            $('#location_rate_progress').css('width', (data.average_loc_rating/5.0) * 100 + '%');

            $('#cleanliness_rate_progress').css('width', (data.average_clean_rating/5.0) * 100 + '%');

            $('#service_rate_progress').css('width', (data.average_service_rating/5.0) * 100 + '%');

            $('#value_rate_progress').css('width', (data.average_value_rating/5.0) * 100 + '%');

        }
    });
}



function getReview(){
   
    var cParam = "";

    cParam = "destination_id="+$("#txt_destination_id").val();

    $.ajax({
        "type":"POST",
        "url": "../user_interactions/getreview.php",
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

            var location_rating = data.location_rating;
            loc_rating_data = data.location_rating

            for(var count = 1; count <= location_rating; count++)
            {
                $('#location_submit_star_'+count).addClass('text-warning');
            }

            var clean_rating = data.clean_rating;
            clean_rating_data = data.clean_rating

            for(var count = 1; count <= clean_rating; count++)
            {
                $('#clean_submit_star_'+count).addClass('text-warning');
            }

            var service_rating = data.service_rating;
            service_rating_data = data.service_rating

            for(var count = 1; count <= service_rating; count++)
            {
                $('#service_submit_star_'+count).addClass('text-warning');
            }

            var value_rating = data.value_rating;
            values_rating_data = data.value_rating

            for(var count = 1; count <= value_rating; count++)
            {
                $('#values_submit_star_'+count).addClass('text-warning');
            }
        }
    });
}

function Bookmark(destination_id){
    var c_id = "";

    c_id = "destination_id=" + destination_id;

    $.ajax({
        "type": "POST",
        "url": "../user_interactions/bookmark.php",
        "data": c_id,
        "success": function(text){
            if(text == "not login"){
                window.location.href='/tourism_information_system/index.php?not_logged_in=true';
            }else{
                var bookmark = JSON.parse(text);
           
                $("[destination_id="+destination_id+"]").prop("src", bookmark.url);
            }
            
			
        }
    });
}