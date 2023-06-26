<?php
	$idofinquiry = $_GET['id'];
	require 'connectdatabase.php';
	$deleteinquiry = "DELETE FROM inquirylist WHERE InquiryId = '$idofinquiry'";
	$query = mysqli_query($conn,$deleteinquiry);
	header('Location:viewinquiry.php?delete=success')
?>