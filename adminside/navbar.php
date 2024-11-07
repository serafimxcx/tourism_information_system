<?php 
    include("connect.php");
    session_start();

   
    $username = $_SESSION['adminusername'];
    $admin_id = $_SESSION['admin_id'];
    $name = "";
    $admintype= "";

    //date and time now
    date_default_timezone_set('Asia/Manila');
    $dateNow = date("Y-m-d H:i:s");
    


        if (!isset($_SESSION['admin_id'])) {
            // Redirect to the login page
            header('Location: ../adminlogin.php');
            exit();
        }else{

            $result = $conn -> query("select * from tbl_admin where id like '$admin_id'");
            while($row = $result->fetch_assoc()){
                $name = explode(" ", $row["fld_name"]);
                $admintype = $row["fld_type"];
                
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
            background-color: #2a2a2a;
            position: fixed;
            height: 100%;
            overflow: auto;
            z-index: 15;
            display: none;

        }

        li a, #m_services, #m_user {
            display: block;
            color: white;
            padding: 9px 16px;
            text-decoration: none;
        }

        li a:hover{
            background-color: #555;
            color: white;
            text-decoration: none;
        }

        #m_services:hover{
            background-color: #555;
            color: white;
            text-decoration: none;
        }

        #m_user:hover{
            background-color: #555;
            color: white;
            text-decoration: none;
        }

        .services{
            text-indent: 50px;
            display: none;
        }

        .u_interaction{
            text-indent: 50px;
            display: none;
        }

        .glyphicon-triangle-bottom{
            font-size: 10px;
        }

        .glyphicon-triangle-top{
            font-size: 10px;
        }

        #btn_logout{
            background: transparent;
            color:white;
            text-align: left;
            padding: 9px 16px;
            width: 100%;
            border: none;
        }

        #btn_logout:hover{
            background-color: #555;
        }

        

    </style>
</head>
<body>
    <!-- vertical navigation bar -->
    <ul id="navbar">
        <li><a href="/tourism_information_system/adminside/admin/admin.php" <?php if($admintype != "Head Admin"){echo "style='pointer-events: none;' ";}?>><h4><span class="glyphicon glyphicon-user"></span>&nbsp; Welcome <?php echo $name[0];?></h4></a></li>
        <li><a href="/tourism_information_system/adminside/dashboard/dashboard.php" <?php if($admintype == "Head Admin" || $admintype == "System Admin"){echo "style='display: block;' ";}else{ echo "style='display: none;' ";}?>>Dashboard</a></li>
        <li><a href="/tourism_information_system/adminside/user_accounts/user_accounts.php" <?php if($admintype == "Head Admin" || $admintype == "System Admin"){echo "style='display: block;' ";}else{ echo "style='display: none;' ";}?>>Manage User Accounts</a></li>
        <li><a href="/tourism_information_system/adminside/amenities/amenities.php">Manage Amenities and Room Features</a></li>

        <li><a href="/tourism_information_system/adminside/destinations/destinations.php">Manage Destinations</a></li>
        <li><a href="/tourism_information_system/adminside/events/events.php">Manage Events</a></li>
        <li><a href="/tourism_information_system/adminside/news/news.php">Manage News</a></li>
        <li><a href="/tourism_information_system/adminside/tips/tips.php">Manage Tips</a></li>

        <li id="m_services"><span id="a_services">Manage Services <span class="glyphicon glyphicon-triangle-bottom"></span></span></li>
            <li class="services"><a href="/tourism_information_system/adminside/guidelines/guidelines.php">Travel Guidelines</a></li>
            <li class="services"><a href="/tourism_information_system/adminside/hospitals/hospitals.php">Hospitals</a></li>
            <li class="services"><a href="/tourism_information_system/adminside/hotlines/hotlines.php">Hotlines</a></li>
            <li class="services"><a href="/tourism_information_system/adminside/stores/stores.php">Stores</a></li>

        <li id="m_user" <?php if($admintype == "Head Admin" || $admintype == "System Admin"){echo "style='display: block;' ";}else{ echo "style='display: none;' ";}?>><span id="a_user" >Manage User Interactions <span class="glyphicon glyphicon-triangle-bottom"></span></span></li>
            <li class="u_interaction"><a href="/tourism_information_system/adminside/user_interaction/a_user_stories.php">Stories</a></li>
            <li class="u_interaction"><a href="/tourism_information_system/adminside/user_interaction/a_user_d_reviews.php">Destination's Reviews and Ratings</a></li>
            <li class="u_interaction"><a href="/tourism_information_system/adminside/user_interaction/a_app_reviews.php">User Feedbacks</a></li>

        <li <?php if($admintype == "Head Admin" || $admintype == "System Admin"){echo "style='display: block;' ";}else{ echo "style='display: none;' ";}?>><hr></li>
        <form action="/tourism_information_system/adminside/logout.php" method="post">
        <li <?php if($admintype == "Head Admin" || $admintype == "System Admin"){echo "style='display: block;' ";}else{ echo "style='display: none;' ";}?>><button type="submit" id="btn_logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;SIGN OUT</button></li>
        </form>
        <br>
        
    </ul>
</body>

<script>
    $(function(){

        //dropdown for services
        $("#m_services").click(function(){
            if($(".services").css("display") == "none"){
                $(".services").css({"display":"block"});
                $("#a_services").html("Manage Services <span class='glyphicon glyphicon-triangle-top'></span>");
            }else{
                $(".services").css({"display":"none"});
                $("#a_services").html("Manage Services <span class='glyphicon glyphicon-triangle-bottom'></span>");
            }
        });

        //dropdown for users' interaction
        $("#m_user").click(function(){
            if($(".u_interaction").css("display") == "none"){
                $(".u_interaction").css({"display":"block"});
                $("#a_user").html("Manage Users' Interaction <span class='glyphicon glyphicon-triangle-top'></span>");
            }else{
                $(".u_interaction").css({"display":"none"});
                $("#a_user").html("Manage Users' Interaction <span class='glyphicon glyphicon-triangle-bottom'></span>");
            }
        });
        

        
    });
</script>
</html>