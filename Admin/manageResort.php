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
    <title>Manage Resort</title>
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
            color:  #F0F5F9;
        }

        tr: nth-child(even) {background-color: #ededed;}
    </style>

</head>

<body>

    <h1 style="margin-left:40% ;margin-top:80px"   class="">Resorts Information</h1>

    <table class="table" border="2" cellspacing="7">
        <tr>
        <th>Resort ID</th>
        <th>Resort Name</th>
        <th>Address</th>
        <th>Contact No.</th>
        <th>Ratings</th>
        <th>Price Per Night (RM)</th>
         <th>Capacity</th>
        <th>Keywords</th>
        <th>Owner ID</th>
        <th>Action</th>

         <!---<th colspan="2" align="center">Action</th>-->
        

        </tr>

        <?php 
        // except the first admin who has the highest privileges
            $query="SELECT  * FROM  resorts;" ;
        $result=$conn->query($query);
        //display data from db
        if(mysqli_num_rows($result)>=1){
            while ($row=$result->fetch_assoc()) {

                echo "<tr><td>".$row["resortID"]."</td>
                <td>".$row["resortName"]."</td>
                <td>".$row['address']."</td>
                <td>".$row['resortPhoneNo']."</td>
                <td>".$row['overallRatings']."</td>
                <td>".$row['pricePerNight']."</td>
                <td>".$row['capacity']."</td>
                <td>".$row['keywords']."</td>
                <td>".$row['ownerID']."</td>
                <td><a href = 'updateResort.php?resortID=$row[resortID] & address = $row[address] & contact = $row[resortPhoneNo] & ratings = $row[overallRatings] & price = $row[pricePerNight] & capacity = $row[capacity] & keyword = $row[keywords] & ownerID = $row[ownerID]'><input type = 'submit' value = 'Edit' id = 'button'></a></td>
                

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

</body>
</html>