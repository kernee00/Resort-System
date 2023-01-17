<?php
  session_start();
    include_once '../connection.php';
    include_once 'adminNavBar.php';
    $user_id = $_SESSION['user_id'];

   /*$query = "SELECT overallRatings, resortName, count(*) as number FROM resorts GROUP BY overallRatings";  
 $result = mysqli_query($conn, $query); */
?>

 
 <!DOCTYPE html>  
 <html>  
      <head>  
          
          <meta charset="UTF-8">
    <meta name ="viewreport" content="width=device-width, initial-scale =1.0">
    <title>Monitor Rating</title>
  <link rel="stylesheet" href="monitor.css">

      </head>  
      <body>  
        <div class ="selection">
          <form name = "select-resort" action="" method="POST" style="margin-left: 30%; margin-right: 30%;">
      <label>Resort :</label><br>
      <select class = "resort" name="resort">
      <!--<option value="">--- Select ---</option> -->
      <?php 
      $sql = mysqli_query($conn, "SELECT r.resortID, resortName FROM resorts r, ratings s, bookings b WHERE r.resortID = b.resortID AND b.bookingID = s.bookingID GROUP BY r.resortID,resortName ORDER BY r.resortID,resortName;");
      while ($resortName = $sql->fetch_assoc())
      {
      ?>
        <option value="<?php echo $resortName['resortID'];?>"><?php echo $resortName['resortName'];?></option>
      <?php
      }
      ?>
      </select>

       <button class="btn" type="submit" name="view" id="view" >View</button>
     </form>
    </div>
    <br> <br>
    <hr>
     <br>
      <br>

             <?php
         if(isset($_POST['view']))
{ 
$resortID = $_POST['resort'];

$query1="SELECT * FROM resorts WHERE resortID = '$resortID';" ;
        $result1=$conn->query($query1);

         while ($row1=$result1->fetch_assoc()) {

                   $resortName = $row1['resortName'];

        }
 
?>
<div class ="graph">

     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']}); -
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Rating','Number'],  
                          <?php  

                           $query="SELECT r.resortID, marksRated, COUNT(marksRated) AS numbers FROM resorts r, ratings s, bookings b WHERE b.resortID = r.resortID AND b.bookingID = s.bookingID AND r.resortID = '$resortID' GROUP BY r.resortID, marksRated ORDER BY r.resortID, marksRated;" ;
                          $result=$conn->query($query);
                           if(mysqli_num_rows($result)>=1){
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["marksRated"]."', ".$row["numbers"]." ],";  
                          }  
                        }

                        else {


                        }
                          ?>  
                        
                     ]);  
                var options = {  
                      title: 'Ratings',  
                      //is3D:true, 
                      colors: ['#DB4C77', '#10559A'], 
                      pieHole: 0.4  
                     };  
                     
                     
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
     
          <br />
                <div style="width: 100%; height: 500px; margin-left: auto; margin-right: auto;">  
                <center>
                <?php
               
                $query ="SELECT r.resortID, marksRated,COUNT(marksRated) AS numbers, resortName FROM resorts r, ratings s, bookings b WHERE b.resortID = r.resortID AND b.bookingID = s.bookingID AND r.resortID = '$resortID' GROUP BY r.resortID, marksRated ORDER BY r.resortID, marksRated;";
                $query_run = mysqli_query($conn, $query);
                $row = mysqli_num_rows($query_run);

                /*while($result = mysqli_fetch_array($query_run))  
                          {  
                               $result=['resortName'];
                          }  */
                echo '<h3> Resort: '.$resortName.'</h3>';
                echo '<h3> Total Number of Ratings: '.$row.'</h3>';
                ?> 
                </center>
                <div id="piechart" style="width: 100%; height: 400px; margin-left: 10%; margin-right: auto;"></div> 
                  <?php
  }

    ?>

            </div>  
          </div>

          </body> 
 </html>  
