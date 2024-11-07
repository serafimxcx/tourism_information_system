<?php

    include("../../connect.php");
    session_start();

    $query = "delete from tbl_stories 
                where id=".intval($_REQUEST["story_id"]);
    mysqli_query($conn,$query) or die(mysqli_error($conn)."<br>".$query);

    echo "";

?>
