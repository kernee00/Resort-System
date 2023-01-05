<?php
    session_start();
    include_once '../connection.php';
    include_once 'ownerNavBar.php';

   if (isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    $resortID = $_GET["resortID"];

    }

    else {

        echo "Session timed-out. Login again.";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name ="viewreport" content="width=device-width, initial-scale =1.0">
    <title>Add Room</title>
  <link rel="stylesheet" href="../Admin/profileStyle.css">

</head>

<body>
     <div class = "update-profile">

<form action="addRoomProcess.php?resortID=<?php echo $resortID;?>" method="POST" enctype="multipart/form-data">
     
      <div class="flex">
         <div class="inputBox">
         
            <span>Price per Night:</span>
            <input type="text" id = "price" name="price" placeholder="Price per Night" class="box" required>
            <span>Capacity:</span>
            <input type="text" id = "capacity" name="capacity" placeholder="Capacity" class="box" required>
            <span>Location:</span>
            <input type="text" id = "location" name="location" placeholder="Location" class="box" required>
                       <span>Description:</span>
            <input type="text" id = "desc" name="desc" placeholder="Description" class="box" required>
        
         </div>
         <div class="inputBox">
    
            
         </div>
      </div>
      <input type="submit" value="Add" name="add_resort" class="btn">
   </form>

</div>
</body>
</html>