@extends('profile/profile')
	
@section('styles')
	<link rel="stylesheet" href="{{ URL::asset('css/styleProfile.css') }}">

@endsection


@section('navbar')


	@include('navbar/navbarModerator')


@endsection


@section('grade')
	<button class="mt-2 mb-2 buttonGrade btn-block" >
		Oceni korisnika
	</button>
@endsection


@section('btn1')
	<button  class="button" href="">Blokiraj</button>
@endsection

@section('btn2')
	<button  class="button" href="">Zaprati</button>
@endsection

@section('btn3')
	<button id="obrisi" class="button" href="">Pošalji poruku</button>
@endsection
