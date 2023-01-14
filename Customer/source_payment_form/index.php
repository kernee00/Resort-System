<?php
    session_start();
    include_once '../../connection.php';
    //include_once 'customerNavBar.php';
    $user_id = $_SESSION['user_id'];
    $pType = 'online banking';
    $pStatus = 'Paid';
    $sysdate = date('y-m-d');

  if (isset($_GET['bookingID'])){
    $bookingID = $_GET['bookingID'];
    //$resortID = $_GET['resortID'];

    $query = $conn->query("SELECT b.bookingDate, b.bookingID, o.roomID, b.checkInDate, b.checkOutDate, b.totalPrice FROM bookings b JOIN room_booking o on b.bookingID=o.bookingID WHERE b.bookingID = '$bookingID';") or die(mysqli_error());

                        while($row = $query->fetch_array())

                        {
                            $bookingDate = $row['bookingDate'];
                            $bookingID = $row['bookingID'];
                            $roomID = $row['roomID'];
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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <div class="popup">
        <h1>Confirm Your Payment</h1>
        <div class="first-row">
            <div class="owner">
                <h3>Owner</h3>
                <div class="input-field" required>
                    <input type="text" required>
                </div>
            </div>
            <div class="cvv">
                <h3>CVV</h3>
                <div class="input-field" required>
                    <input type="password">
                </div>
            </div>
        </div>
        <div class="second-row">
            <div class="card-number">
                <h3>Card Number</h3>
                <div class="input-field" required>
                    <input type="text">
                </div>
            </div>
        </div>
        <div class="third-row">
            <h3>Card Number</h3>
            <div class="selection">
                <div class="date">
                    <select name="months" id="months">
                        <option value="Jan">Jan</option>
                        <option value="Feb">Feb</option>
                        <option value="Mar">Mar</option>
                        <option value="Apr">Apr</option>
                        <option value="May">May</option>
                        <option value="Jun">Jun</option>
                        <option value="Jul">Jul</option>
                        <option value="Aug">Aug</option>
                        <option value="Sep">Sep</option>
                        <option value="Oct">Oct</option>
                        <option value="Nov">Nov</option>
                        <option value="Dec">Dec</option>
                      </select>
                      <select name="years" id="years">
                        <option value="2020">2020</option>
                        <option value="2019">2019</option>
                        <option value="2018">2018</option>
                        <option value="2017">2017</option>
                        <option value="2016">2016</option>
                        <option value="2015">2015</option>
                      </select>
                </div>
                <div class="cards">
                    <img src="mc.png" alt="">
                    <img src="vi.png" alt="">
                    <img src="pp.png" alt="">
                </div>
            </div>    
        </div>
        &nbsp;&nbsp;&nbsp;

        <a href="../paymentConfirm.php?bookingID=<?php echo $bookingID?>">Confirm Pay (RM <?php echo $totalPayment?>)</a>

    </div>
</body>
</html>