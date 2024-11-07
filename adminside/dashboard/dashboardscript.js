$(function(){
    LoadReviews();

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

    $("#btn_viewallact").click(function(){
        window.location.href='activity_log.php';
    });

    $("#btn_all_act").click(function(){
        window.location.href='activity_log.php';
    });

    $("#btn_viewreviews").click(function(){
        window.location.href='/tourism_information_system/adminside/user_interaction/a_app_reviews.php';
    });
    
    $("#admin_div").click(function(){
        window.location.href='/tourism_information_system/adminside/admin/admin.php';
    });
    
    $("#user_div").click(function(){
        window.location.href='/tourism_information_system/adminside/user_accounts/user_accounts.php';
    });
    
    $("#destination_div").click(function(){
        window.location.href='/tourism_information_system/adminside/destinations/destinations.php';
    });
    
    $("#events_div").click(function(){
        window.location.href='/tourism_information_system/adminside/events/events.php';
    });
    
    $("#news_div").click(function(){
        window.location.href='/tourism_information_system/adminside/news/news.php';
    });

    $("#tips_div").click(function(){
        window.location.href='/tourism_information_system/adminside/tips/tips.php';
    });
    
    $("#guidelines_div").click(function(){
        window.location.href='/tourism_information_system/adminside/guidelines/guidelines.php';
    });
    
    $("#hotlines_div").click(function(){
        window.location.href='/tourism_information_system/adminside/hotlines/hotlines.php';
    });
    
    $("#hospitals_div").click(function(){
        window.location.href='/tourism_information_system/adminside/hospitals/hospitals.php';
    });
    
    $("#stores_div").click(function(){
        window.location.href='/tourism_information_system/adminside/stores/stores.php';
    });
    
    $("#stories_div").click(function(){
        window.location.href='/tourism_information_system/adminside/user_interaction/a_user_stories.php';
    });
    
    $("#reviews_div").click(function(){
        window.location.href='/tourism_information_system/adminside/user_interaction/a_user_d_reviews.php';
    });
});



function LoadReviews(){
    var cID = "";


    $.ajax({
        "type":"POST",
        "url":"../../userside/user_interactions/load_app_reviews.php",
        "data": cID,
        "dataType": "JSON",
        success: function(data){
            $('#average_rating').text(data.average_rating);
            $('.total_review').text(data.total_review);

            var count_star = 0;

            $('.main_star').each(function(){
                count_star++;
                if(Math.floor(data.average_rating) >= count_star)
                {
                    $(this).addClass('text-warning');
                    $(this).addClass('star-light');
                }
            });

            $('#total_five_star_review').text(data.five_star_review);

            $('#total_four_star_review').text(data.four_star_review);

            $('#total_three_star_review').text(data.three_star_review);

            $('#total_two_star_review').text(data.two_star_review);

            $('#total_one_star_review').text(data.one_star_review);

            $('#five_star_progress').css('width', (data.five_star_review/data.total_review) * 100 + '%');

            $('#four_star_progress').css('width', (data.four_star_review/data.total_review) * 100 + '%');

            $('#three_star_progress').css('width', (data.three_star_review/data.total_review) * 100 + '%');

            $('#two_star_progress').css('width', (data.two_star_review/data.total_review) * 100 + '%');

            $('#one_star_progress').css('width', (data.one_star_review/data.total_review) * 100 + '%');

        }
    });
}
