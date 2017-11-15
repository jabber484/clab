@extends('master')

@section('style')
<link href="{{asset("css/catalog.css")}}" rel="stylesheet">
@endsection	

@section('content')
<section class="catalog">
	<div class="container">
		<div class="content-title">
			Catalogue
		</div>
		@include("parts.catalogShowcase")
@endsection