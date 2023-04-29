<?php
    session_start();
    include_once '../connection.php';
    include_once 'ownerNavBar.php';

     $user_id = $_SESSION['user_id'];
     $role = "owner";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name ="viewreport" content="width=device-width, initial-scale =1.0">
    <title>Manage Payment</title>
    

    <link rel = "stylesheet" type = "text/css" href = "../css/style.css" />

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

    <h1 style="margin-left:40% ;margin-top:80px"   class="">Payment History</h1>

    <table class="table" border="2" cellspacing="7">
        <tr>
        <th>Payment ID</th>
        <th>Booking ID</th>
        <!--<th>Owner ID</th>-->
        <th>Amount (RM)</th>
        <th>Status</th>

        
        

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
                

                </tr>";
                //assign role
                $_SESSION['role'] = "owner";
             
               
            }

        }

        else
        {
            echo "<tr><td>No data found.";
        }

        ?>

    </table>
    
    

   <script>
       
    

    



   </script> 

</body>
</html>