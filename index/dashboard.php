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
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo $TitleLogo?>">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css?v=<?php echo time(); ?>" rel="stylesheet">
  <link href="css/bootstrap.min.css?v=<?php echo time(); ?>" rel="stylesheet">
  <link href="responsive/responsive.css?v=<?php echo time(); ?>" rel="stylesheet">
</head>


<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php
      require 'sidenavigation.php';
    ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <?php
        require 'header.php';
      ?>
      <!-- Main Content -->
      <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Content Row -->
          

          <!-- Content Row -->

          <div class="row mt-3">

            <!-- Profile Area -->
            <div class="col-xl-4 col-lg-4">
              <div class="card shadow mb-4">
                <!-- Profile top -->
                <div class="card-header py-3 d-flex bg-light flex-row align-items-center justify-content-between"  style="box-shadow: 1px 0px 10px;">
                  <div class="font-weight-bold text-dark">Welcome,<?php echo $InstitudeName.' ('.$CampusName.')' ?></div>
                </div>
                <!-- Profile Body -->
                <div class="card-body" style="box-shadow: 1px 3px 5px">
                  <div class="row">
                    <div class="col-lg-12 text-center">
                      <img src="<?php echo$Logo?>" style="height: auto;
                           max-width: 100%;height: 60px;margin-top: 0;margin-bottom: 0px">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-lg-12 bg-white pl-2">
                      <div class="row">
                        <div class="col-lg-12">
                          <h6>Campus ID :<span class="font-weight-bold" style="font-size: 13px"><?php echo $CampusId?></span></h6>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <h6>Principal : <span class="font-weight-bold" style="font-size: 13px"><?php echo $PrincipleName?></span></h6>
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-lg-12">
                          <h6>Phone : <span class="font-weight-bold" style="font-size: 13px"><?php echo $InstitudeAddmissionNum ?></span></h6>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <h6>Email : <span class="font-weight-bold" style="font-size: 13px"><?php echo $InstitudeEmail ?></span></h6>
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-lg-12">
                          <h6>Address : <span class="font-weight-bold" style="font-size: 13px"><?php echo $InstitudeAddress ?></span></h6>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <h6>Login Time : <span class="font-weight-bold" style="font-size: 13px"><?php echo $datentime?></span></h6>
                        </div>
                      </div>
                    </div>
                  </div>  
                </div>
              </div>
            </div>

            <!-- Update -->
            <div class="col-xl-8 col-lg-8">
              <div class="card shadow mb-4">
                <!-- Update Top -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="box-shadow: 1px 0px 5px">
                  <h6 class="m-0 font-weight-bold text-primary">Software Updates</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body" style="box-shadow: 1px 0px 5px">
                  <marquee direction = "down" style="height: 200px;font-size: 15px" onmouseover="this.stop();" onmouseout="this.start();" scrollamount="5" >
                    <ul style="color: blue"> 
                      <li><a href="viewstudent.php">Printable blank student form</a><br><br></li>
                      <li><a href="viewdepartment.php">Now Setup your Department</a><br><br></li>
                      <li><a href="">Shortcut Buttons in Student and Inquiry Forms</a><br><br></li>
                      <li><a href="viewemployee.php">New Employee System</a></li>
                    </ul>
                  </marquee>
                </div>
              </div>
            </div>
          </div>

          <!-- under constraction starts -->
          <div style="display: none;">
          <div class="row pl-2 mt-4">
            <div class="col-lg-12 h4 font-weight-bold " style="font-family: verdana">Statistics</div>
          </div>
          <hr>
          <div class="row">
            <!-- Today inquiry card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2" style="background-color: #008E55" >
                <div class="card-body"  style="box-shadow: 1px 0px 5px">
                  <a href="" style="text-decoration: none;">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-white text-uppercase mb-1" style="font-size: 15px">Today's Student Inquiry</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-white">4</div>
                      </div>
                      <div class="col-auto">
                        <img src="pics/Inquiry.png" class="icon" style="height: 50px;width: 50px;">
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>

            <!-- Today admission student -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2" style="background-color: #2461DC" >
                <div class="card-body"  style="box-shadow: 1px 0px 5px">
                  <a href="" style="text-decoration: none;">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-white text-uppercase mb-1" style="font-size: 15px">Today's Student admission</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-white">4</div>
                      </div>
                      <div class="col-auto">
                        <img src="pics/admited.png" class="icon" style="height: 50px;width: 50px;">
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>

            <!-- Today staff Interview -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2" style="background-color: #0DAFB7" >
                <div class="card-body"  style="box-shadow: 1px 0px 5px">
                  <a href="" style="text-decoration: none;">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-white text-uppercase mb-1" style="font-size: 15px">Today's Staff Interview</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-white">4</div>
                      </div>
                      <div class="col-auto">
                        <img src="pics/interview.png" class="icon" style="height: 60px;width: 60px;">
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>

            <!-- Today fee recevied -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2" style="background-color: #9E6B57" >
                <div class="card-body"  style="box-shadow: 1px 0px 5px">
                  <a href="" style="text-decoration: none;">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-white text-uppercase mb-1" style="font-size: 15px">Today's Fee Recevied</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-white">4</div>
                      </div>
                      <div class="col-auto">
                        <img src="pics/cashrec.png" class="icon" style="height: 70px;width: 70px;">
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
        </div>
        <!-- /.container-fluid -->

        <div class="row mt-4 pl-2">
            <div class="col-lg-12 h4 font-weight-bold " style="font-family: verdana">Attendence</div>
        </div>
        <hr>

        <!-- Attendence row -->
        <div class="row">
          <div class="col-lg-6">
            <div class="card shadow mb-4">
            <!-- attendence student top -->
              <div class="card-header py-3 bg-dark d-flex bg-light flex-row align-items-center justify-content-between"  style="box-shadow: 1px 0px 5px">
                <div class="font-weight-bold text-white h5">Students Attendence</div>
              </div>
            <!-- attendence Body -->
              <div class="card-body bg-light" style="box-shadow: 1px 3px 5px;">
                <div class="row">
                  <div class="col-lg-12 card border-left-primary" style="background-color: #008000" >
                    <div class="card-body"  style="box-shadow: 1px 0px 5px">
                      <a href="" style="text-decoration: none;">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1" style="font-size: 15px">Present</div>
                          </div>
                          <div class="col-auto text-white h4">
                            4
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div> 
                <div class="row mt-2">
                  <div class="col-lg-12 card border-left-primary" style="background-color: #FF0000" >
                    <div class="card-body"  style="box-shadow: 1px 0px 5px">
                      <a href="" style="text-decoration: none;">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1" style="font-size: 15px">Absent</div>
                          </div>
                          <div class="col-auto text-white h4">
                            5
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div> 
                <div class="row mt-2">
                  <div class="col-lg-12 card border-left-primary" style="background-color: #D09C00" >
                    <div class="card-body"  style="box-shadow: 1px 0px 5px">
                      <a href="" style="text-decoration: none;">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1" style="font-size: 15px">Leave</div>
                          </div>
                          <div class="col-auto text-white h4">
                            5
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col-lg-12 card border-left-primary" style="background-color: #800080" >
                    <div class="card-body"  style="box-shadow: 1px 0px 5px">
                      <a href="" style="text-decoration: none;">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1" style="font-size: 15px">Half Leave</div>
                          </div>
                          <div class="col-auto text-white h4">
                            5
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col-lg-12 card border-left-primary" style="background-color: #00B5AD" >
                    <div class="card-body"  style="box-shadow: 1px 0px 5px">
                      <a href="" style="text-decoration: none;">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1" style="font-size: 15px">Late</div>
                          </div>
                          <div class="col-auto text-white h4">
                            5
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card shadow mb-4">
            <!-- attendence student top -->
              <div class="card-header py-3 bg-dark d-flex bg-light flex-row align-items-center justify-content-between"  style="box-shadow: 1px 0px 5px">
                <div class="font-weight-bold text-white h5">Teachers Attendence</div>
              </div>
            <!-- attendence Body -->
              <div class="card-body bg-secondary" style="box-shadow: 1px 3px 5px;">
                <div class="row">
                  <div class="col-lg-12 card border-left-primary" style="background-color: #008000" >
                    <div class="card-body"  style="box-shadow: 1px 0px 5px">
                      <a href="" style="text-decoration: none;">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1" style="font-size: 15px">Present</div>
                          </div>
                          <div class="col-auto text-white h4">
                            4
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div> 
                <div class="row mt-2">
                  <div class="col-lg-12 card border-left-primary" style="background-color: #FF0000" >
                    <div class="card-body"  style="box-shadow: 1px 0px 5px">
                      <a href="" style="text-decoration: none;">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1" style="font-size: 15px">Absent</div>
                          </div>
                          <div class="col-auto text-white h4">
                            5
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div> 
                <div class="row mt-2">
                  <div class="col-lg-12 card border-left-primary" style="background-color: #D09C00" >
                    <div class="card-body"  style="box-shadow: 1px 0px 5px">
                      <a href="" style="text-decoration: none;">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1" style="font-size: 15px">Leave</div>
                          </div>
                          <div class="col-auto text-white h4">
                            5
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col-lg-12 card border-left-primary" style="background-color: #800080" >
                    <div class="card-body"  style="box-shadow: 1px 0px 5px">
                      <a href="" style="text-decoration: none;">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1" style="font-size: 15px">Half Leave</div>
                          </div>
                          <div class="col-auto text-white h4">
                            5
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col-lg-12 card border-left-primary" style="background-color: #00B5AD" >
                    <div class="card-body"  style="box-shadow: 1px 0px 5px">
                      <a href="" style="text-decoration: none;">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1" style="font-size: 15px">Late</div>
                          </div>
                          <div class="col-auto text-white h4">
                            5
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Attendence ends -->

        <!-- Summary of accounts starts -->
        <div class="row pl-2 mt-4">
          <div class="col-lg-12 h4 font-weight-bold " style="font-family: verdana">Summary of Accounts(April)</div>
        </div>
        <hr>


        <div class="row">
            <!-- Total Recevied -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2" style="background-color: #D39E00" >
                <div class="card-body"  style="box-shadow: 1px 0px 5px">
                  <a href="" style="text-decoration: none;">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-white text-uppercase mb-1" style="font-size: 15px">Total Received</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-white">4RS</div>
                      </div>
                      <div class="col-auto">
                        <img src="pics/received.png" class="icon" style="height: 70px;width: 70px;">
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>

            <!-- Total Expenses -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2" style="background-color: #CD4141" >
                <div class="card-body"  style="box-shadow: 1px 0px 5px">
                  <a href="" style="text-decoration: none;">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-white text-uppercase mb-1" style="font-size: 15px">Total Expenses</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-white">4</div>
                      </div>
                      <div class="col-auto">
                        <img src="pics/expenses.png" class="icon" style="height: 70px;width: 70px;">
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>

            <!-- Cash balance-->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2" style="background-color: #B5CC18" >
                <div class="card-body"  style="box-shadow: 1px 0px 5px">
                  <a href="" style="text-decoration: none;">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-white text-uppercase mb-1" style="font-size: 15px">Cash Balance</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-white">4</div>
                      </div>
                      <div class="col-auto">
                        <img src="pics/account.png" class="icon" style="height: 70px;width: 70px;">
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
        </div>

        <!-- Summary of Accounts ends -->

        <!-- Students's Overview -->

        <div class="row pl-2 mt-4">
          <div class="col-lg-12 h4 font-weight-bold " style="font-family: verdana">Students Overview</div>
        </div>
        <hr>

        <div class="row">
            <!-- All Student -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2" style="background-color: #895555" >
                <div class="card-body"  style="box-shadow: 1px 0px 5px">
                  <a href="" style="text-decoration: none;">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-white text-uppercase mb-1" style="font-size: 15px">All Students</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-white">4</div>
                      </div>
                      <div class="col-auto">
                        <img src="pics/student.png" class="icon" style="height: 70px;width: 70px;">
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>


             <!-- Active Student -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2" style="background-color: #008E55" >
                <div class="card-body"  style="box-shadow: 1px 0px 5px">
                  <a href="" style="text-decoration: none;">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-white text-uppercase mb-1" style="font-size: 15px">Active Students</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-white">4</div>
                      </div>
                      <div class="col-auto">
                        <img src="pics/student.png" class="icon" style="height: 70px;width: 70px;">
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>

            <!-- Inactive Student -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2" style="background-color: #FF6666" >
                <div class="card-body"  style="box-shadow: 1px 0px 5px">
                  <a href="" style="text-decoration: none;">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-white text-uppercase mb-1" style="font-size: 15px">Inactive Student</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-white">4</div>
                      </div>
                      <div class="col-auto">
                        <img src="pics/student.png" class="icon" style="height: 70px;width: 70px;">
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>

            <!-- Guardina's-->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2" style="background-color: #5897FB" >
                <div class="card-body"  style="box-shadow: 1px 0px 5px">
                  <a href="" style="text-decoration: none;">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-white text-uppercase mb-1" style="font-size: 15px">Guardian's</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-white">4</div>
                      </div>
                      <div class="col-auto">
                        <img src="pics/guardian.png" class="icon" style="height: 70px;width: 70px;">
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
        </div>
        <!-- Students OverView Ends -->


        <!-- Staff Overview -->

        <div class="row pl-2 mt-4">
          <div class="col-lg-12 h4 font-weight-bold " style="font-family: verdana">Staff Overview</div>
        </div>
        <hr>

        <div class="row">
            <!-- All staff -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2" style="background-color: #B5CC18" >
                <div class="card-body"  style="box-shadow: 1px 0px 5px">
                  <a href="" style="text-decoration: none;">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-white text-uppercase mb-1" style="font-size: 15px">All Staff</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-white">4</div>
                      </div>
                      <div class="col-auto">
                        <img src="pics/accontent.png" class="icon" style="height: 70px;width: 70px;">
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>


            <!-- Acitve Staff -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2" style="background-color: #C39D9D" >
                <div class="card-body"  style="box-shadow: 1px 0px 5px">
                  <a href="" style="text-decoration: none;">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-white text-uppercase mb-1" style="font-size: 15px">Active Staff</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-white">4</div>
                      </div>
                      <div class="col-auto">
                        <img src="pics/accontent.png" class="icon" style="height: 70px;width: 70px;">
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>

            <!-- Inactive staff -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2" style="background-color: #D09C00" >
                <div class="card-body"  style="box-shadow: 1px 0px 5px">
                  <a href="" style="text-decoration: none;">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-white text-uppercase mb-1" style="font-size: 15px">Inactive Staff</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-white">4</div>
                      </div>
                      <div class="col-auto">
                        <img src="pics/accontent.png" class="icon" style="height: 70px;width: 70px;">
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
        </div>
        <!-- Students OverView Ends -->
        </div>
        <!-- under constraction ends -->

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
