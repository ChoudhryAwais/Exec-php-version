<?php
  require "profileinfo.php";
?>
<?php
  if (!empty($_POST['check2'])) 
  {
    $idofemployee = $_POST['check2'];
    require 'connectdatabase.php';
    $employee="SELECT *
              FROM employeelist
              WHERE EmployeeId= '$idofemployee'";
    $query = mysqli_query($conn,$employee);
    $employeedata = mysqli_fetch_array($query);
    $IsActive = $employeedata['IsActive'];
    $ename   = $employeedata['Employee_First_Name'];
    $efname   = $employeedata['Employee_Last_Name']; 
    $gender  = $employeedata['Gender'];
    $dob  = $employeedata['DOB'];
    $maritalstatus  = $employeedata['Marital_Status'];
    $ecnic = $employeedata['CNIC'];
    $ehomephone = $employeedata['Home_Phone'];
    $ealterphone = $employeedata['Alternate_Phone'];
    $eemail = $employeedata['Email'];
    $streetaddress = $employeedata['StreetAddress'];
    $apartment = $employeedata['Apartment_Unit'];
    $ecity = $employeedata['City'];
    $estate = $employeedata['State'];
    $zipcode = $employeedata['ZipCode'];

    $emername   = $employeedata['EmergencyFirstName'];
    $emerfname   = $employeedata['EmergencyLastName']; 
    $emerrelation   = $employeedata['EmergencyRelation']; 
    $emerstreetaddress = $employeedata['EmergencyStreetAddress'];
    $emerapartment = $employeedata['EmergencyApartment'];
    $emercity = $employeedata['EmergencyCity'];
    $emerstate = $employeedata['EmergencyState'];
    $emerzipcode = $employeedata['EmergencyZipCode'];
    $emerhomephone = $employeedata['EmergencyHomePhone'];
    $emeralterphone = $employeedata['EmergencyAlternatePhone'];
    $emeremail = $employeedata['EmergencyEmail'];


    $department = $employeedata['Department'];
    $startdate = $employeedata['Start_Date'];
    $salaryinpkr = $employeedata['SalaryInPkr'];
    $salaryinper = $employeedata['SalaryInPer'];
    $title = $employeedata['Title'];

    $qualification = $employeedata['Qualification'];
    $hearfrom = $employeedata['HearBy'];


    $classes = $employeedata['Class'];
    $batch = $employeedata['Batch'];
    $status = $employeedata['Status'];
    $group = $employeedata['Groups'];
    $board = $employeedata['Board_Uni_School'];

  }
  else
  {
    header("Location:viewemployee.php");
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
    var sgender = document.forms.gender;
    if((sgender[0].checked==false)&&(sgender[1].checked==false)) 
    {  
      if ((sgender[0].checked==true) || (sgender[1].checked==true)) 
      {
        document.getElementById('genderv').innerHTML=("");
      }
      else
      {
        document.getElementById('genderv').innerHTML=("*Select Your Gender"); 
      }
      return false;
    }
    else
    {
      document.getElementById('genderv').innerHTML=("");
    }
  }
</script>

<script>
  function spacefilterpkr(input) 
  {
    var allow = /[^0-9]/gi || / /gi;
    input.value = input.value.replace(allow,"");
  }
  function spacefilterper(input) 
  {
    var allow = /[^0-9.]/gi || / /gi;
    input.value = input.value.replace(allow,"");
  }
</script>


