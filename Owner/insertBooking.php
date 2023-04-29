<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php


session_start();
    include_once '../connection.php';
    include_once 'ownerNavBar.php';
    $user_id = $_SESSION['user_id'];

         if(isset($_GET['roomID']))
{ 
$roomID=$_GET['roomID'];
$fdate=$_GET['fdate'];
$tdate=$_GET['tdate'];
$resortID = $_GET['resortID'];
$bookingID = $_GET['bookingID'];
//$sysdate = date('y-m-d');
//calculate night stay
$nightStay = (strtotime($tdate) - strtotime($fdate)) / (60 * 60 * 24);


//insert new booking without total price

/*$stmt = $conn->prepare("INSERT INTO bookings (bookingDate, checkInDate, checkOutDate,  custID, resortID) VALUES (?,?,?,?,?)");
        $stmt->bind_param("ssssi", $sysdate,$fdate,$tdate, $user_id, $resortID);
        $stmt->execute();
        $success = $stmt->affected_rows;
        $stmt->close();
        if($success>0)
        {

            $bookingID = $conn->insert_id;*/

                //insert the room ID into room_booking
             /*$sql = "SELECT * FROM rooms WHERE roomID = $roomID;";
            $result = $conn->query($sql);*/
            $query = $conn->query("SELECT * FROM rooms WHERE roomID = $roomID;") or die(mysqli_error());
                        while($row = $query->fetch_array()){
                            $pricePerNight = $row['pricePerNight'];
                            $totalPrice = $pricePerNight * $nightStay;

                            //insert prices and room into bridge
                            $insert = "INSERT INTO room_booking(roomID, bookingID, prices) VALUES($roomID, $bookingID, $totalPrice)";
                            if($conn->query($insert) === true){
                            //echo "Added successfully!";
                                echo "<script>alert('Room is added to booking!');</script>";
                                echo"<meta http-equiv='refresh' content='0; url=cart.php?bookingID=$bookingID'/>";
                             }

                    else{
                            echo "<script>alert(It doesn't insert)</script>";
        }
    
           
        }
    //}

        /*else
        {
             echo "Insert to booking failed!";
         
        }*/
    }

    else{

        echo "Connection timed out!";
    }


?>