
 <?php
    session_start();
    include_once '../connection.php';
    include_once 'ownerNavBar.php';

     if (isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
        $sql = "SELECT r.resortID, resortName, state, overallRatings, pricePerNight, capacity, images FROM resorts r, resort_image i WHERE r.resortID = i.resortID ;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);


    }

    else {

        echo "Session timed-out. Login again.";
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
             echo '<img src="data:image;base64,'.base64_encode($row['images']).'" alt="Image" ;">';
            ?>
      

        </div>

        <div class = "caption">
            <p class = "rate">
                <i class ="fa-solid fa-star"></i>
                <i class ="fa-solid fa-star"></i>
                <i class ="fa-solid fa-star"></i>
                <i class ="fa-solid fa-star"></i>
                <i class ="fa-solid fa-star"></i>

            </p>
            <p class="resort_name"><?php echo $row['resortName']; ?></p>
            <p class="resort_name"><?php echo $row['state']; ?></p>
            <p class = "price"><b>RM <?php echo $row['pricePerNight']; ?></b></p>
            <p class="resort_name"><?php echo $row['overallRatings'].'/5.0'; ?></p>
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