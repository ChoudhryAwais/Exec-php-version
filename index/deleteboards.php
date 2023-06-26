<?php
	$idofboards = $_GET['id'];
	require 'connectdatabase.php';
	require 'profileinfo.php';
	$boardsname="SELECT GroupsName,ClassesName,BoardsName
						 FROM boards 
						 WHERE BoardsId='$idofboards'";
	$query3 = mysqli_query($conn,$boardsname);
	$boardsName = mysqli_fetch_array($query3);
	$groups_actual_name = $boardsName['GroupsName'];
	$classes_actual_name = $boardsName['ClassesName'];
	$boards_actual_name = $boardsName['BoardsName'];

	$deleteboards = "DELETE FROM boards WHERE BoardsId = '$idofboards'";
	$deleteboardsfromsubjects = "DELETE FROM subjects WHERE GroupsName = '$groups_actual_name' AND ClassesName ='$classes_actual_name' AND BoardsName = '$boards_actual_name' AND CampusId='$CampusId'";
	$query = mysqli_query($conn,$deleteboards)&&mysqli_query($conn,$deleteboardsfromsubjects);
	header("Location:viewboards.php?delete=success");
?>