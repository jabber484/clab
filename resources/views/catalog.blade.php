@extends('master')

@section('style')
<link href="{{asset("css/catalog.css")}}" rel="stylesheet">
@endsection	

@section('content')
<section class="catalog">
	<div class="container">
		<div class="content-title">
			Booking Scheme
		</div>
		<div class="col-xs-12">
			<div style="text-align: left;">
				<div>c!ab is transformed into new space with partitioning and malleably, the student organizations are welcome to book the Create Zone to develop their prototypes. </div>
				<br>
				<div>Just follow THREE simple steps as below:</div>

				<ol>
					<li>Click <a href="https://drive.google.com/file/d/0B5m3lThorp6BdnBUd1ZYcHFIQjg/view?usp=sharing">here</a> to download the guideline, application form and agreement</li>
					<li>Fill in the application form of Student Organization Booking Scheme</li>
					<li>Submit the application form together with the signed agreement and various supporting documents to clab.wys@cuhk.edu.hk or simply send the hardcopy to the General Office of Wu Yee Sun College</li>
				</ol>

				<div>c!ab student conveners and/or staff will contact you shortly to verify the details of your booking. A confirmation e-mail will be sent to you once the booking is approved.</div>
			</div>
		</div>
	</div>
</section>
<section class="catalog">
	<div class="container">
		<div class="content-title">
			Catalogue
		</div>
		@include("parts.catalogShowcase")
	</div>
</section>
@endsection