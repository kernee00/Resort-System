<?php
    session_start();
    include_once '../connection.php';
    include_once 'customerNavBar.php';
	$user_id = $_SESSION['user_id'];
    $role = $_SESSION['role'];

         if (isset($_GET['paymentID'])){
        $payment_id = $_GET['paymentID'];
        $sysdate = date('y-m-d');


        $sql = "SELECT * FROM payments p, bookings b WHERE p.bookingID = b.bookingID AND paymentID = '$payment_id';";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0){

            while ($row = mysqli_fetch_assoc($result)){

                $booking_id = $row['bookingID'];
                $amount = $row['totalPayment'];
                $checkIn = $row['checkInDate'];
               
            }
            
            $cancelDays = -((strtotime($sysdate) - strtotime($checkIn)) / (60 * 60 * 24));

            if ( $cancelDays <= 3 ){ 

            echo"<script>alert ('Refund request is not allowed! Cannot cancel 3 days before check in!')</script>";
            echo"<meta http-equiv='refresh' content='0; url=managePayment.php'/>";
            }

            else {
                
        $booking_sql = "SELECT * FROM bookings WHERE bookingID = '$booking_id'";
        $result_b = mysqli_query($conn, $booking_sql);
        $resultCheck_b = mysqli_num_rows($result_b);

        if ($resultCheck_b > 0){

            while ($row1 = mysqli_fetch_assoc($result_b)){

             
                $bookingPrice = $row1['totalPrice'];
               
            }
 
       if ($result_b) {
        //update payment status to approved
        $sql2 = "UPDATE payments SET paymentStatus = 'Pending Refund' WHERE paymentID = '$payment_id'";
        $result2 = mysqli_query($conn, $sql2);
     

       if ($result2) {
            echo"<script>alert ('Please wait for admin to approve your refund ...')</script>";
            echo"<meta http-equiv='refresh' content='0; url=managePayment.php'/>";

       }

       else {

             echo"<script>alert ('Payment failed to refund.')</script>";
             echo"<meta http-equiv='refresh' content='0; url=managePayment.php'/>";
       }

       }

       else {

             echo"<script>alert ('Payment failed to refund.')</script>";
             echo"<meta http-equiv='refresh' content='0; url=managePayment.php'/>";
       }
   }

}
    }
}

    else {

        echo "Session timed-out. Login again.";
    }

?>