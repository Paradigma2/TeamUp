@extends('inbox/inbox')
	
@section('styles')
	<link rel="stylesheet" href="{{ URL::asset('css/styleInbox.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/styleprofile.css') }}">	
@endsection


@section('navbar')


	@include('navbar/navbarAdmin')

	
@endsection

