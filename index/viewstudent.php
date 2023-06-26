<?php
 require "profileinfo.php";
?>



<!DOCTYPE html>
<html lang="en">

<head>

  <title>Student List</title>
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
  if (isset($_POST['editstudentcheck3'])) 
  {
    $idofstudent = $_POST['idofstudent'];
    $IsActive = $_POST['IsActive'];
    $classes = $_POST['classes'];
    $sname   = htmlspecialchars(ucwords($_POST['sname']));
    $sfname   = htmlspecialchars(ucwords($_POST['sfname'])); 
    $gender  = $_POST['gender'];
    $dob  = $_POST['dob'];
    $sdomicile = htmlspecialchars(ucwords($_POST['sdomicile']));
    $sreligion = htmlspecialchars(ucwords($_POST['sreligion']));
    $scnic = htmlspecialchars($_POST['scnic']);
    $snationality = htmlspecialchars(ucwords($_POST['snationality']));
    $sphone = htmlspecialchars($_POST['sphone']);
    $scell = htmlspecialchars(strtolower($_POST['scell']));
    $semail = htmlspecialchars(strtolower($_POST['semail']));
    $saddress = htmlspecialchars(ucwords($_POST['saddress']));
    $hearfrom = $_POST['hearfrom'];

    // guardian data
    $gname = htmlspecialchars(ucwords($_POST['gname']));
    $gcnic = htmlspecialchars($_POST['gcnic']);
    $gemail = htmlspecialchars(strtolower($_POST['gemail']));
    $gphone = htmlspecialchars($_POST['gphone']);
    $gcell = htmlspecialchars($_POST['gcell']);


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


    $admissionfee = htmlspecialchars($_POST['admfee']);
    $admissiondiscount = htmlspecialchars($_POST['admdiscount']);
    $admissiontotal = htmlspecialchars($_POST['admtotal']);
    $tuitionfee = htmlspecialchars($_POST['tuitionfee']);
    $tuitiondiscount = htmlspecialchars($_POST['tuitiondiscount']);
    $tuitiontotal = htmlspecialchars($_POST['tuitiontotal']);
    $specialcharges = htmlspecialchars($_POST['specialcharges']);
    $specialdiscount = htmlspecialchars($_POST['specialdiscount']);
    $specialtotal = htmlspecialchars($_POST['specialtotal']);
    $discountpackage = $_POST['discountpackage'];
    $actualfees = htmlspecialchars($_POST['actualfeesv']);
    $totaldiscount = htmlspecialchars($_POST['totaldiscountv']);
    $totalfees = htmlspecialchars($_POST['totalfeesv']);

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

    $submitby = htmlspecialchars(ucwords($_POST['submitby']));
    $submission_date = date("dF,Y");
    $currentmonth = date("F");
    require 'connectdatabase.php';
    $Updatestudent = "UPDATE studentlist 
                      SET 
                      First_Name = '$sname',
                      Last_Name  = '$sfname',
                      Gender = '$gender',
                      DOB = '$dob',
                      Religion = '$sreligion',
                      Domicile = '$sdomicile',
                      CNIC = '$scnic',
                      Nationality = '$snationality',
                      Address = '$saddress',
                      Phone = '$sphone',
                      Cell = '$scell',
                      Email = '$semail',
                      IsActive = '$IsActive',
                      Class = '$classes',
                      Groups = '$group',
                      Batch = '$batch',
                      Status = '$status',
                      Board_Uni_School = '$board',
                      Subjects = '$subjects',
                      No_of_Subjects = '$noofsubj',
                      Parent_Name = '$gname',
                      Parent_CNIC = '$gcnic',
                      Parent_Contact = '$gphone',
                      Parent_Cell = '$gcell',
                      Parent_Email = '$gemail',
                      Admission_Fee = '$admissionfee',
                      Admission_Discount = '$admissiondiscount',
                      Admission_Total = '$admissiontotal',
                      Tuition_Fee = '$tuitionfee',
                      Tuition_Discount = '$tuitiondiscount',
                      Tuition_Total = '$tuitiontotal',
                      Special_Fee = '$specialcharges',
                      Special_Discount = '$specialdiscount',
                      Special_Total = '$specialtotal',
                      DiscountPackage = '$discountpackage',
                      Actual_Fee = '$actualfees',
                      Total_discount = '$totaldiscount',
                      Total_Fee = '$totalfees',
                      Submission_date = '$submission_date',
                      Submit_By = '$submitby',
                      HearBy ='$hearfrom'
                      WHERE StudentId = '$idofstudent' 
                      ";

    $studentrollno = "SELECT Roll_No
          FROM studentlist
          WHERE CampusId='$CampusId' AND StudentId='$idofstudent'";
    $query4 = mysqli_query($conn,$studentrollno);
    $student_rollno = mysqli_fetch_array($query4);
    $stdrollno = $student_rollno['Roll_No'];

    $month = date('m');
    $year = date('Y');
    if ($month==1||$month==3||$month==5||$month==7||$month==8||$month==10||$month==12) 
    {
      $daysinmonth= 31;
    }
    elseif ($month==2) 
    {
      if ($year%4==0) 
      {
        $daysinmonth = 29;
      }
      else
      {
        $daysinmonth = 28;
      }
    }
    else
    {
      $daysinmonth = 30;
    }

    // to solve the problem of: (when student update it take it as a new student)
    //check for the vouchers of the specific student.
    // no of voucher for a specific student
    $checkforvoucher="  SELECT COUNT(StudentRollNo) as nooffeevouchers
                        FROM feedetails
                        WHERE CampusId='$CampusId' AND StudentRollNo ='$stdrollno'
                    ";
    $query4 = mysqli_query($conn,$checkforvoucher);
    $nooffeevouchers = mysqli_fetch_assoc($query4);
    $no_of_feevouchers = $nooffeevouchers['nooffeevouchers']; //no of voucher of a specific student

    if ($no_of_feevouchers>1) 
    {
      $actualfees = $actualfees-$admissionfee;
      $totaldiscount = $totaldiscount - $admissiondiscount;
      $totalfees = $totalfees -$admissiontotal;
      $admissionfee=0;
      $admissiondiscount=0;
      $admissiontotal=0;  
    }


    $Updatestudentfromfeevoucher1 = " UPDATE feedetails 
                                      SET 
                                      StudentName = '$sname',
                                      FatherName  = '$sfname',
                                      ClassesName = '$classes',
                                      GroupsName = '$group',
                                      BatchName = '$batch',
                                      Status = '$status',
                                      BoardsName = '$board',
                                      SubjectsName = '$subjects',
                                      Admission_Fee = '$admissionfee',
                                      Admission_Discount = '$admissiondiscount',
                                      Admission_Total = '$admissiontotal',
                                      Tuition_Fee = '$tuitionfee',
                                      Tuition_Discount = '$tuitiondiscount',
                                      Tuition_Total = '$tuitiontotal',
                                      Special_Fee = '$specialcharges',
                                      Special_Discount = '$specialdiscount',
                                      Special_Total = '$specialtotal',
                                      DiscountPackage = '$discountpackage',
                                      Actual_Fee = '$actualfees',
                                      Total_discount = '$totaldiscount',
                                      Total_Fee = '$totalfees',
                                      Paid_Admission_Fee ='0',
                                      Paid_Tuition_Fee ='0',
                                      Paid_Special_Fee='0',
                                      Total_Paid='0',
                                      Balance='$totalfees',
                                      Days = '$daysinmonth',
                                      Total_Paid_Admission_Fee ='0',
                                      Total_Paid_Tuition_Fee ='0',
                                      Total_Paid_Special_Fee='0',
                                      AlreadyPaid= '0'
                                      WHERE StudentRollNo = '$stdrollno' AND Month = '$currentmonth' 
                                      ";
    $Updatestudentfromfeevoucher2 = " UPDATE feedetails 
                                      SET 
                                      StudentName = '$sname',
                                      FatherName  = '$sfname'
                                      WHERE StudentRollNo = '$stdrollno' AND Month != '$currentmonth' 
                                      ";
    if (mysqli_query($conn, $Updatestudent)&&mysqli_query($conn, $Updatestudentfromfeevoucher1)&&mysqli_query($conn, $Updatestudentfromfeevoucher2)) 
    {
      echo 
        '<input type="hidden" >
        <script>
          Swal.fire("Update", "Student update", "success");
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

  if (!empty($_POST['studentcheck4'])) 
  {
    $classes = $_POST['classes'];
    $IsActive = $_POST['IsActive'];
    $sname   = htmlspecialchars(ucwords($_POST['sname']));
    $sfname   = htmlspecialchars(ucwords($_POST['sfname'])); 
    $gender  = $_POST['gender'];
    $dob  = $_POST['dob'];
    $sdomicile = htmlspecialchars(ucwords($_POST['sdomicile']));
    $sreligion = htmlspecialchars(ucwords($_POST['sreligion']));
    $scnic = htmlspecialchars($_POST['scnic']);
    $snationality = htmlspecialchars(ucwords($_POST['snationality']));
    $sphone = htmlspecialchars($_POST['sphone']);
    $scell = htmlspecialchars(strtolower($_POST['scell']));
    $semail = htmlspecialchars(strtolower($_POST['semail']));
    $saddress = htmlspecialchars(ucwords($_POST['saddress']));
    $hearfrom = $_POST['hearfrom'];

    // guardian data
    $gname = htmlspecialchars(ucwords($_POST['gname']));
    $gcnic = htmlspecialchars($_POST['gcnic']);
    $gemail = htmlspecialchars(strtolower($_POST['gemail']));
    $gphone = htmlspecialchars($_POST['gphone']);
    $gcell = htmlspecialchars($_POST['gcell']);


    $batch = $_POST['batch'];
    $status = $_POST['status'];
    $group = $_POST['group'];
    $board = $_POST['board'];

    $subjects = $_POST['subjects'];
    $noofsubj= $_POST['noofsubj'];


    $admissionfee = htmlspecialchars($_POST['admissionfee']);
    $admissiondiscount = htmlspecialchars($_POST['admissiondiscount']);
    $admissiontotal = htmlspecialchars($_POST['admissiontotal']);
    $tuitionfee = htmlspecialchars($_POST['tuitionfee']);
    $tuitiondiscount = htmlspecialchars($_POST['tuitiondiscount']);
    $tuitiontotal = htmlspecialchars($_POST['tuitiontotal']);
    $specialcharges = htmlspecialchars($_POST['specialcharges']);
    $specialdiscount = htmlspecialchars($_POST['specialdiscount']);
    $specialtotal = htmlspecialchars($_POST['specialtotal']);
    $discountpackage = $_POST['discountpackage'];
    $actualfees = htmlspecialchars($_POST['actualfees']);
    $totaldiscount = htmlspecialchars($_POST['totaldiscount']);
    $totalfees = htmlspecialchars($_POST['totalfees']);

    
    $admissionfeepaid = htmlspecialchars($_POST['admissionfeepaid']);
    $tuitionfeepaid = htmlspecialchars($_POST['tuitionfeepaid']);
    $specialfeepaid = htmlspecialchars($_POST['specialfeepaid']);
    $totalpaid = htmlspecialchars($_POST['totalpaid']);
    $balance = htmlspecialchars($_POST['balance']);
    $duedate = $_POST['duedate'];


    if ($balance>0) 
    {
      $ispaid = "Unpaid";
    }
    else
    {
      $ispaid = "Paid";
    }

    $submitby = htmlspecialchars(ucwords($_POST['submitby']));
    $submission_date = date("dF,Y");
    $countstudent ="SELECT COUNT(StudentId) as countstudent
                    FROM studentlist
                    WHERE CampusId='$CampusId'";
    $query7 = mysqli_query($conn,$countstudent);
    $countstudentlist = mysqli_fetch_array($query7);
    $noofstudent=$countstudentlist['countstudent'];

    
    
    if ($noofstudent==0) 
    {
      $rollno = 100;
    }
    else
    {
      $maxstudent ="SELECT MAX(Roll_No) as maxstudent
                    FROM studentlist
                    WHERE CampusId='$CampusId'";
      $query7 = mysqli_query($conn,$maxstudent);
      $maxstudentlist = mysqli_fetch_array($query7);
      $maxnoofstudent=$maxstudentlist['maxstudent'];
      $rollno = $maxnoofstudent +1;
    }

    $voucherarray = array();
    $countfeevoucher ="SELECT COUNT(FeeVoucherId) as countfeevoucher
                      FROM feedetails
                      WHERE CampusId='$CampusId'";
    $query7 = mysqli_query($conn,$countfeevoucher);
    $countfeevoucher = mysqli_fetch_array($query7);
    $nooffeevoucher=$countfeevoucher['countfeevoucher'];
    if ($nooffeevoucher==0) 
    {
      $voucherno = 1;
    }
    else
    {
      $maxfeevoucher ="SELECT VoucherNo
                    FROM feedetails
                    WHERE CampusId='$CampusId'";
      $query7 = mysqli_query($conn,$maxfeevoucher);
      while ($row2= mysqli_fetch_assoc($query7)) 
      {
        $voucherarray[]=$row2['VoucherNo'];
      }
      $lastid=($voucherarray[count($voucherarray)-1]);
      $lastidarray =preg_split('/RVF/',$lastid);
      $lastidnum = $lastidarray[0];
      $voucherno = $lastidnum +1;
    }
    $voucherno = $voucherno.'RVF';
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
    $month = date('m');
    $year = date('Y');
    if ($month==1||$month==3||$month==5||$month==7||$month==8||$month==10||$month==12) 
    {
      $daysinmonth= 31;
    }
    elseif ($month==2) 
    {
      if ($year%4==0) 
      {
        $daysinmonth = 29;
      }
      else
      {
        $daysinmonth = 28;
      }
    }
    else
    {
      $daysinmonth = 30;
    }

    $feeindayscheck = $_POST['feeindayscheck']; 


    if ($feeindayscheck==0) 
    {
      $days = $daysinmonth;
    }
    else
    {
      $days =$_POST['days'];
    }

    if ($balance>0) 
    {
      $ispaid = "Unpaid";
    }
    else
    {
      $ispaid = "Paid";
    }








    $currentdate = date('d/m/Y');
    require 'connectdatabase.php';
    $submitstudent = "INSERT INTO studentlist( 
                      CampusId,  
                      Roll_NO,
                      First_Name,
                      Last_Name,
                      Gender,
                      DOB,
                      Religion,
                      Domicile,
                      CNIC,
                      Nationality,
                      Address,
                      Phone,
                      Cell,
                      Email,
                      Class,
                      Groups,
                      Batch,
                      Status,
                      Board_Uni_School,
                      Subjects,
                      No_of_Subjects,
                      Parent_Name,
                      Parent_CNIC,
                      Parent_Contact,
                      Parent_Cell,
                      Parent_Email,
                      Admission_Fee,
                      Admission_Discount,
                      Admission_Total,
                      Tuition_Fee,
                      Tuition_Discount,
                      Tuition_Total,
                      Special_Fee,
                      Special_Discount,
                      Special_Total,
                      DiscountPackage,
                      Actual_Fee,
                      Total_discount,
                      Total_Fee,
                      IsPaid,
                      IsActive,
                      HearBy,
                      Submission_date,
                      Submit_By)
                    VALUES(
                      '$CampusId',
                      '$rollno',
                      '$sname',
                      '$sfname', 
                      '$gender',
                      '$dob',
                      '$sreligion',
                      '$sdomicile',
                      '$scnic',
                      '$snationality',
                      '$saddress',
                      '$sphone',
                      '$scell',
                      '$semail',
                      '$classes',
                      '$group',
                      '$batch',
                      '$status',
                      '$board',
                      '$subjects',
                      '$noofsubj',
                      '$gname',
                      '$gcnic',
                      '$gphone',
                      '$gcell',
                      '$gemail',
                      '$admissionfee',
                      '$admissiondiscount',
                      '$admissiontotal',
                      '$tuitionfee',
                      '$tuitiondiscount',
                      '$tuitiontotal',
                      '$specialcharges',
                      '$specialdiscount',
                      '$specialtotal',
                      '$discountpackage',
                      '$actualfees',
                      '$totaldiscount',
                      '$totalfees',
                      '$ispaid',
                      '$IsActive',
                      '$hearfrom',
                      '$submission_date',
                      '$submitby')
                    ";
    $months = date('F');

    if ($IsActive=="Yes") 
    {
      $lastpaiddate = date('dF,Y');
      $insertfeevoucher ="INSERT feedetails(
                        CampusId,
                        StudentRollNo,
                        StudentName,
                        Paid_Admission_Fee,
                        Paid_Tuition_Fee,
                        Paid_Special_Fee,
                        Total_Paid,
                        Balance,
                        DueDate,
                        Month,
                        VoucherNo,
                        ClassesName,
                        GroupsName,
                        BoardsName,
                        SubjectsName,
                        BatchName,
                        IsPaid,
                        FeeInDays,
                        Days,
                        Admission_Fee,
                        Admission_Discount,
                        Admission_Total,
                        Tuition_Fee,
                        Tuition_Discount,
                        Tuition_Total,
                        Special_Fee,
                        Special_Discount,
                        Special_Total,
                        Actual_Fee,
                        Total_Discount,
                        Total_Fee,
                        DiscountPackage,
                        CreateDate,
                        Status,
                        FatherName,
                        Total_Paid_Admission_Fee,
                        Total_Paid_Tuition_Fee, 
                        Total_Paid_Special_Fee,
                        LastPaidDate
                        )
                        VALUES(
                       '$CampusId',
                       '$rollno',
                       '$sname',
                       '$admissionfeepaid',
                       '$tuitionfeepaid',
                       '$specialfeepaid',
                       '$totalpaid',
                       '$balance',
                       '$duedate',
                       '$months',
                       '$voucherno',
                       '$classes',
                       '$group',
                       '$board',
                       '$subjects',
                       '$batch',
                       '$ispaid',
                       '$feeindayscheck',
                       '$days',
                       '$admissionfee',
                       '$admissiondiscount',
                       '$admissiontotal',
                       '$tuitionfee',
                       '$tuitiondiscount',
                       '$tuitiontotal',
                       '$specialcharges',
                       '$specialdiscount',
                       '$specialtotal',
                       '$actualfees',
                       '$totaldiscount',
                       '$totalfees',
                       '$discountpackage',
                       '$currentdate',
                       '$status',
                       '$sfname',
                       '$admissionfeepaid',
                       '$tuitionfeepaid',
                       '$specialfeepaid',
                       '$lastpaiddate'
                      )";
      $query2=mysqli_query($conn, $insertfeevoucher);
    }
    else
    {
      $query2=true;
    }

    if (mysqli_query($conn, $submitstudent)&& $query2) 
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
      echo "Error: " . $submitstudent . "<br>" . mysqli_error($conn);
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
  $studentlistdata = "SELECT * 
          FROM studentlist
          WHERE CampusId='$CampusId'";
  $query = mysqli_query($conn,$studentlistdata);

  $nooftotalstudent = "SELECT COUNT(StudentId) as studentno 
          FROM studentlist
          WHERE CampusId='$CampusId'";
  $query4 = mysqli_query($conn,$nooftotalstudent);
  $studentno = mysqli_fetch_array($query4);
  $no_Of_total_student = $studentno['studentno'];

  $studentlistgroups = "SELECT DISTINCT(Groups) 
          FROM studentlist
          WHERE CampusId='$CampusId'
          ORDER BY Groups ASC";
  $query1 = mysqli_query($conn,$studentlistgroups);

  $studentlistclasses = "SELECT DISTINCT(Class) 
          FROM studentlist
          WHERE CampusId='$CampusId'
          ORDER BY Class ASC";
  $query3 = mysqli_query($conn,$studentlistclasses);

  $studentlistdataforprint = "SELECT * 
          FROM studentlist
          WHERE CampusId='$CampusId'";
  $queryforprint = mysqli_query($conn,$studentlistdataforprint);

  $studentid = "SELECT StudentId
          FROM studentlist
          WHERE CampusId='$CampusId'";
  $query6 = mysqli_query($conn,$studentid);

  if (mysqli_num_rows($query6) >0) {
    while ($row4=mysqli_fetch_assoc($query6)) 
    {
      $allstudentid[] = $row4['StudentId']; 
    }
    $allstudentid = implode('_', $allstudentid);
  }
  

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
                    <div class="text-white" style="box-shadow: 1px 1px 2px black;border-radius: 0px 0px 50px 50px;background-color: #0047AB">Student List</div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 text-right">
                    <a href="printblankform.php" style="text-decoration: none;" target="_blank"> 
                      <button class="btn btn-sm btn-warning mt-2 text-white" style="border-radius: 40px;"><i class="fa fa-print pr-1"></i>Blank form</button>
                    </a>
                    <a href="addstudent.php"> 
                      <button class="btn btn-sm btn-secondary mt-2 mr-4 text-white" style="border-radius: 40px;"><i class="fa fa-plus pr-1"></i>New Student</button>
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
                                    <a href="viewstudent.php" class="btn btn-sm btn-danger rounded-circle" style="text-decoration: none;box-shadow: 1px 1px 8px black">Reset</a>
                                </div>
                              </div>
                            </div>
                            
                            <div class="row pb-2">
                              <div class="col-xl-2">
                                <input type="number" id="byrollno" class="form-control form-control-sm" placeholder="By Roll No" onkeyup="filter()">
                              </div>
                              <div class="col-xl-2">
                                <input type="text" id="byname" class="form-control form-control-sm" placeholder="By Name" onkeyup="filter()">
                              </div>
                              <div class="col-xl-3">
                                <input type="text" id="byparentname" class="form-control form-control-sm" placeholder="By Parent Name" onkeyup="filter()">
                              </div>
                              <div class="col-xl-2">
                                <select class="form-control form-control-sm" id="bygender" oninput="filter()">
                                  <option value="">Gender</option>
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                                </select>
                              </div>
                              <div class="col-xl-3">
                                <input type="number" id="bymobile" class="form-control form-control-sm" placeholder="By Mobile" onkeyup="filter()">
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
                                <select class="form-control form-control-sm" id="bystatus" oninput="filter()">
                                  <option value="">Status</option>
                                  <option value="Paid">Paid</option>
                                  <option value="Unpaid">Unpaid</option>
                                </select>
                              </div>
                              <div class="col-xl-3">
                                <select class="form-control form-control-sm" id="byisactive" oninput="filter()">
                                  <option value="">Active</option>
                                  <option value="Yes">Yes</option>
                                  <option value="No">No</option>
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
                          <form action="printallstudent.php" method="post" target="_blank">
                            <button style="pointer-events: none;cursor: default;" class="btn btn-sm btn-warning" title="Print All" disabled id="printbtn">
                              Print<i class="pl-2 fa fa-print" style="font-size: 12px"></i>
                            </button>
                            <?php
                              while ($row3=mysqli_fetch_assoc($queryforprint)) 
                              {
                                ?>
                                  <input style="display:none ;" type="checkbox" name="printallcheckbox[]" class="printchecks" value="<?php echo $row3['StudentId']?>">
                                <?php
                              }
                            ?>
                            <input type="hidden" name="printallstudentcheck1" value="true">
                          </form>
                          <a href="deleteallstudent.php?id=<?= $allstudentid?>" id="linkofdelete"  style="pointer-events: none;cursor: default;" id="deleteall" class = "btn-del">
                            <button disabled id="deleteallbtn" name="submit" class="btn btn-sm btn-danger" title="Delete All">Delete<i class="pl-2 fa fa-trash" disabled style="font-size: 12px"></i></button>
                          </a>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xl-12 table-sm">
                          <div class=" table-responsive">
                            <table class="table table-light text-center table-bordered table-striped" id="tablebody"  style="font-size: 14px;border;line-height: 25px">
                                <tr style="background-color:#323E6F;color: white;box-shadow: 1px 1px 8px black">
                                    <th class="text-center" scope="col" id="checkallstudent">
                                        <input type="checkbox" name="selectall" id="selectall" onclick="selectallchecks()">
                                        <label for="selectall"></label>
                                    </th>
                                    <th class="text-center">Roll No</th>
                                    <th class="text-center">Name</th> 
                                    <th class="text-center">Parent</th> 
                                    <th class="text-center">Gender</th>
                                    <th class="text-center">Class</th> 
                                    <th class="text-center">Group</th> 
                                    <th class="text-center">Mobile</th>
                                    <th class="text-center">Active</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
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
                                            <td class="text-center" scope="row" id="checkallstudent" style="line-height: 35px">
                                                <input type="checkbox" onclick="multipleoption()" id="checkshow<?php echo$i?>" class="checkshow" name="studentcheckbox[]" value="<?php echo$row['StudentId']?>">
                                                <label for="checkshow<?php echo$i?>" class=""></label>
                                            </td>
                                            <td style="line-height: 35px">
                                                <?php echo $row['Roll_No']?>    
                                            </td>
                                            <td style="line-height: 35px">
                                                <?php echo $row['First_Name']?>    
                                            </td>
                                            <td style="line-height: 35px">
                                                <?php echo $row['Last_Name']?>
                                            </td>
                                            <td style="line-height: 35px">
                                                <?php echo $row['Gender']?>   
                                            </td>
                                            <td style="line-height: 35px">
                                                <?php echo $row['Class']?>   
                                            </td>
                                            <td style="line-height: 35px">
                                                <?php echo $row['Groups']?>   
                                            </td>
                                            <td style="line-height: 35px">
                                                <?php echo $row['Cell']?>   
                                            </td>
                                            <td class="text-center text-white" style="line-height: 35px">
                                            <?php
                                                if ($row['IsActive']=="No") 
                                                {
                                                ?>
                                                    <img src="pics/cross.png" class="icon" style="height: 24px;">
                                                    <p style="display: none">No</p>
                                                <?php
                                                }
                                                else
                                                {
                                                ?>
                                                    <img src="pics/tick.png" class="icon" style="height: 35px;">
                                                    <p style="display: none">Yes</p>
                                                <?php
                                                }
                                            ?>
                                                
                                            </td>
                                            <?php
                                                if ($row['IsPaid']=="Paid") 
                                                {
                                                ?>
                                                    <td class="text-center alert alert-success font-weight-normal text-dark" style="line-height: 35px;background-color: #41AD49"><?php echo$row['IsPaid']?></td>
                                                <?php
                                                }
                                                else
                                                {
                                                ?>
                                                    <td class="text-center alert alert-danger font-weight-normal text-dark" style="line-height: 35px"><?php echo$row['IsPaid']?></td>
                                                <?php
                                                }
                                            ?>
                                            
                                            <td class="text-center p-2">
                                                <div class="btn-group text-center">
                                                <form action="viewstudentform.php" method="post" target="_blank">
                                                    <button class="btn-sm btn-success rounded-circle mr-1" title="View form"><i class="fa fa-eye" style="font-size: 11px"></i></button>
                                                    <input type="hidden" name="check1" value="<?php echo $row['StudentId']?>">
                                                </form>
                                                <form action="editstudent.php" method="post">
                                                    <button class="btn-sm btn-info rounded-circle mr-1" title="Edit"><i class="fa fa-edit" style="font-size: 11px"></i></button>
                                                    <input type="hidden" name="check2" value="<?php echo $row['StudentId']?>">
                                                </form>
                                                <a href="deletestudent.php?id=<?= $row['StudentId']?>" class = "btn-del"><button style="background-color: red" name="submit" class="btn-sm btn-danger rounded-circle" title="Delete"><i class="fa fa-trash" style="font-size: 11px"></i></button></a>
                                                </div>
                                            </td>
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
      
      var byrollno = document.getElementById('byrollno').value; 
      var byname = document.getElementById('byname').value.toUpperCase();
      var byparentname = document.getElementById('byparentname').value.toUpperCase();
      var bygender = document.getElementById('bygender').value;
      var byclass = document.getElementById('byclass').value.toUpperCase();
      var bygroup = document.getElementById('bygroup').value.toUpperCase();
      var bymobile = document.getElementById('bymobile').value.toUpperCase();
      var bystatus = document.getElementById('bystatus').value;
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
          if (selectall.checked)
          {
            if ((textvalue1.toUpperCase().indexOf(byrollno)>-1)&&(textvalue2.toUpperCase().indexOf(byname)>-1)&&(textvalue3.toUpperCase().indexOf(byparentname)>-1)&&(textvalue4.indexOf(bygender)>-1)&&(textvalue5.toUpperCase().indexOf(byclass)>-1)&&(textvalue6.toUpperCase().indexOf(bygroup)>-1)&&(textvalue7.toUpperCase().indexOf(bymobile)>-1)&&(textvalue8.indexOf(byisactive)>-1)&&(textvalue9.indexOf(bystatus)>-1))  
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
      var studentids ="";
      var printchecks = document.getElementsByClassName('printchecks');
      j=0
      for (var i = 0 ; i <checkshow.length ; i++) 
      {
        if (checkshow[i].checked) 
        {
          studentids = studentids+checkshow[i].value+'_';
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
      linkofdelete.href  = "deleteallstudent.php?id="+studentids;
    }

    function filter() 
    {
      var byrollno = document.getElementById('byrollno').value; 
      var byname = document.getElementById('byname').value.toUpperCase();
      var byparentname = document.getElementById('byparentname').value.toUpperCase();
      var bygender = document.getElementById('bygender').value;
      var byclass = document.getElementById('byclass').value.toUpperCase();
      var bygroup = document.getElementById('bygroup').value.toUpperCase();
      var bymobile = document.getElementById('bymobile').value.toUpperCase();
      var bystatus = document.getElementById('bystatus').value;
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
        if (td0 && td1 && td2 && td3 && td4 && td5 && td6 && td7 && td8) 
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
          if ((textvalue1.toUpperCase().indexOf(byrollno)>-1)&&(textvalue2.toUpperCase().indexOf(byname)>-1)&&(textvalue3.toUpperCase().indexOf(byparentname)>-1)&&(textvalue4.indexOf(bygender)>-1)&&(textvalue5.toUpperCase().indexOf(byclass)>-1)&&(textvalue6.toUpperCase().indexOf(bygroup)>-1)&&(textvalue7.toUpperCase().indexOf(bymobile)>-1)&&(textvalue8.indexOf(byisactive)>-1)&&(textvalue9.indexOf(bystatus)>-1))  
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
