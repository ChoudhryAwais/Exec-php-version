<?php
	$idofgroups = $_GET['id'];
	require 'connectdatabase.php';
	require 'profileinfo.php';
	$groupsname="SELECT GroupsName,ClassesName
						 FROM groups 
						 WHERE GroupsId='$idofgroups'";
	$query3 = mysqli_query($conn,$groupsname);
	$groupsName = mysqli_fetch_array($query3);
	$groups_actual_name = $groupsName['GroupsName'];
	$classes_actual_name = $groupsName['ClassesName'];


	$deletegroups = "DELETE FROM groups WHERE GroupsId = '$idofgroups'";
	$deletegroupsfromboard = "DELETE FROM boards WHERE GroupsName = '$groups_actual_name' AND ClassesName ='$classes_actual_name' AND CampusId='$CampusId'";
	$deletegroupsfromsubjects = "DELETE FROM subjects WHERE GroupsName = '$groups_actual_name' AND ClassesName ='$classes_actual_name' AND CampusId='$CampusId'";
	$deletegroupsfromfee = "DELETE FROM feestructure WHERE Groups = '$groups_actual_name'";
	$query = mysqli_query($conn,$deletegroups)&&mysqli_query($conn,$deletegroupsfromboard)&&mysqli_query($conn,$deletegroupsfromsubjects)&&mysqli_query($conn,$deletegroupsfromfee);
	header('Location:viewgroups.php?delete=success')
?>