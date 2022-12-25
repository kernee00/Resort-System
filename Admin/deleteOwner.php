<?php
    session_start();
    include_once '../connection.php';
    include_once 'adminNavBar.php';
	$user_id = $_SESSION['user_id'];
    $role = $_SESSION['role'];
    $method = $_SESSION['method'];

  

  if (isset($_GET['ownerID'])){
    $owner_id = $_GET['ownerID'];
        $sql = "DELETE FROM $role WHERE ".$role."ID = '$owner_id'";
        $result = mysqli_query($conn, $sql);
     

       if ($result) {
            echo"<script>alert ('Record deleted from database.')</script>";
            echo"<meta http-equiv='refresh' content='0; url=manage".$role.".php'/>";

       }

       else {

             echo"<script>alert ('Failed to delete record from database.')</script>";
             echo"<meta http-equiv='refresh' content='0; url=manage".$role.".php'/>";
       }

    }

    else {

        echo "Session timed-out. Login again.";
    }


?>