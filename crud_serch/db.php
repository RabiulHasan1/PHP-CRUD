 <?php 
	class DB{
		private $conn;
		public function __construct($host,$user,$pass,$db){
			$this->conn=new mysqli($host,$user,$pass,$db);
			if (!$this->conn) {
				die("Connection problem ".$this->conn->connect_error);
			}
		}
		public function getall($table,$cols){
			$sql="SELECT $cols FROM $table";
			$result=$this->conn->query($sql);
			if ($result->num_rows>0) {
				return $result->fetch_all(MYSQLI_ASSOC);
			}
			return false;
		}
		public function getbyid($table,$cols,$condition){
			$sql="SELECT $cols FROM $table WHERE $condition";
			$result=$this->conn->query($sql);
			if ($result->num_rows>0) {
				return $result->fetch_assoc();
			}
			return false;
		}

		public function getTable($data,$css="table table-bordered table-hover"){
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
								$table.="<td><a href='edit.php?edit=$value[id]'>Edit</a>&nbsp;&nbsp;<a href='read.php?delete=$value[id]'>Delete</a></td>";
							$table.="</tr>";
						}
						$total=count($data,true);
						$table.="<td colspan='$total'><a href='insert.php' class='form-control text-center'>Add New Member</a></td>";
					$table.="</tr>";
				$table.="</table>";
				return $table;
			}
		}
		public function insert($table,$cols){
			$sql="INSERT INTO $table SET $cols";
			$result=$this->conn->query($sql);
			if($this->conn->affected_rows>0){
				return true;
			}
			else{
				return false;
			}
		}

		public function update($table,$cols,$condition){
			$sql="UPDATE $table SET $cols WHERE $condition";
			$result=$this->conn->query($sql);
			if($this->conn->affected_rows>0){
				return true;
			}
			else{
				return false;
			}
		}
		public function delete($table,$condition){
			$sql="DELETE FROM $table WHERE $condition";
			$result=$this->conn->query($sql);
			if($this->conn->affected_rows>0){
				return true;
			}
			else{
				return false;
			}
		}
		public function singlegetTable($data){
			$table="<table>";
				foreach ($data as $key => $value) {
					$table.="<tr>";
						$table.="<th>".ucfirst($key)."</th>";
						$table.="<td>".$value."<td>";
					$table.="</tr>";
				}
			$table.="</table>";
			return $table;
		}
	}
	$connect=new DB("localhost","root","","crud");
	//print_r($connect->getall("student","*"));
	//print_r($connect->getbyid("student","*","id=1"));
	//print_r($connect->getTable($connect->getall("student","*")));
 ?>