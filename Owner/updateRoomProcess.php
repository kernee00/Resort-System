<?php
    session_start();
    include_once '../connection.php';
    include_once 'ownerNavBar.php';


      $user_id = $_SESSION['user_id'];
     
       if(isset($_POST['room_id'])){
         $room_id = $_POST['room_id'];
           $new_price = (double)$_POST['update_price'];
            $new_capacity =(int) $_POST['update_capacity'];
            $new_location = $_POST['update_location'];
            $new_description = $_POST['update_description'];
            $new_roomname = $_POST['update_roomName'];
           $resortID = $_POST['resort_id'];
      
}
    



$update_profile = "update rooms set pricePerNight = '$new_price', capacity = '$new_capacity', location = '$new_location', description= '$new_description', roomName = '$new_roomname' WHERE roomID = '$room_id'";

$run_profile = mysqli_query($conn,$update_profile);

if($run_profile){

echo "<script> alert('Room has been updated successfully. Redirecting to main page.');
window.location.href='manageRoom.php?resortID=".$resortID."';
</script>";

  //echo"<meta http-equiv='refresh' content='0'; url=manageRoom.php?resortID=".$resortID."'/>";

}






else {
    die(mysqli_error($conn));

   echo"Try again.";
}


    ?>