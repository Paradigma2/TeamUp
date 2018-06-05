@extends('main')

@section('styles')
	<link rel="icon" href="slike/icon.png" type="image/png">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ URL::asset('css/styleProfile.css') }}">

@endsection



@section('content')


<div class=" container-fluid">
	<div class="row mt-4	">
		<div class="col-sm-1">
		</div>

			<div class="col-sm-10" style="  border: 2px solid #184157; color:white;background-color: rgba(5,5,5,0.9); border-radius: 5px">
			<form   method="post" action="createAd" name="forma">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="idAd" value="{{ $id }}">
				<div class="container">
					@if(count($errors)>0)
				
	         		<div class="mt-3 alert-danger">
	         		
	         			<ul>
	         				
	         				@foreach($errors->all() as $m)
	         				
	         					<li>{{$m}}</li>
	         				@endforeach
	         				
	         			</ul>
	         		</div>
	         		
	         	@endif

	         	@if(Session::get('nemaHeroja')!=null)
	         		<div class="mt-3 alert-danger">
	         		
	         			<ul>
	         				<li>
	         				{{Session::get('nemaHeroja')}}
	         				</li>
	         			</ul>
	         		</div>
	         	@endif
	         	@if(Session::get('nemasHeroja')!=null)
	         		<div class="mt-3 alert-danger">
	         		
	         			<ul>
	         				<li>
	         				{{Session::get('nemasHeroja')}}
	         				</li>
	         			</ul>
	         		</div>
	         	@endif
	         	@if(Session::get('previseHeroja')!=null)
	         		<div class="mt-3 alert-danger">
	         		
	         			<ul>
	         				<li>
	         				{{Session::get('previseHeroja')}}
	         				</li>
	         			</ul>
	         		</div>
	         	@endif
				<div class=" mt-3  	row">	
				<div class="col-sm-6">
				<div class=" form-group">
					<label style="color:#9D907D;">
						Mod igre:
					</label>
					<select name="mod" class="oglas">
							
						<option @if($ad!=null) @if($mode
										=="Summoners Rift") {{"selected"}}@endif @endif>Summoners Rift</option>
						<option @if($ad!=null) @if($mode
										=="Twisted Treeline") {{"selected"}}@endif @endif>Twisted Treeline</option>
						<option  @if($ad!=null) @if($mode
										=="Aram") {{"selected"}}@endif @endif>Aram</option>
						<option @if($ad!=null) @if($mode
										=="Featured") {{"selected"}}@endif @endif>Featured</option>
						<option @if($ad!=null) @if($mode
										=="Custom Game") {{"selected"}}@endif @endif>Custom Game</option>
					</select>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label style="color:#9D907D;">
						Pozicija:
					</label>
					<select name="pozicija" class="oglas">
						
									<option @if($ad!=null) @if($position
										=="ADC") {{"selected"}}@endif @endif>ADC</option>
									<option  @if($ad!=null) @if($position
										=="Support") {{"selected"}}@endif @endif>Support</option>
									
									<option @if($ad!=null) @if($position
										=="Jungle") {{"selected"}}@endif @endif>Jungle</option>
									<option @if($ad!=null) @if($position
										=="Top") {{"selected"}}@endif @endif>Top</option>
									<option @if($ad!=null) @if($position
										=="Mid") {{"selected"}}@endif @endif>Mid</option>
					</select>
				</div>
				</div>	
					</div>	
				

				<div class="form-group">
					<label style="color:#9D907D;">
						Heroji:
					</label>
					<div class="form-control" style="background-color: rgba(5,5,5,0.8); border:none; padding:0px background-color:transparent; ">
						@foreach($champions as $champion)
							<input type='checkbox' name='slike[]' value='{{$champion->name}}' id="{{$champion->name}}"/><label for="{{$champion->name}}"><img src="{{$champion->icon}}" class="heroj"></label>
						@endforeach
							<!--
								<input type='checkbox' name='slike[]' value='Ahri' id="Ahri"/><label for="Ahri"><img src="slike/Ahri.png" class="heroj"></label>
								<input type='checkbox' name='slike[]' value='Akali' id="Akali"/><label for="Akali"><img src="slike/Akali.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Alistar' id="Alistar"/><label for="Alistar"><img src="slike/Alistar.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Amumu' id="Amumu"/><label for="Amumu"><img src="slike/Amumu.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Anivia' id="Anivia"/><label for="Anivia"><img src="slike/Anivia.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Annie' id="Annie"/><label for="Annie"><img src="slike/Annie.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Ashe' id="Ashe"/><label for="Ashe"><img src="slike/Ashe.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='AurelionSol' id="AurelionSol"/><label for="AurelionSol"><img src="slike/AurelionSol.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Azir' id="Azir"/><label for="Azir"><img src="slike/Azir.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Bard' id="Bard"/><label for="Bard"><img src="slike/Bard.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Blitzcrank' id="Blitzcrank"/><label for="Blitzcrank"><img src="slike/Blitzcrank.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Brand' id="Brand"/><label for="Brand"><img src="slike/Brand.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Braum' id="Braum"/><label for="Braum"><img src="slike/Braum.png" class="heroj"></label>
								
								<input type='checkbox' name='slike' value='Caitlyn' id="Caitlyn"/><label for="Caitlyn"><img src="slike/Caitlyn.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Camille' id="Camille"/><label for="Camille"><img src="slike/Camille.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Cassiopeia' id="Cassiopeia"/><label for="Cassiopeia"><img src="slike/Cassiopeia.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Chogath' id="Chogath"/><label for="Chogath"><img src="slike/Chogath.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Corki' id="Corki"/><label for="Corki"><img src="slike/Corki.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Darius' id="Darius"/><label for="Darius"><img src="slike/Darius.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Diana' id="Diana"/><label for="Diana"><img src="slike/Diana.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Draven' id="Draven"/><label for="Draven"><img src="slike/Draven.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='DrMundo' id="DrMundo"/><label for="DrMundo"><img src="slike/DrMundo.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Ekko' id="Ekko"/><label for="Ekko"><img src="slike/Ekko.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Elise' id="Elise"/><label for="Elise"><img src="slike/Elise.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Evelynn' id="Evelynn"/><label for="Evelynn"><img src="slike/Evelynn.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Ezreal' id="Ezreal"/><label for="Ezreal"><img src="slike/Ezreal.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Fiddlesticks' id="Fiddlesticks"/><label for="Fiddlesticks"><img src="slike/Fiddlesticks.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Fiora' id="Fiora"/><label for="Fiora"><img src="slike/Fiora.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Fizz' id="Fizz"/><label for="Fizz"><img src="slike/Fizz.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Galio' id="Galio"/><label for="Galio"><img src="slike/Galio.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Gangplank' id="Gangplank"/><label for="Gangplank"><img src="slike/Gangplank.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Garen' id="Garen"/><label for="Garen"><img src="slike/Garen.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Gnar' id="Gnar"/><label for="Gnar"><img src="slike/Gnar.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Gragas' id="Gragas"/><label for="Gragas"><img src="slike/Gragas.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Graves' id="Graves"/><label for="Graves"><img src="slike/Graves.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Hecarim' id="Hecarim"/><label for="Hecarim"><img src="slike/Hecarim.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Heimerdinger' id="Heimerdinger"/><label for="Heimerdinger"><img src="slike/Heimerdinger.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Illaoi' id="Illaoi"/><label for="Illaoi"><img src="slike/Illaoi.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Irelia' id="Irelia"/><label for="Irelia"><img src="slike/Irelia.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Ivern' id="Ivern"/><label for="Ivern"><img src="slike/Ivern.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Janna' id="Janna"/><label for="Janna"><img src="slike/Janna.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='JarvanIV' id="JarvanIV"/><label for="JarvanIV"><img src="slike/JarvanIV.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Jax' id="Jax"/><label for="Jax"><img src="slike/Jax.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Jayce' id="Jayce"/><label for="Jayce"><img src="slike/Jayce.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Jhin' id="Jhin"/><label for="Jhin"><img src="slike/Jhin.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Jinx' id="Jinx"/><label for="Jinx"><img src="slike/Jinx.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Kaisa' id="Kaisa"/><label for="Kaisa"><img src="slike/Kaisa.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Kalista' id="Kalista"/><label for="Kalista"><img src="slike/Kalista.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Karma' id="Karma"/><label for="Karma"><img src="slike/Karma.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Karthus' id="Karthus"/><label for="Karthus"><img src="slike/Karthus.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Kassadin' id="Kassadin"/><label for="Kassadin"><img src="slike/Kassadin.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Katarina' id="Katarina"/><label for="Katarina"><img src="slike/Katarina.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Kayle' id="Kayle"/><label for="Kayle"><img src="slike/Kayle.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Kayn' id="Kayn"/><label for="Kayn"><img src="slike/Kayn.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Kennen' id="Kennen"/><label for="Kennen"><img src="slike/Kennen.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Khazix' id="Khazix"/><label for="Khazix"><img src="slike/Khazix.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Kindred' id="Kindred"/><label for="Kindred"><img src="slike/Kindred.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Kled' id="Kled"/><label for="Kled"><img src="slike/Kled.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='KogMaw' id="KogMaw"/><label for="KogMaw"><img src="slike/KogMaw.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Leblanc' id="Leblanc"/><label for="Leblanc"><img src="slike/Leblanc.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='LeeSin' id="LeeSin"/><label for="LeeSin"><img src="slike/LeeSin.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Leona' id="Leona"/><label for="Leona"><img src="slike/Leona.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Lissandra' id="Lissandra"/><label for="Lissandra"><img src="slike/Lissandra.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Lucian' id="Lucian"/><label for="Lucian"><img src="slike/Lucian.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Lulu' id="Lulu"/><label for="Lulu"><img src="slike/Lulu.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Lux' id="Lux"/><label for="Lux"><img src="slike/Lux.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Malphite' id="Malphite"/><label for="Malphite"><img src="slike/Malphite.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Malzahar' id="Malzahar"/><label for="Malzahar"><img src="slike/Malzahar.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Maokai' id="Maokai"/><label for="Maokai"><img src="slike/Maokai.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='MasterYi' id="MasterYi"/><label for="MasterYi"><img src="slike/MasterYi.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='MissFortune' id="MissFortune"/><label for="MissFortune"><img src="slike/MissFortune.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='MonkeyKing' id="MonkeyKing"/><label for="MonkeyKing"><img src="slike/MonkeyKing.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Mordekaiser' id="Mordekaiser"/><label for="Mordekaiser"><img src="slike/Mordekaiser.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Morgana' id="Morgana"/><label for="Morgana"><img src="slike/Morgana.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Nami' id="Nami"/><label for="Nami"><img src="slike/Nami.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Nasus' id="Nasus"/><label for="Nasus"><img src="slike/Nasus.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Nautilus' id="Nautilus"/><label for="Nautilus"><img src="slike/Nautilus.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Nidalee' id="Nidalee"/><label for="Nidalee"><img src="slike/Nidalee.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Nocturne' id="Nocturne"/><label for="Nocturne"><img src="slike/Nocturne.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Nunu' id="Nunu"/><label for="Nunu"><img src="slike/Nunu.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Olaf' id="Olaf"/><label for="Olaf"><img src="slike/Olaf.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Orianna' id="Orianna"/><label for="Orianna"><img src="slike/Orianna.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Ornn' id="Ornn"/><label for="Ornn"><img src="slike/Ornn.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Pantheon' id="Pantheon"/><label for="Pantheon"><img src="slike/Pantheon.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Poppy' id="Poppy"/><label for="Poppy"><img src="slike/Poppy.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Quinn' id="Quinn"/><label for="Quinn"><img src="slike/Quinn.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Rakan' id="Rakan"/><label for="Rakan"><img src="slike/Rakan.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Rammus' id="Rammus"/><label for="Rammus"><img src="slike/Rammus.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='RekSai' id="RekSai"/><label for="RekSai"><img src="slike/RekSai.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Renekton' id="Renekton"/><label for="Renekton"><img src="slike/Renekton.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Rengar' id="Rengar"/><label for="Rengar"><img src="slike/Rengar.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Riven' id="Riven"/><label for="Riven"><img src="slike/Riven.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Rumble' id="Rumble"/><label for="Rumble"><img src="slike/Rumble.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Ryze' id="Ryze"/><label for="Ryze"><img src="slike/Ryze.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Sejuani' id="Sejuani"/><label for="Sejuani"><img src="slike/Sejuani.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Shaco' id="Shaco"/><label for="Shaco"><img src="slike/Shaco.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Shen' id="Shen"/><label for="Shen"><img src="slike/Shen.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Shyvana' id="Shyvana"/><label for="Shyvana"><img src="slike/Shyvana.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Singed' id="Singed"/><label for="Singed"><img src="slike/Singed.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Sion' id="Sion"/><label for="Sion"><img src="slike/Sion.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Sivir' id="Sivir"/><label for="Sivir"><img src="slike/Sivir.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Skarner' id="Skarner"/><label for="Skarner"><img src="slike/Skarner.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Sona' id="Sona"/><label for="Sona"><img src="slike/Sona.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Soraka' id="Soraka"/><label for="Soraka"><img src="slike/Soraka.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Swain' id="Swain"/><label for="Swain"><img src="slike/Swain.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Syndra' id="Syndra"/><label for="Syndra"><img src="slike/Syndra.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='TahmKench' id="TahmKench"/><label for="TahmKench"><img src="slike/TahmKench.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Taliyah' id="Taliyah"/><label for="Taliyah"><img src="slike/Taliyah.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Talon' id="Talon"/><label for="Talon"><img src="slike/Talon.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Taric' id="Taric"/><label for="Taric"><img src="slike/Taric.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Teemo' id="Teemo"/><label for="Teemo"><img src="slike/Teemo.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Thresh' id="Thresh"/><label for="Thresh"><img src="slike/Thresh.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Tristana' id="Tristana"/><label for="Tristana"><img src="slike/Tristana.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Trundle' id="Trundle"/><label for="Trundle"><img src="slike/Trundle.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Tryndamere' id="Tryndamere"/><label for="Tryndamere"><img src="slike/Tryndamere.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='TwistedFate' id="TwistedFate"/><label for="TwistedFate"><img src="slike/TwistedFate.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Twitch' id="Twitch"/><label for="Twitch"><img src="slike/Twitch.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Udyr' id="Udyr"/><label for="Udyr"><img src="slike/Udyr.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Urgot' id="Urgot"/><label for="Urgot"><img src="slike/Urgot.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Varus' id="Varus"/><label for="Varus"><img src="slike/Varus.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Vayne' id="Vayne"/><label for="Vayne"><img src="slike/Vayne.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Veigar' id="Veigar"/><label for="Veigar"><img src="slike/Veigar.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Velkoz' id="Velkoz"/><label for="Velkoz"><img src="slike/Velkoz.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Vi' id="Vi"/><label for="Vi"><img src="slike/Vi.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Viktor' id="Viktor"/><label for="Viktor"><img src="slike/Viktor.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Vladimir' id="Vladimir"/><label for="Vladimir"><img src="slike/Vladimir.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Volibear' id="Volibear"/><label for="Volibear"><img src="slike/Volibear.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Warwick' id="Warwick"/><label for="Warwick"><img src="slike/Warwick.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Xayah' id="Xayah"/><label for="Xayah"><img src="slike/Xayah.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Xerath' id="Xerath"/><label for="Xerath"><img src="slike/Xerath.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='XinZhao' id="XinZhao"/><label for="XinZhao"><img src="slike/XinZhao.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Yasuo' id="Yasuo"/><label for="Yasuo"><img src="slike/Yasuo.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Yorick' id="Yorick"/><label for="Yorick"><img src="slike/Yorick.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Zac' id="Zac"/><label for="Zac"><img src="slike/Zac.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Zed' id="Zed"/><label for="Zed"><img src="slike/Zed.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Ziggs' id="Ziggs"/><label for="Ziggs"><img src="slike/Ziggs.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Zilean' id="Zilean"/><label for="Zilean"><img src="slike/Zilean.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Zoe' id="Zoe"/><label for="Zoe"><img src="slike/Zoe.png" class="heroj"></label>
								<input type='checkbox' name='slike' value='Zyra' id="Zyra"/><label for="Zyra"><img src="slike/Zyra.png" class="heroj"></label>
							-->
							
					</div>

				</div>
				<div class="row">
					<div class="col-sm-12">
				<div class="form-group">
					<label style="color:#9D907D;">
						Opis:
					</label>
					<textarea name="opis" style="border:  2px solid #184157; "type="text" class="form-control"  placeholder="Šta tražiš od saigrača">@if($ad!=null) {{$ad->description}}@endif</textarea>
				</div>
</div>
</div>
<div class="row mb-3">
				<div class="col-sm-6 mt-3">
					<button type="submit"  class="buttonGrade btn-block" >Potvrdi</button>
				</div>				
				<div class="col-sm-6 mt-3" >
					<button class="buttonGrade  btn-block">Odustani</button> 
				</div>
			</div>
			</div>
				</form>
			</div>
			<div class="col-sm-1">
		</div>

</div>

@endsection