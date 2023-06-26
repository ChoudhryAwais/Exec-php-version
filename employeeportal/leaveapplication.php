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
  if (!empty($_POST['employeeid'])) 
  {
    $employeeid = $_POST['employeeid'];  
  }
  else
  {

  }
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
          

          <div class="row mt-3">            
            <div class="col-xl-12 table-responsive">
              <form style="box-shadow: 1px 1px 10px;border: 1px solid black;border-radius: 5px;" action="leaveapplication.php" method="post" name="forms" class="form-group needs-validation" novalidate onsubmit="return validation()">
                <div class="row pl-3 pt-3 pr-3">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 h6 text-center">
                      <div class="container text-white p-1" style="box-shadow: 1px 1px 10px black;border-radius: 20px 20px 20px 20px;background-color: #03D913">
                          Drop your Application here
                      </div>
                    </div>
                    
                </div>
                <hr>
                <div class="container">  
                  <div class="row">
                    <div class="col-xl-12 col-md-12">
                      <label class="h6 pl-1" style="font-family: verdana">Reason :</label>
                      <textarea class="form-control form-control-sm mt-1 text-capitalize" rows="9" name="reasonapplication" style="text-align: left;"></textarea>
                      <input type="hidden" name="employeeid" value="<?php echo($employeeid)?>">
                    </div>
                  </div>
                  
                  <div class="row mt-5 p-2" style="background-color: lightgray">
                    <div class="col-xl-12 col-md-6 text-right">
                      <button type="Reset" name="reset" class="btn btn-sm btn-danger"><i class="fas fa-reply-all pr-2"></i>Reset</button>
                      <button class="btn btn-sm btn-success" type="submit" name="submit">Next<i class="fas fa-arrow-right pl-2"></i></button>
                      <input type="hidden" name="studentcheck1" value="true">
                    </div>
                  </div>
                </div>
              </form>     
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