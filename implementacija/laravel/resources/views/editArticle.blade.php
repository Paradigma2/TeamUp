@extends('main')

@section('styles')
	<link rel="stylesheet" href="{{ URL::asset('css/stylearticles.css') }}">
@endsection

@section('navbar')

	@include('navbar/navbarUser')

@endsection

@section('content')
	<div class="container article mt-3">
		<div class="row">
			<div class="col-sm-12">
				<form class="m-5">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-4 d-flex justify-content-center">
								<h4><label for="naslov">Naslov:</label></h4>
							</div>
							<div class="col-sm-8">
								 <input type="text" class="form-control" id="naslov" name="naslov">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-4 d-flex justify-content-center">
								<h4><label for="tekst">Tekst:</label></h4>
							</div>
							<div class="col-sm-8">
								<textarea name="tekst" id="tekst" class="form-control" rows="13"></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="row">
								<div class="col-sm-6">
									 <button type="button" class="btn btn-primary"><a class="nav-link" href=/articles style="color:white;">Odustani</a></button>
								</div>
								<div class="col-sm-6">
									 <button type="button" class="btn btn-primary"><a class="nav-link" href="#" style="color:white;">Ubaci sliku</a></button>
								</div>
							</div>
							
							
						</div>
						<div class="col-sm-8">
							 <button type="submit" class="btn btn-primary nav-link" style="width:100%;">Objavi</button>
						</div>
					</div>
					   
				</form>
			</div>
		</div>
	</div>
@endsection