<div class="eventscontainer">
            <div id="load_events_div">
            <?php 
            $status="";

           
            $result = $conn->query("select tbl_events.id, tbl_events.fld_content, tbl_events.fld_startdate, tbl_events.fld_enddate, tbl_events.fld_mainimage, tbl_events.fld_title, tbl_events.fld_type, tbl_events.fld_type from tbl_events, tbl_bookmarks where tbl_bookmarks.event_id = tbl_events.id order by tbl_bookmarks.fld_datetime DESC");
            

            while($row = $result->fetch_assoc()){
                $content = $row["fld_content"];
                $preview = substr($content, 0, 500);

                $currentDate = date("Y-m-d");
                $startdate = $row["fld_startdate"];
                $enddate = $row["fld_enddate"];

                if($currentDate < $startdate){
                    $status = "<span id='status_nys'>Event not yet started</span>";
                }elseif($currentDate > $enddate){
                    $status = "<span id='status_f'>Event Finished</span>";
                }else{
                    $status = "<span id='status_o'>Event Ongoing</span>";
                }

                echo "<div class='i_event'>
                    <div class='row'>
                        <div class='i_event_img col-sm-4'>
                            <img src='/tourism_information_system/adminside/events/uploaded_mainimages/{$row['fld_mainimage']}' alt='Image' class='mainImage_event'>
                        </div>
                        <div class='i_event_info col-sm-8'>
                            <h2><b>$row[fld_title]</b></h2>";

                            if(!isset($_GET["event_type"])){
                                echo "<h4>$row[fld_type]</h4>";
                            }

                        echo "$status<br><br><br>
                        <p class='d_content'>$preview...</p><br>
                        <button type='button' class='btn_more_events' event_id='$row[id]' event_type='$row[fld_type]'><span id='txt_more'>View Full Details</span><img id='more_icon' src='/tourism_information_system/btn_icons/more_icon.png'/></button>
                        </div>
                    </div>
                </div>";
            }
            ?>
            </div>
        </div>