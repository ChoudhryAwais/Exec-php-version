<?php
 require "profileinfo.php";
?>
<?php
if (empty($_POST['editemployeecheck2'])) 
{
  header('Location:editemployee.php');
}
else
{
  $classes = $_POST['classes'];
  $IsActive = $_POST['IsActive'];
  $ename   = htmlspecialchars($_POST['ename']);
  $efname   = htmlspecialchars($_POST['efname']); 
  $gender  = $_POST['gender'];
  $dob  = $_POST['dob'];
  $maritalstatus  = $_POST['maritalstatus'];
  $ecnic = htmlspecialchars($_POST['ecnic']);
  $ehomephone = htmlspecialchars($_POST['ehomephone']);
  $ealterphone = htmlspecialchars($_POST['ealterphone']);
  $eemail = htmlspecialchars($_POST['eemail']);
  $streetaddress = htmlspecialchars($_POST['streetaddress']);
  $apartment = htmlspecialchars($_POST['apartment']);
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


  $department = htmlspecialchars($_POST['department']);
  $startdate = htmlspecialchars($_POST['startdate']);
  $salaryinpkr = htmlspecialchars($_POST['salaryinpkr']);
  $salaryinper = htmlspecialchars($_POST['salaryinper']);
  $title = $_POST['title'];
  $qualification = $_POST['qualification'];
  $hearfrom = $_POST['hearfrom'];


  $batch = $_POST['batch'];
  $status = $_POST['status'];
  $group = $_POST['group'];
  $board = $_POST['board'];


  $idofemployee = $_POST['idofemployee'];
  require 'connectdatabase.php';
  $editemployee="SELECT *
                FROM employeelist
                WHERE EmployeeId= '$idofemployee'";
  $query = mysqli_query($conn,$editemployee);
  $editemployeedata = mysqli_fetch_array($query);
  $subject_actual_name = $editemployeedata['Subjects'];
  $subjects_actual_name = explode(' ', $subject_actual_name);

  // echo "Academic Info"; echo "<br>";
  // echo $batch; echo "<br>";
  // echo $status; echo "<br>";
  // echo $group; echo "<br>";
  // echo $board; echo "<br>";


  // echo $classes;
  // echo $IsActive;
  // echo $sname;
  // echo $sfname;
  // echo $gender;
  // echo $dob;
  // echo $sdomicile;
  // echo $sreligion;
  // echo $scnic;
  // echo $snationality;
  // echo $saddress;
  // echo $sphone;
  // echo $scell;
  // echo $semail;
  // echo $hearfrom;

  // echo $gname;
  // echo $gcnic;
  // echo $gemail;
  // echo $gphone;
  // echo $gcell;
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

  <title>Edit Employee</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo $TitleLogo?>">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css?v=<?php echo time(); ?>" rel="stylesheet">
  <link href="css/bootstrap.min.css?v=<?php echo time(); ?>" rel="stylesheet">
  <link href="responsive/responsive.css?v=<?php echo time(); ?>" rel="stylesheet">
  <link href="css/style.css?v=<?php echo time(); ?>" rel="stylesheet">
</head>
<script>
  function validation()
  {
    var noofsubjects = document.getElementById('noofsubj').value;
    var j = 0;
    for (var i =0; i<noofsubjects; i++) 
    {
      var sub = document.getElementById('sub'+i);
      if (sub.checked) 
      {
        j+=1;
      }
      else
      {

      }
    }
    if (j==0) 
    {
      document.getElementById('subjerror').innerHTML="*Select Atleast One Subject";
      return false;
    }
    else
    {
      return true;
    }
    
  }
</script>


<?php
  require 'connectdatabase.php';
  $subjectsdata = "SELECT SubjectsName
         FROM subjects
         WHERE CampusId = '$CampusId' AND GroupsName='$group' AND ClassesName = '$classes' AND BoardsName = '$board';
        ";
  $query3 = mysqli_query($conn,$subjectsdata);
  
?>


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
                <div class="text-white" style="box-shadow: 1px 1px 2px black;border-radius: 0px 0px 50px 50px;background-color: #0047AB">Edit Employee</div>
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
                  
                  <form style="box-shadow: 1px 1px 10px;border: 1px solid black;border-radius: 5px;" action="viewemployee.php" method="post" name="forms" class="form-group needs-validation" novalidate onsubmit="return validation()">


                    <!-- Main page form data starts-->
                    <input type="hidden" name="classes" value="<?php echo ($classes)?>">
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
                    <input type="hidden" name="salaryinpkr" value="<?php echo ($salaryinpkr)?>">
                    <input type="hidden" name="salaryinper" value="<?php echo ($salaryinper)?>">
                    <input type="hidden" name="title" value="<?php echo ($title)?>">
                    <input type="hidden" name="qualification" value="<?php echo ($qualification)?>">
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

                    <!-- Main page form data ends -->


                    <!-- Second page form data Starts -->
                    <input type="hidden" name="batch" value="<?php echo ($batch)?>">
                    <input type="hidden" name="group" value="<?php echo ($group)?>">
                    <input type="hidden" name="status" value="<?php echo ($status)?>">
                    <input type="hidden" name="board" value="<?php echo ($board)?>">
                    <!-- Second page form data ends -->


                    <div class="row pl-3 pr-3 pt-3">
                      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 h6 text-center">
                        <div class="container text-white p-2" style="box-shadow: 1px 1px 10px black;border-radius: 20px 20px 20px 20px;background-color: #03D913">
                          General Information
                        </div>
                      </div>
                      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 h6 text-center">
                        <div class=" container text-white p-2" style="box-shadow: 1px 1px 10px black;border-radius: 20px 20px 20px 20px;background-color: #03D913">
                          Assign Group
                        </div>
                      </div>
                      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 h6 text-center">
                        <div class=" container text-white p-2" style="box-shadow: 1px 1px 10px black;border-radius: 20px 20px 20px 20px;background-color: #03D913">
                          Assign Subject
                        </div>
                      </div>
                    </div>
                    <hr>



                    <div class="container">
                      <div class="row mt-2">
                        <div class="col-xl-12 p-1 h6 text-center text-white font-weight-bold text-uppercase" style="background-color: #323E6F;">Employee Detail</div>
                      </div>
                      <table class="table" style="box-shadow: 1px 1px 5px">
                        <tr>
                          <td class="h6 text-uppercase" style="background-color: #D3D3D3;width: 20%">Class</td>
                          <td><?php echo $classes?></td>
                          <td class="text-right"><i class="fas fa-check-circle text-success" style="font-size: 22px"></i></td>
                        </tr>
                      </table>
                      <table class="table" style="box-shadow: 1px 1px 5px">
                        <tr>
                          <td class="h6 text-uppercase" style="background-color: #D3D3D3;width: 20%">Group</td>
                          <td><?php echo $group?></td>
                          <td class="text-right"><i class="fas fa-check-circle text-success" style="font-size: 22px"></i></td>
                        </tr>
                      </table>
                      <div class="row mt-4">
                        <div class="col-xl-12 p-1 h6 text-center text-white font-weight-bold text-uppercase" style="background-color: #323E6F;">Assign Subjects
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-xl-12 text-center" style="color: red;font-size: 12px;">
                          <span id="subjerror"></span>
                        </div>
                      </div>
                      <?php  
                        echo "<div class='row mt-3 pl-5' id='subjs'>";
                          $noofsubj = 0;
                          while ($row = mysqli_fetch_assoc($query3)) 
                          {
                            
                            if (in_array($row['SubjectsName'], $subjects_actual_name)) 
                            {
                              ?>
                                <div class="col-xl-3 col-md-4" style="font-size: 13px">
                                  <input onclick='feecalculator()' checked type="checkbox" id="sub<?php echo $noofsubj?>" name="sub[]" value="<?php echo $row['SubjectsName']?>">
                                  <label for="sub<?php echo $noofsubj?>"><?php echo $row['SubjectsName']?></label>
                                </div>
                              <?php
                            }
                            else
                            {
                              ?>
                                <div class="col-xl-3 col-md-4" style="font-size: 13px">
                                  <input onclick='feecalculator()' type="checkbox" id="sub<?php echo $noofsubj?>" name="sub[]" value="<?php echo $row['SubjectsName']?>">
                                  <label for="sub<?php echo $noofsubj?>"><?php echo $row['SubjectsName']?></label>
                                </div>
                              <?php 
                            }
                              
                          $noofsubj+=1;
                          }
                          
                          
                        echo "</div>";
                      ?>
                      <input type="hidden" name="noofsubj" value="<?php echo $noofsubj?>" id="noofsubj">

              
                      <div class="row mt-5 p-2" style="background-color: lightgray">
                        <div class="col-xl-12 col-md-6 text-center">
                          <button type="Reset" name="reset" class="btn btn-sm btn-danger"><i class="fas fa-reply-all pr-2"></i>Reset</button>
                          <button class="btn btn-sm btn-success" type="submit" name="submit">Update<i class="fas fa-arrow-up pl-2"></i></button>
                          <input type="hidden" name="editemployeecheck3" value="true">
                          <input type="hidden" name="idofemployee" value="<?php echo$idofemployee?>">
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
