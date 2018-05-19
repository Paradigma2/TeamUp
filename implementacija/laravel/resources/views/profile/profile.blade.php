@extends('main')

@section('styles')
	<link rel="icon" href="slike/icon.png" type="image/png">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ URL::asset('css/styleProfile.css') }}">
@endsection
@section('content')

	<div class="row mt-3"  style="background-color: rgba(5,5,5,0.8); color:white;">
		<div class="col-sm-2 " >
			<div class="profilePicture m-4" width="185px">
				<img class="blur" border="2px" src="{{URL::asset('/slike/icon.jpg')}}"alt="Profilna slika" width="185px">
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
							<label>
								Nick
							</label>


						</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<h4>
							<label>
								Silver IV
							</label>
						</h4>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<h4>
							<label>
								Lvl 36
							</label>
						</h4>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="stars">
						<form action="">
						<input class="star star-5" id="star-5" type="radio" name="star"/>
						<label class="star star-5" for="star-5"></label>
						<input class="star star-4" id="star-4" type="radio" name="star"/>
						<label class="star star-4" for="star-4"></label>
						<input class="star star-3" id="star-3" type="radio" name="star"/>
						<label class="star star-3" for="star-3"></label>
						<input class="star star-2" id="star-2" type="radio" name="star"/>
						<label class="star star-2" for="star-2"></label>
						<input class="star star-1" id="star-1" type="radio" name="star"/>
						<label class="star star-1" for="star-1"></label>
						</form>
				</div>
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
						<a class="clearFormat" data-toggle="modal" href="#deleteModal">
							@yield('udaljiSaSajta')
						</a>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						@yield('kreirajOglas')
						<a class="clearFormat" data-toggle="modal" href="#deleteModal">
						@yield('blokiraj')
						</a>
						<a class="clearFormat" data-toggle="modal" href="#deleteModal">
							@yield('unapredi')
						</a>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<a class="clearFormat" data-toggle="modal" href="#deleteModal"> 
						@yield('obrisiNalog')
						</a>
						@yield('zaprati')
						<a class="clearFormat" data-toggle="modal" href="#sendMessage">
							@yield('posaljiPorukuAdmin')
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="row mt-1">
		


	
	<div class="col-sm-3 mt-3">
			<div class="card  align-items-center" style="padding:10px;background-color: rgba(5,5,5,0.6); color:white">
				<div class=" ml-auto">
					<a href=/createEditAdForm>
							@yield('icon11')


							<!--<i class="material-icons" style="cursor:pointer;">create</i>-->
					</a>
					<a data-toggle="modal" href="#deleteModal">
						@yield('icon12')
					</a> 	
				</div>
				<div class="card-title">
				
					<h2 >
						<label id="pozicija1">
							ADC
						</label>
					</h2>


				</div>
				<div class="card-title">
					<h3 >
						<label id="mapa1">
							Summoner's Rift
						</label>
					</h3>
				</div>

				<div class="card-content  ">
										<img class="round" border="3px" src="slike/Zyra.png" alt="Zyra">
					<img class="round" border="3px" src="slike/Rakan.png" alt="Rakan">
					<img class="round" border="3px" src="slike/Karma.png" alt="Karma">
			
		
				</div>

				<div class="card-text m-4"  style="color:#9D907D;">
											Trazim partnera za ranked duo, junglera ili top laner-a, ali ok je i bilo koji igrac sa timskim duhom i voljom za pobedom.
					
				</div>

			</div>
	</div>
	<div class="col-sm-3 mt-3">
			<div class="card  align-items-center" style="padding:10px;background-color: rgba(5,5,5,0.6); color:white">
				<div class=" ml-auto">
					<a href="/createEditAdForm">
							@yield('icon21')


							<!--<i class="material-icons" style="cursor:pointer;">create</i>-->
					</a>
					<a data-toggle="modal" href="#deleteModal">
						@yield('icon22')
					</a> 	
				</div>
				<div class="card-title">
					<h2 >
						<label id="pozicija1">
							Mid
						</label>
					</h2>
				</div>
				<div class="card-title">
					<h3 >
						<label id="mapa1">
							Summoner's Rift
						</label>
					</h3>
				</div>

				<div class="card-content  ">
					<img class="round" border="3px" src="slike/Katarina.png" alt="Katarina">
					<img class="round" border="3px" src="slike/Jayce.png" alt="Jayce">
					<img class="round" border="3px" src="slike/Brand.png" alt="Brand">
			
				</div>

				<div class="card-text m-4"  style="color:#9D907D;">
											Trazim partnera za ranked duo, junglera ili top laner-a, ali ok je i bilo koji igrac sa timskim duhom i voljom za pobedom.
					
				</div>

			</div>
	</div>
	<div class="col-sm-3 mt-3">
			<div class="card  align-items-center" style="padding:10px;background-color: rgba(5,5,5,0.6); color:white">
				<div class=" ml-auto">
					<a href="/createEditAdForm">
							@yield('icon31')


							<!--<i class="material-icons" style="cursor:pointer;">create</i>-->
					</a>
					<a data-toggle="modal" href="#deleteModal">
						@yield('icon32')
					</a> 	
				</div>
				<div class="card-title">
					<h2 >
						<label id="pozicija1">
							Support
						</label>
					</h2>
				</div>
				<div class="card-title">
					<h3 >
						<label id="mapa1">
							Summoner's Rift
						</label>
					</h3>
				</div>

				<div class="card-content  ">
					<img class="round" border="3px" src="slike/Elise.png" alt="Elise">
					<img class="round" border="3px" src="slike/Diana.png" alt="Diana">
					<img class="round" border="3px" src="slike/Jax.png" alt="Jax">
			
				</div>

				<div class="card-text m-4 "  style="color:#9D907D;">
					Pretezno igram agresivne support-ove, trazi se adc sa dobrim skillom za farmu.. Posebno Jhin ili Vayne
				
				</div>

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
						Radnim danima igram LoL posle 19h, dok sam vikendom online tokom celog dana. :)
			
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
  					

  					
  					<div class="row ">
  						<div class="card container-fluid " style="padding:15px;background-color: rgba(5,5,5,0.5);">
  							<div class="row">
  								<div class=" mr-2 ml-auto">
  									<a data-toggle="modal" href="#deleteModal">
										@yield('btnSidebar1')
									</a>
								</div>
							
								
								<div class="col-sm-12">
										<img style="margin-bottom:5px; margin-left:-5px; vertical-align:bottom " width="35px" alt="Profilna slika" src="slike/icon3.jpg">
									
									
								
							    </div>
							
							</div>
						<div class="row" >
							<div class="card-text ml-2 mr-2"  style="color:#9D907D;">
								
								Odlican ADC, kida kako farm-a, dogovr oko partije ispostovan maksimalno..
							</div>
							</div>
						
						<div class="row d-flex justify-content-end">


							<div class=" flex-col-sm-6">
							<div class="stars">
								<form action="">
									<input class="star star-5" id="star-5" type="radio" name="star"/>
									<label class="star star-5" for="star-5"></label>
									<input class="star star-4" id="star-4" type="radio" name="star"/>
									<label class="star star-4" for="star-4"></label>
									<input class="star star-3" id="star-3" type="radio" name="star"/>
									<label class="star star-3" for="star-3"></label>
									<input class="star star-2" id="star-2" type="radio" name="star"/>
									<label class="star star-2" for="star-2"></label>
									<input class="star star-1" id="star-1" type="radio" name="star"/>
									<label class="star star-1" for="star-1"></label>
								</form>
							</div>
							</div>
						
						</div>
					</div>
					</div>

  				
  					
  					
  					<div class="row mt-3	 ">
  						<div class="card container-fluid " style="padding:15px;background-color: rgba(5,5,5,0.5);">
  							<div class="row">
  								<div class=" mr-2 ml-auto">
  									<a data-toggle="modal" href="deleteModal">
										@yield('btnSidebar2')
									</a>
								</div>
							
								
								<div class="col-sm-12">
										<img style="margin-bottom:5px; margin-left:-5px; vertical-align:bottom " width="35px" alt="Profilna slika" src="slike/icon3.jpg">
									
									
								
							    </div>
							
							</div>
						<div class="row" >
							<div class="card-text ml-2 mr-2"  style="color:#9D907D;">
								
								Odlican ADC, kida kako farm-a, dogovr oko partije ispostovan maksimalno..
							</div>
							</div>
						
						<div class="row d-flex justify-content-end">


							<div class=" flex-col-sm-6">
							<div class="stars">
								<form action="">
									<input class="star star-5" id="star-5" type="radio" name="star"/>
									<label class="star star-5" for="star-5"></label>
									<input class="star star-4" id="star-4" type="radio" name="star"/>
									<label class="star star-4" for="star-4"></label>
									<input class="star star-3" id="star-3" type="radio" name="star"/>
									<label class="star star-3" for="star-3"></label>
									<input class="star star-2" id="star-2" type="radio" name="star"/>
									<label class="star star-2" for="star-2"></label>
									<input class="star star-1" id="star-1" type="radio" name="star"/>
									<label class="star star-1" for="star-1"></label>
								</form>
							</div>
							</div>
						
						</div>
					</div>
					</div>
			</div>

		
	</div>
