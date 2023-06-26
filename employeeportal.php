<?php
    $validation = "";
	session_start();
	if (isset($_SESSION['CampusIdss'])) 
	{
	 header('Location:employeeportal/dashboard.php');
	}
	date_default_timezone_set('Asia/Karachi'); 
	if (isset($_POST['submitlogin'])) 
	{
		$campusid = $_POST['campusid'];
		$code = $_POST['code'];
		$pass = $_POST['pass'];
		require 'connectdatabase.php';
		$employee_login = "SELECT * 
						FROM employee_login
						WHERE CampusId = '$campusid' AND Employee_Code ='$code'
						";
		$query = mysqli_query($conn, $employee_login);
		$data = mysqli_fetch_array($query);
		$CampusId = $data['CampusId'];
		$Password = $data['Password'];
		if($Password==$pass)
		{	
			$date=date('h:i a, dFY');
			$_SESSION['date'] = $date;
			$_SESSION['CampusIdss'] = $CampusId;
			$_SESSION['Employee_Code'] = $code;
			header('Location:employeeportal/dashboard.php');
		}
		else
		{
			$validation="true";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Employee Portal</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/login.png"/ width="100%">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

	<script src="js/jquery-3.5.0.min.js"></script>
   	<script src="js/sweetalert2.all.min.js"></script>

</head>	
<?php
	if ($validation==true) 
	{
		echo '
			<input type="hidden">
			<script>
				Swal.fire( "Error" ,  "User Not found" ,  "error" );
			</script>
			';
	}
	else
	{

	}

?>
<body>
	
	<div class="limite">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="employeeportal.php" onsubmit="return logincheck()">
					<span class="login100-form-title p-b-20 text-uppercase" style="margin-top: -50px;">
						Login to Employee Portal
					</span>
					<div class="wrap-input100">
						<input class="input100" type="text" name="campusid" id="campusid">
						<span class="focus-input100"></span>
						<span class="label-input100">Campus ID</span>
					</div>
					<div class="pl-1 text-danger text-right" id="campusreq"></div>
					<div class="wrap-input100">
						<input class="input100" type="text" name="code" id="email">
						<span class="focus-input100"></span>
						<span class="label-input100">Employee Code</span>
					</div>
					<div class="pl-1 text-danger text-right" id="emailreq"></div>
					
					<div class="wrap-input100" id="passwordwrapper">
						<input class="input100" type="password" name="pass" id="password">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>
					<div class="pl-1 text-danger text-right" id="passwordreq"></div>

					<!-- <div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div> -->
			

					<div class="container-login100-form-btn">
						<input class="login100-form-btn" type="submit" name="submitlogin" value="login">
					</div>
					
					<div class="login100-form-social flex-c-m mt-4">
						<a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
							<i class="fa fa-facebook-f" aria-hidden="true"></i>
						</a>

						<a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</a>

					</div>
				</form>

				
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js?v=<?php echo time(); ?>"></script>
	<script src="js/uplogin.js?v=<?php echo time(); ?>"></script>


	

</body>
</html>