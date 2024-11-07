<?php 
    include("../../connect.php");
    session_start();

    $current_id = $_POST["destination_id"];
    $current_name = $_POST["destination_name"];

    $query = "select * FROM tbl_destinations where ( fld_type like '%Museum%' or fld_type like '%Historical Landmark%') and fld_name > '$current_name' ORDER BY fld_name LIMIT 1";

    $result = mysqli_query($conn, $query);

    $get_next_d = '';
    
    if ( $row = mysqli_fetch_assoc($result) ) {
        
        $get_next_d .= '{';
        $get_next_d .= '"destination_id":"'.$row["id"].'",';
        $get_next_d .= '"destination_type":"'.$row["fld_type"].'"';
        $get_next_d .= '}';
        
    } else{
        echo "max";
    }

    
    echo $get_next_d;
?>