</div>


	<div class="modal fade" id="deleteModal">
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
	      			<button type="button" class="buttonGrade btn-block	" style="padding:7px;" data-dismiss="modal" onclick="obrisiOglas(idDelete)">Potvrdi</button>
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
	      

	      <!-- Modal footer -->
	      <div class="modal-body">
	      	<div class="container">
	      		
	      		<form class="m-3">
	      			<div class="form-group">
	      				<div class="row">
	      					<div class="col-sm-6">
	      						<label style="color:#9D907D;">	Stara lozinka:</label>
	      					</div>
	      					<div class="col-sm-6">
	      						<input type="text" >
	      					</div>
	      				</div>
	      			</div>
	      			<div class="form-group">
	      				<div class="row">
	      					<div class="col-sm-6">
	      						<label style="color:#9D907D;">	Nova lozinka:</label>
	      					</div>
	      					<div class="col-sm-6">
	      						<input type="text" >
	      					</div>
	      				</div>
	      			</div>
	      			<div class="form-group">
	      				<div class="row">
	      					<div class="col-sm-6">
	      						<label style="color:#9D907D;">	Ponovi lozinku:</label>
	      					</div>
	      					<div class="col-sm-6">
	      						<input type="text" >
	      					</div>
	      				</div>
	      			</div>
				<div class="row">
	      		<div class="col-sm-6">
	      			<button type="button" class="buttonGrade btn-block	" style="padding:7px;" data-dismiss="modal" onclick="obrisiOglas(idDelete)">Potvrdi</button>
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
	      

	      <!-- Modal footer -->
	      <div class="modal-body">
	      	<div class="container">
	      		
	      		<form class="m-3">
	      			<div class="form-group">
	      				
	      					
	      				
	      				<div class="row">
	      					<div class="col-sm-12">
	      					<textarea style="border:  2px solid #184157; "type="text" class="form-control"  placeholder="Šta tražiš od saigrača">
	      					</textarea>
	      					</div>
	      				</div>
	      			</div>
	      			
	      				<div class="row">
	      		<div class="col-sm-6">
	      			<button type="button" class="buttonGrade btn-block	" style="padding:7px;" data-dismiss="modal" onclick="obrisiOglas(idDelete)">Potvrdi</button>
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




