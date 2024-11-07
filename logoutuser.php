<?php
if(isset($_GET['action'])  && $_GET['action'] == "logout")  {
    // Start the session
    session_start();

   
      unset($_SESSION["admin_id"]);
      unset($_SESSION["admin_type"]);
      unset($_SESSION["adminusername"]);
    

    // Unset the session variables
    unset($_SESSION["username"]);
    unset($_SESSION["user_id"]);
    unset($_SESSION["user_type"]);

    

    $response = array('success'=>true, 'message'=>" You have successfully logout your account.");
    echo json_encode($response);

}else{
   $response = array('success'=>true, 'message'=>" Logout Failed.");
   echo json_encode($response);
  }

?>