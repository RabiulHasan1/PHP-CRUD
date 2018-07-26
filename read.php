<?php 
	include 'database.php';
 ?>
 <?php 
  if (isset($_REQUEST['cdelete'])) {
    $del=$_REQUEST['cdelete'];
    if ($connect->delete("student","id=$del")) {
      header("location:read.php");
    }
    else{
      echo "delete fail";
    }
  }
  if (isset($_REQUEST['delete'])) {
   $delete=$_REQUEST['delete'];
   ?>
   <a class="btn btn-danger"> href="read.php?cdelete=<?=$delete?>">Yes</a>
   <a class="btn btn-success" href="read.php">No</a>
   <?php
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

    <title>Data Read</title>
  </head>
  <body>
   <div class="container">
   	<div class="col-md-8 offset-md-2">
   		<?php 
   			$all_student=$connect->getall("student","*");
			$single_student=$connect->getbyid("student","*","id=1");
			print_r($connect->getTable($all_student));
   		 ?>
   	</div>
   </div>
  </body>
</html>