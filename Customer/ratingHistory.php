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

<?php

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
                <div class = "alert alert-info">Customer Rating History</div>


</head>

<body>
     <div class = "update-profile">

<form action="" method="POST">
     
      <div class="flex">
         <div class="inputBox">
         
            <span>Rating Marks:</span>
            <input name="ratinghis" type="number" min="1" max="5" placeholder="Rating (1-5)" required>
            

         </div>

      </div>
      <input type="submit" value="Check" name="rating_history" class="btn">
      <a href="customerHistory.php" class="btn">Back</a>
   </form>
                    </tbody>
                </table>


            </div>
        </div>
    </div>
    <br />
    <br />
    <?php
    include('ratingHistoryProcess.php');
    ?>
    <?php
    if(isset($valuebook)>0)
    {
    ?>
    <table border="1" cellspacing="0" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Date Time</th>
        <th>Ratings</th>
        <th>Comments</th>
        <th>Booking ID</th>
    </tr>
    <?php
       if(count($valuebook)>0)
       {
    foreach ($valuebook as $valuebook) {
     ?>
<tr>
    <td><?php echo $valuebook['ratingID']; ?></td>
    <td><?php echo $valuebook['ratingDateTime']; ?></td>
    <td><?php echo $valuebook['marksRated']; ?></td>
    <td><?php echo $valuebook['comments']; ?></td>
    <td><?php echo $valuebook['bookingID']; ?></td>
</tr>
     <?php
   }
}else{
    echo "<tr><td colspan='3'>No Data Found</td></tr>";
}
?>
</table>
<?php
}
?>




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