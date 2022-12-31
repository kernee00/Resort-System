 <?php
    session_start();
    include_once '../connection.php';
    include_once 'customerNavBar.php';

    if (isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT resortID, resortName, address, city, state, overallRatings, coverPhoto, resortPhoneNo FROM resorts;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

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
    <title>Main Page</title>
  <link rel="stylesheet" href="../Style/displayStyle.css">

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Funda Of Web IT</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Resort </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

 <!--            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $con = mysqli_connect("localhost","root","","workshop2");

                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM resorts WHERE CONCAT(resortName,address, state,city) LIKE '%$filtervalues%'";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $items['resortName']; ?></td>
                                                    <td><?= $items['address']; ?></td>
                                                    <td><?= $items['state']; ?></td>
                                                    <td><?= $items['city']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

</head>

<body>

<main>

           <?php

            while ($row = mysqli_fetch_assoc($result)){

    ?>

    <div class = "card">
        <div class = "image">
             <?php
              echo '<img src="data:image;base64,'.base64_encode($row['coverPhoto']).'" alt="Image" ;">';
              ?>
        </div>

        <div class = "caption">
            <p class = "rate">
            
            </p>
            <p class="resort_name"><?php echo $row['resortName']; ?></p>
            <p class="resort_name"><?php echo $row['address']; ?></p>
            <p class="resort_name"><?php echo $row['city']; ?>
            <p class="resort_name"><?php echo $row['state']; ?></p>
            <p class="resort_name"><?php echo $row['overallRatings'].'/5.0'; ?></p>
            <p class="resort_name"><?php echo $row['resortPhoneNo']; ?></p>
    </div>
<form action="displayRoom.php" method="POST">
<input type="hidden" id = "resortID" name="resortID" value="<?php echo $row['resortID']; ?>" class="box">
<button class ="book">Book</button>


</form>


</div>
<?php

}
?>


</main>


</body>
</html>