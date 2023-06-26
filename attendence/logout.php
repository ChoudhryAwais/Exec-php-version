<?php
session_start();
if (!isset($_SESSION['CampusIds'])) 
{
	session_unset();
	session_destroy();
	header('Location:../attendence.php');
}
?>