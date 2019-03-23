<?php 
session_start();
include 'includes/dbConnection.php';
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
						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus" style="color: white;"></i> Club</button>
						<button type="button" class="btn btn-info"><i class="fas fa-file-download" style="color: white;"></i> Excel File</button>
						<br> <br> <br>

						<!-- Table with query to fill it -->
						<?php $sql = 'SELECT cl_id,cl_name,cl_location FROM club';
					$query = mysqli_query($con, $sql);
					if (!$query) {
						die('SQL Error:' . mysqli_error($con));
					}
					?>	
						<!-- DataTables Example -->
						<div class="card mb-3">
							<div class="card-header"><i class="fas fa-table"></i> Club List</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
											<thead>
												<tr>
													<th class="sorting_desc">Club Name</th>
													<th class="sorting_desc">Location</th>
													<th class="sorting_desc">Action</th>
												</tr>
											</thead>
												
											<?php while ($row = mysqli_fetch_array($query)) { ?>
												<tr>
													<td><?php echo $row['cl_name']; ?></td>
													<td><?php echo $row['cl_location']; ?></td>
													<td>
														<a href="" style="color:blue;"> <i class="fas fa-pen"></i></a>
														<a href="club.php?idd=<?php echo $row['cl_id']; ?>" onclick="return confirm('Are you sure ?')" style="color:red;"><i class="fas fa-remove"></i></a>
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
								$sql = "Delete from club where cl_id='" . $idd . "'";
								if ($idd != '') {
									$query = mysqli_query($con, $sql);
									header("Refresh:0; url=club.php");
								}
							}
							?>
						
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
										<strong>Alert!	</strong>
										<?php echo $_SESSION["error"];
									session_unset(); ?>
									</div>
								<?php 
						} ?>


								<!-- ADD Club -->
								<div class="modal fade" id="myModal">
									<div class="modal-dialog">
										<div class="modal-content">								
											<div class="card card-register">
												<div class="card-header">Add Club</div>
													<div class="card-body">		
														<form method="post" action="includes/phpScripts.php">								
															<div class="form-group">
																<label>Club Name</label>
																<input type="text" name="txtClubName" placeholder="Club Name" class="form-control">
															</div>
															<div class="form-group">
																<label>Location</label>
																<input type="text" name="txtClubLocation" placeholder="Club Location" class="form-control">
															</div>										
															<button class="btn btn-danger btn-md" name="btnAddClub" type="submit">Add Club</button>
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