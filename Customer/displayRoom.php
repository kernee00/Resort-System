<!DOCTYPE html>
<?php
	session_start();
    include_once '../connection.php';
    include_once 'customerNavBar.php';
    $user_id = $_SESSION['user_id'];
    $resortID = $_POST['resortID'];
  
?>

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
				<div class = "alert alert-info">Booking / Resort / Room</div>
				<br />
				<br />
				<table id = "table" class = "table table-bordered">
					<thead>
						<tr>
							<th>Room ID</th>
							<th>Price Per Night</th>
							<th>Capacity</th>
							<th>Location</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$query = $conn->query("SELECT * FROM rooms WHERE resortID = '$resortID'") or die(mysqli_error());

						while($fetch = $query->fetch_array()){
					?>	
						<tr>
							<td><?php echo $fetch['roomID']?></td>
							<td><?php echo $fetch['pricePerNight']?></td>
							<td><?php echo $fetch['capacity']?></td>
							<td><?php echo $fetch['location']?></td>

							<td><center><a class = "btn btn-warning" 
								

								href = "displayRoomConfirmation.php?room_id=
								<?php echo $fetch['roomID']?>"></i>Book</a></center></td>
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

	<div style = "text-align:right; margin-right:10px;" class = "navbar navbar-default navbar-fixed-bottom">
		<button onclick="history.back()">Back To Resort</button>
		<label>&copy; Workshop 2 </label>
	</div>
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