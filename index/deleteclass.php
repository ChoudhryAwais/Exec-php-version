<?php
	$idofclasses = $_GET['id'];
	require 'connectdatabase.php';
	require 'profileinfo.php';
	$classesname="SELECT ClassesName
				  FROM classes 
				  WHERE ClassesId='$idofclasses'";
	$query3 = mysqli_query($conn,$classesname);
	$classesName = mysqli_fetch_array($query3);
	$classes_actual_name = $classesName['ClassesName'];

	$groupsname="SELECT DISTINCT(GroupsName)
					 FROM groups 
					 WHERE DisciplineName='$discipline_actual_name'";
	$query4 = mysqli_query($conn,$groupsname);


	$deleteclasses = "DELETE FROM classes WHERE ClassesId = '$idofclasses'";
	$deleteclassesfromgroup = "DELETE FROM groups WHERE ClassesName = '$classes_actual_name' AND CampusId='$CampusId'";
	$deleteclassesfromboards = "DELETE FROM boards WHERE ClassesName = '$classes_actual_name' AND CampusId='$CampusId'";
	$deleteclassesfromsubjects = "DELETE FROM subjects WHERE ClassesName = '$classes_actual_name' AND CampusId='$CampusId'";
	$deletegroupsfromfee = "DELETE FROM feestructure WHERE Groups = '$groups_actual_name'";

	while ($row=mysqli_fetch_assoc($query4)) 
	{
		$groups_actual_name=$row['GroupsName'];
		$deletegroupsfromfee = "DELETE FROM feestructure WHERE Groups ='$groups_actual_name'";	
		$query2 = mysqli_query($conn,$deletegroupsfromfee);
	}

	$query = mysqli_query($conn,$deleteclasses)&& mysqli_query($conn,$deleteclassesfromgroup)&& mysqli_query($conn,$deleteclassesfromboards)&& mysqli_query($conn,$deleteclassesfromsubjects)&& mysqli_query($conn,$deletegroupsfromfee);
	header('Location:viewclass.php?delete=success')
?>