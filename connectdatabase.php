<?php
$hostname  ="localhost";
$username = "root";
$password = "";
$database = "software";
 
// Connect with database
$conn = mysqli_connect($hostname,$username,$password,$database);
if (!$conn) 
{
	echo("Connection failed: " . mysqli_connect_error());
}
?>