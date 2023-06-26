<?php
  require 'profileinfo.php';
?>



<!DOCTYPE html>
<html>
<head>
   <title>Manage Account</title>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">


   <!-- Custom fonts for this template-->
   <link href="vendor/fontawesome-free/css/all.min.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
   <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
   <link rel="shortcut icon" type="image/x-icon" href="<?php echo $TitleLogo?>">

   <!-- Custom styles for this template-->
   <link href="css/sb-admin-2.min.css?v=<?php echo time(); ?>" rel="stylesheet">
   <link href="css/bootstrap.min.css?v=<?php echo time(); ?>" rel="stylesheet">
   <link href="responsive/responsive.css?v=<?php echo time(); ?>" rel="stylesheet">

   <script src="js/jquery-3.5.0.min.js"></script>
   <script src="js/sweetalert2.all.min.js"></script>

 

</head>


<?php
	if (isset($_POST['submit'])) 
	{
		$InstitudeName = htmlspecialchars(ucwords($_POST['InstitudeName']));
		$CampusName = htmlspecialchars(ucwords($_POST['CampusName']));
		$PrincipleName = htmlspecialchars(ucwords($_POST['PrincipleName']));
		$InstitudeEmail = htmlspecialchars(strtolower($_POST['InstitudeEmail']));
		$InstitudeAddmissionNum = $_POST['InstitudeAddmissionNum'];
		$InstitudeExamsNum = htmlspecialchars($_POST['InstitudeExamsNum']);
		$InstitudeAccountsNum = htmlspecialchars($_POST['InstitudeAccountsNum']);
		$InstitudeOtherNum = htmlspecialchars($_POST['InstitudeOtherNum']);
		$InstitudeAddress = htmlspecialchars($_POST['InstitudeAddress']);
		$InstitudeState = $_POST['InstitudeState'];
		$InstitudeCity = $_POST['InstitudeCity'];
		$InstitudeFacebook = htmlspecialchars($_POST['InstitudeFacebook']);
		$InstitudeInstagram = htmlspecialchars($_POST['InstitudeInstagram']);
		$InstitudeWhatsappNum = htmlspecialchars($_POST['InstitudeWhatsappNum']);

		$Logo = $_FILES['Logo'];
		$TitleLogo = $_FILES['Logo'];
		$LogoName = $_FILES['Logo']['name'];
		$LogoTmpName = $_FILES['Logo']['tmp_name'];
		$LogoSize = $_FILES['Logo']['size'];
		$LogoError = $_FILES['Logo']['error'];
		$LogoType = $_FILES['Logo']['type'];
		$logofileExt = explode('.', $LogoName);
		$logofileActualName = $logofileExt[0];
		$logofileActualExt = strtolower(end($logofileExt));

		$TitleLogoName = $_FILES['TitleLogo']['name'];
		$TitleLogoTmpName = $_FILES['TitleLogo']['tmp_name'];
		$TitleLogoSize = $_FILES['TitleLogo']['size'];
		$TitleLogoError = $_FILES['TitleLogo']['error'];
		$TitleLogoType = $_FILES['TitleLogo']['type'];
		$titlelogofileExt = explode('.', $TitleLogoName);
		$titlelogofileActualName = $titlelogofileExt[0];
		$titlelogofileActualExt = strtolower(end($titlelogofileExt));

		$allowed = array("jpg","jpeg","png");
		if ((in_array($titlelogofileActualExt, $allowed))&&(in_array($titlelogofileActualExt, $allowed))) 
		{
			if ($LogoError==0 && $TitleLogoError==0) 
			{
				// $fileNameNew = $fileName;
				$logofileNameNew = uniqid(true).".".$logofileActualExt;
				$logofileDestination = 'logo/'.$logofileNameNew;

				$titlelogofileNameNew = uniqid(true).".".$titlelogofileActualExt;
				$titlelogofileDestination = 'title/'.$titlelogofileNameNew;
				move_uploaded_file($LogoTmpName, $logofileDestination);
				move_uploaded_file($TitleLogoTmpName, $titlelogofileDestination);

				$sql = "UPDATE profile 
						SET InstitudeName='$InstitudeName',CampusName='$CampusName',PrincipleName='$PrincipleName',Logo='$logofileDestination',InstitudeEmail='$InstitudeEmail',InstitudeAddmissionNum='$InstitudeAddmissionNum',
							InstitudeAccountsNum='$InstitudeAccountsNum',InstitudeOtherNum='$InstitudeOtherNum',
							InstitudeExamsNum='$InstitudeExamsNum',InstitudeAddress='$InstitudeAddress',
							InstitudeState='$InstitudeState',InstitudeCity='$InstitudeCity',InstitudeFacebook='$InstitudeFacebook',InstitudeInstagram='$InstitudeInstagram',InstitudeWhatsappNum='$InstitudeWhatsappNum',TitleLogo= '$titlelogofileDestination'	 
						WHERE CampusId = '$CampusId'
						";
				if (mysqli_query($conn, $sql)) 
				{
				   	echo '
				   	 <input type="hidden" name = "raw">
				   	 <script>
				   	 	Swal.fire("PROFILE UPDATED!", "OK, To Continue!", "success")
				   	 </script>
				   	 ';
									    
				} else {
				    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}

			}
			else
			{
				
			}
			
		}
		else
		{
			
		}

			
		// echo $LogoName;echo "<br>";
		// echo $LogoTmpName;echo "<br>";
		// echo $LogoSize;echo "<br>";
		// echo $LogoError;echo "<br>";
		// echo $LogoType;echo "<br>";
		// echo $InstitudeName;
		// echo $CampusName;	
		// echo $PrincipleName;
		// echo $InstitudeEmail;
		// echo $InstitudeAddmissionNum;
		// echo $InstitudeExamsNum;
		// echo $InstitudeAccountsNum;
		// echo $InstitudeOtherNum;
		// echo $InstitudeCity;
		// echo $InstitudeState;echo "<br>";
		// print_r($Logo);
	}
