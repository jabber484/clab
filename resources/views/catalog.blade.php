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
		<div class="col-xs-12">
			<input class="catalog-search-bar" type="text" name="search" placeholder="Search">
		</div>
		@foreach($payload as $type => $records)
		<div id="{{str_replace(" ","-",$type)}}" class="col-xs-12">
			<div class="catalog-subtitle">{{$type}}</div>
			<div class="row">
				@foreach($records as $record)
				<div class="col-xs-12 col-sm-6 col-lg-4">
					<div class="item" id="{{$record['id']}}">
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
var data = JSON.parse('{!!json_encode($payload)!!}');
console.log(data);

function hideAllitam(){
	
}

//search
$('.catalog-search-bar').keyup(function(event) {
	if ( event.which == 13 )
	   event.preventDefault();
	
	var seed = $('.catalog-search-bar').val().toLowerCase();
	var result = {};
	var isType = false;

	$.each(data, function(type,records){
		type = type.replace(" ","-");
		result[type] = [];

		if(type.toLowerCase() == seed){
			isType = true; 
		} else {
			$.each(records, function(index,record){
				if(record.name.toLowerCase().includes(seed) || record.description.toLowerCase().includes(seed)){
					result[type].push(record.id);
				}
			});
		}
	});

	if(isType){
		// $('')
	} else {		
		console.log(result);
	}
});
</script>
@endsection