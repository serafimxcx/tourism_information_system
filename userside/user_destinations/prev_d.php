<?php 
    include("../../connect.php");
    session_start();

    $current_id = $_POST["destination_id"];
    $current_name = $_POST["destination_name"];

    $query = "select * FROM tbl_destinations where ( fld_type like '%Museum%' or fld_type like '%Historical Landmark%') and fld_name < '$current_name' ORDER BY fld_name DESC LIMIT 1";

    $result = mysqli_query($conn, $query);

    $get_prev_d = '';
    
    if ( $row = mysqli_fetch_assoc($result) ) {
        
        $get_prev_d .= '{';
        $get_prev_d .= '"destination_id":"'.$row["id"].'",';
        $get_prev_d .= '"destination_type":"'.$row["fld_type"].'"';
        $get_prev_d .= '}';
        
    } else{
        echo "max";
    }

    
    echo $get_prev_d;
?>