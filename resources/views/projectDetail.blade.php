@extends('master')

@section('style')
<link href={{asset("css/project-detail.css")}} rel="stylesheet">
@endsection	

@section('content')
<section class="project">
	<div class="container">
		<div class="content-title">
			Projects
		</div>
		<div class="col-md-12">
			<div class="project-title">{{$data['name']}}</div>
		    <div class="project-date">
	    	@if($data['isIdea'] == 1)
	    		{{"Idea"}}
	    	@endif	
		    </div>
		    <div class="project-detail" id="project-{{$data["id"]}}">
		    	{!!$data['description']!!}
		    </div>
    		<div class="project-img">
				<img src={{$data['picture']}}>
		    </div>
		</div>
	</div>
</section>

<script>

</script>
@endsection