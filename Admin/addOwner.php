<?php
    session_start();
    include_once '../connection.php';
    include_once 'adminNavBar.php';

   if (isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    $role = $_SESSION['role'];

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
  <link rel="stylesheet" href="profileStyle.css">

</head>

<body>
     <div class = "update-profile">

<form action="addOwnerProcess.php" method="POST">
     
      <div class="flex">
         <div class="inputBox">
         
             <span>ID:</span>
            <input type="text" id = "user" name="user" placeholder="User ID" class="box" required>
            <span>Name:</span>
            <input type="text" id = "name" name="name" placeholder="User Name" class="box" required>
            <span>Email Address:</span>
            <input type="email" id = "email" name="email" placeholder="Email Address" class="box" required>
            <span>Phone Number:</span>
            <input type="text" id = "phone" name="phone" placeholder="Contact Number" class="box" required>
         </div>
         <div class="inputBox">
            <span>New password :</span>
            <input type="password" id = "pass" name="pass" placeholder="Enter new password" class="box" required>
            <span>Confirm password :</span>
            <input type="password" id = "confirmPass" name="confirmPass" placeholder="Confirm new password" class="box" required>
                <span>Admin password :</span>
            <input type="password" id = "admin_pass" name="admin_pass" placeholder="Enter Admin Password" class="box" required> 
         </div>
      </div>
      <input type="submit" value="Add" name="add_owner" class="btn">
      <a href="manageOwner.php" class="delete-btn">Back</a>
   </form>

</div>
</body>
</html>