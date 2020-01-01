@extends('layout.master')

@section('NoiDung')
<?php $khoahoc = array('PHP', 'Laravel', 'ASP.net'); ?>
	@forelse($khoahoc as $value)
	@continue($value == 'Laravel')
		{{$value}}
		<br>
	@empty
		{{"Mảng rỗng"}}

	@endforelse

@endsection