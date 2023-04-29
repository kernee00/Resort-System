<?php
    session_start();
    include_once '../connection.php';
    include_once 'ownerNavBar.php';
    $user_id = $_SESSION['user_id'];
   


     if (isset($_GET['resortID'])){
           $resortID = $_GET['resortID'];
}

else {

    echo "Passing error!";
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name ="viewreport" content="width=device-width, initial-scale =1.0">
    <title>Images</title>
    <link rel="stylesheet" href="../Style/upload.css">
    <style type="text/css">
        .formdesign{
            width: 50%;
            margin: auto;
            padding: 20px 15px;
            background-color: powderBlue;
        }
    </style>

</head>


<body>
    <br><h2 align="center">Resort Images</h2><br>
 
   <div class = "formdesign">
    <div class = "upload">
       
       <form action="uploadProcess.php" method="POST" enctype="multipart/form-data">
        Please select image <br><br>
        <input type = "file" name="image[]" multiple><br><br>
        <input type ="submit" name ="submit" value ="Upload">
        <input type="hidden" id = "resortID" name="resortID" value="<?php echo $resortID ?>" class="box">
       </form><br></div>

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

       else {

        echo "No image! Please upload images for resort.";
       }
       ?>
      <br><br>
        <a href="manageResort.php" class="main-btn">Back to Main</a><br><br>

   </div>
      
  
</body>
</html>