<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Id Search</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$("#search_btn").click(function(){
				var user_id = $("#id").val();
				$.post("process.php",
				{
					store_id:user_id
				},
				function(data){
					document.getElementById('output').innerHTML=data;
				})
			})
		})
	</script>
</head>
<body>
	<input type="number" id="id">
	<button id="search_btn" type="btn">Search</button>
	<div id="output">
		
	</div>
</body>
</html>