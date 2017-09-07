<!DOCTYPE html>
<html>

<head>
	<title>C!ab</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="css/line.css">
 	<link rel="stylesheet" type="text/css" href="css/animate.css">

 	<script src="js/jquery.slides.min.js"></script>

 	<script src='js/moment.min.js'></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
 	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.css">
 	<link rel="stylesheet" media="print" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.print.css">
 	
 	{{-- font --}}
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

	<style type="text/css">
	@font-face {
		font-family: wys;
		src: url('asset/calvert.ttf');
	}		
	html {
   		height: 100%;
	}
	body {
    	min-height: 100%;
	    height: auto;
		background-color: #f5f5f5;
		font-family: 'wys';
	}

	.content-title {
	    background: rgba(254, 223, 90, 0.7);
	    border-left: 8px solid;
	    font-size: 26px;
	    font-weight: bold;
	    padding-bottom: 8px;
	    padding-left: 8px;
	    padding-top: 8px;
	    text-align: left;
	    font-variant: all-small-caps;
	    margin-bottom: 8px;
	}

	.content {
   	 	text-align: center;
	    font-size: 14px;
	    font-weight: 100;
	}

  	.barY {
  		height: 5px;
		background-color: #fedf5a;
  	}
  	</style>

	@yield('style')
</head>

<body>
	@include('parts.banner')

	<div class="content">
		@yield('content')
	</div>

  @include('parts.footer')
</html>