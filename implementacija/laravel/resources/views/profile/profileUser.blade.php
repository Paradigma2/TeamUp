@extends('profile/profile')
	
@section('styles')
	<link rel="stylesheet" href="{{ URL::asset('css/styleProfile.css') }}">

@endsection


@section('navbar')


	@include('navbar/navbarUser')


@endsection




@section('editProfilePicture')

	<button class="icon" id="profilnaSlika">
		<i class="material-icons " style="font-size: 20px">&#xe3c9;	</i> 
	</button >
@endsection

@section('btn1')
	<button id="promeniLozinku" class="button" href="">Promeni lozinku</button>
@endsection

@section('btn2')
	<button id="kreirajOglas" class="button" href="">Kreiraj oglas</button>
@endsection

@section('btn3')
	<button id="obrisi" class="button" href="">Obriši nalog</button>
@endsection