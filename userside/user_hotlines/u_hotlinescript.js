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

});