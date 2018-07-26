<?php 
	include 'db.php';
 ?>
 <?php 
 	if (isset($_REQUEST['submit'])) {
 		extract($_REQUEST);
 		if ($connect->insert("student","name='$name',email='$email',password='$password'")) {
 			header("location:read.php");
 		}
 		else{
 			$msg="Insert Fail";
 		}
 	}
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Insert Data</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<?php 

			echo @$msg;
		 ?>
		<form action="insert.php" method="post">
			<div class="form-group">
		    <label for="name">Your Name</label>
		    <input type="text" name="name" class="form-control" placeholder="Your Name">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Email address</label>
		    <input type="email" name="email" class="form-control" placeholder="Enter email">
		  </div>
		  <div class="form-group">
		    <label for="password">Password</label>
		    <input type="password" name="password" class="form-control" placeholder="Password">
		  </div>
		  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</body>
</html>