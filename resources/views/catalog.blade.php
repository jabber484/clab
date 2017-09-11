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
			@foreach($payload as $type => $records)
			<div class="form-check">
				<label class="form-check-label">
					<input class="form-check-input search-checkbox" type="checkbox" name="search" value="{{str_replace(" ","-",strtolower($type))}}">
					{{$type}}
				</label>
			</div>
			@endforeach
		</div>
		<div class="catalog-empty col-xs-12" style="display:none;">
			No Result
		</div>
		@foreach($payload as $type => $records)
		<div class="col-xs-12 catalog-subtitle-wrapper" id="{{str_replace(" ","-",strtolower($type))}}">
			<div class="catalog-subtitle">{{$type}}</div>
			<div class="row">
				@foreach($records as $record)
				<div class="col-xs-12 col-sm-6 col-lg-4 item-wrapper" id="{{$record['id']}}">
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
var data = JSON.parse('{!!json_encode($payload)!!}');
console.log(data);

function hideAllItems(){
	$(".item-wrapper").css("display","none");
}

function hideAllTitles(){
	$(".catalog-subtitle-wrapper").css("display","none");
}

function showTitle(id){
	$(".catalog-subtitle-wrapper#"+id).css("display","block");
}

function showItem(id){
	$(".item-wrapper#"+id).css("display","block");
}

function showSubsection(id){
	showTitle(id);
	$(".catalog-subtitle-wrapper#"+id+" .item-wrapper").css("display","block");
}

function hideEmtpyMsg(){
	$(".catalog-empty").css("display","none");
}

function showEmtpyMsg(){
	$(".catalog-empty").css("display","block");
}

//search
$('.catalog-search-bar').keyup(function(event) {
	if ( event.which == 13 )
	   event.preventDefault();

	var seed = $('.catalog-search-bar').val().toLowerCase();
	var result = {};
	var isType = false;
	var lengthSum = 0;

	hideEmtpyMsg();
	hideAllItems();
	hideAllTitles();

	//match
	$.each(data, function(type,records){
		type = type.toLowerCase().replace(" ","-");
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

	//render
	if(isType){
		showSubsection(seed.replace(" ","-"));
	} else {		
		$.each(result, function(id,records){
			if(records.length > 0){
				lengthSum++;

				showTitle(id);
				$.each(records, function(index,itemId){
					showItem(itemId);
				});
			}
		});

		if(lengthSum == 0)
			showEmtpyMsg();
	}
});

//checkbox
$('input').click(function(event) {
	var input = $('.search-checkbox:checked');
	console.log(input);
	if(input.length == 0){
		$(".item-wrapper").css("display","block");
		$(".catalog-subtitle-wrapper").css("display","block");

		return;
	}

	hideAllItems();
	hideAllTitles();

	input.each(function(index) {
		showSubsection($(this).val());	
	});
});

</script>
@endsection