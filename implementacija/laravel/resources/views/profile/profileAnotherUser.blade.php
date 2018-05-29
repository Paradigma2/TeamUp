@extends('profile/profile')
	
@section('styles')
	<link rel="stylesheet" href="{{ URL::asset('css/styleProfile.css') }}">

@endsection


@section('navbar')


	@include('navbar/navbarUser')


@endsection


@section('grade')
	<button class="mt-2 mb-2 buttonGrade btn-block" >
		Oceni korisnika
	</button>
@endsection


@section('blokiraj')
	<button  class="button" href="">Blokiraj</button>
@endsection

@section('zaprati')
	<button  class="button" href="">Zaprati</button>
@endsection

@section('posaljiPorukuAdmin')
	<button id="obrisi" class="button" href="">Pošalji poruku</button>
@endsection