?>


<body id="page-top">
  	<!-- Page Wrapper -->
  	<div id="wrapper">

  		<?php
      		require 'sidenavigation.php';
    	?>
	    <!-- Content Wrapper -->
  		<div id="content-wrapper" class="d-flex flex-column">

  			<!-- Main Content -->
      		<div id="content">

      			<!-- Begin Page Content -->
       			<div class="container-fluid">

       				<!--heading -->
       				<div class="row">
       					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 text-dark text-center p-1 h5" style="border-radius: 0px 0px 80px 80px;">
	       						<div class="text-white" style="box-shadow: 1px 1px 2px black;border-radius: 0px 0px 50px 50px;background-color: #0047AB">Campus Profile</div>
	       				</div>
       				</div>
       				<div class="row mt-4">
       					<div class="col-xl-12 mb-5">
       						<div class="container mb-5" style="background-color:#F5F5F5;box-shadow: 1px 3px 10px;border-radius: 5px;border:1px solid black">
       							<form class="form-group needs-validation" action="" enctype="multipart/form-data" method="post" novalidate onsubmit="return logocheck()">
       								<div class="row">
       									<div class="col-xl-12 p-1 text-center mt-2 font-weight-bold h6 text-uppercase" style="color:white;background-color: #323E6F; ">
       										Basic Details
       									</div>
       								</div>
	       							<div class="row">
	       								<div class="col-xl-4 col-md-6 mt-1">
	       									<label for="InstitudeName" class="pl-1 font-weight-bold" style="font-size:13px">Institude Name :</label>
	       									<input type="text" name="InstitudeName" class="form-control form-control-sm" placeholder="Institude Full Name" required id="InstitudeName" value="<?php echo$InstitudeName?>">	
	       								</div>
	       								<div class="col-xl-4 col-md-6 mt-1">
	       									<label for="CampusName" class="pl-1 font-weight-bold" style="font-size:13px">Campus Name :</label>
	       									<input type="text" name="CampusName" class="form-control form-control-sm" placeholder="Campus Name" required id="CampusName" value="<?php echo$CampusName?>">
	       								</div>
	       								<div class="col-xl-4 col-md-6 mt-1">
	       									<label for="PrincipleName" class="pl-1 font-weight-bold" style="font-size:13px">Principle Name :</label>
	       									<input type="text" name="PrincipleName" class="form-control form-control-sm" placeholder="Principle Name" required id="PrincipleName" value="<?php echo$PrincipleName?>">
	       								</div>
	       							</div>
	       							<div class="row mt-1">
	       								<div class="col-xl-6 col-md-6 mt-1 border p-3">
	       									<label class="font-weight-bold">Logo / Picture :</label>
	       									<input type="file" name="Logo" class="form-control-file" required value="<?php echo$Logo?>" id="logo">
        									<div class="invalid-feedback">Select your Logo.</div>	
	       								</div>
	       								<div class="col-xl-6 col-md-6 mt-1 border p-3">
	       									<label class="font-weight-bold">Title Logo / Picture :</label>
	       									<input type="file" name="TitleLogo" class="form-control-file" required value="<?php echo$TitleLogo?>" id="titlelogo">
        									<div class="invalid-feedback">Select your Title Logo.</div>	
	       								</div>
	       							</div>
	       							<div class="row mt-1">
       									<div class="col-xl-12 p-1 text-center mt-2 font-weight-bold h6 text-uppercase" style="color:white;background-color: #323E6F; ">
       										Contact Details
       									</div>
       								</div>
       								<div class="row">
	       								<div class="col-xl-4 col-md-6 mt-1">
	       									<label for="Email" class="pl-1 font-weight-bold" style="font-size:13px">Email :</label>
	       									<input type="text" name="InstitudeEmail" class="form-control form-control-sm" placeholder="Email" id="InstitudeEmail" required value="<?php echo$InstitudeEmail?>">	
	       								</div>
	       								<div class="col-xl-4 col-md-6 mt-1">
	       									<label for="AdmissionDepartment" class="pl-1 font-weight-bold" style="font-size:13px">Admission Department :</label>
	       									<input type="text" name="InstitudeAddmissionNum" class="form-control form-control-sm" placeholder="Admission Department" id="InstitudeAddmissionNum" required value="<?php echo$InstitudeAddmissionNum?>">
	       								</div>
	       								<div class="col-xl-4 col-md-6 mt-1">
	       									<label for="ExamsDepartment" class="pl-1 font-weight-bold" style="font-size:13px">Exams Department :</label>
	       									<input type="text" name="InstitudeExamsNum" class="form-control form-control-sm" placeholder="Exams Department" value="<?php echo$InstitudeExamsNum?>">
	       								</div>
	       							</div>
	       							<div class="row">
	       								<div class="col-xl-4 col-md-6 mt-1">
	       									<label for="AccountsDepartment" class="pl-1 font-weight-bold" style="font-size:13px">Accounts Department :</label>
	       									<input type="text" name="InstitudeAccountsNum" class="form-control form-control-sm" placeholder="Accounts Department" value="<?php echo$InstitudeAccountsNum?>">
	       								</div>
	       								<div class="col-xl-4 col-md-6 mt-1">
	       									<label for="Other" class="pl-1 font-weight-bold" style="font-size:13px">Other :</label>
	       									<input type="text" name="InstitudeOtherNum" class="form-control form-control-sm" placeholder="Other Number" value="<?php echo$InstitudeOtherNum?>">
	       								</div>
	       							</div>
	       							<div class="row mt-2">
       									<div class="col-xl-12 p-1 text-center mt-2 font-weight-bold h6 text-uppercase" style="background-color: #323E6F;color:white">
       										Address Details
       									</div>
       								</div>
       								<div class="row">
	       								<div class="col-xl-4 col-md-6 mt-1">
	       									<label for="Address" class="pl-1 font-weight-bold" style="font-size:13px">Address :</label>
	       									<input type="text" name="InstitudeAddress" class="form-control form-control-sm" placeholder="Address" id="InstitudeAddress" required  value="<?php echo$InstitudeAddress?>">
	       								</div>
	       								<div class="col-xl-4 col-md-6 mt-1">
	       									<label for="State" class="pl-1 font-weight-bold" style="font-size:13px">State :</label>
	       									<select class="form-control form-control-sm" name="InstitudeState" id="InstitudeState" required>
	       										<option class="bg-secondary text-white"  value="<?php echo$InstitudeState?>" selected><?php echo$InstitudeState?></option>
	       										<option value="Punjab">Punjab</option>
	       									</select>
	       								</div>
	       								<div class="col-xl-4 col-md-6 mt-1">
	       									<label for="City" class="pl-1 font-weight-bold" style="font-size:13px">City :</label>
	       									<select class="form-control form-control-sm" name="InstitudeCity" id="InstitudeCity" required>
	       										<option class="bg-secondary text-white"  value="<?php echo$InstitudeCity?>" selected><?php echo$InstitudeCity?></option>
	       										<option value="Ahmadpur">Ahmadpur</option>
	       										<option value="Alipur">Alipur</option>
	       										<option value="Bahawalpur">Bahawalpur</option>
	       										<option value="Faislabad">Faislabad</option>	
	       										<option value="Islamabad">Islamabad</option>
	       										<option value="Karachi">Karachi</option>
	       										<option value="Lahore">Lahore</option>
	       										<option value="Multan">Multan</option>
	       										<option value="Lahore">Lahore</option>
	       										<option value="Rawalpindi">Rawalpindi</option>
	       									</select>
	       								</div>
	       							</div>
	       							<div class="row mt-2">
       									<div class="col-xl-12 p-1 text-center mt-2 font-weight-bold h6 text-uppercase" style="color:white;background-color: #323E6F; ">
       										Social Media Accounts
       									</div>
       								</div>
       								<div class="row">
	       								<div class="col-xl-4 col-md-6 mt-1">
	       									<label for="InstitudeFacebook" class="pl-1 font-weight-bold" style="font-size:13px">Facebook :</label>
	       									<input type="text" name="InstitudeFacebook" class="form-control form-control-sm" placeholder="Facebook" id="InstitudeFacebook" required value="<?php echo$InstitudeFacebook?>">	
	       								</div>
	       								<div class="col-xl-4 col-md-6 mt-1">
	       									<label for="InstitudeInstagram" class="pl-1 font-weight-bold" style="font-size:13px">Instagram :</label>
	       									<input type="text" name="InstitudeInstagram" class="form-control form-control-sm" placeholder="Instagram" id="InstitudeInstagram" required value="<?php echo$InstitudeInstagram?>">
	       								</div>
	       								<div class="col-xl-4 col-md-6 mt-1">
	       									<label for="InstitudeWhatsappNum" class="pl-1 font-weight-bold" style="font-size:13px">Whatsapp Number :</label>
	       									<input type="text" name="InstitudeWhatsappNum" class="form-control form-control-sm" placeholder="Whatsapp Number" id="InstitudeWhatsappNum" required value="<?php echo$InstitudeWhatsappNum?>">	
	       								</div>
	       							</div>
	       							<br>
	       							<br>
	       							<hr>
	       							<div class="row">
	       								<div class="col-xl-12 col-md-6 text-center">
	       									<button class="btn btn-sm btn-success" type="submit" name="submit"><i class="fas fa-check pr-2"></i>Update</button>
	       									<button type="Reset" name="reset" class="btn btn-sm btn-warning"><i class="fas fa-reply-all pr-2"></i>Reset</button>
	       									<a href="dashboard.php" class="btn btn-sm btn-danger"><i class="fas fa-times pr-2"></i>Cancel</a>
	       								</div>
	       							</div>
       							</form>
       						</div>
       					</div>
       				</div>

       			</div>

      		</div>

  		</div>



  	</div>







