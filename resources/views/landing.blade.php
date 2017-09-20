@extends('master')

@section('style')
<link href="css/landing.css" rel="stylesheet">
@endsection	

@section('content')
{{-- @include('parts.fbpage') --}}

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
				@include('parts.project')
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
			<div id='calendar'></div>
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

		$('#calendar').fullCalendar({
	        header: {
	        	left:   'prev,next',
			    center: '',
			    right:  'title',
	        },
	        height: 520,
	        fixedWeekCount: false,
	        showNonCurrentDates: false
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