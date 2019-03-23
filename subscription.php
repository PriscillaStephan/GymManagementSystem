<?php 
session_start();
include 'includes/dbConnection.php';

if (!$_SESSION["user_name_loggedIn_admin"]) {
	$_SESSION["expired_session"] = "Your session has been expired, relog in!";
	header("Location: index.php");
}
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
								<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"> <i class="fas fa-plus" style="color: white;"></i> Subscription</button>
								<button type="button" class="btn btn-info"> <i class="fas fa-file-download" style="color: white;"></i> Excel File</button>
								<br> <br> <br>
						
								<!-- Table with query to fill it -->				
								<?php $sql = 'SELECT sub_id,st_id,cl_id,m_id,sub_date FROM subscription';
							$query = mysqli_query($con, $sql);
							if (!$query) {
								die('SQL Error:' . mysqli_error($con));
							}
							?>	
									
								<!-- DataTables Example -->
								<div class="card mb-3">
									<div class="card-header"><i class="fas fa-table"></i> Subscription List</div>
										<div class="card-body">
											<div class="table-responsive">
												<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
													<thead>
														<tr>
															<!-- Table Column Header -->
															<th class="sorting_desc">Member Name</th>
															<th class="sorting_desc">Membership</th>
															<th class="sorting_desc">Starting Date</th>
															<th class="sorting_desc">Expiry Date</th>
															<th class="sorting_desc">Price</th>
															<th class="sorting_desc">Discount</th>
															<th class="sorting_desc">Currency</th>	
															<th class="sorting_desc">Action</th>
														</tr>
													</thead>
													<?php while ($row = mysqli_fetch_array($query)) { ?>
														<tr>
															<td><?php echo $row['']; ?></td>
															<td>
																<a href="" style="color:blue;"><i class="fas fa-pen"></i></a> 
																<a href="subscription.php?idd=<?php echo $row['sub_id']; ?>" onclick="return confirm('Are you sure ?')"  style="color:red;"><i class="fas fa-remove"></i></a>
															</td>
														</tr>
													<?php 
											} ?>
												</table>
											</div>
										</div>

									</div>
								</div>
								<!-- Delete Query -->
								<?php 
							if (isset($_GET['idd'])) {
								$idd = $_GET['idd'];
								$sql = "Delete from subscription where sub_id='" . $idd . "'";
								if ($idd != '') {
									$query = mysqli_query($con, $sql);
									header("Refresh:0; url=subscription.php");
								}
							}
							?>
							</div>
						</div>
					</div>	
			
       				 <!-- session for add member button -->
					<?php if (isset($_SESSION["success"])) { ?>
						<div class="alert alert-success">
							<strong>Success!</strong> 
							<?php echo $_SESSION["success"];
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
					
					<!-- ADD Subscripiton -->
					<div class="modal fade" id="myModal">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="card card-register">
									<div class="card-header">Add Subscription</div>
										<div class="card-body">
											<form method="post" action="includes/phpScripts.php">
												<div class="form-group">
													<label>Member Name</label>
														<select class="form-control">
															<?
														$query = "SELECT m_first_name FROM member";
																/* You can add order by clause to the sql statement if the names are to be displayed in alphabetical order */
														$result = mysql_query($query);
														echo "<select name=member value=''></option>";
														while ($nt = mysql_fetch_array($result)) {
															echo "<option value=$nt'm_first_name'></option>";

														}
														echo "</select>";

														?>
														</select>		
												</div>
																										
												<div class="form-group">
													<label>Memebrship</label>
													<select class="form-control">
														<option disabled="disabled" selected="selected">Select Membership</option>
														<option value="membership" selected="selected">Monthly Membership</option>
														<option value="membership" selected="selected">Three Months Membership</option>
														<option value="membership" selected="selected">Six Months Membership</option>
														<option value="Activity" selected="selected">Swimming Activity</option>
														<option value="Activity" selected="selected">Basketball Activity</option>
														<option value="Activity" selected="selected">Football Activity</option>
														<option value="Activity" selected="selected">CLasses</option>
														<option value="Personal-training" selected="selected">Single PT Session</option>
														<option value="Personal-training" selected="selected">10 PT Sessions</option>
														<option value="Personal-training" selected="selected">30 PT Sessions</option>
													</select>
												</div>

												<div class="form-group">
													<label>Starting Date</label>
													<input type="Date" name="starting-date" placeholder="Starting date" class="form-control" required="required">
												</div>
												<div class="form-group">
													<label>Exipry Date</label>
													<input type="Date" name="expiry-date" placeholder="Expiry date" class="form-control" required="required">
												</div>

												<div class="form-group">
													<label>Price</label>
													<input type="text" name="txtMembershipPrice" placeholder="Price" class="form-control" required="required">
												</div>
												<div class="form-group">
													<label>Discount</label>
													<input type="text" name="txtPriceDiscount" placeholder="Discount" class="form-control" required="required">
												</div>
												<div class="form-group">
													<label>Currency</label>
													<input type="text" name="txtPriceCurrency" placeholder="Currency" class="form-control" required="required">
												</div>
												<button class="btn btn-success btn-md" name="btnSaveSub" type="submit" style="float:right;">Save</button>
											</form>
                                    	</div>
                            		</div>
                        		</div>
       					    </div>
						</div>
					</div>
				</div>

	</body>
</html>