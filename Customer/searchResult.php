<?php 
    $con = mysqli_connect("localhost","root","","workshop2");

    if(isset($_GET['filtervalues']))
    {

        $filtervalues = $_GET['filtervalues'];
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
        }

        else{

            echo "Connection timed out.";
        }
      
?>
                                              
