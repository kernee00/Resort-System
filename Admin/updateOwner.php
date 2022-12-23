<?php
    session_start();
    include_once '../connection.php';
    include_once 'adminNavBar.php';
	$user_id = $_SESSION['user_id'];

  if (isset($_GET['ownerID'])){
    $owner_id = $_GET['ownerID'];
        $sql = "SELECT * FROM owner WHERE ownerID = '$owner_id'";
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
    <title>Admin Main</title>
    <!--<link rel="stylesheet" href="adminStyle.css">-->

</head>

<body>

<form action="updateOwnerProcess.php" method="POST"  >
     
      <div class="flex">
         <div class="inputBox">
         	<!--to pass owner id by POST-->
            <input type="hidden" id = "owner_id" name="owner_id" value="<?php echo $owner_id; ?>" class="box">
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
                <span>Admin password :</span>
            <input type="password" id = "admin_pass" name="admin_pass" placeholder="Enter Admin Password" class="box" required>
         </div>
      </div>
      <input type="submit" value="Update Account" name="update_profile" class="btn">
      <a href="manageOwner.php" class="delete-btn">Back</a>
   </form>


</body>
</html>