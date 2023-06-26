<?php
 require "profileinfo.php";
?>



<!DOCTYPE html>
<html lang="en">

<head>

  <title>Employee List</title>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">


   <!-- Custom fonts for this template-->
   <link href="vendor/fontawesome-free/css/all.min.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
   <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $TitleLogo?>">

   <!-- Custom styles for this template-->
   <link href="css/sb-admin-2.min.css?v=<?php echo time(); ?>" rel="stylesheet">
   <link href="css/bootstrap.min.css?v=<?php echo time(); ?>" rel="stylesheet">
   <link href="css/style.css?v=<?php echo time(); ?>" rel="stylesheet">
   <link href="responsive/responsive.css?v=<?php echo time(); ?>" rel="stylesheet">
   <link href="css/style.css?v=<?php echo time(); ?>" rel="stylesheet">

   <script src="js/jquery-3.5.0.min.js"></script>
   <script src="js/sweetalert2.all.min.js"></script>
</head>
<?php
  if (isset($_POST['editemployeecheck3'])) 
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
    $department = htmlspecialchars($_POST['department']);
    $startdate = htmlspecialchars($_POST['startdate']);
    $salaryinpkr = htmlspecialchars($_POST['salaryinpkr']);
    $salaryinper = htmlspecialchars($_POST['salaryinper']);
    $title = ucwords(strtolower(htmlspecialchars($_POST['title'])));

    $qualification = $_POST['qualification'];
    $hearfrom = $_POST['hearfrom'];
    $idofemployee = $_POST['idofemployee'];

    if ($department=="ACCOUNTS" || $department=="ADMINISTRATION") 
    {
      $batch = "None";
      $status =  "None";
      $group =  "None";
      $board =  "None";

      $subjects =  "None";
      $noofsubj=  "None";
      $classes = "None";
    }
    else
    {
      $classes = $_POST['classes'];
      $batch = $_POST['batch'];
      $status = $_POST['status'];
      $group = $_POST['group'];
      $board = $_POST['board'];

      $subjects = $_POST['sub'];
      $noofsubj= 0;
      foreach ($subjects as  $sub) 
      {
        $noofsubj +=1;
      }
      $subjects = implode(' ',$subjects);
    }

    // echo $admissionfee;echo "<br>";
    // echo $admissiondiscount;echo "<br>";
    // echo $admissiontotal;echo "<br>";

    // echo $tuitionfee;echo "<br>";
    // echo $tuitiondiscount;echo "<br>";
    // echo $tuitiontotal;echo "<br>";

    // echo $specialcharges;echo "<br>";
    // echo $specialdiscount;echo "<br>";
    // echo $specialtotal;echo "<br>";
    // echo "sadfsd";
    require 'connectdatabase.php';
    $Updateemployee = "UPDATE employeelist 
                      SET 
                      Employee_First_Name = '$ename',
                      Employee_Last_Name  = '$efname',
                      Gender = '$gender',
                      DOB = '$dob',
                      CNIC = '$ecnic',
                      StreetAddress = '$streetaddress',
                      Apartment_Unit = '$apartment',
                      City = '$ecity',
                      Home_Phone = '$ehomephone',
                      Alternate_Phone = '$ealterphone',
                      Email = '$eemail',
                      IsActive = '$IsActive',
                      Class = '$classes',
                      Groups = '$group',
                      Batch = '$batch',
                      Status = '$status',
                      Board_Uni_School = '$board',
                      Subjects = '$subjects',
                      No_of_Subjects = '$noofsubj',
                      Marital_Status ='$maritalstatus',
                      Qualification = '$qualification',
                      Title = '$title',
                      Department = '$department',
                      Start_Date = '$startdate',
                      SalaryInPkr = '$salaryinpkr',
                      SalaryInPer = '$salaryinper',
                      IsActive = '$IsActive',
                      HearBy = '$hearfrom'
                      WHERE EmployeeId = '$idofemployee' 
                      ";
    if (mysqli_query($conn, $Updateemployee)) 
    {
      echo 
        '<input type="hidden" >
        <script>
          Swal.fire("Update", "Employee update", "success");
        </script>
      ';
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

  }
