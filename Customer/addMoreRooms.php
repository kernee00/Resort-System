<!DOCTYPE html>
<?php
	session_start();
    include_once '../connection.php';
    include_once 'customerNavBar.php';
    $user_id = $_SESSION['user_id'];

         if(isset($_POST['submit']))
{ 
$fdate=$_POST['fdate'];
$tdate=$_POST['tdate'];
$resortID = $_POST['resortID'];
  
?>
<html lang = "en">

<html lang = "en">
	<head>
		
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css " />
		<link rel = "stylesheet" type = "text/css" href = "../css/style.css" />

	<br />
	<h2 style="margin-left:35% ;margin-top:80px"   class="">Rooms for <?php echo $resortID ?> From <?php echo $fdate ?> To <?php echo $tdate ?></h2>

	<div class = "container-fluid">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<!--<div class = "alert alert-info">Manage Bookings</div>-->
				<br />
				<br />
				<table id = "table" class = "table table-bordered">
					<thead>
						<tr>
							<th><center>Price Per Night (RM)</th>
							<th><center>Capacity</th>
							<th><center>Description</th>
									<th><center>Action</th>
				
							
						</tr>
					</thead>
					<tbody>
					<?php
						$query = $conn->query("SELECT r.roomID, b.resortID, pricePerNight, capacity, location, description FROM rooms r, room_booking m, bookings b WHERE b.bookingID = m.bookingID AND m.roomID = r.roomID AND b.resortID = '$resortID' AND m.bookingID NOT IN (SELECT bookingID FROM bookings WHERE (checkInDate BETWEEN '$fdate' AND '$tdate' OR checkOutDate BETWEEN '$fdate' AND '$tdate')) GROUP BY r.roomID ORDER BY r.roomID ;") or die(mysqli_error());
						while($fetch = $query->fetch_array()){
					?>	
						<tr>
						<td><center><?php echo $fetch['pricePerNight']?></td>
							<td><center><?php echo $fetch['capacity']?></td>
							<td><center><?php echo $fetch['description']?></td>
								<td><center><a class = "btn btn-warning" href = 'insertBooking.php?roomID=<?php echo $fetch['roomID']?>&resortID=<?php echo $resortID?>&fdate=<?php echo $fdate?>&tdate=<?php echo $tdate?>'></i> Book Now</a></td>
						
						</tr>
					<?php
						}
					?>	
					</tbody>
				</table>
				<a href = 'displayRoom1.php'><input type = 'submit' value = 'Back' id = 'add_button'></a>
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