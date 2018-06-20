@extends('main')

@section('styles')
	<link rel="stylesheet" href="{{ URL::asset('css/stylelobby.css') }}">
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<img src={{ URL::asset('slike/carousel3.jpg') }} alt="Error_img" style="width: 800px; height: 450px; margin: 30px;"/>
			</div>
			<div class="col-md-12">
				<label style="position: center; font-size: 30px;">ERROR</label>
			</div>
		</div>
	</div>
@endsection