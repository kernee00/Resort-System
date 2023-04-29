<?php
    session_start();
    include_once '../connection.php';
    include_once 'ownerNavBar.php';

   if (isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM owner WHERE ownerID = '$user_id'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0){

            while ($row = mysqli_fetch_assoc($result)){

                $name = $row['ownerName'];
                $phone = $row['ownerPhoneNo'];
                $email = $row['ownerEmail'];
                $password = $row['accPassword'];

               
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
    <title>Owner Main</title>
   <link rel="stylesheet" href="../Admin/profileStyle.css">

</head>

<body>
     <div class = "update-profile">

<form action="updateProcess.php" method="POST" enctype="multipart/form-data" >
     
      <div class="flex">
         <div class="inputBox">
            <span>Name:</span>
            <input type="text" id = "update_name" name="update_name" placeholder="<?php echo $name; ?>" class="box">
            <span>Email Address:</span>
            <input type="email" id = "update_email" name="update_email" placeholder="<?php echo $email; ?>" class="box">
            <span>Phone Number:</span>
            <input type="text" id = "update_phone" name="update_phone" placeholder="<?php echo $phone; ?>" class="box">
          <span>Update Profile Photo:</span>
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
         </div>
         <div class="inputBox">
      
            <span>Old password :</span>
            <input type="password" id = "current_pass" name="update_pass" placeholder="Current password" class="box" >
            <span>New password :</span>
            <input type="password" id = "pass1" name="pass1" placeholder="Enter new password" class="box">
            <span>Confirm password :</span>
            <input type="password" id = "pass2" name="pass2" placeholder="Confirm new password" class="box">
         </div>
      </div>
      <input type="submit" value="Update profile" name="update_profile" class="btn">
      <a href="ownerMain.php" class="delete-btn"style="background-color: skyblue";>Back</a>
   </form>
</div>


</body>
</html>
