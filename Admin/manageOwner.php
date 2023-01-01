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
				<div class = "alert alert-info">Manage Owner</div>
				<br />
				<br />
				<table id = "table" class = "table table-bordered">
					<thead>
						<tr>
							<th><center>Owner ID</th>
							<th><center>Owner Name</th>
							<th><center>Contact No</th>
							<th><center>Email</th>
							<th><center>Password</th>
							<th><center>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$query = $conn->query("SELECT * FROM owner") or die(mysqli_error());
						while($fetch = $query->fetch_array()){
					?>	
						<tr>
						<td><center><?php echo $fetch['ownerID']?></td>
							<td><center><?php echo $fetch['ownerName']?></td>
							<td><center><?php echo $fetch['ownerPhoneNo']?></td>
							<td><center><?php echo $fetch['ownerEmail']?></td>
							<td><center><?php echo $fetch['accPassword']?></td>

							<td><center><a class = "btn btn-warning" href = "updateOwner.php?ownerID=<?php echo $fetch['ownerID']?>"><i class = "glyphicon glyphicon-edit"></i> Edit</a> <a class = "btn btn-danger" onclick = "confirmationDelete(this); return false;" href = "deleteOwner.php?ownerID=<?php echo $fetch['ownerID']?>"><i class = "glyphicon glyphicon-remove"></i> Delete</a></center></td>
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