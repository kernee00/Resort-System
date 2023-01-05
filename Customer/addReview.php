<?php
    session_start();
    include_once '../connection.php';
    include_once 'customerNavBar.php';

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
    <title>Add User</title>
  <link rel="stylesheet" href="profileStyle.css">

</head>

<body>
     <div class = "update-profile">

<form action="addReviewProcess.php" method="POST">
     
      <div class="flex">
         <div class="inputBox">
         
            <span>Rating Marks:</span>
            <input rating="rating" type="number" min="1" max="5" placeholder="Rating (1-5)" required>
            <span>Comment:</span>
            <input comment="comment" type="text" placeholder="Comments:" required>

         </div>

      </div>
      <input type="submit" value="Add" name="add_rating" class="btn">
      <a href="customerHistory.php" class="delete-btn">Back</a>
   </form>

</div>
</body>
</html>