?>


<?php

  if (!empty($_POST['employeecheck3'])) 
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

    $Logo = $_FILES['Logo'];
    $LogoName = $_FILES['Logo']['name'];
    $LogoTmpName = $_FILES['Logo']['tmp_name'];
    $LogoSize = $_FILES['Logo']['size'];
    $LogoError = $_FILES['Logo']['error'];
    $LogoType = $_FILES['Logo']['type'];
    $logofileExt = explode('.', $LogoName);
    $logofileActualName = $logofileExt[0];
    $logofileActualExt = strtolower(end($logofileExt)); 
    if ($LogoError==0) 
    {
      
      $logofileNameNew = uniqid(true).".".$logofileActualExt;
      $logofileDestination = '../employeeportal/employeepic/'.$logofileNameNew;

      move_uploaded_file($LogoTmpName, $logofileDestination);
      
    }
    else
    {
      
    }

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

    
    $departmentcode ="SELECT DepartmentCode
                      FROM department
                      WHERE (CampusId='$CampusId' OR CampusId='1') AND (DepartmentName='$department')";
    $query5 = mysqli_query($conn,$departmentcode);
    $departmentcodelist = mysqli_fetch_array($query5);
    $department_code=$departmentcodelist['DepartmentCode'];

    $employeearray = array();
    $countemployee ="SELECT COUNT(EmployeeId) as countemployee
                      FROM employeelist
                      WHERE CampusId='$CampusId'";
    $query8 = mysqli_query($conn,$countemployee);
    $countemployee = mysqli_fetch_array($query8);
    $noofemployee = $countemployee['countemployee'];
    if ($noofemployee==0) 
    {
      $employeecode = 1;
    }
    else
    {
      $maxemployee ="SELECT Employee_Code
                    FROM employeelist
                    WHERE CampusId='$CampusId'";
      $query7 = mysqli_query($conn,$maxemployee);
      while ($row2= mysqli_fetch_assoc($query7)) 
      {
        $employeearray[]=$row2['Employee_Code'];
      }
      $lastid=($employeearray[count($employeearray)-1]);
      $lastidarray =preg_split('/[A-Z]/',$lastid);
      $lastidnum = $lastidarray[0];
      $employeecode = $lastidnum +1;
    }
    $employeecode = $employeecode.$department_code;
    $i=1;
    foreach ($studentsubjects as  $id) 
    {
      $subjectsdata ="SELECT * 
                      FROM subjects
                      WHERE SubjectsId= '$id'
                      ORDER BY DisciplineName,ClassesName,GroupsName,SubjectsName,BoardsName ASC";
      $queryforsubject = mysqli_query($conn,$subjectsdata);
      $wholeinfo = mysqli_fetch_array($queryforsubject);
      $discipline = $wholeinfo['DisciplineName'];
      $classes = $wholeinfo['ClassesName'];
      $group = $wholeinfo['GroupsName'];
      $board = $wholeinfo['BoardsName'];
      $subject= $wholeinfo['SubjectsName'];
      $submission_date = date('dF,Y');
      $salaryinpkr = $_POST['fixsalary'.$i];
      $salaryinper = $_POST['persalary'.$i];
      
      require 'connectdatabase.php';
      $submitemployee = "INSERT INTO employeelist( 
                        CampusId,  
                        Employee_Code,
                        Employee_First_Name,
                        Employee_Last_Name,
                        Gender,
                        DOB,
                        CNIC,
                        StreetAddress,
                        Apartment_Unit,
                        City,
                        State,
                        ZipCode,
                        Home_Phone,
                        Alternate_Phone,
                        Email,
                        Class,
                        Groups,
                        Batch,
                        Board_Uni_School,
                        Subjects,
                        No_of_Subjects,
                        Marital_Status,
                        Qualification,
                        Title,
                        Department,
                        Start_Date,
                        SalaryInPkr,
                        SalaryInPer,
                        IsActive,
                        HearBy,
                        Submission_date,
                        EmergencyFirstName,
                        EmergencyLastName,
                        EmergencyStreetAddress,
                        EmergencyApartment,
                        EmergencyCity,
                        EmergencyState,
                        EmergencyZipCode,
                        EmergencyHomePhone,
                        EmergencyAlternatePhone,
                        EmergencyEmail,
                        EmergencyRelation,
                        Picture,
                        SignInTime,
                        SignOutTime
                        )
                      VALUES(
                        '$CampusId',
                        '$employeecode',
                        '$ename',
                        '$efname', 
                        '$gender',
                        '$dob',
                        '$ecnic',
                        '$streetaddress',
                        '$apartment',
                        '$ecity',
                        '$estate',
                        '$zipcode',
                        '$ehomephone',
                        '$ealterphone',
                        '$eemail',
                        '$classes',
                        '$group',
                        '$batch',
                        '$board',
                        '$subject',
                        '$noofsubj',
                        '$maritalstatus',
                        '$qualification',
                        '$title',
                        '$department',
                        '$startdate',
                        '$salaryinpkr',
                        '$salaryinper',
                        '$IsActive',
                        '$hearfrom',
                        '$submission_date',
                        '$emername ',
                        '$emerfname',
                        '$emerstreetaddress',
                        '$emerapartment',
                        '$emercity',
                        '$emerstate',
                        '$emerzipcode',
                        '$emerhomephone',
                        '$emeralterphone',
                        '$emeremail',
                        '$emerrelation',
                        '$logofileDestination',
                        '$signintime',
                        '$signouttime'
                        )
                      ";

      if (mysqli_query($conn, $submitemployee)) 
      {
        echo 
          '<input type="hidden" >
          <script>
            Swal.fire("Save", "", "success");
          </script>
        ';
      } 
      else 
      {
        echo "Error: " . $submitemployee . "<br>" . mysqli_error($conn);
        echo 
          '<input type="hidden" >
          <script>
            Swal.fire("Error", "Something went wrong", "error");
          </script>
        ';
      }

      $i+=1;
    }


    // echo $admissionfee;echo "<br>";
    // echo $admissiondiscount;echo "<br>";
    // echo $admissiontotal;echo "<br>";

    // echo $tuitionfee;echo "<br>";
    // echo $tuitiondiscount;echo "<br>";
    // echo $tuitiontotal;echo "<br>";

    // echo $specialcharges;echo "<br>";
    // echo $specialdiscount;echo "<br>";
    // echo $specialtotal;echo "<br>";
    // echo $submitby;
    // echo $actualfees;echo "<br>";
    // echo $totaldiscount;echo "<br>";
    // echo $totalfees;echo "<br>";

    // echo $admissionfeepaid;echo "<br>";
    // echo $tuitionfeepaid;echo "<br>";
    // echo $specialfeepaid;echo "<br>";
    // echo $totalpaid;echo "<br>";
    // echo $balance;echo "<br>";
    // echo $duedate;echo "<br>";

    // echo "Academic Info"; echo "<br>";
    // echo $batch; echo "<br>";
    // echo $status; echo "<br>";
    // echo $group; echo "<br>";
    // echo $board; echo "<br>";


    // echo $classes; echo "<br>";
    // echo $IsActive; echo "<br>";
    // echo $sname; echo "<br>";
    // echo $sfname; echo "<br>";
    // echo $gender; echo "<br>";
    // echo $dob; echo "<br>";
    // echo $sdomicile; echo "<br>";
    // echo $sreligion; echo "<br>";
    // echo $scnic; echo "<br>";
    // echo $snationality; echo "<br>";
    // echo $saddress; echo "<br>";
    // echo $sphone; echo "<br>";
    // echo $scell; echo "<br>";
    // echo $semail; echo "<br>";
    // echo $hearfrom; echo "<br>";

    // echo $gname; echo "<br>";
    // echo $gcnic; echo "<br>";
    // echo $gemail; echo "<br>";
    // echo $gphone; echo "<br>";
    // echo $gcell;echo "<br>";
    // echo $noofsubj; echo "<br>";
    // echo $subjects;
        
  }
  else
  {



  }

