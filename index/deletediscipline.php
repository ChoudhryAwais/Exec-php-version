<?php
    $idofdiscipline = $_GET['id'];
	require 'connectdatabase.php';
    require 'profileinfo.php';
    $disciplinename="SELECT DisciplineName
					 FROM discipline 
					 WHERE DisciplineId='$idofdiscipline'";
	$query3 = mysqli_query($conn,$disciplinename);
	$disciplineName = mysqli_fetch_array($query3);
	$discipline_actual_name = $disciplineName['DisciplineName'];

    $groupsname="SELECT DISTINCT(GroupsName)
				FROM groups 
				WHERE DisciplineName='$discipline_actual_name'";
	$query4 = mysqli_query($conn,$groupsname);

	$deletediscipline = "DELETE FROM discipline WHERE DisciplineId = '$idofdiscipline'";
	$deletedisciplinefromclass = "DELETE FROM classes WHERE DisciplineName = '$discipline_actual_name' AND CampusId='$CampusId'";
	$deletedisciplinefromgroup = "DELETE FROM groups WHERE DisciplineName = '$discipline_actual_name' AND CampusId='$CampusId'";
	$deletedisciplinefromboard = "DELETE FROM boards WHERE DisciplineName = '$discipline_actual_name' AND CampusId='$CampusId'";
	$deletedisciplinefromsubjects = "DELETE FROM subjects WHERE DisciplineName = '$discipline_actual_name' AND CampusId='$CampusId'";

	while ($row=mysqli_fetch_assoc($query4)) 
	{
		$groups_actual_name=$row['GroupsName'];
		$deletegroupsfromfee = "DELETE FROM feestructure WHERE Groups ='$groups_actual_name'";	
		$query2 = mysqli_query($conn,$deletegroupsfromfee);
	}
	
	$query = mysqli_query($conn,$deletediscipline)&& mysqli_query($conn,$deletedisciplinefromclass)&& mysqli_query($conn,$deletedisciplinefromgroup)&& mysqli_query       ($conn,$deletedisciplinefromboard)&& mysqli_query($conn,$deletedisciplinefromsubjects);
	$query = mysqli_query($conn,$deletediscipline);
	header('Location:viewdiscipline.php?delete=success')
?>