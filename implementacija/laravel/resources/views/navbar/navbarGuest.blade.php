@extends('navbar/navbar')

@section('link1')
	<a class="nav-link" href="/guestLobby">Lobi</a>
@endsection


@section('link4')
	<a class="nav-link"  href="/registerForm">Register</a>
@endsection

<!-- potencijalno izbrisati -->
@section('link5')
	<a class="nav-link"  href="/guestLobby#logInModal" data-toggle="modal">Login</a>
@endsection
