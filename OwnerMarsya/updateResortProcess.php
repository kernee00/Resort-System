<?php
    session_start();
    include_once '../connection.php';
    include_once 'ownerNavBar.php';


      $user_id = $_SESSION['user_id'];
     
      if(isset($_POST['update_resort'])){

         $resort_id = $_POST['resort_id'];
         /*  $new_name = $_POST['update_name'];
            $new_address = $_POST['update_address'];
            $new_city = $_POST['update_city'];
            $new_state = $_POST['update_state'];
            $new_phone = $_POST['update_phone'];
            $new_keywords =$_POST['update_keyword'];
             $new_desc =$_POST['update_desc'];*/
          
      
 
        $sql = "SELECT * FROM resorts WHERE resortID = '$resort_id'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0){

            while ($row = mysqli_fetch_assoc($result)){

                $name = $row['resortName'];
                $address = $row['address'];
                $city = $row['city'];
                $state = $row['state'];
                $phone = $row['resortPhoneNo'];
                $keywords = $row['keywords'];
                 $desc = $row['description'];
           

               
            }
        }
   
        
      
      
                 if (empty($_POST['update_name'])) {
           $new_name = $name;
            }
        else{

            $new_name = $_POST['update_name'];
        }
    if (empty($_POST['update_address'])) {
           $new_address = $address;
        }
        else{

            $new_address = $_POST['update_address'];
        }

         if (empty($_POST['update_city'])) {
           $new_city = $city;
        }
        else{

           $new_city = $_POST['update_city'];
        }

         if (empty($_POST['update_state'])) {
           $new_state = $state;
        }
        else{

           $new_state = $_POST['update_state'];
        }

         if (empty($_POST['update_phone'])) {
           $new_phone = $phone;
        }
        else{

           $new_phone = $_POST['update_phone'];
        }


         if (empty($_POST['update_keyword'])) {
           $new_keywords = $keywords;
        }
        else{

             $new_keywords = $_POST['update_keyword'];
        }


                 if (empty($_POST['update_deesc'])) {
           $new_desc = $desc;
            }
        else{

            $new_desc = $_POST['update_desc'];
        }


    $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];

       if(!empty($update_image)){
      if($update_image_size > 60000){
         echo "<script> alert('Image size too large!') </script>";
          echo"<meta http-equiv='refresh' content='0; url=updateResort.php'/>";
      }

      else{
         $img_ex = pathinfo($update_image, PATHINFO_EXTENSION);
         $img_ex_lc = strtolower($img_ex);

         $allowed_exs = array("jpg", "jpeg", "png");

         if(in_array($img_ex_lc,$allowed_exs)){

            $new_image = addslashes(file_get_contents($update_image_tmp_name));


            $update_resort = "update resorts set resortName = '$new_name', resortPhoneNo = '$new_phone', address = '$new_address', city = '$new_city', state = '$new_state', keywords = '$new_keywords', description = '$desc', coverPhoto = '$new_image' WHERE resortID = '$resort_id'";

$run_resort = mysqli_query($conn,$update_resort);

if($run_resort){

echo "<script> alert('Resort has been updated successfully. Redirecting to main page.') </script>";

 echo"<meta http-equiv='refresh' content='0; url=manageResort.php'/>";

}
         }else{
            echo "<script> alert('Failed to update image!') </script>";
            echo"<meta http-equiv='refresh' content='0; url=updateResort.php'/>";
         }
      }


}

else {

            $update_resort = "update resorts set resortName = '$new_name', resortPhoneNo = '$new_phone', address = '$new_address', city = '$new_city', state = '$new_state', keywords = '$new_keywords', description = '$desc' WHERE resortID = '$resort_id'";

$run_resort = mysqli_query($conn,$update_resort);

if($run_resort){

echo "<script> alert('Resort has been updated successfully. Redirecting to main page.') </script>";

 echo"<meta http-equiv='refresh' content='0; url=manageResort.php'/>";

}
}

/*$update_profile = "update resorts set resortName = '$new_name', resortPhoneNo = '$new_phone', address = '$new_address', city = '$new_city', state = '$new_state', keywords = '$new_keywords', description = '$desc' WHERE resortID = '$resort_id'";

$run_profile = mysqli_query($conn,$update_profile);

if($run_profile){

echo "<script> alert('Resort has been updated successfully. Redirecting to main page.') </script>";

   echo"<meta http-equiv='refresh' content='0; url=manageResort.php'/>";

}*/



}


else {

   echo"Try again.";
}


    ?>