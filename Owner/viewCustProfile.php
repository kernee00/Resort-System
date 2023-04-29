 <!DOCTYPE html>
<?php
    session_start();
    include_once '../connection.php';
    include_once 'ownerNavBar.php';
    $user_id = $_SESSION['user_id'];

  
?>
<html lang = "en">

<html lang = "en">
    <head>
        
        <meta charset = "utf-8" />
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
        <link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css " />
        <link rel = "stylesheet" type = "text/css" href = "../css/style.css" />


    <br />
    <div class = "container-fluid">
        <div class = "panel panel-default">
            <div class = "panel-body">
                <!--<div class = "alert alert-info">Manage Owner</div>-->
                <br />
                <br />
                <table id = "table" class = "table table-bordered">
                    <thead>
                        <tr>
                            <th><center>Customer ID</th>
                            <th><center>Customer Name</th>
                            <th><center>Contact Number</th>
                            <th><center>Email</th>
                            <th><center>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $query = $conn->query("SELECT * FROM customers") or die(mysqli_error());
                        while($fetch = $query->fetch_array()){
                    ?>  
                        <tr>
                        <td><center><?php echo $fetch['custID']?></td>
                            <td><center><?php echo $fetch['custName']?></td>
                            <td><center><?php echo $fetch['phoneNo']?></td>
                            <td><center><?php echo $fetch['custEmail']?></td>

                            
                        </tr>
                    <?php
                        }
                    ?>  
                    </tbody>
                </table>

                
            </div>
        </div>
    </div>
    <br />
    <br />

</body>
<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>
<script src = "../js/jquery.dataTables.js"></script>
<script src = "../js/dataTables.bootstrap.js"></script> 
<script type = "text/javascript">

</script>

<script type = "text/javascript">
    $(document).ready(function(){
        $("#table").DataTable();
    });
</script>
</html>