<?php
    session_start();
    include_once '../connection.php';
    include_once 'adminNavBar.php';
	$user_id = $_SESSION['user_id'];
    $role = $_SESSION['role'];

         if (isset($_GET['ownerID'])){
        $ownerID = $_GET['ownerID'];

        $sql = "UPDATE adminPayment SET payOwnerStatus = 'Paid' WHERE adminPaymentID = '$payment_id'";
        $result = mysqli_query($conn, $sql);

        if ($result){

              echo"<script>alert ('Payment to owner is success.')</script>";

            echo"<meta http-equiv='refresh' content='0; url=manageOwnerPayment.php'/>";
            }

            else {

                    echo "Payment to owner failed!";
            
            echo"<meta http-equiv='refresh' content='0; url=manageOwnerPayment.php'/>";
            }

     
      
   }


    else {

        echo "Session timed-out. Login again.";
    }

?>