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
										<a data-toggle="modal" href="#deleteModal">
											<i class="material-icons" style="cursor:pointer;">delete</i>
										</a>
										
									</div>
									<div class="col-sm-1">
										<a href="/editArticle">
											<i class="material-icons" style="cursor:pointer;">create</i>
										</a>
									</div>
								</div>
								<?php
									$content = $articles[$j]->content;
									$splitContent = explode(PHP_EOL, $content);
								?>
								<p class="card-text">{{ $splitContent[0]}}</p>


								<div class="card-text collapse" id="collapseArticle{{ $articles[$j]->id }}">
									@foreach($splitContent as $c)
									@if($c != $splitContent[0])
										<p>{{$c}}</p>
										@endif
									@endforeach
							</div>
								<a data-toggle="collapse" href="#collapseArticle{{ $articles[$j]->id }}" onclick="proba('klik{{ $articles[$j]->id }}')" >
									<i class="material-icons" > <label style="cursor:pointer;" id="klik{{ $articles[$j]->id }}">expand_more</label></i>
								</a>
							</div>
						</div>
					</div>
				</div>
<!--
				<div class="row">
					<div class="col-sm-12 mt-2">
						<div class="card mt-2 article">
							<div class="card-body">
								<div class="row">
									<div class="col-sm-10">
										<h4 class="card-title headline mt-1" >
											<label>Naslov 2</label>
										</h4>
									</div>
									<div class="col-sm-1">
										<a data-toggle="modal" href="#deleteModal">
											<i class="material-icons" style="cursor:pointer;">delete</i>
										</a>
										
									</div>
									<div class="col-sm-1">
										<a href="/editArticle">
											<i class="material-icons" style="cursor:pointer;">create</i>
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
			-->
				@endfor
			</div>
			@endfor
			<!--
			<div class="tab-pane fade" id="page2">
				<div class="row">
					<div class="col-sm-12">
						<div class="card mt-2 article">
							<div class="card-body">
								<div class="row">
									<div class="col-sm-10">
										<h4 class="card-title headline mt-1" >
											<label>Naslov 4</label>
										</h4>
									</div>
									<div class="col-sm-1">
										<a data-toggle="modal" href="#deleteModal">
											<i class="material-icons" style="cursor:pointer;">delete</i>
										</a>
										
									</div>
									<div class="col-sm-1">
										<a href="/editArticle">
											<i class="material-icons" style="cursor:pointer;">create</i>
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
				-->	
					<ul class="pagination nav nav-pills mt-3 d-flex justify-content-center">

						
						@for($i=0; $i<$page; $i++)
						
						<li class="page-item"><a class="page-link" data-toggle="pill" href="#page{{$i + 1}}">{{$i + 1}}</a></li>
						
						@endfor
					</ul>
				
				</div>
				
		
		<div class="col-sm-4">
			<div class="row mt-3">
				<div class="col-sm-12">
					<button type="button" class="btn btn-primary" style="width:100%;"><a class="nav-link" href=/editArticle style="color:white;">Kreiraj clanak</a></button>
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