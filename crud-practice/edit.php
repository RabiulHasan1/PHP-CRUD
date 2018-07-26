<?php 
	include 'db.php';
	if (isset($_REQUEST['c_edit'])) {
		$f_edit=$_REQUEST['c_edit'];
		extract($_REQUEST);
		if ($connect->update("student","name='$name',mobile='$mobile',address='$address'","id=$f_edit")) {
			//$massage="Insert Success";
			header("location:read.php");
		}
		else{
			$massage="Insert Failed";
		   
	    }
    }
 ?>
 <?php 
 	if (isset($_REQUEST['edit'])) {
 		$hasan=$_REQUEST['edit'];
 		extract($connect->getbyid("student","*","id=$hasan"));
 	}
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<form action="read.php" method="post">
				  <div class="form-group row">
				    <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" value="<?=isset($name)?$name:''?>" name="name">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="inputPassword3" class="col-sm-2 col-form-label">Mobile</label>
				    <div class="col-sm-10">
				      <input type="text" value="<?=isset($mobile)?$mobile:''?>" class="form-control"  name="mobile">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="inputPassword3" class="col-sm-2 col-form-label">Address</label>
				    <div class="col-sm-10">
				     <textarea name="address" id="" cols="30" rows="5" class="form-control"><?=isset($address)?$address:''?>;
				     </textarea>
				    </div>
				  </div>
				  <div class="form-group row">
				    <div class="col-sm-10">   	
				    <input type="hidden" value="<?=$hasan;?>" name="c_edit">
				      <button type="submit" class="btn btn-primary" name="submit" value="Registation Compleate">Update</button>
				    </div>
				  </div>
				</form>
					<?php 
						echo @$massage;
					 ?>
			</div>
		</div>
	</div>
</body>
</html>
