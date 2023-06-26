<?php
 require "profileinfo.php";
?>
<?php
if (empty($_POST['check1'])) 
{
  header('Location:viewemployee.php');
}
else
{
  $employeeid = $_POST['check1'];
  require 'connectdatabase.php';
  $Employeedata = "SELECT *
                  FROM employeelist
                  WHERE CampusId = '$CampusId' AND EmployeeId = '$employeeid'
                  ";
  $query = mysqli_query($conn,$Employeedata);
  $employeelistdata = mysqli_fetch_array($query);

  $employeecode = $employeelistdata['Employee_Code'];
  
  $ename   = $employeelistdata['Employee_First_Name'];
  $efname   = $employeelistdata['Employee_Last_Name']; 
  $gender  = $employeelistdata['Gender'];
  $dob  = $employeelistdata['DOB'];
  $maritalstatus  = $employeelistdata['Marital_Status'];
  $ecnic = $employeelistdata['CNIC'];
  $ehomephone = $employeelistdata['Home_Phone'];
  $ealterphone = $employeelistdata['Alternate_Phone'];
  $eemail = $employeelistdata['Email'];
  $streetaddress = $employeelistdata['StreetAddress'];
  $apartment = $employeelistdata['Apartment_Unit'];
  $ecity = $employeelistdata['City'];
  $estate = $employeelistdata['State'];
  $zipcode = $employeelistdata['ZipCode'];

  $emername   = $employeelistdata['EmergencyFirstName'];
  $emerfname   = $employeelistdata['EmergencyLastName']; 
  $emerrelation   = $employeelistdata['EmergencyRelation']; 
  $emerstreetaddress = $employeelistdata['EmergencyStreetAddress'];
  $emerapartment = $employeelistdata['EmergencyApartment'];
  $emercity = $employeelistdata['EmergencyCity'];
  $emerstate = $employeelistdata['EmergencyState'];
  $emerzipcode = $employeelistdata['EmergencyZipCode'];
  $emerhomephone = $employeelistdata['EmergencyHomePhone'];
  $emeralterphone = $employeelistdata['EmergencyAlternatePhone'];
  $emeremail = $employeelistdata['EmergencyEmail'];


  $department = $employeelistdata['Department'];
  $startdate = $employeelistdata['Start_Date'];
  $salaryinpkr = $employeelistdata['SalaryInPkr'];
  $salaryinper = $employeelistdata['SalaryInPer'];
  $title = $employeelistdata['Title'];

  $qualification = $employeelistdata['Qualification'];
  $hearfrom = $employeelistdata['HearBy'];


  $classes = $employeelistdata['Class'];
  $batch = $employeelistdata['Batch'];
  $status = $employeelistdata['Status'];
  $group = $employeelistdata['Groups'];
  $board = $employeelistdata['Board_Uni_School'];

  $subjects = $employeelistdata['Subjects'];
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Employee Form</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" type="text/css" href="css/responsive.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" type="text/css" href="css/print.css?v=<?php echo time(); ?>" media="print">
  <link rel="shortcut icon" type="image/x-icon" href="pics/t1.png">
</head>
<body>    
  <div class="text-center mt-3 mb-3">
    <button class="btn btn-lg btn-info pl-5 pr-5" id="print-btn" onclick="window.print();">Print</button>
  </div>
   
  <div class="row mt-1 wholetop" style="background-color: #343A40">
    <div class="col-lg-1 topblank1"></div>
  
    <div class="col-lg-3 font-weight-bold text-white mt-4 printadform" style="font-size: 30px;">
      <p>EMPLOYEE FORM</p>
    </div>
    <div class="col-lg-4 topblank2"></div>
    <div class="col-lg-3 printlogo" style="background-color: white;border-radius: 0px;">
      <img src="<?php echo $Logo?>" width="100%" height="80px">
    </div>
    
    <div class="col-lg-1 topblank3"></div>
  </div>

  <div class="row mt-2">
    <div class="col-lg-1">
    </div>
    <div class="col-lg-10">
      <form class="form-group form1 mb-4" id="subj" method="post" action="submit.php">
        <hr>
        <div class="mt-3 row border border-dark"></div>
        <div class="text-uppercase font-weight-bold" style="font-size: 16px;">
          <div class="row mt-1 text-white">
            <div class="col-lg-12" style="background-color:#343A40;text-align: center;font-size: 18px">Personal information</div>
          </div>

          <div class="row mt-1" style="font-size: 16px;">
            <div class="col-lg-8 col-sm-8">
            
            </div>
          
            
          </div>

          <div class="row pl-1">
            <div class="col-lg-2 col-sm-2 mt-3 text-white" style="font-size: 16px;background-color: #6C757D;border-radius: 0px 20px 20px 0px">
              Full Name
            </div>
            <div class="col-lg-6 col-sm-6">
            
            </div>
            <div class="col-lg-4 col-sm-4 " style="border:1px solid #343A40;border:0px 0px 1px 1;font-family: arial;border-radius: 3px;font-size: 15px">
              <div class="row">
                <div class="col-lg-6 col-sm-6 p-2 pl-3 bg-secondary text-white">Employee ID :</div>
                <div class="col-lg-6 col-sm-6 p-2 pl-3"><?php echo$employeecode ?></div>
              </div>
            </div>
          </div>
          <div class="row mt-2 pl-3 pr-3" style="font-size: 16px;">
            <div class="col-lg-2 col-sm-2 border p-1 pl-3 font-italic" style="background-color: #D3D3D3">
              First Name
            </div>
            <div class="col-lg-3 col-sm-3 border p-1 pl-3">
              <?php echo$ename?>   
            </div>
            <div class="col-lg-2 col-sm-2 border p-1 pl-4 font-italic" style="background-color: #D3D3D3">
              Last Name
            </div>
            <div class="col-lg-5 col-sm-5 border p-1 pl-4">
              <?php echo$efname?>   
            </div>
          </div>

          <div class="row pl-1">
            <div class="col-lg-21 col-sm-2 mt-2 text-white" style="font-size: 16px;background-color: #6C757D;border-radius: 0px 20px 20px 0px">
              Address
            </div>
          </div>
          <div class="row mt-2 pl-3 pr-3" style="font-size: 16px;">
            <div class="col-lg-3 col-sm-3 border p-1 pl-4 font-italic" style="background-color: #D3D3D3">
              Street Address
            </div>
            <div class="col-lg-3 col-sm-3 border p-1 pl-4">
              <?php echo$streetaddress ?>   
            </div>
            <div class="col-lg-3 col-sm-3 border p-1 pl-4 font-italic" style="background-color: #D3D3D3">
              Apartment/Unit
            </div>
            <div class="col-lg-3 col-sm-3 border p-1 pl-4">
              <?php echo$apartment ?>   
            </div>
          </div>
          <div class="row mt-2 pl-3 pr-3" style="font-size: 16px;">
            <div class="col-lg-1 col-sm-1 border p-1 pl-4 font-italic" style="background-color: #D3D3D3">
              City
            </div>
            <div class="col-lg-3 col-sm-3 border p-1 pl-4">
              <?php echo$ecity ?>   
            </div>
            <div class="col-lg-2 col-sm-2 border p-1 pl-4 font-italic" style="background-color: #D3D3D3">
              State
            </div>
            <div class="col-lg-2 col-sm-2 border p-1 pl-4">
              <?php echo$estate ?>   
            </div>
            <div class="col-lg-2 col-sm-2 border p-1 pl-4 font-italic" style="background-color: #D3D3D3">
              Zip Code
            </div>
            <div class="col-lg-2 col-sm-2 border p-1 pl-4">
              <?php echo$zipcode ?>   
            </div>
          </div>

          <div class="row pl-1">
            <div class="col-lg-21 col-sm-2 mt-2 text-white" style="font-size: 16px;background-color: #6C757D;border-radius: 0px 20px 20px 0px">
              Contact
            </div>
          </div>
          <div class="row mt-2 pl-3 pr-3" style="font-size: 16px;">
            <div class="col-lg-1 col-sm-1 border p-1 pl-3 font-italic" style="background-color: #D3D3D3">
              Home
            </div>
            <div class="col-lg-2 col-sm-2 border p-1 pl-3">
              <?php echo$ehomephone ?>   
            </div>
            <div class="col-lg-2 col-sm-2 border p-1 pl-3 font-italic" style="background-color: #D3D3D3">
              Alternate
            </div>
            <div class="col-lg-2 col-sm-2 border p-1 pl-3">
              <?php echo$ealterphone ?>   
            </div>
            <div class="col-lg-1 col-sm-1 border p-1 pl-3 font-italic" style="background-color: #D3D3D3">
              Email
            </div>
            <div class="col-lg-4 col-sm-4 border p-1 pl-3">
              <?php echo$ealterphone ?>   
            </div>
          </div>
          
          <div class="row mt-3 pl-3 pr-3" style="font-size: 16px;">
            <div class="col-lg-2 col-sm-2 border p-2 pl-4" style="background-color: #D3D3D3">
              Gender
            </div>
            <div class="col-lg-3 col-sm-3 border p-2 pl-4">
              <?php echo$gender?>   
            </div>
            <div class="col-lg-3 col-sm-3 border p-2 pl-4" style="background-color: #D3D3D3">
              Marital Status
            </div>
            <div class="col-lg-4 col-sm-4 border p-2 pl-4">
              <?php echo$maritalstatus ?>   
            </div>
          </div>
          <div class="row mt-3 pl-3 pr-3" style="font-size: 16px;">
            <div class="col-lg-2 col-sm-2 border p-2 pl-4" style="background-color: #D3D3D3">
              DOB
            </div>
            <div class="col-lg-3 col-sm-3 border p-2 pl-4">
              <?php echo$dob?>   
            </div>
            <div class="col-lg-2 col-sm-2 border p-2 pl-4" style="background-color: #D3D3D3">
              CNIC
            </div>
            <div class="col-lg-5 col-sm-5 border p-2 pl-4">
              <?php echo$ecnic ?>   
            </div>
          </div>
          <div class="row mt-3 pl-3 pr-3" style="font-size: 16px;">
            <div class="col-lg-2 col-sm-2 border p-2 pl-3" style="background-color: #D3D3D3">
              Qualification
            </div>
            <div class="col-lg-10 col-sm-10 border p-2 pl-4">
              <?php echo$qualification ?>   
            </div>
          </div>




          <div class="mt-3 row border border-dark"></div>
          <div class="row mt-1 text-white">
            <div class="col-lg-12" style="background-color:#343A40;text-align: center;font-size: 18px">Emergency Contact information</div>
          </div>
          <div class="row pl-1">
            <div class="col-lg-2 col-sm-2 mt-1 text-white" style="font-size: 16px;background-color: #6C757D;border-radius: 0px 20px 20px 0px">
              Full Name
            </div>
          </div>
          <div class="row mt-2 pl-3 pr-3" style="font-size: 16px;">
            <div class="col-lg-2 col-sm-2 border p-1 pl-3 font-italic" style="background-color: #D3D3D3">
              First Name
            </div>
            <div class="col-lg-3 col-sm-3 border p-1 pl-3">
              <?php echo$emername?>   
            </div>
            <div class="col-lg-2 col-sm-2 border p-1 pl-3 font-italic" style="background-color: #D3D3D3">
              Last Name
            </div>
            <div class="col-lg-5 col-sm-5 border p-1 pl-3">
              <?php echo$emerfname?>   
            </div>
          </div>

          <div class="row pl-1">
            <div class="col-lg-21 col-sm-2 mt-2 text-white" style="font-size: 16px;background-color: #6C757D;border-radius: 0px 20px 20px 0px">
              Address
            </div>
          </div>
          <div class="row mt-2 pl-3 pr-3" style="font-size: 16px;">
            <div class="col-lg-3 col-sm-3 border p-1 pl-4 font-italic" style="background-color: #D3D3D3">
              Street Address
            </div>
            <div class="col-lg-3 col-sm-3 border p-1 pl-4">
              <?php echo$emerstreetaddress ?>   
            </div>
            <div class="col-lg-3 col-sm-3 border p-1 pl-4 font-italic" style="background-color: #D3D3D3">
              Apartment/Unit
            </div>
            <div class="col-lg-3 col-sm-3 border p-1 pl-4">
              <?php echo$emerapartment ?>   
            </div>
          </div>
          <div class="row mt-2 pl-3 pr-3" style="font-size: 16px;">
            <div class="col-lg-1 col-sm-1 border p-1 pl-4 font-italic" style="background-color: #D3D3D3">
              City
            </div>
            <div class="col-lg-3 col-sm-3 border p-1 pl-4">
              <?php echo$emercity ?>   
            </div>
            <div class="col-lg-2 col-sm-2 border p-1 pl-4 font-italic" style="background-color: #D3D3D3">
              State
            </div>
            <div class="col-lg-2 col-sm-2 border p-1 pl-4">
              <?php echo$emerstate ?>   
            </div>
            <div class="col-lg-2 col-sm-2 border p-1 pl-4 font-italic" style="background-color: #D3D3D3">
              Zip Code
            </div>
            <div class="col-lg-2 col-sm-2 border p-1 pl-4">
              <?php echo$emerzipcode ?>   
            </div>
          </div>

          <div class="row pl-1">
            <div class="col-lg-21 col-sm-2 mt-2 text-white" style="font-size: 16px;background-color: #6C757D;border-radius: 0px 20px 20px 0px">
              Contact
            </div>
          </div>
          <div class="row mt-2 pl-3 pr-3" style="font-size: 16px;">
            <div class="col-lg-1 col-sm-1 border p-1 pl-3 font-italic" style="background-color: #D3D3D3">
              Home
            </div>
            <div class="col-lg-2 col-sm-2 border p-1 pl-3">
              <?php echo$emerhomephone ?>   
            </div>
            <div class="col-lg-2 col-sm-2 border p-1 pl-3 font-italic" style="background-color: #D3D3D3">
              Alternate
            </div>
            <div class="col-lg-2 col-sm-2 border p-1 pl-3">
              <?php echo$emeralterphone ?>   
            </div>
            <div class="col-lg-1 col-sm-1 border p-1 pl-3 font-italic" style="background-color: #D3D3D3">
              Email
            </div>
            <div class="col-lg-4 col-sm-4 border p-1 pl-3">
              <?php echo$emeralterphone ?>   
            </div>
          </div>
          
          



          <div class="mt-3 row border border-dark"></div>
           <div class="row mt-1 text-white">
            <div class="col-lg-12" style="background-color:#343A40;text-align: center;font-size: 18px">Job Information</div>
          </div>
          <div class="row mt-3 pl-3 pr-3" style="font-size: 16px;">
            <div class="col-lg-1 col-sm-1 border p-2 pl-4" style="background-color: #D3D3D3">
              Title
            </div>
            <div class="col-lg-3 col-sm-3 border p-2 pl-4">
              <?php echo$title?>   
            </div>
            <div class="col-lg-2 col-sm-2 border p-2 pl-4" style="background-color: #D3D3D3">
              Department
            </div>
            <div class="col-lg-6 col-sm-6 border p-2 pl-4">
              <?php echo$department ?>   
            </div>
          </div>
          <div class="row pl-3 pr-3 mt-2">
            <div class="col-lg-2 col-sm-2 mt-2 pt-1 text-white" style="font-size: 16px;background-color: #6C757D;border-radius: 0px 20px 20px 0px">
              Salary
            </div>
            <div class="col-lg-5 col-sm-5"></div>
            <div class="col-lg-2 col-sm-2 border p-2 pl-4" style="background-color: #D3D3D3">
              Start Date
            </div>
            <div class="col-lg-3 col-sm-3 border p-2 pl-4">
              <?php echo$startdate ?>   
            </div>
          </div>
          <div class="row mt-3 pl-3 pr-5" style="font-size: 16px;">
            <div class="col-lg-2 col-sm-2 border p-1 pl-3 font-italic" style="background-color: #D3D3D3">
              IN PKR
            </div>
            <div class="col-lg-2 col-sm-2 border p-1 pl-4">
              <?php echo$salaryinpkr."Rs" ?>   
            </div>
            <div class="col-lg-3 col-sm-3 border p-1 pl-4 font-italic" style="background-color: #D3D3D3">
              IN Percentage
            </div>
            <div class="col-lg-2 col-sm-2 border p-1 pl-4">
              <?php echo$salaryinper."%" ?>   
            </div>
          </div>

          <div class="row mt-3 pl-3 pr-3" style="font-size: 16px;">
            <div class="col-lg-2 col-sm-2 border p-2 pl-3" style="background-color: #D3D3D3">
              Class
            </div>
            <div class="col-lg-2 col-sm-2 border p-2 pl-4">
              <?php echo$classes ?>   
            </div>
            <div class="col-lg-2 col-sm-2 border p-2 pl-4" style="background-color: #D3D3D3">
              Group
            </div>
            <div class="col-lg-2 col-sm-2 border p-2 pl-4">
              <?php echo$group ?>   
            </div>
            <div class="col-lg-2 col-sm-2 border p-2 pl-4" style="background-color: #D3D3D3">
              Board
            </div>
            <div class="col-lg-2 col-sm-2 border p-2 pl-4">
              <?php echo$board ?>   
            </div>
          </div>
          <div class="row mt-3 pl-3 pr-3" style="font-size: 16px;">
            <div class="col-lg-2 col-sm-2 border p-2 pl-3" style="background-color: #D3D3D3">
              Batch
            </div>
            <div class="col-lg-2 col-sm-2 border p-2 pl-4">
              <?php echo$batch ?>   
            </div>
            <div class="col-lg-2 col-sm-2 border p-2 pl-4" style="background-color: #D3D3D3">
              Subject
            </div>
            <div class="col-lg-6 col-sm-6 border p-2 pl-4">
              <?php echo$subjects ?>   
            </div>
          
          </div>
        
        </div>
      </form>
    </div>
    <div class="col-lg-1"></div>
  </div>

  
  <footer style="background-color:#433F40;margin-top: 56px" class="p-1">
    <div class="row">
      <div class="col-xl-12 footer1c">
        <div class="h6 bg-white m-3 p-2 font-weight-bold text-center" style="color:#586261;border-radius: 0px;">
          <?php echo $InstitudeName.' '.$CampusName ?>
        </div>
        <div class="row text-center">
          <div class="col-xl-12">
            <span class="text-white h7 text-center">
              <span class="h4 font-weight-bold">Address</span> : <?php echo ucwords($InstitudeAddress) ?>
            </span>
          </div>
        </div>  
        <div class="row text-center">
          <div class="col-xl-12">
            <span class="text-white h7 text-center">
              <span class="h4 font-weight-bold">Contact us on</span> : <?php echo $InstitudeAddmissionNum.' / '.$InstitudeAccountsNum ?>
            </span>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <div class="text-center mt-3 mb-3">
    <button class="btn btn-lg btn-info pl-5 pr-5" id="print-btn" onclick="window.print();">Print</button>
  </div>

</body>
</html>