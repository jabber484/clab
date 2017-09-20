@extends('master')

@section('style')
<link href="css/project.css" rel="stylesheet">
@endsection	

@section('content')
<section class="project">
	<div class="container">
		<div class="content-title">
			Projects
		</div>
		
		@include("parts.project")
	</div>
</section>

<script>
$(".project-detail").dotdotdot({
	ellipsis	: '... ',
	wrap		: 'word',
	fallbackToLetter: true,
	watch: "window"
});
$(".project-title-word").dotdotdot({
	ellipsis	: '... ',
	wrap		: 'word',
	fallbackToLetter: true,
	watch: "window"
});
</script>
@endsection