@extends('master')

@section('style')
<link href="{{asset("css/project.css")}}" rel="stylesheet">
@endsection	

@section('content')
<section class="project">
	<div class="container">
		<div class="content-title">
			Projects
		</div>
		
		<input class="search-bar" type="text" name="projectSearch" placeholder="Search">
		<div class="col-xs-12">
			@include("parts.projectShowcase")
		</div>
		<div class="project-empty col-xs-12" style="display:none;">
			No Result
		</div>
	</div>
</section>

<script>
var data = JSON.parse('{!!json_encode($data['search'])!!}');
// console.log(data);

function hideAllItems(){
	$(".showcase").css("display","none");
}

// function showTitle(id){
// 	$(".catalog-subtitle-wrapper#"+id).css("display","block");
// }

function showItem(id){
	$(".showcase#"+id).css("display","block");
}

// function showSubsection(id){
// 	showTitle(id);
// 	$(".catalog-subtitle-wrapper#"+id+" .item-wrapper").css("display","block");
// }

function hideEmtpyMsg(){
	$(".project-empty").css("display","none");
}

function showEmtpyMsg(){
	$(".project-empty").css("display","block");
}

//search
$('.search-bar').keyup(function(event) {
	if ( event.which == 13 )
	   event.preventDefault();

	var seed = $('.search-bar').val().toLowerCase();
	var result = [];
	var isType = false;
	var lengthSum = 0;

	hideEmtpyMsg();
	hideAllItems();
	// hideAllTitles();

	//match
	$.each(data, function(id,records){
		// type = type.toLowerCase().replace(" ","-");
		// result[type] = [];

		if(records.toLowerCase().includes(seed)){
			result.push(id);
		}

		// if(type.toLowerCase() == seed){
		// 	isType = true; 
		// } else {
		// 	$.each(records, function(index,record){
		// 		if(record.name.toLowerCase().includes(seed) || record.description.toLowerCase().includes(seed)){
		// 			result[type].push(record.id);
		// 		}
		// 	});
		// }
	});
// console.log(result);
	//render
	if(isType){
		showSubsection(seed.replace(" ","-"));
	} else {		
		if(result.length == 0)
			showEmtpyMsg();

		$.each(result, function(key,id){
			showItem(id);
		});
	}
});

</script>

@endsection