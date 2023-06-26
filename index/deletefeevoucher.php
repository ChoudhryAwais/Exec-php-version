<?php
	$idoffeevoucher = $_GET['id'];
	require 'connectdatabase.php';
	$deletefeevoucher = "DELETE FROM feedetails WHERE FeeVoucherId = '$idoffeevoucher'";
	$query = mysqli_query($conn,$deletefeevoucher);
	header('Location:viewfeevoucher.php?delete=success')
?>