?>






<?php
  $employeelistdata = "SELECT * 
          FROM employeelist
          WHERE CampusId='$CampusId'";
  $query = mysqli_query($conn,$employeelistdata);

  $nooftotalemployee = "SELECT COUNT(Employee_Code) as employeeno 
                        FROM employeelist
                        WHERE CampusId='$CampusId'";
  $query4 = mysqli_query($conn,$nooftotalemployee);
  $employeeno = mysqli_fetch_array($query4);
  $no_Of_total_employee = $employeeno['employeeno'];

  $employeelistgroups = "SELECT DISTINCT(Groups) 
                         FROM employeelist
                         WHERE CampusId='$CampusId'
                         ORDER BY Groups ASC";
  $query1 = mysqli_query($conn,$employeelistgroups);

  $employeelistclasses = "SELECT DISTINCT(Class) 
          FROM employeelist
          WHERE CampusId='$CampusId'
          ORDER BY Class ASC";
  $query3 = mysqli_query($conn,$employeelistclasses);

  $employeelistdepartment = "SELECT DISTINCT(Department) 
          FROM employeelist
          WHERE CampusId='$CampusId'
          ORDER BY Department ASC";
  $query2 = mysqli_query($conn,$employeelistdepartment);

  $employeelistdataforprint = "SELECT * 
                               FROM employeelist
                               WHERE CampusId='$CampusId'";
  $queryforprint = mysqli_query($conn,$employeelistdataforprint);

 
