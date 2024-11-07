<?php
    include("../navbar.php");
    include("../connect.php");

    $agency = "";
    $contact = "";
    $specialization = "";
    $area = "";

    //date and time now
    date_default_timezone_set('Asia/Manila');
    $dateNow = date("Y-m-d H:i:s");

    //---------------------start- updating new hotline------------------------------
    if(isset($_POST["txt_id"])){
        $result = $conn->query("select * from tbl_hotlines where id like '$_POST[txt_id]'");
                    while($row = $result->fetch_assoc()){
                        $conn->query("insert into a_activity_log(admin_id, fld_activity, fld_datetime)values('$admin_id', ' has updated a hotline [ ".$row['fld_agency']." ] [ ".mysqli_real_escape_string($conn, $_POST["txt_agency"])." ]', '$dateNow')");
                    }
        
        $update = $conn->query("update tbl_hotlines set fld_agency='$_POST[txt_agency]', fld_contact='$_POST[txt_contact]', fld_special='$_POST[txt_special]', fld_area='$_POST[txt_area]' where id like '$_POST[txt_id]'");

        if($update){
            $statusMsg = "Updated Successfully.";
            echo "<script> alert('$statusMsg'); </script>";
        }
    }

    //---------------------end- updating new hotline------------------------------

    //---------------------start- adding new hotline------------------------------
    elseif(isset($_POST["txt_agency"])){
        $insert = $conn->query("insert into tbl_hotlines(admin_id, fld_agency, fld_contact, fld_special, fld_area) values ('$admin_id', '".mysqli_real_escape_string($conn, $_POST["txt_agency"])."','$_POST[txt_contact]', '$_POST[txt_special]', '$_POST[txt_area]')");

        if($insert){
            $conn->query("insert into a_activity_log(admin_id, fld_activity, fld_datetime)values('$admin_id', ' has added a new hotline [ ".mysqli_real_escape_string($conn, $_POST["txt_agency"])." ]', '$dateNow')");
            $statusMsg = "Added Successfully.";
            echo "<script> alert('$statusMsg'); </script>";
        }
    }

    //---------------------end- adding new hotline------------------------------

    //-------------------start- deleting hotline--------------------------------------
    elseif(isset($_GET['txtdel'])){
        $result = $conn->query("select * from tbl_hotlines where id like '$_GET[txtdel]'");
        while($row = $result->fetch_assoc()){
            $conn->query("insert into a_activity_log(admin_id, fld_activity, fld_datetime)values('$admin_id', ' has remove a hotline [ ".$row['fld_agency']." ]', '$dateNow')");
        }
            
        $deleted = $conn->query("delete from tbl_hotlines where id like '$_GET[txtdel]'");

        if($deleted){
            $statusMsg = 'Deleted Successfully.';
            echo "<script> alert('$statusMsg'); location.href='hotlines.php';</script>";
        }
        
    }
    //-------------------end- deleting hotline--------------------------------------

    //--------------------------start- getting the info of the hotline through id------------------------------------
    elseif(isset($_GET['txtedit'])){
        $result = $conn -> query("select * from tbl_hotlines where id like '$_GET[txtedit]'");
        while($row = $result->fetch_assoc()){
            $agency = $row["fld_agency"];
            $contact = $row["fld_contact"];
            $specialization = $row["fld_special"];
            $area = $row["fld_area"];
        }
    }
    //--------------------------end- getting the info of the hotline through id------------------------------------



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="hotlinestyle.css">
    <title>Manage Hotlines</title>
