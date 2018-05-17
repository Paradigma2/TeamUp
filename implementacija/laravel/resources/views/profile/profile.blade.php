@extends('main')
@section('styles')
	<link rel="icon" href="slike/icon.png" type="image/png">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@endsection
@section('content')
	<div class="row mt-3"  style="background-color: rgba(5,5,5,0.8); color:white;">
		<div class="col-sm-2 " >
			<div class="profilePicture m-4" width="185px">
				<img class="blur" border="2px" src="{{URL::asset('/slike/icon.jpg')}}"alt="Profilna slika" width="185px">
				<div class="editProfilePicture">
					@yield('editProfilePicture')
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
						@yield("btn4")
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
						@yield("btn1")
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						@yield('btn2')
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						@yield('btn3')
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3" >
			<div class=" card mt-3 sidebarCards" >
				@yield('editDescription')
				
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
  				 <br>

  				<div class="container-fluid">	
  					

  					
  					<div class="row ">
  						<div class="card container-fluid " style="padding:15px;background-color: rgba(5,5,5,0.5);">
  							<div class="row">
							<div class="col-sm-10">
								<img style="margin-bottom:5px; margin-left:-5px; vertical-align:bottom " width="35px" alt="Profilna slika" src="slike/icon3.jpg">
							</div>
							<div class="col-sm-2">
								@yield('btnSidebar1')
							</div>
						</div>
						<div class="row" >
							<div class="card-text mr-2" >
								
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

  					<div class="row mt-3">
  						<div class="card container-fluid " style="padding:15px;background-color: rgba(5,5,5,0.5);">
  							<div class="row">
							<div class="col-sm-10">
								<img style="margin-bottom:5px; margin-left:-5px; vertical-align:bottom " width="35px" alt="Profilna slika" src="slike/icon3.jpg">
							</div>
							<div class="col-sm-2">
								@yield('btnSidebar1')
							</div>
						</div>
						<div class="row" >
							<div class="card-text mr-2" >
								
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

		<div class="col-sm-3">
		</div>

		<div class="col-sm-3">
		</div>

		<div class="col-sm-3">
		</div>
	</div>
@endsection