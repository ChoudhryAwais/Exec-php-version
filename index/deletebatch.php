<?php
	$idofbatch = $_GET['id'];
	require 'connectdatabase.php';
	$deletebatch = "DELETE FROM batch WHERE BatchId = '$idofbatch'";
	$query = mysqli_query($conn,$deletebatch);
	header('Location:viewbatch.php?delete=success')
?>