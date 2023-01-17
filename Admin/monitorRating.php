<?php
  session_start();
    include_once '../connection.php';
    include_once 'adminNavBar.php';
    $user_id = $_SESSION['user_id'];

  
?>
<?php  
 $connect = mysqli_connect("localhost", "root", "", "workshop2");  
 $query = "SELECT overallRatings, resortName, count(*) as number FROM resorts GROUP BY overallRatings";  
 $result = mysqli_query($connect, $query);  
 ?> 
 
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>kbib</title>  
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Rating','Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["overallRatings"]."', ".$row["number"]." ],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Rating Registered',  
                      //is3D:true, 
                      colors: ['#DB4C77', '#10559A'], 
                      pieHole: 0.4  
                     };  
                     
                     
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
      </head>  
      <body>  
          <br />
                <div style="width: 100%; height: 500px; margin-left: auto; margin-right: auto;">  
                <center>
                <?php
                $connect = mysqli_connect("localhost", "root", "", "workshop2");  
                $query ="SELECT overallRatings FROM resorts ORDER BY overallRatings";
                $query_run = mysqli_query($connect, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h3> Total Ratings Registered: '.$row.'</h3>';
                ?> 
                </center>
                <div id="piechart" style="width: 100%; height: 400px; margin-left: auto; margin-right: auto;"></div> 
            </div>  
          </body> 
 </html>  
