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

 <html lang = "en">

<html lang = "en">
    <head>
        
        <meta charset = "utf-8" />
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
        <link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css " />
        <link rel = "stylesheet" type = "text/css" href = "../css/style.css" />

    <br />
    <div class = "container-fluid">
        <div class = "panel panel-default">
            <div class = "panel-body">
                <center><div class = "alert alert-info">Invoice</div>
                <br />
                <br />

                <table id = "table" class = "table table-bordered">
                    <thead>
                        <tr>

                            <th><center>Resort Name</th>
                            <th><center>Booking Date</th>
                            <th><center>Check In Date</th>
                            <th><center>Check Out Date</th>
                            <th><center>Total Price (RM)</th>
                            
                        </tr>
                    </thead>
                    <tbody>   