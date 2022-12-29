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
    <title>Yearly Report</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Year', 'Sales'],

           <?php 
          

            $query="SELECT  YEAR(adminPaymentDate) AS YEAR,  sum(totalAdminPayment) AS PAYMENT FROM  adminPayment GROUP BY YEAR(adminPaymentDate), MONTH(adminPaymentDate)  ORDER BY YEAR(adminPaymentDate), MONTH(adminPaymentDate);" ;
        $result=$conn->query($query);
        //display data from db
        if(mysqli_num_rows($result)>=1){
            while ($row=$result->fetch_assoc()) {

                echo"['".$row['YEAR']."',".$row['PAYMENT']."],";

        }
      }

        else
        {
            echo "No data found.";
        }

        ?>
        ]);

        var options = {
          title: 'Yearly Payment Report',
          width: 900,
          legend: { position: 'none' },
          chart: { title: 'Yearly Payment Report',
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
  </head>
  <body>
    <div id="top_x_div" style="width: 900px; height: 500px;"></div>
  </body>
</html>