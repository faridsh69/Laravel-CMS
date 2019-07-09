@extends('layout.test')
@section('content')
<br>
<br>
<form action="{{ route('front.test.post-new-job') }}" method="post" enctype="multipart/form-data">
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
@endsection



