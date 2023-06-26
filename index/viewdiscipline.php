<?php
  require 'profileinfo.php';
?>



<!DOCTYPE html>
<html>
<head>
   <title>Discipline</title>
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

	if (!empty($_POST['disciplineeditcheck'])) 
	{
		$disciplineNewName = htmlspecialchars(strtoupper($_POST['DisciplineName']));
		$DisciplineId = $_POST['disciplineId'];
		$ActiveStatus =$_POST['ActiveStatus'];
		$i = 0;
		require "connectdatabase.php";
		// discipline name
		$disciplinename="SELECT DisciplineName
						 FROM discipline 
						 WHERE DisciplineId='$DisciplineId'";
		$query3 = mysqli_query($conn,$disciplinename);
		$disciplineName = mysqli_fetch_array($query3);
		$discipline_actual_name = $disciplineName['DisciplineName'];
		// no of discipline exist
		$noofdiscipline = "SELECT COUNT(DisciplineId) as disciplineno 
				  	  FROM discipline
				  	  WHERE (CampusId='$CampusId') AND DisciplineId != '$DisciplineId'";
		$query1 = mysqli_query($conn,$noofdiscipline);
		$disciplineno = mysqli_fetch_array($query1);
		$no_Of_discipline = $disciplineno['disciplineno'];
		// other discipline name that are not going to edit
		$disciplinedata = "SELECT DisciplineName 
					  FROM discipline
					  WHERE CampusId='$CampusId' AND DisciplineId != '$DisciplineId'";
		$query2 = mysqli_query($conn,$disciplinedata);



		if (mysqli_num_rows($query2) > 0) 
		{
			while ($row = mysqli_fetch_assoc($query2)) 
			{
				if ($row['DisciplineName']==$disciplineNewName) 
				{
					echo 
						'<input type="hidden" >
						<script>
							Swal.fire("Error!", "Discipline Name Already Exist", "error");
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
			$i = $no_Of_discipline;
		}

		if ($i==$no_Of_discipline) 
		{
			$UpdateDiscipline = "UPDATE discipline 
							SET DisciplineName='$disciplineNewName',IsActive = '$ActiveStatus' 
							WHERE DisciplineId = '$DisciplineId'
							";
			$UpdateDisciplinefromclass = "UPDATE classes 
							SET DisciplineName='$disciplineNewName'
							WHERE DisciplineName = '$discipline_actual_name'
							";
			$UpdateDisciplinefromgroups = "UPDATE groups 
							SET DisciplineName='$disciplineNewName'
							WHERE DisciplineName = '$discipline_actual_name'
							";
			$UpdateDisciplinefromboards = "UPDATE boards 
							SET DisciplineName='$disciplineNewName'
							WHERE DisciplineName = '$discipline_actual_name'
							";
			$UpdateDisciplinefromsubjects = "UPDATE subjects 
							SET DisciplineName='$disciplineNewName'
							WHERE DisciplineName = '$discipline_actual_name'
							";
			if (mysqli_query($conn,$UpdateDiscipline)&&mysqli_query($conn,$UpdateDisciplinefromclass)&&mysqli_query($conn,$UpdateDisciplinefromgroups)&&mysqli_query($conn,$UpdateDisciplinefromboards)&&mysqli_query($conn,$UpdateDisciplinefromsubjects)) 
			{
				echo 
					'<input type="hidden" >
					<script>
						Swal.fire("Update Successful", "", "success");
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
	$disciplinedata = "SELECT * 
				  FROM discipline
				  WHERE CampusId='$CampusId'
				  ORDER BY DisciplineName ASC";
	$query = mysqli_query($conn,$disciplinedata);
	$noofdiscipline = "SELECT COUNT(DisciplineId) as disciplineno 
				  FROM discipline
				  WHERE CampusId='$CampusId'";
	$query1 = mysqli_query($conn,$noofdiscipline);
	$disciplineno = mysqli_fetch_array($query1);
	$no_Of_discipline = $disciplineno['disciplineno'];
?>

<body id="page-top">
  	<!-- Page Wrapper -->
  	<div id="wrapper">

  		<?php
      		require 'sidenavigation.php';
   	 	?>

	    <!-- Content Wrapper -->
  		<div id="content-wrapper" class="d-flex flex-column">
            <?php
   	   		    require 'header.php';
   		    ?>
  			<!-- Main Content -->
      		<div id="content">

      			<!-- Begin Page Content -->
       			<div class="container-fluid">
       				<div class="container">
	       				<div class="row">
	       					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 text-dark text-center p-1 h5 text-capitalize" style="border-radius: 0px 0px 80px 80px;">
	       						<div class="text-white" style="box-shadow: 1px 1px 2px black;border-radius: 0px 0px 50px 50px;background-color: #0047AB">Discipline</div>
	       					</div>
	       					<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 text-right">
	       						<a href="adddiscipline.php"> 
	       							<button class="btn btn-sm btn-secondary mt-2 mr-4 text-white" style="border-radius: 40px;"><i class="fa fa-plus pr-1"></i>Add New</button>
	       						</a>
	       					</div>
	       				</div>
	       				<div class="row">
	       					<div class="col-xl-12 mt-3">
	       						<div class="container">
	       							<div class="container table-responsive" style="font-size: 13px">
		       							<table class="text-center table-sm table table-bordered table-striped" style="box-shadow: 1px 1px 10px;">
		       								<tr style="background-color:#323E6F;color: white;">
		       									<th>Discipline Name</th>
		       									<th>Created Date</th>	
		       									<th class="text-center">Active</th>
		       									<th class="text-center">Action</th>
		       								</tr>
			       							<?php
			       								if ($no_Of_discipline==0) 
			       								{
			       									echo "<td style='border:0px;font-style:italic'>no record</td>";
			       								}
			       								else
			       								{
			       									while($row = mysqli_fetch_assoc($query)) 
			       									{
			       										?>
			       											<tr>
				       											<td style="line-height: 25px" class="alert alert-primary"><?php echo $row['DisciplineName']?></td>
				       											<td style="line-height: 25px"><?php echo $row['CreatedDate']?></td>
				      											<td class="text-center text-white" style="line-height: 25px">
				      												<?php
				      													if ($row['IsActive']=="No") 
				      													{
				      														?>
				      															<img src="pics/cross.png" class="icon" style="height: 24px;">
				      														<?php
				      													}
				      													else
				      													{
				      														?>
				      															<img src="pics/tick.png" class="icon" style="height: 35px;">
				      														<?php
				      													}
				      												?>
				      													
				      											</td>
				     											<td class="text-center p-2">
				       												<div class="btn-group text-center">
				       													<form action="disciplineedit.php" method="post">
											       							<button style="font-size: 11px" class="btn-sm btn-info rounded-circle mr-1" title="Edit"><i class="fa fa-edit"></i></button>
											       							<input type="hidden" name="check" value="<?php echo $row['DisciplineId']?>">
											       						</form>
											       						<a href="deletediscipline.php?id=<?= $row['DisciplineId']?>" class = "btn-del"><button style="background-color: red;font-size: 11px" name="submit" class="btn-sm btn-danger rounded-circle" title="Delete"><i class="fa fa-trash"></i></button></a>			
											       					</div>
										       					</td>
				       										</tr>
			       										<?php
			       									}
			       								}
			       							?>
			       							<tr style="background-color: lightgray">
			       								<td class="border-0 font-italic text-left" style="font-size: 14px;">Total Record : <?php echo $no_Of_discipline?></td>
			       								<td class="border-0 "></td>
			       								<td class="border-0 "></td>
			       								<td class="border-0 "></td>
			       							</tr>
		      							</table> 
		      							<?php if(isset($_GET['delete'])) :?>
										    <div class="flash-data" data-flashdata="<?= $_GET['delete'];?>"></div>
										<?php endif; ?>
	       							</div>
	       						</div>
	       					</div>
	       				</div>
       				</div>
       			</div>

      		</div>

  		</div>



  	</div>




  <!-- delete record -->
  <script>
  	$('.btn-del').on('click',function(e){
  		e.preventDefault();
  		const href = $(this).attr('href')

  		Swal.fire ({
  			title : 'Are You Sure?',
  			text : 'This may cause permanent loss of data',
  			icon : 'warning',
  			showCancelButton : true,
  			confirmButtonColor : '#4385F6',
  			cancelButtonColor : '#FF3548',
  			confirmButtonText : 'Delete',
  		}).then((result)=>{
  			if (result.value) {
  				document.location.href = href;
  			}
  		})
  	})

  	const flashdata = $('.flash-data').data('flashdata')

  	if (flashdata){
  		Swal.fire({
  			icon : 'success',
  			title : 'Deleted',
  			type : 'Delete',
  		})
  	}
  </script>
  <!-- delete record ends -->



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