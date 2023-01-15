<?php
    session_start();
    include_once '../connection.php';
    include_once 'customerNavBar.php';


    $user_id = $_SESSION['user_id'];
 

      if(isset($_POST['add_rating'])){

    $ratingDateTime = date('y-m-d h:i:s');
    $marksRated = $_POST['rating'];
    $comments = $_POST['comments'];
    $commentsf = $_POST['commentsf'];
    $commentsc = $_POST['commentsc'];
    $bookingID = $_POST['bookingID'];
    



    //to prevent mysql injection
   $ratingDateTime = stripcslashes($ratingDateTime);
    $marksRated = stripcslashes($marksRated);
    $comments = stripcslashes($comments);

    //echo "$ratingDateTime";
    

 $stmt= $conn->prepare("INSERT INTO ratings (ratingDateTime, marksRated, comments, commentsf, commentsc, bookingID, custID) VALUES (?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssss", $ratingDateTime, $marksRated, $comments, $commentsf, $commentsc, $bookingID, $user_id);
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
