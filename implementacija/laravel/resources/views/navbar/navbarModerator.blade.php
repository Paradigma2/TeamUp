@extends('navbar/navbar')

@section('link1')
	<a class="nav-link"  href="#">Lobi</a>
@endsection

@section('link2')
	<a class="nav-link"  href="#">Nađi saigrača</a>
@endsection

@section('link3')
	<a class="nav-link"  href="#">Članci</a>
@endsection





@section('link5')
	<div class="dropdown ">

	 	<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Nick
      </a>
      <div class="dropdown-menu">

        <a class="dropdown-item" href="#">Profil</a>
        <a class="dropdown-item" href="#">Inbox</a>
        <a class="dropdown-item" href="#">Log out</a>

      
       
    </div>


@endsection
