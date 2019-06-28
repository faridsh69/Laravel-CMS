<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="{{ asset('css/admin/vendors.bundle.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/admin/style.bundle.css') }}" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<link href="{{ asset('css/admin/custome.css') }}" rel="stylesheet" />
</head>
<body>
	<div class="container">
		<br>
		<br>
		<form action="{{ route('front.page.test-post-new-job') }}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label for="parentId">Parent Folder ID: (xxx-farid-test-upload) </label>
				<input type="text" class="form-control" name="parentId" id="parentId" value="01G2WUFWH43SLT2MFNSJDKSESHA7VXYKWI">
			</div>
			<div class="form-group">
				<label for="image">Parent Folder ID:</label>
				<input type="file" class="form-control" name="image" id="image" accept="image">
			</div>
			<button type="submit" class="btn btn-success">Submit</button>
		</form>
	</div>

	@include('common.admin.scripts')
	@if(Session::has('alert-success'))
	<script>
	    jQuery(document).ready(function() {
	        $.notify({"message": "{{ Session::get('alert-success') }}" },{"type":"success"});
	    });
	</script>
	@endif
</body>
</html>



