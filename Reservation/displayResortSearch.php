<!DOCTYPE html>
<html>
<head>
	<style type = "text/css">
		table {

			border-collapse:  collapse;
			width:  100%;
			color:  #337ab7;
			font-size: 25px;
			text-align: center;
		}

		th {

			background-color: #337ab7;
			color:  white;
		}

		tr: nth-child(even) {background-color: #ededed;}
	</style>
	
</head>
<body>
	<table>
		<tr>
		<th>Count</th>
		<th>Resort</th>
		<th>Address</th>
		<th>Phone Number (+60) </th>
		<th>Ratings</th>
	</tr>

	<?php
session_start();
include "../connection.php";

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	function test_input($data) 
	{
  		$data = trim($data);
 		$data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;
	}

	$resortName = test_input($_POST['resortName']);


	if(!empty ($resortName))
	{
		$query = "SELECT resortName, address, resortPhoneNo, overallRatings FROM resorts WHERE resortName LIKE '%$resortName%'";

		$result = $conn->query($query);

		if($result->num_rows > 0){
			$row_count = 1;
  	
  		while ($search_result = $result->fetch_assoc())
  		{
  			

  			echo "<tr><td>". $row_count. "</td> <td>". $search_result["resortName"]. "</td> <td>". $search_result["address"]. "</td><td>". $search_result["resortPhoneNo"]. "</td><td>". $search_result["overallRatings"]. "</td></tr>";

  			$row_count += 1;


  		}

		} 
		else { 
  		print $conn->error;
  		echo "No related result.";
		}

	} 

	else {
		echo "Please enter a value.";
	}
}

?>


</table>
</body>
</html>

