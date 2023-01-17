<?php
    session_start();
    include_once '../connection.php';
    include_once 'adminNavBar.php';


    $user_id = $_SESSION['user_id'];
    $username = $_POST['user'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['pass'];
    $confirmPassword = $_POST['confirmPass'];
    $role = $_SESSION['role'];

    //to prevent mysql injection

    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $name = stripcslashes($name);
    $email = stripcslashes($email);
    $phone = stripcslashes($phone);
    $confirmPassword = stripcslashes($confirmPassword);

      if(isset($_POST['add_owner'])){

                 
      if($password != $confirmPassword)
    {
        echo "<script>alert('The two passwords do not match.');</script>";
        echo"<meta http-equiv='refresh' content='0; url=updateOwner.php'/>";
    }

    else {

$sql = "CALL insertData('".$username."','".$name."','".$phone."','".$email."','".$password."')";
if (mysqli_query($conn,$sql)){

/*$stmt = $conn->prepare("INSERT INTO owner (ownerID, ownerName, ownerPhoneNo, ownerEmail, accPassword) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss", $username,$name,$phone, $email, $password);
        $stmt->execute();
        $success = $stmt->affected_rows;
        $stmt->close();
        if($success>0)
        {*/
            echo "<script>alert('Owner register succesful!');</script>";
            echo"<meta http-equiv='refresh' content='0; url=manageOwner.php'/>";
        }
        else
        {
            echo "<script>alert('Owner registration fail! Please try to register again.');</script>";
            echo"<meta http-equiv='refresh' content='0; url=manageOwner.php'/>";
        }

}


}



else {

   echo"Try again.";
}



    ?>