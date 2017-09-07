@extends('master')

@section('style')
<link href="css/catalog.css" rel="stylesheet">
@endsection	

@section('content')
<section class="catalog">
	<div class="container">
		<div class="content-title">
			Catalogue
		</div>
		@foreach($payload as $type => $records)
		<div class="col-xs-12">
			<div class="catalog-subtitle">{{$type}}</div>
		</div>
		<div class="col-xs-12">
			<div class="row">
				@foreach($records as $record)
				<div class="col-xs-12 col-sm-6 col-lg-4">
					<div class="item">
						<div class="item-img">	
							<img src="{{asset('asset/catalogue/'.$record['id'].'.jpg')}}">
						</div>	
						<div class="item-des">
							<div class="item-title">{{$record['name']}}</div>
							<div class="item-subtitle">{{$record['description']}}</div>
						</div>
						<div class="item-book"><a href="/book?item={{$record['id']}}">Book this</a></div>
					</div>
				</div>
				@endforeach
			</div>
		</div>	
		@endforeach

	</div>
</section>

<script>

</script>
@endsection