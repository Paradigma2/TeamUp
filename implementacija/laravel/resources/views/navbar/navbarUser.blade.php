@extends('navbar')

@section('link1')
	<a href="#">Lobi</a>
@endsection

@section('link2')
	<a href="#">Pretraga igrača</a>
@endsection





@section('link5')
	 <div class="dropdown fright">
   		<a href="javascrip:void(0)" class="dropbtn">Nick</a>
    	<div class="dropdown-content">
      		<a href="profil_vlasnik_profila.html">Profil</a>
      		<a href="inbox.html">Inbox</a>
  		    <a href="lobby_gost.html">Log out</a>
		</div>
 	 </div>
@endsection