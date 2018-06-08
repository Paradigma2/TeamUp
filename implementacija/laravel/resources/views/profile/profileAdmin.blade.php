@extends('profile/profile')
	
@section('styles')
	<link rel="stylesheet" href="{{ URL::asset('css/styleprofile.css') }}">

@endsection


@section('navbar')


	@include('navbar/navbarAdmin')


@endsection




@section('udaljiSaSajta')
	<button  class="button" href="">Udalji sa sajta</button>
@endsection

	


@section('unapredi')
	@if($isMod==0)
	<button class="button" href="">Postavi mod</button>
	@else
	<button  class="button" href="">Ukloni mod</button>
@endif
@endsection



@section('posaljiPorukuAdmin')
	<button  class="button" href="">Pošalji poruku</button>
@endsection

@section("btnSidebar1")
		<i class="material-icons" style="cursor:pointer;">delete</i>
@endsection

@section("btnSidebar2")
		<i class="material-icons" style="cursor:pointer;">delete</i>
@endsection

@section("icon12")
	<i class="material-icons" style="cursor:pointer;">delete</i>
@endsection

@section("icon22")
	<i class="material-icons" style="cursor:pointer;">delete</i>
@endsection

@section("icon32")
	<i class="material-icons" style="cursor:pointer;">delete</i>
@endsection