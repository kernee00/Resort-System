<!DOCTYPE html>
<?php
    session_start();
    include_once '../connection.php';
    include_once 'customerNavBar.php';
    $user_id = $_SESSION['user_id'];

  
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
                <div class = "alert alert-info">Booking History</div>
                <br />
                <br />
                <table id = "table" class = "table table-bordered">
                    <thead>
                        <tr>
                            <th><center>Booking ID</th>
                            <th><center>Booking Date</th>
                            <th><center>Check In Date</th>
                            <th><center>Check Out Date</th>
                            <th><center>Total Paid (RM)</th>
                        
                            <th><center>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php

                    $query = $conn->query("SELECT payments.bookingID, bookings.bookingDate, bookings.checkInDate, bookings.checkOutDate, payments.totalPayment FROM bookings INNER JOIN payments ON payments.bookingID = bookings.bookingID WHERE payments.paymentStatus = 'Approved' AND bookings.checkOutDate < SYSDATE() AND bookings.custID = '$user_id';") or die(mysqli_error());


                        while($fetch = $query->fetch_array()){
                    ?>  
                        <tr>
                            <td><center><?php echo $fetch['bookingID']?></td>
                            <td><center><?php echo $fetch['bookingDate']?></td>
                            <td><center><?php echo $fetch['checkInDate']?></td>
                            <td><center><?php echo $fetch['checkOutDate']?></td>
                            <td><center><?php echo $fetch['totalPayment']?></td>

                            <td><center><a class = "btn btn-warning" 

                            href = "receiptPayment.php?bookingID=<?php echo $fetch['bookingID']?>"><i class = "glyphicon glyphicon-download"></i> View</a> <a class = "btn btn-danger"  

                            href = "addReview3.php?bookingID=<?php echo $fetch['bookingID']?>"><i class = "glyphicon glyphicon-star"></i> Feedback & Rate</a></center></td>

                        </tr>
                    <?php
                        }
                    ?>  
                    </tbody>
                </table>
                 <a href = 'reportPart/reportCustomer.php'><input type = 'submit' value = 'Report' id = 'add_button'></a>
            </div>
        </div>
    </div>
    <br />
    <br />
    <div style = "text-align:right; margin-right:10px;" class = "navbar navbar-default navbar-fixed-bottom">
        <label>&copy; Workshop 2 </label>
    </div>
</body>
<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>
<script src = "../js/jquery.dataTables.js"></script>
<script src = "../js/dataTables.bootstrap.js"></script> 
<script type = "text/javascript">
    function confirmationDownload(anchor){
        var conf = confirm("Are you sure you want to download?");
        if(conf){
            window.location = anchor.attr("href");
        }
    } 
</script>

<script type = "text/javascript">
    $(document).ready(function(){
        $("#table").DataTable();
    });
</script>
</html>

<a href = '../Customer/reportPart/reportCustomer.php'><input style = 'margin:10px' type = 'submit' value = 'Report ' id = 'add_button'></a>