<!--autor: Jana Kragovic 23/2015-->
@extends('profile/profile')
	
@section('styles')
	<link rel="stylesheet" href="{{ URL::asset('css/styleprofile.css') }}">

@endsection


@section('navbar')


	@include('navbar/navbarModerator')


@endsection



@section('editProfilePicture')

	
		Promeni sliku
	
@endsection

@section('promeniLozinku')
	<button  class="button" href="">Promeni lozinku</button>
@endsection

@section('kreirajOglas')
	<button  class="button" href=""><a class="clearFormat" href="/createEditAdForm">Kreiraj oglas</a></button>
@endsection

@section('obrisiNalog')
	<button id="obrisi" class="button" href="">Obriši nalog</button>
@endsection

@section("editDescription")
	<i class="material-icons" style="cursor:pointer;">create</i>	
@endsection
@section("icon11")
	<i class="material-icons" style="cursor:pointer;">create</i>	
@endsection
@section("icon12")
	<i class="material-icons" style="cursor:pointer;">delete</i>	
@endsection

@section("icon21")
	<i class="material-icons" style="cursor:pointer;">create</i>	
@endsection

@section("icon22")
	<i class="material-icons" style="cursor:pointer;">delete</i>	
@endsection


@section("icon31")
	<i class="material-icons" style="cursor:pointer;">create</i>	
@endsection




@section("icon32")
	<i class="material-icons" style="cursor:pointer;">delete</i>	
@endsection
