<?php
  require 'profileinfo.php';
?>



<!DOCTYPE html>
<html>
<head>
   <title>Classes</title>
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
		var allow = / /gi;
		input.value = input.value.replace(allow,"");
	}
</script>
<?php
	if (!empty($_POST['addclasscheck'])) 
	{
		$ClassesName = htmlspecialchars(strtoupper($_POST['ClassName']));
		$ActiveStatus = $_POST['ActiveStatus'];	
		if (empty($_POST['discipline'])) 
		{
			$Discipline = "";
		}
		else
		{
			$Discipline = $_POST['discipline'];
		}
		$i = 0;


		$noofclasses = "SELECT COUNT(ClassesId) as classesno 
				  FROM classes
				  WHERE CampusId='$CampusId'";
		$query1 = mysqli_query($conn,$noofclasses);
		$classesno = mysqli_fetch_array($query1);
		$no_Of_classes = $classesno['classesno'];


		$classesdata = "SELECT ClassesName 
					  FROM Classes
					  WHERE CampusId='$CampusId'";
		$query2 = mysqli_query($conn,$classesdata);
		if (mysqli_num_rows($query2) > 0) 
		{
			while ($row = mysqli_fetch_assoc($query2)) 
			{
				if ($row['ClassesName']==$ClassesName) 
				{
					echo 
						'<input type="hidden" >
						<script>
							Swal.fire("Error!", "Class Already Exist", "error");
						</script>
						';
				}
				else
				{
					$i = $i+1;
				}
			}
		}
		else
		{
			$i = $no_Of_classes;
		}
		if ($i==$no_Of_classes) 
		{
			$date = date('d/m/Y');
			$addnewclass = "INSERT INTO classes(CampusId,DisciplineName,ClassesName,CreatedDate,IsActive)
						VALUES ('$CampusId','$Discipline','$ClassesName','$date','$ActiveStatus')";
			if (mysqli_query($conn, $addnewclass)) 
			{
			    echo 
					'<input type="hidden" >
					<script>
						Swal.fire("Save", "", "success");
					</script>
					';
			} 
			else 
			{
			 	echo 
					'<input type="hidden" >
					<script>
						Swal.fire("Error", "Something went wrong", "error");
					</script>
					';   
			}
		}
	}
?>


<?php
	$disciplinedata = "SELECT DisciplineName
				 FROM discipline
				 WHERE CampusId = '$CampusId' AND IsActive='Yes'
				 ORDER BY DisciplineName ASC
				";
	$query3 = mysqli_query($conn,$disciplinedata);
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
	       					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 text-dark text-center text-uppercase p-1 h5 text-capitalize" style="border-radius: 0px 0px 80px 80px;">
	       						<div class="text-white" style="box-shadow: 1px 1px 2px black;border-radius: 0px 0px 50px 50px;background-color: #0047AB">Classes</div>
	       					</div>
	       					<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 text-right">
	       						<a href="viewclass.php"> 
	       							<button class="btn btn-sm btn-secondary mt-2 mr-4 text-white" style="border-radius: 40px;box-shadow: 1px 1px 5px"><i class="fa fa-eye pr-1"></i>View Classes</button>
	       						</a>
	       					</div>
	       				</div>
	       				<div class="row">
	       					<div class="col-xl-12 mt-5">
	       						<div class="container">
	       							<div class="container" style="font-size: 13px">
	       								<form class="form-group needs-validation" novalidate style="box-shadow: 1px 1px 10px;" action="addclass.php" method="post">
	       									<table class="table table-bordered" style="line-height: 8px">
	       										<tr class="text-center" style="background-color:#323E6F;color: white;">
	       											<th>Class Name</th>
	       											<th>Active</th>
	       										</tr>
	       										<tr>
	       											<td>
	       												<input onkeyup="spacefilter(this)" type="text" name="ClassName" class="form-control text-uppercase form-control-sm" required>
	       											</td>
	       											<td>
	       												<select name="ActiveStatus" class="form-control form-control-sm">
	       													<option value="Yes">Yes</option>
	       													<option value="No">No</option>
	       												</select>	
	       											</td>
	       										</tr>
	       									</table>
	       									<div class="row">
	       										<div class="col-xl-4 col-md-2"></div>
	       										<div class="col-xl-4 col-md-8 text-center">
	       											<div class="p-1 font-weight-bold" style="background-color:#323E6F;color: white;border-radius: 20px;font-size: 13px">
	       												Discipline
	       											</div>
	       										</div>
	       										<div class="col-xl-4 col-md-2"></div>
	       									</div>
	       									<?php  
	       										echo "<div class='row mt-5 pl-5' id='subj'>";
	       											$i=1;
	       											while ($row = mysqli_fetch_assoc($query3)) 
	       											{
		       											?>
		       												<div class="col-xl-3 col-md-4" style="font-size: 13px">
																<input type="radio" id="discipline<?php echo $i?>" name="discipline" value="<?php echo $row['DisciplineName']?>">
																<label for="discipline<?php echo $i?>"><?php echo $row['DisciplineName']?></label>
															</div>
		       											<?php
		       											$i=$i+1;
		       										}
			       								echo "</div>";
	       									?>
	       									<div class="row mt-5">
	       										<div class="col-xl-12 text-center p-2">
	       											<button class="btn btn-sm btn-success"><i class="fas fa-check pr-2"></i>Save</button>
	       											<a href="viewclass.php"> 
	       												<div class="btn btn-sm btn-danger"><i class="fas fa-times pr-2"></i>Cancel</div>
	       											</a>
	       											<input type="hidden" name="addclasscheck" value="true">
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