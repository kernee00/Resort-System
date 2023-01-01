<?php 
    session_start();
    include_once '../connection.php';
    include_once 'customerNavBar.php';
    //$con = mysqli_connect("localhost","root","","workshop2");
    $user_id = $_SESSION['user_id'];

    if(isset($_GET['filtervalues']))
    {

        $filtervalues = $_GET['filtervalues'];

        $sql = "SELECT * FROM resorts WHERE CONCAT(resortName,address, state,city) LIKE '%$filtervalues%'";
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

</head>

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
            <p class="resort_name"><?php echo $row['state']; ?></p>
            <p class="resort_name"><?php echo $row['overallRatings'].'/5.0'; ?></p>
              <p class="resort_name"><?php echo $row['ownerID']; ?></p>
    </div>
    <form action="updateResort.php" method="POST">
<input type="hidden" id = "resortID" name="resortID" value="<?php echo $row['resortID']; ?>" class="box">
<button class ="book">Update Details</button>


</form>


</div>
<?php

}
?>


</main>


</body>
</html>
                                              
