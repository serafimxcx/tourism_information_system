<?php 
include("connect.php");
session_start();

$query = "update tbl_usernotif set status = 'read' where id='$_POST[notif_id]'";

mysqli_query($conn, $query);

?>