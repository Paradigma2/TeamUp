@extends('main')

@section('styles')
	<link rel="stylesheet" href="{{ URL::asset('css/stylelobby.css') }}">
@endsection


@section('navbar')
	@if($theUser->isMod)
@include('navbar/navbarModerator')
	@else
	@include('navbar/navbarUser')
	@endif
@endsection

@section('content')

		@if(Session::get('msgBlocked')!=null)

<div class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
  <strong style="color:black;">{{Session::get('msgBlocked')}}</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
	
		<div class="row mt-3 p-3">

			
			<div class="col-sm-3">
				<div class="card mt-3 article">
					<div class="card-body">
						<div class="card-title">
							<h2>Pratite</h2>
							
						</div>
						<!-- Ovaj ili div ispod ce biti aktivni-->
						
						@php
							$len = count($followed);
						@endphp
						@if($len==0)
						<div class="pages p-3">
							<h6>Jos uvek nikoga ne pratite</h6>
						</div>
						@else
						<div class="list-group pages" style="height:300px; overflow-y:auto;">
							@foreach($followed as $f)
						   <a href="/another?id={{$f->id}}" class="list-group-item list-group-item-action pages list-group-item-dark"><img src="/{{$f->icon}}" width="30px" class="mr-2">{{$f->username}}
						   	@if($f->online)
						   	<i class="material-icons ml-4" style="font-size:15px;color:green;">person</i>
						   	@else
						   	<i class="material-icons ml-4" style="font-size:15px;color:gray;">person</i>
						   	@endif
						   </a>
						   @endforeach
						   <!--
						  <a href="#" class="list-group-item list-group-item-action pages list-group-item-dark"><img src="/slike/alistar.png" width="30px" class="mr-2">meanGirl<i class="material-icons ml-4" style="color:green; font-size:15px;" >person</i></a>
						   <a href="#" class="list-group-item list-group-item-action pages list-group-item-dark"><img src="/slike/alistar.png" width="30px" class="mr-2">meanGirl<i class="material-icons ml-4" style="color:gray; font-size:15px;" >person</i></a>
							-->
						 </div>
						@endif
					</div>
					
				</div>
			</div>
			<div class="col-sm-6">
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
				        <h6 class="display-4"><label>
				        	@if($length>0)
				        	{{$articles[0]->headline}}
				        	@endif
				        </label></h6>
				      </div>   
				    </div>
				    <div class="carousel-item">
				    	<a href="#page1">
				      <img src={{ URL::asset('slike/carousel2.jpg') }} alt="pic2" width="1100" height="300"></a>
				      <div class="carousel-caption">
				        <h1 class="display-4"><label>@if($length>1)
				        	{{$articles[1]->headline}}
				        	@endif</label></h1>
				      </div>   
				    </div>
				    <div class="carousel-item">
				    	<a href="#page2">
				      <img src={{ URL::asset('slike/carousel3.jpg') }} alt="pic3" width="1100" height="300"></a>
				      <div class="carousel-caption">
				        <h1 class="display-4"><label>@if($length>2)
				        	{{$articles[2]->headline}}
				        	@endif</label></h1>
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
						<label hidden>{{$l = $length}}</label>
						@for($j=0, $page=0; $j<$l; $page++)
						@if($j==0)
							<div class="tab-pane active" id="page{{$page + 1}}">
						@else
							<div class="tab-pane fade" id="page{{$page + 1}}">
						@endif

						@for($i=0; $i<3 && $j<$l; $i++, $j++)
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


											<div class="card-text collapse" id="collapseArticle{{ $articles[$j]->id }}">
												@foreach($splitContent as $c)
												@if($c != $splitContent[0])
													<p style="text-align: justify;">{{$c}}</p>
													@endif
												@endforeach
											</div>
											<div class="row">
								<div class="col-sm-2">
								<a data-toggle="collapse" href="#collapseArticle{{ $articles[$j]->id }}" onclick="proba('klik{{ $articles[$j]->id }}')" >
									<i class="material-icons" > <label style="cursor:pointer;" id="klik{{ $articles[$j]->id }}">expand_more</label></i>
								</a>
								</div>
								<div class="col-sm-10 headline" style="text-align:right;">
									<img src="/{{$authors[$j]->icon}}" width="15px">
									<strong>{{$authors[$j]->username}}</strong>,
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

			</div>
			
		</div>
		<div class="col-sm-3">
				<div class="card mt-3 article">
					<div class="card-body">
						<div class="card-title">
							<h2>Pretrazi</h2>
							
						</div>
						<div class="row">
							<div class="col-sm-12 mb-3">
								<form name="searchUserForm" method="GET" action="searchUserByName">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="row">
									<div class="col-sm-8">
										<input type="text" class="form-control form-control-sm" name="usernameSearch" id="usernameSearch" style="font-size=8pt;" value="{{$p}}">
									</div>
									<div class="col-sm-4">
										<button type="submit" class="btn btn-primary btn-sm">Trazi</button>
									</div>
									</div>
								</form>
							</div>
						</div>
						@php
							$length = count($users);
						@endphp
						<!--      sredi ovooo   -->
						@foreach($errors->all() as $error)
							<p>{{$error}}</p>
						@endforeach
						@if($length > 0 && ($users[0] == "Ne postoji korisnik"))
							<p>{{$users[0]}}</p>
						@elseif($length>0)
						<div class="list-group pages" style="height:150px; overflow-y:auto;">
						  @foreach($users as $u)

							@if($theUser->id == $u->id)
							<a href="/showUser" class="list-group-item list-group-item-action pages list-group-item-dark"><img src="/{{$u->icon}}" width="30px" class="mr-2">{{$u->username}}</a>
							@else
							{{$blokiran=false}}
								@foreach($blocked as $b)
						  			@if($u->id == $b->id)
						  				<label hidden>{{$blokiran = true}}</label>
