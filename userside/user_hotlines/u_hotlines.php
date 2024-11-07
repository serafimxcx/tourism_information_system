<?php
    include("../../navbar.php");

    if(isset($_GET["hotlines_id"])){
        $hotlines_id = $_GET["hotlines_id"];
    }

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
    $img_hotlines = "";
    $user_id = "";
    $username = "";


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
    <link rel="stylesheet" href="u_hotlinestyle.css">
    <title>Hotlines</title>
</head>
<body>
    <!--header-->
    <?php include_once("../../header.php"); ?>

    <div class="container fluid">
        <div class="contentdiv">
        <br>
            <div class="row" id="title_div">
                <div class="col-sm-6">
                    <h1 id="page-title"><a href="u_hotlines.php">Hotlines</a></h1>
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

            <div class="hotlines_menudiv">
                <table id="tbl_d_menu">
                    <tr>
                        <td><a href="/tourism_information_system/userside/user_guidelines/u_guidelines.php">Travel Guidelines</a></td>
                        <td><a href="/tourism_information_system/userside/user_hotlines/u_hotlines.php" style="color: #00bd1c; ">Hotlines</a</td>
                        <td><a href="/tourism_information_system/userside/user_hospitals/u_hospitals.php">Hospitals</a></td>
                        <td><a href="/tourism_information_system/userside/user_stores/u_stores.php">Stores</a></td>
                    </tr>
                </table>
            </div>

            <div class="result_hotlinesdiv">
                
                <div class='hotlines_container'>
                    <div> In case of emergency, call the the following hotlines: </div><br>
                    <table class="table table-bordered" width="100%">
                        <tr>
                            <th>Agency</th><th>Contact</th><th>Specialization</th><th>Area Coverage</th>
                        </tr>
                    <?php 
                        if(isset($_GET["municipality"])){
                            $result = $conn->query("select * from tbl_hotlines where admin_id = '$_GET[municipality]' order by fld_agency ASC");
                        }else{
                            $result = $conn->query("select * from tbl_hotlines order by fld_agency ASC");
                        }
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>$row[fld_agency]</td>    
                                    <td><a href='tel:$row[fld_contact]'>$row[fld_contact]</a></td>    
                                    <td>$row[fld_special]</td>    
                                    <td>$row[fld_area]</td>    
                                        
                                </tr>";
                            
                        }
                        
                    ?>
                    </table>
                </div>
                
            </div>

        </div>   
        <br><br>
    </div>

    <br><br>
    <!--footer-->
</body>
    <script src="u_hotlinescript.js"></script>
</html>