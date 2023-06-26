<?php
	$idofstudents = $_GET['id'];
	$idofstudents = explode('_',$idofstudents);
	require 'connectdatabase.php';
	require "profileinfo.php";
	foreach ($idofstudents as $studentid) 
	{
		if (!empty($studentid)) 
		{
			$idofstudent ="SELECT Roll_No
				 FROM studentlist 
			     WHERE StudentId='$studentid'";
			$query3 = mysqli_query($conn,$idofstudent);
			$studentsid = mysqli_fetch_array($query3);
			$studentrollno = $studentsid['Roll_No'];
			$deletestudent = "DELETE FROM studentlist WHERE StudentId ='$studentid' ";
			$deletestudentfromfeevoucher = "DELETE FROM feedetails WHERE StudentRollNo = '$studentrollno' AND CampusId='$CampusId'";
			$query = mysqli_query($conn,$deletestudent) && mysqli_query($conn,$deletestudentfromfeevoucher);
		}
	}
	header('Location:viewstudent.php?delete=success');
?>