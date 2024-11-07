<?php 
                    
                    
                    $result = $conn->query("select tbl_destinations.id, tbl_destinations.fld_type, tbl_destinations.fld_name, tbl_destinations.fld_mainimage from tbl_destinations, tbl_bookmarks where tbl_bookmarks.destination_id = tbl_destinations.id");
                    
                    
                    $numColumns = 3;
                    $columnData = array_fill(0, $numColumns, []);

                    if ($result->num_rows > 0) {
                        $columnIndex = 0;
                        while ($row = $result->fetch_assoc()) {
                            $columnData[$columnIndex][] = $row;
                            $columnIndex = ($columnIndex + 1) % $numColumns;
                        }
                    }

                    

                    for ($i = 0; $i < $numColumns; $i++) {
                        echo "<div class='col-sm'>";
                        foreach ($columnData[$i] as $row) {
                    

                            echo "<div class='destinations_container'>
                            <div class='shortcutsdiv shortcut_destination' destination_id='{$row['id']}' destination_type='{$row['fld_type']}'>
                                <img src='/tourism_information_system/adminside/destinations/uploaded_mainimages/{$row['fld_mainimage']}' alt='Image' class='mainImage'>
                                <div class='overlay'>
                                <div class='centeredtxt'>{$row['fld_name']}</div>
                                </div>
                            </div>
                            </div>";
                        }
                        echo "</div>";
                    }
                
                    ?>