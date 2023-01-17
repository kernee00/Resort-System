<!DOCTYPE html>
<?php
  session_start();
    include_once '../connection.php';
    include_once 'ownerNavBar.php';
    $user_id = $_SESSION['user_id'];


         if(isset($_GET['custID']))
{ 
$fdate=$_GET['fdate'];
$tdate=$_GET['tdate'];
$custID = $_GET['custID'];

    $sql = "SELECT * FROM resorts WHERE ownerID = '$user_id';";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
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
                                        <input type="hidden" id = "fdate" name="fdate" value="<?php echo $fdate ?>" class="box">
                                        <input type="hidden" id = "tdate" name="tdate" value="<?php echo $tdate ?>" class="box">
                                        <input type="hidden" id = "custID" name="custID" value="<?php echo $custID ?>" class="box">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $con = mysqli_connect("localhost","root","","workshop2");

                                    if(isset($_GET['search']))
                                    {

                                        $filtervalues = $_GET['search'];
                                        $fdate = $_GET['fdate'];
                                        $tdate = $_GET['tdate'];
                                        $query = "SELECT * FROM resorts WHERE CONCAT(resortName,address,city,keywords) LIKE '%$filtervalues%';";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        { header("location:searchResult.php?filtervalues=".$filtervalues."&fdate=".$fdate."&tdate=".$tdate."&custID=".$custID);

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
                                            echo"<script>alert ('No Record.')</script>";
                                            echo"<meta http-equiv='refresh' content='0; url=selectResort.php'/>";
                                            ?>
                                              

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
            <p class="resort_name"><?php echo $row['city'] .", ". $row['state']; ?>
            <p class="resort_name"><?php echo $row['overallRatings'].'/5.0'; ?></p>
            <p class="resort_name"><?php echo $row['resortPhoneNo']; ?></p>
    </div>
<form action="viewResortDetails.php" method="POST">
    <br><br><br>
<input type="hidden" id = "resortID" name="resortID" value="<?php echo $row['resortID']; ?>" class="box">
<input type="hidden" id = "fdate" name="fdate" value="<?php echo $fdate ?>" class="box">
<input type="hidden" id = "tdate" name="tdate" value="<?php echo $tdate ?>" class="box">
<input type="hidden" id = "custID" name="custID" value="<?php echo $custID ?>" class="box">
<button class ="book" name = "submit">View</button>


</form>


</div>
<?php

}
?>


</main>


</body>
</html>