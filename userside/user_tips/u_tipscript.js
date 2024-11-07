$(function(){
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

    $(document).on('click', '.admin_result', function(){
        var pattern = /municipality/;
        
        newHref = window.location.href + "?municipality="+$(this).attr("admin_id");
        
        
        if(pattern.test(window.location.href) == false){
            window.location.href=newHref;
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

    $(".btn_more").click(function(){
        window.location.href = "u_tips.php?tips_id="+$(this).attr("tips_id");
    });

    $("#btn_back").click(function(){
        window.location.href = "u_tips.php";
        
    });
    
    $(document.body).on("click",".btn_bookmark",function() {
       
		Bookmark(parseInt($(this).attr("tips_id")));

	});

    

});

function Bookmark(tips_id){
    var c_id = "";

    c_id = "tips_id=" + tips_id;

    $.ajax({
        "type": "POST",
        "url": "../user_interactions/bookmark.php",
        "data": c_id,
        "success": function(text){
            if(text == "not login"){
                window.location.href='/tourism_information_system/index.php?not_logged_in=true';
            }else{
                var bookmark = JSON.parse(text);
           
                $("[tips_id="+tips_id+"]").prop("src", bookmark.url);
                
            }
            
            
        }
    });
}