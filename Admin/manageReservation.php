<?php
    session_start();
    include_once '../connection.php';
    include_once 'adminNavBar.php';

     $user_id = $_SESSION['user_id'];
     //$role = "admin";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name ="viewreport" content="width=device-width, initial-scale =1.0">
    <title>Manage Bookings</title>
    <link rel="stylesheet" href="manageStyle.css">

         <h1 style="margin-left:40% ;margin-top:80px"   class="">Bookings Information</h1>

          <form name="dateInput" action="" method="post" action="">


            <label>From: </label>
            <input type="date" name="fdate" class="form-control" id="fdate">
             <label>To: </label>
             <input type="date" name="tdate" class="form-control" id="tdate">

             <button class="btn-primary btn" type="submit" name="submit">Submit</button>

     </form>

     </div>
    </div>
    <br>
    <hr>
      <div class="row">
      <div class="col-xs-12">
         <?php
         if(isset($_POST['submit']))
{ 
$fdate=$_POST['fdate'];
$tdate=$_POST['tdate'];

 
?>
 <h2 style="margin-left:35% ;margin-top:80px"   class="">Bookings Information From <?php echo $fdate?> To <?php echo $tdate?></h2>

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

   

    <table class="table" border="2" cellspacing="7">
        <tr>
   
        <th>Booking ID</th>
       <th>Booking Date</th>
        <th>Check In Date</th>
        <th>Check Out Date</th>
         <th>Total Price</th>
          <th>Customer ID</th>
           <th>Resort ID</th>

         <!--<th colspan="2" align="center">Action</th>-->
        

        </tr>

        <?php 

            $query="SELECT  * FROM  bookings WHERE checkInDate >= '$fdate' AND checkOutDate <= '$tdate';" ;
        $result=$conn->query($query);
        //display data from db
        if(mysqli_num_rows($result)>=1){
            while ($row=$result->fetch_assoc()) {

                echo "<tr><td>".$row["bookingID"]."</td>
                <td>".$row["bookingDate"]."</td>
                <td>".$row['checkInDate']."</td>
                <td>".$row['checkOutDate']."</td>
                <td>".$row['totalPrice']."</td>
                <td>".$row['custID']."</td>
                <td>".$row['resortID']."</td>
              

                </tr>";
       
            }

        }

        else
        {
            echo "<tr><td>No data found.";
        }

        ?>

    </table>
    <a href = 'viewBookingReport.php'><input type = 'submit' value = 'Report' id = 'add_button'></a>

       <?php
  }

    ?>

</body>
</html>