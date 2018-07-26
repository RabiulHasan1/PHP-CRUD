 <?php 
	include 'db.php';
 ?>
 <?php 
 	if (isset($_REQUEST['edit_id'])) {
 		$c_edit = $_REQUEST['edit_id'];
 		extract($_REQUEST);
 		if ($connect->update("student","name='$name',email='$email',password='$password'","id=$c_edit")) {
 			header("location:read.php");
 		}
 		else{
 			$msg="Update Fail";
 		}
 	}
 	if (isset($_REQUEST['edit'])) {
 		$edit=$_REQUEST['edit'];
 		extract($connect->getbyid("student","*","id=$edit"));
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
		<form action="edit.php" method="post">
			<div class="form-group">
		    <label for="name">Your Name</label>
		    <input type="text" name="name" value="<?=isset($name)?$name:''?>" class="form-control">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Email address</label>
		    <input type="email" name="email" value="<?=isset($email)?$email:''?>" class="form-control">
		  </div>
		  <div class="form-group">
		    <label for="password">Password</label>
		    <input type="password" name="password" value="<?=isset($password)?$password:''?>" class="form-control">
		  </div>
		  <input type="hidden" name="edit_id" value="<?=$edit?>">
		  <button type="submit" name="submit" class="btn btn-primary">Update</button>
		</form>
	</div>
</body>
</html>