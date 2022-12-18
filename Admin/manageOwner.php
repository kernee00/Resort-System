<?php
    session_start();
    include_once '../connection.php';
    include_once 'adminNavBar.php';

   if (isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM admin WHERE adminID = '$user_id'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0){

            while ($row = mysqli_fetch_assoc($result)){

                $name = $row['adminName'];
                $phone = $row['adminPhoneNo'];
                $email = $row['adminEmail'];
                $password = $row['adminPassword'];

               
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
    <title>Admin Main</title>
    <!--<link rel="stylesheet" href="adminStyle.css">-->

    <style type = "text/css">
        table {

            border-collapse:  collapse;
            width:  100%;
            color:  #337ab7;
            font-size: 25px;
            text-align: center;
        }

        th {

            background-color: #337ab7;
            color:  white;
        }

        tr: nth-child(even) {background-color: #ededed;}
    </style>

</head>

<body>

    <h1 style="margin-left:35% ;margin-top:80px"   class="">Owners Information</h1>

    <table class="table">
        <tr>
        <th>Owner ID</th>
        <th>Owner Name</th>
        <th>Contact Number</th>
        <th>Email</th>
        <th>Password</th>
        

        </tr>

        <?php 
            $query="SELECT  * FROM  owner" ;
        $result=$conn->query($query);
        if(mysqli_num_rows($result)>=1){
            while ($row=$result->fetch_assoc()) {

                echo "<tr><td>".$row["ownerID"]."</td><td>".$row["ownerName"]."</td><td>".$row["ownerPhoneNo"]."</td><td>".$row['ownerEmail']."</td><td>".$row['accPassword']."</td></tr>";
               
            }

        }

        ?>

    </table>
    <form action="" class = "manage">

        <li><a href='updateOwner.php'>Update</a></li>
        <li><a href='deleteOwner.php'>Delete</a></li>
        <li><a href='addOwner.php'>Add</a></li>
</form>




</body>
</html>