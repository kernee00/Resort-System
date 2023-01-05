<?php
    session_start();
    include_once '../connection.php';
    include_once 'customerNavBar.php';
    $user_id = $_SESSION['user_id'];
    $pType = 'online banking';
    $pStatus = 'Paid';
    $sysdate = date('y-m-d');

  if (isset($_GET['bookingID'])){
    $bookingID = $_GET['bookingID'];
    $resortID = $_GET['resortID'];



    $query = $conn->query("SELECT * FROM bookings b, resorts r WHERE bookingID = '$bookingID' AND r.resortID = '$resortID';") or die(mysqli_error());
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

            $bookingID = $conn->insert_id;
            }

            else {

                echo "Failed to book!";
            }
?>

<!DOCTYPE html>
<?php

        //after insert get the auto increment booking id 
         if(isset($_GET['paymentID']))
{        $paymentID = $_GET['paymentID'];

            $query = $conn->query("SELECT * FROM payments WHERE paymentID = $paymentID;") or die(mysqli_error());
                        while($row = $query->fetch_array()){

                            $paymentDate = $row['paymentDate'];
                            $totalPayment = $row['totalPayment'];
        }
    
/*           $sql_booking = "SELECT * FROM room_booking WHERE bookingID = $bookingID";
           $all_booking = $conn->query($sql_booking);*/

           $sql_booking = "SELECT * FROM payments WHERE bookingID = $bookingID";
           $all_booking = $conn->query($sql_booking);
        }

else {

    echo "Passing error!";
}
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="font/css/all.min.css">
    <link rel="stylesheet" href="cart.css">
    <!--<link rel = "stylesheet" type = "text/css" href = "../css/style.css" />-->
    <title>Receipt</title>
</head>
<body>

    <main>
        <h1>Booking Confirmation & Payment : </h1>
        <hr>
        <br>
        

        <?php

              $sql = "SELECT p.paymentID, p.totalPayment, p.paymentDate, b.bookingID, b.checkInDate, b.checkOutDate, b.totalPrice FROM bookings b, payments p WHERE b.bookingID = p.bookingID AND paymentID = '$paymentID';";
              $all_payments = $conn->query($sql);

              while($row = mysqli_fetch_assoc($all_payments)){
        ?>
        <div class="card">
          

            <div class="caption">
               
                <p class="Payment Date">Payment Date: <?php echo $row["paymentDate"]; ?></b></p>
                <p class="Booking ID ">Booking ID: <?php echo $row["bookingID"]; ?></p>
                <p class="Check In Date"><b>Check In Date: RM <?php echo $row["checkInDate"]; ?></p>
                <p class="Check Out Date"><b>Check In Date: RM <?php echo $row["checkOutDate"]; ?></p>
                <p class="Payment ID">Payment ID: <?php echo $row["paymentID"]; ?></p>
                <p class="Net Price">totalPrice: <?php echo $row["totalPrice"]; ?></p>
                <!-- <p class="Total Payment (inc tax 10%)">totalPayment: <?php echo $row["totalPayment"]; ?></p> -->
             
     
            </div>

        </div>
            
        <?php

          }
     
       ?>
       
            <br>
            <a onclick = "confirmationBooking(this); return false;" href = 'invoice.php?bookingID=<?php echo $bookingID?>&resortID=<?php echo $resortID?>'><input type = 'submit' value = 'print' id = 'add_button'></a>
    </main>

       <script type = "text/javascript">
    function confirmationBooking(anchor){
        var conf = confirm("Are you sure you want to place the booking?");
        if(conf){
            window.location = anchor.attr("href");
        }
    } 
</script>

   <script type = "text/javascript">
    function confirmationDelete(anchor){
        var conf = confirm("Are you sure you want to remove the room from booking?");
        if(conf){
            window.location = anchor.attr("href");
        }
    } 
</script>

</body>
</html>