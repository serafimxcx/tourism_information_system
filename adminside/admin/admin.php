<?php
    include("../navbar.php");
    include("../connect.php");

    $statusMSg = "";
    $name="";
    $contactno="";
    $email="";
    $username="";
    $password="";

    if(isset($_POST['txt_id'])){
        //check if username is already exisitng
        $result = $conn->query("select * from tbl_admin where id like '$_POST[txt_id]'");
        $checkuser = $conn->query("select * from tbl_admin where fld_username like '$_POST[txt_username]'");

        while($row = $result->fetch_assoc()){
            if($row["fld_username"] ==  $_POST["txt_username"]){
                $updated = $conn->query("update tbl_admin set fld_name = '$_POST[txt_name]', fld_username = '$_POST[txt_username]', fld_password = '$_POST[txt_password]', fld_contactno = '$_POST[txt_contactno]', fld_email = '$_POST[txt_email]' where id like '$_POST[txt_id]' ");
        
                if($updated){
                    $statusMsg = "Updated Successfully.";
                    echo "<script> alert('$statusMsg'); location.href='admin.php';</script>";
                }
            }else{
                if(mysqli_num_rows($checkuser) == 1){
                    $statusMsg = "Username is already existing.";
                    echo "<script> alert('$statusMsg'); </script>";
                }else{
                    $updated = $conn->query("update tbl_admin set fld_name = '$_POST[txt_name]', fld_username = '$_POST[txt_username]', fld_password = '$_POST[txt_password]', fld_contactno = '$_POST[txt_contactno]', fld_email = '$_POST[txt_email]' where id like '$_POST[txt_id]' ");
                
                    if($updated){
                        $statusMsg = "Updated Successfully.";
                        echo "<script> alert('$statusMsg'); location.href='admin.php';</script>";
                    }
                }
            }
        }

        
    }

    //----------------start- adding new admin--------------------------------
    elseif(isset($_POST['txt_name'])){

        //check if username is already exisitng
        $checkuser = $conn->query("select * from tbl_admin where fld_username like '$_POST[txt_username]'");
        if(mysqli_num_rows($checkuser) == 0){
            $insert = $conn->query("insert into tbl_admin(fld_name, fld_type, fld_username, fld_password, fld_contactno, fld_email) values('$_POST[txt_name]','System Admin', '$_POST[txt_username]', '$_POST[txt_password]', '$_POST[txt_contactno]', '$_POST[txt_email]')");
        
            if($insert){
                $statusMsg = "Added Successfully.";
                echo "<script> alert('$statusMsg'); </script>";
            }

        }else{
            $statusMsg = "Username is already existing.";
            echo "<script> alert('$statusMsg'); </script>";
        }
    }
    //-----------------end- adding new admin-----------------------------------------

    //-------------------start- deleting admin--------------------------------------
    elseif(isset($_GET['txtdel'])){
            
        $deleted = $conn->query("delete from tbl_admin where id like '$_GET[txtdel]'");

        if($deleted){
            $statusMsg = 'Deleted Successfully.';
            echo "<script> alert('$statusMsg'); location.href='admin.php';</script>";
        }
        
    }
    //-------------------end- deleting admin--------------------------------------

    //--------------------------start- getting the info of the admin through id------------------------------------
    if(isset($_GET['txtedit'])){
        $result = $conn -> query("select * from tbl_admin where id like '$_GET[txtedit]'");
        while($row = $result->fetch_assoc()){
            $name = $row["fld_name"];
            $contactno = $row["fld_contactno"];
            $email = $row["fld_email"];
            $username = $row["fld_username"];
            $password = $row["fld_password"];
        }
    }
    //--------------------------end- getting the info of the admin through id------------------------------------

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="adminstyle.css">
    <title>Admin</title>
