<?php 
    include("connect.php");
    session_start();

   
    $name = "";
    $profpic = "";
    $about = "";


    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $result = $conn -> query("select * from tbl_users where fld_username like '$username'");
        while($row = $result->fetch_assoc()){
            if($row["fld_name"] == ""){
                $name = "";
            }else{
                $name = $row["fld_name"];
                $profpic = '/tourism_information_system/userside/img_profile/'.$row["fld_profpic"];
            }
            
            
        }
    }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
    
    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }
        
        #navbar {
            list-style-type: none;
            margin: 0;
            padding: 0;
            width: 25%;
            background-color: #E7E9EB;
            position: fixed;
            height: 100%;
            overflow-x: auto;
            white-space: normal;
            z-index: 99;
            display: none;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        li a, #m_destinations, #m_services {
            display: block;
            color: black;
            padding: 15px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        li a:hover{
            background-color: #555;
            color: white;
            text-decoration: none;
        }

        #m_destinations:hover{
            background-color: #555;
            color: white;
            text-decoration: none;
        }

        .destinations{
            text-indent: 50px;
            display:none;
        }

        #m_services:hover{
            background-color: #555;
            color: white;
            text-decoration: none;
        }

        .services{
            text-indent: 50px;
            display:none;
        }

       

        #btn_logoutuser{
            background: transparent;
            color:black;
            text-align: left;
            padding: 20px 16px;
            width: 100%;
            border: none;
            font-size: 15px;
        }

        #btn_logoutuser:hover{
            background-color: #555;
            color: white;
        }

        .hrnav{
            opacity: 1;
        }

        .contentsnav{
            width: 100%;
            height: auto;
        }

        #nav_mini_dp{
            width: 100%;
            height: 100%;
            max-width: 90px;
            max-height: 90px;
            object-fit: cover;
            border-radius: 50%;
            margin: 10px;
            margin-top: 5%; margin-bottom: 5%;
            
        }
        

        .glyphicon-triangle-bottom{
            font-size: 10px;
            margin-left: 10px;
        }

        .glyphicon-triangle-top{
            font-size: 10px;
            margin-left: 10px;
        }

        .nav_icon{
            margin-right: 50px;
        }
        
        .name_div{
            margin-top: 5%; margin-bottom: 5%;
            overflow: hidden;
            text-overflow: ellipsis;
            margin: 10px;
        }

        .user_name{
            font-weight: bold;
            font-size: 2em;
        }

        .user_name2{
            font-size: 1.2em;
            line-height: 2;
        }
        
        /* width */
        ::-webkit-scrollbar {
        width: 10px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
        background: none;
        }
        
        /* Handle */
        ::-webkit-scrollbar-thumb {
        background: none; 
        border-radius: 10px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
        background: #DEDEDE; 
        }

        @media (max-width: 1024px) {
            /* width */
            ::-webkit-scrollbar {
            width: 0;
            }

            #navbar{
                width: 70%;
            }

            .user_name{
            font-weight: bold;
            font-size: 1.5em;
        }

            .user_name2{
                font-size: 1em;
            }
        }
        

    </style>
