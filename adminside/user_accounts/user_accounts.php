<?php
    include("../navbar.php");
    
    if(isset($_GET['txtdel'])){

        $result = $conn->query("select * from tbl_users where id like '$_GET[txtdel]'");
        while($row = $result->fetch_assoc()){
            $conn->query("insert into a_activity_log(admin_id, fld_activity, fld_datetime)values('$admin_id', ' has remove a user [ ".$row['fld_username']." ]', '$dateNow')");
        }
            
        
        $deleteuserstory = $conn->query("delete from tbl_stories where writer_id like '$_GET[txtdel]'");
        $deletedestinationreview = $conn->query("delete from tbl_reviewsratings where user_id like '$_GET[txtdel]'");
        $deleteuserlikes = $conn->query("delete from tbl_likes where user_id like '$_GET[txtdel]'");
        $deleteusercomments = $conn->query("delete from tbl_comments where user_id like '$_GET[txtdel]'");
        $deleteuserreposts = $conn->query("delete from tbl_reposts where user_id like '$_GET[txtdel]'");
        $deleteuserreposts = $conn->query("delete from tbl_replies where user_id like '$_GET[txtdel]'");
        $deleteuserreposts = $conn->query("delete from tbl_bookmarks where user_id like '$_GET[txtdel]'");
        $deleted = $conn->query("delete from tbl_users where id like '$_GET[txtdel]'");

        if($deleted && $deleteuserstory && $deletedestinationreview && $deleteuserreposts && $deleteusercomments){
            $statusMsg = 'Account Deleted Successfully.';
            echo "<script> alert('$statusMsg'); location.href='user_accounts.php';</script>";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="u_accountstyle.css">
    <title>Manage User Accounts</title>
</head>
<body>
<div class="header" id="headercontainer">  
            <button type="button" class="btn btn-dark btn-lg" id="btn_menu"><span class="glyphicon glyphicon-menu-hamburger"></span></button>   
            <h2 id="headertitle">MANAGE USER ACCOUNTS</h2>
        </div>
    <div id="container">
         
        <br><br>
        
        <div class="accountsdiv">
            <!--search feature-->
            <div class="searchdiv">
                <form action="user_accounts.php" method="get">
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
                    <th>User Type</th><th>Username</th><th>Name</th><th>Email</th><th>Date Registered</th><th>isVerified</th><th>Send Verification <i><span id='verify_message'></span></i></th><th></th>
                </tr>
                <?php
                    if(isset($_GET["search_name"])){
                        $result =  $conn->query("select * from tbl_users where fld_name like '$_GET[search_name]%' or fld_type like '$_GET[search_name]' ORDER BY ID DESC");
                       
                    }else{
                        $result = $conn->query("select * from tbl_users ORDER BY ID DESC");
                        
                    }
                    

                    while($row=$result->fetch_assoc()){
                        echo "<tr>";
                            if($row["fld_type"] == "Business" || $row["fld_type"] == "Municipality"){
                            echo "<td>$row[fld_type] <br><span class='btn_viewproof'><a href='https://drive.google.com/uc?export=view&id=".stripslashes($row["fld_imgproof"])."' target='_blank'>View Proof</a></span></td>";
                            }else{
                                echo "<td>$row[fld_type]</td>";
                            }
                            echo "<td>$row[fld_username]</td>
                            <td>$row[fld_name]</td>
                            <td>$row[fld_email]</td>
                            <td>$row[fld_datejoin]</td>";

                            if($row["fld_isVerified"] == 1){
                                echo "<td>True</td>";
                            }elseif($row["fld_isVerified"] == 0){
                                echo "<td>False</td>";
                            }

                            
                        echo "<td style='text-align:center;'><button type='button' class='btn btn-success' onclick=sendEmail('$row[fld_email]'".",'$row[fld_username]"."') ><i class='bi bi-envelope-arrow-up'></i></button></td>
                        <td style='text-align:center;'><button type='button' class='btn btn-danger' onclick=del('$row[id]')><span class='glyphicon glyphicon-trash'></span></button></td>
                        
                        </tr>";
                    }
                ?>
            </table>
        </div>
    </div>
</body>
    <script src="u_accountscript.js"></script>
</html>