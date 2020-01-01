<form method="post" action="{{route('postForm')}}">
	{{csrf_field()}}
	<input type="text" name="hoten">
	<input type="submit">

</form>
<!--{{csrf_field()}} phải có dòng này thì mới laravel mới cho submit -->
