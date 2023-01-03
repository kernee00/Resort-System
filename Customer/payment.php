<?php
    session_start();
    include_once '../connection.php';
    include_once 'customerNavBar.php';
    $user_id = $_SESSION['user_id'];

  if (isset($_GET['bookingID'])){
    $bookingID = $_GET['bookingID'];
     $resortID = $_GET['resortID'];

    $query = $conn->query("SELECT * FROM bookings b, resorts r WHERE bookingID = '$bookingID' AND r.resortID = '$resortID';") or die(mysqli_error());
                        while($row = $query->fetch_array()){

                            $bookingDate = $row['bookingDate'];
                            $checkInDate = $row['checkInDate'];
                            $checkOutDate = $row['checkOutDate'];
                            $totalPrice = $row['totalPrice'];
                            $resortName = $row['resortName'];
               

        }
           echo "$resortName";
           echo "$bookingDate";
           echo "$checkInDate";
           echo "$checkOutDate";
           echo "$totalPrice";

  
}
    else {

        echo "Session timed-out. Login again.";
    }


?>