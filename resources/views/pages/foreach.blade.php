@extends('layout.master')

@section('NoiDung')
{{--Đây là chú thích--}}
	<?php $khoahoc = array("PHP","IOS"); ?>
	@if(!empty($khoahoc))
		@foreach($khoahoc as $value)
			{{$value}} 
			<br>
		@endforeach
	@else
		{{"Mảng rỗng"}}
	@endif
@endsection