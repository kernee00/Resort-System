<?php
    session_start();
    include_once '../connection.php';
    include_once 'adminNavBar.php';

     $user_id = $_SESSION['user_id'];
     $role = "admin";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name ="viewreport" content="width=device-width, initial-scale =1.0">
    <title>Manage Payment</title>
    <link rel="stylesheet" href="manageStyle.css">

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

    <h1 style="margin-left:40% ;margin-top:80px"   class="">Payment Information</h1>

    <table class="table" border="2" cellspacing="7">
        <tr>
        <th>Payment ID</th>
        <th>Booking ID</th>
        <!--<th>Owner ID</th>-->
        <th>Amount (RM)</th>
        <th>Status</th>

       
        

        </tr>

        <?php 

            $query="SELECT  * FROM  payments WHERE paymentStatus != 'Request Refund' AND paymentStatus!= 'Paid';" ;
        $result=$conn->query($query);
        //display data from db
        if(mysqli_num_rows($result)>=1){
            while ($row=$result->fetch_assoc()) {

                echo "<tr><td>".$row["paymentID"]."</td>
                <td>".$row["bookingID"]."</td>
                <td>".$row['totalPayment']."</td>
                <td>".$row['paymentStatus']."</td>
             

                </tr>";
                //assign role
                $_SESSION['role'] = "admin";
             
               
            }

        }

        else
        {
            echo "<tr><td>No data found.";
        }

        ?>

    </table>
    <a href = 'managePayment.php'><input type = 'submit' value = 'Back' id = 'add_button'></a>
   

</body>
</html>