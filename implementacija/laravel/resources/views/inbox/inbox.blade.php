@extends('main')
@section('styles')
	<link rel="icon" href="slike/icon.png" type="image/png">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@endsection
@section('content')
<script>

	</script>
	<div class="container-fluid" style="min-height: 100%;">
		<div class="row mt-3">
			<div class="col-sm-3"  style=" background-color: rgba(5,5,5,0.4); width: 100%; min-width: 250px;">
				<div  class="collapse" id="collapseInbox" style="  overflow-x: hidden; overflow-y:scroll; height:560px; width: 100%;"	 >
					<button id="collapseButton"  class="btn-block btn buttonGrade mt-2 mb-2 " style="border-radius: 5px;"type="button" data-toggle="collapse" data-target="#collapseInbox" class="visible-xs visible-sm collapsed">Prikazi ćaskanja</button>
  					@isset($res)
					@forelse($res['conversations'] as $item)
					<form class="m-5" name="selectMessageForm" action="inbox" method="GET">
					<!-- <input type="hidden" name="_token" value="{{csrf_token()}}">					 -->
					<a href="/inbox?conversation={{$item->id}}">
					<div  class="message row">	
						<div class="col-sm-12 mb-2">
							<img src="{{$item->icon}}" width="30px">
							<label style="color: white;">
								{{$item->username}}
							</label>
						</div>
						<div class="col-sm-12">
						<textarea readonly style="overflow:hidden" class="form-control " style="min-width: 100%">{{$item->lastMsg}}</textarea>
						</div>
					</div>
					</a>
					</form>
					@empty
					<div  class=" message row ">
							<div class="col-sm-12 mb-2">
								<label style="color: white;">
									Ni sa kim niste razgovarali
								</label>
							</div>
					</div>
					@endforelse
					@endisset
				</div>
			</div>


			<div class="col-sm-9  " style="background-color: rgba(5,5,5,0.4); width: 100%;">
				<div class="row " >
					<div id="messages" style="  overflow-x: hidden; overflow-y:scroll; height:460px; width: 100%;"	>
					@isset($res)
					@forelse($res['messages'] as $item)
						@if ($item->mine)
						<div  class="  col-sm-6 ml-auto mt-3" style="padding:10px;  background-color: rgba(5,5,10,0.8); border-radius: 15px;">
						@else
						<div  class="  col-sm-6  mt-3" style="padding:10px;  background-color: rgba(5,10,5,0.8);  border-radius: 15px;">
						@endif
							<div class="col-sm-12 mb-2">
								<img src="{{$item->icon}}" width="30px">
								<label style="color: white;">
									{{$item->username}}
								</label>
							</div>
							<div class="col-sm-12" >
								<label style="color:white;">{{$item->content}}</label>
							</div>
						</div>

					@empty

					@endforelse
					@endisset

					</div>
					<div class="mt-2" style="width: 100%;">
						<form class="m-5" name="postMessageForm" action="sendMessage" method="POST">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<textarea class="form-control"  placeholder="Napisite poruku..." cols="115" name="msgToSend" id="msgToSend"></textarea>

						<input type="hidden" name="conversation" value={{$res['focus']}}>	

						<button class="btn-block mt-2 buttonGrade" >
							Posalji
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
	var objDiv = document.getElementById("messages");
objDiv.scrollTop = objDiv.scrollHeight;
		
	</script>
@endsection