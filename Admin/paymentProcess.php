<?php
    session_start();
    include_once '../connection.php';
    include_once 'adminNavBar.php';
	$user_id = $_SESSION['user_id'];
    $role = $_SESSION['role'];

         if (isset($_GET['paymentID'])){
        $payment_id = $_GET['paymentID'];
        //change status to refund

    $query = $conn->query("SELECT * FROM payments WHERE paymentID = '$payment_id';") or die(mysqli_error());

    while($fetch = $query->fetch_array()){


        $status = $fetch['paymentStatus'];
    }

if($status != 'Pending Refund'){
         echo "<script>alert('Payment cannot be refund!');</script>";
          echo"<meta http-equiv='refresh' content='0; url=managePayment.php'/>";

    }

    else {

        $sql = "UPDATE payments SET paymentStatus = 'Refunded' WHERE paymentID = '$payment_id'";
        $result = mysqli_query($conn, $sql);
     

       if ($result) {
            echo"<script>alert ('Payment refund success.')</script>";
            echo"<meta http-equiv='refresh' content='0; url=managePayment.php'/>";

       }

       else {

             echo"<script>alert ('Failed to refund.')</script>";
             echo"<meta http-equiv='refresh' content='0; url=managePayment.php'/>";
       }

    }
}
    else {

        echo "Session timed-out. Login again.";
    }

?>