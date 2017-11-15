<!DOCTYPE html>
<html>

<head>
	<title>C!ab</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<link href={{asset("css/bootstrap.min.css")}} rel="stylesheet">
	<script src={{asset("https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js")}}></script>
	<script src={{asset("js/bootstrap.min.js")}}></script>
	
	<!-- Include external CSS. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
 
    <!-- Include Editor style. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/css/froala_style.min.css" rel="stylesheet" type="text/css" />
	 
	<!-- Include JS file. -->
	<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/js/froala_editor.min.js'></script>

	<link rel="stylesheet" type="text/css" href={{asset("css/line.css")}}>
 	<link rel="stylesheet" type="text/css" href={{asset("css/animate.css")}}>

 	<script src={{asset("js/jquery.slides.min.js")}}></script>
 	<script src={{asset("js/jquery.dotdotdot.js")}}></script>

 	<script src={{asset('js/moment.min.js')}}></script>
 	<script src={{asset("https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js")}}></script>
 	<link rel="stylesheet" type="text/css" href={{asset("https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.css")}}>
 	<link rel="stylesheet" media="print" type="text/css" href={{asset("https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.print.css")}}>
 	
 	{{-- font --}}
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

	<style type="text/css">
	@font-face {
		font-family: wys;
		src: url('{{asset("asset/calvert.ttf")}}');
	}		
	html {
   		height: 100%;
	}
	body {
		position: relative;
    	min-height: 100%;
	    height: auto;
		background-color: #f5f5f5;
		font-family: 'wys';
	}
	section {
	    margin-top: 8px;
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
		min-height: 80vh;
   	 	text-align: center;
	    font-size: 14px;
	    font-weight: 100;
	}

  	.barY {
  		height: 5px;
		background-color: #fedf5a;
  	}

  	@media screen and (max-width: 767px) {
	    section {
			min-height: 600px
		}
	}
	@media screen and (max-width: 480px) {
	    section {
			min-height: 0px
		}
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

<script type="text/javascript">
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
</script>
