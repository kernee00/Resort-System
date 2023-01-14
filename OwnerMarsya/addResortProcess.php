<?php
    session_start();
    include_once '../connection.php';
    include_once 'ownerNavBar.php';


    $user_id = $_SESSION['user_id'];
 

    if($_POST['add_resort']){

 
    $name = $_POST['name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $desc = $_POST['desc'];
    $keywords = $_POST['keywords'];
    $phone = $_POST['phone'];


    $stmt = $conn->prepare("INSERT INTO resorts (resortName, address, city, state, resortPhoneNo, keywords, description, ownerID) VALUES (?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssssss", $name, $address, $city, $state, $phone, $keywords, $desc, $user_id);
        $stmt->execute();
        $success = $stmt->affected_rows;
        $stmt->close();
        if($success>0)
        {
           
            $resortID = $conn->insert_id;

               $update_image = $_FILES['resort_image']['name'];
                $update_image_size = $_FILES['resort_image']['size'];
                $update_image_tmp_name = $_FILES['resort_image']['tmp_name'];

       if(!empty($update_image)){
      if($update_image_size > 60000){
         echo "<script> alert('Image size too large!') </script>";
         //delete resort that is inserted

           $delete_resort = "delete from resorts WHERE resortID = '$resortID'";

    $run_delete = mysqli_query($conn,$delete_resort);

    if ($run_delete){

          echo"<meta http-equiv='refresh' content='0; url=addResort.php'/>";
      }
      }


      else{
         $img_ex = pathinfo($update_image, PATHINFO_EXTENSION);
         $img_ex_lc = strtolower($img_ex);

         $allowed_exs = array("jpg", "jpeg", "png");

         if(in_array($img_ex_lc,$allowed_exs)){

            $new_image = addslashes(file_get_contents($update_image_tmp_name));


            $new_resort = "update resorts set coverPhoto = '$new_image' WHERE resortID = '$resortID'";

$run_resort = mysqli_query($conn,$new_resort);

if($run_resort){

echo "<script> alert('Resort is added successfully!') </script>";

 echo"<meta http-equiv='refresh' content='0; url=manageResort.php'/>";

}
         }else{
            echo "<script> alert('Failed to update image!') </script>";
            echo"<meta http-equiv='refresh' content='0; url=addResort.php'/>";
         }
      }


}
        }
        else
        {
            die(mysqli_error($conn));
            echo "<script>alert('Failed to add resort.');</script>";
            echo"<meta http-equiv='refresh' content='0; url=addResort.php'/>";
        }


}

else {

   echo"Try again.";
}



    ?>
