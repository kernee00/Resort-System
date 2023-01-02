<?php
    session_start();
    include_once '../connection.php';
    include_once 'customerNavBar.php';
    $user_id = $_SESSION['user_id'];
    $resortID = $_POST['resortID'];
  
?>

<?php
    $query = $conn->query("SELECT * FROM rooms WHERE resortID = '$resortID'") or die(mysqli_error());
        while($fetch = $query->fetch_array()){
?>  
    <tr>
        <td><?php echo $fetch['roomID']?></td>
        <td><?php echo $fetch['pricePerNight']?></td>
        <td><?php echo $fetch['capacity']?></td>
        <td><?php echo $fetch['location']?></td>

        <td><center><a class = "btn btn-warning" 
                                

        href = "displayRoomConfirmation.php?room_id=
                                <?php echo $fetch['roomID']?>"></i>Book</a></center></td>
                        </tr>
<?php
                        }
                    ?>