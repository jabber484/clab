@extends('master')

@section('style')
<link href="{{asset("css/catalog.css")}}" rel="stylesheet">
<link href="{{asset("css/form.css")}}" rel="stylesheet">
@endsection	
	
@section('content')
<section class="project">
	<div class="container">
		@if($from == "booking")
		<div class="content-title">
			New Booking
		</div>

		<div class="col-xs-12">
			<div class="row">
				c!ab student conveners and/or staff will contact you shortly to verify the details of your booking. 
				<br>A confirmation e-mail will be sent to you once the booking is approved.
			</div>
		</div>
		@elseif($from == "register")
		<div class="content-title">
			Registeration
		</div>

		<div class="col-xs-12">
			<div class="row">
				You have completed your registeration. You can login <a href="/login">here</a>.
			</div>
		</div>
		@elseif($from == "approve")
		<div class="content-title">
			Booking Approval
		</div>

		<div class="col-xs-12">
			<div class="row">
				The Booking has been approved. It will be shown on calendar.
			</div>
		</div>
		@endif
		
	</div>
</section>


@endsection