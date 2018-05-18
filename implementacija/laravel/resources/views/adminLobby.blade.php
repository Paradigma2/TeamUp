@extends('main')

@section('styles')
	<link rel="stylesheet" href="{{ URL::asset('css/stylelobby.css') }}">
@endsection

@section('navbar')
	@include('navbar/navbarAdmin')
@endsection

@section('content')
	<div class="container">
		<div class="row mt-3">
			
			<div class="col-sm-8">
				<div id="demo" class="carousel slide mt-3" data-ride="carousel">
				  <ul class="carousel-indicators">
				    <li data-target="#demo" data-slide-to="0" class="active"></li>
				    <li data-target="#demo" data-slide-to="1"></li>
				    <li data-target="#demo" data-slide-to="2"></li>
				  </ul>
				  <div class="carousel-inner">
				    <div class="carousel-item active">
				    	<a href="#page1">
				      <img src={{ URL::asset('slike/carousel1.jpg') }} alt="pic1" width="1100" height="300"></a>
				      <div class="carousel-caption">
				        <h6 class="display-4"><label>Naslov 1</label></h6>
				      </div>   
				    </div>
				    <div class="carousel-item">
				    	<a href="#page1">
				      <img src={{ URL::asset('slike/carousel2.jpg') }} alt="pic2" width="1100" height="300"></a>
				      <div class="carousel-caption">
				        <h1 class="display-4"><label>Naslov 2</label></h1>
				      </div>   
				    </div>
				    <div class="carousel-item">
				    	<a href="#page2">
				      <img src={{ URL::asset('slike/carousel3.jpg') }} alt="pic3" width="1100" height="300"></a>
				      <div class="carousel-caption">
				        <h1 class="display-4"><label>Naslov 4</label></h1>
				      </div>   
				    </div>
				    
				  </div>
				  <a class="carousel-control-prev" href="#demo" data-slide="prev">
				    <span class="carousel-control-prev-icon"></span>
				  </a>
				  <a class="carousel-control-next" href="#demo" data-slide="next">
				    <span class="carousel-control-next-icon"></span>
				  </a>
				</div>

				<div class="row">
					
					<div class="col-sm-12 mt-3 tab-content">

						<div class="tab-pane active" id="page1">
							<div class="row">
								<div class="col-sm-12">
									<div class="card mt-2 article">
										
										<div class="card-body">
											<div class="row">
												<div class="col-sm-11">
													<h4 class="card-title headline mt-1" >
														<label>Naslov 1</label>
													</h4>
												</div>
												<div class="col-sm-1">
													<a data-toggle="modal" href="#deleteModal">
														<i class="material-icons" style="cursor:pointer;">delete</i>
													</a>
													
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
												<div class="col-sm-11">
													<h4 class="card-title headline mt-1" >
														<label>Naslov 2</label>
													</h4>
												</div>
												<div class="col-sm-1">
													<a data-toggle="modal" href="#deleteModal">
														<i class="material-icons" style="cursor:pointer;">delete</i>
													</a>
													
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
												<div class="col-sm-11">
													<h4 class="card-title headline mt-1" >
														<label>Naslov 4</label>
													</h4>
												</div>
												<div class="col-sm-1">
													<a data-toggle="modal" href="#deleteModal">
														<i class="material-icons" style="cursor:pointer;">delete</i>
													</a>
													
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

			</div>
			
		</div>
		<div class="col-sm-4">
				<div class="card mt-3 article">
					<div class="card-body">
						<div class="card-title">
							<h2>Pretrazi</h2>
							
						</div>
						<!-- Ovaj ili div ispod ce biti aktivni-->
						<!--
						<div class="pages p-3">
							<h6>Jos uvek nikoga ne pratite</h6>
						</div>
						-->
						<div class="row">
							<div class="col-sm-12 mb-3">
								<form name="searchUserForm" >
									<div class="row">
									<div class="col-sm-8">
										<input type="text" class="form-control form-control-sm" name="usernameSearch" id="usernameSearch" style="font-size=8pt;">
									</div>
									<div class="col-sm-4">
										<button type="submit" class="btn btn-primary btn-sm">Trazi</button>
									</div>
									</div>
								</form>
							</div>
						</div>
						<div class="list-group pages" style="height:150px; overflow-y:auto;">
						  
							<a href="#" class="list-group-item list-group-item-action pages list-group-item-dark"><img src="/slike/alistar.png" width="30px" class="mr-2">meanGirl</a>
						 
						  <a href="#" class="list-group-item list-group-item-action pages list-group-item-dark"><img src="/slike/alistar.png" width="30px" class="mr-2">meanGirl</a>
						   <a href="#" class="list-group-item list-group-item-action pages list-group-item-dark"><img src="/slike/alistar.png" width="30px" class="mr-2">meanGirl</a>

						 </div>
						
					</div>
					
				</div>
			</div>
		
	</div>
	<div class="modal fade" id="deleteModal">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content pages">

	      <!-- Modal Header -->
	      <div class="modal-header ">
	        <h4 class="modal-title d-flex justify-content-center">Da li ste sigurni?</h4>
	        <button type="button" class="close" style="color:white;" data-dismiss="modal">&times;</button>
	      </div>

	      <!-- Modal body -->
	      

	      <!-- Modal footer -->
	      <div class="modal-body">
	      	<div class="row">
	      		<div class="col-sm-12  d-flex justify-content-center">
	      			<button type="button" class="btn btn-primary mr-2" data-dismiss="modal" onclick="fjaZaBrisanje(idDelete)">Potvrdi</button>

	      			<button type="button" class="btn btn-primary" data-dismiss="modal">Odustani</button>
	      		</div>
	      		
	      	</div>
	        
	        
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