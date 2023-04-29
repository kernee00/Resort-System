<?php
    session_start();
    include_once '../connection.php';
    include_once 'ownerNavBar.php';
	$user_id = $_SESSION['user_id'];

  if (isset($_GET['roomID'])){
        $roomID = $_GET['roomID'];
        $sql = "DELETE FROM rooms WHERE roomID ='$roomID'";
        
       if ($conn->query($sql) == TRUE) {
            echo"<script>alert ('Room is sucessfully deleted.');
            window.history.back();</script>";
            //echo"<meta http-equiv='refresh' content='0; url=manageRoom.php?resortID=".$resortID."'/>";
       }

       else {

             echo"<script>alert ('Failed to delete room from manage room.');
             window.history.back();</script>";
             //echo"<meta http-equiv='refresh' content='0; url=manageRoom.php?resortID=$resortID'/>";
       }

    }

    else {

        echo "Session timed-out. Login again.";
    }


?>