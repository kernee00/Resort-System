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
            <input name="ratinghis" type="number" min="1" max="5" step=".01" placeholder="Rating (1-5)" required>
            

         </div>

      </div>
      <input type="submit" value="Check" name="rating_history" class="btn">
      <a href="bookingMain.php" class="btn">Back</a>
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
    <table id = "table" class = "table table-bordered">
    <thead>
    <tr>
        <th>Resort Name</th>
        <th>Overall Ratings</th>
        <th>Resort Address</th>
        <th>City</th>
        <th>State</th>
        <th>Phone Number of the Resort</th>

    </tr>
    <?php
       if(count($valuebook)>0)
       {
    foreach ($valuebook as $valuebook) {
     ?>
<tr>
    <td><?php echo $valuebook['resortName']; ?></td>
    <td><?php echo $valuebook['overallRatings']; ?></td>
    <td><?php echo $valuebook['address']; ?></td>
    <td><?php echo $valuebook['city']; ?></td>
    <td><?php echo $valuebook['state']; ?></td>
    <td><?php echo $valuebook['resortPhoneNo']; ?></td>

</tr>
     <?php
   }
}else{
    echo "<tr><td colspan='3'>Please enter another value</td></tr>";
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
