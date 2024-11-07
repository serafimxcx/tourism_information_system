<?php 
                        
$result = $conn->query("select * from tbl_guidelines order by fld_datetime DESC");

while ($row = $result->fetch_assoc()) {
    echo "<div class='row'>
            <div class='guidelines_container'>
                <div class='shortcut_guidelines' >";
                
                echo "<div class='centeredtxt_guidelines'>
                        <h4 class='guidelines_title'>{$row['fld_title']}</h4>";
                        $date = date_create("{$row["fld_datetime"]}");
                        $date_time = date_format($date,"F j, Y h:i A");
                echo "<span class='guidelines_date'>$date_time</span>
                        </div>
                </div><br>
                <button type='button' class='btn_more_guidelines' guidelines_id='$row[id]'><span id='txt_more'>View Full Details</span><img id='more_icon' src='/tourism_information_system/btn_icons/more_icon.png'/></button>
            </div>
        </div>";
    
}

?>