<?php
  session_start();
  if (!isset($_SESSION['CampusIds'])) 
  {
   header('Location:../attendence.php');
  }
  $CampusId = $_SESSION['CampusIds'];
  $datentime = $_SESSION['date'];
  
?>