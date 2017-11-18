@extends('master')

@section('style')
<link href="css/landing.css" rel="stylesheet">
@endsection	

@section('content')
<section class="membership">
	<div class="container">
		@if(!Session::has('auth') || Session::get('auth') == 0 )
		Login to C!ab before Booking Equipment or to Create Project. <a href="/login">Click here to login.</a>
		@else
		Logged in as {{Session::get('sid')}}. <a href="/logout">Logout Here.</a>
		@endif
	</div>
</section>

<section class="slides">
	<div class="container">
		<div id="slides" class="col-xs-12">
		    <img src="{{asset('asset/home/banner/hammer_fun.jpg')}}">
		    <img src="{{asset('asset/home/banner/banner.jpg')}}">
		    <img src="{{asset('asset/home/banner/banner1.jpg')}}">
		</div>
		<div class="col-md-12">
			@include('parts.tools')
		</div>
	</div>
</section>

<section class="project">
	<div class="container">
		<div class="col-xs-12">
			<div class="content-title">Project Showcase</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				@include('parts.projectShowcase')
			</div>
		</div>
	</div>
</section>

<section class="calendar-sec">
	<div class="container">
		<div class="col-xs-12">
			<div class="content-title">Event Calendar</div>
		</div>
		<div class="col-xs-12 calendar">
			@include("parts.calendar")
		</div>		
	</div>
</section>

<script>
	$(function(){
		$("#slides").slidesjs({
			width: 940,
			height: 300,
			play: {
		      active: true,
		      effect: "slide",
		      interval: 8000,
		      auto: true,
		      swap: true,
		      pauseOnHover: false,
		      restartDelay: 2500
		    },
		    callback: {
		      loaded: function(number) {
		        $('.slidesjs-previous').html("<span class='glyphicon glyphicon-chevron-left'></span>");
		        $('.slidesjs-next').html("<span class='glyphicon glyphicon-chevron-right'></span>");
		      },
		  	}
		});

	    $('section:even').css({
	    	"background": "#f5f5f5",
    		"borderLeft": "8px solid #c4e1d6",
    		"borderRight": "8px solid #c4e1d6",
	    });
	    $('section:odd').css({
	    	"background": "#e2e2e2",
    		"borderLeft": "8px solid #fee05a",
    		"borderRight": "8px solid #fee05a",
	    });

	    $(".project-detail").dotdotdot({
			ellipsis	: '... ',
			wrap		: 'word',
			fallbackToLetter: true,
			watch: "window"
	    });
	    $(".project-title-word").dotdotdot({
			ellipsis	: '... ',
			wrap		: 'word',
			fallbackToLetter: true,
			watch: "window"
	    });


	});
</script>
@endsection