<?php
  require "profileinfo.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard - <?php echo strtoupper($InstitudeName)?></title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo '../index/'.$TitleLogo?>">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css?v=<?php echo time(); ?>" rel="stylesheet">
  <link href="css/style.css?v=<?php echo time(); ?>" rel="stylesheet">
  <link href="css/bootstrap.min.css?v=<?php echo time(); ?>" rel="stylesheet">
  <link href="responsive/responsive.css?v=<?php echo time(); ?>" rel="stylesheet">

  <script src="js/jquery-3.5.0.min.js"></script>
  <script src="js/sweetalert2.all.min.js"></script>
   <script type="text/javascript">
    

  </script>

</head>
<?php

  date_default_timezone_set('Asia/Karachi'); 
 
?>


<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <?php
        require 'header.php';
      ?>
      <!-- Main Content -->
      <div id="content">


        <!-- Begin Page Content -->
        <div class="container">


          <div class="row mt-3">

            <!-- Profile Area -->
            <div class="col-xl-4 col-lg-4">
              <div class="card shadow mb-4">
                <!-- Profile top -->
                <div class="card-header py-3 d-flex bg-light flex-row align-items-center justify-content-between"  style="box-shadow: 1px 0px 2px;">
                  <div class="font-weight-bold text-dark">Welcome,<?php echo $InstitudeName.' ('.$CampusName.')' ?></div>
                </div>
                <!-- Profile Body -->
                <div class="card-body" style="box-shadow: 1px 1px 2px">
                  <div class="row">
                    <div class="col-lg-12 text-center">
                      <img src="<?php echo'../index/'.$Logo?>" style="height: auto;
                           max-width: 100%;height: 60px;margin-top: 0;margin-bottom: 0px">
                    </div>
                  </div>
                  <hr>
                  <div class="row text-center">
                    <div class="col-lg-12 bg-white pl-2">
                      <div class="row mb-2">
                        <div class="col-lg-12">
                          <span class="font-weight-bold" style="font-size: 13px"><?php echo $employeefirstname.' '.$employeelastname?></span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <code class="text-dark font-weight-bold" style="font-size: 13px"><?php echo $Employeecode ?></code>
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-lg-12">
                          <img src="employeepic/<?php echo($employeepicloc)?>" width="25%">
                        </div>
                      </div>
                      <div class="row mt-1">
                        <div class="col-lg-12">
                          <span class="font-weight-bold border p-1 border-secondary" style="font-size: 13px"><?php echo $employeetitle ?>
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-lg-12">
                          <span class="font-weight-bold text-dark" style="font-size: 13px"><?php echo $employeedepartment ?></span>
                        </div>
                      </div>
                      
                    </div>
                  </div>  
                </div>
              </div>
            </div>

            <!-- Update -->
            <div class="col-xl-8 col-lg-8">
              <div class=" mb-4">
                <div class="card-body">
                    <div class="container h5">
                      <div class="row">
                        <div class=" col-xl-6 col-sm-12">
                          <a href="newinquiry.php" class="row m-2 bg-white text-dark shortcutbadge">
                            <div class="col-xl-12 col-sm-12 text-center shortcutbadgepara ">
                              <span class="btntext">Dashboard</span>
                            </div>
                          </a>
                        </div>
                        <div class=" col-xl-6 col-sm-12">
                          <a href="newinquiry.php" class="row m-2 bg-white text-dark shortcutbadge">
                            <div class="col-xl-12 col-sm-12 text-center shortcutbadgepara ">
                              <span class="btntext">Finance Information</span>
                            </div>
                          </a>
                        </div>
                      </div>
                      <div class="row">
                        <div class=" col-xl-6 col-sm-12">
                          <a href="newinquiry.php" class="row m-2 bg-white text-dark shortcutbadge">
                            <div class="col-xl-12 col-sm-12 text-center shortcutbadgepara ">
                              <span class="btntext">Student Attendence</span>
                            </div>
                          </a>
                        </div>
                        <div class=" col-xl-6 col-sm-12">
                          <a href="employeecalendar.php" class="row m-2 bg-white text-dark shortcutbadge">
                            <div class="col-xl-12 col-sm-12 text-center shortcutbadgepara ">
                              <span class="btntext">Calendar</span>
                            </div>
                          </a>
                        </div>
                      </div>
                      <div class="row">
                        <div class=" col-xl-6 col-sm-12">
                          <a href="employeeclasses.php" class="row m-2 bg-white text-dark shortcutbadge">
                            <div class="col-xl-12 col-sm-12 text-center shortcutbadgepara ">
                              <span class="btntext">Classes</span>
                            </div>
                          </a>
                        </div>
                        <div class=" col-xl-6 col-sm-12">
                          <a href="newinquiry.php" class="row m-2 bg-white text-dark shortcutbadge">
                            <div class="col-xl-12 col-sm-12 text-center shortcutbadgepara ">
                              <span class="btntext">Time Table</span>
                            </div>
                          </a>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
              
            </div>
          </div>          

        </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <!-- <footer class="sticky-footer bg-light">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>&copy; Your Software 2020</span>
          </div>
        </div>
      </footer> -->
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
 

</body>

</html>