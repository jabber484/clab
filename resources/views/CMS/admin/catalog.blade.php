<div class="col-xs-12">
	<div class="row">
		<div class="col-md-6">
			<div class="subtitle">Add Catalog type</div>
			<div class="field">
				<form id="catalog_type">
					<input type="text" name="type">
					<button>Add</button>
				</form>
			</div>
		</div>

		<div class="col-md-6">
			<div class="subtitle">Add Catalog item</div>
			<div class="field">
				<div>Image should be in size of 120x150, <b>NO TRANSPARENT</b></div>
				<form id="catalog_item" enctype="multipart/form-data">
					<select name="type">
						@foreach($catalogue_type as $entry)
							<option value="{{$entry['id']}}">{{$entry['type']}}</option>
						@endforeach
					</select>
					<input type="text" name="name" placeholder="Item Name"><br>
					<input type="text" name="description" placeholder="Description" style="width: 100%">
					<input type="file" name="photo">
					<button>Add</button>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
$(function(){
	$( '#catalog_type' ).submit(function ( e ) {
	    var data = new FormData(this);
	    data.append('_token', '{{ csrf_token() }}');

	    $.ajax({ 
	    	url: "/admin/catalogue/type" ,
	    	type: 'POST',
			data: data,
			processData: false,
  			contentType: false,
		})
		.fail(function(xhr, ajaxOptions, thrownError) {
		    console.log(xhr.responseText);
		    console.log(thrownError);
			alert("Connection Error");
		    console.log('Ajax Error');
		}).done(function(xhr, ajaxOptions, thrownError) {
			var result = xhr;

			alert(result);
			location.reload();
		});

	    e.preventDefault();
	});

	$( '#catalog_item' ).submit(function ( e ) {
	    e.preventDefault();
	    var data = new FormData(this);
	    data.append('_token', '{{ csrf_token() }}');

	    $.ajax({ 
	    	url: "/admin/catalogue/item" ,
	    	type: 'POST',
			data: data,
			processData: false,
  			contentType: false,
		})
		.fail(function(xhr, ajaxOptions, thrownError) {
		    console.log(xhr.responseText);
		    console.log(thrownError);
			alert("Connection Error");
		    console.log('Ajax Error');
		}).done(function(xhr, ajaxOptions, thrownError) {
			var result = xhr;

			alert(result);
		});

	});

});
</script>