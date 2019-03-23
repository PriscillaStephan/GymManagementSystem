<?php 
session_start();
include 'includes/dbConnection.php';
if (!$_SESSION["user_name_loggedIn_admin"]) {
	$_SESSION["expired_session"] = "Your session has been expired, relog in!";
	header("Location: index.php");
}
$sql = 'SELECT pay_id FROM payment';
$query = mysqli_query($con, $sql);
if (!$query) {
	die('SQL Error:' . mysqli_error($con));
}
$row = mysqli_fetch_array($query);
?>	

<!DOCTYPE html>
<html>
	<head>
	    <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="">
		<meta name="author" content="">	
		<title>AX GYM</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>
		<!-- Page level plugin CSS-->
		<link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
		<?php include 'globalExternals/components.php'; ?>	
	</head>	

	<body id="page-top" class="fixed-nav">				
		<?php include 'navigations/NavigationBar.php'; ?>
			<div id="wrapper">
				<div id="content-wrapper">
					<div class="container-fluid">
        				<div class="container" id="member-registration-container">
							<a class="btn btn-primary btn-block" href="#"></a>
							<br> <br> 
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"> <i class="fas fa-plus" style="color: white;"></i>  Payment</button>
							<button type="button" class="btn btn-info"><i class="fas fa-file-download" style="color: white;"></i> Excel File</button>
							<br> <br> <br>

							<!-- Table with query to fill it -->
							<?php $sql = 'SELECT pay_id,mop_name,sub_id,pay_amount,pay_date FROM payment';
						$query = mysqli_query($con, $sql);
						if (!$query) {
							die('SQL Error:' . mysqli_error($con));
						}
						?>	

							<!-- DataTables Example -->
							<div class="card mb-3">
								<div class="card-header"><i class="fas fa-table"></i> Payment List</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
												<thead>
													<tr>
														<!-- Table Column Header -->
														<th class="sorting_desc">Invoice Number</th>
														<th class="sorting_desc">Methode of Payment</th>
														<th class="sorting_desc">Payment Amount</th>
														<th class="sorting_desc">Payment Date</th>
														<th class="sorting_desc">Action</th>
													</tr>
												</thead>

												<?php while ($row = mysqli_fetch_array($query)) { ?>
													<tr>
														<td><?php echo $row['pay_id']; ?></td>
														<td><?php echo $row['mop_name']; ?></td>
														<td><?php echo $row['pay_amount']; ?></td>
														<td><?php echo $row['pay_date']; ?></td>
														<td>
															<a href=""  style="color:blue;"><i class="fas fa-pen"></i></a>
															<a href="payment.php?idd=<?php echo $row['pay_id']; ?>" onclick="return confirm('Are you sure ?')"  style="color:red;"><i class="fas fa-remove"></i></a>
														</td>
													</tr>
												<?php 
										} ?>
											</table>
										</div>
									</div>

									<!-- Delete Query -->
									<?php 
								if (isset($_GET['idd'])) {
									$idd = $_GET['idd'];
									$sql = "Delete from payment where pay_id='" . $idd . "'";
									if ($idd != '') {
										$query = mysqli_query($con, $sql);
													//header("Refresh:0; url=payment.php");
									}
								}
								?>
							</div>
            
							<!-- session for add payment button -->
							<?php if (isset($_SESSION["success"])) { ?>
								<div class="alert alert-success">
									<strong>Success!	</strong> <?php echo $_SESSION["success"];
																																			session_unset(); ?>
								</div>
							<?php 
					} ?>

							<?php if (isset($_SESSION["error"])) { ?>
								<div class="alert alert-danger">
									<strong>Alert!	</strong> <?php echo $_SESSION["error"];
																																	session_unset(); ?>
								</div>
							<?php 
					} ?>
											
							<!-- ADD payment -->
							<div class="modal fade" id="myModal">
								<div class="modal-dialog">
									<div class="modal-content">							
										<div class="card card-register">
											<div class="card-header">Add Payment</div>
												<div class="card-body">		
													<form method="post" action="includes/phpScripts.php">
														<div class="form-group">
															<div class="col-md-9">
																<label>Invoice #</label>
																<input type="text" name="txtPayment-id" placeholder="Invoice Number" disabled="disabled" value="<?php echo $row['pay_id'] + "1"; ?>" class="form-control" required="required">										</div>
															</div>
															<br><br><br>
															<div class="form-group">
															<div class="col-md-6">
																<label>Method Of Payment</label>
																<select class="form-control" id="cbxMethodPayment" name="cbxMethodeOfPayment">
																	<option disabled="disabled" selected="selected">Methode Of Payment</option>
																	<option value="Cash">Cash</option>
																	<option value="MasterCard">Master Card</option>
																	<option value="VisaCard">Visa Card</option>
																	<option value="Check">Check</option>
																	<option value="Amex">Amex</option>
																</select>
															</div>
															<div class="form-group">
																<div class="col-md-6">
																	<label>Package</label>
																	<select class="form-control" id="cbxPackages" name="cbxPackages" style="height:40px;">
																		<option disabled="disabled" selected="selected">Select Package</option>
																		<option value="single">Single Session</option>
																		<option value="10 Sessions">10 Sessions</option>
																		<option value="20 Sessions">20 Sessions</option>
																		<option value="30 Sessions">30 Sessions</option>
																		<option value="Double 30 Sessions">Double 30 Sessions</option>
																	</select>
																</div>
															</div>					
															<br><br>
															<div class="form-group">
																<div class="col-md-6">
																	<label>Total Amount</label>
																	<input type="text" name="txtAmount" disabled="disabled" id="txtTotalAmount" value="50000" placeholder="Total Amount" class="form-control" required="required">
																</div>
																<div class="form-group">
																<div class="col-md-6">
																	<label>Paid Amount</label>  
																	<input type="text" name="txtPaid" onchange="totalAmount()" id="txtPaid" placeholder="Paid" class="form-control" required="required">
																</div>
															</div>
															<div class="form-group">
																<div class="col-md-6">
																	<label>Remaining Amount</label>  
																	<input type="text" name="txtRemain" disabled="disabled" id="txtRemain" placeholder="Remain" class="form-control" required="required">
																</div>
																<div class="form-group">
																	<div class="col-md-6">
																		<label>Payment Date</label>
																		<input type="date" name="pDate" placeholder="Payment Date" class="form-control" required="required">
																	</div>
																	<br><br><br>
																	<div class="form-group">
																	<button class="btn btn-success btn-md" type="submit" type="submit" name="btnSavePrint">Save & Print</button>
																</div>
															</div>	
													</form>
												</div>
											</div>
										</div>
									</div>
							</div>
						</div>
					</div>
				</div>

	</body>
</html>            