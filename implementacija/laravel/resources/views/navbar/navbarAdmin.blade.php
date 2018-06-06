@extends('navbar/navbar')



@section('link1')
	<a class="nav-link"  href="/home">Lobi</a>
@endsection



@section('link2')
	<a class="nav-link"  href="/search">Nađi saigrača</a>
@endsection


@section('link5')
	 
<div class="dropdown ">

	 	<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        {{Auth::user()->username}}
      </a>
      <div class="dropdown-menu">

              <a class="dropdown-item" href="showUser">Profil</a> 
        <a class="dropdown-item" href="#">Inbox</a>
        <a class="dropdown-item" href="/logOut">Log out</a>

      
       
    </div>


@endsection