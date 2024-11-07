<?php
    include("../navbar.php");

    $sort_date="";

    if(isset($_GET["sort_date"])){
        $sort_date = $_GET["sort_date"];
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
    <link rel="stylesheet" href="dashboardstyle.css">
    <title>View Activity Log</title>
</head>
<body>
    <div id="container">
        <div class="header" id="headercontainer">  
            <button type="button" class="btn btn-dark btn-lg" id="btn_menu"><span class="glyphicon glyphicon-menu-hamburger"></span></button>   
            <h2 id="headertitle2">VIEW ACTIVITY LOG</h2>
        </div> 
        <br><br><br>
        
        <div class="activitydiv">
            <!--search feature-->
            <div class="searchdiv">
                <form action="activity_log.php" method="get">
                    <table>
                        <tr>
                            <td style="padding-top: 3px; padding-right: 10px;"><span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;<label> Search: </label>&nbsp;</td>
                            <td><input type="date" class="form-control" name="sort_date" value='<?php echo $sort_date;?>' onchange="this.form.submit()"> </td>
                
                            <td>
                            &nbsp;&nbsp;<button type="button" class="btn btn-success" id="btn_all_act">View All Activity</button>
                            </td>
                        </tr>
                    </table>
                    
                </form>
            </div>

            <br><br>
            
            

            <table width="100%" class="table table-bordered">

                <?php 
                    if(isset($_GET["sort_date"])){
                        $result = $conn->query("select tbl_admin.fld_name, a_activity_log.fld_activity, a_activity_log.fld_datetime from a_activity_log, tbl_admin where a_activity_log.admin_id = tbl_admin.id and a_activity_log.fld_datetime like '%$sort_date%'  order by a_activity_log.fld_datetime DESC");
                    }else{
                        $result = $conn->query("select tbl_admin.fld_name, a_activity_log.fld_activity, a_activity_log.fld_datetime from a_activity_log, tbl_admin where a_activity_log.admin_id = tbl_admin.id order by a_activity_log.fld_datetime DESC");
                    }
                    

                    while($row = $result->fetch_assoc()){
                        echo "<tr>
                            <td>$row[fld_name] $row[fld_activity] on ".date_format(date_create($row["fld_datetime"]), "F j, Y h:i:s A").".<br><br></td>
                        </tr>";
                    }
                ?>
            </table>
        </div>
    </div>
</body>
    <script src="dashboardscript.js"></script>
</html>