<div class="setupcontainer" style="<?php
            if($name == ""){
                echo "display:block;";

            }else{
                echo "display:none;";
            }
            ?>">
                <form enctype="multipart/form-data" id="setup_profile_form">
                
                    <div class="setupdiv" id="setupdiv1">
                        <h1 class="setuptxt">Set Up Your Account</h1><hr>
                            <h4>Add your name.</h4><br><br>
                            <div class="setupcontentdiv">
                                <input type="text" class="form-control" name="txt_name" id="txt_name">
                            </div><br><br>
                            <div class="btncontainer">
                            <button type="button" class="btn_setup" id="btn_continue1">Continue</button> 
                            
                            </div>
                                
                    </div>

                    <div class="setupdiv" id="setupdiv2">
                        <h1 class="setuptxt">Set Up Your Account</h1><hr>
                            <h4>Tell us something about yourself.</h4><br><br>
                            <div class="setupcontentdiv">
                                <textarea name="txt_about" id="txt_about" class="form-control" maxlength="1000"></textarea>
                            </div><br><br>
                            <div class="btncontainer">  
                            <button type="button" class="btn_setup" id="btn_back1">Back</button> 
                            <button type="button" class="btn_setup" id="btn_continue2">Continue</button>
                            
                            </div>
                            
                    </div>

                    <div class="setupdiv" id="setupdiv3">
                        <h1 class="setuptxt">Set Up Your Account</h1><hr>
                            <h4>Add your profile picture.</h4><br><br>
                            <div class="setupcontentdiv">
                                <img id="profileImage" width="150" height="150" src="/tourism_information_system/btn_icons/add_dp_icon.png" alt="add-administrator"/>
                                <input id="imageUpload" type="file" 
                                    name="img_profile" placeholder="Photo" capture>
                                    <br><br>
                                Image Selected: <span id="selectedimg"></span>
                            </div><br><br>
                            <div class="btncontainer">
                            <button type="button" class="btn_setup" id="btn_back2">Back</button> 
                            <button type="button" class="btn_setup" id="btn_save">Save</button>  
                            </div>
                            
                    </div>
                </form>
            </div>