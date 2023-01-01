<?php
    session_start();
    include_once '../connection.php';
    include_once 'adminNavBar.php';


      $user_id = $_SESSION['user_id'];
      $owner_id = $_POST['owner_id'];

      if(isset($_POST['update_profile'])){
        $owner_id = $_POST['owner_id'];
      
 
        $sql = "SELECT * FROM owner WHERE ownerID = '$owner_id'";
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
   
        
        //to verify admin password before update
        $sql1 = "SELECT adminPassword FROM admin WHERE adminID = '$user_id'";
        $result1 = mysqli_query($conn, $sql1);
        $resultCheck1 = mysqli_num_rows($result1);

        if ($resultCheck1 > 0){

            while ($row1 = mysqli_fetch_assoc($result1)){

                $admin_password = $row1['adminPassword'];
         

               
            }
        }
        
        $admin_pass = $_POST['admin_pass'];
        //echo"$admin_password";

        if ($admin_pass != $admin_password) {

            echo "<script>alert('The admin password is incorrect. Please retry.');</script>";
            echo"<meta http-equiv='refresh' content='0; url=manageOwner.php'/>";
        
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
        echo"<meta http-equiv='refresh' content='0; url=updateOwner.php'/>";
    }

    else {


$update_profile = "update owner set ownerName = '$new_name', ownerPhoneNo = '$new_phone', ownerEmail = '$new_email', accPassword = '$new_pass2' WHERE ownerID = '$owner_id'";

$run_profile = mysqli_query($conn,$update_profile);

if($run_profile){

echo "<script> alert('Owner has been updated successfully. Redirecting to main page.') </script>";

   echo"<meta http-equiv='refresh' content='0; url=manageOwner.php'/>";

}

else {
    echo "<script> alert('Failed to update owner!') </script>";

   echo"<meta http-equiv='refresh' content='0; url=manageOwner.php'/>";

}

}
}
}


else {

   echo"Try again.";
}




    ?>