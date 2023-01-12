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
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css " />
		<link rel = "stylesheet" type = "text/css" href = "../css/style.css" />

	<br />
	<div class = "container-fluid">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<!--<div class = "alert alert-info">Manage Owner</div>-->
				<br />
				<br />
				<table id = "table" class = "table table-bordered">
					<thead>
						<tr>
							<th><center>Room ID</th>
							<th><center>Price per Night</th>
							<th><center>Capacity </th>
							<th><center>Location</th>
							<th><center>Description</th>
							<th><center>Action</th>
							
						</tr>
					</thead>
					<tbody>
					
					<?php  
						$resortID = !empty($_GET["resortID"]) ? $_GET["resortID"] : NULL;
						$query = $conn->query("SELECT * FROM rooms where resortID = '$resortID'") or die(mysqli_error());
						while($fetch = $query->fetch_array()){
					?>	
						<tr>
						<td><center><?php echo $fetch['roomID']?></td>
							<td><center><?php echo $fetch['pricePerNight']?></td>
							<td><center><?php echo $fetch['capacity']?></td>
							<td><center><?php echo $fetch['location']?></td>
							<td><center><?php echo $fetch['description']?></td>

							<td><center><a class = "btn btn-warning" href = "updateOwner.php?roomID=<?php echo $fetch['roomID']?>"><i class = "glyphicon glyphicon-edit"></i> Edit</a> <a class = "btn btn-danger" onclick = "confirmationDelete(this); return false;" href = "deleteroom.php?roomID=<?php echo $fetch['roomID'];?>"><i class = "glyphicon glyphicon-remove"></i> Delete</a></center></td>
						</tr>
					<?php
					
						}
					?>	
					</tbody>
				</table>

				<form action="addRoom.php?resortID=<?php echo $resortID;?>" method="POST">
					<input type="submit" value="Add Room" name="add_resort" class="btn">

	

					</form>
				 

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