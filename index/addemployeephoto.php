<?php
 require "profileinfo.php";
?>
<?php
  if (empty($_POST['employeecheck3'])) 
  {
    header('Location:addemployee.php');
  }
  else
  {
    $IsActive = $_POST['IsActive'];
    $ename   = ucwords(strtolower(htmlspecialchars($_POST['ename'])));
    $efname   = ucwords(strtolower(htmlspecialchars($_POST['efname']))); 
    $gender  = $_POST['gender'];
    $dob  = $_POST['dob'];
    $maritalstatus  = $_POST['maritalstatus'];
    $ecnic = htmlspecialchars($_POST['ecnic']);
    $ehomephone = htmlspecialchars($_POST['ehomephone']);
    $ealterphone = htmlspecialchars($_POST['ealterphone']);
    $eemail = strtolower(htmlspecialchars($_POST['eemail']));
    $streetaddress = ucwords(strtolower(htmlspecialchars($_POST['streetaddress'])));
    $apartment = ucwords(strtolower(htmlspecialchars($_POST['apartment'])));
    $ecity = htmlspecialchars($_POST['ecity']);
    $estate = htmlspecialchars($_POST['estate']);
    $zipcode = htmlspecialchars($_POST['zipcode']);
    $emername   = htmlspecialchars($_POST['emername']);
    $emerfname   = htmlspecialchars($_POST['emerfname']);
    $emerrelation   = htmlspecialchars($_POST['emerrelation']);  
    $emerstreetaddress = htmlspecialchars($_POST['emerstreetaddress']);
    $emerapartment = htmlspecialchars($_POST['emerapartment']);
    $emercity = htmlspecialchars($_POST['emercity']);
    $emerstate = htmlspecialchars($_POST['emerstate']);
    $emerzipcode = htmlspecialchars($_POST['emerzipcode']);
    $emerhomephone = htmlspecialchars($_POST['emerhomephone']);
    $emeralterphone = htmlspecialchars($_POST['emeralterphone']);
    $emeremail = htmlspecialchars($_POST['emeremail']);
    $batch = $_POST['batch'];

    $subjects = $_POST['studentsubjects'];
    $studentsubjects = explode(' ', $subjects);
    $department = htmlspecialchars($_POST['department']);
    $startdate = htmlspecialchars($_POST['startdate']);
    
    $title = ucwords(strtolower(htmlspecialchars($_POST['title'])));

    $qualification = $_POST['qualification'];
    $hearfrom = $_POST['hearfrom'];
    $noofsubj= 0;
    foreach ($studentsubjects as  $sub) 
    {
      $noofsubj +=1;
    }
    $signintime = $_POST['signintime'];
    $signintimefinal = explode(':', $signintime);
    if ($signintimefinal[0]=='13') 
    {
      $signintimefinal[0] = '01';
      $daynight = 'pm';
    }
    elseif ($signintimefinal[0]=='14') 
    {
      $signintimefinal[0] = '02';
      $daynight = 'pm';
    }
    elseif ($signintimefinal[0]=='15') 
    {
      $signintimefinal[0] = '03';
      $daynight = 'pm';
    }
    elseif ($signintimefinal[0]=='16') 
    {
      $signintimefinal[0] = '04';
      $daynight = 'pm';
    }
    elseif ($signintimefinal[0]=='17') 
    {
      $signintimefinal[0] = '05';
      $daynight = 'pm';
    }
    elseif ($signintimefinal[0]=='18') 
    {
      $signintimefinal[0] = '06';
      $daynight = 'pm';
    }
    elseif ($signintimefinal[0]=='19') 
    {
      $signintimefinal[0] = '07';
      $daynight = 'pm';
    }
    elseif ($signintimefinal[0]=='20') 
    {
      $signintimefinal[0] = '08';
      $daynight = 'pm';
    }
    elseif ($signintimefinal[0]=='21') 
    {
      $signintimefinal[0] = '09';
      $daynight = 'pm';
    }
    elseif ($signintimefinal[0]=='22') 
    {
      $signintimefinal[0] = '10';
      $daynight = 'pm';
    }
    elseif ($signintimefinal[0]=='23') 
    {
      $signintimefinal[0] = '11';
      $daynight = 'pm';
    }
    elseif ($signintimefinal[0]=='24') 
    {
      $signintimefinal[0] = '12';
      $daynight = 'pm';
    }
    else
    {
      $daynight = 'am';
    }
    $signintime = $signintimefinal[0].':'.$signintimefinal[1].' '.$daynight;

    $signouttime = $_POST['signouttime'];
    $signouttimefinal = explode(':', $signouttime);
    if ($signouttimefinal[0]=='13') 
    {
      $signouttimefinal[0] = '01';
      $daynight = 'pm';
    }
    elseif ($signouttimefinal[0]=='14') 
    {
      $signouttimefinal[0] = '02';
      $daynight = 'pm';
    }
    elseif ($signouttimefinal[0]=='15') 
    {
      $signouttimefinal[0] = '03';
      $daynight = 'pm';
    }
    elseif ($signouttimefinal[0]=='16') 
    {
      $signouttimefinal[0] = '04';
      $daynight = 'pm';
    }
    elseif ($signouttimefinal[0]=='17') 
    {
      $signouttimefinal[0] = '05';
      $daynight = 'pm';
    }
    elseif ($signouttimefinal[0]=='18') 
    {
      $signouttimefinal[0] = '06';
      $daynight = 'pm';
    }
    elseif ($signouttimefinal[0]=='19') 
    {
      $signouttimefinal[0] = '07';
      $daynight = 'pm';
    }
    elseif ($signouttimefinal[0]=='20') 
    {
      $signouttimefinal[0] = '08';
      $daynight = 'pm';
    }
    elseif ($signouttimefinal[0]=='21') 
    {
      $signouttimefinal[0] = '09';
      $daynight = 'pm';
    }
    elseif ($signouttimefinal[0]=='22') 
    {
      $signouttimefinal[0] = '10';
      $daynight = 'pm';
    }
    elseif ($signouttimefinal[0]=='23') 
    {
      $signouttimefinal[0] = '11';
      $daynight = 'pm';
    }
    elseif ($signouttimefinal[0]=='24') 
    {
      $signouttimefinal[0] = '12';
      $daynight = 'pm';
    }
    else
    {
      $daynight = 'am';
    }
    $signouttime = $signouttimefinal[0].':'.$signouttimefinal[1].' '.$daynight;




    // $Logo = $_FILES['Logo'];
    // $LogoName = $_FILES['Logo']['name'];
    // $LogoTmpName = $_FILES['Logo']['tmp_name'];
    // $LogoSize = $_FILES['Logo']['size'];
    // $LogoError = $_FILES['Logo']['error'];
    // $LogoType = $_FILES['Logo']['type'];
    // $logofileExt = explode('.', $LogoName);
    // $logofileActualName = $logofileExt[0];
    // $logofileActualExt = strtolower(end($logofileExt)); 
    // if ($LogoError==0) 
    // {
      
    //   $logofileNameNew = uniqid(true).".".$logofileActualExt;
    //   $logofileDestination = '../employeeportal/employeepic/'.$logofileNameNew;

    //   move_uploaded_file($LogoTmpName, $logofileDestination);
      
    // }
    // else
    // {
      
    // }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>New Employee</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo $TitleLogo?>">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css?v=<?php echo time(); ?>" rel="stylesheet">
  <link href="css/bootstrap.min.css?v=<?php echo time(); ?>" rel="stylesheet">
  <link href="responsive/responsive.css?v=<?php echo time(); ?>" rel="stylesheet">
  <link href="css/style.css?v=<?php echo time(); ?>" rel="stylesheet">


   <script src="js/jquery-3.5.0.min.js"></script>
   <script src="js/sweetalert2.all.min.js"></script>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php
      require 'sidenavigation.php';
    ?>

    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
          <!-- Begin Page Content -->
          <div class="container-fluid">
            <div class="row">
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 text-dark text-center p-1 h5 text-capitalize" style="border-radius: 0px 0px 80px 80px;">
                <div class="text-white" style="box-shadow: 1px 1px 2px black;border-radius: 0px 0px 50px 50px;background-color: #0047AB">New Employee</div>
              </div>
              <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 text-right">
                <a href="viewemployee.php"> 
                  <button class="btn btn-sm btn-secondary mt-2 mr-4 text-white" style="border-radius: 40px;"><i class="fa fa-eye pr-1"></i>View Employee List</button>
                </a>
              </div>
            </div>
            <div class="row mt-5">
              <div class="col-xl-12">
                <div class="container mb-5">
                  
                  <form style="box-shadow: 1px 1px 10px;border: 1px solid black;border-radius: 5px;" action="viewemployee.php" method="post" name="forms" class="form-group needs-validation" novalidate onsubmit="return validation()" enctype="multipart/form-data">
                    <div class="row pl-3 pt-3 pr-3">
                      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 h6 text-center">
                        <div class="container text-white p-2" style="box-shadow: 1px 1px 10px;border-radius: 20px 20px 20px 20px;background-color: #03D913">
                          General Information
                        </div>
                      </div>
                      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 h6 text-center">
                        <div class="container text-white p-2" style="box-shadow: 1px 1px 10px;border-radius: 20px 20px 20px 20px;background-color: #03D913">
                          Sign Subjects
                        </div>
                      </div>
                      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 h6 text-center">
                        <div class="container text-white p-2" style="box-shadow: 1px 1px 10px black;border-radius: 20px 20px 20px 20px;background-color: #03D913">
                           Assign Subjects Fee
                        </div>
                      </div>
                      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 h6 text-center">
                        <div class="container text-white p-2" style="box-shadow: 1px 1px 10px black;border-radius: 20px 20px 20px 20px;background-color: #03D913">
                           Update Picture
                        </div>
                      </div>
                    </div>
                    <hr>

                    <!-- Main page form data starts-->
                    
                    <input type="hidden" name="IsActive" value="<?php echo ($IsActive)?>">
                    <input type="hidden" name="ename" value="<?php echo ($ename)?>">
                    <input type="hidden" name="efname" value="<?php echo ($efname)?>">
                    <input type="hidden" name="gender" value="<?php echo ($gender)?>">
                    <input type="hidden" name="dob" value="<?php echo ($dob)?>">
                    <input type="hidden" name="maritalstatus" value="<?php echo ($maritalstatus)?>">
                    <input type="hidden" name="ecnic" value="<?php echo ($ecnic)?>">
                    <input type="hidden" name="ehomephone" value="<?php echo ($ehomephone)?>">
                    <input type="hidden" name="ealterphone" value="<?php echo ($ealterphone)?>">
                    <input type="hidden" name="eemail" value="<?php echo ($eemail)?>">
                  
                    <input type="hidden" name="streetaddress" value="<?php echo ($streetaddress)?>">
                    <input type="hidden" name="apartment" value="<?php echo ($apartment)?>">
                    <input type="hidden" name="ecity" value="<?php echo ($ecity)?>">
                    <input type="hidden" name="estate" value="<?php echo ($estate)?>">
                    <input type="hidden" name="zipcode" value="<?php echo ($zipcode)?>">
                    <input type="hidden" name="department" value="<?php echo ($department)?>">
                    <input type="hidden" name="startdate" value="<?php echo ($startdate)?>">
                    
                    <input type="hidden" name="qualification" value="<?php echo ($qualification)?>">
                    <input type="hidden" name="title" value="<?php echo ($title)?>">
                    <input type="hidden" name="hearfrom" value="<?php echo ($hearfrom)?>">


                    <input type="hidden" name="emername" value="<?php echo ($emername)?>">
                    <input type="hidden" name="emerfname" value="<?php echo ($emerfname)?>">
                    <input type="hidden" name="emerrelation" value="<?php echo ($emerrelation)?>">
                    <input type="hidden" name="emerstreetaddress" value="<?php echo ($emerstreetaddress)?>">
                    <input type="hidden" name="emerapartment" value="<?php echo ($emerapartment)?>">
                    <input type="hidden" name="emercity" value="<?php echo ($emercity)?>">
                    <input type="hidden" name="emerstate" value="<?php echo ($emerstate)?>">
                    <input type="hidden" name="emerzipcode" value="<?php echo ($emerzipcode)?>">
                    <input type="hidden" name="emerhomephone" value="<?php echo ($emerhomephone)?>">
                    <input type="hidden" name="emeralterphone" value="<?php echo ($emeralterphone)?>">
                    <input type="hidden" name="emeremail" value="<?php echo ($emeremail)?>">

                    <input type="hidden" name="studentsubjects" value="<?php echo ($studentsubjects)?>">
                    <input type="hidden" name="batch" value="<?php echo ($batch)?>">


                    <div class="container">
                      
                      
                      <div class="row">
                        <div class="col-xl-4 col-md-4"></div>
                        <div class="col-xl-4 col-md-4 mt-1 border p-3">
                          <label class="font-weight-bold">Picture :</label>
                          <input type="file" name="Logo" class="form-control-file" required  id="logo" oninput="logocheck()">
                          <div class="invalid-feedback">Select your Picutre.</div> 
                        </div>
                        <div class="col-xl-4 col-md-4"></div>
                      </div>
          
                      <div class="row mt-5 p-2" style="background-color: lightgray">
                        <div class="col-xl-12 col-md-6 text-right">
                          <button type="Reset" name="reset" class="btn btn-sm btn-danger"><i class="fas fa-reply-all pr-2"></i>Reset</button>
                          <button class="btn btn-sm btn-success" type="submit" name="submit">Next<i class="fas fa-arrow-right pl-2"></i></button>
                          <input type="hidden" name="employeecheck1" value="true">
                          <input type="hidden" name="employeecheck3" value="true">
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>      
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>



  <!-- For Form validation starts -->
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

<!-- Form Validaiton ends -->



<script>
  function logocheck()
  {
    var Logo = document.getElementById('logo');
    var logofilePath = Logo.value;
    var allowedextension = /(\.jpg|\.jpeg|\.png|\.JPG|\.JPEG|\.PNG)$/i;
    if ((!allowedextension.exec(logofilePath))||(!allowedextension.exec(titlelogofilePath))) 
    {
      Swal.fire("Error", "Format Not Found", "error");
      Logo.value = '';
      TitleLogo.value = '';
      return false;
    }
    else
    {
      return true;
    }
  }
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
