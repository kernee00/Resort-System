<!DOCTYPE html>
<?php
    session_start();
    include_once '../connection.php';
    include_once 'customerNavBar.php';
    $user_id = $_SESSION['user_id'];

    if (isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    $fdate=$_POST['fdate'];
    $tdate=$_POST['tdate'];
    $resortID = $_POST['resortID'];
 
        $sql = "SELECT * FROM resorts r, resort_image i WHERE r.resortID = i.resortID AND r.resortID = '$resortID';";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0){

            while ($row = mysqli_fetch_assoc($result)){

                $name = $row['resortName'];
                $address = $row['address'];
                $city = $row['city'];
                $state = $row['state'];
                $phone = $row['resortPhoneNo'];
                $ratings = $row['overallRatings'];
                $keywords = $row['keywords'];
                $description = $row['description'];
                $coverPhoto = $row['coverPhoto'];
                $images = $row['images'];         
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Image Slider</title>
   <!-- <link rel="stylesheet" href="slides.css">-->
     <link rel="stylesheet" href="../css/details.css">
  </head>
  <body>

    


        
          <?php echo '<img src="../Owner/upload/' . $row['images'] . '"width="250" height = "250" />'?>


      <?php
            }
        }
    }

        ?>

        <div class = "details">
            <form action="availableRooms.php" method="POST" >
     
      <div class="flex">
         <div class="inputBox">



            <br> <br>

            <!-- <center><span>Name:</span> -->
            <strong><center><label ><?php echo $name; ?></label></strong><p>

                <br> <br>

            <center><span>Address:</span>
            <label ><?php echo $address; ?></label><p>

            <center><span>City:</span>
            <label ><?php echo $city; ?></label><p>

            <center><span>State:</span>
            <label ><?php echo $state; ?></label><p>
      
            <center><span>Phone Number:</span>
            <label ><?php echo $phone; ?></label><p>

              <center><span>Ratings:</span>
            <label ><?php echo $ratings; ?></label><p>
         
             <center><span>Keywords:</span>
               <label ><?php echo $keywords; ?></label><p>

               <center><span>Description:</span>
              <label ><?php echo $description; ?></label><p>

              <!--pass value-->
                <input type="hidden" id = "resortID" name="resortID" value="<?php echo $resortID; ?>" class="box">
                <input type="hidden" id = "fdate" name="fdate" value="<?php echo $fdate ?>" class="box">
                <input type="hidden" id = "tdate" name="tdate" value="<?php echo $tdate ?>" class="box">
   
          
       
         </div>
   
      </div>
      <br> <br>
      <center><input type="submit" value="Book Now" name="submit" class="btn">
       <!--<a href="updatePPic.php" class="delete-btn">Back</a>-->
       <input type="button" value="Back" onclick="history.back()">
 
   </form>

        </div>



  </body>
</html>
