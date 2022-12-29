<?php
    session_start();
    include_once '../connection.php';
    include_once 'ownerNavBar.php';


      $user_id = $_SESSION['user_id'];
     
        

      if(isset($_POST['update_resort'])){
         $resort_id = $_POST['resort_id'];
           $new_name = $_POST['update_name'];
            $new_address = $_POST['update_address'];
            $new_phone = $_POST['update_phone'];
            $rating = $_POST['ratings'];
            $new_price = $_POST['update_price'];
            $new_keywords =$_POST['update_keyword'];
            $ownerID = $_POST['ownerID'];
      
 
        $sql = "SELECT * FROM resorts WHERE resortID = '$resort_id'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0){

            while ($row = mysqli_fetch_assoc($result)){

                $name = $row['resortName'];
                $address = $row['address'];
                $phone = $row['resortPhoneNo'];
                $rating = $row['overallRatings'];
                $price = $row['pricePerNight'];
                $keywords = $row['keywords'];
                $ownerID = $row['ownerID'];

               
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
        
        // $admin_pass = $_POST['admin_pass'];
        // //echo"$admin_password";

        // if ($admin_pass != $admin_password) {

        //     echo "<script>alert('The admin password is incorrect. Please retry.');</script>";
        //     echo"<meta http-equiv='refresh' content='0; url=manageResort.php'/>";
        
        // }

       
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

         if (empty($_POST['update_phone'])) {
           $new_phone = $phone;
        }
        else{

           $new_phone = $_POST['update_phone'];
        }


         if (empty($_POST['update_price'])) {
           $new_price = $price;
        }
        else{

             $new_price = $_POST['update_price'];
        }

         if (empty($_POST['update_keyword'])) {
           $new_keywords = $keywords;
        }
        else{

             $new_keywords = $_POST['update_keyword'];
        }



$update_profile = "update resorts set resortName = '$new_name', resortPhoneNo = '$new_phone', address = '$new_address', pricePerNight = '$new_price', keywords = '$new_keywords' WHERE resortID = '$resort_id'";

$run_profile = mysqli_query($conn,$update_profile);

if($run_profile){

echo "<script> alert('Profile has been updated successfully. Redirecting to main page.') </script>";

   echo"<meta http-equiv='refresh' content='0; url=manageResort.php'/>";

}



}


else {

   echo"Try again.";
}




    ?>