<?php
    include("../navbar.php");
    
    if(isset($_GET['txtdel'])){
        $result = $conn->query("select tbl_destinations.fld_name, tbl_users.fld_username from tbl_users, tbl_destinations, tbl_reviewsratings where tbl_reviewsratings.id like '$_GET[txtdel]' and tbl_reviewsratings.destination_id = tbl_destinations.id and tbl_reviewsratings.user_id = tbl_users.id");

        while($row = $result->fetch_assoc()){
            $conn->query("insert into a_activity_log(admin_id, fld_activity, fld_datetime)values('$admin_id', ' has remove the review of [ ".$row['fld_username']." ] for [ ".$row['fld_name']." ]', '$dateNow')");
        }
            
        $deletedestinationreview = $conn->query("delete from tbl_reviewsratings where id like '$_GET[txtdel]'");

        if($deletedestinationreview){
            $statusMsg = 'Destination Review Deleted Successfully.';
            echo "<script> alert('$statusMsg'); location.href='a_user_d_reviews.php';</script>";
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
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="interaction_style.css">
    <title>Manage Destination Reviews</title>
</head>
<body>
<div class="header" id="headercontainer">  
            <button type="button" class="btn btn-dark btn-lg" id="btn_menu"><span class="glyphicon glyphicon-menu-hamburger"></span></button>   
            <h2 id="headertitle">MANAGE DESTINATION REVIEWS</h2>
        </div> 
    <div id="container">
        
        <br><br>
        
        <div class="d_reviewsdiv">
            <!--search feature-->
            <div class="searchdiv">
                <form action="a_user_d_reviews.php" method="get">
                    <table>
                        <tr>
                            <td style="padding-top: 3px;"><span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;<label> Search: </label>&nbsp;</td>
                            <td><input type="text" class="form-control" name="search_name" onchange="this.form.submit()"> </td>
                        </tr>
                    </table>
                    
                </form>
            </div>
            <br><br>

            <table class="table table-bordered">
                <tr>
                    <th>Writer</th><th>Destination</th><th>Content</th><th>Date</th><th></th>
                </tr>
                <?php
                    if(isset($_GET["search_name"])){
                        $result =  $conn->query("select tbl_users.fld_username, tbl_reviewsratings.id, tbl_destinations.fld_name as destination_name, tbl_reviewsratings.fld_content, tbl_reviewsratings.fld_datetime from tbl_reviewsratings, tbl_users, tbl_destinations where tbl_reviewsratings.user_id = tbl_users.id and tbl_reviewsratings.destination_id = tbl_destinations.id and (tbl_destinations.fld_name like '$_GET[search_name]%' or tbl_users.fld_username like '$_GET[search_name]%' )");
                       
                    }else{
                       $result = $conn->query("select tbl_users.fld_username, tbl_reviewsratings.id, tbl_destinations.fld_name as destination_name, tbl_reviewsratings.fld_content, tbl_reviewsratings.fld_datetime from tbl_reviewsratings, tbl_users, tbl_destinations where tbl_reviewsratings.user_id = tbl_users.id and tbl_reviewsratings.destination_id = tbl_destinations.id");
                        
                    }
                    

                    while($row=$result->fetch_assoc()){
                        echo "<tr>
                            <td>$row[fld_username]</td>
                            <td>$row[destination_name]</td>
                            <td>$row[fld_content]</td>
                            <td>$row[fld_datetime]</td>
                            
                            <td style='text-align:center;'><button type='button' class='btn btn-danger' onclick=del_d_review('$row[id]')><span class='glyphicon glyphicon-trash'></span></button></td>
                        
                        </tr>";
                    }
                ?>
            </table>
        </div>
    </div>
</body>
    <script src="interaction_script.js"></script>
</html>