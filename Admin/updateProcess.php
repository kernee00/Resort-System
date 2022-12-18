<?php
    session_start();
    include_once '../connection.php';
    include_once 'adminNavBar.php';


      $user_id = $_SESSION['user_id'];
      $role = $_SESSION['role'];

       if(isset($_POST['update_profile'])){

         $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM admin WHERE adminID = '$user_id'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0){

            while ($row = mysqli_fetch_assoc($result)){

                $name = $row['adminName'];
                $phone = $row['adminPhoneNo'];
                $email = $row['adminEmail'];
                $password = $row['adminPassword'];
                $image = $row['profile_image'];

               
            }
        }
   
        $current_pass = $_POST['update_pass'];
        

        if ($current_pass != $password) {

            echo "<script>alert('The current password is incorrect. Please retry.');</script>";
            echo"<meta http-equiv='refresh' content='0; url=updateProfile.php'/>";
        
        }

        else {
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

      /*$new_image = $_FILES['profile_image']['name'];
      $temp_name = $_FILES['profile_image']['tmp_name'];

        //$target = "Profile Image/".basename($new_image);


   

    //move_uploaded_file($_FILES['profile_image']['tmp_name'],$target);
    move_uploaded_file($temp_name,"Profile Image/$new_image");*/

    $new_image = addslashes(file_get_contents($_FILES['update_image']['tmp_name']));

     if(empty($new_image)){

        $new_image = $image;
    

    }


$update_profile = "update admin set adminName = '$new_name', adminPhoneNo = '$new_phone', adminEmail = '$new_email', adminPassword = '$new_pass2', profile_image = '$new_image' WHERE adminID = '$user_id'";

$run_profile = mysqli_query($conn,$update_profile);

if($run_profile){

echo "<script> alert('Profile has been updated successfully. Redirecting to main page.') </script>";

   echo"<meta http-equiv='refresh' content='0; url=adminMain.php'/>";

}

}
}
}

else {

   echo"Try again.";
}




    ?>