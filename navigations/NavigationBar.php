<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <style>
        .dropdown-item {
            background-color: #212529;
        }

        .dropdown-item:hover {
            color: white !important;
            background-color: #1db198;
        }
    </style>
</head>


<nav class="navbar fixed-top navbar-expand  static-top" style="background-color: #1DB198;">

    <a class="navbar-brand mr-1" href="main.php">AX GYM SYSTEM</a>
    <!--toogle btn-->
    <button class="btn btn-link btn-sm text-#909294 order-1 order-sm-0" id="sidebarToggle" style="color: white;">
        <i class="fas fa-bars"></i>
    </button>
    <!-- Navbar division -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
            <a class="navbar-brand  mr-1" style="color: white;">WELCOME TO YOUR WORKSPACE! </a>
        </div>
    </form>
    <!-- Navbar -->
    <ul class="navbar-nav  ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <span class="badge badge-danger"></span>
            </a>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope"></i>
                <span class="badge badge-danger"></span>
            </a>
            </div>
        </li>
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle fa-fw" style="hover: #212529;"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown" style="background-color: #212529;">
                <a class="dropdown-item" style="color: #909294;" href="#">Settings</a>
                <a class="dropdown-item" style="color: #909294;" href="#">Activity Log</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" style="color: #909294;" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
            </div>
        </li>
    </ul>
</nav>

<div id="wrapper">
    <!-- Sidebar -->
    <ul class="sidebar navbar-nav fixed-top">
        <li class="nav-item active">
            <a class="nav-link" href="main.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <i class="fas fa-fw fa-folder"></i>
                <span>Manage</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown" style="background-color: #212529;">
                <h6 class="dropdown-header" style="color: white;">Management Screens:</h6>
                <a class="dropdown-item" style="color: #909294;" href="member.php">Member</a>
                <a class="dropdown-item" style="color: #909294;" href="payment.php">Payment</a>
                <a class="dropdown-item" style="color: #909294;" href="subscription.php">Subscription</a>
                <a class="dropdown-item" style="color: #909294;" href="membership-type.php">Membership</a>
                <div class="dropdown-divider" style="color: #909294;"></div>
                <h6 class="dropdown-header" style="color: white;">Admin Screens:</h6>
                <a class="dropdown-item" style="color: #909294;" href="staff-registration.php">Staff</a>
                <a class="dropdown-item" style="color: #909294;" href="club.php">Club</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="packages.php">
                <i class="fas fa-fw fa-archive"></i>
                <span>Packages</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="tables.html">
                <i class="fas fa-fw fa-table"></i>
                <span>Reports</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="tables.html">
                <i class="fas fa-fw fa fa-hourglass-1"></i>
                <span>Class Schedule</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="tables.html">
                <i class="fas fa fa-group"></i>
                <span>Attendance</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="tables.html">
                <i class="fas fa-fw fa-calendar-check-o"></i>
                <span>Event</span></a>
        </li>
    </ul>

</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="index.php">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.compatibility.js"></script>
<script src="vendor/jquery-easing/jquery.easing.js"></script>


<!-- Page level plugin JavaScript-->
<script src="vendor/chart.js/Chart.min.js"></script>
<script src="vendor/datatables/jquery.dataTables.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin.min.js"></script>

<!-- Demo scripts for this page-->
<script src="js/demo/datatables-demo.js"></script>
<script src="js/demo/chart-area-demo.js"></script>

</html> 