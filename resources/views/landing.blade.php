@extends('master')

@section('style')
	<style type="text/css">
	.corner {
		border-bottom-left-radius: 5px;
		border-bottom: 1px solid #c4c4c4;
		border-left: 1px solid #c4c4c4;
		border-right: 1px solid #d6d4d4;
		border-top-left-radius: 8px;
		border-top: 1px solid #c4c4c4;
		padding: 10px; 
		text-align: center;
	}
	.para {
		height: 360px;
		padding-top: 20px;
		padding-bottom: 20px;
		background-color: #00b38a;
	}
	.intro-des {
		font-size: 20rem;
	}
	.intro-icon {
		font-size: 20rem;
	}
	</style>
@endsection	

@section('content')
	<div class="para">
		<div class="container">
			<div class="col-md-12">
				<span class="glyphicon glyphicon-flash intro-icon"></span>
				<span class="intro-des">Random bullshit</span>
			</div>
		</div>
	</div>
	<div class="barY"></div>
@endsection