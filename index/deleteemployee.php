<?php
	$idofemployee = $_GET['id'];
	require 'connectdatabase.php';
	$deleteemployee = "DELETE FROM employeelist WHERE EmployeeId = '$idofemployee'";
	$query = mysqli_query($conn,$deleteemployee);
	header('Location:viewemployee.php?delete=success')
?>