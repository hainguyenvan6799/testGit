<form method="post" action="{{route('postFile')}}" enctype="multipart/form-data">
	{{csrf_field()}}
	<input type="file" name="myfile">
	<input type="submit">
</form>