<div class="modal fade" id="sendMessage">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content pages ">

	      <!-- Modal Header -->
	      <div class="modal-header ">
	        <h4 class="modal-title d-flex justify-content-center" >Pošalji poruku : Nick</h4>
	        <button type="button" class="close" style="color:white;" data-dismiss="modal">&times;</button>
	      </div>

	      <!-- Modal body -->
	      

	      <!-- Modal footer -->
	      <div class="modal-body">
	      	<div class="container">
	      		
	      		<form class="m-3">
	      			<div class="form-group">
	      				
	      				<div class="row">
	      					<div class="col-sm-12">
	      					<textarea style="border:  2px solid #184157; "type="text" class="form-control"  placeholder="Šta tražiš od saigrača">
	      					</textarea>
	      					</div>
	      				</div>
	      			</div>
	      			
	      				<div class="row">
	      		<div class="col-sm-6">
	      			<button type="button" class="buttonGrade btn-block	" style="padding:7px;" data-dismiss="modal" onclick="obrisiOglas(idDelete)">Pošalji</button>
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
	      		
	      		<form class="m-3">
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
	      					<textarea style="border:  2px solid #184157; "type="text" class="form-control"  placeholder="Šta tražiš od saigrača">
	      					</textarea>
	      					</div>
	      				</div>
	      				<div class="row mt-3">
	      					<div class="col-sm-6">
	      						<label style="color:#9D907D;" >
	      							Ostavi ocenu:
	      						</label>
	      					</div>
	      					<div class="col-sm-6 ml-auto ">
						<div class="stars">
						<form action="">
						<input class="star star-5" id="star-5" type="radio" name="star"/>
						<label class="star star-5" for="star-5"></label>
						<input class="star star-4" id="star-4" type="radio" name="star"/>
						<label class="star star-4" for="star-4"></label>
						<input class="star star-3" id="star-3" type="radio" name="star"/>
						<label class="star star-3" for="star-3"></label>
						<input class="star star-2" id="star-2" type="radio" name="star"/>
						<label class="star star-2" for="star-2"></label>
						<input class="star star-1" id="star-1" type="radio" name="star"/>
						<label class="star star-1" for="star-1"></label>
						</form>
					</div>
	      				</div>
	      				
	      			</div>
	      			
	      				<div class="row">
	      		<div class="col-sm-6">
	      			<button type="button" class="buttonGrade btn-block	" style="padding:7px;" data-dismiss="modal" onclick="obrisiOglas(idDelete)">Pošalji</button>
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