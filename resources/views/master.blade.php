<!DOCTYPE html>
<html>

<head>
	<title>C!ab</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="css/line.css">

	<style type="text/css">
		@font-face {
			font-family: Gravity;
			src: url(fonts/GeosansLight.ttf);
		}		
		body {
			height: 100%;
			min-height: 100%;
			background-color: #f3f3f3;
			font-family: Gravity;
		}
		.container {
			font-size: 150%;
		}
		.content-title {
			font-size: 200%;
			margin-bottom: -20px;
		}
		.content {
			margin-top: 15px;
		}
	</style>

	@yield('style')
</head>

<body>
	<div style="height:200px;background-color: blue;"></div>
	<div class="content container">
		@yield('content')
	</div>

</body>
</html>