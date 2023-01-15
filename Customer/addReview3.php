<?php
    session_start();
    include_once '../connection.php';
    include_once 'customerNavBar.php';

   if (isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    $role = $_SESSION['role'];

    }

    else {

        echo "Session timed-out. Login again.";
    }

?>


<!DOCTYPE html>
<html lang="en">

<html lang = "en">
<head>
    <meta charset="UTF-8">
    <meta name ="viewreport" content="width=device-width, initial-scale =1.0">
        <link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css " />
        <link rel = "stylesheet" type = "text/css" href = "../css/style.css" />

    <br />
    <div class = "container-fluid">
        <div class = "panel panel-default">
            <div class = "panel-body">
                <div class = "alert alert-info">Customer Rating and Review</div>


</head>

<body>
     <div class = "update-profile">

<form action="addReviewProcess.php" method="POST">
     
      <div class="flex">
         <div class="inputBox">


            <label> <br>
            <span>Rating Marks:</span>
            <input name="rating" type="number" min="1" max="5" placeholder="Rating (1-5)" required> </label>
            
            <br>
            <br><label>
            <span>Comment on Service:</span>
            <input name="comments" type="text" placeholder="Comments:" required></label>

            <br>
            <br><label>
            <span>Comment on Facilities:</span>
            <input name="commentsf" type="text" placeholder="Comments:" required></label>

            <br>
            <br><label>
            <span>Comment on Cleanliness:</span>
            <input name="commentsc" type="text" placeholder="Comments:" required></label>

         </div>

      </div>
      <br>
      <input type="submit" value="Add" name="add_rating" class="btn">
      <a href="customerHistory.php" class="btn">Back</a>
   </form>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br />
    <br />
    <div style = "text-align:right; margin-right:10px;" class = "navbar navbar-default navbar-fixed-bottom">
        <label>&copy; workshop 2 </label>
    </div>
</body>
<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>
<script src = "../js/jquery.dataTables.js"></script>
<script src = "../js/dataTables.bootstrap.js"></script> 
<script type = "text/javascript">
</script>
</html>