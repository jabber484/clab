@extends('master')

@section('style')
<link href={{asset("css/form.css")}} rel="stylesheet">
@endsection	
	
@section('content')
<section class="project">
	<div class="container">
		<div class="content-title">
			New Project
		</div>

		<div class="col-xs-12">
			{{-- Title --}}
			<div class="subtitle">Title</div>
			<div class="field">
				<input style="width: 100%;" type="text" id="title" name="title" value="" maxlength="255" class="form-text required">
			</div>

			{{-- Categories --}}
			<div class="subtitle">Categories</div>
			<div class="field">
				<select id="cat" name="cat">
					@foreach($type as $id => $name)
					<option value="{{$id}}">{{$name[0]['name']}}</option>
					@endforeach
				</select>
			</div>
					
			{{-- Idea --}}
			<div class="subtitle">Is an Idea?</div>
			<div class="field">
				<input id="idea" type="checkbox" name="idea" value="1"> Yes
			</div>

			{{-- Date --}}
			<div class="subtitle">Date (Not required for Idea)</div>
			<div class="field">
				<div class="col-xs-12 col-sm-6">
					{{-- From --}}
					<div class="subtitle">From</div>
					<div class="field">
						<select id="fYear">
							@for ($i = 2016; $i <= 2047; $i++)
							<option value="{{$i}}">{{$i}}</option>
							@endfor
						</select>
						<select id="fMonth">
							@for ($i = 1; $i <= 12; $i++)
							<option value="{{$i<10?'0'.$i:$i}}">{{$i<10?'0'.$i:$i}}</option>
							@endfor
						</select>
						<select id="fDay">
							@for ($i = 1; $i <= 31; $i++)
							<option value="{{$i<10?'0'.$i:$i}}">{{$i<10?'0'.$i:$i}}</option>
							@endfor
						</select>
					</div>
				</div>
				
				<div class="col-xs-12 col-sm-6">
					{{-- To --}}
					<div class="subtitle">To</div>
					<div class="field">
						<select id="tYear">
							@for ($i = 2016; $i <= 2047; $i++)
							<option value="{{$i}}">{{$i}}</option>
							@endfor
						</select>
						<select id="tMonth">
							@for ($i = 1; $i <= 12; $i++)
							<option value="{{$i<10?'0'.$i:$i}}">{{$i<10?'0'.$i:$i}}</option>
							@endfor
						</select>
						<select id="tDay">
							@for ($i = 1; $i <= 31; $i++)
							<option value="{{$i<10?'0'.$i:$i}}">{{$i<10?'0'.$i:$i}}</option>
							@endfor
						</select>
					</div>
				</div>
			</div>
			
			{{-- Image --}}
			<div class="subtitle">Photo</div>
			<div class="field">
				<div class="cover-wrapper">
			 		<input type="file" name="files[]" multiple="multiple" title="Click to add Files">
				</div>
				<div class="cover-log" style="display: none"></div>
			</div>

			{{-- Content --}}
			<div class="subtitle">Short Description</div>
			<div class="field">
				<textarea2></textarea2>
			</div>

			{{-- Content --}}
			<div class="subtitle">Full Description</div>
			<div class="field">
				<textarea></textarea>
			</div>
			
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					{{-- Name --}}
					<div class="subtitle">Creator/Organization</div>
					<div class="field">
						<input style="width: 100%;" type="text" id="alias" name="creater" value="" maxlength="255" class="form-text required">
					</div>
				</div>
				
				<div class="col-xs-12 col-sm-6">
					{{-- Contact --}}
					<div class="subtitle">Contact</div>
					<div class="field">
						<input style="width: 100%;" type="text" id="contact" name="contact" value="" maxlength="255" class="form-text required">
					</div>
				</div>
			</div>
			

			<div class="field submit-btn">
				<button class="btn btn-success">Submit</button>
			</div>
		</div>
	</div>
</section>



<script>
var path = null;
var name;
var uploading = 0;

$(".cover-wrapper").dmUploader({
	url: "/project/new/post/image",
	method: "post",
	maxFileSize: 2500000,
	onInit: function(){
	  // console.log('Plugin successfully initialized');
	},
	onUploadProgress: function(id,percent){
		$(".cover-wrapper").hide();
		$(".cover-log").show();
		$(".cover-log").empty();
		$(".cover-log").html("Uplaoding..."+ percent + "%");
	},
	onNewFile: function(id, file){
		uploading = 1;
		name = file.name;	
	},
	onUploadSuccess: function(id, data){
	  // console.log('Server response was:');
	  // console.log(data);
		$(".cover-wrapper").hide();
		$(".cover-log").show();
		$(".cover-log").empty();
		$(".cover-log").html("Uplaoded " + name);
		path = data;
		uploading = 0;
	},
	maxFiles: 1,
});

$('textarea').froalaEditor({
	height: 300
});
$('textarea2').froalaEditor({
	height: 100
});

$('.submit-btn').click(function(){

	if (uploading == 1){
		alert("Please wait for image to be uploaded.")
	}
	$.post("/project/new/post" ,
		{ title : $('#cat').val(),
		  cat : $('#cat').val(), 
		  Idea: $('#idea').html() == 1 ? 1 : 0,
		  fDate: $('#fYear').val() + '-' + $('#fMonth').val()+ '-' + $('#fDay').val(),
		  tDate: $('#tYear').val()+ '-' + $('#tMonth').val()+ '-' + $('#tDay').val(),
		  picture : path, 
		  short : $('textarea2').froalaEditor('html.get'), 
		  full : $('textarea').froalaEditor('html.get'), 
		  sid : {{Session::get('sid')}},
		  alias : $('#alias').val(),
		  contact : $('#contact').val(),
	})
	.fail(function(xhr, ajaxOptions, thrownError) {
	    console.log(xhr.responseText);
	    console.log(thrownError);
	    console.log('Ajax Error');
	}).done(function(xhr, ajaxOptions, thrownError) {
		window.location.replace("/project/"+xhr);
	});
});

</script>
@endsection