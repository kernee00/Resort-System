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
            max-width: 1500px;
            color:  #337ab7;
            font-size: 25px;
            text-align: center;
            margin: 10rem auto;  
            border-radius: 20px;
        }

        th {

            background-color: #337ab7;
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

         <th colspan="2" align="center">Action</th>
        

        </tr>

        <?php 
        // except the first admin who has the highest privileges
            $query="SELECT  * FROM  payments WHERE paymentStatus = 'Paid'" ;
        $result=$conn->query($query);
        //display data from db
        if(mysqli_num_rows($result)>=1){
            while ($row=$result->fetch_assoc()) {

                echo "<tr><td>".$row["paymentID"]."</td>
                <td>".$row["bookingID"]."</td>
                <td>".$row['totalPayment']."</td>
                <td>".$row['paymentStatus']."</td>
                <td><a href = 'updatePayment.php?paymentID=$row[paymentID] & bookingID = $row[bookingID] & amount = $row[totalPayment] & payStatus = $row[paymentStatus]'><input type = 'submit' value = 'Approve' id = 'button'></a></td>
                <td><a href = 'paymentProcess.php?paymentID=$row[paymentID]' onclick = 'return checkdelete()'><input type = 'submit' value = 'Refund' id = 'button'></td>

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

    <a href = 'addOwner.php'><input type = 'submit' value = 'Report' id = 'add_button'></a>


   <script>
       
    function checkdelete(){


        return confirm('Are you sure you want to refund this payment?');

    }



   </script> 

</body>
</html>