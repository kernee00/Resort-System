<?php
	session_start();
    include_once '../connection.php';
    include_once 'adminNavBar.php';
    $user_id = $_SESSION['user_id'];

  
?>

<!DOCTYPE html>


	<html lang="en">
<head>
		
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
		<link rel = "stylesheet" type = "text/css" href = "dashboardStyle.css" />
		</head>
		<body>

			<div class = "main-content">
				<header>
					<h1>
			
						<label for ="">
							<span class = "las la-bars"></span>
						</label>
						Dashboard
					</h1>

				
					<!--<div class ="user-wrapper">
						<img src ="image/users.jpg" width="40px" height="40px" alt="">
						<div>
							<h4>John Doe</h4>
							<small>Super admin</small>
						</div>
					</div>-->
				</header>
				<main>
					<div class ="cards">
						<div class = "card-single">

							<div>
								<?php
						$query = $conn->query("SELECT COUNT(*) AS paymentNum FROM  payments WHERE paymentStatus = 'Paid';") or die(mysqli_error());
						while($row = $query->fetch_array()){
							$paymentNo = $row['paymentNum'];
						}
					?>	
								<h1><?php echo $paymentNo ?></h1>
								<span>Payment Waiting Approval</span>

							</div>
							<div>
								<span class ="las la-payments"></span>

							</div>

						</div>

						<div class = "card-single">

							<div>

								<?php
						$query1 = $conn->query("SELECT COUNT(*) AS refundNum FROM  payments WHERE paymentStatus = 'Refund';") or die(mysqli_error());
						while($row1 = $query1->fetch_array()){
							$refundNum = $row1['refundNum'];
						}
					?>	
								<h1><?php echo $refundNum ?></h1>
								<span>Payment Refund</span>

							</div>
							<div>
								<span class ="las la-owner"></span>

							</div>

						</div>
						<div class = "card-single">

							<div>
								<?php
						$query2 = $conn->query("SELECT COUNT(*) AS ownerNum FROM adminPayment WHERE payOwnerStatus = 'Unpaid';") or die(mysqli_error());
						while($row2 = $query2->fetch_array()){
							$ownerNum = $row2['ownerNum'];
						}
					?>	
								<h1><?php echo $ownerNum ?></h1>
								<span>Owner Payments</span>

							</div>
							<div>
								<span class ="las la-owner"></span>

							</div>

						</div>
							<div class = "card-single">

							<div>

									<?php
						$query3 = $conn->query("SELECT SUM(totalAdminPayment) AS monthSales FROM adminPayment;") or die(mysqli_error());
						while($row3 = $query3->fetch_array()){
							$monthly = $row3['monthSales'];
						}
					?>	
								<h1>RM <?php echo $monthly ?></h1>
								<span>Monthly Income</span>

							</div>
							<div>
								<span class ="las la-owner"></span>

							</div>

						</div>

						<div class ="recent-grid">
							<div class ="payments">
								<div class ="card">

									<div class ="card-header">
										<h3>Recent Payments</h3>
										<form action="managePayment.php" method="POST">
										<button>See All<span class = "las la-arrow-right"></span></button></form>


								</div>

								<div class ="card-body">
									<div class ="table=responsive">
									<table width="100%">
										<thead>
											<tr>
											<td><center>Date</td>
											<td><center>Payments (RM)</td>
											<td><center>Status</td>
										</tr>
											
										</thead>

										<tbody>


									<?php
						$query4 = $conn->query("SELECT *  FROM payments WHERE paymentStatus = 'Paid' OR paymentStatus = 'Refund';") or die(mysqli_error());
						while($row4 = $query4->fetch_array()){
							$amount = $row4['totalPayment'];
							$status = $row4['paymentStatus'];
							$date = $row4['paymentDate'];
						
					?>	
											<tr>
												<td><center><?php echo $date?></td>
												<td><center><?php echo $amount?></td>
												<td><center>
												<?php echo $status ?>
												</td>

											</tr>
											<?php
										}
											?>
										</tbody>

										

									</table>
										
								</div>
								</div>

							</div>
							
									
								</div>
							</div>


						</div>

					</div>


				</main>

			</div>
		</body>
		</html>