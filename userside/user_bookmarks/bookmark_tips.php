<?php 
    
    $result = $conn->query("select tbl_tips.id, tbl_tips.fld_title, tbl_tips.fld_datetime from tbl_tips, tbl_bookmarks where tbl_bookmarks.tips_id = tbl_tips.id order by tbl_bookmarks.fld_datetime DESC");
    
    while ($row = $result->fetch_assoc()) {
        echo "<div class='row'>
                <div class='tips_container'>
                    <div class='shortcuts_tips' >";
                    
                    echo "<div class='centeredtxt_tips'>
                            <h4 class='tips_title'>{$row['fld_title']}</h4>";
                            $date = date_create("{$row["fld_datetime"]}");
                            $date_time = date_format($date,"F j, Y h:i A");
                    echo "<span class='tips_date'>$date_time</span>
                            </div>
                    </div><br>
                    <button type='button' class='btn_more_tips' tips_id='$row[id]'><span id='txt_more'>View Full Details</span><img id='more_icon' src='/tourism_information_system/btn_icons/more_icon.png'/></button>
                </div>
            </div>";
        
    }
    
?>