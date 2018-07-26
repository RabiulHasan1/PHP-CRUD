<?php 
	include 'db.php';
 ?>
<?php 
	if (isset($_REQUEST['del'])) {
		$hasan=$_REQUEST['del'];
		?>
		<a href="read.php?robiul=<?=$hasan;?>">Yes</a>
		<a href="read.php">No</a>
		<?php
	}
 ?>
 <?php 
 	if (isset($_REQUEST['robiul'])) {
 		$hablu=$_REQUEST['robiul'];
 		if ($connect->delete("student","id=$hablu")) {
 			echo "success";
 		}
 		else{
 			echo "fail";
 		}
 	}
  ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Data Read</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<?php 
					$all_student=$connect->getall("student","*");
					$single_student=$connect->getbyid("student","*","id=1");
				    print_r($connect->getTable($all_student));
				   ?>
			</div>
		</div>
	</div>
</body>
</html>