<?php
	$idofvoucherfootnotes = $_GET['id'];
	require 'connectdatabase.php';
	$deletevoucherfootnotes = "DELETE FROM voucherfootnotes WHERE VoucherFootNotesId = '$idofvoucherfootnotes'";
	$query = mysqli_query($conn,$deletevoucherfootnotes);
	header('Location:viewfeepolicy.php?delete=success')
?>