<?php
  require 'connectdatabase.php';
  $ClassesName = "SELECT ClassesName 
            FROM classes
            WHERE CampusId='$CampusId' AND IsActive = 'Yes'
            ORDER BY ClassesName ASC";
  $query = mysqli_query($conn,$ClassesName);
  $BatchName = "SELECT BatchName 
            FROM batch
            WHERE CampusId='$CampusId' AND IsActive = 'Yes'";
  $query1 = mysqli_query($conn,$BatchName);
  $BoardName = "SELECT BoardName 
            FROM board
            WHERE CampusId='$CampusId' AND IsActive = 'Yes'";
  $query2 = mysqli_query($conn,$BoardName);
  $GroupsName = "SELECT GroupsName 
            FROM groups
            WHERE CampusId='$CampusId' AND IsActive = 'Yes'";
  $query3 = mysqli_query($conn,$GroupsName);
  $DepartmentName = "SELECT DepartmentName,DepartmentId
            FROM department
            WHERE (CampusId='$CampusId' || CampusId='1') AND IsActive = 'Yes'";
  $query4 = mysqli_query($conn,$DepartmentName);
  $DepartmentCode = "SELECT DepartmentId,DepartmentCode 
            FROM department
            WHERE (CampusId='$CampusId' || CampusId='1') AND IsActive = 'Yes'";
  $query5 = mysqli_query($conn,$DepartmentCode);
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
                
                  <form style="box-shadow: 1px 1px 10px;border: 1px solid black;border-radius: 5px;" action="editemployeeacademic.php" method="post" name="forms" class="form-group needs-validation" novalidate onsubmit="return validation()">

                    <div class="row pl-3 pr-3 pt-3">
                      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 h6 text-center">
                        <div class="container text-white p-2" style="box-shadow: 1px 1px 10px black;border-radius: 20px 20px 20px 20px;background-color: #03D913">
                          General Information
                        </div>
                      </div>
                      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 h6 text-center">
                        <button class="btn container bg-dark text-white p-1" style="box-shadow: 1px 1px 10px;border-radius: 20px 20px 20px 20px">
                          Assign Group
                        </button>
                      </div>
                      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 h6 text-center">
                        <button class="btn container bg-dark text-white p-1" style="box-shadow: 1px 1px 10px;border-radius: 20px 20px 20px 20px">
                          Assign Subject
                        </button>
                      </div>
                    </div>
                    <hr>
                    <div class="container">
                      <div class="row mt-3">
                        <div class="col-xl-10 col-sm-10"></div>
                        <div class="col-xl-2 col-sm-2">
                          <select name="IsActive" class="form-control form-control-sm" required>
                            <option style="background-color: lightgray" value="<?php echo$IsActive?>" selected><?php echo$IsActive?></option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                          </select>  
                        </div>
                      </div>
                      <div class="row mt-2">
                        <div class="col-xl-12 p-1 h6 text-center text-white font-weight-bold text-uppercase" style="background-color: #323E6F;">Personal Information</div>
                      </div>
                      <div class="row">
                        <div class="col-xl-4 col-md-6">
                          <input class="form-control form-control-sm mt-3 text-capitalize" type ="text" name="ename" placeholder="First Name" value="<?php echo$ename?>" required>
                        </div>
                        <div class="col-xl-4 col-md-6">
                          <input class="form-control form-control-sm mt-3 text-capitalize" type ="text" name="efname" placeholder="Last Name" value="<?php echo$efname?>" required>
                        </div>
                        <div class="col-lg-4">
                          <?php
                            if ($gender=="Male") 
                            {
                              ?> 
                              <label class="radio">
                                <input checked type="radio" name="gender" value="Male">
                                Male
                                <span></span>
                              </label>
                              <label class="radio">
                                <input type="radio" name="gender" value="Female">
                                Female
                                <span></span>
                              </label>
                              <?php
                            }
                            else
                            {
                              ?> 
                              <label class="radio">
                                <input type="radio" name="gender" value="Male">
                                Male
                                <span></span>
                              </label>
                              <label class="radio">
                                <input checked type="radio" name="gender" value="Female">
                                Female
                                <span></span>
                              </label>
                              <?php
                            }
                          ?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xl-1 col-sm-2 text-center border mt-3">
                          <label for="startdate" class="pl-1 font-weight-bold" style="font-size:13px">DOB :</label>
                        </div>
                        <div class="col-xl-3 col-sm-8 mt-3">
                          <input class="form-control form-control-sm" type ="date" name="dob" value="<?php echo$dob?>"> 
                        </div>
                        <div class="col-xl-4 col-md-4 mt-3">
                          <input class="form-control form-control-sm" type ="text" name="ecnic" placeholder="CNIC" value="<?php echo$ecnic?>">  
                        </div>
                        <div class="col-xl-4 col-md-4 mt-3">
                          <select name="maritalstatus" class="form-control form-control-sm" required>
                            <option class="bg-secondary text-white" value="<?php echo$maritalstatus?>" selected><?php echo$maritalstatus?></option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Widowed">Widowed</option>
                            <option value="Separated">Separated</option>
                            <option value="Divorced">Divorced</option>
                          </select>         
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xl-4 col-md-6">
                          <input class="form-control form-control-sm mt-3" type ="text" name="ehomephone" placeholder="Home Phone" required value="<?php echo$ehomephone?>">  
                        </div>
                        <div class="col-xl-4 col-md-6">
                          <input class="form-control form-control-sm mt-3" type ="text" name="ealterphone" placeholder="Alternate Phone" value="<?php echo$ealterphone?>">
                        </div>
                        <div class="col-xl-4 col-md-6">
                          <input class="form-control form-control-sm mt-3" type ="text" name="eemail" placeholder="Email" value="<?php echo$eemail?>" required>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xl-4 col-sm-4"></div>
                        <div class="col-xl-4 col-sm-4 mt-3">
                          <select name="qualification" class="form-control form-control-sm" required>
                            <option class="bg-secondary text-white" value="<?php echo$qualification?>" selected><?php echo$qualification?></option>
                            <option value="PhD">PhD</option>
                            <option value="Masters">Masters</option>
                            <option value="Bachelors">Bachelors</option>
                            <option value="Intermediate">Intermediate</option>
                            <option value="Matric">Matric</option>
                          </select>         
                        </div>
                        <div class="col-xl-4 col-sm-4 mt-3">
                          <select name="hearfrom" class="form-control form-control-sm" required>
                            <option class="bg-secondary text-white" value="<?php echo$hearfrom?>" selected><?php echo$hearfrom?></option>
                            <option value="Banners / Plates">Banners / Plates</option>
                            <option value="Brochure / Handout">Brochure / Handout</option>
                            <option value="Cable">Cable</option>
                            <option value="Newspaper">Newspaper</option>
                            <option value="Other">Other</option>
                            <option value="Radio">Radio</option>
                            <option value="Seminar">Seminar</option>
                            <option value="SMS / Website">SMS / Website</option>
                            <option value="T.V">T.V</option>
                          </select>         
                        </div>
                      </div>

                      <div class="row mt-4">
                        <div class="col-xl-2 col-sm-3 p-1 h6 text-center text-white font-weight-bold text-uppercase" style="background-color:#909090;">Address</div>
                      </div>
                      <div class="row">
                        <div class="col-xl-6 col-sm-6">
                          <input class="form-control form-control-sm mt-3" type ="text" name="streetaddress" placeholder="Street Address" value="<?php echo$streetaddress?>" required>  
                        </div>
                        <div class="col-xl-6 col-sm-6">
                          <input class="form-control form-control-sm mt-3" type ="text" name="apartment" placeholder="Apartment / Unit #" value="<?php echo$apartment?>">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xl-4 col-sm-4 mt-3">
                          <select class="form-control form-control-sm" name="estate" id="estate" required>
                            <option class="bg-secondary text-white" value="<?php echo$estate?>" selected><?php echo$estate?></option>
                            <option value="Balochistan">Balochistan</option>
                            <option value="Khyber_Pakhtunkhwa">Khyber Pakhtunkhwa</option>
                            <option value="Punjab">Punjab</option>
                            <option value="Sindh">Sindh</option>
                          </select>
                        </div>
                        <div class="col-xl-4 col-sm-4 mt-3">
                          <select class="form-control form-control-sm" name="ecity" id="ecity" required>
                            <option class="bg-secondary text-white" value="<?php echo$ecity?>" selected><?php echo$estate?></option>
                            <option value="Ahmadpur">Ahmadpur</option>
                            <option value="Alipur">Alipur</option>
                            <option value="Bahawalpur">Bahawalpur</option>
                            <option value="Faislabad">Faislabad</option>  
                            <option value="Islamabad">Islamabad</option>
                            <option value="Karachi">Karachi</option>
                            <option value="Lahore">Lahore</option>
                            <option value="Multan">Multan</option>
                            <option value="Lahore">Lahore</option>
                            <option value="Rawalpindi">Rawalpindi</option>
                          </select>
                        </div>
                        <div class="col-xl-4 col-sm-4">
                          <input class="form-control form-control-sm mt-3" type ="number" name="zipcode" placeholder="Zip Code" value="<?php echo$zipcode?>" required>
                        </div>
                      </div>




                      <div class="row mt-3">
                        <div class="col-xl-12 p-1 h6 text-center text-white font-weight-bold text-uppercase" style="background-color: #323E6F;">Emergency Contact Information</div>
                      </div>
                      <div class="row">
                        <div class="col-xl-4 col-md-6">
                          <input class="form-control form-control-sm mt-3 text-capitalize" type ="text" name="emername" placeholder="First Name" value="<?php echo$emername?>" required>
                        </div>
                        <div class="col-xl-4 col-md-6">
                          <input class="form-control form-control-sm mt-3 text-capitalize" type ="text" name="emerfname" placeholder="Last Name" value="<?php echo$emerfname?>" required>
                        </div>
                        <div class="col-lg-4">
                          <input class="form-control form-control-sm mt-3 text-capitalize" type ="text" name="emerrelation" value="<?php echo$emerrelation?>" placeholder="Relation" required>
                        </div>
                      </div>
                      <div class="row mt-4">
                        <div class="col-xl-2 col-sm-3 p-1 h6 text-center text-white font-weight-bold text-uppercase" style="background-color:#909090;">Address</div>
                      </div>
                      <div class="row">
                        <div class="col-xl-6 col-sm-6">
                          <input class="form-control form-control-sm mt-3" type ="text" name="emerstreetaddress" value="<?php echo$emerstreetaddress?>" placeholder="Street Address" required>  
                        </div>
                        <div class="col-xl-6 col-sm-6">
                          <input class="form-control form-control-sm mt-3" type ="text" name="emerapartment" value="<?php echo$emerapartment?>" placeholder="Apartment / Unit #">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xl-4 col-sm-4 mt-3">
                          <select class="form-control form-control-sm" name="emerstate" id="estate" required>
                            <option value="<?php echo$emerstate?>" selected><?php echo$emerstate?></option>
                            <option value="Balochistan">Balochistan</option>
                            <option value="Khyber_Pakhtunkhwa">Khyber Pakhtunkhwa</option>
                            <option value="Punjab">Punjab</option>
                            <option value="Sindh">Sindh</option>
                          </select>
                        </div>
                        <div class="col-xl-4 col-sm-4 mt-3">
                          <select class="form-control form-control-sm" name="emercity" id="ecity" required>
                            <option value="<?php echo$emercity?>" selected><?php echo$emercity?></option>
                            <option value="Ahmadpur">Ahmadpur</option>
                            <option value="Alipur">Alipur</option>
                            <option value="Bahawalpur">Bahawalpur</option>
                            <option value="Faislabad">Faislabad</option>  
                            <option value="Islamabad">Islamabad</option>
                            <option value="Karachi">Karachi</option>
                            <option value="Lahore">Lahore</option>
                            <option value="Multan">Multan</option>
                            <option value="Lahore">Lahore</option>
                            <option value="Rawalpindi">Rawalpindi</option>
                          </select>
                        </div>
                        <div class="col-xl-4 col-sm-4">
                          <input class="form-control form-control-sm mt-3" type ="number" name="emerzipcode" placeholder="Zip Code" value="<?php echo$emerzipcode?>" required>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xl-4 col-md-6">
                          <input class="form-control form-control-sm mt-3" type ="text" name="emerhomephone" placeholder="Home Phone" value="<?php echo$emerhomephone?>" required>
                        </div>
                        <div class="col-xl-4 col-md-6">
                          <input class="form-control form-control-sm mt-3" type ="text" name="emeralterphone" placeholder="Alternate Phone" value="<?php echo$emeralterphone?>">
                        </div>
                        <div class="col-xl-4 col-md-6">
                          <input class="form-control form-control-sm mt-3" type ="text" name="emeremail" placeholder="Email" value="<?php echo$emeremail?>" required>
                        </div>
                      </div>





                      <div class="row mt-4">
                        <div class="col-xl-12 p-1 h6 text-center text-white font-weight-bold text-uppercase" style="background-color:#323E6F;">Job Information</div>
                      </div>
                      <div class="row">
                        <div class="col-xl-6 col-sm-6">
                          <input class="form-control form-control-sm mt-3 text-capitalize" type ="text" name="title" placeholder="Title" value="<?php echo$title?>" required>  
                        </div>
                        <div class="col-xl-6 col-sm-6 mt-3">
                          <select name="department" class="form-control form-control-sm" required id="departmentselected" onchange="selectdepartment()">
                            <option class="bg-secondary text-white" value="<?php echo$department?>" selected><?php echo$department?></option>
                            <?php
                              while ($row = mysqli_fetch_assoc($query4)) 
                                {
                                  ?>
                                    <option value="<?php echo $row['DepartmentName']?>"><?php echo ucwords(strtolower($row['DepartmentName']))?></option>
                                  <?php
                                }
                            ?>
                          </select>         
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-xl-2 col-sm-2 text-right border">
                          <label for="startdate" class="pl-1 font-weight-bold" style="font-size:13px">Start Date:</label>
                        </div>
                        <div class="col-xl-2 col-sm-2">
                          <input type="date" name="startdate" class="form-control form-control-sm" value="<?php echo$startdate?>" required> 
                        </div>
                        
                        <div class="col-xl-2 col-sm-2 text-right border" id="salinpkrlabel">
                          <label for="salinpkr" class="pl-1 font-weight-bold" style="font-size:13px">Salary In:</label>
                        </div>
                        <div class="col-xl-2 col-sm-2" id="salinpkr">
                          <input class="form-control form-control-sm" id="pkr" onkeyup="spacefilterpkr(this)" type ="text" name="salaryinpkr" placeholder="PKR" value="<?php echo$salaryinpkr?>">           
                        </div>
                        <div class="col-xl-2 col-sm-2 text-right border"  id="salinperlabel">
                          <label for="salinpkr" class="pl-1 font-weight-bold" style="font-size:13px">Salary In:</label>
                        </div>
                        <div class="col-xl-2 col-sm-2"  id="salinper">
                          <input class="form-control form-control-sm" id="per"  onkeyup="spacefilterper(this)"  type ="text" name="salaryinper" placeholder="%" value="<?php echo$salaryinper?>">           
                        </div>
                      </div>
                      <div class="row mt-4" style="display: none;" id="classlabel">
                        <div class="col-xl-12 p-1 h6 text-center text-white font-weight-bold text-uppercase" style="background-color:#323E6F;">Asign Class</div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-xl-2 col-sm-2"></div>
                        <div class="col-xl-8 col-md-8">
                          <select name="classes" class="form-control form-control-sm" style="display: none;" id="class" required>
                            <option class="bg-secondary text-white" value="<?php echo$classes?>" selected><?php echo$classes?></option>
                            <?php
                              while ($row = mysqli_fetch_assoc($query)) 
                                {
                                  ?>
                                    <option value="<?php echo $row['ClassesName']?>"><?php echo $row['ClassesName']?></option>
                                  <?php
                                }
                            ?>
                          </select>         
                        </div>
                        <div class="col-xl-2 col-sm-2"></div>  
                      </div>
                      <div class="row mt-5 p-2" style="background-color: lightgray">
                        <div class="col-xl-12 col-md-6 text-right">
                          <button type="Reset" name="reset" class="btn btn-sm btn-danger"><i class="fas fa-reply-all pr-2"></i>Reset</button>
                          <button class="btn btn-sm btn-success" type="submit" name="submit">Next<i class="fas fa-arrow-right pl-2"></i></button>
                          <input type="hidden" name="editemployeecheck1" value="true">
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
  //edit student
  selectdepartment();
  salarytypeselect();


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

  
  function selectdepartment() 
  {
    var departmentselected = document.getElementById('departmentselected').value;
    if (departmentselected=="ADMINISTRATION" || departmentselected=="ACCOUNTS") 
    {
      var classes = document.getElementById('class');
      var classeslabel = document.getElementById('classlabel');
      classes.style.display = "none";
      classeslabel.style.display = "none";
      classes.required = false;
      var formaction = document.forms;
      formaction.action = "viewemployee.php";
    }   
    else
    {
      var classes = document.getElementById('class');
      var classeslabel = document.getElementById('classlabel');
      classes.style.display = "";
      classeslabel.style.display = "";
      classes.required = true;
      var formaction = document.forms;
      formaction.action = "editemployeeacademic.php";
    }
  }
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
