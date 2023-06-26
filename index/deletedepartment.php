<?php
	$idofdepartment = $_GET['id'];
	require 'connectdatabase.php';
	$deletedepartment = "DELETE FROM department WHERE DepartmentId = '$idofdepartment'";
	$query = mysqli_query($conn,$deletedepartment);
	header('Location:viewdepartment.php?delete=success')
?>