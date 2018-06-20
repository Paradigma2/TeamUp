<!--autor: Jana Kragovic 23/2015-->
@extends('navbar/navbar')

@section('link1')
	<a class="nav-link"  href="/home">Lobi</a>
@endsection

@section('link2')
	<a class="nav-link"  href="/search">Nađi saigrača</a>
@endsection

@section('link3')
	<a class="nav-link"  href="/articles">Članci</a>
@endsection


@section ('link4')
 <div style="margin-top: 10px; "> 

<a class="clearFormat" href="inbox"><i class="material-icons">&#xe625;</i></a>
 </div> 
@endsection



@section('link5')
	<div class="dropdown ">

	 	<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        {{Auth::user()->username}}
      </a>
      <div class="dropdown-menu">

        <a class="dropdown-item" href="showUser">Profil</a>
        
        <a class="dropdown-item" href="inbox">Inbox</a>
        <a class="dropdown-item" href="/logOut">Log out</a>

      
       
    </div>


@endsection
