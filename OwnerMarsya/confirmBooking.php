<?php
    session_start();
    include_once '../connection.php';
    include_once 'ownerNavBar.php';
    $user_id = $_SESSION['user_id'];

  if (isset($_GET['bookingID'])){
    $bookingID = $_GET['bookingID'];
    $resortID = $_GET['resortID'];

$sysdate = date('y-m-d');
//$tPayment = POST['tPayment'];

$pType = 'Online banking';
$pStatus = 'Unpaid';

    $query = $conn->query("SELECT SUM(prices) AS total FROM room_booking WHERE bookingID = '$bookingID';") or die(mysqli_error());
                        while($row = $query->fetch_array()){

                            $totalPrice = $row['total'];
               

        }

           $sql = "UPDATE bookings SET totalPrice = '$totalPrice' WHERE bookingID = '$bookingID'";
        $result = mysqli_query($conn, $sql);
     

       if ($result) {

        $tPayment = (0.1*$totalPrice)+$totalPrice;

        $stmt = $conn->prepare("INSERT INTO payments (totalPayment, paymentDate, paymentType, paymentStatus, bookingID) VALUES (?,?,?,?,?)");
        $stmt->bind_param("ssssi", $tPayment,$sysdate,$pType, $pStatus, $bookingID);
        $stmt->execute();
        $success = $stmt->affected_rows;
        $stmt->close();
        if($success>0)
        {

            $paymentID = $conn->insert_id;

             echo"<script>alert ('Booking is successful!')</script>";
            echo"<meta http-equiv='refresh' content='0; url=viewReservation.php?bookingID=$bookingID&resortID=$resortID'/>";
            }

            else {

                echo "Failed to book!";
                 echo"<meta http-equiv='refresh' content='0; url=cart.php?bookingID=$bookingID'/>";
            }
           

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