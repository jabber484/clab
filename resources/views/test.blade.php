@extends('master')

@section('style')
	<style type="text/css">
	.corner {
		text-align: center;
		border-top-left-radius: 8px;
		border-bottom-left-radius: 5px;
		border-top: 1px solid #c4c4c4;
		border-left: 1px solid #c4c4c4;
		border-right: 1px solid #d6d4d4;
		border-bottom: 1px solid #c4c4c4;
		padding: 10px; 
	}
	hr {
		margin-top: 5px;
		margin-bottom: 5px;
	}
	img {
		width: 100%;
		height: auto;
	}
	.wrapper {
		margin-right: auto;
		margin-left: auto;
	}
	.slide {
	
	}
	</style>
@endsection	

@section('content')
	<!--<div class="wrapper">
		<div class="col-xs-1 corner">
			<div class="nav-btn">About Us</div>
			<hr class="style14">
			<div class="nav-btn">Activity</div>
			<hr class="style14">
			<div class="nav-btn">Arsneal</div>
		</div>-->	
		<div class="col-xs-4 left">
			<img src="http://via.placeholder.com/600x800">
		</div>
		<div class="col-xs-8 right">
			<div class="col-xs-6"><img src="http://via.placeholder.com/400x400"></div>
			<div class="col-xs-6"><img src="http://via.placeholder.com/400x400"></div>
			<div class="col-xs-12" style="position:absolute; bottom:0;"><img class="low" src="http://via.placeholder.com/600x50"></div>
		</div>

		<script type="text/javascript">
			var hei = $('.left').outerHeight();
			$('.right').css('height',hei+'px');
		</script>
@endsection