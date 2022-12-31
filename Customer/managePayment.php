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
    <title>Payment</title>
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
        <th>Total Payment</th>
        <th>Payment Date </th>
        <th>Payment Type </th>
        <th>Payment Status </th>

         <th colspan="2" align="center">Action</th>
        

        </tr>

        <?php 

        $query="SELECT  * FROM  payments";
        $result=$conn->query($query);
        //display data from db
        if(mysqli_num_rows($result)>=1){
            while ($row=$result->fetch_assoc()) {

                echo "<tr><td>".$row["paymentID"]."</td>
                <td>".$row['totalPayment']."</td>
                 <td>".$row["paymentDate"]."</td>
                  <td>".$row["paymentType"]."</td>
                <td>".$row['paymentStatus']."</td>
                <td><a href = 'updatePayment.php?paymentID=$row[paymentID] & bookingID = $row[bookingID] & amount = $row[totalPayment] & payStatus = $row[paymentStatus]'><input type = 'submit' value = 'Approve' id = 'button'></a></td>
                <td><a href = 'paymentProcess.php?paymentID=$row[paymentID]' onclick = 'return checkdelete()'><input type = 'submit' value = 'Refund' id = 'button'></td>

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

    <a href = 'viewResortReport.php'><input type = 'submit' value = 'Report' id = 'add_button'></a>


   <script>
       
    function checkdelete(){


        return confirm('Are you sure you want to refund this payment?');

    }



   </script> 

</body>
</html>