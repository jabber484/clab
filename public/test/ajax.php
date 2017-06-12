<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
	<form method="POST">
		<input type="text" id="text" name="text">
		<button type="button">GO</button>
	</form>	
	<script type="text/javascript">

		$('button').click( function(){
			$.post("./response.php",
		        {
		          name: $('#text').val(),
		          city: "NIG"
		        },

		        function(data,status){
		            alert("Data: " + data + "\nStatus: " + status);
		        });
		});

	</script>
</body>
</html>