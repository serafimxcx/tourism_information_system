<?php
    include("../../navbar.php");


    $municipal_name = "";

    if(isset($_GET["municipality"])){
        $d_admin_id = $_GET["municipality"];

        $result = $conn->query("select * from tbl_admin where id = '$d_admin_id'");
        while($row=$result->fetch_assoc()){
            $municipal_name = $row["fld_name"];
        }
    }

    $name = "";
    $profpic = "";
    $user_profpic="";
    $username = "";
    $user_id = "";


    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $user_id = $_SESSION['user_id'];

        $result = $conn -> query("select * from tbl_users where fld_username like '$username'");
        while($row = $result->fetch_assoc()){
            if($row["fld_name"] == ""){
                $name = "";
            }else{
                $name = $row["fld_name"];
                $user_profpic = '../img_profile/'.$row["fld_profpic"];
            }
            
            
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="u_hospitalstyle.css">
    <title>Hospitals</title>
</head>
<body>
    <!--header-->
    <?php include_once("../../header.php"); ?>

    <div class="container fluid">
        <div class="contentdiv">
            <br>
            <div class="row" id="title_div">
                <div class="col-sm-6">
                    <h1 id="page-title"><a href="u_hospitals.php">Hospitals</a></h1>
                </div>
                <div class="col-sm-6">
                    <div class="searchdiv_m">
                            <div id="search_m">
                                <span class="glyphicon glyphicon-search">&nbsp;&nbsp;</span><input type="text" name="txt_search_m" id="txt_search_m" autocomplete="off" placeholder="Search Municipality " value ='<?php echo $municipal_name;?>'> 
                                <div id="search_result_m"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hospitals_menudiv">
                <table id="tbl_d_menu">
                    <tr>
                        <td><a href="/tourism_information_system/userside/user_guidelines/u_guidelines.php" >Travel Guidelines</a</td>
                        <td><a href="/tourism_information_system/userside/user_hotlines/u_hotlines.php">Hotlines</a</td>
                        <td><a href="/tourism_information_system/userside/user_hospitals/u_hospitals.php" style="color: #00bd1c; ">Hospitals</a></td>
                        <td><a href="/tourism_information_system/userside/user_stores/u_stores.php">Stores</a></td>
                    </tr>
                </table>
            </div>
            

            <div class="result_hospitalsdiv" style='<?php 
                if(isset($_GET["news_id"])){
                    echo "display: none";
                }else{
                    echo "display: block";
                }
            
            ?>'>
                <div class="row">
                    <?php 
                        
                        if(isset($_GET["municipality"])){
                            $result = $conn->query("select * from tbl_hospitals where admin_id = '$_GET[municipality]' order by id DESC");
                        }else{
                            $result = $conn->query("select * from tbl_hospitals order by id DESC");
                        }
                        
                        
    
                        $numColumns = 3;
                        $columnData = array_fill(0, $numColumns, []);
    
                        if ($result->num_rows > 0) {
                            $columnIndex = 0;
                            while ($row = $result->fetch_assoc()) {
                                $columnData[$columnIndex][] = $row;
                                $columnIndex = ($columnIndex + 1) % $numColumns;
                                
                            }
                        }

                       
    
                        for ($i = 0; $i < $numColumns; $i++) {
                            echo "<div class='col-sm'>";
                            foreach ($columnData[$i] as $row) {
                        
    
                                echo "<div class='hospitals_container'>
                                    <div class='shortcutsdiv' >";
                                    
                                    echo "<img src='/tourism_information_system/adminside/hospitals/uploaded_images/{$row['fld_mainimage']}' alt='Image' class='mainImage'>
                                        <div class='centeredtxt'>
                                            <h4 class='hospitals_title'>{$row['fld_name']}</h4>
                                            <a href='https://maps.google.com/maps?q={$row['fld_latitude']},{$row['fld_longitude']}' target='_blank'><img class='icon_destinations' src='/tourism_information_system/btn_icons/location_icon.png'/> {$row['fld_address']}</a>
                                        </div>
                                    </div>
                                </div>";
                            }
                            echo "</div>";
                        }
                    
                    ?>
                </div>
            </div>


        </div>
        
   
    </div>        

    <br><br>
    <!--footer-->
</body>
<script src="u_hospitalscript.js"></script>
</html>