<!-- For Form validation starts -->
	<script>
	// Disable form submissions if there are invalid fields
	(function() {
	  'use strict';
	  window.addEventListener('load', function() {
	    // Get the forms we want to add validation styles to
	    var forms = document.getElementsByClassName('needs-validation');
	    // Loop over them and prevent submission
	    var validation = Array.prototype.filter.call(forms, function(form) {
	      form.addEventListener('submit', function(event) {
	        if (form.checkValidity() === false) {
	          event.preventDefault();
	          event.stopPropagation();
	        }
	        form.classList.add('was-validated');
	      }, false);
	    });
	  }, false);
	})();
	</script>

<!-- Form Validaiton ends -->

<!-- Logo check -->
<script>
	function logocheck()
	{
		var Logo = document.getElementById('logo');
		var TitleLogo = document.getElementById('titlelogo');
		var logofilePath = Logo.value;
		var titlelogofilePath = TitleLogo.value;
		var allowedextension = /(\.jpg|\.jpeg|\.png)$/i;
		if ((!allowedextension.exec(logofilePath))||(!allowedextension.exec(titlelogofilePath))) 
		{
			Swal.fire("Error", "Image Format Not Found", "error");
			Logo.value = '';
			TitleLogo.value = '';
			return false;
		}
		else
		{
			return true;
		}
	}
</script>
<!-- logo check -->











  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

 
</body>




</html>