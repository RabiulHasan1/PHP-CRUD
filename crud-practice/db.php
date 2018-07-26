<?php 
	class Db{
		private $conn;
		function __construct($host,$user,$pass,$db){
			$this->conn=new mysqli($host,$user,$pass,$db);
			if (!$this->conn) {
				die("connection problem" .$this->conn->connect_error);
			}
		}
		public function getall($table,$cols){
			$sql="SELECT $cols FROM $table";
			$result=$this->conn->query($sql);
			if ($result->num_rows>0) {
				return $result->fetch_all(MYSQLI_ASSOC);
			}
		}
		public function getbyid($table,$cols,$id){
			$sql="SELECT $cols FROM $table WHERE $id";
			$result=$this->conn->query($sql);
			if ($result->num_rows>0) {
				return $result->fetch_assoc();
			}
		}
		public function insert($table,$cols){
			$sql="INSERT INTO $table SET $cols";
			$result=$this->conn->query($sql);
			if ($this->conn->affected_rows>0) {
				return true;
			}
			return false;
		}
		public function update($table,$cols,$id){
			$sql="UPDATE $table SET $cols WHERE $id";
			$result=$this->conn->query($sql);
			if ($this->conn->affected_rows>0) {
				return true;
			}
			return false;
		}
		public function delete($table,$id){
			$sql="DELETE FROM $table WHERE $id";
			$result=$this->conn->query($sql);
			if ($this->conn->affected_rows>0) {
				return true;
			}
			return false;
		}
		public function getTable($data,$css_style="table table-bordered table-dark table-hover"){
			if (count($data) == count($data,true)) {
				$table="<table class='$css_style'>";
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
				$table="<table class='$css_style'>";
					$table.="<tr>";
						foreach ($data[0] as $key => $value) {
							$table.="<th>".ucfirst($key)."</th>";
						}
						$table.="<th>Action</th>";
						foreach ($data as $key => $value) {
							$table.="<tr>";
								foreach ($value as  $val) {
									$table.="<td>".$val."</td>";
								}
								$table.="<td><a href='edit.php?edit=$value[id]' class='btn btn-info'><i class='fas fa-wrench'></i></a>&nbsp;<a href='read.php?del=$value[id]' class='btn btn-danger'><i class='far fa-trash-alt'></i></a></td>";
							$table.="</tr>";
						}
						$total=count($data,true);
						$table.="<td colspan='$total'><a href='insert.php' class='btn btn-warning form-control'><span><i class='fas fa-user-secret'></i></span></a></td>";
					$table.="</tr>";
				$table.="</table>";
				return $table;
			}
		}
	}
	$connect=new Db("localhost","root","","crud");
	//print_r($connect->getall("student","*"));
	//print_r($connect->getbyid("student","*","id=1"));
	//$connect->insert("student","name='Safiul Islam',mobile='01793993464',address='Sonagazi'");
	//$connect->update("student","address='Sonagazi,Bangladesh'","id=3");
	//$connect->delete("student","id=3");
	//$connect->getTable("Single_student");
 ?>