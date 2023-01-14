<!DOCTYPE html>
<?php
  session_start();
    include_once '../connection.php';
    include_once 'ownerNavBar.php';
    $user_id = $_SESSION['user_id'];

  
?>
<html lang = "en">

<html lang = "en">
  <head>
  	<meta charset = "utf-8" />
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
    <link rel = "stylesheet" type = "text/css" href = "../Style/bootstrap.css " />
    <link rel = "stylesheet" type = "text/css" href = "../css/style.css" />
    <link rel="stylesheet" href="../Admin/profileStyle.css">


<title>Booking by Owner</title>
    <link rel="stylesheet" href="manageStyle.css">

<div class = "container">
	 <h1 style="margin-left:40% ;margin-top:80px"   class="">Booking by Owner</h1>

    <label>From: </label>
            <input type="date" name="fdate" class="form-control" id="fdate" >
             <label>To: </label>
             <input type="date" name="tdate" class="form-control" id="tdate">
                 <br>
                 <center>
             <button  type="submit" name="submit">Submit</button>
             <br> </br>
              <a href="manageReservation.php" class="delete-btn" style="background-color: skyblue;">Back</a>

         </center>
     </div>
 </head>
 </html>
 </html>
