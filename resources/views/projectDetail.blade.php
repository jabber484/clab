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
			<div class="row">

			    <div class="col-md-6 project-detail" id="project-{{$data["id"]}}">
			    	<div class="project-title">{{$data['name']}}</div>
				    <div class="project-date">
			    	@if($data['isIdea'] == 1)
			    		{{"Idea"}}
			    	@endif	
			    	<div>{{$data['type']}}</div>
				    </div>

			    	
			    	{!!$data['description']!!}
			    </div>
		   		<div class="col-md-6 project-img">
					<img src={{$data['picture']}}>
			    </div>
		    </div>
		    
    		
		</div>
	</div>
	@if($data['alias'] != NULL && $data['contact'] != NULL)
	<div class="contact-content">
		<div class="container-fluid">
			Contact Project Creator:<br>
			{{$data['alias']}}<br>
			{{$data['contact']}}
		</div>
	</div>
	@endif
</section>

<script>

</script>
@endsection