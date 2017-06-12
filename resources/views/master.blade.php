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

  <link rel="stylesheet" type="text/css" href="css/animate.css">

	<style type="text/css">
		@font-face {
			font-family: Gravity;
			src: url(fonts/GeosansLight.ttf);
		}		
		body {
			height: 100%;
			max-height: 100%;
			background-color: #ececec;
			font-family: Gravity;
		}
		.content-title {
			font-size: 200%;
			margin-bottom: -20px;
		}
		.content {
      text-align: center;
      font-size: 150%;
		}
    .logo-big {
      max-width: 400px;
    }
    .logo-big-wrapper {
      height: 100%;
      padding: 20px;
    }
	</style>

	@yield('style')
</head>

<body>
	@include('parts.banner')

	<div class="content">
		@yield('content')
	</div>

</body>
</html>