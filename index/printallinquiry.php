<?php
 require "profileinfo.php";
?>
<?php
if (empty($_POST['printallinquirycheck1'])) 
{
  header('Location:viewinquiry.php');
}
else
{
  $printall=$_POST['printallcheckbox'];
  // require 'connectdatabase.php';
  // $Inquirydata = "SELECT *
  //                 FROM inquirylist
  //                 WHERE CampusId = '$CampusId' AND InquiryId = '$inquiryid'
  //                 ";
  // $query = mysqli_query($conn,$Inquirydata);
  // $inquirylistdata = mysqli_fetch_array($query);
  // $sname = $inquirylistdata['First_Name'];
  // $sfname = $inquirylistdata['Last_Name'];
  // $gender =$inquirylistdata['Gender'];
  // $dob =$inquirylistdata['DOB'];
  // $sreligion =$inquirylistdata['Religion'];
  // $sdomicile =$inquirylistdata['Domicile'];
  // $scnic =$inquirylistdata['CNIC'];
  // $snationality =$inquirylistdata['Nationality'];
  // $saddress =$inquirylistdata['Address'];
  // $sphone =$inquirylistdata['Phone'];
  // $scell =$inquirylistdata['Cell'];
  // $semail =$inquirylistdata['Email'];
  // $gname =$inquirylistdata['Parent_Name'];
  // $gcnic =$inquirylistdata['Parent_CNIC'];
  // $gphone =$inquirylistdata['Parent_Contact'];
  // $gcell =$inquirylistdata['Parent_Cell'];
  // $gemail =$inquirylistdata['Parent_Email'];

  // $group = $inquirylistdata['Groups'];
  // $class = $inquirylistdata['Class'];
  // $batch = $inquirylistdata['Batch'];
  // $status = $inquirylistdata['Status'];
  // $board = $inquirylistdata['Board_Uni_School'];
  // $sub = $inquirylistdata['Subjects'];
  // $countersub = $inquirylistdata['No_of_Subjects'];
  // $admissionfee = $inquirylistdata['Admission_Total'];
  // $tuitionfee = $inquirylistdata['Tuition_Total'];
  // $specialfee = $inquirylistdata['Special_Total'];
  // $actualfee = $inquirylistdata['Actual_Fee'];
  // $discount = $inquirylistdata['Total_discount'];
  // $total = $inquirylistdata['Total_Fee'];
  // $submitby = $inquirylistdata['Submit_By']; 
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Student Inquiry</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" type="text/css" href="css/responsive.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" type="text/css" href="css/print.css?v=<?php echo time(); ?>" media="print">
  <link rel="shortcut icon" type="image/x-icon" href="pics/t1.png">
</head>
<body>    
  <div class="text-center">
    <button class="btn btn-lg btn-info pl-5 pr-5" id="print-btn" onclick="window.print();">Print</button>
  </div>
   
  <?php
    foreach ($printall as $idofinquiry) 
    { 
      $Inquirylistdata = "SELECT *
                        FROM inquirylist
                        WHERE InquiryId = '$idofinquiry'";
      $query = mysqli_query($conn,$Inquirylistdata);
      $inquirylistdata = mysqli_fetch_array($query);
      $sname = $inquirylistdata['First_Name'];
      $sfname = $inquirylistdata['Last_Name'];
      $gender =$inquirylistdata['Gender'];
      $dob =$inquirylistdata['DOB'];
      $sreligion =$inquirylistdata['Religion'];
      $sdomicile =$inquirylistdata['Domicile'];
      $scnic =$inquirylistdata['CNIC'];
      $snationality =$inquirylistdata['Nationality'];
      $saddress =$inquirylistdata['Address'];
      $sphone =$inquirylistdata['Phone'];
      $scell =$inquirylistdata['Cell'];
      $semail =$inquirylistdata['Email'];
      $gname =$inquirylistdata['Parent_Name'];
      $gcnic =$inquirylistdata['Parent_CNIC'];
      $gphone =$inquirylistdata['Parent_Contact'];
      $gcell =$inquirylistdata['Parent_Cell'];
      $gemail =$inquirylistdata['Parent_Email'];

      $group = $inquirylistdata['Groups'];
      $class = $inquirylistdata['Class'];
      $batch = $inquirylistdata['Batch'];
      $status = $inquirylistdata['Status'];
      $board = $inquirylistdata['Board_Uni_School'];
      $sub = $inquirylistdata['Subjects'];
      $countersub = $inquirylistdata['No_of_Subjects'];
      $actualfee = $inquirylistdata['Actual_Fee'];
      $discount = $inquirylistdata['Total_discount'];
      $total = $inquirylistdata['Total_Fee'];
      $admissionfee = $inquirylistdata['Admission_Total'];
      $tuitionfee = $inquirylistdata['Tuition_Total'];
      $specialfee = $inquirylistdata['Special_Total'];
      $submitby = $inquirylistdata['Submit_By']; 

      ?>
        <div style="height: 12px"></div>
        <div class="row mt-1 wholetop" style="background-color: #433F40">
          <div class="col-lg-1 topblank1"></div>
        
          <div class="col-lg-3 font-weight-bold text-white mt-4 printadform" style="font-size: 30px;">
            <p>STUDENT INQUIRY</p>
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
              <div class="text-uppercase text-white font-weight-bold" style="font-size: 16px;">
                <div class="row mt-1">
                  <div class="col-lg-12"  style="background-color:#433F40;text-align: center;font-size: 18px">
                    Academic Information
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col-xl-3 section1">
                    <div style="background-color:#586261;text-align: center;">
                      class
                    </div>
                    <p class="text-center border" style="color:black;font-size:15px">
                      <?php echo $class ?>
                    </p>
                  </div>
                  <div class="col-xl-3 section11">
                    <div style="background-color:#586261;text-align: center;">
                      group
                    </div>
                    <p class="text-center border" style="color:black;font-size:15px;">
                      <?php echo $group ?>
                    </p>
                  </div>
                  <div class="col-xl-2 section111">
                    <div style="background-color:#586261;text-align: center;">
                      Batch
                    </div>
                    <p class="text-center border" style="color:black;font-size:15px;">
                      <?php echo $batch?>
                    </p>
                  </div>
                  <div class="col-xl-4 section1111">
                    <div style="background-color:#586261;text-align: center;">
                      University/board/School
                    </div>
                    <p class="text-center border" style="color:black;font-size:15px;">
                      <?php echo $board ?>
                    </p>
                  </div>
                </div>
                <div class="row mt-1">
                  <div class="col-xl-3 section2">
                    <div style="background-color:#586261;text-align: center;">
                      Status
                    </div>
                    <p class="text-center border" style="color:black;font-size:15px;">
                      <?php echo $status ?>
                    </p>
                  </div>
                  <div class="col-xl-7 section22">
                    <div style="background-color:#586261;text-align: center;">
                      Subjects
                    </div>
                    <p class="text-center border" style="color:black;font-size:15px">
                      <?php echo $sub ?>
                    </p>  
                  </div>
                  <div class="col-xl-2 section222">
                    <div style="background-color:#586261;text-align: center;">
                      No. of Subjects
                    </div>
                    <p class="text-center border" style="color:black;font-size:15px">
                      <?php echo $countersub ?>
                    </p>  
                  </div>
                </div>
                <div class="mt-2 row border border-dark"></div>
                <div class="row mt-1">
                  <div class="col-lg-12"  style="background-color:#433F40;text-align: center;font-size: 18px">Student's information</div>
                </div>
                <div class="row mt-3"  style="font-size: 12px;">
                  <div class="col-lg-6 snamec">
                    <table class="table">
                      <tr class="table-bordered">
                        <td style="background-color:#586261;color:white;width: 30%"><span class="sname" style="font-size: 15px;">First Name </span></td>
                        <td style="font-size:15px;" class="pl-5 border" style="color: black"><?php echo $sname; ?></td>
                      </tr>
                    </table>
                  </div>
                  <div class="col-lg-6 sfnamec">
                    <table class="table">
                      <tr class="table-bordered">
                        <td style="background-color:#586261;color:white;width: 28%"><span  style="font-size:13px"; class="fname">Last Name</span></td>
                        <td class="pl-5" style="color: black;font-size:15px;"><?php echo $sfname; ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="row mt-1" style="font-size: 12px;">
                  <div class="col-lg-4 genderc">
                    <table class="table">
                      <tr class="table-bordered">
                        <td style="background-color:#586261;color:white;width: 29%;font-size: 15px;"><span class="gender">Gender</span></td>
                        <td  class="pl-5" style="color: black;font-size:15px;"><?php echo $gender; ?></td>
                      </tr>
                    </table>
                  </div>
                  <div class="col-lg-4 religionc">
                    <table class="table">
                      <tr class="table-bordered">
                        <td style="background-color:#586261;color:white;width: 30%;font-size: 15px;"><span class="religion">Religion</span></td>
                        <td  class="pl-3" style="color: black;font-size:15px;;"><?php echo $sreligion; ?></td>
                      </tr>
                    </table>
                  </div>
                  <div class="col-lg-4 domicilec">
                    <table class="table">
                      <tr class="table-bordered">
                        <td style="background-color:#586261;color:white;width: 25%;font-size: 15px;"><span class="domicile">Domicile</span></td>
                        <td  class="pl-5" style="color: black;font-size:15px;"><?php echo $sdomicile; ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="row mt-1" style="font-size: 12px;">
                  <div class="col-lg-5 dobc">
                    <table class="table">
                      <tr class="table-bordered">
                        <td style="background-color:#586261;color:white;width: 45%;font-size: 15px;"><span class="dob">Date of birth</span></td>
                        <td class="pl-5" style="color: black;font-size:15px;"><?php echo $dob; ?></td>
                      </tr>
                    </table>
                  </div>
                  <div class="col-lg-7 cnicc">
                    <table class="table">
                      <tr class="table-bordered">
                        <td style="background-color:#586261;color:white;width: 12%;font-size: 15px;"><span class="cnic">CNIC</span></td>
                        <td  class="pl-5" style="color: black;font-size:15px;"><?php echo $scnic; ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="row mt-1" style="font-size: 12px;">
                  <div class="col-lg-8 addressc">
                    <table class="table">
                      <tr class="table-bordered">
                        <td style="background-color:#586261;color:white;width: 8%;font-size: 15px;"><span class="address">Address</span></td>
                        <td class="pl-5" style="color: black;font-size:15px;"><?php echo $saddress; ?></td>
                      </tr>
                    </table>
                  </div>
                  <div class="col-lg-4 nationalityc">
                    <table class="table">
                      <tr class="table-bordered">
                        <td style="background-color:#586261;color:white;width: 25%;font-size: 15px;"><span class="nationality">Nationality</span></td>
                        <td  class="pl-5" style="color: black;font-size:15px;"><?php echo $snationality; ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="row mt-1" style="font-size: 12px;">
                  <div class="col-lg-4 phonec">
                    <table class="table">
                      <tr class="table-bordered">
                        <td style="background-color:#586261;color:white;width: 28%;font-size: 15px;"><span class="phone">Phone#</span></td>
                        <td  class="pl-4" style="color: black;font-size:15px;"><?php echo $sphone; ?></td>
                      </tr>
                    </table>
                  </div>
                  <div class="col-lg-3 cellc">
                    <table class="table">
                      <tr class="table-bordered">
                        <td style="background-color:#586261;color:white;width: 25%;font-size: 15px;"><span class="cell">Cell</span></td>
                        <td  class="pl-4" style="color: black;font-size:15px;"><?php echo $scell; ?></td>
                      </tr>
                    </table>
                  </div>
                  <div class="col-lg-5 emailc">
                    <table class="table">
                      <tr class="table-bordered">
                        <td style="background-color:#586261;color:white;width: 15%;font-size: 15px;"><span class="email">Email</span></td>
                        <td  class="pl-3 text-lowercase" style="color: black;font-size:15px;"><?php echo $semail; ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="mt-2 row border border-dark"></div>
                <div class="row mt-1">
                  <div class="col-lg-12"  style="background-color:#433F40;font-size: 18px;text-align: center;">Parents information</div>
                </div>
                
                <div class="row mt-3"  style="font-size: 15px;">
                  <div class="col-lg-5 gnamec">
                    <table class="table">
                      <tr class="table-bordered">
                        <td style="background-color:#586261;color:white;width: 8%"><span class="gname">Name</span></td>
                        <td class="pl-5 border" style="color: black"><?php echo $gname; ?></td>
                      </tr>
                    </table>
                  </div>
                  <div class="col-lg-7 gemailc">
                    <table class="table">
                      <tr class="table-bordered">
                        <td style="background-color:#586261;color:white;width: 8%"><span class="gemail">Email</span></td>
                        <td  class="pl-5 text-lowercase" style="color: black"><?php echo $gemail; ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="row mt-1" style="font-size: 15px;">
                  <div class="col-lg-4 gcnicc">
                    <table class="table">
                      <tr class="table-bordered">
                        <td style="background-color:#586261;color:white;width: 12%"><span class="gcnic">CNIC</span></td>
                        <td  class="pl-5" style="color: black"><?php echo $gcnic; ?></td>
                      </tr>
                    </table>
                  </div>
                  <div class="col-lg-4 gphonec">
                    <table class="table">
                      <tr class="table-bordered">
                        <td style="background-color:#586261;color:white;width: 22%"><span class="gphone">Contact#</span></td>
                        <td  class="pl-3" style="color: black"><?php echo $gphone; ?></td>
                      </tr>
                    </table>
                  </div>
                  <div class="col-lg-4 gcellc">
                    <table class="table">
                      <tr class="table-bordered">
                        <td style="background-color:#586261;color:white;width: 22%"><span class="gcell">Cell</span></td>
                        <td  class="pl-3" style="color: black"><?php echo $gcell; ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="mt-2 row border border-dark"></div>
                <div class="row mt-1">
                  <div class="col-xl-6 feedetailc border border-top-0 border-bottom-0" style="background-color:#433F40;font-size: 18px;text-align: center;">Fee details</div>
                  <div class="col-xl-6 feedetailc border border-top-0 border-bottom-0" style="background-color:#433F40;font-size: 18px;text-align: center;">Payable Fee</div>
                </div>
                <div class="row mt-4">
                  <div class="col-lg-2 actualc">
                    <div style="background-color:#586261;text-align: center;">
                      Actual Fee
                    </div>
                    <p class="text-center border" style="color:black;font-size:15px;">
                      <?php echo $actualfee ?>
                    </p>
                  </div>
                  <div class="col-lg-2 discountc">
                    <div style="background-color:#586261;text-align: center;">
                      Discount
                    </div>
                    <p class="text-center border" style="color:black;font-size:15px">
                      <?php echo $discount ?>
                    </p>
                  </div>
                  <div class="col-lg-2 totalc">
                    <div style="background-color:#586261;text-align: center;">
                      Total Fee
                    </div>
                    <p class="text-center border" style="color:black;font-size:15px;">
                      <?php echo $total ?>
                    </p>
                  </div>
                  <div class="col-lg-2 admissionc">
                    <div style="background-color:#586261;text-align: center;">
                      Admission Fee
                    </div>
                    <p class="text-center border" style="color:black;font-size:15px;">
                      <?php echo $admissionfee ?>
                    </p>
                  </div>
                  <div class="col-lg-2 tuitionc">
                    <div style="background-color:#586261;text-align: center;">
                      Tuition Fee
                    </div>
                    <p class="text-center border" style="color:black;font-size:15px">
                      <?php echo $tuitionfee ?>
                    </p>
                  </div>
                  <div class="col-lg-2 specialc">
                    <div style="background-color:#586261;text-align: center;">
                      Special Fee
                    </div>
                    <p class="text-center border" style="color:black;font-size:15px;">
                      <?php echo $specialfee ?>
                    </p>
                  </div>
                </div>
                <div class="mt-2 row border border-dark"></div>
                <div class="row mt-1">
                  <div class="col-lg-12"  style="background-color:#433F40;font-size: 18px;text-align: center;">
                    For Office Use
                  </div>
                </div>
                <div class="row mt-4"  style="font-size: 15px;">
                  <div class="col-lg-4 rollc">
                    <table class="table">
                      <tr class="table-bordered">
                        <td style="background-color:#586261;color:white;width: 40%"><span class="roll">Roll No </span></td>
                        <td class="pl-5 border" style="color: black"></td>
                      </tr>
                    </table>
                  </div>
                  <div class="col-lg-8 commentc">
                    <div style="background-color:#586261;text-align: center;">
                      Comment
                    </div>
                    <p class="text-center border" style="color:black;font-size:15px;height: 70px;">
                      
                    </p>
                  </div>
                </div>
                <div class="row mt-1"  style="font-size: 15px;">
                  <div class="col-lg-6 submitbyc">
                    <table class="table">
                      <tr class="table-bordered">
                        <td style="background-color:#586261;color:white;width: 37%;"><span class="submitby">Submitted By </span></td>
                        <td class="pl-5 border" style="color: black"><?php echo $submitby; ?></td>
                      </tr>
                    </table>
                  </div>
                  <div class="col-lg-6 approvebyc">
                    <table class="table">
                      <tr class="table-bordered">
                        <td style="background-color:#586261;color:white;width: 36%"><span class="approveby">Approved By</span></td>
                        <td class="pl-5 border" style="color: black"></td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="col-lg-1"></div>
        </div>
        <footer style="background-color:#433F40;" class="m-1">
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
        <p style="page-break-before:  always;"></p>
      <?php
    }
  ?>

  <div class="text-center mt-3 mb-3">
    <button class="btn btn-lg btn-info pl-5 pr-5" id="print-btn" onclick="window.print();">Print</button>
  </div>

</body>
</html>