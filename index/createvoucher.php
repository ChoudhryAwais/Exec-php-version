<?php
require "profileinfo.php";
require 'connectdatabase.php';
// count of student exist in student list
$countfeestudent ="SELECT COUNT(StudentId) as countfeestudent
                    FROM studentlist
                    WHERE CampusId='$CampusId'";
$query7 = mysqli_query($conn,$countfeestudent);
$countfeestudent = mysqli_fetch_array($query7);
$countofstudent=$countfeestudent['countfeestudent']; //scalar value (no of student)
// ends

// get student from student list
$noofstudent = "SELECT *
				FROM studentlist
				WHERE CampusId = '$CampusId' AND IsActive = 'Yes';
				";
$query = mysqli_query($conn,$noofstudent);
// ends

$months = date('F'); //current month in character

$i=0; //conuter for check existing fee voucher
$month = date('m'); //current month in scalar
$year = date('Y'); // current year in scalar
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

// loop start for creating voucher of student
while ($row = mysqli_fetch_assoc($query)) 
{
	$voucherarray = array(); //empty array for voucher no
	// count the exsiting fee voucher
	$countfeevoucher ="SELECT COUNT(FeeVoucherId) as countfeevoucher
                    FROM feedetails
                    WHERE CampusId='$CampusId'";
	$query7 = mysqli_query($conn,$countfeevoucher);
	$countfeevoucher = mysqli_fetch_array($query7);
	$nooffeevoucher=$countfeevoucher['countfeevoucher']; //no of feevoucher

	if ($nooffeevoucher==0) 
    {
      $voucherno = 1; 
    }
    else
    {
      // get voucher no
      $maxfeevoucher ="SELECT VoucherNo
                    FROM feedetails
                    WHERE CampusId='$CampusId'";
      $query7 = mysqli_query($conn,$maxfeevoucher);
      while ($row2= mysqli_fetch_assoc($query7)) 
      {
      	$voucherarray[]=$row2['VoucherNo']; //put all voucher in an array
      }
      $lastid=($voucherarray[count($voucherarray)-1]); //last feevouhcer 
      $lastidarray =preg_split('/RVF/',$lastid); //separate number and string
      $lastidnum = $lastidarray[0]; //last num
      $voucherno = $lastidnum +1; // increment by 1
    }
    $voucherno = $voucherno.'RVF'; //concatenate with string
    
    // details of a single student :-

	$CampusId = $row['CampusId'];
	$rollno = $row['Roll_No'];
	$sname = $row['First_Name'];
	$sfname = $row['Last_Name'];

	$admissionfee = $row['Admission_Fee'];
	$admissiondiscount = $row['Admission_Discount'];
	$admissiontotal = $row['Admission_Total'];
	$tuitionfee = $row['Tuition_Fee'];
	$tuitiondiscount = $row['Tuition_Discount'];
	$tuitiontotal = $row['Tuition_Total']; 
	$specialfee = $row['Special_Fee'];
	$specialdiscount = $row['Special_Discount'];
	$specialtotal = $row['Special_Total'];
	$actualfee = $row['Actual_Fee'];
	$totaldiscount = $row['Total_discount'];
	$totalfee = $row['Total_Fee'];
	$discountpackage = $row['DiscountPackage'];


	$balance = $row['Total_Fee'];
	$classes = $row['Class'];
	$groups = $row['Groups'];
	$batch = $row['Batch'];
	$board = $row['Board_Uni_School'];
	$subjects = $row['Subjects'];
	$status = $row['Status'];
	//ends


	$ispaid = "Unpaid"; 
	$outstandingamount = 0;

	$currentdate = date('d/m/Y');

	// check that this student voucher is exsit already or not
	$testforexsitingvoucher ="SELECT VoucherNo
                    FROM feedetails
                    WHERE CampusId='$CampusId' AND StudentRollNo ='$rollno' AND Month = '$months'";
	$query1 = mysqli_query($conn,$testforexsitingvoucher);
	$testforexsitingvoucher = mysqli_fetch_array($query1);


	if (empty($testforexsitingvoucher)) //Enter if not exsit
	{
		// no of voucher for a specific student
		$checkforvoucher="	SELECT COUNT(StudentRollNo) as nooffeevouchers
                    		FROM feedetails
		                    WHERE CampusId='$CampusId' AND StudentRollNo ='$rollno'
		                ";
		$query4 = mysqli_query($conn,$checkforvoucher);
		$nooffeevouchers = mysqli_fetch_assoc($query4);
		$no_of_feevouchers = $nooffeevouchers['nooffeevouchers']; //no of voucher of a specific student
		
		if ($no_of_feevouchers>0) //if exist subtract the admission amount
		{
			$balance = $row['Total_Fee']-$row['Admission_Total'];
			$actualfee = $actualfee-$admissionfee;
			$totaldiscount = $totaldiscount - $admissiondiscount;
			$totalfee = $totalfee -$admissiontotal;
			$admissionfee=0;
			$admissiondiscount=0;
			$admissiontotal=0;	
		}

		//get the balance and voucher no  and status of student
		$balanceofstudent ="SELECT Balance,VoucherNo,IsPaid
						FROM feedetails
						WHERE CampusId='$CampusId' AND StudentRollNo='$rollno'
						";
		$query2 = mysqli_query($conn,$balanceofstudent);

		if (mysqli_num_rows($query2)>0) 
		{
			while ($row1 = mysqli_fetch_assoc($query2)) 
			{
				if ($row1['Balance']>0) 
				{
					$outstandingamount = $row1['Balance']+0;  //previous amount of a student
					$VoucherNo = $row1['VoucherNo'];
					$balanceofstudenttozero="UPDATE feedetails 
										 SET Balance='0',IsPaid='C/F' 
										 WHERE VoucherNo='$VoucherNo'
										 ";	
					$query3= mysqli_query($conn,$balanceofstudenttozero);
				}
			}
		}

		// Now finally create the fee voucher of a student
		$createfeevoucher ="INSERT INTO feedetails
						(
							CampusId,
							StudentRollNo,
							StudentName,
							Balance,
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
							OutStandingAmount,
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
							FatherName
						) 
						VALUES
						(
							'$CampusId',
							'$rollno',
							'$sname',
							'$balance'+'$outstandingamount',
							'$months',
							'$voucherno',
							'$classes',
							'$groups',
							'$board',
							'$subjects',
							'$batch',
							'$ispaid',
							'2',
							'$daysinmonth',
							'$outstandingamount',
							'$admissionfee',
							'$admissiondiscount',
							'$admissiontotal',
							'$tuitionfee',
							'$tuitiondiscount',
							'$tuitiontotal',
							'$specialfee',
							'$specialdiscount',
							'$specialtotal',
							'$actualfee',
							'$totaldiscount',
							'$totalfee',
							'$discountpackage',
							'$currentdate',
							'$status',
							'$sfname'
						)
						";
		if (mysqli_query($conn,$createfeevoucher)) 
		{
			
		}
		else
		{
			
		}
	}
	else
	{
		$i+=1;
	}	
}
if ($i==$countofstudent) 
{
	header('Location:viewfeevoucher.php?createvoucher=alreadyexist');
}
else
{
	header('Location:viewfeevoucher.php?createvoucher=success');
}
?>