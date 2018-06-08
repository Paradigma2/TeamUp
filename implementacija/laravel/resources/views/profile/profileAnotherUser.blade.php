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


@section('grade')
	<button class="mt-2 mb-2 buttonGrade btn-block" >
		Oceni korisnika
	</button>
@endsection


@section('blokiraj')
	@if($isAdmin==0)
	<button  class="button"  href="">Blokiraj</button>
	@endif
@endsection

@section('zaprati')
	@if($prati==0)
	<button  class="button" href="">Zaprati</button>
	@else
		<button  class="button" href="">Prekini praćenje</button>
	@endif
@endsection

@section('posaljiPorukuAdmin')
	<button id="obrisi" class="button" href="">Pošalji poruku</button>
@endsection
