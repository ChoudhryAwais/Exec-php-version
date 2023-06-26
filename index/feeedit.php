<?php
  require 'profileinfo.php';
?>
<?php
	if (!empty($_POST['check'])) 
	{
		$feeId=$_POST['check'];
		$Feeinfo = "SELECT AdmissionFee ,FeePerSubj, DiscountUpTo, DiscountPercentage,Groups,IsActive 
					  FROM feestructure
					  WHERE FeeStructureId='$feeId'";
		$query1 = mysqli_query($conn,$Feeinfo);
		$fee_info = mysqli_fetch_array($query1);
		$AdmissionFee = $fee_info['AdmissionFee'];
		$FeePerSubj = $fee_info['FeePerSubj'];
		$DiscountUpTo = $fee_info['DiscountUpTo'];
		$DiscountPercentage = $fee_info['DiscountPercentage'];
		$Groups = $fee_info['Groups'];
        $actual_isactive = $fee_info['IsActive'];
	}
	else
	{
		header('Location:viewfee.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
   <title>Fee Structure</title>
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
   <link href="css/style.css?v=<?php echo time(); ?>" rel="stylesheet">

   <script src="js/jquery-3.5.0.min.js"></script>
   <script src="js/sweetalert2.all.min.js"></script>

 

</head>

<script>
	function spacefilter(input) 
	{
		var allow = /[^1-9.]/gi;
		input.value = input.value.replace(allow,"");
	}
</script>
<?php
	$groupsdata = "SELECT DISTINCT(GroupsName)
				 FROM groups
				 WHERE CampusId = '$CampusId' AND IsActive='Yes';
				";
	$query3 = mysqli_query($conn,$groupsdata);
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
       				<div class="container">
	       				<div class="row">
	       					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 text-dark text-center p-1 h5 text-capitalize" style="border-radius: 0px 0px 80px 80px;">
	       						<div class="text-white" style="box-shadow: 1px 1px 2px black;border-radius: 0px 0px 50px 50px;background-color: #0047AB">Fee Structure</div>
	       					</div>
	       					<div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 text-right">
	       						<a href="viewfee.php"> 
	       							<button class="btn btn-sm btn-secondary mt-2 mr-4 text-white" style="border-radius: 40px;"><i class="fa fa-eye pr-1"></i>View Fee Structure</button>
	       						</a>
	       					</div>
	       				</div>
	       				<div class="row">
	       					<div class="col-xl-12 mt-5">
	       						<div class="container">
	       							<div class="container" style="font-size: 13px">
	       								<form class="form-group needs-validation" novalidate style="box-shadow: 1px 1px 10px;" action="viewfee.php" method="post">
	       									<table class="table table-bordered table-responsive d-xl-table d-lg-table" style="line-height: 8px">
	       										<tr class="text-center" style="background-color:#323E6F;color: white;">
	       											<th>Admission Fee</th>
	       											<th>Fee Per Subject</th>
		       										<th>Discount Upto</th>
		       										<th>Discount Percentage</th>
		       										<th class="text-center">Active</th>
	       										</tr>
	       										<tr>
	       											<td>
	       												<input type="number" name="AdmissionFee" class="form-control text-capitalize form-control-sm" required placeholder=RS value="<?php echo $AdmissionFee?>">
	       											</td>
	       											<td>
	       												<input type="text" name="FeePerSubj" class="form-control form-control-sm" value="<?php echo $FeePerSubj?>" placeholder="RS" required>
	       											</td>
	       											<td>
	       												<input type="text" name="DiscountUpTo" class="form-control form-control-sm" value="<?php echo $DiscountUpTo?>" placeholder="No.of Subject">
	       											</td>
	       											<td>
	       												<input onkeyup="spacefilter(this)" type="text" name="DiscountPercentage" class="form-control form-control-sm" value="<?php echo $DiscountPercentage?>" placeholder="%">
	       											</td>
	       											<td>
	       												<select name="ActiveStatus" class="form-control form-control-sm">
	       													<?php
                                                               if($actual_isactive=="Yes")
                                                               {
                                                                    ?>
                                                                        <option value="Yes">Yes</option>
	       													            <option value="No">No</option>
                                                                    <?php
                                                               }
                                                               else
                                                               {
                                                                    ?>
	       													            <option value="No">No</option>
                                                                        <option value="Yes">Yes</option>
                                                                    <?php
                                                               }
                                                            ?>
	       												</select>	
	       											</td>
	       										</tr>
	       									</table>
	       									<div class="row">
	       										<div class="col-xl-4 col-md-2"></div>
	       										<div class="col-xl-4 col-md-8 text-center">
	       											<div class="p-1 bg-secondary font-weight-bold" style="background-color:#323E6F;color: white;border-radius: 20px">
	       												Groups
	       											</div>
	       										</div>
	       										<div class="col-xl-4 col-md-2"></div>
	       									</div>
	       									<?php  
	       										echo "<div class='row mt-5 pl-5' id='subj'>";
	       											$i=1;
	       											while ($row = mysqli_fetch_assoc($query3)) 
	       											{
		       											if ($row['GroupsName']==$Groups) 
	       												{
	       													?>
			       												<div class="col-xl-3 col-md-4" style="font-size: 13px">
																	<input checked type="radio" id="groups<?php echo $i?>" name="groups" value="<?php echo $row['GroupsName']?>">
																	<label for="groups<?php echo $i?>"><?php echo $row['GroupsName']?></label>
																</div>
		       												<?php	
	       												}
	       												else
	       												{	
			       											?>
			       												<div class="col-xl-3 col-md-4" style="font-size: 13px">
																	<input type="radio" id="groups<?php echo $i?>" name="groups" value="<?php echo $row['GroupsName']?>">
																	<label for="groups<?php echo $i?>"><?php echo $row['GroupsName']?></label>
																</div>
			       											<?php
			       										}
		       											$i=$i+1;
		       										}
			       								echo "</div>";
	       									?>
	       									<div class="row mt-5">
	       										<div class="col-xl-12 text-center p-2">
	       											<button class="btn btn-sm btn-success"><i class="fas fa-check pr-2"></i>Update</button>
	       											<a href="viewfee.php"> 
	       												<div class="btn btn-sm btn-danger"><i class="fas fa-times pr-2"></i>Cancel</div>
	       											</a>
	       											<input type="hidden" name="feeeditcheck" value="true">
	       											<input type="hidden" name="feeId" value="<?php echo $feeId?>">
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

  		</div>



  	</div>




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
   <script src="js/delete.js"></script>

 
</body>




</html>