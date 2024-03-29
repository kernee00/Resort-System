<?php
    session_start();
    include_once '../connection.php';
    include_once 'adminNavBar.php';
    $user_id = $_SESSION['user_id'];

  if (isset($_POST['resortID'])){
    $resortID = $_POST['resortID'];
        $sql = "SELECT * FROM resorts WHERE resortID = '$resortID'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0){

            while ($row = mysqli_fetch_assoc($result)){

                $name = $row['resortName'];
                $address = $row['address'];
                $city = $row['city'];
                $state = $row['state'];
                $phone = $row['resortPhoneNo'];
                $rating = $row['overallRatings'];
                $keywords = $row['keywords'];
                $ownerID = $row['ownerID'];
                $description = $row['description'];
               
            }
        }

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
    <title>Update Resort</title>
   <link rel="stylesheet" href="../Admin/profileStyle.css">

</head>

<body>
       <div class = "update-profile">

<form action="updateResortProcess.php" method="POST" enctype="multipart/form-data">
     
      <div class="flex">
         <div class="inputBox">
            <!--to pass resort id by POST-->
            <input type="hidden" id = "resort_id" name="resort_id" value="<?php echo $resortID; ?>" class="box">
            <!--input field to update resort data-->
            <span>Name:</span>
            <input type="text" id = "update_name" name="update_name" placeholder="<?php echo $name; ?>" class="box">
            <span>Address:</span>
            <input type="text" id = "update_address" name="update_address" placeholder="<?php echo $address; ?>" class="box">
            <span>City:</span>
            <input type="text" id = "update_city" name="update_city" placeholder="<?php echo $city; ?>" class="box">
            <span>State:</span>
            <input type="text" id = "update_state" name="update_state" placeholder="<?php echo $state; ?>" class="box">
             <span>Phone Number:</span>
            <input type="text" id = "update_phone" name="update_phone" placeholder="<?php echo $phone; ?>" class="box">
          
             
         </div>
         <div class="inputBox">
             
              <span>Rating:</span>
            <input type="text" id = "ratings" name="ratings" disabled placeholder="<?php echo $rating; ?>" class="box">
              <span>Keyword:</span>
            <input type="text" id = "update_keyword" name="update_keyword" placeholder="<?php echo $keywords; ?>" class="box">
             <span>Description:</span>
            <input type="text" id = "update_desc" name="update_desc" placeholder="<?php echo $description; ?>" class="box">
              <span>Update Resort Cover Photo:</span>
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
    
     
         </div>
      </div>
      <input type="submit" value="Update Resort" name="update_resort" class="btn">

      <a href="manageResort.php" class="delete-btn">Back</a>
   </form>

</div>
</body>
</html>