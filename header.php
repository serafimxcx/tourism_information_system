<div class="header" id="headercontainer">  
        <button type="button" class="btn btn-dark btn-lg" id="btn_menu" style="<?php
            if($qrcontent == true){
                echo "display: none";
            }
        ?>"><span class="glyphicon glyphicon-menu-hamburger"></span></button>
        
        <table id="header">
            <tr>
                <td class="header_col">
                    <table id="search_tbl">
                        <tr>
                            <td><span class="glyphicon glyphicon-search" id="search_btn"></span></td>
                            <td>
                            <div class="search_container">
                            <div class="searchdiv">
                                <div id="search">
                                    &nbsp;&nbsp;<span class="glyphicon glyphicon-search search_icon">&nbsp;&nbsp;</span><input type="text" name="search_name" id="search_name" autocomplete="off" placeholder="Search"> 
                                    <div id="search_result"></div>
                                </div>
                            </div>
                            </div>
                            </td>
                        </tr>
                    </table>
                
                    
                    

                </td>
                <td class="header_col">
                    
                    <table class="right_td">
                        <tr>
                        <td ><div class="div_btn_notif">
                                    <div id="btn_notif_div">
                                        <i class="bi bi-stars" id="btn_newcontent"></i>
                                        <i class="bi bi-bell-fill" id="btn_notif"></i><span id="num_unreadnotif"></span></div>
                                    
                                    <div id="dropdown_notif">
                                        
                                    </div>

                                    <div id="dropdown_newcontent">
                                        
                                    </div>
                                </div>
                            </td>
                            <td><a href="/tourism_information_system/index.php"><h2 id="title">FordaTravel</h2></a></td>
                            
                        </tr>
                    </table>
                
                    
                    
                </td>
            </tr>
        </table>
           
        
</div> 


<style>
@import url('https://fonts.googleapis.com/css2?family=Jost:wght@600&family=Mulish:wght@1000&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Montserrat:wght@200&family=Mulish:wght@1000&display=swap');



#header{
    float: right;
    color: black;  
    vertical-align: middle; 
}


#title{
    font-weight: bold;
    vertical-align: middle; 
    font-family: 'Jost', sans-serif;
    color: white;
    font-size: 35px;
}

.header_col{
    vertical-align: middle;
}


.searchdiv{ 
    position: relative;
    vertical-align: middle;
    margin-right: 20px;
    margin-top: -10px;
    
}

#search{  
    background-color: #02ff67;
    padding: 5px;
    padding-left: 20px;
    padding-right: 20px;
    border-radius: 20px;   
    z-index: 10;
    position: absolute ;
    right: 0;
    width: 300px;
    white-space: normal;
    
    
}


#search_name{
    border: none;
    background: transparent;
    outline: none;
}

.destination_result, .event_result, .news_result, .tips_result, .guidelines_result{
    padding: 10px;
    
    z-index: 99;
}

.destination_result:hover{
    background-color: rgb(173, 173, 173);
    cursor: pointer;
}

.event_result:hover{
    background-color: rgb(173, 173, 173);
    cursor: pointer;
}

.news_result:hover{
    background-color: rgb(173, 173, 173);
    cursor: pointer;
}

.tips_result:hover{
    background-color: rgb(173, 173, 173);
    cursor: pointer;
}

.guidelines_result:hover{
    background-color: rgb(173, 173, 173);
    cursor: pointer;
}


.div_btn_notif{
    right: 50px;
    top: 50px; 
    color: white;
    margin-top: 5px;
}

#btn_notif{
    cursor: pointer;
    font-size: 30px;
    margin-right: 5px;
    margin-left: 5px;
}

.notif_indicator{
    color: gold;
}

#btn_newcontent{
    cursor: pointer;
    font-size: 30px;
    margin-right: 5px;
}

#btn_notif_div{
    
    margin-left: 15px;
    margin-right: 15px;
}



#dropdown_notif{
    display: none;
    position: absolute;
    background-color: white;
    max-width: 250px;
    max-height: 300px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    border-radius: 5px;
    z-index: 15;
    right: 10%;
    color: black;
    white-space: normal;
}

#dropdown_newcontent{
    display: none;
    position: absolute;
    background-color: white;
    max-width: 250px;
    max-height: 300px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    white-space: normal;
    border-radius: 5px;
    z-index: 14;
    right: 15%;
    color: black;
}

.notif_records{
    padding: 15px;
    cursor: pointer;
}

.newcontent_records{
    padding: 15px;
    cursor: pointer;
    white-space: normal;
}

.notif_records:hover{
    background: #cdcdcd;
    border: 1px solid rgb(171, 171, 171);
}

.search_icon{
    color: white;
}

.searchdiv{
    display: block;
}


