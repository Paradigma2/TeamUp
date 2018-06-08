<!--autor: Jana Kragovic 23/2015-->

@extends('main')

@section('styles')
	<link rel="icon" href="slike/icon.png" type="image/png">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ URL::asset('css/styleprofile.css') }}">
@endsection


@if(Session::get('msgBlocked')!=null)

<div class="alert alert-primary alert-dismissible fade show" role="alert">
  <strong style="color:black;">{{Session::get('msgBlocked')}}</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif


@if(Session::get('msgComment')!=null)

<div class="alert alert-primary alert-dismissible fade show" role="alert">
  <strong style="color:black;">{{Session::get('msgComment')}}</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@section('content')

	<div class="row mt-3"  style="background-color: rgba(5,5,5,0.8); color:white;">
		<div class="col-sm-2 " >
			<div class="profilePicture m-4" width="185px">
				<img class="blur" border="2px" src="{{$profilePic}}"alt="Profilna slika" width="185px">
				<div class="editProfilePicture" >
					<button class="icon mt-1" >
						<i>@yield('editProfilePicture')</i>
					</button>
				</div>
			</div>
			
		</div>
		<div class="col-sm-2">
			<div class="container ml-2">
				<div class="row mt-3">
					<div class="col-sm-12">
						<h1>
							<label>{{$username}}
								
							</label>


						</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<h4>
							<label>
								 {{ $rank }}
							</label>
						</h4>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<h4>
							<label>
								Lvl {{$level}}
							</label>
						</h4>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
							
					@if($grade!=-1 && $grade!=null && $grade!=0)
						Ocena: {{$grade}}
					@else
						Ocena: 	Nema ocene
					@endif
					</div>
				</div>

			</div>
		</div>
		<div class="col-sm-2">

		</div>
		<div class="col-sm-2">

		</div>
		<div class="col-sm-2">
			<div class="container ">
				<div class="row mt-2">
					<div class="col-sm-12">
						@yield("posaljiPoruku")
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						@yield('btn5')
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						@yield('btn6')
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-2">
			<div class="container">
				<div class="row mt-2">
					<div class="col-sm-12">
						<a class="clearFormat" data-toggle="modal" href="#changePassword"> 
						@yield('promeniLozinku')
						</a>
						@yield('oceniKorisnika')
						<a class="clearFormat" data-toggle="modal" href="#udaljiSaSajta">
							@yield('udaljiSaSajta')
						</a>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						@yield('kreirajOglas')
						<a class="clearFormat" data-toggle="modal" href="#blokirajKor">
						@yield('blokiraj')
						</a>
						<a class="clearFormat"  href="unaprediKor?korisnik={{$username}}">
							@yield('unapredi')
						</a>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<a class="clearFormat" data-toggle="modal" href="#obrisiNalog"> 
						@yield('obrisiNalog')
						</a>
						<a class="clearFormat"  href="zapratiKor?pracenKorisnik={{$username}}">
							@yield('zaprati')
						</a>
						<a class="clearFormat" data-toggle="modal" href="#sendMessage">
							@yield('posaljiPorukuAdmin')
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="row mt-1">
	<div class="col-sm-9">
		<div class="row">
	

@if($niz1!=null)
	<div class="col-sm-4 mt-3">
			
			<div class="card  align-items-center" style="padding:10px;background-color: rgba(5,5,5,0.6); color:white">
				<div class=" ml-auto">
					<a href="showFormAd?ad={{$niz1['id']}}">
							@yield('icon11')


							<!--<i class="material-icons" style="cursor:pointer;">create</i>-->
					</a>
					<a data-toggle="modal" href="#deleteModal1">
						@yield('icon12')
					</a> 	
				</div>
				<div class="card-title">
				
					<h2 >
						<label id="pozicija1">
						{{$niz1['position']}}
						</label>
					</h2>


				</div>
				<div class="card-title">
					<h3 >
						<label id="mapa1">
							{{$niz1['mode']}}
						</label>
					</h3>
				</div>

				<div class="card-content  ">
					<img class="round" border="3px" src="{{$niz1['icon1']}}" alt="">
					@if($niz1['icon2']!=null) 
					<img class="round" border="3px" src="{{$niz1['icon2']}}" alt="">
					@endif
					@if($niz1['icon3']!=null) 
					<img class="round" border="3px" src="{{$niz1['icon3']}}" alt="">
					@endif
			
		
				</div>

				<div class="card-text m-4"  style="color:#9D907D;">
				{{$niz1['description']}} 
					
				</div>

			</div>

	
	</div>