</head>
<body>
    <!-- vertical navigation bar -->
    <ul id="navbar">
        <li><a href="/tourism_information_system/userside/userprofile/profile.php"><h4> <?php 
        if(!isset($_SESSION['username'])){
            echo "<span class='glyphicon glyphicon-user nav_icon'></span>Login";
        }else{
            if($name == ""){
                echo "<span class='glyphicon glyphicon-user nav_icon'></span><span>$username</span>";
            }else{
                echo "
                <div class='row'>
                    <div class='col-4'  style='width: 100px; height: 100px'>
                    <img src='$profpic' alt='Image' id='nav_mini_dp'> 
                    </div>
                    <div class='col-8 name_div'>
                  
                    <span class='user_name'>$name</span><br><span class='user_name2'>$username</span>
                    
                    
                  
                    </div>
                </div>";
            }
        }
        ?></h4></a></li>
        
        <div class="contentsnav">
            <li><a href="/tourism_information_system/index.php"><i class="bi bi-house-door-fill nav_icon"></i> Home</a></li>
            <li><a href="/tourism_information_system/userside/userstories/userstories.php"><i class="bi bi-chat-left-text-fill nav_icon"></i> Stories</a></li>

            
            <li id="m_destinations"><span id="a_destinations"><i class="bi bi-compass-fill nav_icon"></i> Destinations <span class="glyphicon glyphicon-triangle-bottom"></span></span></li>
                <li class="destinations"><a href="/tourism_information_system/userside/user_destinations/user_destinations.php?destination_type=Hotel"><span class="bullet">&#8226;</span>&nbsp;&nbsp; Hotels</a></li>
                <li class="destinations"><a href="/tourism_information_system/userside/user_destinations/user_destinations.php?destination_type=Resort"><span class="bullet">&#8226;</span>&nbsp;&nbsp; Resorts</a></li>
                <li class="destinations"><a href="/tourism_information_system/userside/user_destinations/user_destinations.php?destination_type=Restaurant"><span class="bullet">&#8226;</span>&nbsp;&nbsp; Restaurants</a></li>
                <li class="destinations"><a href="/tourism_information_system/userside/user_destinations/user_destinations.php?destination_type=Historical Landmark"><span class="bullet">&#8226;</span>&nbsp;&nbsp; Historical Landmarks</a></li>
                <li class="destinations"><a href="/tourism_information_system/userside/user_destinations/user_destinations.php?destination_type=Museum"><span class="bullet">&#8226;</span>&nbsp;&nbsp; Museums</a></li>
                <li class="destinations"><a href="/tourism_information_system/userside/user_destinations/user_destinations.php?destination_type=Natural Wonder"><span class="bullet">&#8226;</span>&nbsp;&nbsp; Natural Wonders</a></li>
                <li class="destinations"><a href="/tourism_information_system/userside/user_destinations/user_destinations.php?destination_type=Pasalubong Center"><span class="bullet">&#8226;</span>&nbsp;&nbsp; Pasalubong Centers</a></li>

            <li><a href="/tourism_information_system/userside/user_events/u_events.php"><i class="bi bi-calendar-week-fill nav_icon"></i> Events</a></li>
            <li><a href="/tourism_information_system/userside/user_news/u_news.php"><i class="bi bi-megaphone-fill nav_icon"></i> News</a></li>
            <li><a href="/tourism_information_system/userside/user_tips/u_tips.php"><i class="bi bi-lightbulb-fill nav_icon"></i> Travel Tips</a></li>

            <li id="m_services"><span id="a_services"><i class="bi bi-gear-fill nav_icon"></i> Services <span class="glyphicon glyphicon-triangle-bottom"></span></span></li>
                <li class="services"><a href="/tourism_information_system/userside/user_guidelines/u_guidelines.php"><span class="bullet">&#8226;</span>&nbsp;&nbsp; Travel Guidelines</a></li>
                <li class="services"><a href="/tourism_information_system/userside/user_hotlines/u_hotlines.php"><span class="bullet">&#8226;</span>&nbsp;&nbsp; Hotlines</a></li>
                <li class="services"><a href="/tourism_information_system/userside/user_hospitals/u_hospitals.php"><span class="bullet">&#8226;</span>&nbsp;&nbsp; Hospitals</a></li>
                <li class="services"><a href="/tourism_information_system/userside/user_stores/u_stores.php"><span class="bullet">&#8226;</span>&nbsp;&nbsp; Stores</a></li>

            <li><a href="/tourism_information_system/userside/about/about.php"><i class="bi bi-file-person-fill nav_icon"></i> About</a></li>
        </div>
        

        <form onload="return false;">
        <li><button type="button" id="btn_logoutuser" style="<?php if(!isset($_SESSION['username'])){
            echo "display: none";
        }else{
            echo "display: block";
        }?>"><span class="glyphicon glyphicon-log-out nav_icon"></span>SIGN OUT</button></li>
        </form>
        
        
    </ul>
</body>
       <script>
            
            $(function(){
                
                //dropdown for destinations
                $("#m_destinations").click(function(){
                    if($(".destinations").css("display") == "none"){
                        $(".destinations").css({"display":"block"});
                        $("#a_destinations").html("<i class='bi bi-compass-fill nav_icon'></i> Destinations <span class='glyphicon glyphicon-triangle-top'></span>");
                    }else{
                        $(".destinations").css({"display":"none"});
                        $("#a_destinations").html("<i class='bi bi-compass-fill nav_icon'></i> Destinations <span class='glyphicon glyphicon-triangle-bottom'></span>");
                    }
                });

                //dropdown for services
                $("#m_services").click(function(){
                    if($(".services").css("display") == "none"){
                        $(".services").css({"display":"block"});
                        $("#a_services").html("<i class='bi bi-gear-fill nav_icon'></i> Services <span class='glyphicon glyphicon-triangle-top'></span>");
                    }else{
                        $(".services").css({"display":"none"});
                        $("#a_services").html("<i class='bi bi-gear-fill nav_icon'></i> Services <span class='glyphicon glyphicon-triangle-bottom'></span>");
                    }
                });

                $("#btn_logoutuser").click(function(){
                    $.ajax({
                        "type":"GET",
                        "url":"/tourism_information_system/logoutuser.php",
                        "data": {
                            action: 'logout'
                        },
                        "dataType": "json",
                        "success": function(response){
                            if(response.success){
                                alert(response.message);
                                window.location.href = '/tourism_information_system/index.php?not_logged_in=true'
                            }
                        }
                    });
                    
                });
            });
       </script>
</html>