#search_btn{
    display: none;
    text-align: left;
        color: white;
        font-size: 20px;
        vertical-align: bottom;
}

.search_float{
    float: right;
}

@media (max-width: 750px){
   
    #header{
        padding: 10px;
        float: left;
    }

    body{   
    background-color: white;
    overflow-y: scroll;
    overflow-x: hidden;
        
    }

    #title{
        display: block;
        text-align: right;
        font-size: 20px;
        margin-right: 10px;
        
    }

    #search{   
    width: 200px;
    position: relative;
    
    }

    #search_name{
        width: 90px;
    }

    #btn_notif{
    font-size: 20px;
    margin: 10px;
    margin-left: 0;
    }

    .div_btn_notif{
    margin-top: 5px;
    }

    .searchdiv{
    display: none;
    margin-top: 10px;
    padding-left: 20px;
    padding-bottom: 10px;
    }


    #search_btn{
        display: block;
        
    }

    #search_tbl{
        padding: 10px;
    }

    .search_icon{
        display: none;
    }
   
}
    </style>

    <script>
    $(function(){
            //live search
    $("#search_name").keyup(function () {
        var query = $(this).val();
        if (query != "") {
            $.ajax({
                url: '/tourism_information_system/live_search_all.php',
                method: 'POST',
                data: {
                    query: query
                },
                success: function (data) {
                    $('#search_result').html(data);
                    $('#search_result').css('display', 'block');
                    $('#search').css('background-color', 'white');
                    $('#search').css('box-shadow', '0px 8px 16px 0px rgba(0,0,0,0.2)');
                

                   
                }
            });
        } else {
            $('#search_result').css('display', 'none');
            $('#search').css('background-color', '#02ff67');
            $('#search').css('box-shadow', 'none');
        }
    });

    $(".container").click(function () {
        $('#search_result').css('display', 'none');
    });

    $(document).on('click', '.destination_result', function(){
        window.location.href = "/tourism_information_system/userside/user_destinations/user_destinations.php?destination_type="+$(this).attr("destination_type")+"&destination_id="+$(this).attr("destination_id");
    });
    
    $(document).on('click', '.event_result', function(){
        window.location.href = "/tourism_information_system/userside/user_events/u_events.php?event_type="+$(this).attr("event_type")+"&event_id="+$(this).attr("event_id");
    });

    $(document).on('click', '.news_result', function(){
        window.location.href = "/tourism_information_system/userside/user_news/u_news.php?news_category="+$(this).attr("news_category")+"&news_id="+$(this).attr("news_id");
    });

    $(document).on('click', '.tips_result', function(){
        window.location.href = "/tourism_information_system/userside/user_tips/u_tips.php?tips_id="+$(this).attr("tips_id");
    });

    $(document).on('click', '.guidelines_result', function(){
        window.location.href = "/tourism_information_system/userside/user_guidelines/u_guidelines.php?guidelines_id="+$(this).attr("guidelines_id");
    });

    $(document).on('click', '.notif_records', function(){
        cParam = "";
        story_id = $(this).attr("content_id");

        cParam = "notif_id="+$(this).attr("notif_id");
        $.ajax({
            "type":"POST",
            "url":"/tourism_information_system/read_notif.php",
            "data":cParam,
            "success":function(text){
                window.location.href = "/tourism_information_system/userside/userstories/userstories.php?story_comment_id="+story_id;
            }
        });
        
    });

    $("#btn_notif").click(function(){
        $("#dropdown_notif").toggle();
        $("#btn_notif").toggleClass("notif_indicator");    
        
    });

    $("#search_btn").click(function(){
        $(".searchdiv").toggle();  
        $(".right_td").toggle();  
        
    });

    $("#btn_newcontent").click(function(){
        $("#dropdown_newcontent").toggle();
        $("#btn_newcontent").toggleClass("notif_indicator");
    });

    LoadNotif();
    setInterval(LoadNotif, 5000);

    LoadNewContent();
    setInterval(LoadNewContent, 5000);

    numUnread();
    
    });

    function LoadNotif(){
        $.ajax({
            "type":"POST",
            "url":"/tourism_information_system/load_notifications.php",
            "success":function(text){
                $("#dropdown_notif").html(text);
            }
        });
    }

    function numUnread(){
        $.ajax({
            "type":"POST",
            "url":"/tourism_information_system/num_unreadnotif.php",
            "success":function(text){
                $("#num_unreadnotif").html(text);
            }
        });
    }

    function LoadNewContent(){
        $.ajax({
            "type":"POST",
            "url":"/tourism_information_system/load_newcontent.php",
            "success":function(text){
                $("#dropdown_newcontent").html(text);
            }
        });
    }

    
    </script>