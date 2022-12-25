<?php
    session_start();
    include_once '../connection.php';
    include_once 'adminNavBar.php';
	$user_id = $_SESSION['user_id'];
    $role = $_SESSION['role'];

         if (isset($_GET['paymentID'])){
        $payment_id = $_GET['paymentID'];
        //change status to refund
        $sql = "UPDATE payments SET paymentStatus = 'Refund' WHERE ".$method."ID = '$payment_id'";
        $result = mysqli_query($conn, $sql);
     

       if ($result) {
            echo"<script>alert ('Payment refund success.')</script>";
            echo"<meta http-equiv='refresh' content='0; url=manage".$method.".php'/>";

       }

       else {

             echo"<script>alert ('Failed to refund.')</script>";
             echo"<meta http-equiv='refresh' content='0; url=manage".$method.".php'/>";
       }

    }

    else {

        echo "Session timed-out. Login again.";
    }

?>