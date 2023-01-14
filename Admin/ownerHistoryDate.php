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
		
		<link rel = "stylesheet" type = "text/css" href = "../css/style.css" />

	<br />
 <title>Owner Payment History</title>
    <link rel="stylesheet" href="manageStyle.css">

         <h1 style="margin-left:40% ;margin-top:50px"   class="">Owner Payment History</h1>
         <br><br>
     <div class ="insert-date" style="margin-left: 30%;">
          <form name="dateInput" action="ownerPaymentHistory.php" method="post" action="">
          	

             <table width="100%" height="117"  border="0">
      <tr>
      <th width="27%" height="63" scope="row">From:</th>
      <td width="73%">
      <input type="date" name="fdate" class="form-control" id="fdate" required>
      </td>
      </tr>
      <tr>
      <th width="27%" height="63" scope="row">To:</th>
      <td width="73%">
      <input type="date" name="tdate" class="form-control" id="tdate" required></td>
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
    <br>
    <hr>
      <div class="row">
      <div class="col-xs-12">


</body>

</html>