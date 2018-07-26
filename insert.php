<?php 
	include 'database.php';
 ?>
 <?php 
 	if (isset($_REQUEST['submit'])) {
 		extract($_REQUEST);
 		if ( $connect->insert("student","name='$name',email='$email',password='$password'")) {
 			header("location:read.php");
 		}
 		else{
 			echo "insert fail";
 		}
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
			    <label for="exampleInputEmail1">Username</label>
			    <input type="text" name="name" class="form-control"  placeholder="Write your name"> 
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Email address</label>
			    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"> 
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
			  </div>
			  
			  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
			</form>
   		</div>
   	</div>
  </body>
</html>