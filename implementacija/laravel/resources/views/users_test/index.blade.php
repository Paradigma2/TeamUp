@extends('main')

@section('content')

@foreach($u as $a)

	<h1>{{ $a->Username }}</h1>
	<h2>{{ $a->LoLNick }}</h2>
	<br>
@endforeach
@endsection