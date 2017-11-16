@foreach($data['project'] as $key => $entry)
<div class="col-sm-6 col-md-3 showcase" id="{{$entry['id']}}">
	<div class="project-wrapper">
	    <div class="project-img">
			<img src="{{asset($entry['thumbnail'])}}">
	    </div>
	    <div class="project-title">
	    	<div class="project-title-word">{{$entry['name']}}</div>
	    	<div class="project-date">{{$entry['isIdea'] == 1 ? "Idea" : $entry['fromDate']}}</div>
	    </div>
	    <div class="project-des">
		    <div class="project-detail">
		    	{!!$entry["short_des"]!!}
		    </div>
		    <div class="project-link"><a href="/project/{{$entry["id"]}}">Detail</a></div>
		</div>
	</div>
	<div class="project-stream">
		<div class="project-stream-word stream-{{$entry["streamNum"]}}">{{$entry["type"]}}</div>
	</div>
</div>
@endforeach

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