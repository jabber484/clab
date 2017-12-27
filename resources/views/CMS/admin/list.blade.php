<div class="col-xs-12">
	<div class="row">
		<div class="col-md-6">
			<div class="subtitle">Import User List</div>
			<div class="field">
				<div class="import-list">
			 		<input type="file" name="files[]" multiple="multiple" title="Click to add Files">
				</div>
				<div class="import-list-log" style="display: none"></div>
				<a href="/admin/export/sample"><button>Sample</button></a>
			</div>
		</div>

		<div class="col-md-6">
			<div class="subtitle">Export User List</div>
			<div class="field">
				<a href="/admin/export/list"><button>Download</button></a>
			</div>
		</div>
	</div>
</div>

<script>
$(function(){
	$(".import-list").dmUploader({
		url: "/admin/import/list",
		method: "post",
		maxFileSize: 2500000,
		onInit: function(){
		  // console.log('Plugin successfully initialized');
		},
		onUploadProgress: function(id,percent){
			$(".import-list").hide();
			$(".import-list-log").show();
			$(".import-list-log").empty();
			$(".import-list-log").html("Uplaoding..."+ percent + "%");
		},
		onNewFile: function(id, file){
			uploading = 1;
			// name = file.name;	
		},
		onUploadSuccess: function(id, data){
		  // console.log('Server response was:');
		  // console.log(data);
			$(".import-list").hide();
			$(".import-list-log").show();
			$(".import-list-log").empty();
			$(".import-list-log").html("Uploaded, inserted " + data['inserted'] + " record(s).");
			uploading = 0;
		},
		onUploadError: function(id, message){
			$(".import-list").hide();
			$(".import-list-log").show();
			$(".import-list-log").empty();
			$(".import-list-log").html("Upload Error: Check your list");
		},
		maxFiles: 1,
	});
});
</script>