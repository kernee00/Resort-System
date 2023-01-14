<?php
    session_start();
    include_once '../connection.php';
    include_once 'customerNavBar.php';
    $user_id = $_SESSION['user_id'];

  if (isset($_GET['bookingID'])){
    $bookingID = $_GET['bookingID'];
    //$resortID = $_GET['resortID'];

/*    $query = $conn->query("SELECT SUM(prices) AS total FROM room_booking WHERE bookingID = '$bookingID';") or die(mysqli_error());
                        while($row = $query->fetch_array()){

                            $totalPrice = $row['total'];
               

        }
        $sql = "UPDATE bookings SET totalPrice = '$totalPrice' WHERE bookingID = '$bookingID'";
        $result = mysqli_query($conn, $sql);*/

        $query = $conn->query("SELECT * FROM bookings b, resorts r WHERE bookingID = '$bookingID';") or die(mysqli_error());
                        while($row = $query->fetch_array())

                        {

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

       $priceAfterCharge = ($totalPrice*0.1)+$totalPrice;
       $stmt = $conn->prepare("INSERT INTO payments (totalPayment, paymentDate, paymentType,  paymentStatus, bookingID) VALUES (?,?,?,?,?)");
        $stmt->bind_param("ssssi",$priceAfterCharge, $sysdate, $pType, $pStatus, $bookingID);
        $stmt->execute();
        $success = $stmt->affected_rows;
        $stmt->close();
        if($success>0)
        {

            $paymentID = $conn->insert_id;
            echo "$paymentID";
            }

            else {

                echo "Failed to book!";
            }  
     

       if ($result) {
            echo"<script>alert ('Payment successful!')</script>";
            echo"<meta http-equiv='refresh' content='0; url=confirmPayment.php?bookingID=$bookingID'/>";

       }

       else {

             echo"<script>alert ('Payment failed.')</script>";
             echo"<meta http-equiv='refresh' content='0; url=cart.php?bookingID=$bookingID'/>";
       }
?>