@endif


@if($niz2!=null)
	<div class="col-sm-4 mt-3">
			
			<div class="card  align-items-center" style="padding:10px;background-color: rgba(5,5,5,0.6); color:white">
				<div class=" ml-auto">
					<a href="showFormAd?ad={{$niz2['id']}}">
							@yield('icon11')


							<!--<i class="material-icons" style="cursor:pointer;">create</i>-->
					</a>
					<a data-toggle="modal" href="#deleteModal2">
						@yield('icon12')
					</a> 	
				</div>
				<div class="card-title">
				
					<h2 >
						<label id="pozicija1">
						{{$niz2['position']}}
						</label>
					</h2>


				</div>
				<div class="card-title">
					<h3 >
						<label id="mapa1">
							{{$niz2['mode']}}
						</label>
					</h3>
				</div>

				<div class="card-content  ">
					<img class="round" border="3px" src="{{$niz2['icon1']}}" alt="">
					@if($niz2['icon2']!=null) 
					<img class="round" border="3px" src="{{$niz2['icon2']}}" alt="">
					@endif
					@if($niz2['icon3']!=null) 
					<img class="round" border="3px" src="{{$niz2['icon3']}}" alt="">
					@endif
			
		
				</div>

				<div class="card-text m-4"  style="color:#9D907D;">
				{{$niz2['description']}} 
					
				</div>

			</div>

	
	</div>
	@endif



	@if($niz3!=null)
	<div class="col-sm-4 mt-3">
			
			<div class="card  align-items-center" style="padding:10px;background-color: rgba(5,5,5,0.6); color:white">
				<div class=" ml-auto">
					<a href="showFormAd?ad={{$niz3['id']}}">
							@yield('icon11')


							<!--<i class="material-icons" style="cursor:pointer;">create</i>-->
					</a>
					<a data-toggle="modal" href="#deleteModal3">
						@yield('icon12')
					</a> 	
				</div>
				<div class="card-title">
				
					<h2 >
						<label id="pozicija1">
						{{$niz3['position']}}
						</label>
					</h2>


				</div>
				<div class="card-title">
					<h3 >
						<label id="mapa1">
							{{$niz3['mode']}}
						</label>
					</h3>
				</div>

				<div class="card-content  ">
					<img class="round" border="3px" src="{{$niz3['icon1']}}" alt="">
					@if($niz3['icon2']!=null) 
					<img class="round" border="3px" src="{{$niz3['icon2']}}" alt="">
					@endif
					@if($niz3['icon3']!=null) 
					<img class="round" border="3px" src="{{$niz3['icon3']}}" alt="">
					@endif
			
		
				</div>

				<div class="card-text m-4"  style="color:#9D907D;">
				{{$niz3['description']}} 
					
				</div>

			</div>


	</div>
	@endif	
	</div>	
