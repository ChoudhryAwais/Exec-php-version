<?php
 require "profileinfo.php";
?>
<?php
if (empty($_POST['studentcheck3'])) 
{
  header('Location:addstudent.php');
}
else
{
  $classes = $_POST['classes'];
  $IsActive = $_POST['IsActive'];
  $sname   = htmlspecialchars($_POST['sname']);
  $sfname   = htmlspecialchars($_POST['sfname']); 
  $gender  = $_POST['gender'];
  $dob  = $_POST['dob'];
  $sdomicile = htmlspecialchars($_POST['sdomicile']);
  $sreligion = htmlspecialchars($_POST['sreligion']);
  $scnic = htmlspecialchars($_POST['scnic']);
  $snationality = htmlspecialchars($_POST['snationality']);
  $sphone = htmlspecialchars($_POST['sphone']);
  $scell = htmlspecialchars($_POST['scell']);
  $semail = htmlspecialchars($_POST['semail']);
  $saddress = htmlspecialchars($_POST['saddress']);
  $hearfrom = $_POST['hearfrom'];

  // guardian data
  $gname = htmlspecialchars($_POST['gname']);
  $gcnic = htmlspecialchars($_POST['gcnic']);
  $gemail = htmlspecialchars($_POST['gemail']);
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
  $packagediscount =$tuitionfee*($discountpackage/100);
  $submitby = htmlspecialchars(ucwords($_POST['submitby']));
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

  <title>New student</title>

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
                <div class="text-white" style="box-shadow: 1px 1px 2px black;border-radius: 0px 0px 50px 50px;background-color: #0047AB">New Student</div>
              </div>
              <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 text-right">
                <a href="viewstudent.php"> 
                  <button class="btn btn-sm btn-secondary mt-2 mr-4 text-white" style="border-radius: 40px;"><i class="fa fa-eye pr-1"></i>View Student List</button>
                </a>
              </div>
            </div>
            <div class="row mt-5">
              <div class="col-xl-12">
                <div class="container mb-5">
                  
                  <form style="box-shadow: 1px 1px 10px;border: 1px solid black;border-radius: 5px;" action="viewstudent.php" method="post" name="forms" class="form-group needs-validation" novalidate onsubmit="return validation()">


                    <!-- Main page form data starts-->
                    <input type="hidden" name="classes" value="<?php echo ($classes)?>">
                    <input type="hidden" name="sname" value="<?php echo ($sname)?>">
                    <input type="hidden" name="sfname" value="<?php echo ($sfname)?>">
                    <input type="hidden" name="gender" value="<?php echo ($gender)?>">
                    <input type="hidden" name="dob" value="<?php echo ($dob)?>">
                    <input type="hidden" name="sdomicile" value="<?php echo ($sdomicile)?>">
                    <input type="hidden" name="sreligion" value="<?php echo ($sreligion)?>">
                    <input type="hidden" name="scnic" value="<?php echo ($scnic)?>">
                    <input type="hidden" name="snationality" value="<?php echo ($snationality)?>">
                    <input type="hidden" name="sphone" value="<?php echo ($sphone)?>">
                    <input type="hidden" name="semail" value="<?php echo ($semail)?>">
                    <input type="hidden" name="scell" value="<?php echo ($scell)?>">
                    <input type="hidden" name="saddress" value="<?php echo ($saddress)?>">
                    <input type="hidden" name="hearfrom" value="<?php echo ($hearfrom)?>">
                    <input type="hidden" name="gname" value="<?php echo ($gname)?>">
                    <input type="hidden" name="gcnic" value="<?php echo ($gcnic)?>">
                    <input type="hidden" name="gemail" value="<?php echo ($gemail)?>">
                    <input type="hidden" name="gphone" value="<?php echo ($gphone)?>">
                    <input type="hidden" name="gcell" value="<?php echo ($gcell)?>">
                    <input type="hidden" name="IsActive" value="<?php echo ($IsActive)?>">
                    <!-- Main page form data ends -->


                    <!-- Second page form data Starts -->
                    <input type="hidden" name="batch" value="<?php echo ($batch)?>">
                    <input type="hidden" name="group" value="<?php echo ($group)?>">
                    <input type="hidden" name="status" value="<?php echo ($status)?>">
                    <input type="hidden" name="board" value="<?php echo ($board)?>">
                    <!-- Second page form data ends -->


                    <input type="hidden" name="subjects" value="<?php echo ($subjects)?>">
                    <input type="hidden" name="noofsubj" value="<?php echo ($noofsubj)?>">


                    <!-- fee details -->
                    <input type="hidden" name="admissionfee" value="<?php echo ($admissionfee)?>">
                    <input type="hidden" name="admissiondiscount" value="<?php echo ($admissiondiscount)?>">
                    <input type="hidden" name="admissiontotal" value="<?php echo ($admissiontotal)?>">
                    <input type="hidden" name="tuitionfee" value="<?php echo ($tuitionfee)?>">
                    <input type="hidden" name="tuitiondiscount" value="<?php echo ($tuitiondiscount)?>">
                    <input type="hidden" name="tuitiontotal" value="<?php echo ($tuitiontotal)?>">
                    <input type="hidden" name="specialcharges" value="<?php echo ($specialcharges)?>">
                    <input type="hidden" name="specialdiscount" value="<?php echo ($specialdiscount)?>">
                    <input type="hidden" name="specialtotal" value="<?php echo ($specialtotal)?>">

                    <input type="hidden" name="discountpackage" value="<?php echo ($discountpackage)?>">
                    <input type="hidden" name="actualfees" value="<?php echo ($actualfees)?>">
                    <input type="hidden" name="totaldiscount" value="<?php echo ($totaldiscount)?>">
                    <input type="hidden" name="totalfees" value="<?php echo ($totalfees)?>">
                     <input type="hidden" name="submitby" value="<?php echo ($submitby)?>">
                    <!-- fee ends -->

                    <div class="row pl-3 pt-3 pr-3">
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

                    <input type="hidden" name="daysinmonth" id="daysinmonth" value="<?php echo$daysinmonth?>">

                    <div class="container">
                      <div class="row mt-2">
                        <div class="col-xl-12 p-1 h6 text-center text-white font-weight-bold text-uppercase" style="background-color: #323E6F;">Fee Detail</div>
                      </div>
                      
                      <div class="row" id='halfs'>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 mt-1">
                          <input type="text" onkeydown="spacefilter(this)" oninput="feecalculator1()" onkeyup="feecalculator()" style="display: none" name="days" id="days" class="form-control form-control-sm" placeholder="Number of Days" value="<?php echo$daysinmonth?>" required>
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
                                <label for="admfeedumy" style="font-size:14px">Fee</label>
                                <input type="text" name="admfeedumy" id="admfeedumy" class="form-control form-control-sm text-center" value="<?php echo $admissionfee?>" disabled style = "cursor: no-drop;">
                              </div>
                              <div class="col-xl-4">
                                <label for="admdiscountdumy" style="font-size:14px">Discount</label>
                                <input type="number" name="admdiscountdumy" id="admdiscountdumy" class="form-control form-control-sm text-center" value="<?php echo$admissiondiscount?>" disabled="">
                              </div>
                              <div class="col-xl-4">
                                <label for="admtotaldumy" style="font-size:14px">Total</label>
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
                                <label for="tuitionfeedumy" style="font-size:14px">Fee</label>
                                <input type="text" name="tuitionfeedumy" id="tuitionfeedumy" class="form-control form-control-sm text-center" value="<?php echo$tuitionfee?>" disabled style="cursor: no-drop;">
                              </div>
                              <div class="col-xl-4">
                                <label for="tuitiondiscountdumy" style="font-size:14px">Discount</label>
                                <input type="number" name="tuitiondiscountdumy" id="tuitiondiscountdumy" class="form-control form-control-sm text-center" value="<?php echo$tuitiondiscount?>" disabled style="cursor: no-drop;">
                              </div>
                              <div class="col-xl-4">
                                <label for="tuitiontotaldumy" style="font-size:14px">Total</label>
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
                                      <label for="packagedumy" style="font-size:14px">Package Discount</label>
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
                                <label for="specialchargesdumy" style="font-size:14px">Fee</label>
                                <input type="number" name="specialchargesdumy" id="specialchargesdumy" class="form-control form-control-sm text-center" value="<?php echo$specialcharges?>" disabled style="cursor: no-drop;">
                              </div>
                              <div class="col-xl-4">
                                <label for="specialdiscountdumy" style="font-size:14px">Discount</label>
                                <input type="number" name="specialdiscountdumy" id="specialdiscountdumy" class="form-control form-control-sm text-center" value="<?php echo$specialdiscount?>" disabled style="cursor: no-drop;">
                              </div>
                              <div class="col-xl-4">
                                <label for="specialtotal" style="font-size:14px">Total</label>
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
                              Total Fees : <span id="totalfees" class="font-weight-normal"><?php echo$totalfees ?></span>
                              <input type="hidden" name="totalfeesdumy" id="totalfeesdumy" value="<?php echo$totalfees?>">
                            </div>
                          </div>
                        </div>
                        <div class="col-xl-1"></div>
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
                            <div class="row">
                              <div class="col-xl-12" style="font-family: verdana">
                                <div class="row">
                                  <div class="col-xl-4">
                                    <div class="text-uppercase mt-3 text-white p-1" style="background-color:#003152; ;text-align: center;font-size: 14px;font-family: Lucida Sans Unicode;">
                                      Admission Fee
                                    </div>
                                    <div class="container p-2">
                                      <div class="row text-center">
                                        <div class="col-xl-12">
                                          <input onkeyup="checkforamount()" oninput="feecalculator()" type="number" name="admissionfeepaid" id="admissionfeepaid" class="form-control form-control-sm text-center" value="0">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-xl-4">
                                    <div class="text-uppercase mt-3 text-white p-1" style="background-color:#003152; ;text-align: center;font-size: 14px;font-family: Lucida Sans Unicode;">
                                      Tuition Fee
                                    </div>
                                    <div class="container p-2">
                                      <div class="row text-center">
                                        <div class="col-xl-12">
                                          <input type="number" onkeyup="checkforamount()" oninput="feecalculator()" name="tuitionfeepaid" id="tuitionfeepaid" class="form-control form-control-sm text-center" value="0">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  
                                  <div class="col-xl-4">
                                    <div class="text-uppercase mt-3 text-white p-1" style="background-color:#003152; ;text-align: center;font-size: 14px;font-family: Lucida Sans Unicode;">
                                      Special Fee
                                    </div>
                                    <div class="container p-2">
                                      <div class="row text-center">
                                        <div class="col-xl-12">
                                         <input type="number" onkeyup="checkforamount()" oninput="feecalculator()" name="specialfeepaid" id="specialfeepaid" class="form-control form-control-sm text-center" value="0">
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
                                    <div class="text-uppercase mt-3 text-white p-1 bg-dark" style="background-color:#003152; ;text-align: center;font-size: 14px;font-family: Lucida Sans Unicode;box-shadow: 1px 1px 5px black">
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
                          <button type="Reset" name="reset" class="btn btn-sm btn-danger"><i class="fas fa-reply-all pr-2"></i>Reset</button>
                          <button class="btn btn-sm btn-success" type="submit" id="savebutton" name="submit">Save<i class="fas fa-arrow-right pl-2"></i></button>
                          <input type="hidden" name="studentcheck4" value="true">
                          <input type="hidden" name="feeindayscheck" id="feeindayscheck" value="0">
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
    function feecalculator() 
    {
      var admissionfeepaid = parseInt(document.getElementById('admissionfeepaid').value);
      var tuitionfeepaid = parseInt(document.getElementById('tuitionfeepaid').value);
      var specialfeepaid = parseInt(document.getElementById('specialfeepaid').value);
      var totalpaidshow = document.getElementById('totalpaidshow');
      var totalpaid = document.getElementById('totalpaid');
      var balanceshow = document.getElementById('balanceshow');
      var balance = document.getElementById('balance');

      var totalfee = parseInt(document.getElementById('totalfeesdumy').value);
      totalpaidshow.value = admissionfeepaid + tuitionfeepaid + specialfeepaid;
      totalpaid.value = admissionfeepaid + tuitionfeepaid + specialfeepaid;
      balance.value = totalfee- parseInt(totalpaidshow.value);
      balanceshow.value = totalfee- parseInt(totalpaidshow.value);

    }
    function showdays()
    {
      var admissionfeepaid = document.getElementById('admissionfeepaid');
      var tuitionfeepaid = document.getElementById('tuitionfeepaid');
      var specialfeepaid = document.getElementById('specialfeepaid');
      admissionfeepaid.value = 0;
      tuitionfeepaid.value = 0;
      specialfeepaid.value = 0;

      var feeindayscheck = document.getElementById('feeindayscheck');
      var totalfees = parseInt(document.getElementById('totalfees').innerHTML);
      var totalfeesdumy = document.getElementById('totalfeesdumy');
      var feeindays = document.getElementById('feeindays');
      var days = document.getElementById('days');
      var daysinmonth = document.getElementById('daysinmonth').value;
      var messageofdayfee = document.getElementById('messageofdayfee');
      var messageoftuitionfee = document.getElementById('messageoftuitionfee');
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
        messageofdayfee.innerHTML="";
        messageofspecialfee.innerHTML="";
        messageoftuitionfee.innerHTML="";
        messageofadmissionfee.innerHTML="";
        feeindayscheck.value = 0;
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

    function checkforamount() 
    {
      var admissionfeepaid = document.getElementById('admissionfeepaid');
      var tuitionfeepaid = document.getElementById('tuitionfeepaid');
      var specialfeepaid = document.getElementById('specialfeepaid');
  
      var admtotaldumy = parseInt(document.getElementById('admtotaldumy').value);
      var tuitiontotaldumy = parseInt(document.getElementById('tuitiontotaldumy').value);
      var specialtotal = parseInt(document.getElementById('specialtotal').value);
      
      var feeindays = document.getElementById('feeindays');
      var days = parseInt(document.getElementById('days').value);
    
      var daysinmonth = document.getElementById('daysinmonth').value;

      var savebutton = document.getElementById('savebutton');

      if (feeindays.checked) 
      {
        if (days>=0)
        { 
          admissionfeepaid.disabled=false;
          tuitionfeepaid.disabled=false;
          specialfeepaid.disabled=false;
          savebutton.disabled = false;
          allowtuitionfee = parseInt((tuitiontotaldumy/daysinmonth)*days);
          allowspecialfee = parseInt((specialtotal/daysinmonth)*days);
          if (admissionfeepaid.value>admtotaldumy||tuitionfeepaid.value>allowtuitionfee||specialfeepaid.value>allowspecialfee) 
          {
            if (admissionfeepaid.value>admtotaldumy)
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
          }
        }
        else
        {
          admissionfeepaid.disabled=true;
          tuitionfeepaid.disabled=true;
          specialfeepaid.disabled=true;
          savebutton.disabled = true;
        }
        
        
      }
      else
      {
        admissionfeepaid.disabled=false;
        tuitionfeepaid.disabled=false;
        specialfeepaid.disabled=false;
        savebutton.disabled = false;
        if (admissionfeepaid.value>admtotaldumy||tuitionfeepaid.value>tuitiontotaldumy||specialfeepaid.value>specialtotal) 
        {
          if (admissionfeepaid.value>admtotaldumy)
          {
            admissionfeepaid.value = admissionfeepaid.value.replace(admissionfeepaid.value,"0");
            feecalculator();
          }
          else if (tuitionfeepaid.value>tuitiontotaldumy) 
          {
            tuitionfeepaid.value = tuitionfeepaid.value.replace(tuitionfeepaid.value,"0");
            feecalculator();
          }
          else if (specialfeepaid.value>specialtotal) 
          {
            specialfeepaid.value = specialfeepaid.value.replace(specialfeepaid.value,"0");
            feecalculator();
          }
        }
      }

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
