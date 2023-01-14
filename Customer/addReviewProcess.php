<?php
    session_start();
    include_once '../connection.php';
    include_once 'customerNavBar.php';


    $user_id = $_SESSION['user_id'];
 

      if(isset($_POST['add_rating'])){

    $user_id = $_SESSION['user_id'];
    // $ratingID = $_POST['rating'];
    $ratingDateTime = date("Y/m/d");
    $marksRated = $_POST['rating'];
    $comments = $_POST['comments'];
    $commentsf = $_POST['commentsf'];
    $commentsc = $_POST['commentsc'];
    // $bookingID = $_POST['Booking ID'];
    $role = $_SESSION['role'];
    



    //to prevent mysql injection

    // $ratingID = stripcslashes($ratingID);
    $ratingDateTime = stripcslashes($ratingDateTime);
    $marksRated = stripcslashes($marksRated);
    $comments = stripcslashes($comments);


    $books = $conn->prepare("SELECT bookingID FROM bookings WHERE custID = ? LIMIT 1");
             $books->bind_param('s',$user_id);
             $books->execute();
    $resultbooks = $books->get_result();
    $valuebook = $resultbooks->fetch_array();
    $finalbook = $valuebook[0];
    // $row = mysqli_fetch_array($books);
    

 $stmt= $conn->prepare("INSERT INTO ratings (ratingDateTime, marksRated, comments, commentsf, commentsc, bookingID) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("ssssss", $ratingDateTime, $marksRated, $comments, $commentsf, $commentsc, $finalbook);
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
            echo "<script>alert('Failed to add review and ratings.');</script>";
            echo"<meta http-equiv='refresh' content='0; url=customerHistory.php'/>";
        }


}



else {

   echo"Try again.";
}



    ?>
