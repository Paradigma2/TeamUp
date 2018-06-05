@extends('main')

@section('styles')
	<link rel="stylesheet" href="{{ URL::asset('css/stylearticles.css') }}">
@endsection

@section('navbar')

	@include('navbar/navbarModerator')

@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-8 mt-3 tab-content">
			@if($length>0)
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
									<div class="col-sm-10">
										<h4 class="card-title headline mt-1" >
											<label align="center">{{ $articles[$j]->headline }}</label>
										</h4>
									</div>
									<div class="col-sm-1">
										<a data-toggle="modal" href="#deleteModal{{ $articles[$j]->id }}">
											<i class="material-icons" style="cursor:pointer;">delete</i>
										</a>
										
									</div>
									<div class="col-sm-1">
										<a href="/editArticle?id={{ $articles[$j]->id }}">
											<i class="material-icons" style="cursor:pointer;">create</i>
										</a>
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
									<img src="/{{$user->icon}}" width="15px">
									<strong>{{$user->username}}</strong>,
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
				@else
				<div class="container article mt-3">
							@if(Session::has('errors'))
					<div class="row mt-3">
						
						<div class="col-sm-12 mt-3">
								 @foreach($errors->all() as $error)
					      			 <div class="alert alert-primary" style="text-align: center;">
									{{$error}}
									</div>
					   			 @endforeach
								</div>
							</div>
							
							@endif
				<div class="row">
					<div class="col-sm-12">
						<form class="m-5" action="makeArticle" method="post">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="form-group">
								<div class="row">
									<div class="col-sm-4 d-flex justify-content-center">
										<h4><label for="naslov">Naslov:</label></h4>
									</div>
									<div class="col-sm-8">
										 <input type="text" class="form-control" id="naslov" name="naslov">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-4 d-flex justify-content-center">
										<h4><label for="tekst">Tekst:</label></h4>
									</div>
									<div class="col-sm-8">
										<textarea name="tekst" id="tekst" class="form-control" rows="13"></textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									
									
								</div>
								<div class="col-sm-8">
									 <button type="submit" name="bt" class="btn btn-primary nav-link" style="width:100%;">Objavi</button>
								</div>
						
							</div>
							   
						</form>
					</div>
				</div>
				</div>
				@endif
				</div>
				
		
		<div class="col-sm-4">
			<div class="row mt-3">
				<div class="col-sm-12">
					<button type="button" class="btn btn-primary" style="width:100%;"><a class="nav-link" href=/createArticle style="color:white;">Kreiraj clanak</a></button>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
			<div class="card mt-3 article">
				<div class="card-body">
					<div class="card-title">
						<h2>Pravila</h2>
						
					</div>
					<p>Moderator ne sme davati svoj profil drugim igracima na koriscenje. U suprotnom, moderator ce biti banovan sa sajta.</p>
				<p>Clanci moraju biti vezani za desavanja u LoL-u i sadrzati korisne i zanimljive informacije. U suprotnom, clanci ce biti uklonjeni sa sajta.</p>
				<p>Clanci ne smeju imati vulgaran sadrzaj. U suprotnom, moderator ce biti banovan, a svi njegovi clanci uklonjeni sa sajta.</p>
				<p>Clanci ne smeju sluziti za prozivanje drugih igraca ili korisnika sajta. U suprotnom, moderator ce biti banovan, a svi njegovi clanci uklonjeni sa sajta.</p>
				</div>
				
			</div>
		</div>
	</div>
		</div>
		</div>
	</div>
	@foreach($articles as $article)
	<div class="modal fade" id="deleteModal{{$article->id}}">
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
	      			<form name="deleteArticle" action="deleteArticle" method="POST">
	      				<input type="hidden" name="_token" value="{{ csrf_token() }}">
	      				<input type="hidden" name="id" value="{{$article->id}}">
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

@endsection