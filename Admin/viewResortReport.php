<?php
    session_start();
    include_once '../connection.php';
    include_once 'adminNavBar.php';

     $user_id = $_SESSION['user_id'];
     $role = "admin";

      $filter ="SELECT YEAR(paymentDate) FROM payments;" ;
        $result1=$conn->query($filter);
      //$result1 = mysqli_query($connect, $filter);
        //display data from db
        if(mysqli_num_rows($result1)>=1){
          $options = "";
            while ($row1=$result1->fetch_assoc()) {
              $options = $options."<option>$row1</option>";
       
        }
      }

        else
        {
            echo "No data found.";
        }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name ="viewreport" content="width=device-width, initial-scale =1.0">
    <title>Resort Report</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Year', 'Sales'],

           <?php 
          

            $query="SELECT b.resortID, resortName, YEAR(bookingDate) AS YEAR, sum(totalPrice) AS SALES FROM bookings b, resorts r WHERE b.resortID = r.resortID GROUP BY b.resortID ,YEAR(bookingDate) ORDER BY b.resortID, YEAR(bookingDate);" ;
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
          title: 'Resort Yearly Payment Report',
          width: 900,
          legend: { position: 'none' },
          chart: { title: 'Resort Yearly Payment Report',
                   subtitle: 'popularity by sales(RM)' },
          bars: 'horizontal', // Required for Material Bar Charts.
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
<select>
            <?php echo $options;?>
            <option value="<?php echo $row1[0];?>"></option>
        </select>
        </select>
  </body>
</html>
