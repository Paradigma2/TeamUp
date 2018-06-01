@extends('main')

@section('styles')
	<link rel="stylesheet" href="{{ URL::asset('css/stylelobby.css') }}">
@endsection

@section('navbar')
	@include('navbar/navbarGuest')
@endsection

@section('content')
	<div class="container mt-3">
		<div class="row">
			<div class="col-sm-1">&nbsp;</div>
			<div class="col-sm-10 article">
				
				@isset($greska)
					{{$greska}}
				@endisset
				@isset ($notMember)
				    {{$notMember}}
				@endisset
				
				
				<form class="m-5" name="registerForm" action="registerUser" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-4 ">
								<h4><label for="username">Korisnicko ime:</label></h4>
							</div>
							<div class="col-sm-8">
								
								 <input type="text" class="form-control" id="username" name="username" placeholder="
								 <?php
								 if($errors->has('username')){
								 	foreach($errors->get('username') as $error){
								 		if($error == "The username field is required."){
								 			echo "Morate uneti korisnicko ime";
								 		}
								 		if($error == "The username has already been taken."){
								 			echo "Korisnicko ime je zauzeto";
								 		}
								 	}
								 }
								 ?>">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-4 ">
								<h4><label for="pass">Sifra:</label></h4>
							</div>
							<div class="col-sm-8">
								 <input type="password" class="form-control" id="pass" name="pass" placeholder="
								 <?php
								 if($errors->has('pass')){
								 	foreach($errors->get('pass') as $error){
								 		if($error == "The pass field is required."){
								 			echo "Morate uneti lozinku";
								 		}
								 }
								 }
								 ?>">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-4 ">
								<h4><label for="passConfirm">Potvrdite sifru:</label></h4>
							</div>
							<div class="col-sm-8">
								 <input type="password" class="form-control" id="passConfirm" name="passConfirm"placeholder="
								 <?php
								 if($errors->has('passConfirm')){
								 	foreach($errors->get('passConfirm') as $error){
								 		if($error == "The pass confirm field is required."){
								 			echo "Morate potvrditi lozinku";
								 		}
								 		
								 }
								 }
								 ?>">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-4 ">
								<h5><label for="lolUsername">Korisnicko ime na LoL-u:</label></h5>
							</div>
							<div class="col-sm-8">
								 <input type="text" class="form-control" id="lolUsername" name="lolUsername"placeholder="
								 <?php
								 if($errors->has('lolUsername')){
								 	foreach($errors->get('lolUsername') as $error){
								 		if($error == "The lol username field is required."){
								 			echo "Morate uneti korisnicko ime";
								 		}
								 		if($error == "The lol username has already been taken."){
								 			echo "Vec ste registrovani";
								 		}
								 }
								 }
								 ?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 d-flex justify-content-center">
							
									 <button type="button" class="btn btn-primary btn-sm"><a class="nav-link" href=/guestLobby style="color:white;">Odustani</a></button>
								
							</div>
							<div class="col-sm-8">
							 <button type="submit" class="btn btn-primary" style="width:100%;">Registruj se</button>
						</div>
							
						</div>
						
					</div>
					   
				</form>

			</div>
			<div class="col-sm-1">&nbsp;</div>
		</div>

	</div>
@endsection