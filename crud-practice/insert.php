<?php 
	include 'db.php';
	if (isset($_REQUEST['submit'])) {
		extract($_REQUEST);
		if (empty($name) && empty($mobile) && empty($address)) {
			$massage="Insert your information";
		}else{
		if ($connect->insert("student","name='$name',mobile='$mobile',address='$address'")) {
			$massage="Insert Success";
			header('location:read.php');
		}
		else{
			$massage="Insert Failed";
		   }
	    }
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
				<form action="insert.php" method="post">
				  <div class="form-group row">
				    <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="inputEmail3" placeholder="Write your name" name="name">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="inputPassword3" class="col-sm-2 col-form-label">Mobile</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="inputPassword3" placeholder="017XXXXXXXX" name="mobile">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="inputPassword3" class="col-sm-2 col-form-label">Address</label>
				    <div class="col-sm-10">
				     <textarea name="address" id="" cols="30" rows="5" class="form-control"></textarea>
				    </div>
				  </div>
				  <div class="form-group row">
				    <div class="col-sm-10">
				      <button type="submit" class="btn btn-primary" name="submit" value="Registation Compleate">Sign in</button>
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
