@extends('master')

@section('style')
<link href="{{asset("css/form.css")}}" rel="stylesheet">
@endsection	

@section('content')
<section class="guideline">
	<div class="container">
		<div class=" col-xs-12 content-title">
			Admin Section
		</div>

		@include('CMS.admin.list')
		@include('CMS.admin.promote')
		@include('CMS.admin.email')
		{{-- @include('CMS.admin.catalog') --}}
	</div>
</section>

@endsection