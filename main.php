<?php 
session_start();
include 'includes/dbConnection.php';
  // for expired session 
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
    <title> Admin - Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
    <?php include 'globalExternals/components.php'; ?>
  </head>

  <body id="page-top" class="fixed-nav">
    <?php include 'navigations/NavigationBar.php'; ?>
      <div id="wrapper">
        <div id="content-wrapper">
          <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
              <!--<li class="breadcrumb-item">
                <a href="#">Dashboard</a>
              </li> -->
              <li class="breadcrumb-item active">Overview</li>
             </ol>
             <!-- Icon Cards-->
             <div class="row">
              <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-primary o-hidden h-100">
                  <div class="card-body">
                    <div class="card-body-icon">
                      <i class="fas fa-fw fa-comments"></i>
                    </div>
                    <div class="mr-5">New Messages!</div>
                  </div>
                  <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                      <i class="fas fa-angle-right"></i>
                    </span>
                  </a>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-warning o-hidden h-100">
                  <div class="card-body">
                    <div class="card-body-icon">
                      <i class="fas fa-fw fa-list"></i>
                    </div>
                    <div class="mr-5">New Tasks!</div>
                  </div>
                  <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                      <i class="fas fa-angle-right"></i>
                    </span>
                  </a>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-success o-hidden h-100">
                  <div class="card-body">
                    <div class="card-body-icon">
                      <i class="fas fa-fw fa-user"></i>
                    </div>
                    <div class="mr-5"> Active Members</div>
                  </div>
                  <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                      <i class="fas fa-angle-right"></i>
                    </span>
                  </a>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-danger o-hidden h-100">
                  <div class="card-body">
                    <div class="card-body-icon">
                      <i class="fas fa-fw fa-exclamation-circle"></i>
                    </div>
                    <div class="mr-5"> Expired Memberships</div>
                  </div>
                  <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                      <i class="fas fa-angle-right"></i>
                    </span>
                  </a>
                </div>
              </div>
              
            </div>

             <!-- Area Chart Example-->
            <div class="card mb-3">
              <div class="card-header">
                  <i class="fas fa-chart-area"></i>
                  Area Chart Example
                </div>
                <div class="card-body">
                  <canvas id="myAreaChart" width="100%" height="30"></canvas>
                </div>
                <div class="card-footer small text-muted">Updated
                </div>
              </div>
             <!-- Area Chart Example-->
             <div class="card mb-3">
              <div class="row">
                <div class="col-lg-8">
                  <div class="card mb-3">
                    <div class="card-header">
                      <i class="fas fa-chart-bar"></i>
                      Bar Chart 
                    </div>
                    <div class="card-body">
                      <canvas id="myBarChart" width="100%" height="50"></canvas>
                    </div>
                    <div class="card-footer small text-muted">Updated</div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="card mb-3">
                    <div class="card-header">
                      <i class="fas fa-chart-pie"></i>
                      Pie Chart </div>
                    <div class="card-body">
                      <canvas id="myPieChart" width="100%" height="100"></canvas>
                    </div>
                    <div class="card-footer small text-muted">Updated</div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>

      <!-- Demo scripts for this page-->
      <script src="js/demo/datatables-demo.js"></script>
      <script src="js/demo/chart-area-demo.js"></script>
      <script src="js/demo/chart-bar-demo.js"></script>
      <script src="js/demo/chart-pie-demo.js"></script>

  </body> 
</html>
