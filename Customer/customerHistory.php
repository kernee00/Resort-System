<?php
    session_start();
    include_once '../connection.php';
    include_once 'customerNavBar.php';

   if (isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM customers WHERE custID = '$user_id'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0){

            while ($row = mysqli_fetch_assoc($result)){

                $name = $row['custName'];
                $phone = $row['phoneNo'];
                $email = $row['custEmail'];
                $password = $row['custPassword'];
            }
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
    <meta name ="viewreport" content="width=device-width, initial-scale =1.0">
    <title>Customer Main</title>
    <link rel="stylesheet" href="manageStyle.css">

    <style type = "text/css">
         table {

            border-collapse:  collapse;
            width:  80%;
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
        <th>Booking ID</th>
        <th>Booking Date</th>
        <th>Check In Date</th>
        <th>Check Out Date</th>
        <th>Total Paid (RM)</th>
         <th colspan="2" align="center">Action</th>
        

        </tr>
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

        <?php 
        $query="SELECT  * FROM  bookings where custID = '$user_id'" ;
        $result=$conn->query($query);
        //display data from db
        if(mysqli_num_rows($result)>=1){
            while ($row=$result->fetch_assoc()) {

                echo "<tr><td>".$row["bookingID"]."</td>
                <td>".$row["bookingDate"]."</td>
                <td>".$row["checkInDate"]."</td>
                <td>".$row['checkOutDate']."</td>
                <td>".$row['totalPrice']."</td>

                
                <td><a href = 'downloadBookingDetails.php?bookingID=$row[bookingID]' onclick = 'return checkdownload()'><input type = 'submit' value = 'Download' id = 'button'></td>

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

    <a href = 'allReportBooking.php'><input type = 'submit' value = 'download' id = 'download_button'></a>


   <script>
       
    function checkdownload(){


        return confirm('Are you sure you want to download this booking details?');

    }



   </script> 

</body>
</html>