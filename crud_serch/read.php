<?php 
	include 'db.php';
 ?>
<?php 

	if (isset($_REQUEST['cdelete'])) {
		$c_delete = $_REQUEST['cdelete'];
		if ($connect->delete("student","id=$c_delete")) {
			header("location:read.php");
		}
		else{
			echo "Delete Fail";
		}
	}
	if (isset($_REQUEST['delete'])) {
		$delete = $_REQUEST['delete'];
		?>
			<span>Are you sure?????</span>
			<a class="btn btn-danger" href="read.php?cdelete=<?=$delete?>">Yes</a>
			<a class="btn btn-success" href="read.php">No</a>
		<?php
	}
 ?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Data Show</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<?php 
			$single_student = $connect->getbyid("student","*","id=1");
			$all_student = $connect->getall("student","*");
			print_r($connect->getTable($all_student));
		 ?>	
	</div>
</body>
</html>