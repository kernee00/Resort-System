<?php
    session_start();
    include_once '../connection.php';
    include_once 'ownerNavBar.php';


    $user_id = $_SESSION['user_id'];
 

    if($_POST){

    $price = $_POST['price'];
    $capacity = $_POST['capacity'];
    $location = $_POST['location'];
    $desc = $_POST['desc'];
    $resortID = $_GET['resortID'];
    $roomname = $_POST['roomname'];
    //$update_image = $_POST['resort_image'];

    //to prevent mysql injection
/*$price = stripcslashes($price);
    $capacity = stripcslashes($capacity);
    $location = stripcslashes($location);
    $desc = stripcslashes($desc);
    $resortID = stripcslashes($resortID);*/
    
        

    // $query = "INSERT INTO rooms (pricePerNight, capacity, location, description, resortID) VALUES ('$price', '$capacity', '$location', '$desc', '$resortID')";
    // $result = mysqli_connect($conn, $query);

    $stmt = $conn->prepare("INSERT INTO rooms (pricePerNight, capacity, location, description, resortID, roomName) VALUES ('$price', '$capacity', '$location', '$desc', '$resortID', '$roomname')");

        // $stmt->bind_param('$price', '$capacity', '$location', '$desc', '$resortID');
        $stmt->execute();
        $success = $stmt->affected_rows;
        $stmt->close();
        if($success == true)
        {
            echo "<script>alert('Room is added succesfully!');</script>";
            echo"<meta http-equiv='refresh' content='0; url=manageRoom.php?resortID=".$resortID."'/>";
        }
        else
        {
            die(mysqli_error($conn));
            // echo "<script>alert('Failed to add room.');</script>";
            // echo"<meta http-equiv='refresh' content='0; url=manageResort.php'/>";
        }


}

else {

   echo"Try again.";
}



    ?>