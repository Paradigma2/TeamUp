@extends('profile/profile')
	
@section('styles')
	<link rel="stylesheet" href="{{ URL::asset('css/styleProfile.css') }}">

@endsection


@section('navbar')


	@include('navbar/navbarUser')


@endsection




@section('editProfilePicture')

	
		Promeni sliku
	
@endsection

@section('promeniLozinku')
	<button  class="button" >Promeni lozinku</button>
@endsection

@section('kreirajOglas')
	<button  class="button"><a class="clearFormat" href="/createEditAdForm">Kreiraj oglas</a></button>
@endsection

@section('obrisiNalog')
	<button  class="button" type="button" > Obriši nalog </button>
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
