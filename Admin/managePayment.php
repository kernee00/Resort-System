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
				<div class = "alert alert-info">Manage Payment</div>
				<br />
				<br />
				<table id = "table" class = "table table-bordered">
					<thead>
						<tr>
							<th><center>Payment ID</th>
							<th><center>Booking ID</th>
							<th><center>Date</th>
							<th><center>Amount (RM)</th>
							<th><center>Charges (RM)</th>
							<th><center>Status</th>
						
							<th><center>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$query = $conn->query("SELECT p.bookingID, p.paymentID, paymentDate, paymentStatus, totalPayment, p.totalPayment-b.totalPrice AS charges FROM payments p,bookings b WHERE b.bookingID = p.bookingID AND paymentStatus != 'Approved' AND paymentStatus!= 'Refund' GROUP BY p.bookingID, p.paymentID ORDER BY p.bookingID, p.paymentID;") or die(mysqli_error());
						while($fetch = $query->fetch_array()){
					?>	
						<tr>
						<td><center><?php echo $fetch['paymentID']?></td>
							<td><center><?php echo $fetch['bookingID']?></td>
							<td><center><?php echo $fetch['paymentDate']?></td>
							<td><center><?php echo $fetch['totalPayment']?></td>
							<td><center><?php echo $fetch['charges']?></td>
							<td><center><?php echo $fetch['paymentStatus']?></td>
					

							<td><center><a class = "btn btn-warning" href = "updatePayment.php?paymentID=<?php echo $fetch['paymentID']?>"><i class = "glyphicon glyphicon-edit"></i> Approve</a> <a class = "btn btn-danger" onclick = "confirmationDelete(this); return false;" href = "paymentProcess.php?paymentID=<?php echo $fetch['paymentID']?>"><i class = "glyphicon glyphicon-remove"></i> Refund</a></center></td>
						</tr>
					<?php
						}
					?>	
					</tbody>
				</table>
				    <a href = 'viewPaymentHistory.php'><input type = 'submit' value = 'History' id = 'add_button'></a>
    				<a href = 'viewPaymentReport.php'><input type = 'submit' value = 'Report' id = 'add_button'></a>
    				<a href = 'manageOwnerPayment.php'><input type = 'submit' value = 'Owner Payment' id = 'add_button'></a>
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
		var conf = confirm("Are you sure you want to refund this payment?");
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