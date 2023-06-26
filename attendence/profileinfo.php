<?php
  require 'sessionstart.php';
?>
<?php
  require "connectdatabase.php";
  $profile = "SELECT * 
        FROM profile
        WHERE CampusId = '$CampusId'
        ";

  $query = mysqli_query($conn,$profile);
  $profileinfo = mysqli_fetch_array($query);
  $InstitudeName = $profileinfo['InstitudeName'];
  $CampusName = $profileinfo['CampusName'];
  $PrincipleName = $profileinfo['PrincipleName'];
  $Logo = $profileinfo['Logo'];
  $TitleLogo = $profileinfo['TitleLogo'];
  $InstitudeEmail = $profileinfo['InstitudeEmail'];
  $InstitudeAddmissionNum = $profileinfo['InstitudeAddmissionNum'];
  $InstitudeExamsNum = $profileinfo['InstitudeExamsNum'];
  $InstitudeAccountsNum = $profileinfo['InstitudeAccountsNum'];
  $InstitudeOtherNum = $profileinfo['InstitudeOtherNum'];
  $InstitudeAddress = $profileinfo['InstitudeAddress'];
  $InstitudeState = $profileinfo['InstitudeState'];
  $InstitudeCity = $profileinfo['InstitudeCity'];
  $InstitudeFacebook = $profileinfo['InstitudeFacebook'];
  $InstitudeInstagram = $profileinfo['InstitudeInstagram'];
  $InstitudeWhatsappNum = $profileinfo['InstitudeWhatsappNum'];
?>