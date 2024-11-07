<?php
    $qrcontent = true;
    include("../../navbar.php");

    $name = "";
    $description = "";
    $img = "";

    if(isset($_GET["furniture_name"])){
        $result= $conn->query("select * from tbl_furnitures where fld_name like '$_GET[furniture_name]'");

        while($row = $result->fetch_assoc()){
            $name = $row["fld_name"];
            $description = nl2br($row["fld_desc"]);
            $img = $row["fld_image"];
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
    <link rel="stylesheet" href="furniturestyle.css">
    <title>FordaTravel: <?php $name;?></title>
</head>
<body>
    <!--header-->
    <?php include_once("../../header.php"); ?>

    <br>




    <div class="contentdiv">
        <div class="content">
            <div class="row img_container">
            <div class="col-lg">
                <center>
                   
                    <img src='./img_furnitures/<?php echo $img; ?>' alt='Image' class='img_content'> 
                 
                </center>
                
            </div>
            <div class="col-lg">
                <br><br>
                <h1 class="contenttitle"><?php echo $name; ?></h1>
                <hr>
                <p class="contentdesc">
                    <?php echo $description; ?>
                </p>
            </div>
            </div>
            
        </div>
        

        <!--footer-->
        <?php include("../../footer.php"); ?>
    </div>
    

    
</body>
</html>