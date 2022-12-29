<?php
    session_start();
    include_once '../connection.php';
    include_once 'ownerNavBar.php';


      $user_id = $_SESSION['user_id'];
     // $role = $_SESSION['role'];

       if(isset($_POST['update_profile'])){

         $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM owner WHERE ownerID = '$user_id'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0){

            while ($row = mysqli_fetch_assoc($result)){

                $name = $row['ownerName'];
                $phone = $row['ownerPhoneNo'];
                $email = $row['ownerEmail'];
                $password = $row['accPassword'];
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


    $new_image = addslashes(file_get_contents($_FILES['update_image']['tmp_name']));

    if(empty($new_image)){

        $new_image = $image;

    }


$update_profile = "update owner set ownerName = '$new_name', ownerPhoneNo = '$new_phone', ownerEmail = '$new_email', ownerPassword = '$new_pass2', profile_image = '$new_image' WHERE ownerID = '$user_id'";

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