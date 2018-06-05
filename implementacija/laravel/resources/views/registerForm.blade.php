@extends('main')

@section('styles')
	<link rel="stylesheet" href="{{ URL::asset('css/stylelobby.css') }}">
@endsection

@section('navbar')
	@include('navbar/navbarGuest')
@endsection

@section('content')
	<div class="container mt-3">
		@if(Session::has('errors'))
		<div class="row">
			<div class="col-sm-1">&nbsp;</div>
			<div class="col-sm-10">
				@foreach($errors->all() as $error)
					      			 <div class="alert alert-primary" style="text-align: center;">
									{{$error}}
									</div>
					   			 @endforeach
			</div>
			<div class="col-sm-1">&nbsp;</div>
		</div>
		@endif
		@isset ($notMember)
			<div class="row">
			<div class="col-sm-1">&nbsp;</div>
			<div class="col-sm-10">
				 <div class="alert alert-primary" style="text-align: center;">
				    {{$notMember}}
				    </div>
				    </div>
			<div class="col-sm-1">&nbsp;</div>
		</div>
		@endisset
		@isset ($notSame)
			<div class="row">
			<div class="col-sm-1">&nbsp;</div>
			<div class="col-sm-10">
				 <div class="alert alert-primary" style="text-align: center;">
				    {{$notSame}}
				    </div>
				    </div>
			<div class="col-sm-1">&nbsp;</div>
		</div>
		@endisset
		<div class="row">
			<div class="col-sm-1">&nbsp;</div>
			<div class="col-sm-10 article">
				
				@isset($greska)
					{{$greska}}
				@endisset
				
				
				
				<form class="m-5" name="registerForm" action="registerUser" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-4 ">
								<h4><label for="username">Korisnicko ime:</label></h4>
							</div>
							<div class="col-sm-8">
								
								 <input type="text" class="form-control" id="username" name="korisnickoIme">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-4 ">
								<h4><label for="pass">Sifra:</label></h4>
							</div>
							<div class="col-sm-8">
								 <input type="password" class="form-control" id="pass" name="sifra">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-4 ">
								<h4><label for="passConfirm">Potvrdite sifru:</label></h4>
							</div>
							<div class="col-sm-8">
								 <input type="password" class="form-control" id="passConfirm" name="potvrdaSifre">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-4 ">
								<h5><label for="lolUsername">Korisnicko ime na LoL-u:</label></h5>
							</div>
							<div class="col-sm-8">
								 <input type="text" class="form-control" id="lolUsername" name="lolUsername">
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

	<div class="modal fade" id="logInModal">
	   <div class="modal-dialog modal-dialog-centered">
	     <div class="modal-content pages">
	     	
	       <!-- Modal body -->
	       <div class="modal-body">
	       	 <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
	         <form class="m-5" name="logInForm" method="post" action="login">
	         	
	         	<div class="form-group">
	         		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	         		<div class="row">
	         			<div class="col-sm-5">
	         				<h5><label for="username">Korisnicko ime:</label></h5>
	         			</div>
	         			<div class="col-sm-7">
	         				 <input type="text" class="form-control" id="username" name="username">
	         			</div>
	         		</div>
	         	</div>
	         	<div class="form-group">
	         		<div class="row">
	         			<div class="col-sm-5 ">
	         				<h5><label for="pass">Sifra:</label></h5>
	         			</div>
	         			<div class="col-sm-7">
	         				 <input type="password" class="form-control" id="pass" name="password">
	         			</div>
	         		</div>
	         	</div>
	         	<div class="row">
	         		<div class="col-sm-5 d-flex justify-content-center">
	         			
	         					 <button type="button" class="btn btn-primary" data-dismiss="modal">Odustani</button>
	         				
	         			</div>
	         			<div class="col-sm-7">
	         			<button type="submit" class="btn btn-primary" style="padding:7px;" >Uloguj se</button>
	         		</div>
	         			
	         		</div>
	         		
	         	</div>
	         	   
	         </form>
	       </div>
	      
	       
	     </div>
	   </div>
	 </div>
@endsection