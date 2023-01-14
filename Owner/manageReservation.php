<!DOCTYPE html>
<?php
  session_start();
    include_once '../connection.php';
    include_once 'ownerNavBar.php';
    $user_id = $_SESSION['user_id'];

  
?>
<html lang = "en">

<html lang = "en">
  <head>
    
    <meta charset = "utf-8" />
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
    <link rel = "stylesheet" type = "text/css" href = "../Style/bootstrap.css " />
    <link rel = "stylesheet" type = "text/css" href = "../css/style.css" />

    <style> 
input[type=button], input[type=submit], input[type=reset] {
  background-color: #54C0EC;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}
  button[type=button], button[type=submit], button[type=reset] {
  background-color: #54C0EC;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}
</style>

  <br />
 <title>Manage Bookings</title>
    <link rel="stylesheet" href="manageStyle.css">

    <div class = "container">

         <h1 style="margin-left:40% ;margin-top:80px"   class="">Bookings Information</h1>

          <form name="dateInput" action="" method="post" action="">

            <label>From: </label>
            <input type="date" name="fdate" class="form-control" id="fdate" >
             <label>To: </label>
             <input type="date" name="tdate" class="form-control" id="tdate">
                 <br>
                 <center>
             <button  type="submit" name="submit">Submit</button>

     </form>

    <a href = 'viewResortReport.php'><input type="button"  value = 'REPORT' id = 'add_button'></a></center>

</div>
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

 <h2 style="margin-left:40% ;margin-top:80px"   class="">Bookings Information From <?php echo $fdate?> To <?php echo $tdate?></h2>

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
              <th><center>Customer ID</th>
              <th><center>Resort ID</th>
              
            </tr>
          </thead>
          <tbody>
          <?php
            $query = $conn->query("SELECT  * FROM  bookings WHERE checkInDate >= '$fdate' AND checkOutDate <= '$tdate';") or die(mysqli_error());
            while($fetch = $query->fetch_array()){
          ?>  
            <tr>
            <td><center><?php echo $fetch['bookingID']?></td>
              <td><center><?php echo $fetch['bookingDate']?></td>
              <td><center><?php echo $fetch['checkInDate']?></td>
              <td><center><?php echo $fetch['checkOutDate']?></td>
              <td><center><?php echo $fetch['totalPrice']?></td>
              <td><center><?php echo $fetch['custID']?></td>
              <td><center><?php echo $fetch['resortID']?></td>

                <td><center><a class = "btn btn-warning" href = "customerMain.php?custID=<?php echo $fetch['custID']?>"><i class = "glyphicon glyphicon-edit"></i> <?php echo $fetch['custID']?></a> </td>

            
            </tr>
          <?php
            }
          ?>  
          </tbody>
        </table>
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
  function confirmationDelete(anchor){
    var conf = confirm("Are you sure you want to delete this record?");
    if(conf){
      window.location = anchor.attr("href");
    }
  } 
</script>

<script type = "text/javascript">
  $(document).ready(function(){
    $("#table").DataTable();
  });
</script>
       <?php
  }

    ?>
</html>
