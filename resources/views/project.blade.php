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
		<div class="col-md-12">
			<div class="project-item panel-group">
				<div class="panel panel-default" id="project-1">
					<div class="panel-heading">Science & Technology</div>
			    	<div class="panel-body">
					    <div class="project-title">I Want To Kill Your Mum</div>
					    <div class="project-date">12 Sept ~ 14 Sept</div>
			    		<div class="project-img">
							<img src="https://scontent-hkg3-1.xx.fbcdn.net/v/t31.0-8/15002269_1331852580158450_7900758843559021126_o.jpg?oh=d992a682ebd8e757eba8c07b64f043fb&oe=5A5043EF">
					    </div>
					    <div class="project-detail" id="project-1">
					    	How does the implicit hog flip? How does the librarian conduct a crop? The buss discontinues the synonym. How does the implicit hog flip? How does the librarian conduct a crop? The buss discontinues the synonym. How does the implicit hog flip? How does the librarian conduct a crop? The buss discontinues the synonym. How does the implicit hog flip? How does the librarian conduct a crop? The buss discontinues the synonym. How does the implicit hog flip? How does the librarian conduct a crop? The buss discontinues the synonym. 
					    	<br>
					    	How does the implicit hog flip? How does the librarian conduct a crop? The buss discontinues the synonym. How does the implicit hog flip? How does the librarian conduct a crop? The buss discontinues the synonym. How does the implicit hog flip? How does the librarian conduct a crop? The buss discontinues the synonym. How does the implicit hog flip? How does the librarian conduct a crop? The buss discontinues the synonym. How does the implicit hog flip? How does the librarian conduct a crop? The buss discontinues the synonym. 

					    	How does the implicit hog flip? How does the librarian conduct a crop? The buss discontinues the synonym. How does the implicit hog flip? How does the librarian conduct a crop? The buss discontinues the synonym. How does the implicit hog flip? How does the librarian conduct a crop? The buss discontinues the synonym. How does the implicit hog flip? How does the librarian conduct a crop? The buss discontinues the synonym. How does the implicit hog flip? How does the librarian conduct a crop? The buss discontinues the synonym. 

					    	How does the implicit hog flip? How does the librarian conduct a crop? The buss discontinues the synonym. How does the implicit hog flip? How does the librarian conduct a crop? The buss discontinues the synonym. How does the implicit hog flip? How does the librarian conduct a crop? The buss discontinues the synonym. How does the implicit hog flip? How does the librarian conduct a crop? The buss discontinues the synonym. How does the implicit hog flip? How does the librarian conduct a crop? The buss discontinues the synonym. 
					    </div>
			    	</div>
			    	<div class="panel-footer">
			    		<a class="readmore" id="project-1" style="display: none;">Read More</a>
			    		<a class="readless" id="project-1" style="display: none;">Hide</a>
			    	</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script>
$(".project-detail").each(function(index){
	$(this).dotdotdot({
		ellipsis	: '... ',
		wrap		: 'word',
		fallbackToLetter: true,
		watch: "window",
		callback: function( isTruncated, orgContent ) {
			if(isTruncated){
				$('a.readmore#'+$(this).attr("id")).css("display","block");
			}
		},
	});
});

$('a.readmore').click(function(event) {
	var content = $(".project-detail#"+$(this).attr("id")).triggerHandler("originalContent");
	$(".project-detail#"+$(this).attr("id")).css("height","auto").html(content);
	$('a.readmore#'+$(this).attr("id")).css("display","none");
	$('a.readless#'+$(this).attr("id")).css("display","block");
});

$('a.readless').click(function(event) {
	$(".project-detail#"+$(this).attr("id")).css("height","200px").trigger('update');
	$('a.readmore#'+$(this).attr("id")).css("display","block");
	$('a.readless#'+$(this).attr("id")).css("display","none");
});

</script>
@endsection