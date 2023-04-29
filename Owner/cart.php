<!DOCTYPE html>
<?php
    session_start();
    include_once '../connection.php';
    include_once 'ownerNavBar.php';
    $user_id = $_SESSION['user_id'];

         if(isset($_GET['bookingID']))
{       $bookingID = $_GET['bookingID'];

      $query = $conn->query("SELECT * FROM bookings WHERE bookingID = $bookingID;") or die(mysqli_error());
                        while($row = $query->fetch_array()){

                            $fdate=$row['checkInDate'];
                            $tdate=$row['checkOutDate'];
                            $resortID = $row['resortID'];
               

        }
    
           $sql_booking = "SELECT * FROM room_booking WHERE bookingID = $bookingID";
$all_booking = $conn->query($sql_booking);

        }

else {

    echo "Passing error!";
}
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="font/css/all.min.css">
    <link rel="stylesheet" href="cart.css">
    <!--<link rel = "stylesheet" type = "text/css" href = "../css/style.css" />-->
    <title>In cart products</title>
</head>
<body>

    <main>
        <h1><?php echo mysqli_num_rows($all_booking); ?> Room(s)</h1>
        <hr>
        <br>
        <h2>Check In: <?php echo $fdate?></h2>
        <h2>Check Out: <?php echo $tdate?></h2>
        <?php
              $sql = "SELECT r.roomID, capacity, location, description, prices FROM rooms r, room_booking b WHERE r.roomID = b.roomID AND bookingID = '$bookingID';";
              $all_rooms = $conn->query($sql);
              while($row = mysqli_fetch_assoc($all_rooms)){
        ?>
        <div class="card">
          

            <div class="caption">
               
                <p class="product_name">Room ID: <?php echo $row["roomID"]; ?></p>
                <p class="price"><b>Prices: RM <?php echo $row["prices"]; ?></b></p>
                <p class="capacity">Capacity: <?php echo $row["capacity"]; ?></p>
                <p class="location">Location: <?php echo $row["location"]; ?></p>
                <p class="description">Description: <?php echo $row["description"]; ?></p>
             
                <a class = "btn btn-danger" onclick = "confirmationDelete(this); return false;" href = "removeRoom.php?roomID=<?php echo $row['roomID']?>&bookingID=<?php echo $bookingID?>"><i class = "glyphicon glyphicon-remove"></i> Remove from Booking</a>
            </div>

        </div>
            
        <?php

          }
     
       ?>
       <a href = 'moreRooms.php?bookingID=<?php echo $bookingID?>'><input type = 'submit' value = 'Book More Rooms' id = 'add_button'></a>
            <br>
            <a onclick = "confirmationBooking(this); return false;" href = 'confirmBooking.php?bookingID=<?php echo $bookingID?>&resortID=<?php echo $resortID?>'><input type = 'submit' value = 'Confirm Booking' id = 'add_button'></a>
    </main>

       <script type = "text/javascript">
    function confirmationBooking(anchor){
        var conf = confirm("Are you sure you want to place the booking?");
        if(conf){
            window.location = anchor.attr("href");
        }
    } 
</script>

   <script type = "text/javascript">
    function confirmationDelete(anchor){
        var conf = confirm("Are you sure you want to remove the room from booking?");
        if(conf){
            window.location = anchor.attr("href");
        }
    } 
</script>

</body>
</html>
