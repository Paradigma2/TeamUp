<!--autor: Jana Kragovic 23/2015-->
@extends('navbar/navbar')

@section('link1')
	<a class="nav-link"  href="/home">Lobi</a>
@endsection

@section('link2')
	<a class="nav-link"  href="/search">Nađi saigrača</a>
@endsection

@section ('link4')
<a class="clearFormat bla"  href="inbox">
 <div style="margin-top: 10px; "> 

<i  id="sanduce" class="material-icons">&#xe625;</i>
 </div> 
</a>
@endsection



@section('link5')

        <div class="dropdown">

	 	<a class="nav-link dropdown-toggle mr-1" href="#" id="navbardrop" data-toggle="dropdown">
        {{Auth::user()->username}}
      </a>
      <div class="dropdown-menu">

        <a class="dropdown-item" href="showUser">Profil</a>
        <a class="dropdown-item" href="inbox">Inbox</a>
        <a class="dropdown-item" href="/logOut">Izloguj se</a>

      
       
    </div>
@endsection

<script>
  var timerID;
  var timerBlink;
  var b=0;
  var flag=true;
    function proveri(){

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function(){
        if(this.status==200 && this.readyState==4){
          if(this.responseText == "nova"){

            if(flag){
              flag=false;
             blink();
            }
         
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
       if(timerBlink) {
         clearTimeout(timerBlink); 
          flag=true;
         timerBlink  = 0;

     }
         
    }

    function blink(){
      if(b==0){
       document.getElementById("sanduce").innerHTML="&#xe85a";
            document.getElementById("sanduce").style.color="#184157";
             document.getElementById("sanduce").style.opacity="1";
             timerBlink=setTimeout("blink()", 500);
             b=1;
      }
      else{
           document.getElementById("sanduce").innerHTML="&#xe85a";
            document.getElementById("sanduce").style.color="DodgerBlue";
             document.getElementById("sanduce").style.opacity="1";
             timerBlink=setTimeout("blink()", 500);
             b=0;
      }
    }
</script>