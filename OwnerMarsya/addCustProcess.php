<?php
    session_start();
    include_once '../connection.php';
    include_once 'ownerNavBar.php';


    $user_id = $_SESSION['user_id'];
    $username = $_POST['user'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['pass'];
    $fdate = $_POST['fdate'];
    $tdate = $_POST['tdate'];

    //to prevent mysql injection

    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $name = stripcslashes($name);
    $email = stripcslashes($email);
    $phone = stripcslashes($phone);
    $password = stripcslashes($password);

      if(isset($_POST['add_cust'])){
        

$stmt = $conn->prepare("INSERT INTO customers (custID, custName, phoneNo, custEmail, custPassword) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss", $username,$name,$phone, $email, $password);
        $stmt->execute();
        $success = $stmt->affected_rows;
        $stmt->close();
        if($success>0)
        {
            echo "<script>alert('Customer info added successfully!');</script>";
            echo"<meta http-equiv='refresh' content='0; url=selectResort.php?fdate=$fdate&tdate=$tdate&custID=$username'/>";
        }
        else
        {
            echo "<script>alert('Failed to add customer info! Please try again.');</script>";
            echo"<meta http-equiv='refresh' content='0; url=custInfo.php'/>";
        }






}


else {

   echo"Try again.";
}



    ?>