<!DOCTYPE html>
<?php
	session_start();
    include_once '../connection.php';
    include_once 'customerNavBar.php';
    $user_id = $_SESSION['user_id'];
    $resortID = $_POST['resortID'];
  
?>
<html lang = "en">

<html lang = "en">
	<head>
		
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css " />
		<link rel = "stylesheet" type = "text/css" href = "../css/style.css" />

	<br />
 <title>Bookings</title>
    <link rel="stylesheet" href="manageStyle.css">

         <h1 style="margin-left:45% ;margin-top:80px"   class="">Rooms Available</h1>

          <form name="dateInput" action="availableRooms.php" method="post">

            <label>From: </label>
            <input type="date" name="fdate" class="form-control" id="fdate" >
             <label>To: </label>
             <input type="date" name="tdate" class="form-control" id="tdate">
             	   <br>
             <button class="btn-primary btn" type="submit" name="submit" value="<?php echo $resortID; ?>">Submit</button>
             <!--<a href = 'displayRoom1.php?resortID=<?php $resortID ?>'><input type = 'submit' value = 'Update' id = 'button'></a>-->

     </form>

     </div>
    </div>
    <br>
    <hr>
      <div class="row">
      <div class="col-xs-12">

</html>