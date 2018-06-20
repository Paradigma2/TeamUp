<!--autor: Sanja Perisic 97/2015-->
@extends('main')

@section('styles')
	<link rel="stylesheet" href="{{ URL::asset('css/stylearticles.css') }}"><link rel="stylesheet" href="{{ URL::asset('css/styleprofile.css') }}">
@endsection

@section('navbar')

	@include('navbar/navbarModerator')

@endsection

@section('content')
	<div class="container article mt-3">

		@if(Session::has('errors'))
<div class="row mt-3">
	
	<div class="col-sm-12 mt-3">
			 @foreach($errors->all() as $error)
      			 <div class="alert alert-primary" style="text-align: center;">
				{{$error}}
				</div>
   			 @endforeach
   			 
			</div>
		</div>
		
		@endif
		@isset ($greska)
		<div class="row mt-3">
	
	<div class="col-sm-12 mt-3">
   			 	 <div class="alert alert-primary" style="text-align: center;">
					{{$greska}}
				</div>
				</div>
		</div>
		
   			@endisset
		<div class="row">
			<div class="col-sm-12">

				@if($type == 'create')
				<form class="m-5" action="makeArticle" method="post">
				@else
				<form class="m-5" action="updateArticle" method="post">
					<input type="hidden" name="articleId" value="{{$article->id}}">
				@endif

					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-4 d-flex justify-content-center">
								<h4><label for="naslov">Naslov:</label></h4>
							</div>
							<div class="col-sm-8">
								@if($type=='create')
								 <input type="text" class="form-control" id="naslov" name="naslov">
								 @else
								 <input type="text" class="form-control" id="naslov" name="naslov" value="{{$article->headline}}">
								 @endif
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-4 d-flex justify-content-center">
								<h4><label for="tekst">Tekst:</label></h4>
							</div>
							<div class="col-sm-8">
								<textarea name="tekst" id="tekst" class="form-control" rows="13">@if($type=='edit'){{$article->content}}@endif</textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="row">
								<div class="col-sm-12 d-flex justify-content-center">
									 <a class="nav-link" href=/articles style="color:white;" ><button type="button" class="btn btn-primary">Odustani</button></a>
								</div>
								
							</div>
							
							
						</div>
						<div class="col-sm-8">
							 <button type="submit" name="bt" class="btn btn-primary nav-link" style="width:100%;">Objavi</button>
						</div>
				
					</div>
					   
				</form>
			</div>
		</div>
	</div>

@endsection