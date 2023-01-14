<?php
    session_start();
    include_once '../connection.php';
    include_once 'customerNavBar.php';
	$user_id = $_SESSION['user_id'];

  if (isset($_GET['bookingID'])){
    $bookingID = $_GET['bookingID'];
    $roomID = $_GET['roomID'];
        $sql = "DELETE FROM room_booking WHERE bookingID = '$bookingID' AND roomID = '$roomID'";
        $result = mysqli_query($conn, $sql);
     

       if ($result) {
            echo"<script>alert ('Room is removed from booking.')</script>";
            echo"<meta http-equiv='refresh' content='0; url=cart.php?bookingID=$bookingID'/>";

       }

       else {

             echo"<script>alert ('Failed to remove room from booking.')</script>";
             echo"<meta http-equiv='refresh' content='0; url=cart.php?bookingID=$bookingID'/>";
       }

    }

    else {

        echo "Session timed-out. Login again.";
    }


?>