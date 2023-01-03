<!DOCTYPE html>
<?php
	session_start();
    include_once '../connection.php';
    include_once 'customerNavBar.php';
    $user_id = $_SESSION['user_id'];

         if(isset($_GET['bookingID']))
{ 		$bookingID = $_GET['bookingID'];

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
    <title>In cart products</title>
</head>
<body>

    <main>
        <h1><?php echo mysqli_num_rows($all_booking); ?> Room(s)</h1>
        <hr>
        <?php
          while($row_booking = mysqli_fetch_assoc($all_booking)){
              $sql = "SELECT * FROM rooms WHERE roomID=".$row_booking["roomID"];
              $sql = "SELECT r.roomID, capacity, location,description, m.prices FROM rooms r, resorts e, room_booking m WHERE r.resortID = e.resortID AND r.roomID = m.roomID AND r.resortID = '$resortID' AND m.bookingID = '$bookingID';";
              $all_rooms = $conn->query($sql);
              while($row = mysqli_fetch_assoc($all_rooms)){
        ?>
        <div class="card">
          

            <div class="caption">
                <p class="rate">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </p>
                <p class="product_name"><?php echo $row["roomID"]; ?></p>
                <p class="price"><b><?php echo $row["prices"]; ?></b></p>
                <p class="capacity"><?php echo $row["capacity"]; ?></p>
                <p class="location"><?php echo $row["location"]; ?></p>
                <p class="description"><?php echo $row["description"]; ?></p>
                <button class="remove" data-id="<?php echo $row["roomID"]; ?>">Remove from Selection</button>
            </div>

        </div>
            <a href = 'moreRooms.php'><input type = 'submit' value = 'Book More Rooms' id = 'add_button'></a>
            <br>
    		<a href = 'confirmBooking.php'><input type = 'submit' value = 'Confirm Booking' id = 'add_button'></a>
        <?php

          }
        }
       ?>
    </main>

    <script>
        var remove = document.getElementsByClassName("remove");
        for(var i = 0; i<remove.length; i++){
            remove[i].addEventListener("click",function(event){
                var target = event.target;
                var cart_id = target.getAttribute("data-id");
                var xml = new XMLHttpRequest();
                xml.onreadystatechange = function(){
                    if(this.readyState == 4 && this.status == 200){
                       target.innerHTML = this.responseText;
                       target.style.opacity = .3;
                    }
                }

                xml.open("GET","insertBooking.php?roomID="+roomID,true);
                xml.send();
            })
        }
    </script>
</body>
</html>