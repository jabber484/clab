<div class="col-xs-12">
	<div class="row">
		<div class="col-md-6">
			<div class="subtitle">Add Admin Email</div>
			<div class="field">
				<form id="addEmail">
					<input type="text" name="email">
					<button>Add</button>
				</form>
			</div>
		</div>

		<div class="col-md-6">
			<div class="subtitle">Remove Admin Email</div>
			<div class="field">
				<form id="deleteEmail">
					<input type="text" name="email">
					<button>Remove</button>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
$(function(){
	$( '#addEmail' ).submit(function ( e ) {
	    var data = new FormData(this);

	    $.ajax({ 
	    	url: "/admin/email/add" ,
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

	    e.preventDefault();
	});

	$( '#deleteEmail' ).submit(function ( e ) {
	    var data = new FormData(this);

	    $.ajax({ 
	    	url: "/admin/email/delete" ,
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

	    e.preventDefault();
	});
});
</script>