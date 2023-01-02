<?php
    session_start();
    include_once '../connection.php';
    include_once 'ownerNavBar.php';


    $user_id = $_SESSION['user_id'];
 

      if(isset($_POST['add_resort'])){

    $name = $_POST['name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $phone = $_POST['phone'];
    $keywords = $_POST['keywords'];
    //$update_image = $_POST['resort_image'];
 

    //to prevent mysql injection

    $name = stripcslashes($name);
    $address = stripcslashes($address);
    $city = stripcslashes($city);
    $state = stripcslashes($state);
    $phone = stripcslashes($phone);
    $keywords = stripcslashes($keywords);

        if($_FILES['resort_image']["error"] == 4){
        //use the current img
        //$new_image = $image;
        echo "Error.";

    }

    else{

    $new_image = addslashes(file_get_contents($_FILES['resort_image']['tmp_name']));
        


$stmt = $conn->prepare("INSERT INTO resorts (resortName, address, city, state, resortPhoneNo, keywords, coverPhoto, ownerID) VALUES (?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssssbs", $name, $address, $city, $state, $phone, $keywords, $new_image, $user_id);
        $stmt->execute();
        $success = $stmt->affected_rows;
        $stmt->close();
        if($success>0)
        {
            echo "<script>alert('Resort is added succesfully!');</script>";
           echo"<meta http-equiv='refresh' content='0; url=manageResort.php'/>";
        }
        else
        {
            echo "<script>alert('Failed to add resort.');</script>";
            echo"<meta http-equiv='refresh' content='0; url=manageResort.php'/>";
        }


}
}



else {

   echo"Try again.";
}



    ?>