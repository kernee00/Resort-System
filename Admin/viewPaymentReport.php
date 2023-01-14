<?php
    session_start();
    include_once '../connection.php';
    include_once 'adminNavBar.php';

     $user_id = $_SESSION['user_id'];
     $role = "admin";

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name ="viewreport" content="width=device-width, initial-scale =1.0">
   
    <title>Resort Report</title>
    <h2 align="center" style=" margin-top:50px">Payment Report</h2>

  </head>
  <body>

    <!---select date and method-->
    <div class ="insert-date" style="margin-left: 30%; margin-top:20px">
      <form name="bwdatesdata" action="" method="post" action="">
      <table width="100%" height="117"  border="0" >
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
      <th width="27%" height="63" scope="row">Request Type :</th>
      <td width="73%">
      <input type="radio" name="requesttype" value="admin" checked="true">Payment to Admin
      <input type="radio" name="requesttype" value="owner">Payment to Owner</td>
      </tr>
      <tr>

    <th width="27%" height="63" scope="row"></th>
    <td width="73%">
    <button class="btn-primary btn" type="submit" name="submit">Submit</button>
      <a href = 'managePayment.php'><input type = 'submit' value = 'Back' id = 'add_button'></a>

  </tr>
</table>
     </form>
     </div>
  
    <hr>
      <div class="row">
      <div class="col-xs-12">
         <?php
         if(isset($_POST['submit']))
{ 
$fdate=$_POST['fdate'];
$tdate=$_POST['tdate'];
$rtype=$_POST['requesttype'];

 
?>
<?php
 if ($rtype == 'admin'){
  ?>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Year-Month', 'Payments'],

           <?php 
              //display by the payment that admin received
          

            $query="SELECT DATE_FORMAT(adminPaymentDate, '%Y-%m') AS 'YEAR-MONTH', SUM(totalAdminPayment) AS Payments FROM bookings b, adminpayment a WHERE b.bookingID = a.bookingID AND adminPaymentDate BETWEEN '$fdate' AND '$tdate' GROUP BY DATE_FORMAT(adminPaymentDate, '%Y-%m') ORDER BY DATE_FORMAT(adminPaymentDate, '%Y-%m');" ;
        $result=$conn->query($query);
        //display data from db
        if(mysqli_num_rows($result)>=1){
            while ($row=$result->fetch_assoc()) {

                   echo"['".$row['YEAR-MONTH']."',".$row['Payments']."],";

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
                   subtitle: '' },
          bars: 'vertical', // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: 'top', label: ''} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
      };
    </script>

    <div id="top_x_div" style="width: 900px; height: 500px;"></div>

    <?php

  }

  else { ?>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Year-Month', 'Payments'],

           <?php 
              //display by the payment that admin received
          
//payment received by owner
         $query="SELECT DATE_FORMAT(paymentDate, '%Y-%m') AS 'YEAR-MONTH', SUM(totalPrice) AS Payments FROM payments p, bookings b WHERE b.bookingID = p.bookingID AND paymentDate BETWEEN '$fdate' AND '$tdate' AND paymentStatus = 'Approved' GROUP BY DATE_FORMAT(paymentDate, '%Y-%m') ORDER BY DATE_FORMAT(paymentDate, '%Y-%m');" ;
        $result=$conn->query($query);
        //display data from db
        if(mysqli_num_rows($result)>=1){
            while ($row=$result->fetch_assoc()) {

                   echo"['".$row['YEAR-MONTH']."',".$row['Payments']."],";

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
                   subtitle: '' },
          bars: 'vertical', // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: 'top', label: ''} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
      };
    </script>

    <div id="top_x_div" style="width: 900px; height: 500px;"></div>

    <?php
  }
//close if (isset($_POST['submit']))
  }

    ?>



  

  </body>
</html>
