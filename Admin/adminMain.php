<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name ="viewreport" content="width=device-width, initial-scale =1.0">
    <title>Admin Main</title>
    <!--<link rel="stylesheet" href="adminStyle.css">-->

</head>

<body>


<form action="updateProfile.php" method="POST" >
     
      <div class="flex">
         <div class="inputBox">
            <?php
    session_start();
    include_once '../connection.php';
    include_once 'adminNavBar.php';

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

                   echo '<img src="data:image;base64,'.base64_encode($row['profile_image']).'" alt="Image" style = "width: 100px; height: 100px;">';
            }

            }
        }

    }

    else {

        echo "Session timed-out. Login again.";
    }
    ?>
            <span>Name:</span>
                  <label><?php echo "$name"; ?></label>
            <span>Email Address:</span>
                 <label><?php echo "$email"; ?></label>
            <span>Phone Number:</span>
                <label><?php echo "$phone"; ?></label>
       
         </div>
         <div class="inputBox">
            <input type="hidden" name="old_pass" value="<?php echo $password; ?>">
            <span>Current Password :</span>
             <label>********</label>
         
         </div>
      </div>
      <input type="submit" value="update profile" name="update_profile" class="btn">
 
   </form>


</body>
</html>