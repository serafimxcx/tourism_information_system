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

    $(document.body).on('click', '.shortcut_destination', function(){
        window.location.href = "/tourism_information_system/userside/user_destinations/user_destinations.php?destination_type="+$(this).attr("destination_type")+"&destination_id="+$(this).attr("destination_id");
    });

    $(".btn_more_events").click(function(){
        window.location.href = "/tourism_information_system/userside/user_events/u_events.php?event_type="+$(this).attr("event_type")+"&event_id="+$(this).attr("event_id");
    });

    $(document.body).on('click', '.news_container', function(){
        window.location.href = "/tourism_information_system/userside/user_news/u_news.php?news_category="+$(this).attr("news_category")+"&news_id="+$(this).attr("news_id");
    });

    $(".btn_more_tips").click(function(){
        window.location.href = "/tourism_information_system/userside/user_tips/u_tips.php?tips_id="+$(this).attr("tips_id");
    });

    $(".btn_more_guidelines").click(function(){
        window.location.href = "/tourism_information_system/userside/user_guidelines/u_guidelines.php?guidelines_id="+$(this).attr("guidelines_id");
    });

});