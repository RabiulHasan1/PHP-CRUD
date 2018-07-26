<?php 
	include 'db.php';
 ?>
 <?php 
 	if (isset($_REQUEST['store_id'])) {
 		$id=$_REQUEST['store_id'];
 			if ($connect->getbyid("student","*","id=$id")) {
 				echo $connect->singlegetTable($connect->getbyid("student","*","id=$id"));
 			}
 			else{
 				echo "invalid user";
 			}
 	}
  ?>