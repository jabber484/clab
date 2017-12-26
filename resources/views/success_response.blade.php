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
				You have completed your booking.<br>Please refer to you confirmation email in your registered e-mail address.
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
		@endif
		
	</div>
</section>


@endsection