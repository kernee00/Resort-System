<?php
    session_start();
    include_once '../connection.php';
    include_once 'adminNavBar.php';
	$user_id = $_SESSION['user_id'];

  

  if (isset($_GET['ownerID'])){
    $owner_id = $_GET['ownerID'];
        $sql = "DELETE FROM owner WHERE ownerID = '$owner_id'";
        $result = mysqli_query($conn, $sql);
     

       if ($result) {
            echo"<script>alert ('Record deleted from database.')</script>";
            echo"<meta http-equiv='refresh' content='0; url=manageOwner.php'/>";

       }

       else {

             echo"<script>alert ('Failed to delete record from database.')</script>";
             echo"<meta http-equiv='refresh' content='0; url=manageOwner.php'/>";
       }

    }

    else {

        echo "Session timed-out. Login again.";
    }


?>