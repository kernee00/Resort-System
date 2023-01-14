<?php
    session_start();
    include_once '../connection.php';
    include_once 'customerNavBar.php';
    $user_id = $_SESSION['user_id'];

  if (isset($_GET['bookingID'])){
    $bookingID = $_GET['bookingID'];
    $resortID = $_GET['resortID'];

    $query = $conn->query("SELECT SUM(prices) AS total FROM room_booking WHERE bookingID = '$bookingID';") or die(mysqli_error());
                        while($row = $query->fetch_array()){

                            $totalPrice = $row['total'];
               

        }
        $sql = "UPDATE bookings SET totalPrice = '$totalPrice' WHERE bookingID = '$bookingID'";
        $result = mysqli_query($conn, $sql);
     

       if ($result) {
            echo"<script>alert ('Booking successful! Proceed to payment.')</script>";
            echo"<meta http-equiv='refresh' content='0; url=confirmBookingStatement.php?bookingID=$bookingID&resortID=$resortID'/>";

       }

       else {

             echo"<script>alert ('Booking failed.')</script>";
             echo"<meta http-equiv='refresh' content='0; url=cart.php?bookingID=$bookingID'/>";
       }

  
}
    else {

        echo "Session timed-out. Login again.";
    }


?>