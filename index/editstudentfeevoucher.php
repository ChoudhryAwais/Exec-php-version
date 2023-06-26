<?php
 require "profileinfo.php";
?>
<?php
if (empty($_POST['check2'])) 
{
  header('Location:viewfeevoucher.php');
}
else
{

  $idoffeevoucher = $_POST['check2'];
  
  $feevoucherdata = "SELECT *
                    FROM feedetails
                    WHERE FeeVoucherId = '$idoffeevoucher'
                          ";
  $query = mysqli_query($conn,$feevoucherdata);
  $feevouherdatalist = mysqli_fetch_assoc($query);
  $StudentId = $feevouherdatalist['StudentRollNo'];
  $voucherno = $feevouherdatalist['VoucherNo'];
  $admissionfeepaid = $feevouherdatalist['Paid_Admission_Fee'];
  $tuitionfeepaid = $feevouherdatalist['Paid_Tuition_Fee'];
  $specialfeepaid = $feevouherdatalist['Paid_Special_Fee'];
  $totalpaid = $feevouherdatalist['Total_Paid'];
  $alreadypaid = $feevouherdatalist['AlreadyPaid'];
  $balance =$feevouherdatalist['Balance'];
  $feeindayscheck = $feevouherdatalist['FeeInDays'];
  $days = $feevouherdatalist['Days'];
  $outstandingamount = $feevouherdatalist['OutstandingAmount'];

  $admissionfee = $feevouherdatalist['Admission_Fee'];
  $admissiondiscount = $feevouherdatalist['Admission_Discount'];
  $admissiontotal = $feevouherdatalist['Admission_Total'];
  $tuitionfee = $feevouherdatalist['Tuition_Fee'];
  $tuitiondiscount = $feevouherdatalist['Tuition_Discount'];
  $tuitiontotal = $feevouherdatalist['Tuition_Total'];
  $specialcharges = $feevouherdatalist['Special_Fee'];
  $specialdiscount = $feevouherdatalist['Special_Discount'];
  $specialtotal = $feevouherdatalist['Special_Total'];

  $actualfees = $feevouherdatalist['Actual_Fee'];
  $totaldiscount = $feevouherdatalist['Total_Discount'];
  $totalfees = $feevouherdatalist['Total_Fee'];
  

  $totaladmissionfeepaid = $feevouherdatalist['Total_Paid_Admission_Fee'];
  $totaltuitionfeepaid = $feevouherdatalist['Total_Paid_Tuition_Fee'];
  $totalspecialfeepaid = $feevouherdatalist['Total_Paid_Special_Fee'];
  

  $discountpackage = $feevouherdatalist['DiscountPackage'];
  $packagediscount =$tuitionfee*($discountpackage/100);
  $studentname=$feevouherdatalist['StudentName'];
  $ispaid = $feevouherdatalist['IsPaid'];

  $vouchercreateddate = $feevouherdatalist['CreateDate'];
  $lastpaiddate = $feevouherdatalist['LastPaidDate'];
  $vouchercreateddate = explode('/', $vouchercreateddate);
  $vouchercreatedmonth = $vouchercreateddate[1];
  $vouchercreatedyear = $vouchercreateddate[2];
  $currentdate = date('d/m/Y');
  $currentdate = explode('/', $currentdate);
  $currentmonth = $currentdate[1];
  $currentyear = $currentdate[2];
    
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

  <title>Edit Fee Voucher</title>

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
  function spacefilter(input) 
  {
    var allow = /[^0-9.]/gi;
    input.value = input.value.replace(allow,"");
  }
</script>
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
                <div class="text-white" style="box-shadow: 1px 1px 2px black;border-radius: 0px 0px 50px 50px;background-color: #0047AB">Edit Fee Voucher</div>
              </div>
              <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 text-right">
                <a href="viewfeevoucher.php"> 
                  <button class="btn btn-sm btn-secondary mt-2 mr-4 text-white" style="border-radius: 40px;"><i class="fa fa-eye pr-1"></i>View Vouchers</button>
                </a>
              </div>
            </div>
            <div class="row mt-5">
              <div class="col-xl-12">
                <div class="container mb-5">
                  
                  <form style="box-shadow: 1px 1px 10px;border: 1px solid black;border-radius: 5px;" action="viewfeevoucher.php" method="post" name="forms" class="form-group needs-validation" novalidate onsubmit="return validation()">


                    


                    <input type="hidden" name="idoffeevoucher" value="<?php echo$idoffeevoucher?>">
                    <input type="hidden" name="StudentId" value="<?php echo$StudentId?>">
                    <input type="hidden" name="daysinmonth" id="daysinmonth" value="<?php echo$daysinmonth?>">
                    <input type="hidden" name="dayscheck" id="dayscheck" value="<?php echo$days?>">
                    <input type="hidden" name="feeindayscheck" id="feeindayscheck" value="<?php echo$feeindayscheck?>">
                    <input type="hidden" name="ispaid" id="ispaid" value="<?php echo$ispaid?>">

                    <input type="hidden" name="totaladmissionfeepaid" id="totaladmissionfeepaid" value="<?php echo($admissiontotal-$totaladmissionfeepaid)?>">
                    <input type="hidden" name="totaltuitionfeepaid" id="totaltuitionfeepaid" value="<?php echo($tuitiontotal-$totaltuitionfeepaid)?>">
                    <input type="hidden" name="totalspecialfeepaid" id="totalspecialfeepaid" value="<?php echo($specialtotal-$totalspecialfeepaid)?>">
                    
                    <input type="hidden" name="totalpaidtuitionfee" id="totalpaidtuitionfee" value="<?php echo($totaltuitionfeepaid)?>">
                    <input type="hidden" name="totalpaidspecialfee" id="totalpaidspecialfee" value="<?php echo($totalspecialfeepaid)?>">

                    <input type="hidden" name="currentmonth" id="currentmonth" value="<?php echo$currentmonth?>">
                    <input type="hidden" name="currentyear" id="currentyear" value="<?php echo$currentyear?>">
                    <input type="hidden" name="vouchercreatedmonth" id="vouchercreatedmonth" value="<?php echo$vouchercreatedmonth?>">
                    <input type="hidden" name="vouchercreatedyear" id="vouchercreatedyear" value="<?php echo$vouchercreatedyear?>">

                    <input type="hidden" name="alreadypaid" id="alreadypaid" value="<?php echo$totalpaid+$alreadypaid?>">


                    <div class="row pl-3 pr-3 pt-3">
                      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 h6 text-center">
                        <div class="container text-white p-1" style="box-shadow: 1px 1px 10px;border-radius: 20px 20px 20px 20px;background-color: #03D913">
                          General Information
                        </div>
                      </div>
                      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 h6 text-center">
                        <div class="container text-white p-1" style="box-shadow: 1px 1px 10px;border-radius: 20px 20px 20px 20px;background-color: #03D913">
                          Academic Information
                        </div>
                      </div>
                      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 h6 text-center">
                        <div class="container text-white p-1" style="box-shadow: 1px 1px 10px;border-radius: 20px 20px 20px 20px;background-color: #03D913">
                          Subject Information
                        </div>
                      </div>
                      <div class="col-xl-3 col-lg-3  col-md-3 col-sm-3  h6 text-center">
                        <div class="container text-white p-1" style="box-shadow: 1px 1px 10px black;border-radius: 20px 20px 20px 20px;background-color: #03D913">
                          Fee Voucher
                        </div>
                      </div>
                    </div>
                    <hr>


                    <div class="container">
                      <div class="row mt-2" style="font-size: 13px">
                        <div class="col-xl-6 mt-2">
                          <span class="font-weight-bold bg-dark p-2 pl-3 text-light" style="border-radius: 10px 0px 0px 10px">Student ID : </span>
                          <span class=" p-1 pl-3 pr-3" style="border:4px inset lightgray"><?php echo$StudentId?></span>
                        </div>
                        <div class="col-xl-6 text-right mt-2">
                          <span class="font-weight-bold bg-dark p-2 pl-3 text-light" style="border-radius: 10px 0px 0px 10px">Name : </span>
                          <span class=" p-1 pl-3 pr-3" style="border:4px inset lightgray"><?php echo$studentname?></span>
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-xl-12 p-1 h6 text-center text-white font-weight-bold text-uppercase" style="background-color: #323E6F;">Fee Detail</div>
                      </div>
                      
                      <div class="row" id='halfs'>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 mt-1">
                          <input type="text" onkeydown="spacefilter(this)" oninput="feecalculator1()" onkeyup="feecalculator()" style="display: none" name="days" id="days" class="form-control form-control-sm" placeholder="Number of Days" required>
                        </div>                             
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 text-right" style="font-size: 13px">
                          <input type="checkbox" onclick="showdays()" oninput="feecalculator()" id="feeindays" name="feeindays" value="0">
                          <label for="feeindays" style="background-color: #152D32;border-radius: 20px" class="p-2">Fee In Days</label>
                        </div>
                      </div>


                      <div class="row mt-2">
                        <div class="col-xl-4">
                          <div class="text-uppercase mt-3 text-white p-1" style="background-color: #003152;text-align: center;font-size: 14px;font-family: Lucida Sans Unicode;box-shadow: 1px 1px 10px black">
                            Admission Fee
                          </div>
                          <div class="container p-2" style="box-shadow: 1px 1px 8px">
                            <div class="row text-center">
                              <div class="col-xl-4">
                                <label for="admfeedumy" class="h6">Fee</label>
                                <input type="text" name="admfeedumy" id="admfeedumy" class="form-control form-control-sm text-center" value="<?php echo $admissionfee?>" disabled style = "cursor: no-drop;">
                              </div>
                              <div class="col-xl-4">
                                <label for="admdiscountdumy" class="h6">Discount</label>
                                <input type="number" name="admdiscountdumy" id="admdiscountdumy" class="form-control form-control-sm text-center" value="<?php echo$admissiondiscount?>" disabled="">
                              </div>
                              <div class="col-xl-4">
                                <label for="admtotaldumy" class="h6">Total</label>
                                <input type="text" name="admtotaldumy" id="admtotaldumy" class="form-control form-control-sm text-center" value="<?php echo $admissiontotal?>"  disabled style = "cursor: no-drop;">
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-xl-4">
                          <div class="text-uppercase mt-3 text-white p-1" style="background-color: #003152;text-align: center;font-size: 14px;font-family: Lucida Sans Unicode;box-shadow: 1px 1px 10px black">
                            Tuition Fee
                          </div>
                          <div class="container p-2" style="box-shadow: 1px 1px 8px">
                            <div class="row text-center">
                              <div class="col-xl-4">
                                <label for="tuitionfeedumy" class="h6">Fee</label>
                                <input type="text" name="tuitionfeedumy" id="tuitionfeedumy" class="form-control form-control-sm text-center" value="<?php echo$tuitionfee?>" disabled style="cursor: no-drop;">
                              </div>
                              <div class="col-xl-4">
                                <label for="tuitiondiscountdumy" class="h6">Discount</label>
                                <input type="number" name="tuitiondiscountdumy" id="tuitiondiscountdumy" class="form-control form-control-sm text-center" value="<?php echo$tuitiondiscount?>" disabled style="cursor: no-drop;">
                              </div>
                              <div class="col-xl-4">
                                <label for="tuitiontotaldumy" class="h6">Total</label>
                                <input type="text" name="tuitiontotaldumy" id="tuitiontotaldumy" class="form-control form-control-sm text-center" value="<?php echo$tuitiontotal?>"  disabled style="cursor: no-drop;">
                              </div>
                            </div>
                            <?php
                              if ($discountpackage>0)
                              {
                                ?>
                                  <div class="row mt-2">
                                    <div class="col-xl-2"></div>
                                    <div class="col-xl-4 text-center">
                                      <label for="packagedumy" class="h6">Package Discount</label>
                                    </div>
                                    <div class="col-xl-4">
                                      <input type="number" name="packagedumy" id="packagedumy" class="form-control form-control-sm text-center" value="<?php echo$packagediscount?>" disabled style="cursor: no-drop;">
                                    </div>
                                    <div class="col-xl-2"></div>
                                  </div>
                                  <div class="ml-1 text-center text-success" id="discountmessage" style="text-shadow: 1px 1px 3px">You have got <?php echo $discountpackage ?>% Discount</div>
                                <?php
                              }
                            ?>
                          </div>
                        </div>
                        <div class="col-xl-4">
                          <div class="text-uppercase mt-3 text-white p-1" style="background-color: #003152;text-align: center;font-size: 14px;font-family: Lucida Sans Unicode;box-shadow: 1px 1px 10px black">
                            Special Fee
                          </div>
                          <div class="container p-2" style="box-shadow: 1px 1px 8px">
                            <div class="row text-center">
                              <div class="col-xl-4">
                                <label for="specialchargesdumy" class="h6">Fee</label>
                                <input type="number" name="specialchargesdumy" id="specialchargesdumy" class="form-control form-control-sm text-center" value="<?php echo$specialcharges?>" disabled style="cursor: no-drop;">
                              </div>
                              <div class="col-xl-4">
                                <label for="specialdiscountdumy" class="h6">Discount</label>
                                <input type="number" name="specialdiscountdumy" id="specialdiscountdumy" class="form-control form-control-sm text-center" value="<?php echo$specialdiscount?>" disabled style="cursor: no-drop;">
                              </div>
                              <div class="col-xl-4">
                                <label for="specialtotal" class="h6">Total</label>
                                <input type="text" name="specialtotal" id="specialtotal" class="form-control form-control-sm text-center" value="<?php echo$specialtotal?>" disabled style="cursor: no-drop;">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>


                      <div class="row text-right mt-4 container">
                        <div class="col-xl-1"></div>
                        <div class="col-xl-10 col-md-12">
                          <div class="row text-left">
                            <div class="col-xl-4 col-md-4 border h6 p-2">
                              Actual Fees : <span id="actualfees" class="font-weight-normal"><?php echo$actualfees ?></span>
                            </div>
                            <div class="col-xl-4 col-md-4 border h6 p-2">
                              Total Discount : <span id="totaldiscount" class="font-weight-normal"><?php echo$totaldiscount ?></span>
                            </div>
                            <div class="col-xl-4 col-md-4 border h6 p-2">
                              Total Fees : <span class="font-weight-normal"><?php echo$totalfees ?></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-xl-1"></div>
                      </div>

                      <div class="row text-right container">
                        <div class="col-xl-2"></div>
                        <div class="col-xl-8 col-md-12">
                          <div class="row text-left">
                            <!-- used in javascript -->
                            <div class="col-xl-6 col-md-4 border h6 p-2">
                              Carry Forward : <span id="outstandingamount" class="font-weight-normal"><?php echo$outstandingamount ?></span>
                            </div>
                            <div class="col-xl-6 col-md-4 border h6 p-2">
                              Total Amount : <span id="totalfees" class="font-weight-normal"><?php echo$totalfees+$outstandingamount ?></span>
                              <input type="hidden" name="totalfeesdumy" id="totalfeesdumy" value="<?php echo$balance?>">
                            </div>
                          </div>
                        </div>
                        <div class="col-xl-2"></div>
                      </div>

                      <div class="row mt-2">
                        <div class="col-xl-4"></div>
                        <div class="col-xl-4  text-center text-success h5" id="messageoftuitionfee" style="text-shadow: 1px 1px 3px"></div>
                        <div class="col-xl-4"></div>
                      </div>
                      <div class="row">
                        <div class="col-xl-4"></div>
                        <div class="col-xl-4  text-center text-success h5" id="messageofspecialfee" style="text-shadow: 1px 1px 3px"></div>
                        <div class="col-xl-4"></div>
                      </div>
                      <div class="row">
                        <div class="col-xl-4"></div>
                        <div class="col-xl-4  text-center text-success h5" id="messageofadmissionfee" style="text-shadow: 1px 1px 3px"></div>
                        <div class="col-xl-4"></div>
                      </div>
                      <div class="row">
                        <div class="col-xl-4"></div>
                        <div class="col-xl-4 border text-center text-success h5" id="" style="text-shadow: 1px 1px 3px"></div>
                        <div class="col-xl-4"></div>
                      </div>
                      <div class="row">
                        <div class="col-xl-4"></div>
                        <div class="col-xl-4 text-center text-dark h5" id="messageofdayfee" style="text-shadow: 1px 1px 3px"></div>
                        <div class="col-xl-4"></div>
                      </div>


                      
                      <div class="row">
                        <div class="col-xl-1"></div>
                        <div class="col-xl-10">
                          <div class="container mt-4 p-4 mb-5" style="box-shadow: 1px 1px 10px;border-radius: 5px;border: 1px solid black">
                            <div class="row">
                              <div class="col-xl-12 h6 text-center text-white p-1" style="box-shadow: 1px 1px 3px black;background-color: #323E6F; border-radius: 20px 20px 0px 0px;font-family: verdana">
                                Fee Voucher
                              </div>
                            </div>
                            <div class="row mt-2 h6">
                              <div class="col-xl-5" style="font-size: 13px">
                                <span class="font-weight-bold bg-dark p-2 pl-3 text-light" style="border-radius: 10px 0px 0px 10px">Voucher No : </span>
                                <span class=" p-1 pl-3 pr-3" style="border:4px inset lightgray"><?php echo$voucherno?></span>
                              </div>
                              <div class="col-xl-3"></div>
                              <div class="col-xl-4" style="display:" id="feealreadypaid">
                                <div class="text-uppercase p-1 bg-light border" style="text-align: center;font-size: 14px;font-family: Lucida Sans Unicode;border-radius: 2px;">
                                  <?php echo$lastpaiddate?>
                                </div>
                                <div class="text-uppercase text-white p-1 bg-success" style="text-align: center;font-size: 14px;font-family: Lucida Sans Unicode;border-radius: 2px;">
                                  Fee Paid
                                </div>
                                <div class="container pl-1 pr-1">
                                  <div class="row text-center">
                                    <div class="col-xl-12">
                                      <input type="text" name="feepaid" id="feepaid" class="form-control form-control-sm text-center" disabled value="<?php echo$alreadypaid+$totalpaid?>" style="cursor: no-drop;">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-xl-12" style="font-family: verdana">
                                <div class="row">
                                  <div class="col-xl-3">
                                    <div class="text-uppercase mt-3 text-white p-1" style="background-color:#003152; ;text-align: center;font-size: 14px;font-family: Lucida Sans Unicode;">
                                      Admission Fee
                                    </div>
                                    <div class="container p-2">
                                      <div class="row text-center">
                                        <div class="col-xl-12">
                                          <input onkeyup="checkforamount()" oninput="feecalculator()" type="text" name="admissionfeepaid" id="admissionfeepaid" class="form-control form-control-sm text-center" value="0">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-xl-3">
                                    <div class="text-uppercase mt-3 text-white p-1" style="background-color:#003152; ;text-align: center;font-size: 14px;font-family: Lucida Sans Unicode;">
                                      Tuition Fee
                                    </div>
                                    <div class="container p-2">
                                      <div class="row text-center">
                                        <div class="col-xl-12">
                                          <input onkeyup="checkforamount()" type="text" oninput="feecalculator()" name="tuitionfeepaid" id="tuitionfeepaid" class="form-control form-control-sm text-center" value="0">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-xl-3">
                                    <div class="text-uppercase mt-3 text-white p-1" style="background-color:#003152; ;text-align: center;font-size: 14px;font-family: Lucida Sans Unicode;">
                                      Special Fee
                                    </div>
                                    <div class="container p-2">
                                      <div class="row text-center">
                                        <div class="col-xl-12">
                                         <input onkeyup="checkforamount()" type="text" oninput="feecalculator()" name="specialfeepaid" id="specialfeepaid" class="form-control form-control-sm text-center" value="0">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-xl-3">
                                    <div class="text-uppercase mt-3 text-white p-1" style="background-color:#003152; ;text-align: center;font-size: 14px;font-family: Lucida Sans Unicode;">
                                      Carry Forward fee
                                    </div>
                                    <div class="container p-2">
                                      <div class="row text-center">
                                        <div class="col-xl-12">
                                         <input onkeyup="checkforamount()" type="text" oninput="feecalculator()" name="outstandingfeepaid" id="outstandingfeepaid" class="form-control form-control-sm text-center" value="0">
                                        </div>
                                      </div>
                                    </div>
                                  </div>    
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-xl-12" style="font-family: verdana">
                                <div class="row">
                                  <div class="col-xl-1">
                                  </div>
                                  <div class="col-xl-3">
                                    <div class="text-uppercase mt-3 text-white p-1 bg-dark" style="background-color:#323E6F; ;text-align: center;font-size: 14px;font-family: Lucida Sans Unicode;box-shadow: 1px 1px 5px black">
                                      Total Paid
                                    </div>
                                    <div class="container p-2">
                                      <div class="row text-center">
                                        <div class="col-xl-12">
                                          <input type="text" name="totalpaidshow" id="totalpaidshow" class="form-control form-control-sm text-center" value="0" disabled style="cursor: no-drop;">
                                          <input type="hidden" name="totalpaid" id="totalpaid" class="form-control form-control-sm text-center" value="0">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-xl-3">
                                    <div class="text-uppercase mt-3 text-white p-1 bg-danger" style="text-align: center;font-size: 14px;font-family: Lucida Sans Unicode;box-shadow: 1px 1px 5px black">
                                      Fee Payable
                                    </div>
                                    <div class="container p-2">
                                      <div class="row text-center">
                                        <div class="col-xl-12">
                                          <input type="text" name="balanceshow" id="balanceshow" class="form-control form-control-sm text-center" value="<?php echo$totalfees?>" disabled style="cursor: no-drop;">
                                          <input type="hidden" name="balance" id="balance" class="form-control form-control-sm text-center" value="<?php echo$totalfees?>">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-xl-4">
                                    <div class="text-uppercase mt-3 text-white p-1" style="background-color:#5E8AAF; ;text-align: center;font-size: 14px;font-family: Lucida Sans Unicode;">
                                      Due Date
                                    </div>
                                    <div class="container p-2">
                                      <div class="row text-center">
                                        <div class="col-xl-12">
                                          <input type="date" name="duedate" id="duedate" class="form-control form-control-sm text-center" required>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-xl-1">
                                  </div>
                                </div>
                              </div>
                            </div>
                            

                          </div>
                          <div class="col-xl-1"></div>
                        </div>
                      </div>


                      
                      <div class="row mt-5 p-2" style="background-color: lightgray">
                        <div class="col-xl-12 col-md-6 text-center">
                          <button type="Reset" id="resetbutton" name="reset" class="btn btn-sm btn-danger"><i class="fas fa-reply-all pr-2"></i>Reset</button>
                          <button class="btn btn-sm btn-success" id="updatebutton" type="submit" name="submit">Update<i class="fas fa-arrow-up pl-2"></i></button>
                          <input type="hidden" name="editfeevouchercheck4" value="true">
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

  <script>

    // check for is this page is already opened before and update before.
    //(may contain 0 ,1 ,2)
    var feeindayscheck = document.getElementById('feeindayscheck').value; //from database
    //check how many days of fee voucher 
    var dayscheck = document.getElementById('dayscheck').value; //from database
    //check for already paid fee
    var alreadypaid = parseInt(document.getElementById('alreadypaid').value); //from database

    if (feeindayscheck==1) //means already update and fee voucher is created for specific days.
    {
      var feeindays = document.getElementById('feeindays');// Checkbox button
      var days = document.getElementById('days');//input field for specific days

      //when specific day in selected
      feeindays.checked="true"; 
      feeindays.disabled=true; 
      days.style.display= "none";
      days.value=dayscheck;
      //ends

      //message show for specific fee according to selected days
      var messageofdayfee = document.getElementById('messageofdayfee');
      var messageoftuitionfee = document.getElementById('messageoftuitionfee');
      var messageofadmissionfee = document.getElementById('messageofadmissionfee');
      //ends

      //static total admission value
      var admtotaldumy = parseInt(document.getElementById('admtotaldumy').value);//from database
      //totalfees contain admission tuition special carryforward amount.
      var totalfees = parseInt(document.getElementById('totalfees').innerHTML);//from database (totalfee + outstanding)
      // hidden totalfees contain balance and carryforward amount.
      var totalfeesdumy = document.getElementById('totalfeesdumy');//from database (balance + outstanding)
      //day in current month
      var daysinmonth = document.getElementById('daysinmonth').value;

      var tuitionfeeperday = (((totalfees-admtotaldumy)/daysinmonth)*days.value); //dumy data:-  (((3600-0)/31)*31)
      var admissionfee = admtotaldumy; 
      totalfeesdumy.value = ((((totalfees-admtotaldumy)/daysinmonth)*days.value)+admtotaldumy)-alreadypaid;  //total fees hidden
      messageoftuitionfee.innerHTML="Tuition Fee of "+days.value+" days : "+parseInt(tuitionfeeperday);  
      messageofadmissionfee.innerHTML="Admission Fee : " +admissionfee;  
      messageofdayfee.innerHTML="Total Fee : "+(parseInt(totalfeesdumy.value)+alreadypaid);
      feecalculator();
    }
    else if (feeindayscheck==0) //means already update and fee voucher is created for Whole Month.
    {
      var feeindays = document.getElementById('feeindays');
      var days = document.getElementById('days'); //from database
      feeindays.disabled="true";
      days.value=dayscheck;
      feecalculator();
    }
    else //not updated before
    {
      var days = document.getElementById('days'); //from database
      days.value=dayscheck;
      feecalculator();
    }
    function checkforamount() 
    {
      var admissionfeepaid = document.getElementById('admissionfeepaid'); // on page admission fee
      var tuitionfeepaid = document.getElementById('tuitionfeepaid'); // on page tuition fee
      var specialfeepaid = document.getElementById('specialfeepaid'); // on page special fee
      var outstandingfeepaid = document.getElementById('outstandingfeepaid'); // on page outstanding fee
      
      var totaladmissionfeepaid = parseInt(document.getElementById('totaladmissionfeepaid').value); // paid admission fee (tuitionfee-totaladmissionfeepaid)
      var outstandingamount = parseInt(document.getElementById('outstandingamount').innerHTML); // actual outstanding fee (written in span)

      var totaltuitionfeepaid = parseInt(document.getElementById('totaltuitionfeepaid').value); //  paid tuition fee (tuitionfee-totaltuitionfeepaid)
      var totalspecialfeepaid = parseInt(document.getElementById('totalspecialfeepaid').value); // paid special fee (tuitionfee-totalspecialfeepaid)
      var feeindays = document.getElementById('feeindays'); // checkbox
      var days = document.getElementById('days').value; // days in input field


      var totalpaidtuitionfee = parseInt(document.getElementById('totalpaidtuitionfee').value); //already paid tuition fee
      var totalpaidspecialfee = parseInt(document.getElementById('totalpaidspecialfee').value); //already paid special fee
      var tuitiontotaldumy = parseInt(document.getElementById('tuitiontotaldumy').value); // actual tuition fee (written in html tag when feeindays checkbox selected)
      var specialtotal = parseInt(document.getElementById('specialtotal').value); // actual special fee (written in html tag when feeindays checkbox selected)
    
      var daysinmonth = document.getElementById('daysinmonth').value;  //current month days

      var updatebutton = document.getElementById('updatebutton'); //update button
      if (feeindays.checked) //if fee voucher is created for specific days.
      {
        if (days) // specify a number of days
        { 
          admissionfeepaid.disabled=false;
          tuitionfeepaid.disabled=false;
          specialfeepaid.disabled=false;
          outstandingfeepaid.disabled=false;
          updatebutton.disabled = false;
        
          allowtuitionfee = parseInt((tuitiontotaldumy/daysinmonth)*days);  //((2000/31)*5) // tuition fee according to days
          allowtuitionfee = allowtuitionfee-totalpaidtuitionfee; // (322-0) remaining tuition fee
          allowspecialfee = parseInt((specialtotal/daysinmonth)*days); //special fee according to days
          allowspecialfee = allowspecialfee-totalpaidspecialfee; // remaining special fee
          if (admissionfeepaid.value>totaladmissionfeepaid||tuitionfeepaid.value>allowtuitionfee||specialfeepaid.value>allowspecialfee||outstandingfeepaid.value>outstandingamount) 
          {

            if (admissionfeepaid.value>totaladmissionfeepaid)
            {
              admissionfeepaid.value = admissionfeepaid.value.replace(admissionfeepaid.value,"0");
              feecalculator();
            }
            else if (tuitionfeepaid.value>allowtuitionfee) 
            {
              tuitionfeepaid.value = tuitionfeepaid.value.replace(tuitionfeepaid.value,"0");
              feecalculator();
            }
            else if (specialfeepaid.value>allowspecialfee) 
            {
              specialfeepaid.value = specialfeepaid.value.replace(specialfeepaid.value,"0");
              feecalculator();
            }
            else if (outstandingfeepaid.value>outstandingamount) 
            {
              outstandingfeepaid.value = outstandingfeepaid.value.replace(outstandingfeepaid.value,"0");
              feecalculator();
            }
          }
        }
        else // means checkbox is checked but days are not entered
        {
          admissionfeepaid.disabled=true;
          tuitionfeepaid.disabled=true;
          specialfeepaid.disabled=true;
          outstandingfeepaid.disabled=true;
          updatebutton.disabled = true;
        }
        
        
      }
      else
      {
        admissionfeepaid.disabled=false;
        tuitionfeepaid.disabled=false;
        specialfeepaid.disabled=false;
        outstandingfeepaid.disabled=false;
        updatebutton.disabled = false;
        if (admissionfeepaid.value>totaladmissionfeepaid||tuitionfeepaid.value>totaltuitionfeepaid||specialfeepaid.value>totalspecialfeepaid||outstandingfeepaid.value>outstandingamount) 
        {
          if (admissionfeepaid.value>totaladmissionfeepaid)
          {
            admissionfeepaid.value = admissionfeepaid.value.replace(admissionfeepaid.value,"0");
            feecalculator();
          }
          else if (tuitionfeepaid.value>totaltuitionfeepaid) 
          {
            tuitionfeepaid.value = tuitionfeepaid.value.replace(tuitionfeepaid.value,"0");
            feecalculator();
          }
          else if (specialfeepaid.value>totalspecialfeepaid) 
          {
            specialfeepaid.value = specialfeepaid.value.replace(specialfeepaid.value,"0");
            feecalculator();
          }
          else if (outstandingfeepaid.value>outstandingamount) 
          {
            outstandingfeepaid.value = outstandingfeepaid.value.replace(outstandingfeepaid.value,"0");
            feecalculator();
          }
        }
      }

    }

    function feecalculator() 
    {
      var admissionfeepaid = parseInt(document.getElementById('admissionfeepaid').value); //on page admission fee input field.
      var tuitionfeepaid = parseInt(document.getElementById('tuitionfeepaid').value); //on page tuition fee input field.
      var specialfeepaid = parseInt(document.getElementById('specialfeepaid').value); //on page special fee input field.
      var outstandingfeepaid = parseInt(document.getElementById('outstandingfeepaid').value); //on page outstanding fee input field.

      var totalpaidshow = document.getElementById('totalpaidshow'); // on page just show total paid (only for show)
      var totalpaid = document.getElementById('totalpaid'); // on page hidden total paid (hidden usefull for database)
      var balanceshow = document.getElementById('balanceshow'); // on page just show balance (only for show)
      var balance = document.getElementById('balance');// on page hidden balance (hidden usefull for database)

      // value of month and year for comparesion..(to disable or able the voucher)
      var vouchercreatedmonth =document.getElementById('vouchercreatedmonth').value; //from database
      var vouchercreatedyear = document.getElementById('vouchercreatedyear').value; //from database
      var currentmonth = document.getElementById('currentmonth').value; //current month
      var currentyear = document.getElementById('currentyear').value; //current month
      // ends


      var ispaid = document.getElementById('ispaid').value; // from database (Unpaid,Paid or C/F)
      var feepaid = document.getElementById('feepaid').value; // paid + totalpaid (0 , or >0)
      if (feepaid>0)  //for showing or not showing the fees
      {
        var feealreadypaid = document.getElementById('feealreadypaid');
        feealreadypaid.style.display ="";
      }
      else
      {
        var feealreadypaid = document.getElementById('feealreadypaid');
        feealreadypaid.style.display ="none";
      }
      // hidden totalfees contain balance and carryforward amount.
      var totalfee = parseInt(document.getElementById('totalfeesdumy').value); // balance + outstandingamount
      totalpaidshow.value = admissionfeepaid + tuitionfeepaid + specialfeepaid + outstandingfeepaid; // total paid input field (only for show)
      totalpaid.value = admissionfeepaid + tuitionfeepaid + specialfeepaid +outstandingfeepaid; // total paid input field (hidden usefull for database)

      balance.value = totalfee- parseInt(totalpaidshow.value);  // balance input field (hidden usefull for database)
      balanceshow.value = totalfee- parseInt(totalpaidshow.value); // balance input field (only for show)

      //old voucher are not editable
      if ((ispaid=="C/F")||(ispaid=="Paid")||(currentmonth!=vouchercreatedmonth)||(currentyear!=vouchercreatedyear)) 
      {
        var admissionfeepaid = document.getElementById('admissionfeepaid');
        var tuitionfeepaid = document.getElementById('tuitionfeepaid');
        var specialfeepaid = document.getElementById('specialfeepaid');
        var updatebutton = document.getElementById('updatebutton');
        var resetbutton = document.getElementById('resetbutton');
        var feeindays = document.getElementById('feeindays');

        admissionfeepaid.disabled=true;
        admissionfeepaid.style.cursor="no-drop";
        tuitionfeepaid.disabled=true;
        tuitionfeepaid.style.cursor="no-drop";
        specialfeepaid.disabled=true;
        specialfeepaid.style.cursor="no-drop";
        updatebutton.style.display="none";
        resetbutton.style.display="none";
        feeindays.disabled= true;
      }
      else
      {

      }
    }
    function showdays()
    {
      var totalfees = parseInt(document.getElementById('totalfees').innerHTML);
      var totalfeesdumy = document.getElementById('totalfeesdumy');
      var feeindays = document.getElementById('feeindays');
      var feeindayscheck = document.getElementById('feeindayscheck');
      var days = document.getElementById('days');
      var daysinmonth = document.getElementById('daysinmonth').value;
      var messageofdayfee = document.getElementById('messageofdayfee');
      var messageoftuitionfee = document.getElementById('messageoftuitionfee');
      var messageofspecialfee = document.getElementById('messageofspecialfee');
      var messageofadmissionfee = document.getElementById('messageofadmissionfee');
      if (feeindays.checked) 
      {
        days.style.display= "";
        feeindayscheck.value = 1;
        days.value = null;
      }
      else
      {
        days.style.display="none";
        totalfeesdumy.value = totalfees;
        days.value = daysinmonth;
        feeindayscheck.value = 0;
        messageofdayfee.innerHTML="";
        messageoftuitionfee.innerHTML="";
        messageofspecialfee.innerHTML="";
        messageofadmissionfee.innerHTML="";
      }
      checkforamount();
      
    }
    function feecalculator1()
    {
      var messageofdayfee = document.getElementById('messageofdayfee');
      var messageoftuitionfee = document.getElementById('messageoftuitionfee');
      var messageofspecialfee = document.getElementById('messageofspecialfee');
      var messageofadmissionfee = document.getElementById('messageofadmissionfee');


      var admtotaldumy = parseInt(document.getElementById('admtotaldumy').value)
      var totalfees = parseInt(document.getElementById('totalfees').innerHTML);
      var days = document.getElementById('days').value;

      var tuitiontotaldumy = parseInt(document.getElementById('tuitiontotaldumy').value);
      var specialtotal = parseInt(document.getElementById('specialtotal').value);
      
      var totalfeesdumy = document.getElementById('totalfeesdumy');
      var feeindays = document.getElementById('feeindays');
      var daysinmonth = document.getElementById('daysinmonth').value;

      perdaytuitionfee = parseInt((tuitiontotaldumy/daysinmonth)*days);
      perdayspecialfee = parseInt((specialtotal/daysinmonth)*days);
      // var tuitionfeeperday = (((totalfees-admtotaldumy)/daysinmonth)*days);
      var admissionfee = admtotaldumy;
      totalfeesdumy.value = perdaytuitionfee+perdayspecialfee+admtotaldumy;  
      messageoftuitionfee.innerHTML="Tuition Fee of "+days+" days : "+perdaytuitionfee;
      messageofspecialfee.innerHTML="Special Fee of "+days+" days : "+perdayspecialfee;  
      messageofadmissionfee.innerHTML="Admission Fee : " +admissionfee;  
      messageofdayfee.innerHTML="Total Fee : "+parseInt(totalfeesdumy.value);  
      checkforamount();
    }
    
  </script>


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
