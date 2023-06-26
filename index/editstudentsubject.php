<?php
 require "profileinfo.php";
?>
<?php
if (empty($_POST['editstudentcheck2'])) 
{
  header('Location:editstudent.php');
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

  $idofstudent = $_POST['idofstudent'];
  require 'connectdatabase.php';
  $editstudent="SELECT *
                FROM studentlist
                WHERE StudentId= '$idofstudent'";
  $query = mysqli_query($conn,$editstudent);
  $editstudentdata = mysqli_fetch_array($query);
  $submitby=$editstudentdata['Submit_By'];
  $subject_actual_name = $editstudentdata['Subjects'];
  $subjects_actual_name = explode(' ', $subject_actual_name);
  $admission_actual_Fee = $editstudentdata['Admission_Fee'];
  $admission_actual_Discount = $editstudentdata['Admission_Discount'];
  $admission_actual_Total = $editstudentdata['Admission_Total'];
  $tuition_actual_Fee = $editstudentdata['Tuition_Fee'];
  $tuition_actual_Discount = $editstudentdata['Tuition_Discount'];
  $tuition_actual_Total = $editstudentdata['Tuition_Total'];
  $special_actual_Fee = $editstudentdata['Special_Fee'];
  $special_actual_Discount = $editstudentdata['Special_Discount'];
  $special_actual_Total = $editstudentdata['Special_Total'];
  $actual_Fee = $editstudentdata['Actual_Fee'];
  $total_Discount = $editstudentdata['Total_discount'];
  $total_Fee = $editstudentdata['Total_Fee'];
  $discountpackage = $editstudentdata['DiscountPackage'];
  $package = ($tuition_actual_Fee)*($discountpackage/100);
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

  <title>Edit Student</title>

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

  $admissionfee = "SELECT AdmissionFee 
                   FROM feestructure
                   WHERE CampusId = '$CampusId' AND Groups = '$group'";
  $query4 = mysqli_query($conn,$admissionfee);
  $groupadmissiondata = mysqli_fetch_array($query4);
  $groupadmissionfee = $groupadmissiondata['AdmissionFee'];

  $persubjfee = "SELECT FeePerSubj,DiscountUpTo,DiscountPercentage 
                   FROM feestructure
                   WHERE CampusId = '$CampusId' AND Groups = '$group'";
  $query5 = mysqli_query($conn,$persubjfee);
  $grouppersubjdata = mysqli_fetch_array($query5);
  $grouppersubjfee = $grouppersubjdata['FeePerSubj'];
  $discountupto = $grouppersubjdata['DiscountUpTo'];
  $discountpercentage = $grouppersubjdata['DiscountPercentage'];


  
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
                <div class="text-white" style="box-shadow: 1px 1px 2px black;border-radius: 0px 0px 50px 50px;background-color: #0047AB">Edit Student</div>
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

                <div class="row pl-3 pt-3 pr-3">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 h6 text-center">
                        <div class="container text-white p-1" style="box-shadow: 1px 1px 10px;border-radius: 20px 20px 20px 20px;background-color: #03D913">
                            General Information
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 h6 text-center">
                        <div class="container text-white p-1" style="box-shadow: 1px 1px 10px;border-radius: 20px 20px 20px 20px;background-color: #03D913">
                            Academic Information
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 h6 text-center">
                        <div class="container text-white p-1" style="box-shadow: 1px 1px 10px black;border-radius: 20px 20px 20px 20px;background-color: #03D913">
                            Subject Information
                        </div>
                    </div>
                </div>
                <hr>


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
                    <input type="hidden" name="idofstudent" value="<?php echo($idofstudent)?>">
                    <input type="hidden" name="IsActive" value="<?php echo$IsActive?>">
                    <!-- Main page form data ends -->


                    <!-- Second page form data Starts -->
                    <input type="hidden" name="batch" value="<?php echo ($batch)?>">
                    <input type="hidden" name="group" value="<?php echo ($group)?>">
                    <input type="hidden" name="status" value="<?php echo ($status)?>">
                    <input type="hidden" name="board" value="<?php echo ($board)?>">
                    <!-- Second page form data ends -->






                    <div class="container">
                      <div class="row mt-2">
                        <div class="col-xl-12 p-1 h6 text-center text-white font-weight-bold text-uppercase" style="background-color: #323E6F;">Student Detail</div>
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
                        <div class="col-xl-12 p-1 h6 text-center text-white font-weight-bold text-uppercase" style="background-color: #323E6F;">Subjects
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
                      <div class="row mt-4">
                        <div class="col-xl-12 p-1 h6 text-center text-white font-weight-bold text-uppercase" style="background-color: #323E6F;">Fee Structure</div>
                      </div>

                      <input type="hidden" name="noofsubj" value="<?php echo $noofsubj?>" id="noofsubj">

                      <div class="row mt-2">
                        <div class="col-xl-4 col-md-6">
                          <div class="text-uppercase mt-3 text-white p-1" style="background-color:#003152 ;text-align: center;font-size: 14px;font-family: Lucida Sans Unicode;box-shadow: 1px 1px 10px black">
                            Admission Fee
                          </div>
                          <div class="container p-2" style="box-shadow: 1px 1px 8px">
                            <div class="row text-center">
                              <div class="col-xl-4">
                                <label for="admfee" style="font-size:14px">Fee</label>
                                <input type="text" name="admfeeshow" id="admfeeshow" class="form-control form-control-sm text-center" value="<?php echo $groupadmissionfee?>" disabled style = "cursor: no-drop;">
                                <input type="hidden" name="admfee" id="admfee" class="form-control form-control-sm text-center" value="<?php echo $groupadmissionfee?>" style = "cursor: no-drop;">
                              </div>
                              <div class="col-xl-4">
                                <label for="admdiscount" style="font-size:14px">Discount</label>
                                <input type="number" oninput="feecalculator()"  name="admdiscount" id="admdiscount" class="form-control form-control-sm text-center" value="<?php echo$admission_actual_Discount?>">
                              </div>
                              <div class="col-xl-4">
                                <label for="admtotal" style="font-size:14px">Total</label>
                                <input type="text" name="admtotalshow" id="admtotalshow" class="form-control form-control-sm text-center" value="<?php echo $admission_actual_Total?>"  disabled style = "cursor: no-drop;">
                                 <input type="hidden" name="admtotal" id="admtotal" class="form-control form-control-sm text-center" value="<?php echo $admission_actual_Total?>" style = "cursor: no-drop;">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                          <div class="text-uppercase mt-3 text-white p-1" style="background-color:#003152 ;text-align: center;font-size: 14px;font-family: Lucida Sans Unicode;box-shadow: 1px 1px 10px black">
                            Tuition Fee
                          </div>
                          <div class="container p-2" style="box-shadow: 1px 1px 8px">
                            <div class="row text-center">
                              <div class="col-xl-4">
                                <label for="tuitionfee" style="font-size:14px">Fee</label>
                                <input type="text" name="tuitionfeeshow" id="tuitionfeeshow" class="form-control form-control-sm text-center" value="<?php echo $tuition_actual_Fee?>" disabled style = "cursor: no-drop;">
                                <input type="hidden" name="tuitionfee" id="tuitionfee" class="form-control form-control-sm text-center" value="<?php echo$tuition_actual_Fee?>" style = "cursor: no-drop;">
                                <input type="hidden" id="actualtuitionfee" name="actualtuitionfee" value="<?php echo $grouppersubjfee?>">
                              </div>
                              <div class="col-xl-4">
                                <label for="tuitiondiscount" style="font-size:14px">Discount</label>
                                <input type="number" oninput="feecalculator()" name="tuitiondiscount" id="tuitiondiscount" class="form-control form-control-sm text-center" value="<?php echo$tuition_actual_Discount?>">
                              </div>
                              <div class="col-xl-4">
                                <label for="tuitiontotal" style="font-size:14px">Total</label>
                                <input type="text" name="tuitiontotalshow" id="tuitiontotalshow" class=" text-center form-control form-control-sm" value="<?php echo$tuition_actual_Total?>" disabled style="cursor: no-drop;">
                                <input type="hidden" name="tuitiontotal" id="tuitiontotal" class="form-control form-control-sm" value="<?php echo$tuition_actual_Total?>"
                                style="cursor: no-drop;">
                              </div>
                            </div>
                            <?php
                              if ($discountpackage>0)
                              {
                                ?>
                                  <div class="row mt-2">
                                    <div class="col-xl-2"></div>
                                    <div class="col-xl-4 text-center">
                                      <label style="display: ;" id="packagelabel" for="package" style="font-size:14px">Package Discount</label>
                                    </div>
                                    <div class="col-xl-4">
                                      <input style="display:;" oninput="feecalculator()" type="number" name="package" id="package" class="form-control form-control-sm text-center" value="<?php echo($package)?>">
                                    </div>
                                    <div class="col-xl-2"></div>
                                  </div>
                                  <div class="ml-1 text-center text-success" id="discountmessage" style="text-shadow: 1px 1px 3px">You have got <?php echo $discountpackage ?>% Discount</div>
                                <?php
                              }
                              else
                              {
                                ?>
                                  <div class="row mt-2">
                                    <div class="col-xl-2"></div>
                                    <div class="col-xl-4 text-center">
                                      <label style="display:none ;" id="packagelabel" for="package" style="font-size:14px">Package Discount</label>
                                    </div>
                                    <div class="col-xl-4">
                                      <input style="display: none;" oninput="feecalculator()" type="number" name="package" id="package" class="form-control form-control-sm text-center" value="0">
                                    </div>
                                    <div class="col-xl-2"></div>
                                  </div>
                                  <div class="ml-1 text-center text-success" id="discountmessage" style="text-shadow: 1px 1px 3px"></div>
                                <?php
                              }
                            ?>                          
                          </div>
                        </div>

                        <div class="col-xl-4 col-md-6">
                          <div class="text-uppercase mt-3 text-white p-1" style="background-color:#003152 ;text-align: center;font-size: 14px;font-family: Lucida Sans Unicode;box-shadow: 1px 1px 10px black">
                            Special Fee
                          </div>
                          <div class="container p-2" style="box-shadow: 1px 1px 8px">
                            <div class="row text-center">
                              <div class="col-xl-4">
                                <label for="specialcharges" style="font-size:14px">Fee</label>
                                <input type="number" oninput="feecalculator()" name="specialcharges" id="specialcharges" class="form-control form-control-sm text-center" value="<?php echo $special_actual_Fee?>">
                              </div>
                              <div class="col-xl-4">
                                <label for="specialdiscount" style="font-size:14px">Discount</label>
                                <input type="number" oninput="feecalculator()" name="specialdiscount" id="specialdiscount" class="form-control form-control-sm text-center" value="<?php echo $special_actual_Discount?>">
                              </div>
                              <div class="col-xl-4">
                                <label for="specialtotal" style="font-size:14px">Total</label>
                                <input type="text" name="specialtotalshow" id="specialtotalshow" class="form-control form-control-sm" value="<?php echo $special_actual_Total?>" disabled style="cursor: no-drop;">
                                <input type="hidden" name="specialtotal" id="specialtotal" class="form-control form-control-sm" value="<?php echo $special_actual_Total?>" style="cursor: no-drop;">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row mt-2">
                        <div class="col-xl-8 col-md-3"></div>
                      </div>


                      <div class="row text-right mt-4 container">
                        <div class="col-xl-1"></div>
                        <div class="col-xl-10 col-md-12">
                          <div class="row text-left">
                            <div class="col-xl-4 col-md-4 border h6 p-2">
                              Actual Fees : <span id="actualfees" class="font-weight-normal"><?php echo$actual_Fee ?></span>
                              <input type="hidden" name="actualfeesv" id="actualfeesv" value="<?php echo$actual_Fee ?>">
                            </div>
                            <div class="col-xl-4 col-md-4 border h6 p-2">
                              Total Discount : <span id="totaldiscount" class="font-weight-normal"><?php echo$total_Discount ?></span>
                              <input type="hidden" name="totaldiscountv" id="totaldiscountv" value="<?php echo$total_Discount ?>">
                            </div>
                            <div class="col-xl-4 col-md-4 border h6 p-2">
                              Total Fees : <span id="totalfees" class="font-weight-normal"><?php echo$total_Fee ?></span>
                              <input type="hidden" name="totalfeesv" id="totalfeesv" value="<?php echo$total_Fee ?>">
                            </div>
                          </div>
                        </div>
                        <div class="col-xl-1"></div>
                      </div>
                      <div class="container">
                        <div class="row text-center mt-4">
                          <div class="col-xl-12">
                            <table class="table" style="box-shadow: 1px 1px 10px">
                              <tr>
                                <td style="background-color:#323E6F" class="h5 text-white" width="20%">Submit By</td>
                                <td><input type="text" name="submitby" class="form-control form-control-sm text-capitalize" value="<?php echo $submitby?>" required></td>
                              </tr>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="row mt-5 p-2" style="background-color: lightgray">
                        <div class="col-xl-12 col-md-6 text-center">
                          <button type="Reset" name="reset" class="btn btn-sm btn-danger"><i class="fas fa-reply-all pr-2"></i>Reset</button>
                          <button class="btn btn-sm btn-success" type="submit" name="submit">Update<i class="fas fa-arrow-up pl-2"></i></button>
                          <input type="hidden" name="editstudentcheck3" value="true">

                          <!-- discuont -->
                          <input type="hidden" name="discountupto" id="discountupto" value="<?php echo$discountupto?>">
                          <input type="hidden" name="discountpercentage" id="discountpercentage" value="<?php echo$discountpercentage?>">
                          <input type="hidden" name="discountpackage" id="discountpackage" value="0">
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


<!-- Fee calculator -->
<script>
  function feecalculator() 
  {
    var noofsubjects = document.getElementById('noofsubj').value;
    var tuitionfee = document.getElementById('tuitionfee');
    var tuitionfeeshow = document.getElementById('tuitionfeeshow');
    var tuitiondiscount = document.getElementById('tuitiondiscount').value;
    var actualtuitionfee = parseInt(document.getElementById('actualtuitionfee').value);
    var tuitiontotal = document.getElementById('tuitiontotal');
    var tuitiontotalshow = document.getElementById('tuitiontotalshow');

    var admfee = parseInt(document.getElementById('admfee').value);
    var admfeeshow = parseInt(document.getElementById('admfeeshow').value);
    var admdiscount = document.getElementById('admdiscount').value;
    var admtotal = document.getElementById('admtotal');
    var admtotalshow = document.getElementById('admtotalshow');

    var specialcharges = document.getElementById('specialcharges').value;
    var specialdiscount = document.getElementById('specialdiscount').value;
    var specialtotal = document.getElementById('specialtotal');


    var actualfeesv = document.getElementById('actualfeesv');
    var totaldiscountv = document.getElementById('totaldiscountv');
    var totalfeesv = document.getElementById('totalfeesv');

    var noofstudysub = 0;
    var discountupto = document.getElementById('discountupto').value;
    var discountpercentage = document.getElementById('discountpercentage').value;
  
    for (var i =0; i < noofsubjects; i++) 
    {
      var studysub = document.getElementById('sub'+i);
      if (studysub.checked) 
      {
        noofstudysub+=1;
      }
      else
      {

      }
    }
    if (noofstudysub>discountupto) 
    {
      document.getElementById('discountmessage').innerHTML="You have got"+' '+discountpercentage+'% '+'Discount';
      var package = document.getElementById('package');
      var packagelabel = document.getElementById('packagelabel');
      package.value = (actualtuitionfee*noofstudysub)*(discountpercentage/100);
      package.style.display = "";
      packagelabel.style.display = "";
      tuitionfeeshow.value = (actualtuitionfee*noofstudysub);
      tuitionfee.value = (actualtuitionfee*noofstudysub);
    }
    else
    {
      var package = document.getElementById('package');
      var packagelabel = document.getElementById('packagelabel');
      package.value = 0;
      package.style.display = "none";
      packagelabel.style.display = "none";
      document.getElementById('discountmessage').innerHTML="";
      tuitionfeeshow.value = actualtuitionfee*noofstudysub;
      tuitionfee.value = actualtuitionfee*noofstudysub;
    }
    
    admtotal.value = admfeeshow-admdiscount;
    admtotalshow.value = admfeeshow-admdiscount;

    specialtotal.value = specialcharges- specialdiscount;
    specialtotalshow.value = specialcharges- specialdiscount;

    document.getElementById('actualfees').innerHTML = admfee+ parseInt(tuitionfee.value)+ parseInt(specialcharges);
    actualfeesv.value = admfee+ parseInt(tuitionfee.value)+ parseInt(specialcharges);
    tuitiontotalshow.value = parseInt(tuitionfee.value) - tuitiondiscount - parseInt(package.value);
    tuitiontotal.value = parseInt(tuitionfee.value) - tuitiondiscount - parseInt(package.value);
    document.getElementById('totaldiscount').innerHTML = parseInt(admdiscount)+ parseInt(tuitiondiscount) + parseInt(specialdiscount)+parseInt(package.value);
    totaldiscountv.value =  parseInt(admdiscount)+ parseInt(tuitiondiscount)+parseInt(specialdiscount)+parseInt(package.value);
    document.getElementById('totalfees').innerHTML = parseInt(tuitiontotal.value) + parseInt(admtotal.value) + parseInt(specialtotal.value);
    totalfeesv.value = parseInt(tuitiontotal.value) + parseInt(admtotal.value) + parseInt(specialtotal.value);



  }
</script>
<!-- Fee calculator ends-->



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
