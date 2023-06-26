<?php
	$idofvouchers = $_GET['id'];
	$idofvouchers = explode('_',$idofvouchers);
	require 'connectdatabase.php';
	foreach ($idofvouchers as $vouchersid) 
	{
		if (!empty($vouchersid)) 
		{
			$deletevouchers = "DELETE FROM feedetails WHERE FeeVoucherId ='$vouchersid' ";
			$query = mysqli_query($conn,$deletevouchers);
		}
	}
	header('Location:viewfeevoucher.php?delete=success');
?>