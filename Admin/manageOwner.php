<?php
    session_start();
    include_once '../connection.php';
    include_once 'adminNavBar.php';

   if (isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
      $role = "owner";

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

    <h1 style="margin-left:40% ;margin-top:80px"   class="">Owners Information</h1>

    <table class="table" border="2" cellspacing="7">
        <tr>
        <th>Owner ID</th>
        <th>Owner Name</th>
        <th>Contact Number</th>
        <th>Email</th>
        <th>Password</th>
         <th colspan="2" align="center">Action</th>
        

        </tr>

        <?php 
            $query="SELECT  * FROM  owner" ;
        $result=$conn->query($query);
        //display data from db
        if(mysqli_num_rows($result)>=1){
            while ($row=$result->fetch_assoc()) {

                echo "<tr><td>".$row["ownerID"]."</td>
                <td>".$row["ownerName"]."</td>
                <td>".$row["ownerPhoneNo"]."</td>
                <td>".$row['ownerEmail']."</td>
                <td>".$row['accPassword']."</td>
                <td><a href = 'updateOwner.php?ownerID=$row[ownerID] & ownerName = $row[ownerName] & phone = $row[ownerPhoneNo] & email = $row[ownerEmail]& pass = $row[accPassword]'><input type = 'submit' value = 'Update' id = 'button'></a></td>
                <td><a href = 'deleteOwner.php?ownerID=$row[ownerID]' onclick = 'return checkdelete()'><input type = 'submit' value = 'Delete' id = 'button'></td>

                </tr>";
       
               
               
               
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