<?php
//error_reporting(0);
session_start();
include_once '../../connection.php';
//include_once '../customerNavBar.php';
$user_id = $_SESSION['user_id'];

?>
<button onclick="history.back()">Back</button>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Customer Report</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
		  	
	</head>
	<body>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="navbar-header">
        
		<h4 style="padding-left: 100px;padding-top: 20px;">Dear Customer |     REPORT     |</h4>
	</div>

</nav>

<div class="container-fluid">

  
  <!--center-->
  <div class="col-sm-8">
    <div class="row">
      <div class="col-xs-12">
        <h3 style="padding-left: 100px;">Check your expenses in hotel reservation ...</h3>
		<hr >
		<form name="bwdatesdata" action="" method="post" action="">
  <table width="100%" height="117"  border="0">
<tr>
    <th width="27%" height="63" scope="row">From Date :</th>
    <td width="73%">
<input type="date" name="fdate" class="form-control" id="fdate">
    	</td>
  </tr>

  <tr>
    <th width="27%" height="63" scope="row">To Date :</th>
    <td width="73%">
    	<input type="date" name="tdate" class="form-control" id="tdate"></td>
  </tr>
  <tr>
    <th width="27%" height="63" scope="row">Request Type :</th>
    <td width="73%">
         <input type="radio" name="requesttype" value="mtwise" checked="true">Month wise
          <input type="radio" name="requesttype" value="yrwise">Year wise</td>
  </tr>
<tr>
    <th width="27%" height="63" scope="row"></th>
    <td width="73%">
    	<button class="btn-primary btn" type="submit" name="submit">Submit</button>
  </tr>
 
</table>
     </form>
 
      </div>
    </div>
    <hr>
      <div class="row">
      <div class="col-xs-12">
      	 <?php
      	 if(isset($_POST['submit']))
{ 
$fdate=$_POST['fdate'];
$tdate=$_POST['tdate'];
$rtype=$_POST['requesttype'];

 $dateTimestamp1 = strtotime($fdate);
        $dateTimestamp2 = strtotime($tdate);
        if ($dateTimestamp1 > $dateTimestamp2){

            echo "<script>alert('Unavailable date selected!');</script>";
            error_reporting(0);
            echo"<meta http-equiv='refresh' content='0; url=reportCustomer.php'/>";
        

        }



?>
<?php if($rtype=='mtwise'){
$month1=strtotime($fdate);
$month2=strtotime($tdate);
$m1=date("F",$month1);
$m2=date("F",$month2);
$y1=date("Y",$month1);
$y2=date("Y",$month2);
    ?>
        <h4 class="header-title m-t-0 m-b-30">Expenses Report Month Wise</h4>
<h4 align="center" style="color:blue">Expenses Report  from <?php echo $m1."-".$y1;?> to <?php echo $m2."-".$y2;?></h4>
		<hr >
		<div class="row">
                            <table class="table table-bordered" width="100%"  border="0" style="padding-left:40px">
                                <thead>
                                   <tr>
<th><center>No.</th>
<th><center>Month / Year </th>
<th><center>Expenses (RM)</th>
</tr>
                                </thead>
                                 <tbody>
                                <?php



$query = $conn->query("SELECT totalPayment, month(paymentDate) as lmonth, year(paymentDate) as lyear from payments where paymentDate between '$fdate' and '$tdate' group by totalPayment,lmonth,lyear and totalPayment = 'Approved';") or die(mysqli_error());


$num=mysqli_num_rows($query);
if($num>0){
$cnt=1;
$total = 0;

while ($row=$query->fetch_array()) {

?>
                               
                <tr>
                <td><center><?php echo $cnt ?></td>
                <td><center><?php echo $row['lmonth']."/".$row['lyear'] ?></td>
              <td><center><?php echo $row['totalPayment'] ?></td>
             
                    </tr>
                <?php
$cnt++;
$total = $row['totalPayment'] + $total;
}?>
<tr>
                  <td colspan="2" align="center">Total </td>
              <td><center><?php  echo $total;?></td>
                 
                </tr>             
                                </tbody>
                            </table>
                            <?php } } else {
$year1=strtotime($fdate);
$year2=strtotime($tdate);
$y1=date("Y",$year1);
$y2=date("Y",$year2);
?>
                       <h4 class="header-title m-t-0 m-b-30">Expenses Report Year Wise</h4>
<h4 align="center" style="color:blue">Sales Report  from <?php echo $y1;?> to <?php echo $y2;?></h4>
        <hr >
        <div class="row">
                            <table class="table table-bordered" width="100%"  border="0" style="padding-left:40px">
                                <thead>
                                   <tr>
<th><center>No.</th>
<th><center>Year </th>
<th><center>Expenses (RM)</th>
</tr>
</thead>

<?php
$ret=mysqli_query($conn,"SELECT totalPayment, month(paymentDate) as lmonth, year(paymentDate) as lyear from payments where paymentDate between '$fdate' and '$tdate' group by totalPayment, lmonth,lyear and totalPayment = 'Approved';");

$num=mysqli_num_rows($ret);
if($num>0){
$cnt=1;
$total = 0;
while ($row=mysqli_fetch_array($ret)) {

?>
                                <tbody>
                                    <tr>
                    <td><center><?php echo $cnt;?></td>
                  <td><center><?php  echo $row['lyear'];?></td>
              <td><center><?php  echo $row['totalPayment'];?></td>
              
             
                    </tr>
                <?php
$cnt++;
$total = $row['totalPayment'] + $total;
}?>
<tr>
                  <td colspan="2" align="center">Total </td>
              <td><center><?php  echo $total;?></td>
                 
                </tr>             
                                </tbody>
                            </table>  <?php } } }?>  
                        </div>
 
      </div>
    </div>  
   
  </div><!--/center-->

  <hr>
</div><!--/container-fluid-->
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>

