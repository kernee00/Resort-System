<?php
    session_start();
    include_once '../connection.php';
    include_once 'ownerNavBar.php';
    $user_id = $_SESSION['user_id'];

$roomID = $_GET['roomID'];

  if (isset($_GET['roomID'])){
    $roomID = $_GET['roomID'];
    //$resortID = $_POST['resortID'];
        $sql = "SELECT * FROM rooms WHERE roomID = '$roomID'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0){

            while ($row = mysqli_fetch_assoc($result)){

               $price = $row['pricePerNight'];
              $capacity = $row['capacity'];
              $location = $row['location'];
              $description = $row['description'];
             $resortID = $row['resortID'];
             $roomname = $row['roomName'];
                //$resortId = $row['resortID'];
                $onClick = "document.forms.myform.resortID.value='$resortID ';document.forms.myform.submit();";
               
            }
        }

    }

    else {

        echo "Session timed-out. Login again.";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name ="viewreport" content="width=device-width, initial-scale =1.0">
    <title>Edit Room</title>
   <link rel="stylesheet" href="../Admin/profileStyle.css">

</head>

<body>
       <div class = "update-profile">

<form action="updateRoomProcess.php" method="POST">
     
      <div class="flex">
         <div class="inputBox">
            <!--to pass resort id by POST-->
            <input type="hidden" id = "room_id" name="room_id" value="<?php echo $roomID; ?>" class="box">
            <!--input field to update resort data-->
            <span>Room Name:</span>
            <input type="text" id = "update_roomname" name="update_roomName" value="<?php echo $roomname; ?>" class="box">
            <span>Capacity:</span>
            <input type="text" id = "update_capacity" name="update_capacity" value="<?php echo $capacity; ?>" class="box">
            <span>Location:</span>
            <input type="text" id = "update_location" name="update_location" value="<?php echo $location; ?>" class="box">
           
          
             
         </div>
         <div class="inputBox">

          <span>Price:</span>
            <input type="text" id = "update_price" name="update_price" value="<?php echo $price; ?>" class="box">
               <span>Description:</span>
            <input type="text" id = "update_desc" name="update_description" value="<?php echo $description; ?>" class="box">
          
    <input type="hidden" id = "update_resortid" name="resort_id" value="<?php echo $resortID; ?>" class="box">
     
         </div>
      </div>
      <input type="submit" value="Update Room" name="update_room" class="btn">
      <a href="manageRoom.php?roomID=<?php echo $roomID; ?>">

       <a href="manageRoom.php?resortID=<?php echo $resortID; ?>" class="delete-btn"style="background-color: skyblue";>Back</a>
   </form>

</div>
</body>
</html>