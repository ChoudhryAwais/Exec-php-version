<?php
  session_start();
  if (!isset($_SESSION['CampusId'])) 
  {
   header('Location:../index.php');
  }
  $CampusId = $_SESSION['CampusId'];
  $datentime = $_SESSION['date'];
  
?>