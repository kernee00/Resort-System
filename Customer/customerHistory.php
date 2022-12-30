<?php
    session_start();
    include_once '../connection.php';
    include_once 'customerNavBar.php';

     $user_id = $_SESSION['user_id'];
     $role = "customers";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name ="viewreport" content="width=device-width, initial-scale =1.0">
    <title>Booking History</title>
    <link rel="stylesheet" href="../Admin/manageStyle.css">

    <style type = "text/css">
        table {

            border-collapse:  collapse;
            width:  100%;
            max-width: 1800px;  
            color:  #52616B;
            font-size: 25px;
            text-align: center;
            margin: 10rem auto;  
            border-radius: 20px;
        }

        th {

            background-color: #434242;
            color:  white;
        }

        tr: nth-child(even) {background-color: #ededed;}
    </style>

</head>

<body>

    <h1 style="margin-left:40% ;margin-top:80px"   class="">Booking History</h1>

    <table class="table" border="2" cellspacing="7">
        <tr>

        <!-- <th>Payment ID</th>
        <th>Booking ID</th>
        <th>Amount (RM)</th>
        <th>Status</th> -->

        <th>Booking ID</th>
        <th>Booking Date</th>
        <th>Check In Date</th>
        <th>Check Out Date</th>
        <th>Total Paid (RM)</th>

        <!-- <th colspan="2" align="center">Action</th> -->
        

        </tr>

        <?php 

        $query="SELECT  * FROM  bookings WHERE custID = 'user_id'";

        $result=$conn->query($query);
        //display data from db
        if(mysqli_num_rows($result)>=1){
            while ($row=$result->fetch_assoc()) {

                echo "<tr><td>".$row["bookingID"]."</td>
                <td>".$row["bookingID"]."</td>
                <td>".$row['bookingDate']."</td>
                <td>".$row['CheckInDate']."</td>
                <td>".$row['CheckOutDate']."</td>
                <td>".$row['totalPrice']."</td>

                </tr>";
                //assign role
                $_SESSION['role'] = "customers";               
            }
        }

        else
        {
            echo "<tr><td>No data found.";
        }

        ?>

    </table>

    <a href = 'viewResortReport.php'><input type = 'submit' value = 'Download' id = 'add_button'></a>



   </script> 

</body>
</html>