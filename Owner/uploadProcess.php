<?php
    session_start();
    include_once '../connection.php';
    include_once 'ownerNavBar.php';
    $user_id = $_SESSION['user_id'];
     $resortID = $_POST['resortID'];
      

    if(isset($_POST['submit'])){
      
        $imageCount = count($_FILES['image']['name']);
        for ($i=0; $i < $imageCount; $i++) { 
            $imageName =  $_FILES['image']['name'][$i];
            $imageTempName = $_FILES['image']['tmp_name'][$i];
            $targetPath = "upload/".$imageName;
            if(move_uploaded_file($imageTempName, $targetPath)){
                $sql = "INSERT INTO resort_image (images, resortID) VALUES ('$imageName', '$resortID');";
                $result = mysqli_query($conn,$sql);
            }
        }
        if ($result) {
            header('location:uploadPhoto.php?resortID='.$resortID);
        }
      
    }




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name ="viewreport" content="width=device-width, initial-scale =1.0">
    <title>Images</title>
    <!--<link rel="stylesheet" href="../Style/nav_bar.css">-->
    <style type="text/css">
        .formdesign{
            width: 50%;
            margin: auto;
            padding: 20px 15px;
            background-color: #e91e63;
        }
    </style>

</head>


<body>
    <h2 align="center">Resort Images</h2>
   
   <div class = "formdesign">

   </div>
      
  
</body>
</html>