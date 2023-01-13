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
$sysdate = date('y-m-d');
//$tPayment = POST['tPayment'];
$tPayment = '10';
$pType = 'online banking';
$pStatus = 'Paid';
$bookingID = $_POST['bookingID'];

$stmt = $conn->prepare("INSERT INTO payments (totalPayment, paymentDate, paymentType, paymentStatus, bookingID) VALUES (?,?,?,?,?)");
        $stmt->bind_param("ssssi", $tPayment,$sysdate,$pType, $pStatus, $bookingID);
        $stmt->execute();
        $success = $stmt->affected_rows;
        $stmt->close();
        if($success>0)
        {

            $bookingID = $conn->insert_id;
            }

            else {

            	echo "Failed to book!";
            }
?>