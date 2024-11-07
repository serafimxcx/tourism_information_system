<div class="modal" id="post_story_modal" style="
        <?php
        if(isset($_GET["poststory"])){
            echo 'display:block;';
        }else{
            echo 'display:none;';
        }
        ?>
        
        ">
        <div id="post_story_div">
        <form enctype="multipart/form-data" id="add_story_form">
            <table width="100%">
                <tr>
                    <td width="10%"><img src='<?php echo $profpic;?>' alt='Image' id='mini_dp'></td>
                    <td width="90%"><h5>Post a story</h5></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="text" name="txt_title" class="form-control" id="txt_title" placeholder="Title">
                        <textarea name="txt_content" class="form-control" id="txt_content" placeholder="Tell us what's on your mind"></textarea>
                        <br>

                        <div class="row">
                            <div class="col-sm-3">
                                Tag a Destination:
                            </div>
                            <div class="col-sm-9">
                                <div class="search_d_div">
                                    <div id="search_d">
                                        <input type="text" class="form-control" name="search_destination" id="search_destination" autocomplete="off" placeholder="Search Destination"> 
                                        <input type="hidden" name="txt_destination_id" id="txt_destination_id">
                                        <div id="search_result_d"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-3">
                                Tag an Event:
                            </div>
                            <div class="col-sm-9">
                                <div class="search_e_div">
                                    <div id="search_e">
                                        <input type="text" class="form-control" name="search_event" id="search_event" autocomplete="off" placeholder="Search Event"> 
                                        <input type="hidden" name="txt_event_id" id="txt_event_id">
                                        <div id="search_result_e"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <br>
                        <img id="add_image_story" src="/tourism_information_system/btn_icons/add_image_story.png" alt="add-image"/>
                        <input id="imagePostStory" type="file" 
                            name="imgs_story[]" placeholder="Photo" multiple>&nbsp;
                            <br><br>
                        <div id="previewFilesStory"></div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><div class="btncontainer">
                        <button type="button" class="btn_setupstory" id="btn_cancelstory">Cancel</button>
                        <button type="button" class="btn_setupstory" id="btn_savestory">Post</button>
                    </div></td>
                </tr>
            </table>
        
        </form>
        </div>

    </div>