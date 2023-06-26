<?php
	$idofinquirys = $_GET['id'];
	$idofinquirys = explode('_',$idofinquirys);
	require 'connectdatabase.php';
	require "profileinfo.php";
	foreach ($idofinquirys as $inquiryid) 
	{
		if (!empty($inquiryid)) 
		{
			$deleteinquiry = "DELETE FROM inquirylist WHERE InquiryId ='$inquiryid' ";
			$query = mysqli_query($conn,$deleteinquiry);
		}
	}
	header('Location:viewinquiry.php?delete=success');
?>