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
    function signinalert() 
    {
      alert("helo");
    }

  </script>

</head>
<?php

  $employeeattendence ="SELECT * 
                        FROM employee_attendence
                        WHERE CampusId='$CampusId' AND Employee_Code='$Employeecode'
                        ";
  $query = mysqli_query($conn,$employeeattendence);

  $nooftotalemployeeattendence = "SELECT COUNT(Employee_Attendence_Id) as employeeattendenceno 
                                  FROM employee_attendence
                                  WHERE CampusId='$CampusId' AND Employee_Code='$Employeecode'
                                  ";
  $query4 = mysqli_query($conn,$nooftotalemployeeattendence);
  $employeeattendenceno = mysqli_fetch_array($query4);
  $no_Of_total_student = $employeeattendenceno['employeeattendenceno'];
  $currentmonth = date('F');
  $currentyear = date('Y');

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
          
          <div class="row mt-2">
            <div class=" col-xl-4 col-sm-4">
              <!-- Profile Body -->
              <div class="card-body bg-white" style="box-shadow: 1px 1px 2px;border: 1px solid #344070;border-radius: 5px;">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="font-weight-bold text-uppercase" style="color: #344070"><?php echo $employeefirstname.' '.$employeelastname ?></div>
                    <div class="font-weight-bold text-dark mt-2"><?php echo $InstitudeName.' ('.$CampusName.')' ?></div>
                  </div>
                </div> 
              </div>
            </div>
            <div class=" col-xl-4 col-sm-4">
              <!-- Profile Body -->
              <div class="card-body bg-white" style="box-shadow: 1px 1px 2px;border: 1px solid #344070;border-radius: 5px;">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="font-weight-bold text-dark text-uppercase">Timings</div>
                    <div class="font-weight-bold text-uppercase mt-2" style="color: #344070"><?php echo $employeesignintime.' - '.$employeesignouttime ?></div>
                  </div>
                </div> 
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-xl-8 col-sm-8"></div>
            <div class="col-xl-2 col-sm-2">
              <select class="form-control form-control-sm" id="bymonth" oninput="filter()" style="border: 2px solid #344070">
                <option value="<?php echo$currentmonth ?>" style="background-color: lightgray"><?php echo$currentmonth ?></option>
                <option value="">All</option>
                <option value="January">January</option>
                <option value="February">February</option>
                <option value="March">March</option>
                <option value="April">April</option>
                <option value="May">May</option>
                <option value="June">June</option>
                <option value="July">July</option>
                <option value="August">August</option>
                <option value="September">September</option>
                <option value="October">October</option>
                <option value="November">November</option>
                <option value="December">December</option>
              </select>
            </div>
           <div class="col-xl-2 col-sm-2">
              <select class="form-control form-control-sm" id="byyear" oninput="filter()" style="border: 2px solid #344070">
                <option value="<?php echo$currentyear ?>" style="background-color: lightgray"><?php echo$currentyear ?></option>
                <option value="<?php echo$currentyear-1 ?>"><?php echo$currentyear -1 ?></option>
                <option value="<?php echo$currentyear-2 ?>"><?php echo$currentyear -2 ?></option>
                <option value="<?php echo$currentyear-3 ?>"><?php echo$currentyear -3 ?></option>
                <option value="<?php echo$currentyear-4 ?>"><?php echo$currentyear -4 ?></option>
                <option value="<?php echo$currentyear-5 ?>"><?php echo$currentyear -5 ?></option>
                <option value="">All</option>
              </select>
            </div>
          </div>

          <div class="row mt-3">            
            <div class="col-xl-12 table-responsive">
            
              <table class="table table-sm text-center table-bordered" id="tablebody"  style="font-size: 14px;line-height: 25px;box-shadow: 1px 1px 5px  black ">
                <tr style="background-color: #344070;color: white" >
                  <th class="text-center">Day</th>
                  <th class="text-center">Date</th>
                  <th class="text-center">Sign In Time</th>
                  <th class="text-center">Sign Out Time</th>
                </tr>
                <?php
                  if ($no_Of_total_student==0) 
                  {
                      echo "
                      <td style='border:0px;font-style:italic'>no record</td>
                      <td class='border-0'></td>
                      <td class='border-0 '></td>
                      <td class='border-0 '></td>
                      <td class='border-0 '></td>
                      <td class='border-0 '></td>
                      <td class='border-0 '></td>
                      <td class='border-0 '></td>
                      ";
                  }
                  else
                  {
                      $i=0;
                      while($row = mysqli_fetch_assoc($query)) 
                      {
                      ?>
                        <tr>
                          <td style="line-height: 35px">
                            <?php echo $row['Attendence_Day'].'day'?>    
                          </td>
                          <td style="line-height: 35px">
                            <?php echo $row['Attendence_Date'].'/'.$row['Attendence_Month'].'/'.$row['Attendence_Year']?>    
                          </td>
                          <?php 
                            if(empty($row['SignIn_Time'])&&empty($row['SignOut_Time']))
                            {
                              ?>

                                <td colspan="2" style="line-height: 35px">
                                  <form action="leaveapplication.php" method="post">
                                    <input type="hidden" name="employeeid" value="<?php echo$row['Employee_Attendence_Id']?>">
                                    <button class="btn btn-block btn-outline-danger">Raised Application</button>
                                  </form>
                                </td>
                                
                              <?php
                            }
                            else
                            {
                              ?>
                                <td style="line-height: 35px">
                                <?php echo $row['SignIn_Time']?>
                                </td>
                                <td style="line-height: 35px">
                                  <?php echo $row['SignOut_Time']?>   
                                </td>
                              <?php
                            }
                            
                          ?>
                        </tr>
                      <?php
                      $i+=1;
                      }
                  }
                ?>
                  <tr style="background-color: lightgray">
                      <td class="border-0 font-italic" style="font-size: 14px;">Total : <span id="totalrecord"><?php echo $no_Of_total_student ?></span></td>
                      <td class="border-0 "></td>
                      <td class="border-0 "></td>
                      <td class="border-0 "></td>
                  </tr>
              </table>
              
              
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
    function filter() 
    {
      
      var bymonth = document.getElementById('bymonth').value;
      var byyear  = document.getElementById('byyear').value;

      var tablebody = document.getElementById('tablebody');
      var tr = document.getElementsByTagName('tr');
      for (var i=0 ;i<tr.length-1 ;i++) 
      {
        var td1 = tr[i].getElementsByTagName('td')[1];
        if (td1) 
        {
          
          var textvalue1 = td1.textContent || td1.innerHTML;
          
          if ((textvalue1.indexOf(bymonth)>-1) &&(textvalue1.indexOf(byyear)>-1) )  
          {
            tr[i].style.display = "";
          }
          else
          {
            tr[i].style.display= "none";
          }
        }
      } 
      var j = 0;
      for (var i=1 ;i<tr.length-1 ;i++) 
      {
        if (tr[i].style.display=="none") 
        {

        }
        else
        {
          j+=1;
        }
      }
      document.getElementById('totalrecord').innerHTML=j;
    }
    filter();
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