</div>






	<div class="col-sm-3" >
			<div class=" card mt-3 sidebarCards" style="background-color: rgba(5,5,5,0.8)">
				<div class="ml-auto">
					<a data-toggle="modal" href="#editDescription">
						@yield('editDescription')
					</a>
				</div>
				<h4 class="card-title">
					Kada igram Lol:
				</h4>
				<br>
				<label class="card-text" style="color:#9D907D;">
						{{$descr}}
			
				</label>
			</div>

			<div class="card mt-3 sidebarCards"  >
				
  				  <h4 class="card-title ">Ocene i komentari:</h4>
  			
  				 	<div >
  				 	<a class="clearFormat" data-toggle="modal" href="#leaveComment">
					@yield("grade")
				</a>
				</div>
  				<div class="container-fluid">	
  					
  					<?php $i=0;?>
  					@foreach($comments as $comment)

  					<div class="row ">
  						<div class="card container-fluid " style="padding:15px;background-color: rgba(5,5,5,0.5);">
  							<div class="row">
  								<div class=" mr-2 ml-auto">
  									<a  href="obrisiKom?korisnik={{$username}}&komentar={{$comments[$i]->id}}">
										@yield('btnSidebar1')
									</a>
								</div>
							
								
								<div class="col-sm-12 ">
										<img style="margin-bottom:5px; margin-left:-5px; vertical-align:bottom " width="35px" alt="Profilna slika" src="{{$icons[$i]}}">
									{{$users[$i]}}
									
								
							    </div>
							
							</div>
						<div class="row" >
							<div class="card-text ml-2 mr-2"  style="color:#9D907D;">
								
								{{$comment->content}}
							</div>
							</div>
						
						<div class="row d-flex justify-content-end">


							<div class=" flex-col-sm-6">
								Ocena: {{$comment->grade}}
							</div>
						
						</div>
					</div>
					</div>
					<?php $i++;?>
					@endforeach
  				
  				
			</div>

		
	</div>
</div>

<!-- delete za prvo ad-->
	<div class="modal fade" id="deleteModal1">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content pages ">

	      <!-- Modal Header -->
	      <div class="modal-header ">
	        <h4 class="modal-title d-flex justify-content-center">Da li ste sigurni?</h4>
	        <button type="button" class="close" style="color:white;" data-dismiss="modal">&times;</button>
	      </div>

	      <!-- Modal body -->
	      

	      <!-- Modal footer -->
	      <div class="modal-body">
	      	<div class="row">
	      		<div class="col-sm-6">
	      			<form name="prva" method="post" action="deleteAd">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="id" value="

						@if($niz1!=null)
						{{$niz1['id']}}
						@endif
						">
		
	      				<button type="submit" class="buttonGrade btn-block	" style="padding:7px;"  >Potvrdi</button>
	      			</form>
	      		</div>
	      		<div class="col-sm-6">
	      			<button type="button" class="buttonGrade btn-block" style="padding:7px;" data-dismiss="modal">Odustani</button>
	      		</div>
	      		
	      	</div>
	        
	        
	      </div>

	    </div>
	  </div>
	</div>


<!-- delete za drugi ad-->
	<div class="modal fade" id="deleteModal2">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content pages ">

	      <!-- Modal Header -->
	      <div class="modal-header ">
	        <h4 class="modal-title d-flex justify-content-center">Da li ste sigurni?</h4>
	        <button type="button" class="close" style="color:white;" data-dismiss="modal">&times;</button>
	      </div>

	      <!-- Modal body -->
	      

	      <!-- Modal footer -->
	      <div class="modal-body">
	      	<div class="row">
	      		<div class="col-sm-6">
	      			<form name="druga" method="post" action="deleteAd">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="id" value="

						@if($niz2!=null)
						{{$niz2['id']}}
						@endif
						">
		
	      				<button type="submit" class="buttonGrade btn-block	" style="padding:7px;"  >Potvrdi</button>
	      			</form>
	      		</div>
	      		<div class="col-sm-6">
	      			<button type="button" class="buttonGrade btn-block" style="padding:7px;" data-dismiss="modal">Odustani</button>
	      		</div>
	      		
	      	</div>
	        
	        
	      </div>

	    </div>
	  </div>
	</div>


<!-- delete za treci ad-->
	<div class="modal fade" id="deleteModal3">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content pages ">

	      <!-- Modal Header -->
	      <div class="modal-header ">
	        <h4 class="modal-title d-flex justify-content-center">Da li ste sigurni?</h4>
	        <button type="button" class="close" style="color:white;" data-dismiss="modal">&times;</button>
	      </div>

	      <!-- Modal body -->
	      

	      <!-- Modal footer -->
	      <div class="modal-body">
	      	<div class="row">
	      		<div class="col-sm-6">
	      			<form name="treca" method="post" action="deleteAd">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="id" value="
						@if($niz3!=null)
						{{$niz3['id']}}">
						@endif
		
	      				<button type="submit" class="buttonGrade btn-block	" style="padding:7px;"  >Potvrdi</button>
	      			</form>
	      		</div>
	      		<div class="col-sm-6">
	      			<button type="button" class="buttonGrade btn-block" style="padding:7px;" data-dismiss="modal">Odustani</button>
	      		</div>
	      		
	      	</div>
	        
	        
	      </div>

	    </div>
	  </div>
	</div>

