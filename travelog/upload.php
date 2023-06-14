<?php
// Include the database configuration file
include 'post_reg.php';
$statusMsg = '';

session_start();
$id = $_SESSION["id"];

$today = date("YmdHis");

// File upload path
$targetDir = "user/".$id."/";
$fileName = basename($_FILES["file"]["name"]);
$fileType = pathinfo($fileName,PATHINFO_EXTENSION);
$targetFilePath = $targetDir . $today. ".".$fileType;

$memo = $_POST['memo'];
$location = $_POST['location'];

$selectedRegion = $_POST["region"];
$region = explode(' ' , $selectedRegion);

$private = $_POST["hide_tf"];

$idx;

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf'); 
  
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            
            // Insert image file name into database
            $insert = $db->query("INSERT into post (id, image, memo, state, city, location , private) VALUES ('".$id."','./".$targetFilePath."','".$memo."','".$region[0]."','".$region[1]."','".$location."','".$private."')");
            
            if($insert){
                
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";

            }else{
                $statusMsg = "File upload failed, please try again.";
            }
            
            
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

$con = mysqli_connect("localhost", "root", "qwer", "travelog");

                $query = "SELECT * FROM post WHERE id = '".$id."' ORDER BY idx DESC LIMIT 1";
                $result = $con->query($query);
                while($row = $result->fetch_assoc())
                    {
                        $idx = $row["idx"];

                        echo "<script>location.href='post_view4.php?idx=".$idx."';</script>";
                    }
            
                    
?>