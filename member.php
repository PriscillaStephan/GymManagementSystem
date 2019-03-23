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
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus" style="color: white;"></i> Member</button>
							<button type="button" class="btn btn-info"><i class="fas fa-file-download" style="color: white;"></i> Excel File</button>
						</div>
							
							<!-- Table with query to fill it -->
							<?php $sql = 'SELECT m_id,m_first_name,m_middle_name,m_last_name,m_address,m_telephone,email,m_dob FROM member';
						$query = mysqli_query($con, $sql);

						if (!$query) {
							die('SQL Error:' . mysqli_error($con));
						}
						?>	
				
							<!-- DataTables Example -->
							<div class="card mb-3">
								<div class="card-header"><i class="fas fa-table"></i> Member List</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
												<thead>
													<tr> 
														<!-- Table Column Header -->
														<th class="sorting_desc">First Name</th>
														<th class="sorting_desc">Middle Name</th>
														<th class="sorting_desc">Last Name</th>
														<th class="sorting_desc">Address</th>
														<th class="sorting_desc">Telephone</th>
														<th class="sorting_desc">Email</th>
														<th class="sorting_desc">Date of Birth</th>
														<th class="sorting_desc">Action</th>
													</tr>
												</thead>
												
												<?php while ($row = mysqli_fetch_array($query)) { ?>
													<tr>
														<td><?php echo $row['m_first_name']; ?></td>
														<td><?php echo $row['m_middle_name']; ?></td>
														<td><?php echo $row['m_last_name']; ?></td>
														<td><?php echo $row['m_address']; ?></td>
														<td><?php echo $row['m_telephone']; ?></td>
														<td><?php echo $row['email']; ?></td>
														<td><?php echo $row['m_dob']; ?></td>
														<td>
															<a href="" style="color:blue;" > <i class="fas fa-pen"></i> </a>
															<a href="member.php?idd=<?php echo $row['m_id']; ?>" onclick="return confirm('Are you sure ?')"  style="color:red;" ><i class="fas fa-remove"></i></a>
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
									$sql = "Delete from member where m_id='" . $idd . "'";
									if ($idd != '') {
										$query = mysqli_query($con, $sql);
															//header("Refresh:0; url=member.php");
									}
								}
								?>

									<!-- session for add member button -->
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

									<!-- ADD Member -->
									<div class="modal fade" id="myModal">
										<div class="modal-dialog">
											<div class="modal-content">					
												<div class="card card-register">
													<div class="card-header">Add Member</div>
														<div class="card-body">																			
															<form method="post" action="includes/phpScripts.php">
																<div class="form-group">
																	<input type="text" name="txtFName" placeholder="First Name" class="form-control" required="required">
																</div>
																<div class="form-group">
																	<input type="text" name="txtMName" placeholder="Middle Name" class="form-control" required="required">
																</div>
																<div class="form-group">
																	<input type="text" name="txtLName" placeholder="Last Name" class="form-control" required="required">
																</div>
																<div class="form-group">
																	<input name="txtAddress" class="form-control" placeholder="Address" required="required">
																</div>
																<div class="form-group">
																	<input type="text" name="txtTelephone" placeholder="Telephone" class="form-control" required="required" >
																</div>
																<div class="form-group">
																	<input type="email" name="txtEmail" placeholder="Email" class="form-control" required="required">
																</div>
																<div class="form-group">
																<input type="date" name="dob" placeholder="Date of Birth" class="form-control" required="required">
																</div>
																<div class="form-group">
																	<button class="btn btn-md btn-primary" name="btnRegisterMember" class="modalButton" type="submit">Add Member</button>
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
				</div>
			</div>
		</div>
			

	</body>
</html>