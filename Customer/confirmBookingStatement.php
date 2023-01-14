<?php
    session_start();
    include_once '../connection.php';
    //include_once 'customerNavBar.php';
    $user_id = $_SESSION['user_id'];
    $pType = 'online banking';
    $pStatus = 'Paid';
    $sysdate = date('y-m-d');

  if (isset($_GET['bookingID'])){
    $bookingID = $_GET['bookingID'];
    $resortID = $_GET['resortID'];


    $query = $conn->query("SELECT b.bookingDate, b.bookingID, o.roomID, r.resortName, b.checkInDate, b.checkOutDate, b.totalPrice FROM bookings b JOIN resorts r on b.resortID=r.resortID JOIN room_booking o on b.bookingID=o.bookingID WHERE b.bookingID = '$bookingID' AND r.resortID = '$resortID';") or die(mysqli_error());

                        while($row = $query->fetch_array())

                        {
                            $bookingDate = $row['bookingDate'];
                            $bookingID = $row['bookingID'];
                            $roomID = $row['roomID'];
                            $resortName = $row['resortName'];
                            $checkInDate = $row['checkInDate'];
                            $checkOutDate = $row['checkOutDate'];
                            $totalPrice = $row['totalPrice'];
                            $totalPayment = (0.1*$totalPrice)+$totalPrice;
                            
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
                                        <center><h2>Booking Confirmation Statement</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        <table class="invoice">
                                            <tbody><tr>
                                               
                                                 <td><?php echo $user_id ?><br>Invoice ####<br><?php echo $sysdate?></td>
                                                
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table class="invoice-items" cellpadding="0" cellspacing="0">
                                                        <tbody><tr>
                                                            <td>Booking ID</td>
                                                            <td class="alignright"><?php echo $bookingID ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Resort Name</td>
                                                            <td class="alignright"><?php echo $resortName?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Room ID </td>
                                                            <td class="alignright"> <?php echo $roomID?> </td>
                                                        </tr>

                                                        <td>Check In Date </td>
                                                            <td class="alignright"> <?php echo $checkInDate?></td>
                                                        </tr>

                                                        <td>Check Out Date</td>
                                                            <td class="alignright"><?php echo $checkOutDate?></td>
                                                        </tr>

                                                        <td>Price</td>
                                                            <td class="alignright"><?php echo $totalPrice?></td>
                                                        </tr>

                                                        <tr class="total">
                                                            <td>Total (inc. charge)</td>
                                                            <td class="alignright"><?php echo $totalPayment?></td>
                                                        </tr>
                                                    </tbody></table>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                       <center><a href="../Customer/source_payment_form/index.php?bookingID=<?php echo $bookingID?>">Pay Now</a>
                                        <!-- <center><a href="confirmPaymentProcess.php?bookingID=<?php echo $bookingID?>">Pay Now</a> -->
                                    </td>
                                </tr>
                                <tr>
                                   <td class="content-block"> <center>Resort Reservation SDN BHD
                                    </td>
                                </tr>
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