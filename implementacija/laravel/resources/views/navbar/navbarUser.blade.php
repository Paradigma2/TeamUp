@extends('navbar/navbar')

@section('link1')
	<a class="nav-link"  href="/showUserLobby">Lobi</a>
@endsection

@section('link2')
	<a class="nav-link"  href="#">Nađi saigrača</a>
@endsection





@section('link5')

        <div class="dropdown">

	 	<a class="nav-link dropdown-toggle mr-1" href="#" id="navbardrop" data-toggle="dropdown">
        {{Auth::user()->username}}
      </a>
      <div class="dropdown-menu">

        <a class="dropdown-item" href="#">Profil</a>
        <a class="dropdown-item" href="#">Inbox</a>
        <a class="dropdown-item" href="/logOut">Log out</a>

      
       
    </div>
@endsection