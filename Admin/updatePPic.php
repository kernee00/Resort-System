<?php
    session_start();
    include_once '../connection.php';
    include_once 'adminNavBar.php';


      //$user_id = $_SESSION['user_id'];
      $role = $_SESSION['role'];

       if(isset($_SESSION['user_id'])){

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
                //$image = $row['profile_image'];

               
            }
        }



    $new_image = addslashes(file_get_contents($_FILES['update_image']['tmp_name']));

    $update_profile = "update admin set profile_image = '$new_image' WHERE adminID = '$user_id'";

$run_profile = mysqli_query($conn,$update_profile);

if($run_profile){

echo "<script> alert('Profile has been updated successfully. Redirecting to main page.') </script>";

   echo"<meta http-equiv='refresh' content='0; url=adminMain.php'/>";

}
    

   

}


else {

   echo"Try again.";
}




    ?>