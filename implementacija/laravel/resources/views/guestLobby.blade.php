@extends('main')

@section('styles')
	<link rel="stylesheet" href="{{ URL::asset('css/stylelobby.css') }}">
@endsection

@section('navbar')
	@include('navbar/navbarGuest')
@endsection

@section('content')

<div class="container">
	
	<div id="demo" class="carousel slide mt-3" data-ride="carousel">
	  <ul class="carousel-indicators">
	    <li data-target="#demo" data-slide-to="0" class="active"></li>
	    <li data-target="#demo" data-slide-to="1"></li>
	    <li data-target="#demo" data-slide-to="2"></li>
	     <li data-target="#demo" data-slide-to="3"></li>
	    <li data-target="#demo" data-slide-to="4"></li>
	  </ul>
	  <div class="carousel-inner">
	    <div class="carousel-item active">
	      <img src={{ URL::asset('slike/carousel1.jpg') }} alt="pic1" width="1100" height="500">
	      <div class="carousel-caption">
	        <h6 class="display-4">Postani clan najvece LoL zajednice u regionu</h6>
	      </div>   
	    </div>
	    <div class="carousel-item">

	      <img src={{ URL::asset('slike/carousel2.jpg') }} alt="pic2" width="1100" height="500">
	      <div class="carousel-caption">
	        <h1 class="display-4">Pronadji svog idealnog saigraca</h1>
	      </div>   
	    </div>
	    <div class="carousel-item">
	    	<a href="#page1">
	      <img src={{ URL::asset('slike/carousel3.jpg') }} alt="pic3" width="1100" height="500"></a>
	      <div class="carousel-caption">
	        <h1 class="display-4">Saznaj prvi najnovija desavanja</h1>
	      </div>   
	    </div>
	    <div class="carousel-item">
	      <img src={{ URL::asset('slike/carousel4.jpg') }} alt="pic4" width="1100" height="500">
	      <div class="carousel-caption">
	        <h1 class="display-4">Ucestvuj u turnirima zajedno sa ostalim clanovima</h1>
	      </div>   
	    </div>
	    <div class="carousel-item">
	    	<div class="carousel-caption">
	        <h1 class="display-4">Pridruzi se danas!</h1>
	       
	     	 </div>   
	      <img src={{ URL::asset('slike/carousel5.jpg') }} alt="pic5" width="1100" height="500">
	     
	    </div>
	  </div>
	  <a class="carousel-control-prev" href="#demo" data-slide="prev">
	    <span class="carousel-control-prev-icon"></span>
	  </a>
	  <a class="carousel-control-next" href="#demo" data-slide="next">
	    <span class="carousel-control-next-icon"></span>
	  </a>
	</div>

	<div class="row mt-3">
		<div class="col-sm-12 d-flex justify-content-center">
			<button class="btn btn-primary mr-2 btn-lg" type="button"><a class="nav-link" href=/registerForm style="color:white;">Registruj se</a></button>
			<button class="btn btn-primary ml-2 btn-lg" type="button" data-toggle="modal" data-target="#logInModal">Uloguj se</button>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-2">&nbsp;</div>
		<div class="col-sm-8 mt-3 tab-content">

			<div class="tab-pane active" id="page1">
				<div class="row">
					<div class="col-sm-12">
						<div class="card mt-2 article">
							
							<div class="card-body">
								<div class="row">
									<div class="col-sm-12">
										<h4 class="card-title headline mt-1" >
											<label>Naslov 1</label>
										</h4>
									</div>
								</div>
								<p class="card-text">Content 1</p>


								<div class="card-text collapse" id="collapseArticle1">Expand content 1</div>
								<a data-toggle="collapse" href="#collapseArticle1" onclick="proba('klik1')" >
									<i class="material-icons" > <label style="cursor:pointer;" id="klik1">expand_more</label></i>
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12 mt-2">
						<div class="card mt-2 article">
							<div class="card-body">
								<div class="row">
									<div class="col-sm-12">
										<h4 class="card-title headline mt-1" >
											<label>Naslov 2</label>
										</h4>
									</div>
									
								</div>
								<p class="card-text">Content 2</p>


								<div class="card-text collapse" id="collapseArticle2">Expand content 2</div>
								<a data-toggle="collapse" href="#collapseArticle2" onclick="proba('klik2')" >
									<i class="material-icons" > <label style="cursor:pointer;" id="klik2">expand_more</label></i>
								</a>
							</div>
						</div>
					</div>
				</div>

			</div>
			<div class="tab-pane fade" id="page2">
				<div class="row">
					<div class="col-sm-12">
						<div class="card mt-2 article">
							<div class="card-body">
								<div class="row">
									<div class="col-sm-12">
										<h4 class="card-title headline mt-1" >
											<label>Naslov 4</label>
										</h4>
									</div>
									
								</div>
								<p class="card-text">Content 4</p>


								<div class="card-text collapse" id="collapseArticle4">Expand content 4</div>
								<a data-toggle="collapse" href="#collapseArticle4" onclick="proba('klik4')" >
									<i class="material-icons" > <label style="cursor:pointer;" id="klik4">expand_more</label></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
					
					<ul class="pagination nav nav-pills mt-3 d-flex justify-content-center">
						<li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
						<li class="page-item"><a class="page-link" data-toggle="pill" href="#page1">1</a></li>
						<li class="page-item"><a class="page-link"  data-toggle="pill" href="#page2">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item"><a class="page-link" href="#">Next</a></li>
					</ul>

		</div>
		<div class="col-sm-2">&nbsp;</div>
	</div>

	<div class="modal fade" id="logInModal">
	   <div class="modal-dialog modal-dialog-centered">
	     <div class="modal-content pages">
	     	
	       <!-- Modal body -->
	       <div class="modal-body">
	       	 <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
	         <form class="m-5" name="logInForm">
	         	<div class="form-group">
	         		<div class="row">
	         			<div class="col-sm-5">
	         				<h5><label for="username">Korisnicko ime:</label></h5>
	         			</div>
	         			<div class="col-sm-7">
	         				 <input type="text" class="form-control" id="username" name="username">
	         			</div>
	         		</div>
	         	</div>
	         	<div class="form-group">
	         		<div class="row">
	         			<div class="col-sm-5 ">
	         				<h5><label for="pass">Sifra:</label></h5>
	         			</div>
	         			<div class="col-sm-7">
	         				 <input type="password" class="form-control" id="pass" name="pass">
	         			</div>
	         		</div>
	         	</div>
	         	<div class="row">
	         		<div class="col-sm-5 d-flex justify-content-center">
	         			
	         					 <button type="button" class="btn btn-primary" data-dismiss="modal">Odustani</button>
	         				
	         			</div>
	         			<div class="col-sm-7">
	         			 <button type="submit" class="btn btn-primary" style="width:100%;">Uloguj se</button>
	         		</div>
	         			
	         		</div>
	         		
	         	</div>
	         	   
	         </form>
	       </div>
	      
	       
	     </div>
	   </div>
	 </div>

	<script language="javascript">
		function proba(klik){
			labela = document.getElementById(klik);
			if(labela.innerHTML == "expand_more"){
				labela.innerHTML="expand_less"
			}
			else{
				labela.innerHTML="expand_more"
			}
		}
	</script>
</div>

@endsection