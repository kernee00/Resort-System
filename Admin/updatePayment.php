<?php
    session_start();
    include_once '../connection.php';
    include_once 'adminNavBar.php';
	$user_id = $_SESSION['user_id'];
    $role = $_SESSION['role'];

         if (isset($_GET['paymentID'])){
        $payment_id = $_GET['paymentID'];

        $sql = "SELECT * FROM payments WHERE paymentID = '$payment_id'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0){

            while ($row = mysqli_fetch_assoc($result)){

                $booking_id = $row['bookingID'];
                $amount = $row['totalPayment'];
               
            }

        $booking_sql = "SELECT * FROM bookings WHERE bookingID = '$booking_id'";
        $result_b = mysqli_query($conn, $booking_sql);
        $resultCheck_b = mysqli_num_rows($result_b);

        if ($resultCheck_b > 0){

            while ($row1 = mysqli_fetch_assoc($result_b)){

             
                $bookingPrice = $row1['totalPrice'];
               
            }
        
        //insert into admin payment table
        $sql1 = "INSERT INTO adminPayment (totalAdminPayment, adminPaymentDate,bookingID) VALUES ($amount - $bookingPrice, current_date(), '$booking_id'); ";
        $result1 = mysqli_query($conn, $sql1);
     

       if ($result1) {
        //update payment status to approved
            $sql2 = "UPDATE payments SET paymentStatus = 'Approved' WHERE paymentID = '$payment_id'";
        $result2 = mysqli_query($conn, $sql2);
     

       if ($result2) {

          $sql3 = "UPDATE adminPayment SET payOwnerStatus = 'Unpaid' WHERE bookingID = '$booking_id'";
            $result3 = mysqli_query($conn, $sql3);

            if ($result3){

            echo"<script>alert ('Payment is approved.')</script>";

            echo"<meta http-equiv='refresh' content='0; url=managePayment.php'/>";
        }

        else {

            echo"<script>alert ('Payment failed to approve.')</script>";
            
            echo"<meta http-equiv='refresh' content='0; url=managePayment.php'/>";
        }




       }

       else {

             echo"<script>alert ('Payment failed to approve.')</script>";
             echo"<meta http-equiv='refresh' content='0; url=managePayment.php'/>";
       }

       }

       else {

             echo"<script>alert ('Payment failed to approve.')</script>";
             echo"<meta http-equiv='refresh' content='0; url=managePayment.php'/>";
       }
   }

    }
}

    else {

        echo "Session timed-out. Login again.";
    }

?>