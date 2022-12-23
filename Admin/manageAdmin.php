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
    <title>Admin Main</title>
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

    <h1 style="margin-left:40% ;margin-top:80px"   class="">Admin Information</h1>

    <table class="table" border="2" cellspacing="7">
        <tr>
        <th>Admin ID</th>
        <th>Admin Name</th>
        <th>Contact Number</th>
        <th>Email</th>
        <th>Password</th>
         <th colspan="2" align="center">Action</th>
        

        </tr>

        <?php 
        // except the first admin who has the highest privileges
            $query="SELECT  * FROM  admin WHERE adminID != 'admin1'" ;
        $result=$conn->query($query);
        //display data from db
        if(mysqli_num_rows($result)>=1){
            while ($row=$result->fetch_assoc()) {

                echo "<tr><td>".$row["adminID"]."</td>
                <td>".$row["adminName"]."</td>
                <td>".$row["adminPhoneNo"]."</td>
                <td>".$row['adminEmail']."</td>
                <td>".$row['adminPassword']."</td>
                <td><a href = 'updateOwner.php?ownerID=$row[adminID] & ownerName = $row[adminName] & phone = $row[adminPhoneNo] & email = $row[adminEmail]& pass = $row[adminPassword]'><input type = 'submit' value = 'Update' id = 'button'></a></td>
                <td><a href = 'deleteOwner.php?ownerID=$row[adminID]' onclick = 'return checkdelete()'><input type = 'submit' value = 'Delete' id = 'button'></td>

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

    <a href = 'addOwner.php'><input type = 'submit' value = 'Add' id = 'add_button'></a>


   <script>
       
    function checkdelete(){


        return confirm('Are you sure you want to delete this record?');

    }



   </script> 

</body>
</html>