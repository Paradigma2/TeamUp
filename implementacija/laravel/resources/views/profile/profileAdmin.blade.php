@extends('profile/profile')
	
@section('styles')
	<link rel="stylesheet" href="{{ URL::asset('css/styleProfile.css') }}">

@endsection


@section('navbar')


	@include('navbar/navbarAdmin')


@endsection




@section('btn1')
	<button  class="button" href="">Udalji sa sajta</button>
@endsection

@section('btn2')
	<button class="button" href="">Unapredi</button>
@endsection

@section('btn3')
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