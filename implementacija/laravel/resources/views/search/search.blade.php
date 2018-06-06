@extends('main')

@section('styles')
	<link rel="stylesheet" href="{{ URL::asset('css/stylesearch.css') }}">
@endsection

@section('navbar')
	@if(Auth::user()->isMod)
@include('navbar/navbarModerator')
	@elseif(Auth::user()->isAdmin)
	@include('navbar/navbarAdmin')
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
	<div class="container">
		<div class="row mt-5">
			<div class="col-sm-2">
			</div>
			<div class="col-sm-8">
				<div class="card article">
					<div class="card-body">

				<form class="m-5" name="searchAdForm" action="search" method="GET">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<h1 class="card-title mb-2">Pretraga igraca</h1>
					<div class="form-group">
						<div class="row mt-4">
							<div class="col-sm-4">
								<h4>Rank</h4>
							</div>
							<div class="col-sm-1 d-flex justify-content-center">
								<h5><label for="minRank">min:</label></h5>
							</div>
							<div class="col-sm-3">
								<select class="form-control" name="minRank" id="minRank">
									
											<option value=1 selected="true">Bronze V</option>
											<option value=2>Bronze IV</option>
											<option value=3>Bronze III</option>
											<option value=4>Bronze II</option>
											<option value=5>Bronze I</option>
											<option value=6>Silver V</option>
											<option value=7>Silver IV</option>
											<option value=8>Silver III</option>
											<option value=9>Silver II</option>
											<option value=10>Silver I</option>
											<option value=11>Gold V</option>
											<option value=12>Gold IV</option>
											<option value=13>Gold III</option>
											<option value=14>Gold II</option>
											<option value=15>Gold I</option>
											<option value=16>Platinum V</option>
											<option value=17>Platinum IV</option>
											<option value=18>Platinum III</option>
											<option value=19>Platinum II</option>
											<option value=20>Platinum I</option>
											<option value=21>Diamond V</option>
											<option value=22>Diamond IV</option>
											<option value=23>Diamond III</option>
											<option value=24>Diamond II</option>
											<option value=25>Diamond I</option>
											<option value=26>Master I</option>
											<option value=27>Challenger I</option>
								</select>
							</div>
							<div class="col-sm-1 d-flex justify-content-center">
								<h5><label for="maxRank ">max:</label></h5>
							</div>
							<div class="col-sm-3">
								<select class="form-control" name="maxRank" id="maxRank">
											<option value=1>Bronze V</option>
											<option value=2>Bronze IV</option>
											<option value=3>Bronze III</option>
											<option value=4>Bronze II</option>
											<option value=5>Bronze I</option>
											<option value=6>Silver V</option>
											<option value=7>Silver IV</option>
											<option value=8>Silver III</option>
											<option value=9>Silver II</option>
											<option value=10>Silver I</option>
											<option value=11>Gold V</option>
											<option value=12>Gold IV</option>
											<option value=13>Gold III</option>
											<option value=14>Gold II</option>
											<option value=15>Gold I</option>
											<option value=16>Platinum V</option>
											<option value=17>Platinum IV</option>
											<option value=18>Platinum III</option>
											<option value=19>Platinum II</option>
											<option value=20>Platinum I</option>
											<option value=21>Diamond V</option>
											<option value=22>Diamond IV</option>
											<option value=23>Diamond III</option>
											<option value=24>Diamond II</option>
											<option value=25>Diamond I</option>
											<option value=26>Master I</option>
											<option value=27 selected="true">Challenger I</option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-4">
								<h4>Nivo</h4>
							</div>
							<div class="col-sm-2 d-flex justify-content-end">
								<h5><label for="minLevel">min:</label></h5>
							</div>
							<div class="col-sm-2">
								<select class="form-control" name="minLevel" id="minLevel">
									<option selected="true" value=0>0</option>
											<option value=10>10</option>
											<option value=20>20</option>
											<option value=30>30</option>
											<option value=40>40</option>
											<option value=50>50</option>
											<option value=60>60</option>
											<option value=70>70</option>
											<option value=80>80</option>
											<option value=90>90</option>
											<option value=100>100</option>
											<option value=110>110</option>
											<option value=120>120</option>
											<option value=130>130</option>
											<option value=140>140</option>
											<option value=150>150</option>		
								</select>
							</div>
							<div class="col-sm-2 d-flex justify-content-end">
								<h5><label for="maxLevel">max:</label></h5>
							</div>
							<div class="col-sm-2">
								<select class="form-control" name="maxLevel" id="maxLevel">
									
											<option value=10>10</option>
											<option value=20>20</option>
											<option value=30>30</option>
											<option value=40>40</option>
											<option value=50>50</option>
											<option value=60>60</option>
											<option value=70>70</option>
											<option value=80>80</option>
											<option value=90>90</option>
											<option value=100>100</option>
											<option value=110>110</option>
											<option value=120>120</option>
											<option value=130>130</option>
											<option value=140>140</option>
											<option value=150 selected="true">150</option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-4">
								<h4><label for="gameMode">Mod igre</label></h4>
							</div>
							<div class="col-sm-4">
								<select class="form-control" name="gameMode" id="gameMode">
									<option value=0>Svi</option>
											<option value=1>Summoner's Rift</option>
											<option value=2>Twisted Treeline</option>
											<option value=3>Aram</option>
											<option value=4>Featured</option>
											<option value=5>Custom Game</option>	
								</select>
							</div>
							<div class="col-sm-4 ">
								&nbsp;
							</div>
							
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-4">
								<h4><label for="position">Pozicija</label></h4>
							</div>
							<div class="col-sm-4">
								<select class="form-control" name="position" id="position">
									<option value=0>Svi</option>
											<option value=1>ADC</option>
											<option value=2>Support</option>
											<option value=3>Jungler</option>
											<option value=4>Top Laner</option>
											<option value=5>Mid Laner</option>	
								</select>
							</div>
							<div class="col-sm-4 ">
								&nbsp;
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<button class="btn btn-lg btn-primary"style="width:100%;">Nadji</button>
						</div>
					</div>
				</form>
			</div>
		</div>
			</div>
			<div class="col-sm-2">
			</div>
		</div>

		@isset($ads)
		@forelse($ads as $ad)
			@if ($loop->index % 2 == 0)
				<div class="row mt-3">
			@endif
			<div class="col-sm-6 mt-3">
				<div class="card article  align-items-center">
				  <div class="card-body">
				  	<div class="row">
				  		
				  		<div class="col-sm-5">
				  			<div class="row">
				  				<div class="col-sm-12 d-flex justify-content-center">
				  					<h6>Rank: </h6>
				  				</div>
				  				<div class="col-sm-12 d-flex justify-content-center">
				  					<label name="resultRank" id="resultRank" style="font-size: 25px;">{{$ad->rank}}</label>
				  				</div>
				  				<div class="col-sm-12 d-flex justify-content-center">
				  					<h6>Pozicija: </h6>
				  				</div>
				  				<div class="col-sm-12 d-flex justify-content-center">
				  					<label name="resultPosition" id="resultPosition" style="font-size: 25px;">{{$ad->position}}</label>
				  				</div>
				  			</div>
				  		</div>
				  		<div class="col-sm-2 ">
				  			<div class="row">
				  				<div class="col-sm-12 d-flex justify-content-center">
				  					<div class="row">
				  						<div class="col-sm-12">
				  							<img src="{{$ad->icon}}" style="width:95px;">
				  						</div>
				  					</div>
				  					
				  				</div>
				  				<div class="col-sm-12 mt-2 d-flex justify-content-center">
				  					<a class="nav-link" href="/another?id={{$ad->user_id}}" style="color:white;"><button class="btn btn-primary">{{$ad->username}}</button>
				  					</a>
				  				</div>
				  			</div>
				  			
				  		</div>
				  		<div class="col-sm-5">
				  			<div class="row">
				  				<div class="col-sm-12 d-flex justify-content-center">
				  					<h6>Nivo: </h6>
				  				</div>
				  				<div class="col-sm-12 d-flex justify-content-center">
				  					<label name="resultLevel" id="resultLevel" style="font-size: 25px;">{{$ad->level}}</label>
				  				</div>
				  				<div class="col-sm-12 d-flex justify-content-center">
				  					<h6>Mod igre: </h6>
				  				</div>
				  				<div class="col-sm-12 d-flex justify-content-center">
				  					<label name="resultGameMode" id="resultGameMode" style="font-size: 22px;">{{$ad->mode}}</label>
				  				</div>
				  			</div>
				  		</div>
				  	</div>
				  	<div class="row mt-3">
				  		<div class="col-sm-1">
				  		</div>
				  		<div class="col-sm-10 areatext">
				  			<label name="resultDescr">{{$ad->ad_description}}
				  			</label>
				  		</div>
				  		<div class="col-sm-1">
				  		</div>
				  	</div>
				  	
				  </div>
				  <div class="card-content">
				
				  					<img src="{{$ad->champ1}}" style="width:40px;" class="ml-1 mr-1 rounded-circle">
				  				
				  					@if ($ad->champ2 != null)
				  					<img src="{{$ad->champ2}}" style="width:40px;" class="ml-1 mr-1 rounded-circle">
				  					@endif
				  					@if ($ad->champ3 != null)
				  					<img src="{{$ad->champ3}}" style="width:40px;" class="ml-1 mr-1 rounded-circle">
				  					@endif
				  	</div>
				  	<div class="card-content d-flex justify-content-center mt-3">
				  		@if($ad->online == 1)
				  		<h5>online</h5>&nbsp;<label name="resultOnline" id="resultOnline">{{$ad->user_description}}</label>
				  		@else
				  		<h5>offline</h5>&nbsp;<label name="resultOnline" id="resultOnline">{{$ad->user_description}}</label>
				  		@endif
				  	</div>
				</div>
			</div>
			@if ($loop->index % 2 == 1 || $loop->last)
			</div>
			@endif
		@empty
		<div class="row mt-3" id="neuspela">		
			<div class="col-sm-12" style="color:white;">
				<h3 class="d-flex justify-content-center">Nažalost nijedan oglas ne zadovoljava pretragu za zadate parametre.
				</h3>
				<h3 class="d-flex justify-content-center">Pokušajte sa izmenjenim parametrima.</h3>
			</div>
		</div>
		@endforelse
		@endisset


	</div>
@endsection