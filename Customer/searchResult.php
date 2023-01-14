<?php 
    session_start();
    include_once '../connection.php';
    include_once 'customerNavBar.php';
    //$con = mysqli_connect("localhost","root","","workshop2");
    $user_id = $_SESSION['user_id'];

    if(isset($_GET['filtervalues']))
    {

        $filtervalues = $_GET['filtervalues'];
         $fdate = $_GET['fdate'];
        $tdate = $_GET['tdate'];
    
        $sql = "SELECT * FROM resorts WHERE CONCAT(resortName,address, state,city,keywords) LIKE '%$filtervalues%'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

       
        }

        else{

            echo "Connection timed out.";
        }
      
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name ="viewreport" content="width=device-width, initial-scale =1.0">
    <title>Main Page</title>
  <link rel="stylesheet" href="../Style/displayStyle.css">

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Funda Of Web IT</title>
</head>
<body>

    <br />
    <div class = "container-fluid">
        <div class = "panel panel-default">
            <div class = "panel-body">
                <div class = "alert alert-info">Search result : </div>
                <button onclick="history.back()"> Back</button>
                <br />


<body>

<main>

           <?php

            while ($row = mysqli_fetch_assoc($result)){

    ?>

    <div class = "card">
        <div class = "image">
             <?php
              echo '<img src="data:image;base64,'.base64_encode($row['coverPhoto']).'" alt="Image" ;">';
              ?>
        </div>

        <div class = "caption">
            <p class = "rate">
            
            </p>

            <p class="resort_name"><?php echo $row['resortName']; ?></p>
            <p class="resort_name"><?php echo $row['address']; ?></p>
            <p class="resort_name"><?php echo $row['city'] .", ". $row['state']; ?>
            <p class="resort_name"><?php echo $row['overallRatings'].'/5.0'; ?></p>
            <p class="resort_name"><?php echo $row['resortPhoneNo']; ?></p>
            
    </div>
<form action="viewResortDetails.php" method="POST">
    <br><br><br>
<input type="hidden" id = "resortID" name="resortID" value="<?php echo $row['resortID']; ?>" class="box">
<input type="hidden" id = "fdate" name="fdate" value="<?php echo $fdate ?>" class="box">
<input type="hidden" id = "tdate" name="tdate" value="<?php echo $tdate ?>" class="box">
<button class ="book" name = "submit">View</button>


</form>


</div>
<?php

}
?>


</main>


</body>
</html>
                                              