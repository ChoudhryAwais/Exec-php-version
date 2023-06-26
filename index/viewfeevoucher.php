<?php
 require "profileinfo.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <title>Fee Voucher</title>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">


   <!-- Custom fonts for this template-->
   <link href="vendor/fontawesome-free/css/all.min.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
   <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $TitleLogo?>">

   <!-- Custom styles for thischeck template-->
   <link href="css/sb-admin-2.min.css?v=<?php echo time(); ?>" rel="stylesheet">
   <link href="css/bootstrap.min.css?v=<?php echo time(); ?>" rel="stylesheet">
   <link href="css/style.css?v=<?php echo time(); ?>" rel="stylesheet">
   <link href="responsive/responsive.css?v=<?php echo time(); ?>" rel="stylesheet">
   <link href="css/style.css?v=<?php echo time(); ?>" rel="stylesheet">

   <script src="js/jquery-3.5.0.min.js"></script>
   <script src="js/sweetalert2.all.min.js"></script>
</head>

<?php
  if (isset($_POST['editfeevouchercheck4'])) 
  {
    $idoffeevouhcer =  htmlspecialchars($_POST['idoffeevoucher']);
    $totalpaidfee ="SELECT *
                    FROM feedetails
                    WHERE FeeVoucherId='$idoffeevouhcer'
                    ";
    $query3 = mysqli_query($conn,$totalpaidfee);
    $totalpaidfeedata = mysqli_fetch_array($query3);
    $totaladmissionfeepaid = $totalpaidfeedata['Total_Paid_Admission_Fee'];
    $totaltuitionfeepaid = $totalpaidfeedata['Total_Paid_Tuition_Fee'];
    $totalspecialfeepaid = $totalpaidfeedata['Total_Paid_Special_Fee'];

    $StudentId =  htmlspecialchars($_POST['StudentId']);
    $admissionfeepaid = htmlspecialchars($_POST['admissionfeepaid']);
    $tuitionfeepaid = htmlspecialchars($_POST['tuitionfeepaid']);
    $specialfeepaid = htmlspecialchars($_POST['specialfeepaid']);
    $outstandingfeepaid = htmlspecialchars($_POST['outstandingfeepaid']);
    $totalpaid = htmlspecialchars($_POST['totalpaid']);
    $alreadypaid = htmlspecialchars($_POST['alreadypaid']);
    $balance = htmlspecialchars($_POST['balance']);
    $duedate = $_POST['duedate'];

    $totaladmissionfeepaid = $totaladmissionfeepaid+$admissionfeepaid;
    $totaltuitionfeepaid = $totaltuitionfeepaid + $tuitionfeepaid;
    $totalspecialfeepaid = $totalspecialfeepaid + $specialfeepaid;

    $outstandingamount = $totalpaidfeedata['OutstandingAmount']-$outstandingfeepaid;

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

    $days = $_POST['days'];

    if ($feeindayscheck==2) 
    {
      $feeindayscheck=0; 
    }
    else
    {
      $feeindayscheck = $_POST['feeindayscheck']; 
    }

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
    $lastpaiddate = date('dF,Y');
    $Updatefeevoucher ="UPDATE feedetails
                        SET
                        Paid_Admission_Fee = '$admissionfeepaid',
                        Paid_Tuition_Fee ='$tuitionfeepaid',
                        Paid_Special_Fee = '$specialfeepaid',
                        Paid_Outstanding_Fee = '$outstandingfeepaid',
                        Balance = '$balance',
                        DueDate = '$duedate',
                        Total_Paid = '$totalpaid',
                        AlreadyPaid = '$alreadypaid',
                        IsPaid = '$ispaid',
                        FeeInDays = '$feeindayscheck',
                        Days = '$days',
                        Total_Paid_Admission_Fee = '$totaladmissionfeepaid',
                        Total_Paid_Tuition_Fee = '$totaltuitionfeepaid',
                        Total_Paid_Special_Fee = '$totalspecialfeepaid',
                        OutstandingAmount = '$outstandingamount',
                        LastPaidDate = '$lastpaiddate'
                        WHERE FeeVoucherId ='$idoffeevouhcer'
                        ";
    $Updatestudentstatus = "UPDATE studentlist
                            SET
                            IsPaid = '$ispaid'
                            WHERE Roll_No = '$StudentId'";

    if (mysqli_query($conn,$Updatefeevoucher)&&mysqli_query($conn,$Updatestudentstatus)) 
    {
      echo 
        '<input type="hidden" >
        <script>
          Swal.fire("Update", "Voucher update", "success");
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

?>
<?php
  $feevoucherdata = "SELECT * 
          FROM feedetails
          WHERE CampusId='$CampusId'";
  $query = mysqli_query($conn,$feevoucherdata);
  $feevoucherdataforprint = "SELECT * 
          FROM feedetails
          WHERE CampusId='$CampusId'";
  $queryforprint = mysqli_query($conn,$feevoucherdataforprint);

  $feevouchergroups = "SELECT DISTINCT(GroupsName) 
          FROM feedetails
          WHERE CampusId='$CampusId'
          ORDER BY GroupsName ASC";
  $query1 = mysqli_query($conn,$feevouchergroups);

  $feevoucherclasses = "SELECT DISTINCT(ClassesName) 
          FROM feedetails
          WHERE CampusId='$CampusId'
          ORDER BY ClassesName ASC";
  $query2 = mysqli_query($conn,$feevoucherclasses);

  $nooftotalfeevoucher = "SELECT COUNT(FeeVoucherId) as feevoucherno 
          FROM feedetails
          WHERE CampusId='$CampusId'";
  $query4 = mysqli_query($conn,$nooftotalfeevoucher);
  $feevoucherno = mysqli_fetch_array($query4);
  $no_Of_total_feevoucher = $feevoucherno['feevoucherno'];
  $currentmonth = date('F');

  $allvoucherid = array();
  $voucherid = "SELECT FeeVoucherId
          FROM feedetails
          WHERE CampusId='$CampusId'";
  $query5 = mysqli_query($conn,$voucherid);
  if (mysqli_num_rows($query5)>0) 
  {
    while ($row4=mysqli_fetch_assoc($query5)) 
    {
      $allvoucherid[] = $row4['FeeVoucherId']; 
    }
    $allvoucherid = implode('_', $allvoucherid);
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
                    <div class="text-white" style="box-shadow: 1px 1px 2px black;border-radius: 0px 0px 50px 50px;background-color: #0047AB">Fee Voucher</div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 text-right">
                    <a href="viewfeepolicy.php" style="text-decoration: none;"> 
                      <button class="btn btn-sm btn-secondary mt-2" style="border-radius: 40px;"><i class="fa fa-eye pr-1"></i>Voucher Footnotes</button>
                    </a>
                    <a href="createvoucher.php"> 
                      <button class="btn btn-sm btn-success mt-2 mr-4" style="border-radius: 40px;"><i class="fa fa-plus pr-1"></i>Create Fee Voucher</button>
                    </a>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xl-12 mt-4 mb-5">
                    <div class="container p-2" style="border-radius: 2px;box-shadow: 1px 1px 10px;border:1px solid black">
                      <div class="row">
                        <div class="col-xl-12 mb-2">
                          <div class="col-xl-12 p-3 font-weight-bold" style="background-color:#323E6F;border-radius: 20px 20px 0px 0px;font-size: 18px;font-family: verdana;">
                            <div class="container pb-3">
                              <div class="row">
                                <span class="col-xl-2 pt-2 text-white" style="border-radius: 20px;font-size: 9px">
                                  <span class="rounded-circle bg-dark p-2">FILTER<img src="pics/filter.png" class=" icon ml-1" style="height: 15px;width: 15px;"></span>
                                </span>
                                <div class="col-xl-8"></div>
                                <div class="col-xl-2 mt-1 text-right">
                                    <a href="viewfeevoucher.php" class="btn btn-sm btn-danger rounded-circle" style="text-decoration: none;box-shadow: 1px 1px 8px black">Reset</a>
                                </div>
                              </div>
                            </div>
                            
                            <div class="row pb-2">
                              <div class="col-xl-2">
                                <input type="text" id="byvoucherno" class="form-control form-control-sm" placeholder="By Voucher No" onkeyup="filter()">
                              </div>
                              <div class="col-xl-2">
                                <input type="number" id="byrollno" class="form-control form-control-sm" placeholder="By Roll No" onkeyup="filter()">
                              </div>
                              <div class="col-xl-2">
                                <input type="text" id="byname" class="form-control form-control-sm" placeholder="By Name" onkeyup="filter()">
                              </div>
                              <div class="col-xl-2">
                                <input type="number" id="byalreadypaid" class="form-control form-control-sm" placeholder="By Already Paid" onkeyup="filter()">
                              </div>
                              <div class="col-xl-2">
                                <input type="number" id="byfeepaid" class="form-control form-control-sm" placeholder="By Paid Fee" onkeyup="filter()">
                              </div>
                              <div class="col-xl-2">
                                <input type="number" id="bybalance" class="form-control form-control-sm" placeholder="By Balance" onkeyup="filter()">
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
                                        <option value="<?php echo$row1['GroupsName']?>"><?php echo$row1['GroupsName']?></option>
                                      <?php  
                                    }
                                  ?>
                                </select>
                              </div>
                              <div class="col-xl-3">
                                <select id="byclass" class="form-control form-control-sm" oninput="filter()">
                                  <option value="" style="background-color: lightgray">By Class</option>
                                  <?php
                                    while ($row2 = mysqli_fetch_assoc($query2)) 
                                    {
                                      ?>
                                        <option value="<?php echo$row2['ClassesName']?>"><?php echo$row2['ClassesName']?></option>
                                      <?php  
                                    }
                                  ?>
                                </select>
                              </div>
                              <div class="col-xl-3">
                                <select class="form-control form-control-sm" id="bystatus" oninput="filter()">
                                  <option value="" style="background-color: lightgray">Status</option>
                                  <option value="Paid">Paid</option>
                                  <option value="Unpaid">Unpaid</option>
                                  <option value="C/F">C/F</option>
                                </select>
                              </div>
                              <div class="col-xl-3">
                                <select class="form-control form-control-sm" id="bymonth" oninput="filter()" onchange="multipleoption()">
                                  <option value="<?php echo$currentmonth ?>" style="background-color: lightgray"><?php echo$currentmonth ?></option>
                                  <option value="">All</option>
                                  <option value="January">January</option>
                                  <option value="February">February</option>
                                  <option value="March">March</option>
                                  <option value="April">April</option>
                                  <option value="May">May</option>
                                  <option value="June">June</option>
                                  <option value="July">July</option>
                                  <option value="August">August</option>
                                  <option value="September">September</option>
                                  <option value="October">October</option>
                                  <option value="November">November</option>
                                  <option value="December">December</option>
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
                          <form action="printallvoucher.php" method="post" target="_blank">
                            <button style="pointer-events: none;cursor: default;" class="btn btn-sm btn-warning" title="Print All" disabled id="printbtn">
                              Print<i class="pl-2 fa fa-print" style="font-size: 12px"></i>
                            </button>
                            <?php
                              while ($row3=mysqli_fetch_assoc($queryforprint)) 
                              {
                                ?>
                                  <input style="display: none;" type="checkbox" name="printallcheckbox[]" class="printchecks" value="<?php echo $row3['FeeVoucherId']?>">
                                <?php
                              }
                            ?>
                            <input type="hidden" name="printallvouchercheck1" value="true">
                           
                          </form>
                          <a href="deleteallvoucher.php?id=<?= $allvoucherid?>" id="linkofdelete" style="pointer-events: none;cursor: default;" id="deleteall" class = "btn-del">
                            <button disabled id="deleteallbtn" name="submit" class="btn btn-sm btn-danger" title="Delete All">Delete<i class="pl-2 fa fa-trash" style="font-size: 12px"></i></button>
                          </a>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xl-12 table-sm">
                          <div class="table-responsive">
                            <table class="table table-light table-bordered table-striped" id="tablebody"  style="font-size: 14px;border;line-height: 25px">
                              <tr style="background-color:#323E6F;color: white;box-shadow: 1px 1px 8px black">
                                <th class="text-center" scope="col" id="checkall">
                                  <input type="checkbox" name="selectall" id="selectall" onclick="selectallchecks()">
                                  <label for="selectall"></label>
                                </th>
                                <th class="text-center" scope="col">V.No</th>
                                <th class="text-center" scope="col">Roll No</th>
                                <th class="text-center" scope="col">Name</th>  
                                <th class="text-center" scope="col">Class</th> 
                                <th class="text-center" scope="col">Group</th>
                                <th class="text-center" scope="col">Paid Fee</th>
                                <th class="text-center" scope="col">To-Date Paid</th>
                                <th class="text-center" scope="col">Fee Payable</th> 
                                <th class="text-center" scope="col">Status</th>
                                <th class="text-center" scope="col">Month</th>
                                <th class="text-center" scope="col">Action</th>
                              </tr>
                              <?php
                                if ($no_Of_total_feevoucher==0) 
                                {
                                  echo "
                                  <td style='border:0px;font-style:italic'>no record</td>
                                  <td class='border-0' ></td>
                                  <td class='border-0 '></td>
                                  <td class='border-0 '></td>
                                  <td class='border-0 '></td>
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
                                        <td style="line-height: 35px" class="text-center" scope="row" id="checkall">
                                          <input type="checkbox" onclick="multipleoption()" id="checkshow<?php echo$i?>" class="checkshow" name="vouhcercheckbox[]"                                              value="<?php echo$row['FeeVoucherId']?>">
                                          <label for="checkshow<?php echo$i?>" class=""></label>
                                        </td>
                                        <td style="line-height: 35px" class="text-center" scope="row">
                                          <?php echo $row['VoucherNo']?>    
                                        </td>
                                        <td style="line-height: 35px" class="text-center">
                                          <?php echo $row['StudentRollNo']?>    
                                        </td>
                                        <td style="line-height: 35px" class="text-center">
                                          <?php echo $row['StudentName']?>    
                                        </td>
                                        <td style="line-height: 35px" class="text-center">
                                          <?php echo $row['ClassesName']?>
                                        </td>
                                        <td style="line-height: 35px" class="text-center">
                                          <?php echo $row['GroupsName']?>
                                        </td>
                                        <td style="line-height: 35px" class="text-center">
                                          <?php echo $row['AlreadyPaid']?>
                                        </td>
                                        <td style="line-height: 35px" class="text-center">
                                          <?php echo $row['Total_Paid']?>
                                        </td>
                                        <td style="line-height: 35px" class="text-center">
                                          <?php echo $row['Balance']?>   
                                        </td>
                                        <?php
                                          if ($row['IsPaid']=="Paid") 
                                          {
                                            ?>
                                              <td style="line-height: 35px" class="text-center bg-success font-weight-bold text-white" style="background-color: green;"><?php echo$row['IsPaid']?></td>
                                            <?php
                                          }
                                          elseif ($row['IsPaid']=="Unpaid")
                                          {
                                            ?>
                                              <td style="line-height: 35px" class="text-center bg-danger font-weight-bold text-white" style="background-color: red"><?php echo$row['IsPaid']?></td>
                                            <?php
                                          }
                                          else
                                          {
                                            ?>
                                              <td style="line-height: 35px" class="text-center bg-warning font-weight-bold text-white" style="background-color: red"><?php echo$row['IsPaid']?></td>
                                            <?php 
                                          }
                                        ?>
                                        <td style="line-height: 35px" class="text-center"><?php echo $row['Month']?></td>
                                        <td style="line-height: 35px" class="text-center p-2">
                                          <div class="btn-group text-center">
                                            <form action="viewstudentfeevoucher.php" method="post" target="_blank">
                                              <button class="btn-sm btn-success rounded-circle mr-1" title="View form"><i class="fa fa-eye" style="font-size: 11px"></i></button>
                                              <input type="hidden" name="check1" value="<?php echo $row['FeeVoucherId']?>">
                                            </form>
                                            <form action="editstudentfeevoucher.php" method="post">
                                              <button class="btn-sm btn-info rounded-circle mr-1" title="Edit"><i class="fa fa-edit" style="font-size: 11px"></i></button>
                                              <input type="hidden" name="check2" value="<?php echo $row['FeeVoucherId']?>">
                                            </form>
                                            <a href="deletefeevoucher.php?id=<?= $row['FeeVoucherId']?>" class = "btn-del"><button style="background-color: red" name="submit" class="btn-sm btn-danger rounded-circle" title="Delete"><i class="fa fa-trash" style="font-size: 11px"></i></button></a>
                                          </div>
                                        </td>
                                      </tr>
                                    <?php
                                    $i+=1;
                                  }
                                }
                              ?>
                              <tr style="background-color: lightgray;color:black">
                                <td class="border-0 font-italic" style="font-size: 13px;">Total : <span id="totalrecord"><?php echo $no_Of_total_feevoucher ?></span></td>
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

                          <?php 
                            if(isset($_GET['createvoucher']))
                            {
                              if ($_GET['createvoucher']=="success") 
                              {
                                echo 
                                    '<input type="hidden" >
                                    <script>
                                      Swal.fire("Vouchers Created", "", "success");
                                    </script>
                                    ';
                              }
                              elseif ($_GET['createvoucher']=="alreadyexist") 
                              {
                                echo 
                                    '<input type="hidden" >
                                    <script>
                                      Swal.fire("Vouhcers Already Created", "", "error");
                                    </script>
                                    ';
                              }
                            }
                          ?>
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
    var bymonth = document.getElementById('bymonth').value;
    var tablebody = document.getElementById('tablebody');
    var tr = document.getElementsByTagName('tr');
    for (var i=1 ;i<tr.length-1 ;i++) 
    {
      var td10 = tr[i].getElementsByTagName('td')[10];
      if (td10) 
      {
        var textvalue10 = td10.textContent || td10.innerHTML;
        if (textvalue10.indexOf(bymonth)>-1)  
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
      for (var k=1 ;k<tr.length-1 ;k++) 
      {
        if (tr[k].style.display=="none") 
        {

        }
        else
        {
          j+=1;
        }
      }
      document.getElementById('totalrecord').innerHTML=j;
  </script>

  <script>

    function selectallchecks() 
    {
      var selectall = document.getElementById('selectall');
      var checkshow = document.getElementsByClassName('checkshow');
      
      var byvoucherno = document.getElementById('byvoucherno').value.toUpperCase(); 
      var byrollno = document.getElementById('byrollno').value; 
      var byname = document.getElementById('byname').value.toUpperCase();
      var byclass = document.getElementById('byclass').value.toUpperCase();
      var bygroup = document.getElementById('bygroup').value.toUpperCase();
      var byalreadypaid = document.getElementById('byalreadypaid').value;
      var byfeepaid = document.getElementById('byfeepaid').value;
      var bybalance = document.getElementById('bybalance').value;
      var bystatus = document.getElementById('bystatus').value;
      var bymonth = document.getElementById('bymonth').value;

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
        var td10 = tr[i].getElementsByTagName('td')[10];
        if (td0 && td1 && td2 && td3 && td4 && td5 && td6 && td7 && td8 && td9 && td10) 
        {
          var textvalue1 = td1.textContent || td1.innerHTML;
          var textvalue2 = td2.textContent || td2.innerHTML;
          var textvalue3 = td3.textContent || td3.innerHTML;
          var textvalue4 = td4.textContent || td4.innerHTML;
          var textvalue5 = td5.textContent || td5.innerHTML;
          var textvalue6 = td6.textContent || td6.innerHTML;
          var textvalue7 = td7.textContent || td7.innerHTML;
          var textvalue8 = td8.textContent || td8.innerHTML;
          var textvalue9 = td9.textContent || td9.innerHTML;
          var textvalue10 = td10.textContent || td10.innerHTML;
          if (selectall.checked)
          {
            if ((textvalue1.toUpperCase().indexOf(byvoucherno)>-1)&&(textvalue2.toUpperCase().indexOf(byrollno)>-1)&&(textvalue3.toUpperCase().indexOf(byname)>-1)&&(textvalue4.toUpperCase().indexOf(byclass)>-1)&&(textvalue5.toUpperCase().indexOf(bygroup)>-1)&&(textvalue6.toUpperCase().indexOf(byalreadypaid)>-1)&&(textvalue7.toUpperCase().indexOf(byfeepaid)>-1)&&(textvalue8.toUpperCase().indexOf(bybalance)>-1)&&(textvalue9.indexOf(bystatus)>-1)&&(textvalue10.indexOf(bymonth)>-1))  
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
      var printvouchermonth = document.getElementById('printvouchermonth');
      
  
      var deleteallbtn = document.getElementById('deleteallbtn');
      var checkshow = document.getElementsByClassName('checkshow');
      var voucherids ="";
      var printchecks = document.getElementsByClassName('printchecks');
      j=0
      for (var i = 0 ; i <checkshow.length ; i++) 
      {
        if (checkshow[i].checked) 
        {
          voucherids = voucherids+checkshow[i].value+'_';
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
      linkofdelete.href  = "deleteallvoucher.php?id="+voucherids;
    }
    function filter() 
    {
      var byvoucherno = document.getElementById('byvoucherno').value.toUpperCase(); 
      var byrollno = document.getElementById('byrollno').value; 
      var byname = document.getElementById('byname').value.toUpperCase();
      var byclass = document.getElementById('byclass').value.toUpperCase();
      var bygroup = document.getElementById('bygroup').value.toUpperCase();
      var byalreadypaid = document.getElementById('byalreadypaid').value;
      var byfeepaid = document.getElementById('byfeepaid').value;
      var bybalance = document.getElementById('bybalance').value;
      var bystatus = document.getElementById('bystatus').value;
      var bymonth = document.getElementById('bymonth').value;

      var tablebody = document.getElementById('tablebody');
      var tr = document.getElementsByTagName('tr');
      for (var i=0 ;i<tr.length-1 ;i++) 
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
        var td10 = tr[i].getElementsByTagName('td')[10];
        if (td0 && td1 && td2 && td3 && td4 && td5 && td6 && td7 && td8 && td9 && td10) 
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
          var textvalue10 = td10.textContent || td10.innerHTML;
          if ((textvalue1.toUpperCase().indexOf(byvoucherno)>-1)&&(textvalue2.toUpperCase().indexOf(byrollno)>-1)&&(textvalue3.toUpperCase().indexOf(byname)>-1)&&(textvalue4.toUpperCase().indexOf(byclass)>-1)&&(textvalue5.toUpperCase().indexOf(bygroup)>-1)&&(textvalue6.toUpperCase().indexOf(byalreadypaid)>-1)&&(textvalue7.toUpperCase().indexOf(byfeepaid)>-1)&&(textvalue8.toUpperCase().indexOf(bybalance)>-1)&&(textvalue9.indexOf(bystatus)>-1)&&(textvalue10.indexOf(bymonth)>-1))  
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
