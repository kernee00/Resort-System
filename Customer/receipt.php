<?php
   include_once '../connection.php';
   session_start();
    $user_id = $_SESSION['user_id'];
    $sysdate = date('y-m-d');


  if (isset($_GET['paymentID'])){
    $paymentID = $_GET['paymentID'];


    $query = $conn->query("SELECT * FROM bookings b, payments p, resorts r WHERE b.bookingID = p.bookingID AND b.resortID = r.resortID AND paymentID = '$paymentID';") or die(mysqli_error());

                        while($row = $query->fetch_array())

                        {
                            $paymentID = $row['paymentID'];
                            $paymentDate = $row['paymentDate'];
                            $bookingID = $row['bookingID'];
                            //$roomID = $row['roomID'];
                            $resortName = $row['resortName'];
                            $checkInDate = $row['checkInDate'];
                            $checkOutDate = $row['checkOutDate'];
                            //$totalPrice = $row['totalPrice'];
                            $totalPayment = $row['totalPayment'];
                            
                        }

  
}
    else {

        echo "Session timed-out. Login again.";
    }
?>



<table class="body-wrap">
    <tbody><tr>
        <td></td>
        <td class="container" width="600">
            <div class="content">
                <table class="main" width="100%" cellpadding="0" cellspacing="0">
                    <tbody><tr>
                        <td class="content-wrap aligncenter">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <link rel="stylesheet" href="../Admin/userStyle.css">
                                <link rel="stylesheet" href="design.css">
                                <tbody><tr>
                                    <td class="content-block">
                                        <center><h2>Receipt</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        <table class="invoice">
                                            <tbody><tr>
                                               
                                                 <td><?php echo $user_id ?><br>Receipt No. ####<br><?php echo $sysdate?></td>
                                                
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table class="invoice-items" cellpadding="0" cellspacing="0">
                                                        <tbody><tr>
                                                            <td>Payment ID</td>
                                                            <td class="alignright"><?php echo $paymentID ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Booking ID</td>
                                                            <td class="alignright"><?php echo $bookingID ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Resort Name</td>
                                                            <td class="alignright"><?php echo $resortName?></td>
                                                        </tr>
                                                   

                                                        <td>Check In Date </td>
                                                            <td class="alignright"> <?php echo $checkInDate?></td>
                                                        </tr>

                                                        <td>Check Out Date</td>
                                                            <td class="alignright"><?php echo $checkOutDate?></td>
                                                        </tr>
                                                        <tr class="total">
                                                            <td>Total Payment (inc. charge)</td>
                                                            <td class="alignright"><?php echo $totalPayment?></td>
                                                        </tr>
                                                    </tbody></table>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                                <tr>

                                        <!--<center><a href="managePayment.php">Back To Main</a> -->
                                    </td>
                                </tr>
                                <tr>
                                   <td class="content-block"> <center>THANK YOU FOR RESERVING RESORT WITH US!

                                    </td>
                                </tr>
                                                                    <td class="content-block">
                                       <center><a href="managePayment.php">Home</a>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody></table>
                <div class="footer">
                    <table width="100%">
                        <tbody><tr>
                            <td class="aligncenter content-block">Any Queries? Email <a href="mailto:">resortreservation@company.inc</a></td>
                        </tr>
                    </tbody></table>
                </div></div>
        </td>
        <td></td>
    </tr>
</tbody></table>

