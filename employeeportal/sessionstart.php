<?php
  session_start();
  if (!isset($_SESSION['CampusIdss'])) 
  {
   header('Location:../employeeportal.php');
  }
  $CampusId = $_SESSION['CampusIdss'];
  $Employeecode = $_SESSION['Employee_Code'];
  $datentime = $_SESSION['date'];
  
?>