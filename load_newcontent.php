<?php 
include("connect.php");
session_start();

$loadnewcontent = "";


    $result = $conn->query("select tbl_admin.fld_name, a_activity_log.fld_activity, a_activity_log.fld_datetime from a_activity_log, tbl_admin where a_activity_log.admin_id = tbl_admin.id and a_activity_log.fld_activity like '%added%' order by a_activity_log.fld_datetime DESC");

    while($row = $result->fetch_assoc()){
        $loadnewcontent .= "<div class='newcontent_records'>
        $row[fld_name] $row[fld_activity] on ".date_format(date_create($row["fld_datetime"]), "F j, Y h:i:s A").".
        </div>";
    }

    echo $loadnewcontent;

?>