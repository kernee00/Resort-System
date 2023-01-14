<?php
    session_start();
    include_once '../connection.php';
    include_once 'customerNavBar.php';
    $user_id = $_SESSION['user_id'];

  if (isset($_GET['paymentID'])){
    $paymentID = $_GET['paymentID'];
 
    $query = $conn->query("SELECT * FROM bookings b, payments p, resorts r WHERE b.bookingID = p.bookingID AND b.resortID = r.resortID AND paymentID = '$paymentID';") or die(mysqli_error());
                        while($row = $query->fetch_array())

                        {

                            $bookingDate = $row['bookingDate'];
                            $checkInDate = $row['checkInDate'];
                            $checkOutDate = $row['checkOutDate'];
                            $totalPrice = $row['totalPrice'];
                            $resortName = $row['resortName'];
                            $paymentID = $row['paymentID'];
                            
                        }

         $sql = "UPDATE payments SET paymentStatus = 'Paid' WHERE paymentID = '$paymentID'";
        $result = mysqli_query($conn, $sql);
     

       if ($result) {
            echo"<script>alert ('Payment successful! Please wait for admin to approve your refund ...')</script>";
           echo"<meta http-equiv='refresh' content='0; url=receipt.php?paymentID=$paymentID'/>";

       }

       else {

             echo"<script>alert ('Payment failed to approve.')</script>";
             echo"<meta http-equiv='refresh' content='0; url=managePayment.php'/>";
       }

  
}
    else {

        echo "Session timed-out. Login again.";
    }
//update payment status to paid

?>