</head>
<body>
    <div class="header" id="headercontainer">  
            <button type="button" class="btn btn-dark btn-lg" id="btn_menu"><span class="glyphicon glyphicon-menu-hamburger"></span></button>   
            <h2 id="headertitle">MANAGE ADMIN</h2>
        </div> 
    <div id="container">

        <div id="admin_container">
            <div id="admindiv">
                <div id="btndiv">
                <button type="button" class="btn btn-info" id="btn_add_admin"><span class="glyphicon glyphicon-plus"></span> &nbsp;Add New Admin</button>&nbsp;
                <button type="button" class="btn btn-info" id="btn_update_security" onclick=edit(1)><span class="glyphicon glyphicon-edit"></span> &nbsp;Update Head Admin</button>&nbsp;
                </div>
                <br>
                <table class="table table-bordered">
                    <tr>
                        <th>Admin Type</th><th>Username</th><th>Name</th><th>Contact</th><th>Email</th><th></th><th></th>
                    </tr>
                    <?php 
                        $result = $conn->query("select * from tbl_admin where id > '1'");
                        while($row = $result->fetch_assoc()){
                            echo "<tr>
                                <td>$row[fld_type]</td>
                                <td>$row[fld_username]</td>
                                <td>$row[fld_name]</td>
                                <td>$row[fld_contactno]</td>
                                <td>$row[fld_email]</td>
                                <td style='text-align:center;'><button type='button' class='btn btn-warning' onclick=edit('$row[id]')><span class='glyphicon glyphicon-edit'></span></button></td>
                                <td style='text-align:center;'><button type='button' class='btn btn-danger' onclick=del('$row[id]')><span class='glyphicon glyphicon-trash'></span></button></td>
                                </tr>";
                        }
                    ?>
                </table>

                <!---->
                <div class="modal" id="admin_modal" style="
                <?php
                if(isset($_GET["txtedit"])){
                    echo 'display:flex;';
                }else{
                    echo 'display:none;';
                }
                ?>
                
                ">
                    <div id="div_addupdate_admin">
                    <?php
                    if(isset($_GET['txtedit'])){
                        echo "<h2>Edit Existing Admin</h2>";
                    }else{
                        echo "<h2>Add New Admin</h2>";
                    }
                    ?>
                        <br>
                        <form action="" method="post">
                            <table width="100%">
                                <tr>
                                    <td class="td_input" colspan="2"><label>Name: </label>&nbsp;<input type="text" name="txt_name" class="form-control" id="txt_name" value='<?php echo $name;?>' required><br></td>
                                </tr>
                                <tr>
                                    <td class="td_input"><label>Contact Number:</label>&nbsp;<input type="text" name="txt_contactno" class="form-control" id="txt_contactno" value='<?php echo $contactno;?>' required></td>
                                    <td class="td_input"><label>Email:</label>&nbsp;<input type="text" name="txt_email" class="form-control" id="txt_email" value='<?php echo $email;?>' required></td>
                                </tr>
                                <tr>
                                    <td class="td_input" colspan="2"><hr></td>
                                </tr>
                                <tr>
                                <td class="td_input"><label>Username:</label>&nbsp;<input type="text" name="txt_username" class="form-control" id="txt_username" value='<?php echo $username;?>' required></td>
                                    <td class="td_input"><label>Password:</label>&nbsp;<input type="text" name="txt_password" class="form-control" id="txt_password" value='<?php echo $password;?>' required></td>
                                </tr>
                            </table>
                            <br>
                            <div style="width:100%; text-align: right;">
                                <button type="button" class="btn btn-danger" id="btn_cancel">Cancel</button>
                                <?php
                                    if(isset($_GET['txtedit'])){
                                        echo "
                                        <input type=hidden name=txt_id value=$_GET[txtedit]>
                                        <button type='submit' class='btn btn-primary'><span class='glyphicon glyphicon-save'></span> &nbsp;Update Admin</button>";
                                    }else{
                                        echo "<button type='submit' class='btn btn-primary'><span class='glyphicon glyphicon-save'></span> &nbsp;Save Admin</button>";
                                    }
                                ?> 
                       
                    </div>
                        </form>
                    </div>
                </div>





            </div>
        </div>

    </div>
</body>
    <script src="adminscript.js"></script>
</html>