<?php
     session_start();
    include_once '../connection.php';
    include_once 'ownerNavBar.php';
    $user_id = $_SESSION['user_id'];


         if(isset($_POST['submit']))
{ 
$fdate=$_POST['fdate'];
$tdate=$_POST['tdate'];

 $dateTimestamp1 = strtotime($fdate);
        $dateTimestamp2 = strtotime($tdate);
        if ($dateTimestamp1 > $dateTimestamp2){

            echo "<script>alert('Unavailable date selected!');</script>";
            echo"<meta http-equiv='refresh' content='0; url=bookingByOwner.php'/>";

        }
    else {

    
         $query = $conn->query("SELECT  * FROM  customers;") or die(mysqli_error());
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name ="viewreport" content="width=device-width, initial-scale =1.0">
    <title>Add User</title>
  <link rel="stylesheet" href="../Admin/profileStyle.css">

</head>

<body>
     <div class = "update-profile">

<form action="addCustProcess.php" method="POST">
     
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
             <!--<span>Password :</span>
            <input type="password" id = "pass" name="pass" placeholder="Confirm new password" class="box" required>-->
              <input type="hidden" id = "fdate" name="fdate" value = "<?php echo $fdate ?>">
                <input type="hidden" id = "tdate" name="tdate" value = "<?php echo $tdate ?>">
         </div>

      </div>
      <input type="submit" value="Add" name="add_cust" class="btn">
      <a href="bookingByOwner.php" class="delete-btn">Back</a>
   </form>

</div>
</body>
</html>