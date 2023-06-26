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
  <link href="css/bootstrap.min.css?v=<?php echo time(); ?>" rel="stylesheet">
  <link href="responsive/responsive.css?v=<?php echo time(); ?>" rel="stylesheet">

  <script src="js/jquery-3.5.0.min.js"></script>
  <script src="js/sweetalert2.all.min.js"></script>
   <script type="text/javascript">
    function signinalert() 
    {
      alert("helo");
    }

  </script>

</head>
<?php
    
  date_default_timezone_set('Asia/Karachi'); 
  if (!empty($_POST['employeecode'])) 
  {
    $current_date = date('D d F Y');
    $current_time = date('h:i a');
    $split = explode(' ', $current_date);
    $day = $split[0];
    $date = $split[1];
    $month = $split[2];
    $year = $split[3];
    $employeecode = $_POST['employeecode'];

    


    require 'connectdatabase.php';

    $employeecodequery = " SELECT COUNT(Employee_Code) as employee_attendence_no 
                      FROM employee_attendence
                      WHERE (CampusId = '$CampusId') AND (Attendence_Date = '$date') AND (Attendence_Month = '$month') AND (Attendence_Year = '$year') AND (Employee_Code = '$employeecode')
                      ";
    $query1 = mysqli_query($conn,$employeecodequery);
    $employee_attendence_no = mysqli_fetch_array($query1);
    $no_of_employee_code = $employee_attendence_no['employee_attendence_no'];
    
    if ($no_of_employee_code <= 0) 
    { 
      if(!empty($_POST['absent']))
      {
        $addemployeeattendence = "INSERT INTO employee_attendence(CampusId,Attendence_Day,Attendence_Date,Attendence_Month,Attendence_Year,SignIn_Time,Last_Updated_Date,Employee_Code)
            VALUES ('$CampusId','$day','$date','$month','$year','','','$employeecode')";
        if (mysqli_query($conn, $addemployeeattendence)) 
        {
          ?>
            <div class="alert alert-danger alert-dismissible m-4">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              Absent Mark
            </div>
          <?php
        } 
        else 
        {
          echo 
            '<input type="hidden" >
            <script>
              Swal.fire("Error", "Something went wrong", "error");
            </script>
            ';   
        }  
      }
      else
      {

        $addemployeeattendence = "INSERT INTO employee_attendence(CampusId,Attendence_Day,Attendence_Date,Attendence_Month,Attendence_Year,SignIn_Time,Last_Updated_Date,Employee_Code)
            VALUES ('$CampusId','$day','$date','$month','$year','$current_time','$current_date','$employeecode')";
        if (mysqli_query($conn, $addemployeeattendence)) 
        {
          ?>
            <div class="alert alert-success alert-dismissible m-4">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              You have arrived at : <strong><?php echo$current_time ?></strong> 
            </div>
          <?php
        } 
        else 
        {
          echo 
            '<input type="hidden" >
            <script>
              Swal.fire("Error", "Something went wrong", "error");
            </script>
            ';   
        } 
      }
      
    }
    else
    {
      $employeetimeoutcheck = "SELECT SignOut_Time, SignIn_Time
                            FROM employee_attendence
                            WHERE (CampusId = '$CampusId') AND (Attendence_Date = '$date') AND (Attendence_Month = '$month') AND (Attendence_Year = '$year') AND (Employee_Code = '$employeecode')
                            ";
      $query2 = mysqli_query($conn,$employeetimeoutcheck);
      $employee_timeout_no = mysqli_fetch_array($query2);
      $no_of_employeetimeout_code = $employee_timeout_no['SignOut_Time'];
      $no_of_employeetimein_code = $employee_timeout_no['SignIn_Time'];
      echo $no_of_employeetimeout_code;
      if (empty($no_of_employeetimeout_code) && !empty($no_of_employeetimein_code)) 
      {
        $marksignouttime = "UPDATE employee_attendence 
                            SET SignOut_Time='$current_time'
                            WHERE (CampusId = '$CampusId') AND (Attendence_Date = '$date') AND (Attendence_Month = '$month') AND (Attendence_Year = '$year') AND (Employee_Code = '$employeecode')
                            ";
        if (mysqli_query($conn,$marksignouttime)) 
        {
          ?>
            <div class="alert alert-success alert-dismissible m-4">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              Deparcher at : <strong><?php echo$current_time ?></strong> 
            </div>
          <?php  
        }
      }
      else
      {

      }
    }
  }
  $employeecodedata = "SELECT DISTINCT(Employee_Code),(Employee_First_Name) 
          FROM employeelist
          WHERE CampusId='$CampusId'";
  $query = mysqli_query($conn,$employeecodedata);
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
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="box-shadow: 1px 0px 2px">
                  <h6 class="m-0 font-weight-bold text-primary">Attendence</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body text-right" style="box-shadow: 1px 0px 2px">
                    <div class="container">
                      <form class="form container text-center needs-validation" novalidate action="dashboard.php" method="post">
                        <select name="employeecode" class="form-control form-control-sm" required>
                          <option value="" style="background-color: lightgray">TEACHER CODE</option>
                          <?php
                            while ($row1 = mysqli_fetch_assoc($query)) 
                            {
                              ?>
                                <option value="<?php echo$row1['Employee_Code']?>"><?php echo$row1['Employee_Code'].' / '.$row1['Employee_First_Name']?></option>
                              <?php  
                            }
                          ?>
                        </select>
                        <button class="btn btn-sm btn-success mt-2 text-uppercase" title="Sign In">Click to Sign In<i class="fas fa-sign-in-alt pl-2"></i></button>
                        <button class="btn btn-sm btn-danger mt-2 text-uppercase" title="Sign Out">Click to sign out<i class="fas fa-sign-out-alt pl-2"></i></button>
                        <br>
                        <button class="btn btn-sm btn-warning mt-3 text-uppercase font-weight-bold" value="check" name="absent" title="Sign Out">Absent<i class="fas fa-exclamation-circle pl-2"></i></button>
                        <br>
                      </form>
                      
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


  <script>
    // Disable form submissions if there are invalid fields
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Get the forms we want to add validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
  </script>

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