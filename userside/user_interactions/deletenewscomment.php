<?php

    include("../../connect.php");
    session_start();

    $query = "delete from tbl_newscomments 
                where id=".intval($_REQUEST["comment_id"]);
    mysqli_query($conn,$query) or die(mysqli_error($conn)."<br>".$query);

    echo "";

?>
