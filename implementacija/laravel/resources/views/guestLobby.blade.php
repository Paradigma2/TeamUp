<!-- autor: Sanja Perisic 97/2015-->
@extends('main')

@section('styles')
	<link rel="stylesheet" href="{{ URL::asset('css/stylelobby.css') }}">
@endsection

@section('navbar')
	@include('navbar/navbarGuest')
@endsection

@section('content')

<div class="container">

	@if(count($errors)>0)
	         		<div class="row">
	         			<div class="col-sm-12 mt-3">
	         				@foreach($errors->all() as $error)
	         				<div class="alert alert-primary" style="text-align:center;">
	         					{{$error}} 	
	         					</div>
	         				@endforeach
	         			</div>
	         		</div>	
	         			

	         	@endif

@if(Session::get('banovanSi')!=null)

<div class="alert mt-3 alert-primary alert-dismissible fade show" role="alert">
 {{Session::get('banovanSi')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
	
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
	      <img src={{ URL::asset('slike/carousel1.jpg') }} alt="pic1" width="100%" height="500">
	      <div class="carousel-caption">
	        <h6 class="display-4">Postani član najveće LoL zajednice u regionu</h6>
	      </div>   
	    </div>
	    <div class="carousel-item">

	      <img src={{ URL::asset('slike/carousel2.jpg') }} alt="pic2" width="1100" height="500">
	      <div class="carousel-caption">
	        <h1 class="display-4">Pronađi svog idealnog saigrača</h1>
	      </div>   
	    </div>
	    <div class="carousel-item">
	    	<a href="#page1">
	      <img src={{ URL::asset('slike/carousel3.jpg') }} alt="pic3" width="1100" height="500"></a>
	      <div class="carousel-caption">
	        <h1 class="display-4">Saznaj prvi najnovija dešavanja</h1>
	      </div>   
	    </div>
	    <div class="carousel-item">
	      <img src={{ URL::asset('slike/carousel4.jpg') }} alt="pic4" width="1100" height="500">
	      <div class="carousel-caption">
	        <h1 class="display-4">Učestvuj u turnirima zajedno sa ostalim članovima</h1>
	      </div>   
	    </div>
	    <div class="carousel-item">
	    	<div class="carousel-caption">
	        <h1 class="display-4">Pridruži se danas!</h1>
	       
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
			<a class="nav-link" href=/registerForm style="color:white; padding: 0em;"><button class="btn btn-primary mr-2 btn-lg" type="button">Registruj se</button></a>
		
				<button class="btn btn-primary ml-2 btn-lg" type="button" data-toggle="modal" data-target="#logInModal">Uloguj se</button>
			
		</div>
	</div>

	<div class="row">
		<div class="col-sm-2">&nbsp;</div>
		<div class="col-sm-8 mt-3 tab-content">
			<label hidden>{{$l = $length}}</label>
			@for($j=0, $page=0; $j<$l; $page++)
			@if($j==0)
				<div class="tab-pane active" id="page{{$page + 1}}">
			@else
				<div class="tab-pane fade" id="page{{$page + 1}}">
			@endif

			@for($i=0; $i<2 && $j<$l; $i++, $j++)
			
				<div class="row">
					<div class="col-sm-12">
						<div class="card mt-2 article">
							
							<div class="card-body">
								<div class="row">
									<div class="col-sm-12">
										<h4 class="card-title headline mt-1" >
											<label>{{ $articles[$j]->headline }}</label>
										</h4>
									</div>
								</div>
								<?php
									$content = $articles[$j]->content;
									$splitContent = explode(PHP_EOL, $content);
								?>
								<p class="card-text" style="text-align: justify;">{{ $splitContent[0]}}</p>


								<div class="card-text collapse" id="collapseArticle{{ $articles[$j]->id }}">@foreach($splitContent as $c)
												@if($c != $splitContent[0])
													<p style="text-align: justify;">{{$c}}</p>
													@endif
												@endforeach</div>
								<div class="row">
								<div class="col-sm-2">
								<a data-toggle="collapse" href="#collapseArticle{{ $articles[$j]->id }}" onclick="proba('klik{{ $articles[$j]->id }}')" >
									<i class="material-icons" > <label style="cursor:pointer;" id="klik{{ $articles[$j]->id }}">expand_more</label></i>
								</a>
								</div>
								<div class="col-sm-10 headline" style="text-align:right;">
									<img src="/{{$users[$j]->icon}}" width="15px">
									<strong>{{$users[$j]->username}}</strong>,
									{{$articles[$j]->updated_at}}
									
								</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				@endfor
				</div>
				@endfor
				

			
					<ul class="pagination nav nav-pills mt-3 d-flex justify-content-center">
					@for($i=0; $i<$page; $i++)
					<li class="page-item"><a class="page-link" data-toggle="pill" href="#page{{$i + 1}}">{{$i + 1}}</a></li>
					@endfor
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
	         <form class="m-5" name="logInForm" method="post" action="login">
	         	
	         	<div class="form-group">
	         		<input type="hidden" name="_token" value="{{ csrf_token() }}">
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
	         				 <input type="password" class="form-control" id="pass" name="password">
	         			</div>
	         		</div>
	         	</div>
	         	<div class="row">
	         		<div class="col-sm-5 d-flex justify-content-center">
	         			
	         					 <button type="button" class="btn btn-primary" data-dismiss="modal">Odustani</button>
	         				
	         			</div>
	         			<div class="col-sm-7">
	         			<button type="submit" class="btn btn-primary" style="padding:7px;" >Uloguj se</button>
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