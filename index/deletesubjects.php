<?php
	$idofsubjects = $_GET['id'];
	require 'connectdatabase.php';
	$deletesubjects = "DELETE FROM subjects WHERE SubjectsId = '$idofsubjects'";
	$query = mysqli_query($conn,$deletesubjects);
	header('Location:viewsubjects.php?delete=success')
?>