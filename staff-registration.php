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
						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus" style="color: white;"></i>  Staff</button>
						<button type="button" class="btn btn-info"  data-toggle="modal" data-target="#userModal"> <i class="fas fa-user" style="color: white;"></i> New User</button>
						<br> <br> <br>
			
						<!-- Table with query to fill it -->
						<?php $sql = 'SELECT st_id,cl_id,u_id,st_first_name,st_middle_name,st_last_name,st_position, st_telephone,address,st_email,st_dob FROM staff';
					$query = mysqli_query($con, $sql);
					if (!$query) {
						die('SQL Error:' . mysqli_error($con));
					}
					?>	
				
						<!-- DataTables Example -->
						<div class="card mb-3">
							<div class="card-header"><i class="fas fa-table"></i> Staff List</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
											<thead>
												<tr>
													<!-- Table Column Header -->
													<th class="sorting_desc">First Name</th>
													<th class="sorting_desc">Middle Name</th>
													<th class="sorting_desc">Last Name</th>
													<th class="sorting_desc">Position</th>
													<th class="sorting_desc">Address</th>
													<th class="sorting_desc">Telephone</th>
													<th class="sorting_desc">Email</th>
													<th class="sorting_desc">Date of Birth</th>
													<th class="sorting_desc">Action</th>
												</tr>
											<thead>
											<?php while ($row = mysqli_fetch_array($query)) { ?>
												<tr>
													<td><?php echo $row['st_first_name']; ?></td>
													<td><?php echo $row['st_middle_name']; ?></td>
													<td><?php echo $row['st_last_name']; ?></td>
													<td><?php echo $row['st_position']; ?></td>
													<td><?php echo $row['address']; ?></td>
													<td><?php echo $row['st_telephone']; ?></td>
													<td><?php echo $row['st_email']; ?></td>
													<td><?php echo $row['st_dob']; ?></td>
													<td>	
														<a href=""  style="color:blue;"><i class="fas fa-pen"></i></a>
														<a href="staff-registration.php?idd=<?php echo $row['st_id']; ?>" onclick="return confirm('Are you sure ?')"  style="color:red;"><i class="fas fa-remove"></i></a>
													</td>
												</tr>
											<?php 
									} ?>
										</table>
									</div>
								</div>
							</div>
						
								
							<!-- Delete Query -->
							<?php 
						if (isset($_GET['idd'])) {
							$idd = $_GET['idd'];
							$sql = "Delete from staff where st_id='" . $idd . "'";
							if ($idd != '') {
								$query = mysqli_query($con, $sql);
										//header("Refresh:0; url=staff-registration.php");
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
								

								<!-- ADD Staff -->
								<div class="modal fade" id="myModal">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="card card-register">
												<div class="card-header">Add Staff</div>
													<div class="card-body">
														<form method="post" action="includes/phpScripts.php"> 
															<div class="form-group">
																<label>First Name</label>
																<input type="text" name="txtFName" placeholder="First Name" id="txtFirstName" class="form-control" required="required">
															</div>
															<div class="form-group">
																<label>Middle Name</label>
																<input type="text" name="txtMName" placeholder="Middle Name" id="txtMName" class="form-control" required="required">
															</div>
															<div class="form-group">
																<label>Last Name</label>
																<input type="text" name="txtLName" placeholder="Last Name" id="txtLastName" class="form-control" required="required">
															</div>
															<div class="form-group">
																<label>Position</label>
																<select class="form-control" name="cbxPosition" style="height:40px;">
																	<option disabled="disabled" selected="selected">Select Position</option>
																	<option value="Admin">Admin</option>
																	<option value="Reception Manager">Reception Manager</option>
																	<option value="Reception User">Reception User</option>
																	<option value="Sales Manager">Sales Manager</option>
																	<option value="Sales User">Sales User</option>
																	<option value="Personal Trainer Manager">Personal Trainer Manager</option>
																	<option value="Personal Trainer User">Personal Trainer User</option>
																</select>	
															</div>	
															<div class="form-group">
																<label>Telephone</label>
																<input type="text" name="txtTelephone" placeholder="Telephone" class="form-control" required="required">
															</div>
															<div class="form-group">
																<label>Email</label>
																<input type="email" name="txtEmail" placeholder="Email" class="form-control" required="required">
															</div>
															<div class="form-group">
																<label>Date of Birth</label>
																<input type="date" name="dob" placeholder="Date of Birth" class="form-control" required="required">
															</div>
															<div class="form-group">
																<label>Addess</label>
																<input type="text" name="txtAddress" placeholder="Address" class="form-control" required="required">
															</div>
															</div>
															<button class="btn btn-danger btn-md" name="btnRegisterStaff">Register Staff</button>
															<button class="btn btn-danger btn-md" type="button" data-toggle="modal" data-target="#myModal">Register User</button>
														</form>
													</div>
												</div>
											</div>	
										</div>	
									</div>	
											
									<div class="container">
										<div class="modal fade" id="userModal" role="dialog">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
													<h4 class="modal-title" style="color: black;font-size:25px;text-decoration: underline;">User Registration</h4>
													</div>
													<div class="modal-body">
														<form id="user-registration-container" action="includes/phpScripts.php" method="POST">
															<label>Name</label>
															<input type="text" name="txtName" placeholder="Name" id="txtUserName" class="form-control">
															<label>Username</label>
															<input type="text" name="txtUsername" placeholder="Username" class="form-control">
															<label>Password</label>
															<input type="password" name="txtPassword" placeholder="Password" class="form-control">
															<label>User Type</label>
															<input type="text" name="UserType" placeholder="User Type" class="form-control">
															<button class="btn btn-danger btn-md" type="submit" name="btnRegisterUser">Register User</button>
														</form>
													</div>
													<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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