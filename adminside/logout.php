<?php
// Start the session
include("connect.php");
session_start();

//date and time now
date_default_timezone_set('Asia/Manila');
$dateNow = date("Y-m-d H:i:s");

$conn->query("insert into a_activity_log(admin_id, fld_activity, fld_datetime)values('$_SESSION[admin_id]', ' has logged out', '$dateNow')");

// Unset all of the session variables
unset($_SESSION["adminusername"]);
unset($_SESSION["admin_id"]);
unset($_SESSION["admin_type"]);




// Redirect to the login page
header('Location: adminlogin.php');
exit();
?>