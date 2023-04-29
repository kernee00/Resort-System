<?php
    session_start();
    include_once '../connection.php';
    include_once 'ownerNavBar.php';
    $user_id = $_SESSION['user_id'];
     $resortID = $_POST['resortID'];
    error_reporting(0);
      

    if(isset($_POST['submit'])){
      
        $imageCount = count($_FILES['image']['name']);
        for ($i=0; $i < $imageCount; $i++) { 
            $imageName =  $_FILES['image']['name'][$i];
             $update_image_size = $_FILES['update_image']['size'][$i];
            $imageTempName = $_FILES['image']['tmp_name'][$i];
            $targetPath = "upload/".$imageName;

            if($update_image_size > 60000){
         echo "<script> alert('Image size too large!') </script>";
          echo"<meta http-equiv='refresh' content='0; url=uploadPhoto.php?resortID=$resortID'/>";
      }

      else {

            if(move_uploaded_file($imageTempName, $targetPath)){
                $sql = "INSERT INTO resort_image (images, resortID) VALUES ('$imageName', '$resortID');";
                $result = mysqli_query($conn,$sql);
            }
        
        if ($result) {
            header('location:uploadPhoto.php?resortID='.$resortID);
        }

        else {
                
               echo"<script>alert ('Please select an image.')</script>";

            echo"<meta http-equiv='refresh' content='0; url=uploadPhoto.php?resortID=$resortID'/>";
        }
    }
      
    }
}




?>

