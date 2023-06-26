<?php
	$idofstudent = $_GET['id'];
	require 'connectdatabase.php';
	require "profileinfo.php";

	$studentid="SELECT Roll_No
				 FROM studentlist 
			     WHERE StudentId='$idofstudent'";
	$query3 = mysqli_query($conn,$studentid);
	$studentid = mysqli_fetch_array($query3);
	$studentrollno = $studentid['Roll_No'];

	$deletestudent = "DELETE FROM studentlist WHERE StudentId = '$idofstudent'";
	$deletestudentfromfeevoucher = "DELETE FROM feedetails WHERE StudentRollNo = '$studentrollno' AND CampusId=$CampusId";
	$query = mysqli_query($conn,$deletestudent) && mysqli_query($conn,$deletestudentfromfeevoucher);
	header('Location:viewstudent.php?delete=success')
?>