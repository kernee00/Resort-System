<!DOCTYPE html>
<?php
	session_start();
    include_once '../connection.php';
    include_once 'adminNavBar.php';
    $user_id = $_SESSION['user_id'];

  
?>
<html lang = "en">

<html lang = "en">
	<head>
		
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css " />
		<link rel = "stylesheet" type = "text/css" href = "../css/style.css" />

	<br />
	<div class = "container-fluid">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<!--<div class = "alert alert-info">Manage Admin</div>-->
				<br />
				<br />
				<table id = "table" class = "table table-bordered">
					<thead>
						<tr>
							 <th><center>Owner ID</th>
        					<th><center>Booking ID</th>
        					<th><center>Resort ID</th>
       						<!--<th>Owner ID</th>-->
        					<th><center>Amount (RM)</th>
        					<th><center>Status</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$query = $conn->query("SELECT * FROM bookings b, payments p, adminPayment a, resorts r WHERE p.bookingID = b.bookingID AND a.bookingID = p.bookingID AND b.resortID = r.resortID AND payOwnerStatus = 'Paid';") or die(mysqli_error());
						while($fetch = $query->fetch_array()){
					?>	
						<tr>
						<td><center><?php echo $fetch['ownerID']?></td>
							<td><center><?php echo $fetch['bookingID']?></td>
								<td><center><?php echo $fetch['resortID']?></td>
							<td><center><?php echo $fetch['totalPrice']?></td>
							<td><center><?php echo $fetch['payOwnerStatus']?></td>
						
						</tr>
					<?php
						}
					?>	
					</tbody>
				</table>
					<a href = 'manageOwnerPayment.php'><input type = 'submit' value = 'Back' id = 'add_button'></a>
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
</html>