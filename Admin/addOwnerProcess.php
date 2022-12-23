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
        
        //to verify admin password before add new owner
        $sql = "SELECT adminPassword FROM admin WHERE adminID = '$user_id'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0){

            while ($row = mysqli_fetch_assoc($result)){

                $admin_password = $row['adminPassword'];
         

               
            }
        }
        
        $admin_pass = $_POST['admin_pass'];

        if ($admin_pass != $admin_password) {

            echo "<script>alert('The admin password is incorrect. Please retry.');</script>";
            echo"<meta http-equiv='refresh' content='0; url=manageOwner.php'/>";
        
        }

        else {
                 
      if($password != $confirmPassword)
    {
        echo "<script>alert('The two passwords do not match.');</script>";
        echo"<meta http-equiv='refresh' content='0; url=updateOwner.php'/>";
    }

    else {


if ($role == 'owner'){

$stmt = $conn->prepare("INSERT INTO $role (ownerID, ownerName, ownerPhoneNo, ownerEmail, accPassword) VALUES (?,?,?,?,?)");
        $stmt->bind_param("ssiss", $username,$name,$phone, $email, $password);
        $stmt->execute();
        $success = $stmt->affected_rows;
        $stmt->close();
        if($success>0)
        {
            echo "<script>alert('Owner register succesful!');</script>";
            echo"<meta http-equiv='refresh' content='0; url=manageOwner.php'/>";
        }
        else
        {
            echo "<script>alert('Owner registration fail! Please try to register again.');</script>";
            echo"<meta http-equiv='refresh' content='0; url=manageOwner.php'/>";
        }

}

else if ($role == 'admin'){

$stmt = $conn->prepare("INSERT INTO $role (adminID, adminName, adminPhoneNo, adminEmail, adminPassword) VALUES (?,?,?,?,?)");
        $stmt->bind_param("ssiss", $username,$name,$phone, $email, $password);
        $stmt->execute();
        $success = $stmt->affected_rows;
        $stmt->close();
        if($success>0)
        {
            echo "<script>alert('Admin register succesful!');</script>";
            echo"<meta http-equiv='refresh' content='0; url=manageAdmin.php'/>";
        }
        else
        {
            echo "<script>alert('Admin registration fail! Please try to register again.');</script>";
            echo"<meta http-equiv='refresh' content='0; url=manageAdmin.php'/>";
        }

}
}

}
}



else {

   echo"Try again.";
}



    ?>