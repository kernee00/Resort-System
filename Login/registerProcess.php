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

//Get value pass from form in login.php

$username = $_POST['user'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['pass'];
$confirmPassword = $_POST['confirmPass'];
$role = $_POST['role'];

//to prevent mysql injection

$username = stripcslashes($username);
$password = stripcslashes($password);
$name = stripcslashes($name);
$email = stripcslashes($email);
$phone = stripcslashes($phone);
$confirmPassword = stripcslashes($confirmPassword);

if($password != $confirmPassword)
	{
		echo "<script>alert('The two passwords do not match');</script>";
		echo"<meta http-equiv='refresh' content='0; url=Register.php'/>";
	} else {


	if ($role == "owner")
	{
		$stmt = $conn->prepare("INSERT INTO $role (ownerID, ownerName, ownerPhoneNo, ownerEmail, accPassword) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss", $username,$name,$phone, $email, $password);
        $stmt->execute();
        $success = $stmt->affected_rows;
        $stmt->close();
		if($success>0)
		{
			echo "<script>alert('Owner register succesful! Please try to login.');</script>";
			echo"<meta http-equiv='refresh' content='0; url=loginV2.php'/>";
		}
		else
		{
			echo "<script>alert('Owner registration fail! Please try to register again.');</script>";
			echo"<meta http-equiv='refresh' content='0; url=Register.php'/>";
		}


	}

	else if ($role == "customers"){
		$stmt = $conn->prepare("INSERT INTO $role (custID, custName, phoneNo, custEmail, custPassword) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss", $username,$name,$phone, $email, $password);
        $stmt->execute();
        $success = $stmt->affected_rows;
        $stmt->close();
		if($success>0)
		{
			echo "<script>alert('Customer register succesful! Please try to login.');</script>";
			echo"<meta http-equiv='refresh' content='0; url=loginV2.php'/>";
		}
		else
		{
			echo "<script>alert('Customer registration fail! Please try to register again.');</script>";
			echo"<meta http-equiv='refresh' content='0; url=Register.php'/>";
		}


	}
	}

}

?>