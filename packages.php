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
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"> <i class="fas fa-plus" style="color: white;"></i> Membership</button>
                    <button type="button" class="btn btn-info"> <i class="fas fa-file-download" style="color: white;"></i> Excel File</button>
                    <br> <br> <br>

                    <!-- Table with query to fill it -->
                    <?php $sql = 'SELECT ms_id,ms_description,ms_price FROM membership';
					$query = mysqli_query($con, $sql);
					if (!$query) {
						die('SQL Error:' . mysqli_error($con));
					}
					?>

                    <div id="content-wrapper">
                        <div class="container-fluid">
                            <!-- DataTables Example -->
                            <div class="card mb-3">
                                <div class="card-header"><i class="fas fa-table"></i>Packages List</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <!-- Table Column Header -->
                                                <th class="sorting_desc">package Name</th>
                                                <th class="sorting_desc">Description</th>
                                                <th class="sorting_desc">Price</th>
                                                <th class="sorting_desc">Action</th>
                                                </tr>
                                            </thead>

                                            <?php while ($row = mysqli_fetch_array($query)) { ?>
                                            <tr>
                                                <td><?php echo $row['ms_name']; ?></td>
                                                <td><?php echo $row['ms_description']; ?></td>
                                                <td><?php echo $row['ms_price']; ?></td>
                                                <td>
                                                    <a href="" style="color:red;">Edit</a>
                                                    <a href="package.php?idd=<?php echo $row['ms_id']; ?>" onclick="return confirm('Are you sure ?')" style="color:red;">Delete</a>
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
								$sql = "Delete from membership where ms_id='" . $idd . "'";
								if ($idd != '') {
									$query = mysqli_query($con, $sql);
									header("Refresh:0; url=packages.php");
								}
							}
							?>

                            <!-- Add Membership Modal -->
                            <div class="modal fade" id="myModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="card card-register">
                                            <div class="card-header">Add Package</div>
                                            <div class="card-body">
                                                <form method="post" action="includes/phpScripts.php">
                                                    <div class="form-group">
                                                        <input type="text" name="txtMname" placeholder="Package name" class="form-control" required="required">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="txtMdescription" placeholder="Description" class="form-control" required="required">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="txtMtype" placeholder="Price" class="form-control" required="required">
                                                    </div>
                                                    <div class="form-group">
                                                        <button class="btn btn-md btn-primary" name="btnAddMS" type="submit">Add Package</button>
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