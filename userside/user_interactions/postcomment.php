<?php 
    include("../../connect.php");
    session_start();

    if(!isset($_SESSION["username"])){
        $response = array('not_login'=>true, 'url'=>"/tourism_information_system/index.php?not_logged_in=true");
        echo json_encode($response);

    }else{
        //date and time now
        date_default_timezone_set('Asia/Manila');
        $dateNow = date("Y-m-d H:i:s");

        $user_id = $_SESSION['user_id'];


        $targetDir = "../img_comments/";        
        $fileNames = array_filter($_FILES["imgs_comment"]["name"]);
        $allowTypes = array('jpg','png','jpeg','gif','pdf', 'JPG', 'JPEG', 'PNG', 'GIF', 'mp4', 'MP4');
        $fileIMGs = implode(",", $fileNames);

        if($fileNames){
            foreach($_FILES["imgs_comment"]["name"] as $key=>$val){
                $fileName = basename($_FILES["imgs_comment"]["name"][$key]);
                $targetFilePath = $targetDir . $fileName;
                $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

                // Allow certain file formats
                if(in_array($fileType, $allowTypes)){
                    // Upload file to server
                    if(move_uploaded_file($_FILES["imgs_comment"]["tmp_name"][$key], $targetFilePath)){
                        // Declaring the values for insert query
                        $insertValuesSQL = "('$user_id','$_POST[txt_story_id]','".mysqli_real_escape_string($conn, $_POST["txt_content"])."', '".$fileIMGs."', '$dateNow')";
                    }else{
                        $response = array('success'=>false, 'message'=>"Sorry, there was an error uploading your file.");
                        echo json_encode($response);
                    }
                }else{
                    $response = array('success'=>false, 'message'=>"Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.");
                    echo json_encode($response);
                }
            }
            
            if(!empty($insertValuesSQL)){
                //insertion of the values in the sql query
                $insert = $conn->query("insert into tbl_comments (user_id, story_id, fld_content, fld_commentimages, fld_datetime) values $insertValuesSQL");
                if($insert){
                    $conn->query("insert into tbl_usernotif (user_id, notification_type, content_id, fld_datetime) VALUES ($user_id, 'comment', '$_POST[txt_story_id]', '$dateNow')");
                    $resultComments = $conn->query("select * from tbl_comments where story_id='$_POST[txt_story_id]'") ;
                    $numcomments = mysqli_num_rows($resultComments);


                    $response = array('success'=>true, 'message'=>"Comment Posted Successfully. ", 'numcomments'=>$numcomments);

            
                    echo json_encode($response);
                }else{
                    $response = array('success'=>false, 'message'=>"File upload failed, please try again.");
                    echo json_encode($response);
                } 
                    
            }else{
                $response = array('success'=>false, 'message'=>"Upload Failed.");
                echo json_encode($response);
                
            }

        }elseif(empty($fileNames)){
            //insertion of the values in the sql query
            $insertValuesSQL = "('$user_id','$_POST[txt_story_id]','".mysqli_real_escape_string($conn, $_POST["txt_content"])."', '".$fileIMGs."', '$dateNow')";
            $insert = $conn->query("insert into tbl_comments (user_id, story_id, fld_content, fld_commentimages, fld_datetime) values $insertValuesSQL");
            if($insert){
                $conn->query("insert into tbl_usernotif (user_id, notification_type, content_id, fld_datetime) VALUES ($user_id, 'comment', '$_POST[txt_story_id]', '$dateNow')");
                $resultComments = $conn->query("select * from tbl_comments where story_id='$_POST[txt_story_id]'") ;
                $numcomments = mysqli_num_rows($resultComments);

                $response = array('success'=>true, 'message'=>"Comment Posted Successfully. ", 'numcomments'=>$numcomments);
                
                echo json_encode($response);

            }else{
                $response = array('success'=>false, 'message'=>"File upload failed, please try again.");
                echo json_encode($response);
            } 
        }
    }

    
?>