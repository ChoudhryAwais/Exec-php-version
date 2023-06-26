<?php
  require 'sessionstart.php';
?>
<?php
  require "connectdatabase.php";
  $profile = "SELECT * 
        FROM profile
        WHERE CampusId = '$CampusId'
        ";

  $query = mysqli_query($conn,$profile);
  $profileinfo = mysqli_fetch_array($query);
  $InstitudeName = $profileinfo['InstitudeName'];
  $CampusName = $profileinfo['CampusName'];
  $PrincipleName = $profileinfo['PrincipleName'];
  $Logo = $profileinfo['Logo'];
  $TitleLogo = $profileinfo['TitleLogo'];
  $InstitudeEmail = $profileinfo['InstitudeEmail'];
  $InstitudeAddmissionNum = $profileinfo['InstitudeAddmissionNum'];
  $InstitudeExamsNum = $profileinfo['InstitudeExamsNum'];
  $InstitudeAccountsNum = $profileinfo['InstitudeAccountsNum'];
  $InstitudeOtherNum = $profileinfo['InstitudeOtherNum'];
  $InstitudeAddress = $profileinfo['InstitudeAddress'];
  $InstitudeState = $profileinfo['InstitudeState'];
  $InstitudeCity = $profileinfo['InstitudeCity'];
  $InstitudeFacebook = $profileinfo['InstitudeFacebook'];
  $InstitudeInstagram = $profileinfo['InstitudeInstagram'];
  $InstitudeWhatsappNum = $profileinfo['InstitudeWhatsappNum'];

  $employeecode ="SELECT DISTINCT(Employee_Code),(Employee_First_Name),(Employee_Last_Name),(Title),(Department),(Picture),(SignInTime),(SignOutTime)
                  FROM employeelist
                  WHERE (CampusId = '$CampusId') AND (Employee_Code = '$Employeecode')
                  ";

  $query1 = mysqli_query($conn,$employeecode);
  $employeeinfo = mysqli_fetch_array($query1);
  $employeefirstname = $employeeinfo['Employee_First_Name'];
  $employeelastname = $employeeinfo['Employee_Last_Name'];
  $employeetitle = $employeeinfo['Title'];
  $employeedepartment = $employeeinfo['Department'];
  $employeepic = $employeeinfo['Picture'];
  $employeesignintime = $employeeinfo['SignInTime'];
  $employeesignouttime = $employeeinfo['SignOutTime'];
  $employeepicarray = explode('/', $employeepic);
  $employeepicloc = $employeepicarray[3];
  
  

?>