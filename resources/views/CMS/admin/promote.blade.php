<div class="col-xs-12">
	<div class="row">
		<div class="col-md-6">
			<div class="subtitle">Promote User To Admin</div>
			<div class="field">
				<form id="promote">
					<input type="text" name="sid">
					<button>Promote</button>
				</form>
			</div>
		</div>

		<div class="col-md-6">
			<div class="subtitle">Demote User</div>
			<div class="field">
				<form id="demote">
					<input type="text" name="sid">
					<button>Demote</button>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
$(function(){
	$( '#promote' ).submit(function ( e ) {
	    var data = new FormData(this);

	    $.ajax({ 
	    	url: "/admin/promote" ,
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

			alert(result['message']);
		});

	    e.preventDefault();
	});

	$( '#demote' ).submit(function ( e ) {
	    var data = new FormData(this);

	    $.ajax({ 
	    	url: "/admin/demote" ,
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

			alert(result['message']);
		});

	    e.preventDefault();
	});
});
</script>