?>


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
              <div class="container">
                <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 text-dark text-center p-1 h5 text-capitalize" style="border-radius: 0px 0px 80px 80px;">
                    <div class="text-white" style="box-shadow: 1px 1px 2px black;border-radius: 0px 0px 50px 50px;background-color: #0047AB">Employee List</div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 text-right">
                    <a href="addemployee.php" style="text-decoration: none;"> 
                      <button class="btn btn-sm btn-secondary mt-2 mr-4 text-white" style="border-radius: 40px;"><i class="fa fa-plus pr-1"></i>New Employee</button>
                    </a>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xl-12 mt-4 mb-5">
                    <div class="container p-2" style="border-radius: 2px;box-shadow: 1px 1px 10px;border:1px solid black">
                      <div class="row">
                        <div class="col-xl-12 mb-2">
                          <div class="col-xl-12 p-3 font-weight-bold" style="background-color:#323E6F;border-radius: 20px 20px 0px 0px;font-size: 18px;font-family: verdana">
                            <div class="container pb-3">
                              <div class="row">
                                <span class="col-xl-2 pt-2 text-white" style="border-radius: 20px;font-size: 9px">
                                  <span class="rounded-circle bg-dark p-2">FILTER<img src="pics/filter.png" class=" icon ml-1" style="height: 15px;width: 15px;"></span>
                                </span>
                                <div class="col-xl-8"></div>
                                <div class="col-xl-2 mt-1 text-right">
                                    <a href="viewemployee.php" class="btn btn-sm btn-danger rounded-circle" style="text-decoration: none;box-shadow: 1px 1px 8px black">Reset</a>
                                </div>
                              </div>
                            </div>
                            
                            <div class="row pb-2">
                              <div class="col-xl-2">
                                <input type="text" id="byempid" class="form-control form-control-sm" placeholder="By Employee Id" onkeyup="filter()">
                              </div>
                              <div class="col-xl-3">
                                <input type="text" id="byname" class="form-control form-control-sm" placeholder="By Name" onkeyup="filter()">
                              </div>
                              <div class="col-xl-2">
                                <select class="form-control form-control-sm" id="bygender" oninput="filter()">
                                  <option value="">Gender</option>
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                                </select>
                              </div>
                              <div class="col-xl-3">
                               <select id="bydepartment" class="form-control form-control-sm" oninput="filter()">
                                  <option value="" style="background-color: lightgray">By Department</option>
                                  <?php
                                    while ($row2 = mysqli_fetch_assoc($query2)) 
                                    {
                                      ?>
                                        <option value="<?php echo$row2['Department']?>"><?php echo$row2['Department']?></option>
                                      <?php  
                                    }
                                  ?>
                                </select>
                              </div>
                              <div class="col-xl-2">
                                <select class="form-control form-control-sm" id="byisactive" oninput="filter()">
                                  <option value="">IsActive</option>
                                  <option value="Yes">Yes</option>
                                  <option value="No">No</option>
                                </select>
                              </div>
                            </div>
                            <div class="row pb-3">
                              <div class="col-xl-3">
                                <select id="bygroup" class="form-control form-control-sm" oninput="filter()">
                                  <option value="" style="background-color: lightgray">By Group</option>
                                  <?php
                                    while ($row1 = mysqli_fetch_assoc($query1)) 
                                    {
                                      ?>
                                        <option value="<?php echo$row1['Groups']?>"><?php echo$row1['Groups']?></option>
                                      <?php  
                                    }
                                  ?>
                                </select>
                              </div>
                              <div class="col-xl-3">
                                <select id="byclass" class="form-control form-control-sm" oninput="filter()">
                                  <option value="" style="background-color: lightgray">By Class</option>
                                  <?php
                                    while ($row2 = mysqli_fetch_assoc($query3)) 
                                    {
                                      ?>
                                        <option value="<?php echo$row2['Class']?>"><?php echo$row2['Class']?></option>
                                      <?php  
                                    }
                                  ?>
                                </select>
                              </div>
                              <div class="col-xl-3">
                                  <input type="number" id="bysalary" class="form-control form-control-sm" placeholder="By Salary" onkeyup="filter()">
                              </div>
                              <div class="col-xl-3">
                                <select class="form-control form-control-sm" id="bysalarytype" oninput="filter()">
                                  <option value="">By Salary Type</option>
                                  <option value="Fixed">Fixed</option>
                                  <option value="Percentage">Percentage</option>
                                </select>
                              </div>
                            </div>
                            <div class="row">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-xl-10"></div>
                        <div class="col-xl-2 btn-group">
                          <form action="printallemployee.php" method="post" target="_blank">
                            <button style="pointer-events: none;cursor: default;" class="btn btn-sm btn-warning" title="Print All" disabled id="printbtn">
                              Print<i class="pl-2 fa fa-print" style="font-size: 12px"></i>
                            </button>
                            <?php
                              while ($row3=mysqli_fetch_assoc($queryforprint)) 
                              {
                                ?>
                                  <input style="display:none ;" type="checkbox" name="printallcheckbox[]" class="printchecks" value="<?php echo $row3['EmployeeId']?>">
                                <?php
                              }
                            ?>
                            <input type="hidden" name="printallemployeecheck1" value="true">
                          </form>
                          <a href="deleteallemployee.php?id=<?= $allemployeeid?>" id="linkofdelete"  style="pointer-events: none;cursor: default;" id="deleteall" class = "btn-del">
                            <button disabled id="deleteallbtn" name="submit" class="btn btn-sm btn-danger" title="Delete All">Delete<i class="pl-2 fa fa-trash" disabled style="font-size: 12px"></i></button>
                          </a>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xl-12 table-sm">
                          <div class="table-responsive">
                            <table class="table table-light text-center table-bordered table-striped" id="tablebody"  style="font-size: 14px;border;line-height: 25px">
                              <tr style="background-color:#323E6F;color: white;box-shadow: 1px 1px 8px black">
                                <th class="text-center" scope="col" id="checkallstudent">
                                  <input type="checkbox" name="selectall" id="selectall" onclick="selectallchecks()">
                                  <label for="selectall"></label>
                                </th>
                                <th class="text-center">Emp Id</th>
                                <th class="text-center">Name</th> 
                                <th class="text-center">Gender</th>
                                <th class="text-center">Department</th> 
                                <th class="text-center">Class</th> 
                                <th class="text-center">Group</th> 
                                <th class="text-center">Subject</th> 
                                <th class="text-center">Salary In Pkr</th>
                                <th class="text-center">Salary In Per</th>
                                <th class="text-center">Active</th>
                                <th class="text-center">Action</th>
                              </tr>
                              <?php
                                if ($no_Of_total_employee==0) 
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
                                        <td class="text-center" scope="row" id="checkallstudent" style="line-height: 35px">
                                          <input type="checkbox" onclick="multipleoption()" id="checkshow<?php echo$i?>" class="checkshow" name="employeecheckbox[]" value="<?php echo$row['EmployeeId']?>">
                                          <label for="checkshow<?php echo$i?>" class=""></label>
                                        </td>
                                        <td style="line-height: 35px">
                                          <?php echo $row['Employee_Code']?>    
                                        </td>
                                        <td style="line-height: 35px">
                                          <?php echo $row['Employee_First_Name'].' '.$row['Employee_Last_Name']?>    
                                        </td>
                                        <td style="line-height: 35px">
                                          <?php echo $row['Gender']?>   
                                        </td>
                                         <td style="line-height: 35px">
                                          <?php echo $row['Department']?>   
                                        </td>
                                        <td style="line-height: 35px">
                                          <?php echo $row['Class']?>   
                                        </td>
                                        <td style="line-height: 35px">
                                          <?php echo $row['Groups']?>   
                                        </td>
                                        <td style="line-height: 35px">
                                          <?php echo $row['Subjects']?>   
                                        </td>
                                        <td style="line-height: 35px">
                                          <?php echo $row['SalaryInPkr']."PKR"?>   
                                        </td>
                                         <td style="line-height: 35px">
                                          <?php echo $row['SalaryInPer'].'%'?>   
                                        </td>
                                        <td class="text-center text-white" style="line-height: 35px">
                                          <?php
                                            if ($row['IsActive']=="No") 
                                            {
                                              ?>
                                                <img src="pics/cross.png" class="icon" style="height: 24px;">
                                              <?php
                                            }
                                            else
                                            {
                                              ?>
                                                <img src="pics/tick.png" class="icon" style="height: 35px;">
                                              <?php
                                            }
                                          ?>
                                          
                                        </td>                                
                                        <td class="text-center p-2">
                                          <div class="btn-group text-center">
                                            <form action="viewemployeeform.php" method="post" target="_blank">
                                              <button class="btn-sm btn-success rounded-circle mr-1" title="View form"><i class="fa fa-eye" style="font-size: 11px"></i></button>
                                              <input type="hidden" name="check1" value="<?php echo $row['EmployeeId']?>">
                                            </form>
                                            <form action="editemployee.php" method="post">
                                              <button class="btn-sm btn-info rounded-circle mr-1" title="Edit"><i class="fa fa-edit" style="font-size: 11px"></i></button>
                                              <input type="hidden" name="check2" value="<?php echo $row['EmployeeId']?>">
                                            </form>
                                            <a href="deleteemployee.php?id=<?= $row['EmployeeId']?>" class = "btn-del"><button style="background-color: red" name="submit" class="btn-sm btn-danger rounded-circle" title="Delete"><i class="fa fa-trash" style="font-size: 11px"></i></button></a>
                                          </div>
                                        </td>
                                      </tr>
                                    <?php
                                    $i+=1;
                                  }
                                }
                              ?>
                              <tr style="background-color: lightgray">
                                <td class="border-0 font-italic" style="font-size: 14px;">Total : <span id="totalrecord"><?php echo $no_Of_total_employee ?></span></td>
                                <td class="border-0 "></td>
                                <td class="border-0 "></td>
                                <td class="border-0 "></td>
                                <td class="border-0 "></td>
                                <td class="border-0 "></td>
                                <td class="border-0 "></td>
                                <td class="border-0 "></td>
                                <td class="border-0 "></td>
                                <td class="border-0 "></td>
                                <td class="border-0 "></td>
                                <td class="border-0 "></td>
                              </tr>
                            </table>
                          </div>
                          <?php if(isset($_GET['delete'])) :?>
                            <div class="flash-data" data-flashdata="<?= $_GET['delete'];?>"></div>
                          <?php endif; ?>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>

      </div>


  </div>



  <!-- delete record -->
  <script>
    $('.btn-del').on('click',function(e){
      e.preventDefault();
      const href = $(this).attr('href')

      Swal.fire ({
        title : 'Are You Sure?',
        text : 'This may cause permanent loss of data',
        icon : 'warning',
        showCancelButton : true,
        confirmButtonColor : '#4385F6',
        cancelButtonColor : '#FF3548',
        confirmButtonText : 'Delete',
      }).then((result)=>{
        if (result.value) {
          document.location.href = href;
        }
      })
    })

    const flashdata = $('.flash-data').data('flashdata')

    if (flashdata){
      Swal.fire({
        icon : 'success',
        title : 'Deleted',
        type : 'Delete',
      })
    }
  </script>
  <!-- delete record ends -->


  <!-- End of Page Wrapper -->
  
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <!-- filter -->
  <script>
    function selectallchecks() 
    {
      var selectall = document.getElementById('selectall');
      var checkshow = document.getElementsByClassName('checkshow');
      
      var byempid = document.getElementById('byempid').value.toUpperCase(); 
      var byname = document.getElementById('byname').value.toUpperCase();
      var bygender = document.getElementById('bygender').value;
      var byclass = document.getElementById('byclass').value.toUpperCase();
      var bygroup = document.getElementById('bygroup').value.toUpperCase();
      var bydepartment = document.getElementById('bydepartment').value;
      var bysalary = document.getElementById('bysalary').value;
      var bysalarytype = document.getElementById('bysalarytype').value;
      var byisactive = document.getElementById('byisactive').value;
      var tablebody = document.getElementById('tablebody');
      var tr = document.getElementsByTagName('tr');
      

      for (var i=1 , j=0 ;i<tr.length-1 ;i++ ,j++) 
      {
        var td0 = tr[i].getElementsByTagName('td')[0];
        var td1 = tr[i].getElementsByTagName('td')[1];
        var td2 = tr[i].getElementsByTagName('td')[2];
        var td3 = tr[i].getElementsByTagName('td')[3];
        var td4 = tr[i].getElementsByTagName('td')[4];
        var td5 = tr[i].getElementsByTagName('td')[5];
        var td6 = tr[i].getElementsByTagName('td')[6];
        var td7 = tr[i].getElementsByTagName('td')[7];
        var td8 = tr[i].getElementsByTagName('td')[8];
        var td9 = tr[i].getElementsByTagName('td')[9];
        if (td0 && td1 && td2 && td3 && td4 && td5 && td6 && td7 && td8 && td8) 
        {
          var textvalue0 = td0.textContent || td0.innerHTML;
          var textvalue1 = td1.textContent || td1.innerHTML;
          var textvalue2 = td2.textContent || td2.innerHTML;
          var textvalue3 = td3.textContent || td3.innerHTML;
          var textvalue4 = td4.textContent || td4.innerHTML;
          var textvalue5 = td5.textContent || td5.innerHTML;
          var textvalue6 = td6.textContent || td6.innerHTML;
          var textvalue7 = td7.textContent || td7.innerHTML;
          var textvalue8 = td8.textContent || td8.innerHTML;
          var textvalue9 = td9.textContent || td9.innerHTML;
          if (selectall.checked)
          {
            if ((textvalue1.toUpperCase().indexOf(byempid)>-1)&&(textvalue2.toUpperCase().indexOf(byname)>-1)&&(textvalue3.indexOf(bygender)>-1)&&(textvalue4.indexOf(bydepartment)>-1)&&(textvalue5.toUpperCase().indexOf(byclass)>-1)&&(textvalue6.toUpperCase().indexOf(bygroup)>-1)&&(textvalue7.indexOf(bysalarytype)>-1)&&(textvalue8.indexOf(bysalary)>-1)&&(textvalue9.indexOf(byisactive)>-1))  
            {
              checkshow[j].checked=true;
              checkshow[j].disabled=true;
            }
          }
          else
          {
            checkshow[j].checked=false;
            checkshow[j].disabled=false;
          }
        }
      }      
      multipleoption();
    }

    function multipleoption()
    {
      var linkofdelete= document.getElementById('linkofdelete');
      var printbtn = document.getElementById('printbtn');
      var deleteallbtn = document.getElementById('deleteallbtn');
      var checkshow = document.getElementsByClassName('checkshow');
      var employeeids ="";
      var printchecks = document.getElementsByClassName('printchecks');
      j=0
      for (var i = 0 ; i <checkshow.length ; i++) 
      {
        if (checkshow[i].checked) 
        {
          employeeids = employeeids+checkshow[i].value+'_';
          printchecks[i].checked=true;
          printbtn.disabled= false;
          printbtn.style.pointerEvents="";
          printbtn.style.cursor="";
          deleteallbtn.disabled= false;
          linkofdelete.style.pointerEvents="";
          linkofdelete.style.cursor = "";
          j+=1;
        }
        else
        {
          printchecks[i].checked=false;
          j-=1;
        }
      }
      if (j==-(checkshow.length)) 
      {
        printbtn.disabled= true;
        printbtn.style.pointerEvents="none";
        printbtn.style.cursor="default";
        deleteallbtn.disabled=true;
        linkofdelete.style.pointerEvents="none";
        linkofdelete.style.cursor = "default";
      }
      linkofdelete.href  = "deleteallemployee.php?id="+employeeids;
    }

    function filter() 
    {
      var byempid = document.getElementById('byempid').value.toUpperCase(); 
      var byname = document.getElementById('byname').value.toUpperCase();
      var bygender = document.getElementById('bygender').value;
      var byclass = document.getElementById('byclass').value.toUpperCase();
      var bygroup = document.getElementById('bygroup').value.toUpperCase();
      var bydepartment = document.getElementById('bydepartment').value;
      var bysalary = document.getElementById('bysalary').value;
      var bysalarytype = document.getElementById('bysalarytype').value;
      var byisactive = document.getElementById('byisactive').value;
      var tablebody = document.getElementById('tablebody');
      var tr = document.getElementsByTagName('tr');
      for (var i=1 ;i<tr.length-1 ;i++) 
      {
        var td0 = tr[i].getElementsByTagName('td')[0];
        var td1 = tr[i].getElementsByTagName('td')[1];
        var td2 = tr[i].getElementsByTagName('td')[2];
        var td3 = tr[i].getElementsByTagName('td')[3];
        var td4 = tr[i].getElementsByTagName('td')[4];
        var td5 = tr[i].getElementsByTagName('td')[5];
        var td6 = tr[i].getElementsByTagName('td')[6];
        var td7 = tr[i].getElementsByTagName('td')[7];
        var td8 = tr[i].getElementsByTagName('td')[8];
        var td9 = tr[i].getElementsByTagName('td')[9];
        if (td0 && td1 && td2 && td3 && td4 && td5 && td6 && td7 && td8 && td9) 
        {
          var textvalue0 = td0.textContent || td0.innerHTML;
          var textvalue1 = td1.textContent || td1.innerHTML;
          var textvalue2 = td2.textContent || td2.innerHTML;
          var textvalue3 = td3.textContent || td3.innerHTML;
          var textvalue4 = td4.textContent || td4.innerHTML;
          var textvalue5 = td5.textContent || td5.innerHTML;
          var textvalue6 = td6.textContent || td6.innerHTML;
          var textvalue7 = td7.textContent || td7.innerHTML;
          var textvalue8 = td8.textContent || td8.innerHTML;
          var textvalue9 = td9.textContent || td9.innerHTML;
          if ((textvalue1.toUpperCase().indexOf(byempid)>-1)&&(textvalue2.toUpperCase().indexOf(byname)>-1)&&(textvalue3.indexOf(bygender)>-1)&&(textvalue4.indexOf(bydepartment)>-1)&&(textvalue5.toUpperCase().indexOf(byclass)>-1)&&(textvalue6.toUpperCase().indexOf(bygroup)>-1)&&(textvalue7.indexOf(bysalarytype)>-1)&&(textvalue8.indexOf(bysalary)>-1)&&(textvalue9.indexOf(byisactive)>-1))  
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
  </script>
  <!-- filter ends -->



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
