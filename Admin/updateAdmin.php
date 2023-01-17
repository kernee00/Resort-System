<?php
    session_start();
    include_once '../connection.php';
    include_once 'adminNavBar.php';
	$user_id = $_SESSION['user_id'];

  if (isset($_GET['adminID'])){
    $admin_id = $_GET['adminID'];
        $sql = "SELECT * FROM admin WHERE adminID = '$admin_id'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0){

            while ($row = mysqli_fetch_assoc($result)){

                $name = $row['adminName'];
                $phone = $row['adminPhoneNo'];
                $email = $row['adminEmail'];
                $password = $row['adminPassword'];
               
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
    <title>Admin Main</title>
  <link rel="stylesheet" href="profileStyle.css">

</head>

<body>
       <div class = "update-profile">

<form action="updateAdminProcess.php" method="POST"  >
     
      <div class="flex">
         <div class="inputBox">
         	<!--to pass owner id by POST-->
            <input type="hidden" id = "admin_id" name="admin_id" value="<?php echo $admin_id; ?>" class="box">
            <!--input field to update owner data-->
            <span>Name:</span>
            <input type="text" id = "update_name" name="update_name" placeholder="<?php echo $name; ?>" class="box">
            <span>Email Address:</span>
            <input type="email" id = "update_email" name="update_email" placeholder="<?php echo $email; ?>" class="box">
            <span>Phone Number:</span>
            <input type="text" id = "update_phone" name="update_phone" placeholder="<?php echo $phone; ?>" class="box">
         </div>
         <div class="inputBox">
            <span>New password :</span>
            <input type="password" id = "pass1" name="pass1" placeholder="Enter new password" class="box">
            <span>Confirm password :</span>
            <input type="password" id = "pass2" name="pass2" placeholder="Confirm new password" class="box">
        
         </div>
      </div>
      <input type="submit" value="Update Account" name="update_profile" class="btn">
      <a href="manageAdmin.php" class="delete-btn">Back</a>
   </form>
</div>


</body>
</html>