<!-- za bokiranje-->
<div class="modal fade" id="blokirajKor">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content pages ">

	      <!-- Modal Header -->
	      <div class="modal-header ">
	        <h4 class="modal-title d-flex justify-content-center">Da li ste sigurni?</h4>
	        <button type="button" class="close" style="color:white;" data-dismiss="modal">&times;</button>
	      </div>

	      <!-- Modal body -->
	      

	      <!-- Modal footer -->
	      <div class="modal-body">
	      	<div class="row">
	      		<div class="col-sm-6">
	      			<form name="prva" method="post" action="blokirajKorisnika">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="username" value="
						{{$username}}
						">
		
	      				<button type="submit" class="buttonGrade btn-block	" style="padding:7px;"  >Potvrdi</button>
	      			</form>
	      		</div>
	      		<div class="col-sm-6">
	      			<button type="button" class="buttonGrade btn-block" style="padding:7px;" data-dismiss="modal">Odustani</button>
	      		</div>
	      		
	      	</div>
	        
	        
	      </div>

	    </div>
	  </div>
	</div>


<!-- Banovanje sa sajta-->

<div class="modal fade" id="udaljiSaSajta">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content pages ">

	      <!-- Modal Header -->
	      <div class="modal-header ">
	        <h4 class="modal-title d-flex justify-content-center">Da li ste sigurni?</h4>
	        <button type="button" class="close" style="color:white;" data-dismiss="modal">&times;</button>
	      </div>

	      <!-- Modal body -->
	      

	      <!-- Modal footer -->
	      <div class="modal-body">
	      	<div class="row">
	      		<div class="col-sm-6">
	      			<form name="prva" method="post" action="udaljiSaSajta">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="username" value="
						{{$username}}
						">
		
	      				<button type="submit" class="buttonGrade btn-block	" style="padding:7px;"  >Potvrdi</button>
	      			</form>
	      		</div>
	      		<div class="col-sm-6">
	      			<button type="button" class="buttonGrade btn-block" style="padding:7px;" data-dismiss="modal">Odustani</button>
	      		</div>
	      		
	      	</div>
	        
	        
	      </div>

	    </div>
	  </div>
	</div>
<!-- Brisanj enaloga-->

<div class="modal fade" id="obrisiNalog">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content pages ">

	      <!-- Modal Header -->
	      <div class="modal-header ">
	        <h4 class="modal-title d-flex justify-content-center">Da li ste sigurni?</h4>
	        <button type="button" class="close" style="color:white;" data-dismiss="modal">&times;</button>
	      </div>

	      <!-- Modal body -->
	      

	      <!-- Modal footer -->
	      <div class="modal-body">
	      	<div class="row">
	      		<div class="col-sm-6">
	      			<form name="prva" method="post" action="obrisiNalog">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="username" value="
						{{$username}}
						">
		
	      				<button type="submit" class="buttonGrade btn-block	" style="padding:7px;"  >Potvrdi</button>
	      			</form>
	      		</div>
	      		<div class="col-sm-6">
	      			<button type="button" class="buttonGrade btn-block" style="padding:7px;" data-dismiss="modal">Odustani</button>
	      		</div>
	      		
	      	</div>
	        
	        
	      </div>

	    </div>
	  </div>
	</div>



