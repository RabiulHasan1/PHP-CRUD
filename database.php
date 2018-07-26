<?php 
	class DB{
		private $conn;
		public function __construct($host,$user,$pass,$database){
			$this->conn=new mysqli($host,$user,$pass,$database);
			if (!$this->conn) {
				die("connection problem ".$this->conn->connect_error);
			}
		}
		public function getall($table,$cols){
			$sql="SELECT $cols FROM $table";
			$result=$this->conn->query($sql);
			if($result->num_rows>0){
				return $result->fetch_all(MYSQLI_ASSOC);
			}
			else{
				return false;
			}
		}
		public function getbyid($table,$cols,$condition){
			$sql="SELECT $cols FROM $table WHERE $condition";
			$result=$this->conn->query($sql);
			if($result->num_rows>0){
				return $result->fetch_assoc();
			}
			else{
				return false;
			}
		}
		public function getTable($data,$css='table table-hover table-bordered table-dark'){
			if (count($data) == count($data,true)) {
				$table="<table class='$css'>";
					foreach ($data as $key => $value) {
						$table.="<tr>";
							$table.="<th>".ucfirst($key)."</th>";
							$table.="<td>".$value."</td>";
						$table.="</tr>";
					}
				$table.="</table>";
				return $table;
			}
			else{
				$table="<table class='$css'>";
					$table.="<tr>";
						foreach ($data[0] as $key => $value) {
								$table.="<th>".ucfirst($key)."</th>";	
						}
								$table.="<th>Action</th>";
							foreach ($data as $key => $value) {
								$table.="<tr>";
									foreach ($value as $key => $val) {
										$table.="<td>".$val."</td>";
									}
									$table.="<td><a class='btn btn-info' href='edit.php?edit=$value[id]'>Edit</a> &nbsp;&nbsp;<a class='btn btn-danger' href='read.php?delete=$value[id]'>Delete</a></td>";
								$table.="</tr>";
							}
							$total=count($data,true);
							$table.="<td colspan='$total'><a class='btn btn-success form-control' href='insert.php'>Add New Student</a></td>";
					$table.="</tr>";
				$table.="</table>";
				return $table;
			}
		}
		public function insert($table,$cols){
			$sql="INSERT INTO $table SET $cols";
			$resutl=$this->conn->query($sql);
			if ($this->conn->affected_rows>0) {
				return true;
			}
			else{
				return false;
			}
		}
		public function update($table,$cols,$conditon){
			$sql="UPDATE $table SET $cols WHERE $conditon";
			$resutl=$this->conn->query($sql);
			if ($this->conn->affected_rows>0) {
				return true;
			}
			else{
				return false;
			}
		}
		public function delete($table,$conditon){
			$sql="DELETE FROM $table WHERE $conditon";
			$resutl=$this->conn->query($sql);
			if ($this->conn->affected_rows>0) {
				return true;
			}
			else{
				return false;
			}
		}
	}
	$connect=new DB("localhost","root","","crud");
	//print_r($connect->getall("student","*"));
	//print_r($connect->getbyid("student","*","id=1"));
	
			
 ?>