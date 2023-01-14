
<?php
    session_start();
    include_once '../connection.php';
    require('fpdf17/fpdf.php');
    //include_once 'customerNavBar.php';
    $user_id = $_SESSION['user_id'];
    $pType = 'online banking';
    $pStatus = 'Paid';
    $sysdate = date('y-m-d');

  if (isset($_GET['bookingID'])){
    $bookingID = $_GET['bookingID'];
    //$resortID = $_GET['resortID'];



    //$query = $conn->query("SELECT * FROM bookings b, resorts r WHERE bookingID = '$bookingID' AND r.resortID = '$resortID';") or die(mysqli_error());

    //$query = $conn->query("SELECT b.bookingDate, b.bookingID, o.roomID, r.resortName, b.checkInDate, b.checkOutDate, b.totalPrice FROM bookings b JOIN resorts r on b.resortID=r.resortID JOIN room_booking o on b.bookingID=o.bookingID WHERE b.bookingID = '$bookingID' AND r.resortID = '$resortID';") or die(mysqli_error());

   /* $query = $conn->query("SELECT p.totalPayment, p.paymentID, p.paymentDate, b.bookingID, o.roomID, r.resortName, b.checkInDate, b.checkOutDate FROM bookings b JOIN resorts r on b.resortID=r.resortID JOIN room_booking o on b.bookingID=o.bookingID JOIN payments p on p.bookingID=b.bookingID WHERE b.bookingID = '$bookingID';") or die(mysqli_error());

                        while($row = $query->fetch_array())

                        {
                            $paymentID = $row['paymentID'];
                            $paymentDate = $row['paymentDate'];
                            $bookingID = $row['bookingID'];
                            $roomID = $row['roomID'];
                            $resortName = $row['resortName'];
                            $checkInDate = $row['checkInDate'];
                            $checkOutDate = $row['checkOutDate'];
                            //$totalPrice = $row['totalPrice'];
                            $totalPayment = $row['totalPayment'];
                            
                        }  
}
    else {

        echo "Session timed-out. Login again.";
    	 }*/



/*$query=$conn->query("SELECT p.totalPayment, p.paymentID, p.paymentDate, b.bookingID, o.roomID, r.resortName, b.custID, b.checkInDate, b.checkOutDate FROM bookings b JOIN resorts r on b.resortID=r.resortID JOIN room_booking o on b.bookingID=o.bookingID JOIN payments p on p.bookingID=b.bookingID WHERE b.bookingID = '$bookingID';")
while ($data=mysqli_fetch_array($query)) {*/

/*	$query = $con->query("SELECT p.totalPayment, p.paymentID, p.paymentDate, b.bookingID, o.roomID, r.resortName, b.checkInDate, b.checkOutDate FROM bookings b JOIN resorts r on b.resortID=r.resortID JOIN room_booking o on b.bookingID=o.bookingID JOIN payments p on p.bookingID=b.bookingID WHERE b.bookingID = '$bookingID';") or die(mysqli_error());

                        while($row = $query->fetch_array())

$query=mysqli_query($con,"select * from invoice inner join clients using(clientID) where invoiceID = '".$_GET['invoiceID']."'");
$invoice=mysqli_fetch_array($query);
*/
$query=mysqli_query($con,"SELECT p.totalPayment, p.paymentID, p.paymentDate, b.bookingID, o.roomID, r.resortName, b.checkInDate, b.checkOutDate FROM bookings b JOIN resorts r on b.resortID=r.resortID JOIN room_booking o on b.bookingID=o.bookingID JOIN payments p on p.bookingID=b.bookingID WHERE b.bookingID = '".$_GET['bookingID']."'");
$invoice=mysqli_fetch_array($query);



$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();;
$sysdate = date('y-m-d');

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//Cell(width , height , text , border , end line , [align] )
$pdf->Cell(130	,5,'RESORT RESERVATION SDN.BHD',0,0);
$pdf->Cell(59	,5,'RECEIPT',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130	,5, '' ,0,0);
$pdf->Cell(59	,5,'',0,1);//end of line

$pdf->Cell(130	,5,'[Kuala Lumpur, Malaysia, 54200]',0,0);
$pdf->Cell(25	,5,'Date',0,0);
$pdf->Cell(34	,5,$sysdate,0,1);//end of line

$pdf->Cell(130	,5,'Phone [+03343208]',0,0);
$pdf->Cell(25	,5,'Receipt #',0,0);
$pdf->Cell(34	,5,'[12220618]',0,1);//end of line

$pdf->Cell(130	,5,'Fax [+12345678]',0,0);
$pdf->Cell(25	,5,'Customer ID',0,0);

$pdf->Cell(34	,5,$query['$user_id'],0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',12);
//billing address
$pdf->Cell(100	,5,'        Booking confirmation Details:',0,1);//end of line


//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,'[Name]     : $custName',0,1);
//$pdf->Cell(0	,5,'customerName',0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,'[Email]     : $custEmail ',0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,'[Phone]    : $custPhoneNo',0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);
$pdf->Cell(70	,5,'Resort Name',1,0);
//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);
$pdf->Cell(110	,5,'$Bunga Cengkih Resort',1,1);//end of line

$pdf->SetFont('Arial','B',12);
$pdf->Cell(70	,5,'Booking ID',1,0);
//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);
$pdf->Cell(110	,5,'$BookingID',1,1);//end of line

$pdf->SetFont('Arial','B',12);
$pdf->Cell(70	,5,'Booking Date',1,0);
//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);
$pdf->Cell(110	,5,'$bookingDate',1,1);//end of line

$pdf->SetFont('Arial','B',12);
$pdf->Cell(70	,5,'Check In Date',1,0);
//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);
$pdf->Cell(110	,5,'$CheckInDate',1,1);//end of line

$pdf->SetFont('Arial','B',12);
$pdf->Cell(70	,5,'Check Out Date',1,0);
//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);
$pdf->Cell(110	,5,'$CheckOutDate',1,1);//end of line

$pdf->SetFont('Arial','B',12);
$pdf->Cell(70	,5,'Room ID',1,0);
//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);
$pdf->Cell(110	,5,'$roomID , $roomID',1,1);//end of line


//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//summary
$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'subTotal',0,0);
$pdf->Cell(4	,5,'',1,0);
$pdf->Cell(30	,5,'$totalPrice',1,1,'R');//end of line

$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Tax Rate',0,0);
$pdf->Cell(4	,5,'',1,0);
$pdf->Cell(30	,5,'10%',1,1,'R');//end of line

$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Total Due',0,0);
$pdf->Cell(4	,5,'',1,0);
$pdf->Cell(30	,5,'$totalPayment',1,1,'R');//end of line


$pdf->Output();

}

?>
