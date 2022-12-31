<?php
    session_start();
    include_once '../connection.php';
    include_once 'ownerNavBar.php';
    $user_id = $_SESSION['user_id'];


     if (isset($_GET['resortID'])){
           $resortID = $_GET['resortID'];
           echo "$resortID";
         

    if(isset($_POST['submit'])){
        $resortID1=$resortID;
        $imageCount = count($_FILES['image']['name']);
        for ($i=0; $i < $imageCount; $i++) { 
            $imageName =  $_FILES['image']['name'][$i];
            $imageTempName = $_FILES['image']['tmp_name'][$i];
            $targetPath = "upload/".$imageName;
            if(move_uploaded_file($imageTempName, $targetPath)){
                $sql = "INSERT INTO resort_image (images) VALUES ('$imageName');";
                $result = mysqli_query($conn,$sql);
            }
        }
        if ($result) {
            header('location:uploadPhoto.php?resortID=$resortID');
        }
      
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
    <?php
    if(isset($_GET['msg']) AND $_GET['msg'] == 'ins'){

        echo "<h4 align= center>Images Uploaded Successfully!</h4>";
    }
    ?>
   <div class = "formdesign">
       
       <form action="uploadPhoto.php" method="POST" enctype="multipart/form-data">
        Please select image <br><br>
        <input type = "file" name="image[]" multiple><br><br>
        <input type ="submit" name ="submit" value ="Upload">
        <!--<a href="uploadPhoto.php?resortID=<?php echo $row['resortID'];?>" class="">Upload</a>-->

       </form><br>
       <?php
       //echo "$resortID";
       $sql = "SELECT * FROM resort_image WHERE resortID = '$resortID';";
       $result = mysqli_query($conn,$sql);
       if(mysqli_num_rows($result)>0){
            while ($row = mysqli_fetch_assoc($result)){

                ?>
                    <img src = "upload/<?php echo $row['images'];?>" width = 100 height = 100>
                <?php
            }
       }
       ?>
        <a href="manageResort.php" class="delete-btn">Back to Main</a>

   </div>
      
  
</body>
</html>