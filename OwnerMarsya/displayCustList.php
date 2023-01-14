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
            echo"<meta http-equiv='refresh' content='0; url=bookingByOwner.php'/>";

        }
    else {

    
         $query = $conn->query("SELECT  * FROM  customers;") or die(mysqli_error());
    }

  
?>
<html lang = "en">

<html lang = "en">
  <head>
    
    <meta charset = "utf-8" />
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
    <link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css " />
    <link rel = "stylesheet" type = "text/css" href = "../css/style.css" />

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
              <th><center>Customer ID</th>
              <th><center>Customer Name</th>
              <th><center>Phone Number</th>
              <th><center>Email</th>
                <th><center>Action</th>
           
              
            </tr>
          </thead>
          <tbody>
          <?php
            //$query = $conn->query("SELECT  * FROM  customers;") or die(mysqli_error());
            while($fetch = $query->fetch_array()){
          ?>  
            <tr>
            <td><center><?php echo $fetch['custID']?></td>
              <td><center><?php echo $fetch['custName']?></td>
              <td><center><?php echo $fetch['phoneNo']?></td>
              <td><center><?php echo $fetch['custEmail']?></td>
            
                 <td><center><a class = "btn btn-warning" href = "selectResort.php?custID=<?php echo $fetch['custID']?>&fdate=<?php echo $fdate?>&tdate=<?php echo $tdate?>"><i class = "glyphicon glyphicon-edit"></i>Select</a> </td>

            
            </tr>
          <?php
            }
          ?>  
          </tbody>
        </table>
         <a href = 'viewReservation.php'><input type = 'submit' value = 'Back' id = 'add_button'></a>
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