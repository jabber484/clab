<style type="text/css">
.stream-1 { /* Art */
    background-color: #FF776B;
}
.stream-2 { /* Design */
    background-color: #FFB745;
}
.stream-3 { /* Entrepreneurship-and-Management */
    background-color: #CA5DFF;
}
.stream-4 { /* Sci-and-Tech */
    background-color: #52c7ff;
}
.stream-5 { /* Sociopolitical */
    background-color: #fff823;
}
.stream-wys { /* College related */
    background-color: #47F2B7;
}
</style>

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
		<div class="project-stream-word stream-{{$entry["streamNum"] > 5 ? 'wys' : $entry["streamNum"]}}">{{$entry["type"]}}</div>
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