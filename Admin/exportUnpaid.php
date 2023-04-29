<?php  
//export.php  
session_start();
    include_once '../connection.php';

$output = '';

if(isset($_SESSION["user_id"])){


     $user_id = $_SESSION['user_id'];
 $query = "SELECT * FROM bookings b, payments p, adminPayment a, resorts r WHERE p.bookingID = b.bookingID AND a.bookingID = p.bookingID AND b.resortID = r.resortID AND payOwnerStatus = 'Unpaid';";
 $result = mysqli_query($conn, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Owner ID</th>  
                         <th>Booking ID</th>  
                         <th>Resort ID</th> 
                         <th>Resort Name</th> 
                         <th>Date</th>
                         <th>Amount</th>
                         <th>Status</th>


    
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["ownerID"].'</td>  
                         <td>'.$row["bookingID"].'</td>  
                         <td>'.$row["resortID"].'</td>  
                         <td>'.$row["resortName"].'</td>  
                         <td>'.$row["adminPaymentDate"].'</td>  
                         <td>'.$row["totalPrice"].'</td>  
                         <td>'.$row["payOwnerStatus"].'</td>  
     
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }

 else {


               echo "<script>alert('There is no unpaid amount to be export!');</script>";
               echo"<meta http-equiv='refresh' content='0; url=manageOwnerPayment.php'/>";
 }
}
?>