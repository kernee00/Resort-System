<?php
    session_start();
    include_once '../connection.php';
    include_once 'customerNavBar.php';


      $user_id = $_SESSION['user_id'];
      $role = $_SESSION['role'];

       if(isset($_POST['update_profile'])){

         $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM customers WHERE custID = '$user_id'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0){

            while ($row = mysqli_fetch_assoc($result)){

                $name = $row['custName'];
                $phone = $row['phoneNo'];
                $email = $row['custEmail'];
                $password = $row['custPassword'];

               
            }
        }
   
        $current_pass = $_POST['update_pass'];
        

                 if (empty($_POST['update_name'])) {
           $new_name = $name;
        }
        else{

            $new_name = $_POST['update_name'];
        }
    if (empty($_POST['update_email'])) {
           $new_email = $email;
        }
        else{

            $new_email = $_POST['update_email'];
        }

         if (empty($_POST['update_phone'])) {
           $new_phone = $phone;
        }
        else{

           $new_phone = $_POST['update_phone'];
        }


         if (empty($_POST['pass1'])) {
           $new_pass1 = $password;
        }
        else{

             $new_pass1 = $_POST['pass1'];
        }

         if (empty($_POST['pass2'])) {
           $new_pass2 = $password;
        }
        else{

             $new_pass2 = $_POST['pass2'];
        }


      if($new_pass2 != $new_pass1)
    {
        echo "<script>alert('The two passwords do not match.');</script>";
        echo"<meta http-equiv='refresh' content='0; url=updateProfile.php'/>";
    }
else {



    $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];

       if(!empty($update_image)){
      if($update_image_size > 60000){
         echo "<script> alert('Image size too large!') </script>";
          echo"<meta http-equiv='refresh' content='0; url=updateProfile.php'/>";
      }

      else{
         $img_ex = pathinfo($update_image, PATHINFO_EXTENSION);
         $img_ex_lc = strtolower($img_ex);

         $allowed_exs = array("jpg", "jpeg", "png");

         if(in_array($img_ex_lc,$allowed_exs)){

            $new_image = addslashes(file_get_contents($update_image_tmp_name));


            $update_profile = "update customers set custName = '$new_name', phoneNo = '$new_phone', custEmail = '$new_email', custPassword = '$new_pass2', profile_image = '$new_image' WHERE custID = '$user_id'";

$run_profile = mysqli_query($conn,$update_profile);

if($run_profile){

echo "<script> alert('Profile has been updated successfully. Redirecting to main page.') </script>";

 echo"<meta http-equiv='refresh' content='0; url=customerMain.php'/>";

}
         }else{
            echo "<script> alert('Failed to update image!') </script>";
            echo"<meta http-equiv='refresh' content='0; url=updateProfile.php'/>";
         }
      }


}

else {

            $update_profile = "update customers set custName = '$new_name', phoneNo = '$new_phone', custEmail = '$new_email', custPassword = '$new_pass2' WHERE custID = '$user_id'";

$run_profile = mysqli_query($conn,$update_profile);

if($run_profile){

echo "<script> alert('Profile has been updated successfully. Redirecting to main page.') </script>";

 echo"<meta http-equiv='refresh' content='0; url=customerMain.php'/>";

}
}
}
}


else {

   echo"Try again.";
}




    ?>