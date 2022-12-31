<?php
    session_start();
    include_once '../connection.php';
    include_once 'ownerNavBar.php';

   if (isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];

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
    <title>Add Owner</title>
  <link rel="stylesheet" href="../Admin/profileStyle.css">

</head>

<body>
     <div class = "update-profile">

<form action="addResortProcess.php" method="POST" enctype="multipart/form-data">
     
      <div class="flex">
         <div class="inputBox">
         
            <span>Name:</span>
            <input type="text" id = "name" name="name" placeholder="Resort Name" class="box" required>
            <span>Address:</span>
            <input type="text" id = "address" name="address" placeholder="Address" class="box" required>
            <span>City:</span>
            <input type="text" id = "city" name="city" placeholder="City" class="box" required>
                       <span>State:</span>
                <input type="text" id = "state" name="state" placeholder="State" class="box" required>
        
         </div>
         <div class="inputBox">
    
            <span>Contact No:</span>
            <input type="text" id = "phone" name="phone" placeholder="Contact Number" class="box" required>
            <span>keywords:</span>
            <input type="text" id = "keywords" name="keywords" placeholder="Keywords for Resort" class="box" required>
            <span>Resort Cover Photo:</span>
            <input type="file" name="resort_image" accept="image/jpg, image/jpeg, image/png" class="box">
         </div>
      </div>
      <input type="submit" value="Add" name="add_resort" class="btn">
   </form>

</div>
</body>
</html>