<<<<<<< HEAD
=======
						  				
>>>>>>> ebd03a8448c5f246131193f09648a19ca2ad37d8
						  				@break
						  			@endif
						  		@endforeach
						  		@if($blokiran)

						  		
<<<<<<< HEAD
						  			<a href="#deleteModal{{$u->id}}" data-toggle='modal' class="list-group-item list-group-item-action pages list-group-item-dark"><img src="/{{$u->icon}}" width="30px" class="mr-2">{{$u->username}}</a>
=======
						  			<a href="#deleteModal{{$u->id}}" data-toggle="modal" class="list-group-item list-group-item-action pages list-group-item-dark"><img src="/{{$u->icon}}" width="30px" class="mr-2">{{$u->username}}</a>
>>>>>>> ebd03a8448c5f246131193f09648a19ca2ad37d8
						  		@else

									<a href="/another?id={{$u->id}}" class="list-group-item list-group-item-action pages list-group-item-dark"><img src="/{{$u->icon}}" width="30px" class="mr-2">{{$u->username}}</a>
								@endif
							@endif
							
							
						 @endforeach

						 </div>
						 @endif
						
					</div>
					
				</div>
			</div>
		
	</div>

	@foreach($blocked as $b)
	<div class="modal fade" id="deleteModal{{$b->id}}">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content pages">

	      <!-- Modal Header -->
	      <div class="modal-header ">
	        <h4 class="modal-title d-flex justify-content-center">Odblokirajte korisnika?</h4>
	        <button type="button" class="close" style="color:white;" data-dismiss="modal">&times;</button>
	      </div>

	      <!-- Modal body -->
	      

	      <!-- Modal footer -->
	      <div class="modal-body">
	      	<div class="row">
	      		<div class="col-sm-12  d-flex justify-content-center">
	      			<form name="deleteBlock" action="odblokirajKorisnika" method="POST">
	      				<input type="hidden" name="_token" value="{{ csrf_token() }}">
	      				<input type="hidden" name="id" value="{{$b->id}}">
	      			<button type="submit" class="btn btn-primary mr-2" >Potvrdi</button>
	      			</form>
	      			<button type="button" class="btn btn-primary" data-dismiss="modal">Odustani</button>
	      		</div>
	      		
	      	</div>
	        
	        
	      </div>

	    </div>
	  </div>
	</div>
	@endforeach


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

@endsection