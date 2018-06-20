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

<a class="bla"  href="inbox"><i  id="sanduce" class="material-icons">&#xe625;</i></a>
 </div> 
@endsection

@section('link4')

<a href="" id="inboxlink"><i class="material-icons">chat</i></a>

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

<script>
  var timerID;
    function proveri(){

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function(){
        if(this.status==200 && this.readyState==4){
          if(this.responseText == "nova"){

         document.getElementById("sanduce").innerHTML="&#xe85a";
                 document.getElementById("sanduce").style.color="red";
          
          
          }else{
             document.getElementById("sanduce").innerHTML="&#xe625";
          }
        }
      }

      xmlhttp.open("GET", "novaporuka", true);
      xmlhttp.send();
      timerID  = setTimeout("proveri()", 5000);
    }
    function prekini(){
      if(timerID) {
         clearTimeout(timerID);   
         timerID  = 0;
     }
    }
</script>