<?php 
	include 'database.php';
 ?>
 <?php 
 if (isset($_REQUEST['submit'])) {
 	//$final_edit=$_REQUEST['hidden'];
 	extract($_REQUEST);
 	if ($connect->update("student","name='$name',email='$email',password='$password'","id=$hidden")) {
 		header("location:read.php");
 	}
 	else{
 		echo "update fail";
 	}
 }
 if (isset($_REQUEST['edit'])) {
 	$edit_id=$_REQUEST['edit'];
 	extract($connect->getbyid("student","*","id=$edit_id"));
 }

  ?>
 <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <title>Insert</title>
  </head>
  <body>
   	<div class="container">
   		<div class="col-sm-4 offset-sm-4">
   			<form>
   				<div class="form-group">
			    <label >Username</label>
			    <input type="text" name="name" value="<?=isset($name)?$name:''?>" class="form-control"> 
			  </div>
			  <div class="form-group">
			    <label >Email address</label>
			    <input type="email" name="email" value="<?=isset($email)?$email:''?>" class="form-control"  > 
			  </div>
			  <div class="form-group">
			    <label >Password</label>
			    <input type="password" name="password" value="<?=isset($password)?$password:''?>" class="form-control" >
			  </div>
			  <input type="hidden" value="<?=$edit_id?>" name="hidden">
			  <button type="submit" name="submit" class="btn btn-primary">Update</button>
			</form>
   		</div>
   	</div>
  </body>
</html>