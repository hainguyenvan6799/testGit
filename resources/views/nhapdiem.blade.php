<form action="{{route('diem')}}" method="GET">
	{{csrf_field()}}
	<h1>Nhập điểm</h1>
	<input type="number" name="txtdiem">
	<input type="submit">
</form>