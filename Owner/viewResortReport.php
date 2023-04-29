<?php
    session_start();
    include_once '../connection.php';
    include_once 'ownerNavBar.php';

     $user_id = $_SESSION['user_id'];


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name ="viewreport" content="width=device-width, initial-scale =1.0">
    <link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css " />
    <title>Resort Report</title>
    <h2 align="center">Resort Report</h2>

  </head>
  <body>

    <!---select date and method-->
      <form name="bwdatesdata" action="" method="post" action="" style="margin-left: 30%; margin-right: 30%;">
     
             <table width="100%" height="117"  border="0">
      <tr>
      <th width="27%" height="63" scope="row">From:</th>
      <td width="73%">
      <input type="date" name="fdate" class="form-control" id="fdate" required>
      </td>
      </tr>
      <tr>
      <th width="27%" height="63" scope="row">To:</th>
      <td width="73%">
      <input type="date" name="tdate" class="form-control" id="tdate" required></td>
      </tr>
      
      <tr>

    <th width="27%" height="63" scope="row"></th>
    <td width="73%">
    <button class="btn-primary btn" type="submit" name="submit">Submit</button>

  </tr>
</table>
     </form>

     </div>
    </div>
    <hr>
      <div class="row">
      <div class="col-xs-12">
         <?php
         if(isset($_POST['submit']))
{ 
$fdate=$_POST['fdate'];
$tdate=$_POST['tdate'];
 
?>


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Resort', 'Sales'],

           <?php 
              //display by year

            $query="SELECT b.resortID, resortName, YEAR(bookingDate) AS YEAR, sum(totalPrice) AS SALES FROM bookings b, resorts r WHERE b.resortID = r.resortID AND bookingDate BETWEEN '$fdate' AND '$tdate' AND ownerID = '$user_id' GROUP BY b.resortID ,YEAR(bookingDate) ORDER BY b.resortID, YEAR(bookingDate);" ;
        $result=$conn->query($query);
        //display data from db
        if(mysqli_num_rows($result)>=1){
            while ($row=$result->fetch_assoc()) {

                   echo"['".$row['resortName']."',".$row['SALES']."],";

        }
      }

        else
        {
            echo "No data found.";
        }


        ?>
        ]);

        var options = {
          title: 'Resort Yearly Booking Report',
          width: 900,
          legend: { position: 'none' },
          chart: { title: 'Resort Yearly Payment Report',
                   subtitle: 'popularity by sales(RM)' },
          bars: 'vertical', // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: 'top', label: 'Sales'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
      };
    </script>

    <div id="top_x_div" style="width: 900px; height: 500px; margin-left: 30%;" ></div>


    <?php
  }

    ?>

  

  </body>
</html>