<div class="modal fade" id="changePassword">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content pages ">

	      <!-- Modal Header -->
	      <div class="modal-header ">
	        <h4 class="modal-title d-flex justify-content-center" >Promeni lozinku</h4>
	        <button type="button" class="close" style="color:white;" data-dismiss="modal">&times;</button>
	      </div>

	      <!-- Modal body -->
	      @if(count($errors)>0)
	      	@if ($errors->has('staraLozinka') || $errors->has('novaLozinka') || $errors->has('ponoviLozinku'))
	         		<div class="alert-danger">
	         			<ul>
	         					@foreach ($errors->get('novaLozinka') as $message) 
	         					<li>{{$message }} 	</li>
	         					@endforeach
	         					@foreach ($errors->get('staraLozinka') as $message) 
	         					<li>{{$message }} 	</li>
	         					@endforeach
	         					@foreach ($errors->get('ponoviLozinku') as $message) 
	         					<li>{{$message }} 	</li>
	         					@endforeach
	         			
	         			</ul>
	         		</div>
	         		@endif
	         	@endif

	      <!-- Modal footer -->
	      <div class="modal-body">
	      	<div class="container">
	      		
	      		<form action="changePassword" method="post" class="m-3">
	      			<input type="hidden" name="_token" value="{{ csrf_token() }}">
	      			<div class="form-group">
	      				<div class="row">
	      					<div class="col-sm-6">
	      						<label style="color:#9D907D;">	Stara lozinka:</label>
	      					</div>
	      					<div class="col-sm-6">
	      						<input name="staraLozinka" type="password" >
	      					</div>
	      				</div>
	      			</div>
	      			<div class="form-group">
	      				<div class="row">
	      					<div class="col-sm-6">
	      						<label style="color:#9D907D;">	Nova lozinka:</label>
	      					</div>
	      					<div class="col-sm-6">
	      						<input name="novaLozinka" type="password" >
	      					</div>
	      				</div>
	      			</div>
	      			<div class="form-group">
	      				<div class="row">
	      					<div class="col-sm-6">
	      						<label style="color:#9D907D;">	Ponovi lozinku:</label>
	      					</div>
	      					<div class="col-sm-6">
	      						<input name="ponoviLozinku" type="password" >
	      					</div>
	      				</div>
	      			</div>
				<div class="row">
	      		<div class="col-sm-6">
	      			<button type="submit" class="buttonGrade btn-block	"  style="padding:7px;" >Potvrdi</button>
	      		</div>
	      		<div class="col-sm-6">
	      			<button type="button" class="buttonGrade btn-block" style="padding:7px;" data-dismiss="modal">Odustani</button>
	      		</div>
	      		
	      	</div>

	      		
	      		</form>	
	      	</div>
	      	
	        
	        
	      </div>

	    </div>
	  </div>
	</div>




<div class="modal fade" id="editDescription">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content pages ">

	      <!-- Modal Header -->
	      <div class="modal-header ">
	        <h4 class="modal-title d-flex justify-content-center" >Kada igram Lol</h4>
	        <button type="button" class="close" style="color:white;" data-dismiss="modal">&times;</button>
	      </div>

	      <!-- Modal body -->
	      
 				 @if(count($errors)>0)
			 		 @if($errors->has('description'))
	         			<div class="alert-danger">
	         				<ul>
	         					@foreach ($errors->get('description') as $message) 
	         					<li>{{$message }} 	</li>
	         					@endforeach
	         				</ul>
	         			</div>
	         		@endif
	         	@endif

	      <!-- Modal footer -->
	      <div class="modal-body">
	      	<div class="container">
	      		
	      		<form class="m-3" action='editDescription' method='post' >
	      			<div class="form-group">
	      			 <input type="hidden" name="_token" value="{{ csrf_token() }}">		
	      					
	      				
	      				<div class="row">
	      					<div class="col-sm-12">
	      					<textarea name="description" style="border:  2px solid #184157; "type="text" class="form-control"  placeholder="Kada ste online"></textarea>
	      					</div>
	      				</div>
	      			</div>
	      			
	      				<div class="row">
	      		<div class="col-sm-6">
	      			<button name="dugme" type="submit" class="buttonGrade btn-block	" style="padding:7px;"  >Potvrdi</button>
	      		</div>
	      		<div class="col-sm-6">
	      			<button type="button" name="odustani" class="buttonGrade btn-block" style="padding:7px;" data-dismiss="modal">Odustani</button>
	      		</div>
	      		
	      	</div>

	      		
	      		</form>	
	      	</div>
	      	
	        
	        
	      </div>

	    </div>
	  </div>
	</div>



