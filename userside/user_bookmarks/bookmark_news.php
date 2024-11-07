<?php 
    
   
    $result = $conn->query("select tbl_news.id, tbl_news.fld_category, tbl_news.fld_mainimage, tbl_news.fld_title, tbl_news.fld_datetime from tbl_news, tbl_bookmarks where tbl_bookmarks.news_id = tbl_news.id order by tbl_bookmarks.fld_datetime DESC");
    


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
    

            echo "<div class='news_container' news_id='{$row['id']}' news_category='{$row['fld_category']}'>
                <div class='shortcutsdiv shortcut_news' >";
                if(!isset($news_category)){
                    if("{$row["fld_category"]}" == "News Info"){
                        echo "<div class='category_newsinfo'>NEWS INFO</div>";
                    }elseif("{$row["fld_category"]}" == "Business"){
                        echo "<div class='category_business'>BUSINESS</div>";
                    }elseif("{$row["fld_category"]}" == "Lifestyle"){
                        echo "<div class='category_lifestyle'>LIFESTYLE</div>";
                    }elseif("{$row["fld_category"]}" == "Entertainment"){
                        echo "<div class='category_et'>ENTERTAINMENT</div>";
                    }elseif("{$row["fld_category"]}" == "Technology"){
                        echo "<div class='category_tech'>TECHNOLOGY</div>";
                    }
                }
                
                echo "<img src='/tourism_information_system/adminside/news/uploaded_mainimages/{$row['fld_mainimage']}' alt='Image' class='mainImage'>
                    <div class='centeredtxt_news'>
                        <h4 class='news_title'>{$row['fld_title']}</h4>";
                        $date = date_create("{$row["fld_datetime"]}");
                        $date_time = date_format($date,"F j, Y h:i A");
                echo "<span class='news_date'>$date_time</span>
                        </div>
                </div>
            </div>";
        }
        echo "</div>";
    }

?>