<?php
	$idofemployees = $_GET['id'];
	$idofemployees = explode('_',$idofemployees);
	require 'connectdatabase.php';
	foreach ($idofemployees as $employeeid) 
	{
		if (!empty($employeeid)) 
		{
			$deleteemployee = "DELETE FROM employeelist WHERE EmployeeId ='$employeeid'";
			$query = mysqli_query($conn,$deleteemployee);
		}
	}
	header('Location:viewemployee.php?delete=success');
?>