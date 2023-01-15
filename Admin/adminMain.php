 <?php
    session_start();
    include_once '../connection.php';
    include_once 'adminNavBar.php';
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name ="viewreport" content="width=device-width, initial-scale =1.0">
    <title>Admin Main</title>
  <link rel="stylesheet" href="userStyle.css">
    <link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css " />

</head>

<body>
    <div class = "update-profile">

<form action="updateProfile.php" method="POST" >
     
      <div class="flex">
         <div class="inputBox">
            <?php
    if (isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM admin WHERE adminID = '$user_id'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0){

            while ($row = mysqli_fetch_assoc($result)){

                $name = $row['adminName'];
                $phone = $row['adminPhoneNo'];
                $email = $row['adminEmail'];
                $password = $row['adminPassword'];
                $images = $row['profile_image'];
                

                if (empty($images)){
             
                    echo "<img src='Profile Image/default-avatar.png' >";
            }

            else {

                   echo '<img src="data:image;base64,'.base64_encode($row['profile_image']).'" alt="Image" ;">';
            }

            }
        }

    }

    else {

        echo "Session timed-out. Login again.";
    }
    ?>
           <!--- <span>Update Profile Photo:</span>
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">-->
            <span>Name:</span>
            <input type="text" id = "update_name" name="update_name" disabled placeholder="<?php echo $name; ?>" class="box">

            <span>Email Address:</span>
            <input type="text" id = "update_name" name="update_name" disabled placeholder="<?php echo $email; ?>" class="box">
      
            <span>Phone Number:</span>
            <input type="text" id = "update_name" name="update_name" disabled placeholder="<?php echo $phone; ?>" class="box">
         

            <span>Current Password :</span>
            <input type="text" id = "update_name" name="update_name" disabled placeholder="*********" class="box">
          
       
         </div>
   
      </div>
      <input type="submit" value="Update Profile" name="update_profile" class="btn">
        <!---<a href="updatePPic.php" class="delete-btn">Change Profile Picture</a>-->
 
   </form>
</div>



</body>
</html>