<?php 
    include("../../connect.php");
    session_start();

    //date and time now
    date_default_timezone_set('Asia/Manila');
    $dateNow = date("Y-m-d H:i:s");

    $user_id = $_SESSION['user_id'];

    $result = $conn -> query("select * from tbl_users where id like '$user_id'");
        while($row = $result->fetch_assoc()){
            $writer_id = $row["id"];
            $writer = $row["fld_name"];
        }

    $targetDir = "../img_stories/";        
    $fileNames = array_filter($_FILES["imgs_story"]["name"]);
    $allowTypes = array('jpg','png','jpeg','gif','pdf', 'JPG', 'JPEG', 'PNG', 'GIF', 'mp4', 'MP4');
    $fileIMGs = implode(",", $fileNames);

    if($fileNames){
        foreach($_FILES["imgs_story"]["name"] as $key=>$val){
            $fileName = basename($_FILES["imgs_story"]["name"][$key]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

            // Allow certain file formats
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["imgs_story"]["tmp_name"][$key], $targetFilePath)){
                    // Declaring the values for insert query
                    if($_POST["txt_event_id"] == "" && $_POST["txt_destination_id"] == ""){
                        $insertValuesSQL = "('$writer_id','$writer', '".mysqli_real_escape_string($conn, $_POST["txt_title"])."','".mysqli_real_escape_string($conn, $_POST["txt_content"])."', '".$fileIMGs."', '$dateNow') ";
                    }elseif($_POST["txt_destination_id"] == ""){
                        $insertValuesSQL = "('$writer_id','$writer', '".mysqli_real_escape_string($conn, $_POST["txt_title"])."','".mysqli_real_escape_string($conn, $_POST["txt_content"])."', '".$fileIMGs."', '$dateNow', '$_POST[txt_event_id]')";
                    }elseif($_POST["txt_event_id"] == ""){
                        $insertValuesSQL = "('$writer_id','$writer', '".mysqli_real_escape_string($conn, $_POST["txt_title"])."','".mysqli_real_escape_string($conn, $_POST["txt_content"])."', '".$fileIMGs."', '$dateNow', '$_POST[txt_destination_id]')";
                    }else{
                        $insertValuesSQL = "('$writer_id','$writer', '".mysqli_real_escape_string($conn, $_POST["txt_title"])."','".mysqli_real_escape_string($conn, $_POST["txt_content"])."', '".$fileIMGs."', '$dateNow', '$_POST[txt_destination_id]','$_POST[txt_event_id]')";
                    }
                    
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
            if($_POST["txt_event_id"] == "" && $_POST["txt_destination_id"] == ""){
    
                $insert = $conn->query("insert into tbl_stories (writer_id, fld_writer, fld_title, fld_content, fld_storyimages, fld_date ) values $insertValuesSQL");
            }elseif($_POST["txt_destination_id"] == ""){
                $insert = $conn->query("insert into tbl_stories (writer_id, fld_writer, fld_title, fld_content, fld_storyimages, fld_date, event_id) values $insertValuesSQL");
            }elseif($_POST["txt_event_id"] == ""){
                $insert = $conn->query("insert into tbl_stories (writer_id, fld_writer, fld_title, fld_content, fld_storyimages, fld_date, destination_id) values $insertValuesSQL");
            }else{
                $insert = $conn->query("insert into tbl_stories (writer_id, fld_writer, fld_title, fld_content, fld_storyimages, fld_date, destination_id, event_id) values $insertValuesSQL");
            }
            
            if($insert){
                $response = array('success'=>true, 'message'=>"Story Posted Successfully. ");
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
        if($_POST["txt_event_id"] == "" && $_POST["txt_destination_id"] == ""){
            $insertValuesSQL = "('$writer_id','$writer', '".mysqli_real_escape_string($conn, $_POST["txt_title"])."','".mysqli_real_escape_string($conn, $_POST["txt_content"])."', '".$fileIMGs."', '$dateNow') ";

            $insert = $conn->query("insert into tbl_stories (writer_id, fld_writer, fld_title, fld_content, fld_storyimages, fld_date) values $insertValuesSQL");
        }elseif($_POST["txt_destination_id"] == ""){
            $insertValuesSQL = "('$writer_id','$writer', '".mysqli_real_escape_string($conn, $_POST["txt_title"])."','".mysqli_real_escape_string($conn, $_POST["txt_content"])."', '".$fileIMGs."', '$dateNow', '$_POST[txt_event_id]')";

            $insert = $conn->query("insert into tbl_stories (writer_id, fld_writer, fld_title, fld_content, fld_storyimages, fld_date, event_id) values $insertValuesSQL");
        }elseif($_POST["txt_event_id"] == ""){
            $insertValuesSQL = "('$writer_id','$writer', '".mysqli_real_escape_string($conn, $_POST["txt_title"])."','".mysqli_real_escape_string($conn, $_POST["txt_content"])."', '".$fileIMGs."', '$dateNow', '$_POST[txt_destination_id]')";

            $insert = $conn->query("insert into tbl_stories (writer_id, fld_writer, fld_title, fld_content, fld_storyimages, fld_date, destination_id) values $insertValuesSQL");
        }else{
            $insertValuesSQL = "('$writer_id','$writer', '".mysqli_real_escape_string($conn, $_POST["txt_title"])."','".mysqli_real_escape_string($conn, $_POST["txt_content"])."', '".$fileIMGs."', '$dateNow', '$_POST[txt_destination_id]','$_POST[txt_event_id]') ";

            $insert = $conn->query("insert into tbl_stories (writer_id, fld_writer, fld_title, fld_content, fld_storyimages, fld_date, destination_id, event_id) values $insertValuesSQL");
        }
        
        if($insert){
            $response = array('success'=>true, 'message'=>"Story Posted Successfully. ");
            echo json_encode($response);
        }else{
            $response = array('success'=>false, 'message'=>"File upload failed, please try again.");
            echo json_encode($response);
        } 
    }
?>