</head>
<body>
<div class="header" id="headercontainer">  
            <button type="button" class="btn btn-dark btn-lg" id="btn_menu"><span class="glyphicon glyphicon-menu-hamburger"></span></button>   
            <h2 id="headertitle">MANAGE HOTLINES</h2>
        </div> 
    <div id="container">
        
        <br><br>

        <!--viewing of inserted hospitals-->
        <div class='hotlinesdiv'>
            <br>
            <!--search feature-->
            <div class="searchdiv">
                <form action="hotlines.php" method="get">
                    <table>
                        <tr>
                            <td style="padding-top: 3px;"><span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;<label> Search: </label>&nbsp;</td>
                            <td><input type="text" class="form-control" name="search_name" onchange="this.form.submit()"> </td>
                        </tr>
                    </table>
                    
                </form>
            </div>
            <br><hr><br>

            <div id="addbtndiv">
                <button type="button" class="btn btn-info" id="btn_add_hotline"><span class="glyphicon glyphicon-plus"></span> &nbsp;Add Hotline</button>&nbsp;
            </div>

            <table class='table table-bordered'>
                
                <?php
                if($admintype != "Head Admin"){
                    if(isset($_GET["search_name"])){
                        $result =  $conn->query("select * from tbl_hotlines where admin_id like '$admin_id' and fld_agency like '$_GET[search_name]%'");
                       
                    }else{
                        $result = $conn->query("select * from tbl_hotlines where admin_id like '$admin_id'");
                        
                    }
    
                    echo "<tr>
                    <th>Agency</th><th>Contact</th><th>Specialization</th><th> Area Coverage</th><th></th><th></th>
                    </tr>";
                    
                    while($row = $result->fetch_assoc()){
                        echo "<tr>
                        <td>$row[fld_agency]</td>
                        <td>$row[fld_contact]</td>
                        <td>$row[fld_special]</td>
                        <td>$row[fld_area]</td>
                        <td style='text-align:center;'><button type='button' class='btn btn-warning' onclick=edit('$row[id]')><span class='glyphicon glyphicon-edit'></span></button></td>
                        <td style='text-align:center;'><button type='button' class='btn btn-danger' onclick=del('$row[id]')><span class='glyphicon glyphicon-trash'></span></button></td>
                        </tr>";
                    }

                }else{
                    if(isset($_GET["search_name"])){
                        $result =  $conn->query("select tbl_admin.fld_name, tbl_hotlines.id, tbl_hotlines.fld_agency, tbl_hotlines.fld_contact, tbl_hotlines.fld_special, tbl_hotlines.fld_area from tbl_hotlines, tbl_admin where tbl_hotlines.admin_id = tbl_admin.id and (tbl_hotlines.fld_agency like '$_GET[search_name]%' or tbl_admin.fld_name like '$_GET[search_name]%')");
                       
                    }else{
                        $result = $conn->query("select tbl_admin.fld_name, tbl_hotlines.id, tbl_hotlines.fld_agency, tbl_hotlines.fld_contact, tbl_hotlines.fld_special, tbl_hotlines.fld_area from tbl_hotlines, tbl_admin where tbl_hotlines.admin_id = tbl_admin.id");
                        
                    }
    
                    echo "<tr>
                    <th>Writer</th><th>Agency</th><th>Contact</th><th>Specialization</th><th> Area Coverage</th><th></th><th></th>
                    </tr>";
                    
                    while($row = $result->fetch_assoc()){
                        echo "<tr>
                        <td>$row[fld_name]</td>
                        <td>$row[fld_agency]</td>
                        <td>$row[fld_contact]</td>
                        <td>$row[fld_special]</td>
                        <td>$row[fld_area]</td>
                        <td style='text-align:center;'><button type='button' class='btn btn-warning' onclick=edit('$row[id]')><span class='glyphicon glyphicon-edit'></span></button></td>
                        <td style='text-align:center;'><button type='button' class='btn btn-danger' onclick=del('$row[id]')><span class='glyphicon glyphicon-trash'></span></button></td>
                        </tr>";
                    }
                }
                ?>
            </table>    
        </div>

        <!--modal for adding/editing guidelines-->
        <div class="modal" id="hotlines_modal" style="
        <?php
        if(isset($_GET["txtedit"])){
            echo 'display:flex;';
        }else{
            echo 'display:none;';
        }
        ?>
        
        ">
            <div id="div_add_hotline">
            <?php
            if(isset($_GET["txtedit"])){
                echo '<h2>Edit Existing Hotline</h2>';
            }else{
                echo '<h2>Add New Hotline</h2>';
            }
            ?>
                <br>

                <form action="hotlines.php" method="post" enctype="multipart/form-data">
                <table width="100%">
                    <tr>
                        <td><label>Agency: </label><input type="text" name="txt_agency" class="form-control" id="txt_agency" value='<?php echo $agency?>' required><br></td>
                    </tr>
                    <tr>
                        <td><label>Contact: </label><input type="text" name="txt_contact" class="form-control" id="txt_contact" value='<?php echo $contact?>'  required><br></td>
                    </tr>
                    <tr>
                        <td><label>Specialization: </label><input type="text" name="txt_special" class="form-control" id="txt_special" value='<?php echo $specialization?>'  required><br></td>
                    </tr>
                    <tr>
                        <td><label>Area Coverage: </label><input type="text" name="txt_area" class="form-control" id="txt_area" value='<?php echo $area?>'  required><br></td>
                    </tr>
                </table>
                
                <div style="width:100%; text-align: right;">
                    <button type="button" class="btn btn-danger" id="btn_cancel">Cancel</button>
                    <?php
                        if(isset($_GET['txtedit'])){
                            echo "
                            <input type=hidden name=txt_id value=$_GET[txtedit]>
                            <button type='submit' class='btn btn-primary'><span class='glyphicon glyphicon-save'></span> &nbsp;Update Hotline</button>";
                        }else{
                            echo "<button type='submit' class='btn btn-primary'><span class='glyphicon glyphicon-save'></span> &nbsp;Save Hotline</button>";
                        }
                    ?> 
                    
                </div>
                </form>
            </div>
        </div>


    </div>
</body>
    <script src="hotlinescript.js"></script>
</html>