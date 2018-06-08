<!--autor: Jana Kragovic 23/2015-->
@extends('profile/profile')
	
@section('styles')
	<link rel="stylesheet" href="{{ URL::asset('css/styleprofile.css') }}">

@endsection



@section('navbar')
	@if(Auth::user()->isMod)
		@include('navbar/navbarModerator')
	@else
		@include('navbar/navbarUser')
	@endif
@endsection




@section('editProfilePicture')

	
		Promeni sliku
	
@endsection

@section('promeniLozinku')
	<button  class="button" >Promeni lozinku</button>
@endsection

@section('kreirajOglas')
	<a class="clearFormat" href="createEditAdForm"><button  class="button">Kreiraj oglas</button></a>
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
