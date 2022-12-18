<?php
    session_start();
    include_once '../connection.php';
    include_once 'adminNavBar.php';

      $user_id = $_SESSION['user_id'];
      $role = $_SESSION['role'];

      
if (isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM admin WHERE adminID = '$user_id'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0){

            while ($row = mysqli_fetch_assoc($result)){
      
                $old_name = $row['adminName'];
           
            }
        }
    

   

    }

    else {

        echo "Session timed-out. Login again.";
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name ="viewreport" content="width=device-width, initial-scale =1.0">
    <title>Admin Main</title>
    <link rel="stylesheet" href="adminStyle.css">

</head>

<body>

    <div class="update">

        <form action ="../Login/updateProcess.php" class = "updateName" method="POST">
            <label>Current username: </label>
            <label><?php echo "$old_name"; ?></label>
           <input type ="text" class ='input-field' placeholder = 'Enter New Username' required id = "new_name" name = "new_name" />
                    
                        
                            <button type ='submit' class = 'submit-btn' id='updateName' >Update</button>
            




        </form>

    </div>





    </body>
    </html>