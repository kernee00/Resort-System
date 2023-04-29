<!DOCTYPE html>
<?php
  session_start();
    include_once '../connection.php';
    include_once 'ownerNavBar.php';
    $user_id = $_SESSION['user_id'];


         if(isset($_POST['submit']))
{ 
$fdate=$_POST['fdate'];
$tdate=$_POST['tdate'];

   $dateTimestamp1 = strtotime($fdate);
        $dateTimestamp2 = strtotime($tdate);
        if ($dateTimestamp1 > $dateTimestamp2){

            echo "<script>alert('Unavailable date selected!');</script>";
            error_reporting(0);
            echo"<meta http-equiv='refresh' content='0; url=viewReservation.php'/>";
        

        }


  
?>
<html lang = "en">

<html lang = "en">
  <head>
    
    <meta charset = "utf-8" />
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
    <link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css " />
    <link rel = "stylesheet" type = "text/css" href = "../css/style.css" />
      <script src="https://kit.fontawesome.com/ba67cd3f0d.js" crossorigin="anonymous"></script>

  <br />
 <title>Manage Bookings</title>
 

 <h2 style="margin-left:35% ;margin-top:80px"   class="">Bookings Information From <?php echo $fdate?> To <?php echo $tdate?></h2>

  <div class = "container-fluid">
    <div class = "panel panel-default">
      <div class = "panel-body">
        <!--<div class = "alert alert-info">Manage Bookings</div>-->
        <br />
        <br />
        <table id = "table" class = "table table-bordered">
          <thead>
            <tr>
              <th><center>Booking ID</th>
              <th><center>Booking Date</th>
              <th><center>Check In Date</th>
              <th><center>Check Out Date</th>
              <th><center>Total Price</th>
              <th><center>Payment Status</th>
              <th><center>Resort Name</th>
                <th><center>Customer ID</th>
              
            </tr>
          </thead>
          <tbody>
          <?php
            $query = $conn->query("SELECT  * FROM  bookings b, resorts r, payments p WHERE b.resortID = r.resortID AND b.bookingID = p.bookingID AND checkInDate >= '$fdate' AND checkOutDate <= '$tdate' AND ownerID = '$user_id' ORDER BY bookingDate;") or die(mysqli_error());
            while($fetch = $query->fetch_array()){
          ?>  
            <tr>
            <td><center><?php echo $fetch['bookingID']?></td>
              <td><center><?php echo $fetch['bookingDate']?></td>
              <td><center><?php echo $fetch['checkInDate']?></td>
              <td><center><?php echo $fetch['checkOutDate']?></td>
              <td><center><?php echo $fetch['totalPrice']?></td>
              <td><center><?php echo $fetch['paymentStatus']?></td>
              <td><center><?php echo $fetch['resortName']?></td>
                 <td><center><a class = "btn " href = "customerMain.php?custID=<?php echo $fetch['custID']?>"><?php echo $fetch['custID']?></a> </td>

            
            </tr>
          <?php
            }
          ?>  
          </tbody>
        </table>
         <a href = 'viewReservation.php'><input type = 'submit' value = 'Back' id = 'add_button'></a>
          <a href = 'viewResortReport.php'><input type = 'submit' value = 'Report' id = 'add_button'></a>
      </div>
    </div>
  </div>
  <br />
  <br />

</body>
<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>
<script src = "../js/jquery.dataTables.js"></script>
<script src = "../js/dataTables.bootstrap.js"></script> 


<script type = "text/javascript">
  $(document).ready(function(){
    $("#table").DataTable();
  });
</script>
       <?php
  }

    ?>
</html>