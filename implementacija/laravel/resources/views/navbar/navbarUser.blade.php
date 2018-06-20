<!--autor: Jana Kragovic 23/2015-->
@extends('navbar/navbar')

@section('link1')
	<a class="nav-link"  href="/home">Lobi</a>
@endsection

@section('link2')
	<a class="nav-link"  href="/search">Nađi saigrača</a>
@endsection





@section('link5')

        <div class="dropdown">

	 	<a class="nav-link dropdown-toggle mr-1" href="#" id="navbardrop" data-toggle="dropdown">
        {{Auth::user()->username}}
      </a>
      <div class="dropdown-menu">

        <a class="dropdown-item" href="showUser">Profil</a>
        <a class="dropdown-item" href="inbox">Inbox</a>
        <a class="dropdown-item" href="/logOut">Log out</a>

      
       
    </div>
@endsection

<script>
    function proveri(){
       alert("cao");
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function(){
        if(this.status==200 && this.readyState==4){
          if(this.responseText == "nova"){

            //jano tvoj kod ovde
          }
        }
      }

      xmlhttp.open("GET", "novaporuka", true);
      xmlhttp.send();
    }
</script>