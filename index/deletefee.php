<?php
	$idoffee = $_GET['id'];
	require 'connectdatabase.php';
	$deletefee = "DELETE FROM feestructure WHERE FeeStructureId = '$idoffee'";
	$query = mysqli_query($conn,$deletefee);
	header('Location:viewfee.php?delete=success');
?>