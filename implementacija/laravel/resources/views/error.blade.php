@extends('main')

@section('styles')
	<link rel="stylesheet" href="{{ URL::asset('css/stylelobby.css') }}">
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<img src={{ URL::asset('slike/greska.png') }} alt="Error_img"  />
			</div>
			<div class="col-md-6">
				<br>
				<br>
				<br>
				<br>
				<br>
<br>
				<br>
				<br>
				<label style="position: center; font-size: 50px;">404 - Stranica nije pronađena</label>
			</div>
		</div>
	</div>
@endsection