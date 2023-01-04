 <?php
    session_start();
    include_once '../connection.php';
    include_once 'customerNavBar.php';
    //include_once 'searchNav.css';

     if (isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    //$sql = "SELECT r.resortID, resortName, address, city, state, resortPhoneNo, overallRatings, images FROM resorts r, resort_image i WHERE r.resortID = i.resortID ;";

    $sql = "SELECT resortID, resortName, address, city, state, resortPhoneNo, overallRatings, coverPhoto FROM resorts;";

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

  //search bar html
  <div class="topnav">
  <input type="text" placeholder="Search..">
  <link rel="stylesheet" href="searchNav.css">
</div>



</div>

</head>

<body>

<main>

           <?php

            while ($row = mysqli_fetch_assoc($result)){

    ?>

    <div class = "card">
        <div class = "cover">
            <?php 
             echo '<img src="data:image;base64,'.base64_encode($row['images']).'" alt="coverPhoto" ;">';
             //echo '<img src="data:image;base64,'.base64_encode($row['coverPhoto']).'" alt="Image" ;">';
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
            <p class="resort_name"><?php echo $row['address'].' , ';?>
				<!-- <p class="resort_name"><?php echo $row['city'].' , ';?> -->
            <p class="resort_name"><?php echo $row['state']; ?></p>
            <p class="resort_name"><?php echo $row['resortPhoneNo']; ?></p>
            <p class="resort_name"><?php echo $row['overallRatings'].'/5.0'; ?></p>

    </div>
    <form action="custBooking.php" method="POST">
<input type="hidden" id = "resortID" name="resortID" value="<?php echo $row['resortID']; ?>" class="box">
<button class ="book">view</button>
</form>

</div>

<?php

}
?>
</main>


</body>
</html>