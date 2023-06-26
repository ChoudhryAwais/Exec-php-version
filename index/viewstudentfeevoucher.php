<?php
 require "profileinfo.php";
?>
<?php
if (empty($_POST['check1'])) 
{
  header('Location:viewfeevoucher.php');
}
else
{
  $feevoucherid = $_POST['check1'];
  require 'connectdatabase.php';
  $Feevoucherdata = "SELECT *
                     FROM feedetails
                     WHERE CampusId = '$CampusId' AND FeeVoucherId = '$feevoucherid'
                  ";
  $query = mysqli_query($conn,$Feevoucherdata);
  $feevoucherlistdata = mysqli_fetch_array($query);
  $voucherno = $feevoucherlistdata['VoucherNo']; 
  $studentrollno = $feevoucherlistdata['StudentRollNo']; 
  $sname = $feevoucherlistdata['StudentName'];
  $sfname = $feevoucherlistdata['FatherName'];
  $group = $feevoucherlistdata['GroupsName'];
  $class = $feevoucherlistdata['ClassesName'];
  $batch = $feevoucherlistdata['BatchName'];
  $board = $feevoucherlistdata['BoardsName'];
  $sub = $feevoucherlistdata['SubjectsName'];
  $month = $feevoucherlistdata['Month'];
  $sub = explode(' ',$sub);
  $sub = implode(' , ', $sub);

  $status =$feevoucherlistdata['Status'];
  $actualfee = $feevoucherlistdata['Actual_Fee'];
  $discount = $feevoucherlistdata['Total_Discount'];
  $discountpackage = $feevoucherlistdata['DiscountPackage'];
  $total = $feevoucherlistdata['Total_Fee'];
  $admissionfee = $feevoucherlistdata['Admission_Total'];
  $tuitionfee = $feevoucherlistdata['Tuition_Total'];
  $specialfee = $feevoucherlistdata['Special_Total'];
  $outstandingamount = $feevoucherlistdata['OutstandingAmount'];
  $admissionfeepaid = $feevoucherlistdata['Paid_Admission_Fee'];
  $tuitionfeepaid = $feevoucherlistdata['Paid_Tuition_Fee'];
  $specialfeepaid = $feevoucherlistdata['Paid_Special_Fee'];
  $outstandingamountpaid = $feevoucherlistdata['Paid_Outstanding_Fee'];
  $totalpaid = $feevoucherlistdata['Total_Paid'];
  $balance = $feevoucherlistdata['Balance'];
  $duedate = $feevoucherlistdata['DueDate'];
  $ispaid = $feevoucherlistdata['IsPaid'];

  $voucherfootnotes ="SELECT *
                     FROM voucherfootnotes
                     WHERE CampusId = '$CampusId' AND IsActive = 'Yes'
                     ORDER BY notesno ASC
                    ";
  $query1 = mysqli_query($conn,$voucherfootnotes);
  $voucherfootnote ="SELECT *
                     FROM voucherfootnotes
                     WHERE CampusId = '$CampusId' AND IsActive = 'Yes'
                     ORDER BY notesno ASC
                    ";
  $query2 = mysqli_query($conn,$voucherfootnote);
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Student Fee Voucher</title>
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
   

  <div class="row mt-4">
    <div class="col-xl-6 col-md-6 col-lg-6 col-sm-6">
      <div class="row bg-white">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pl-5 pr-4">
          <div class="row mb-2 border">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 h5 pt-1 text-white text-center">
             <img src="<?php echo$Logo?>" width="50%" height="100%">
            </div>
          </div>
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 h6 text-center border" style="font-family: 'Lucida Console', Courier, monospace;">
              Campus Code : <?php echo$CampusId?>
            </div>
          </div>
          <div class="row bg-dark">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 h5 pt-1 text-white text-center">
              <?php echo$InstitudeName?> (<?php echo$CampusName?>)
            </div>
          </div>
          <div class="row mt-2 border">
            <div class="col-xl-12">
              <div class="row">
                <div class="col-xl-12 text-center font-weight-bold mb-2 bg-secondary text-white">Office Copy</div>
              </div>
              <div class="row text-center">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 font-weight-bold border p-2" style="background-color: lightgray;">Voucher No :</div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 p-2 border"><?php echo$voucherno?></div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 font-weight-bold border p-2" style="background-color: lightgray;">Date :</div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 p-2 border"><?php echo(date('d F,Y'))?></div>
              </div>
              <div class="row text-center mt-2">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 font-weight-bold border p-2" style="background-color: lightgray;">Student ID :</div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 p-2 border"><?php echo$studentrollno?></div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 font-weight-bold border p-2" style="background-color: lightgray;">Status :</div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 p-2 border"><?php echo$status?></div>
              </div>
              <div class="row text-center mt-2">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 font-weight-bold border p-2" style="background-color: lightgray;">Name :</div>
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 p-2 border"><?php echo$sname.' '.$sfname?></div>
              </div>
              <div class="row text-center mt-2">
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 font-weight-bold border p-2" style="background-color: lightgray;">Class :</div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 p-2 border"><?php echo$class?></div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 font-weight-bold border p-2" style="background-color: lightgray;">Group :</div>
                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 p-2 border"><?php echo$group?></div>
              </div>
              <div class="row text-center mt-2">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 font-weight-bold border p-2" style="background-color: lightgray;">Subjects :</div>
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 p-2 border"><?php echo$sub?></div>
              </div>
              <div class="row text-center mt-2">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 font-weight-bold border p-2" style="background-color: lightgray;">Month :</div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 p-2 border"><?php echo$month?></div>
              </div>
              <div class="row">
                <div class="col-xl-12 text-center bg-secondary text-white font-weight-bold h5 mt-2">Fee Details</div>
              </div>
              <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                  <div class="text-center text-uppercase mt-3 font-weight-bold p-2" style="background-color:lightgray;">
                    Admission
                  </div>
                  <div class="p-2">
                    <div class="row text-center">
                      <div class="col-xl-12 border col-md-12 col-lg-12 col-sm-12">
                       <?php echo$admissionfee?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                  <div class="text-center text-uppercase mt-3 font-weight-bold p-2" style="background-color:lightgray;">
                    Tuition
                  </div>
                  <div class="p-2">
                    <div class="row text-center">
                      <div class="col-xl-12 border col-md-12 col-lg-12 col-sm-12">
                        <?php echo$tuitionfee?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                  <div class="text-center text-uppercase mt-3 font-weight-bold p-2" style="background-color:lightgray;">
                    Special
                  </div>
                  <div class="p-2">
                    <div class="row text-center">
                      <div class="col-xl-12 border col-md-12 col-lg-12 col-sm-12">
                        <?php echo$specialfee?>
                      </div>
                    </div>
                  </div>
                </div>    
              </div>
              <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                  <div class="text-center text-uppercase mt-3 font-weight-bold p-2" style="background-color:lightgray;">
                    Arrears
                  </div>
                  <div class="p-2">
                    <div class="row text-center">
                      <div class="col-xl-12 border col-md-12 col-lg-12 col-sm-12">
                       <?php echo$outstandingamount?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                  <div class="text-center text-uppercase mt-3 font-weight-bold p-2" style="background-color:lightgray;">
                    Discount
                  </div>
                  <div class="p-2">
                    <div class="row text-center">
                      <div class="col-xl-12 border col-md-12 col-lg-12 col-sm-12">
                        <?php echo$discount?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                  <div class="text-center text-uppercase mt-3 font-weight-bold p-2" style="background-color:lightgray;">
                    Special Discount
                  </div>
                  <div class="p-2">
                    <div class="row text-center">
                      <div class="col-xl-12 border col-md-12 col-lg-12 col-sm-12">
                        <?php echo$discountpackage.'%'?>
                      </div>
                    </div>
                  </div>
                </div>    
              </div>
              <div class="row mt-2">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3"></div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 text-center font-weight-bold h5 mt-2" style="background-color: lightgray">Fee Paid</div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3"></div>
              </div>
              <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                  <div class="text-center text-uppercase mt-3 font-weight-bold p-2" style="background-color:lightgray;">
                    Admission
                  </div>
                  <div class="p-2">
                    <div class="row text-center">
                      <div class="col-xl-12 border col-md-12 col-lg-12 col-sm-12">
                       <?php echo$admissionfeepaid?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                  <div class="text-center text-uppercase mt-3 font-weight-bold p-2" style="background-color:lightgray;">
                    Tuition
                  </div>
                  <div class="p-2">
                    <div class="row text-center">
                      <div class="col-xl-12 border col-md-12 col-lg-12 col-sm-12">
                        <?php echo$tuitionfeepaid?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                  <div class="text-center text-uppercase mt-3 font-weight-bold p-2" style="background-color:lightgray;">
                    Special
                  </div>
                  <div class="p-2">
                    <div class="row text-center">
                      <div class="col-xl-12 border col-md-12 col-lg-12 col-sm-12">
                        <?php echo$specialfeepaid?>
                      </div>
                    </div>
                  </div>
                </div>    
              </div>
              <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                  <div class="text-center text-uppercase mt-3 font-weight-bold p-2" style="background-color:lightgray;">
                    Arrears
                  </div>
                  <div class="p-2">
                    <div class="row text-center">
                      <div class="col-xl-12 border col-md-12 col-lg-12 col-sm-12">
                        <?php echo$outstandingamountpaid ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                  
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                  
                </div>    
              </div>
              <div class="row text-center mt-2">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 font-weight-bold border p-2" style="background-color: lightgray;">Total Paid : </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 p-2 border"><?php echo$totalpaid?></div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 font-weight-bold border p-2" style="background-color: lightgray;">Fee Payable : </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 p-2 border"><?php echo$balance?></div>
              </div>
              <div class="row text-center mt-2">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 font-weight-bold border p-2" style="background-color: lightgray;">Fee Status : </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 p-2 border"><?php echo$ispaid?></div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 font-weight-bold border p-2" style="background-color: lightgray;">Due Date : </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 p-2 border"><?php echo$duedate?></div>
              </div>
              <div class="row mt-2">
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 text-center font-weight-bold h5 mt-2 bg-secondary text-white">
                  Note
                </div>
              </div>
              <div class="row">
                <div class="col-xl-12">
                  <ul class="h6" style="line-height: 30px">
                    <?php
                      while ($row1=mysqli_fetch_assoc($query2)) 
                      {
                        ?>
                          <li><?php echo $row1['Notes']; ?></li>
                        <?php
                      }
                    ?>
                  </ul>
                </div>
              </div>
              <div class="row mb-3 mt-4 border bg-secondary text-white">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 h6 pl-3 pt-2 pb-2">
                  <img src="pics/address.png" class="icon" style="height: 16px;width: 16px;">
                  <span class="p-3" style="font-size: 12px"><?php echo$InstitudeAddress?></span>
                  <div class="mt-1"></div>
                  <img src="pics/facebook.png" class="icon" style="height: 16px;width: 16px;">
                  <span class="p-3" style="font-size: 12px"><?php echo$InstitudeFacebook?></span>
                  <div class="mt-1"></div>
                  <img src="pics/insta.png" class="icon" style="height: 16px;width: 16px;">
                  <span class="p-3" style="font-size: 12px"><?php echo$InstitudeInstagram?></span>
                  <div class="mt-1"></div>
                  <img src="pics/whatsapp.png" class="icon" style="height: 16px;width: 16px;">
                  <span class="p-3" style="font-size: 12px"><?php echo$InstitudeWhatsappNum?></span>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 font-italic text-right">
                  "Powered by EXEC"                
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-6 col-md-6 col-lg-6 col-sm-6">
      <div class="row bg-white">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pl-4 pr-5">
          <div class="row mb-2 border">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 h5 pt-1 text-white text-center">
             <img src="<?php echo$Logo?>" width="50%" height="100%">
            </div>
          </div>
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 h6 text-center border" style="font-family: 'Lucida Console', Courier, monospace;">
              Campus Code : <?php echo$CampusId?>
            </div>
          </div>
          <div class="row bg-dark">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 h5 pt-1 text-white text-center">
              <?php echo$InstitudeName?> (<?php echo$CampusName?>)
            </div>
          </div>
          <div class="row mt-2 border">
            <div class="col-xl-12">
              <div class="row">
                <div class="col-xl-12 text-center font-weight-bold mb-2 bg-secondary text-white">Student Copy</div>
              </div>
              <div class="row text-center">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 font-weight-bold border p-2" style="background-color: lightgray;">Voucher No :</div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 p-2 border"><?php echo$voucherno?></div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 font-weight-bold border p-2" style="background-color: lightgray;">Date :</div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 p-2 border"><?php echo(date('d F,Y'))?></div>
              </div>
              <div class="row text-center mt-2">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 font-weight-bold border p-2" style="background-color: lightgray;">Student ID :</div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 p-2 border"><?php echo$studentrollno?></div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 font-weight-bold border p-2" style="background-color: lightgray;">Status :</div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 p-2 border"><?php echo$status?></div>
              </div>
              <div class="row text-center mt-2">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 font-weight-bold border p-2" style="background-color: lightgray;">Name :</div>
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 p-2 border"><?php echo$sname.' '.$sfname?></div>
              </div>
              <div class="row text-center mt-2">
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 font-weight-bold border p-2" style="background-color: lightgray;">Class :</div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 p-2 border"><?php echo$class?></div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 font-weight-bold border p-2" style="background-color: lightgray;">Group :</div>
                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 p-2 border"><?php echo$group?></div>
              </div>
              <div class="row text-center mt-2">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 font-weight-bold border p-2" style="background-color: lightgray;">Subjects :</div>
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 p-2 border"><?php echo$sub?></div>
              </div>
              <div class="row text-center mt-2">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 font-weight-bold border p-2" style="background-color: lightgray;">Month :</div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 p-2 border"><?php echo$month?></div>
              </div>
              <div class="row">
                <div class="col-xl-12 text-center font-weight-bold h5 mt-2 bg-secondary text-white">Fee Details</div>
              </div>
               <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                  <div class="text-center text-uppercase mt-3 font-weight-bold p-2" style="background-color:lightgray;">
                    Admission
                  </div>
                  <div class="p-2">
                    <div class="row text-center">
                      <div class="col-xl-12 border col-md-12 col-lg-12 col-sm-12">
                       <?php echo$admissionfee?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                  <div class="text-center text-uppercase mt-3 font-weight-bold p-2" style="background-color:lightgray;">
                    Tuition
                  </div>
                  <div class="p-2">
                    <div class="row text-center">
                      <div class="col-xl-12 border col-md-12 col-lg-12 col-sm-12">
                        <?php echo$tuitionfee?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                  <div class="text-center text-uppercase mt-3 font-weight-bold p-2" style="background-color:lightgray;">
                    Special
                  </div>
                  <div class="p-2">
                    <div class="row text-center">
                      <div class="col-xl-12 border col-md-12 col-lg-12 col-sm-12">
                        <?php echo$specialfee?>
                      </div>
                    </div>
                  </div>
                </div>    
              </div>
              <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                  <div class="text-center text-uppercase mt-3 font-weight-bold p-2" style="background-color:lightgray;">
                    Arrears
                  </div>
                  <div class="p-2">
                    <div class="row text-center">
                      <div class="col-xl-12 border col-md-12 col-lg-12 col-sm-12">
                       <?php echo$outstandingamount?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                  <div class="text-center text-uppercase mt-3 font-weight-bold p-2" style="background-color:lightgray;">
                    Discount
                  </div>
                  <div class="p-2">
                    <div class="row text-center">
                      <div class="col-xl-12 border col-md-12 col-lg-12 col-sm-12">
                        <?php echo$discount?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                  <div class="text-center text-uppercase mt-3 font-weight-bold p-2" style="background-color:lightgray;">
                    Special Discount
                  </div>
                  <div class="p-2">
                    <div class="row text-center">
                      <div class="col-xl-12 border col-md-12 col-lg-12 col-sm-12">
                        <?php echo$discountpackage.'%'?>
                      </div>
                    </div>
                  </div>
                </div>    
              </div>
              <div class="row mt-2">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3"></div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 text-center font-weight-bold h5 mt-2" style="background-color: lightgray">Fee Paid</div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3"></div>
              </div>
              <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                  <div class="text-center text-uppercase mt-3 font-weight-bold p-2" style="background-color:lightgray;">
                    Admission
                  </div>
                  <div class="p-2">
                    <div class="row text-center">
                      <div class="col-xl-12 border col-md-12 col-lg-12 col-sm-12">
                       <?php echo$admissionfeepaid?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                  <div class="text-center text-uppercase mt-3 font-weight-bold p-2" style="background-color:lightgray;">
                    Tuition
                  </div>
                  <div class="p-2">
                    <div class="row text-center">
                      <div class="col-xl-12 border col-md-12 col-lg-12 col-sm-12">
                        <?php echo$tuitionfeepaid?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                  <div class="text-center text-uppercase mt-3 font-weight-bold p-2" style="background-color:lightgray;">
                    Special
                  </div>
                  <div class="p-2">
                    <div class="row text-center">
                      <div class="col-xl-12 border col-md-12 col-lg-12 col-sm-12">
                        <?php echo$specialfeepaid?>
                      </div>
                    </div>
                  </div>
                </div>    
              </div>
              <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                  <div class="text-center text-uppercase mt-3 font-weight-bold p-2" style="background-color:lightgray;">
                    Arrears
                  </div>
                  <div class="p-2">
                    <div class="row text-center">
                      <div class="col-xl-12 border col-md-12 col-lg-12 col-sm-12">
                        <?php echo$outstandingamountpaid ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                  
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                  
                </div>    
              </div>
              <div class="row text-center mt-2">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 font-weight-bold border p-2" style="background-color: lightgray;">Total Paid : </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 p-2 border"><?php echo$totalpaid?></div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 font-weight-bold border p-2" style="background-color: lightgray;">Balance : </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 p-2 border"><?php echo$balance?></div>
              </div>
              <div class="row text-center mt-2">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 font-weight-bold border p-2" style="background-color: lightgray;">Fee Status : </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 p-2 border"><?php echo$ispaid?></div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 font-weight-bold border p-2" style="background-color: lightgray;">Due Date : </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 pt-2 pl-1 border"><?php echo$duedate?></div>
              </div>
              <div class="row mt-2">
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 text-center font-weight-bold h5 mt-2 bg-secondary text-white">
                  Note
                </div>
              </div>
              <div class="row">
                <div class="col-xl-12">
                  <ul class="h6" style="line-height: 30px">
                    <?php
                      while ($row1=mysqli_fetch_assoc($query1)) 
                      {
                        ?>
                          <li><?php echo $row1['Notes']; ?></li>
                        <?php
                      }
                    ?>
                  </ul>
                </div>
              </div>
              <div class="row mb-3 mt-4 border bg-secondary text-white">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 h6 pl-3 pt-2 pb-2">
                  <img src="pics/address.png" class="icon" style="height: 16px;width: 16px;">
                  <span class="p-3" style="font-size: 12px"><?php echo$InstitudeAddress?></span>
                  <div class="mt-1"></div>
                  <img src="pics/facebook.png" class="icon" style="height: 16px;width: 16px;">
                  <span class="p-3" style="font-size: 12px"><?php echo$InstitudeFacebook?></span>
                  <div class="mt-1"></div>
                  <img src="pics/insta.png" class="icon" style="height: 16px;width: 16px;">
                  <span class="p-3" style="font-size: 12px"><?php echo$InstitudeInstagram?></span>
                  <div class="mt-1"></div>
                  <img src="pics/whatsapp.png" class="icon" style="height: 16px;width: 16px;">
                  <span class="p-3" style="font-size: 12px"><?php echo$InstitudeWhatsappNum?></span>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 font-italic text-right">
                  "Powered by EXEC"
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

 
  
  <div class="text-center mt-3 mb-3">
    <button class="btn btn-lg btn-info pl-5 pr-5" id="print-btn" onclick="window.print();">Print</button>
  </div>

</body>
</html>