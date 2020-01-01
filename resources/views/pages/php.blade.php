@extends('layout.master')

@section('NoiDung')
<h2>PHP</h2>
@if($khoahoc != '')
	{{$khoahoc}}
	<br>
	{!!$khoahoc!!}
@else
	{{"Không có khóa học được chọn."}}
@endif
<br>
<h3>Test vòng lặp for</h3>
@for($i = 0; $i <= 10; $i++)
	{{$i . ''}}
@endfor

@endsection
{{-- có 2 cách để khai báo biến trong laravel--}}

