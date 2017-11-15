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
		<div class="col-xs-12">
			@include("parts.projectShowcase")
		</div>
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