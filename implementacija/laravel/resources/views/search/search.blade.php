@extends('main')

@section('styles')
	<link rel="stylesheet" href="{{ URL::asset('css/stylesearch.css') }}">
@endsection

@section('content')
	<div class="container">
		<div class="row mt-5">
			<div class="col-sm-2">
			</div>
			<div class="col-sm-8">
				<div class="card article">
					<div class="card-body">

				<form name="searchAdForm">
					<h1 class="card-title mb-2">Pretraga igraca</h1>
					<div class="form-group">
						<div class="row mt-4">
							<div class="col-sm-4">
								<h4>Rank</h4>
							</div>
							<div class="col-sm-2 d-flex justify-content-end">
								<h5><label for="minRank">min:</label></h5>
							</div>
							<div class="col-sm-2">
								<select class="form-control" name="minRank" id="minRank">
									<option>Svi</option>
											<option>Bronze V</option>
											<option>Bronze IV</option>
											<option>Bronze III</option>
											<option>Bronze II</option>
											<option>Bronze I</option>
											<option>Silver V</option>
											<option>Silver IV</option>
											<option>Silver III</option>
											<option>Silver II</option>
											<option>Silver I</option>
											<option>Gold V</option>
											<option>Gold IV</option>
											<option>Gold III</option>
											<option>Gold II</option>
											<option>Gold I</option>
											<option>Platinum V</option>
											<option>Platinum IV</option>
											<option>Platinum III</option>
											<option>Platinum II</option>
											<option>Platinum I</option>
											<option>Diamond V</option>
											<option>Diamond IV</option>
											<option>Diamond III</option>
											<option>Diamond II</option>
											<option>Diamond I</option>
											<option>Master I</option>
											<option>Challenger</option>
								</select>
							</div>
							<div class="col-sm-2 d-flex justify-content-end">
								<h5><label for="maxRank ">max:</label></h5>
							</div>
							<div class="col-sm-2">
								<select class="form-control" name="maxRank" id="maxRank">
									<option>Svi</option>
											<option>Bronze V</option>
											<option>Bronze IV</option>
											<option>Bronze III</option>
											<option>Bronze II</option>
											<option>Bronze I</option>
											<option>Silver V</option>
											<option>Silver IV</option>
											<option>Silver III</option>
											<option>Silver II</option>
											<option>Silver I</option>
											<option>Gold V</option>
											<option>Gold IV</option>
											<option>Gold III</option>
											<option>Gold II</option>
											<option>Gold I</option>
											<option>Platinum V</option>
											<option>Platinum IV</option>
											<option>Platinum III</option>
											<option>Platinum II</option>
											<option>Platinum I</option>
											<option>Diamond V</option>
											<option>Diamond IV</option>
											<option>Diamond III</option>
											<option>Diamond II</option>
											<option>Diamond I</option>
											<option>Master I</option>
											<option>Challenger</option>
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
									<option>Svi</option>
									<option>0</option>
											<option>10</option>
											<option>20</option>
											<option>30</option>
											<option>40</option>
											<option>50</option>
											<option>60</option>
											<option>70</option>
											<option>80</option>
											<option>90</option>
											<option>100</option>
											<option>110</option>
											<option>120</option>
											<option>130</option>
											<option>140</option>
											<option>150</option>		
								</select>
							</div>
							<div class="col-sm-2 d-flex justify-content-end">
								<h5><label for="maxLevel">max:</label></h5>
							</div>
							<div class="col-sm-2">
								<select class="form-control" name="maxLevel" id="maxLevel">
									<option>Svi</option>
									<option>10</option>
											<option>20</option>
											<option>30</option>
											<option>40</option>
											<option>50</option>
											<option>60</option>
											<option>70</option>
											<option>80</option>
											<option>90</option>
											<option>100</option>
											<option>110</option>
											<option>120</option>
											<option>130</option>
											<option>140</option>
											<option>veći od 150</option>
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
									<option>Svi</option>
											<option>Summoner's Rift</option>
											<option>Twisted Treeline</option>
											<option>Aram</option>
											<option>Featured</option>
											<option>Custom Game</option>	
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
									<option>Svi</option>
											<option>ADC</option>
											<option>Support</option>
											<option>Jungler</option>
											<option>Top Laner</option>
											<option>Mid Laner</option>	
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
		<div class="row mt-3" id="neuspela">
			
			<div class="col-sm-12" style="color:white;">
				<h3 class="d-flex justify-content-center">Nažalost nijedan oglas ne zadovoljava pretragu za zadate parametre.</h3>
				<h3 class="d-flex justify-content-center">Pokušajte sa izmenjenim parametrima.</h3>
			</div>
			
		</div>
		<div class="row mt-3">
			<div class="col-sm-6 mt-3">
				<div class="card article  align-items-center">
				  <div class="card-body">
				  	<div class="row">
				  		
				  		<div class="col-sm-5">
				  			<div class="row">
				  				<div class="col-sm-12 d-flex justify-content-center">
				  					<h4>Rank: </h4>
				  				</div>
				  				<div class="col-sm-12 d-flex justify-content-center">
				  					<label name="resultRank" id="resultRank"> Gold V</label>
				  				</div>
				  				<div class="col-sm-12 d-flex justify-content-center">
				  					<h4>Pozicija: </h4>
				  				</div>
				  				<div class="col-sm-12 d-flex justify-content-center">
				  					<label name="resultPosition" id="resultPosition">Mid Laner</label>
				  				</div>
				  			</div>
				  		</div>
				  		<div class="col-sm-2 ">
				  			<div class="row">
				  				<div class="col-sm-12 d-flex justify-content-center">
				  					<div class="row">
				  						<div class="col-sm-12">
				  							<img src="/slike/Darius.png" style="width:95px;">
				  						</div>
				  					</div>
				  					
				  				</div>
				  				<div class="col-sm-12 mt-2 d-flex justify-content-center">
				  					<button class="btn btn-sm btn-primary">jonny123
				  					</button>
				  				</div>
				  			</div>
				  			
				  		</div>
				  		<div class="col-sm-5">
				  			<div class="row">
				  				<div class="col-sm-12 d-flex justify-content-center">
				  					<h4>Nivo: </h4>
				  				</div>
				  				<div class="col-sm-12 d-flex justify-content-center">
				  					<label name="resultLevel" id="resultLevel">50</label>
				  				</div>
				  				<div class="col-sm-12 d-flex justify-content-center">
				  					<h4>Mod igre: </h4>
				  				</div>
				  				<div class="col-sm-12 d-flex justify-content-center">
				  					<label name="resultGameMode" id="resultGameMode">Summoner's rift</label>
				  				</div>
				  			</div>
				  		</div>
				  	</div>
				  	<div class="row mt-3">
				  		<div class="col-sm-1">
				  		</div>
				  		<div class="col-sm-10 areatext">
				  			<label name="resultDescr">Trazim igraca za ranked 
				  			</label>
				  		</div>
				  		<div class="col-sm-1">
				  		</div>
				  	</div>
				  	
				  </div>
				  <div class="card-content">
				
				  					<img src="/slike/Brand.png" style="width:40px;" class="ml-1 mr-1 rounded-circle">
				  				
				  				
				  					<img src="/slike/Brand.png" style="width:40px;" class="ml-1 mr-1 rounded-circle">
				  				
				  				
				  					<img src="/slike/Brand.png" style="width:40px;" class="ml-1 mr-1 rounded-circle">
				  				
				  		
				  		
				  	</div>
				  	<div class="card-content d-flex justify-content-center mt-3">
				  		<h5>Online: </h5>&nbsp;<label name="resultOnline" id="resultOnline">posle 8</label>
				  	</div>
				</div>
			</div>
			<div class="col-sm-6 mt-3">
				<div class="card article  align-items-center">
				  <div class="card-body">
				  	<div class="row">
				  		
				  		<div class="col-sm-5">
				  			<div class="row">
				  				<div class="col-sm-12 d-flex justify-content-center">
				  					<h4>Rank: </h4>
				  				</div>
				  				<div class="col-sm-12 d-flex justify-content-center">
				  					<label name="resultRank" id="resultRank"> Gold V</label>
				  				</div>
				  				<div class="col-sm-12 d-flex justify-content-center">
				  					<h4>Pozicija: </h4>
				  				</div>
				  				<div class="col-sm-12 d-flex justify-content-center">
				  					<label name="resultPosition" id="resultPosition">Mid Laner</label>
				  				</div>
				  			</div>
				  		</div>
				  		<div class="col-sm-2 ">
				  			<div class="row">
				  				<div class="col-sm-12 d-flex justify-content-center">
				  					<div class="row">
				  						<div class="col-sm-12">
				  							<img src="/slike/Darius.png" style="width:95px;">
				  						</div>
				  					</div>
				  					
				  				</div>
				  				<div class="col-sm-12 mt-2 d-flex justify-content-center">
				  					<button class="btn btn-sm btn-primary">jonny123
				  					</button>
				  				</div>
				  			</div>
				  			
				  		</div>
				  		<div class="col-sm-5">
				  			<div class="row">
				  				<div class="col-sm-12 d-flex justify-content-center">
				  					<h4>Nivo: </h4>
				  				</div>
				  				<div class="col-sm-12 d-flex justify-content-center">
				  					<label name="resultLevel" id="resultLevel">50</label>
				  				</div>
				  				<div class="col-sm-12 d-flex justify-content-center">
				  					<h4>Mod igre: </h4>
				  				</div>
				  				<div class="col-sm-12 d-flex justify-content-center">
				  					<label name="resultGameMode" id="resultGameMode">Summoner's rift</label>
				  				</div>
				  			</div>
				  		</div>
				  	</div>
				  	<div class="row mt-3">
				  		<div class="col-sm-1">
				  		</div>
				  		<div class="col-sm-10 areatext">
				  			<label name="resultDescr">Trazim igraca za ranked 
				  			</label>
				  		</div>
				  		<div class="col-sm-1">
				  		</div>
				  	</div>
				  	
				  </div>
				  <div class="card-content">
				
				  					<img src="/slike/Brand.png" style="width:40px;" class="ml-1 mr-1 rounded-circle">
				  				
				  				
				  					<img src="/slike/Brand.png" style="width:40px;" class="ml-1 mr-1 rounded-circle">
				  				
				  				
				  					<img src="/slike/Brand.png" style="width:40px;" class="ml-1 mr-1 rounded-circle">
				  				
				  		
				  		
				  	</div>
				  	<div class="card-content d-flex justify-content-center mt-3">
				  		<h5>Online: </h5>&nbsp;<label name="resultOnline" id="resultOnline">posle 8</label>
				  	</div>
				</div>
			</div>
		</div>

		<div class="row mt-3">
			<div class="col-sm-6 mt-3">
				<div class="card article  align-items-center">
				  <div class="card-body">
				  	<div class="row">
				  		
				  		<div class="col-sm-5">
				  			<div class="row">
				  				<div class="col-sm-12 d-flex justify-content-center">
				  					<h4>Rank: </h4>
				  				</div>
				  				<div class="col-sm-12 d-flex justify-content-center">
				  					<label name="resultRank" id="resultRank"> Gold V</label>
				  				</div>
				  				<div class="col-sm-12 d-flex justify-content-center">
				  					<h4>Pozicija: </h4>
				  				</div>
				  				<div class="col-sm-12 d-flex justify-content-center">
				  					<label name="resultPosition" id="resultPosition">Mid Laner</label>
				  				</div>
				  			</div>
				  		</div>
				  		<div class="col-sm-2 ">
				  			<div class="row">
				  				<div class="col-sm-12 d-flex justify-content-center">
				  					<div class="row">
				  						<div class="col-sm-12">
				  							<img src="/slike/Darius.png" style="width:95px;">
				  						</div>
				  					</div>
				  					
				  				</div>
				  				<div class="col-sm-12 mt-2 d-flex justify-content-center">
				  					<button class="btn btn-sm btn-primary">jonny123
				  					</button>
				  				</div>
				  			</div>
				  			
				  		</div>
				  		<div class="col-sm-5">
				  			<div class="row">
				  				<div class="col-sm-12 d-flex justify-content-center">
				  					<h4>Nivo: </h4>
				  				</div>
				  				<div class="col-sm-12 d-flex justify-content-center">
				  					<label name="resultLevel" id="resultLevel">50</label>
				  				</div>
				  				<div class="col-sm-12 d-flex justify-content-center">
				  					<h4>Mod igre: </h4>
				  				</div>
				  				<div class="col-sm-12 d-flex justify-content-center">
				  					<label name="resultGameMode" id="resultGameMode">Summoner's rift</label>
				  				</div>
				  			</div>
				  		</div>
				  	</div>
				  	<div class="row mt-3">
				  		<div class="col-sm-1">
				  		</div>
				  		<div class="col-sm-10 areatext">
				  			<label name="resultDescr">Trazim igraca za ranked 
				  			</label>
				  		</div>
				  		<div class="col-sm-1">
				  		</div>
				  	</div>
				  	
				  </div>
				  <div class="card-content">
				
				  					<img src="/slike/Brand.png" style="width:40px;" class="ml-1 mr-1 rounded-circle">
				  				
				  				
				  					<img src="/slike/Brand.png" style="width:40px;" class="ml-1 mr-1 rounded-circle">
				  				
				  				
				  					<img src="/slike/Brand.png" style="width:40px;" class="ml-1 mr-1 rounded-circle">
				  				
				  		
				  		
				  	</div>
				  	<div class="card-content d-flex justify-content-center mt-3">
				  		<h5>Online: </h5>&nbsp;<label name="resultOnline" id="resultOnline">posle 8</label>
				  	</div>
				</div>
			</div>
			<div class="col-sm-6 mt-3">
				<div class="card article  align-items-center">
				  <div class="card-body">
				  	<div class="row">
				  		
				  		<div class="col-sm-5">
				  			<div class="row">
				  				<div class="col-sm-12 d-flex justify-content-center">
				  					<h4>Rank: </h4>
				  				</div>
				  				<div class="col-sm-12 d-flex justify-content-center">
				  					<label name="resultRank" id="resultRank"> Gold V</label>
				  				</div>
				  				<div class="col-sm-12 d-flex justify-content-center">
				  					<h4>Pozicija: </h4>
				  				</div>
				  				<div class="col-sm-12 d-flex justify-content-center">
				  					<label name="resultPosition" id="resultPosition">Mid Laner</label>
				  				</div>
				  			</div>
				  		</div>
				  		<div class="col-sm-2 ">
				  			<div class="row">
				  				<div class="col-sm-12 d-flex justify-content-center">
				  					<div class="row">
				  						<div class="col-sm-12">
				  							<img src="/slike/Darius.png" style="width:95px;">
				  						</div>
				  					</div>
				  					
				  				</div>
				  				<div class="col-sm-12 mt-2 d-flex justify-content-center">
				  					<button class="btn btn-sm btn-primary">jonny123
				  					</button>
				  				</div>
				  			</div>
				  			
				  		</div>
				  		<div class="col-sm-5">
				  			<div class="row">
				  				<div class="col-sm-12 d-flex justify-content-center">
				  					<h4>Nivo: </h4>
				  				</div>
				  				<div class="col-sm-12 d-flex justify-content-center">
				  					<label name="resultLevel" id="resultLevel">50</label>
				  				</div>
				  				<div class="col-sm-12 d-flex justify-content-center">
				  					<h4>Mod igre: </h4>
				  				</div>
				  				<div class="col-sm-12 d-flex justify-content-center">
				  					<label name="resultGameMode" id="resultGameMode">Summoner's rift</label>
				  				</div>
				  			</div>
				  		</div>
				  	</div>
				  	<div class="row mt-3">
				  		<div class="col-sm-1">
				  		</div>
				  		<div class="col-sm-10 areatext">
				  			<label name="resultDescr">Trazim igraca za ranked 
				  			</label>
				  		</div>
				  		<div class="col-sm-1">
				  		</div>
				  	</div>
				  	
				  </div>
				  <div class="card-content">
				
				  					<img src="/slike/Brand.png" style="width:40px;" class="ml-1 mr-1 rounded-circle">
				  				
				  				
				  					<img src="/slike/Brand.png" style="width:40px;" class="ml-1 mr-1 rounded-circle">
				  				
				  				
				  					<img src="/slike/Brand.png" style="width:40px;" class="ml-1 mr-1 rounded-circle">
				  				
				  		
				  		
				  	</div>
				  	<div class="card-content d-flex justify-content-center mt-3">
				  		<h5>Online: </h5>&nbsp;<label name="resultOnline" id="resultOnline">posle 8</label>
				  	</div>
				</div>
			</div>
		</div>

	</div>
@endsection