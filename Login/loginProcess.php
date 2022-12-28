<?php
session_start();
include "../connection.php";

//Get value pass from form in login.php
$username = $_POST['user'];
$password = $_POST['pass'];

//to prevent mysql injection

$username = stripcslashes($username);
$password = stripcslashes($password);

$ownerLogin = "select * from owner where ownerID = '$username' and accPassword = '$password'";
$result = mysqli_query($conn, $ownerLogin) or die(mysqli_error($conn));

			$row = mysqli_fetch_array($result);

			//if owner table matched
			if ($row['ownerID'] == $username && $row['accPassword'] == $password) {

				echo "Login success! Welcome ".$row['ownerName']."!";
				$_SESSION['role'] = "owner";
				$_SESSION['user_id'] = $username;
				//$role = "owner";
				//$user_id = $row['ownerID'];
				header("location:../Owner/ownerMain.php");
			} else  {

				//echo "Failed to login!";
				$custLogin = "select * from customers where custID = '$username' and custPassword = '$password'";
				$result = mysqli_query($conn, $custLogin) or die(mysqli_error($conn));


			$row = mysqli_fetch_array($result);

			//if owner not match, select from customer table

			if ($row['custID'] == $username && $row['custPassword'] == $password) {

				echo "Login success! Welcome ".$row['custName']."!";
				$_SESSION['role'] = "cust";
				$_SESSION['user_id'] = $username;
				//$role = "customer";
				//$user_id = $row['custID'];
				header("location:../Admin/adminMain.php");
			}

			else {

				$adminLogin = "select * from admin where adminID = '$username' and adminPassword = '$password'";
				$result = mysqli_query($conn, $adminLogin) or die(mysqli_error($conn));


			$row = mysqli_fetch_array($result);

			//if all not matched then select from admin table

			if ($row['adminID'] == $username && $row['adminPassword'] == $password) {

				echo "Login success! Welcome ".$row['adminName']."!";
				$_SESSION['role'] = "admin";
				$_SESSION['user_id'] = $username;
				header("location:../Admin/adminMain.php");
				exit();
						
			}

			else {

				echo "Failed to login! Register before login!";
				 echo"<meta http-equiv='refresh' content='0; url=loginV2.php'/>";
			}

			}

			}

		

?>