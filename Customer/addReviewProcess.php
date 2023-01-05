<?php
    session_start();
    include_once '../connection.php';
    include_once 'customerNavBar.php';


    $user_id = $_SESSION['user_id'];
 

      if(isset($_POST['add_rating'])){

    $user_id = $_SESSION['user_id'];
    $ratingID = $_POST['Rating ID'];
    $ratingDateTime = $_POST['Date'];
    $marksRated = $_POST['Rating'];
    $comments = $_POST['Comments'];
    $bookingID = $_POST['Booking ID'];
    $role = $_SESSION['role'];


    //to prevent mysql injection

    $ratingID = stripcslashes($ratingID);
    $ratingDateTime = stripcslashes($ratingDateTime);
    $marksRated = stripcslashes($marksRated);
    $comments = stripcslashes($comments);


$stmt = $conn->prepare("INSERT INTO ratings (ratingID, ratingDateTime, marksRated, comments, bookingID) VALUES (?,?,?,?,?)");
        $stmt->bind_param("ssssssbs", $ratingID, $ratingDateTime, $marksRated, $comments, $bookingID);
        $stmt->execute();
        $success = $stmt->affected_rows;
        $stmt->close();
        if($success>0)
        {
            echo "<script>alert('Your review is added succesfully!');</script>";
           echo"<meta http-equiv='refresh' content='0; url=customerHistory.php'/>";
        }
        else
        {
            echo "<script>alert('Failed to add resort.');</script>";
            echo"<meta http-equiv='refresh' content='0; url=customerHistory.php'/>";
        }


}



else {

   echo"Try again.";
}



    ?>
