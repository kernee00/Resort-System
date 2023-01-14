 <?php
    session_start();
    include_once '../connection.php';
    include_once 'ownerNavBar.php';
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name ="viewreport" content="width=device-width, initial-scale =1.0">
    <title>Customer Main</title>
  <link rel="stylesheet" href="../Admin/userStyle.css">

</head>

<body>
    <div class = "update-profile">

<form action="updateProfile.php" method="POST" >
     
      <div class="flex">
         <div class="inputBox">
            <?php
        if (isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
        $custID = $_GET['custID'];
        $sql = "SELECT * FROM customers WHERE custID = '$custID'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0){

            while ($row = mysqli_fetch_assoc($result)){

                $name = $row['custName'];
                $phone = $row['phoneNo'];
                $email = $row['custEmail'];
                
                

                if (empty($images)){
             
                    echo "<img src='../default-avatar.png' >";
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
         

            
          
       
         </div>
   
      </div>
      <a href="manageReservation.php?custID=<?php echo $custID; ?>" class="delete-btn" style="background-color: skyblue;">Back</a>
        <!---<a href="updatePPic.php" class="delete-btn">Change Profile Picture</a>-->
 
   </form>
</div>



</body>
</html>