<!-- Slanje poruke-->
<div class="modal fade" id="sendMessage">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content pages ">

	      <!-- Modal Header -->
	      <div class="modal-header ">
	        <h4 class="modal-title d-flex justify-content-center" >Pošalji poruku : {{$username}}</h4>
	        <button type="button" class="close" style="color:white;" data-dismiss="modal">&times;</button>
	      </div>

	      <!-- Modal body -->
	      

	      <!-- Modal footer -->
	      <div class="modal-body">
	      	<div class="container">
	      		
	      		<form class="m-3" method="post" action="slanjePoruke">


 	 @if(count($errors)>0)
	      	@if ($errors->has('poruka') )
	         		<div class="alert-danger">
	         			<ul>
	         					@foreach ($errors->get('poruka') as $message) 
	         					<li>{{$message }} 	</li>
	         					@endforeach
	         					

	         			
	         			</ul>
	         		</div>
	         		@endif
	         	@endif


	      				<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="username" value="
						{{$username}}
						">
	      			<div class="form-group">
	      				
	      				<div class="row">
	      					<div class="col-sm-12">
	      					<textarea name="poruka" style="border:  2px solid #184157; "type="text" class="form-control"  placeholder="Šta tražiš od saigrača"></textarea>
	      					</div>
	      				</div>
	      			</div>
	      			
	      				<div class="row">
	      		<div class="col-sm-6">
	      			<button type="submit" class="buttonGrade btn-block	" style="padding:7px;">Pošalji</button>
	      		</div>
	      		<div class="col-sm-6">
	      			<button type="button" class="buttonGrade btn-block" style="padding:7px;" data-dismiss="modal">Odustani</button>
	      		</div>
	      		
	      	</div>

	      		
	      		</form>	
	      	</div>
	      	
	        
	        
	      </div>

	    </div>
	  </div>
	</div>



<div class="modal fade" id="leaveComment">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content pages ">

	      <!-- Modal Header -->
	      <div class="modal-header ">
	        <h4 class="modal-title d-flex justify-content-center" >Oceni korisnika</h4>
	        <button type="button" class="close" style="color:white;" data-dismiss="modal">&times;</button>
	      </div>

	      <!-- Modal body -->
	      

	      <!-- Modal footer -->
	      <div class="modal-body">
	      	<div class="container">
	      		
	      		<form class="m-3" method="post" action="oceniKorisnika">

	      				<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="username" value="
						{{$username}}
						">
	      			<div class="form-group">
	      				<div class="row">
	      					<div class="col-sm-12">
	      						<label style="color:#9D907D;" >
	      							Ostavi komentar:
	      						</label>
	      					</div>
	      				</div>
	      				<div class="row">
	      					<div class="col-sm-12">
	      					<textarea name="komentar" style="border:  2px solid #184157; "type="text" class="form-control"  placeholder="Šta tražiš od saigrača"></textarea>
	      					</div>
	      				</div>
	      				<div class="row mt-3">
	      					<div class="col-sm-6">
	      						<label style="color:#9D907D;" >
	      							Ostavi ocenu:
	      						</label>
	      					</div>
	      				<div class="col-sm-6 ml-auto ">
							<input type="radio" name="ocena" checked value="1">1 &nbsp;
							<input type="radio" name="ocena"  value="2">2 &nbsp;
							<input type="radio" name="ocena"  value="3">3 &nbsp;
							<input type="radio" name="ocena"  value="4">4 &nbsp;
							<input type="radio" name="ocena"  value="5">5 &nbsp;
	      				</div>
	      				
	      			</div>
	      			
	      				<div class="row">
	      		<div class="col-sm-6">
	      			<button type="submit" class="buttonGrade btn-block	" style="padding:7px;" >Postavi</button>
	      		</div>
	      		<div class="col-sm-6">
	      			<button type="button" class="buttonGrade btn-block" style="padding:7px;" data-dismiss="modal">Odustani</button>
	      		</div>
	      		
	      	</div>

	      		
	      		</form>	
	      	</div>
	      	
	        
	        
	      </div>

	    </div>
	  </div>
	</div>





</div>

@endsection