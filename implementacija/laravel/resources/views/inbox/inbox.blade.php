<!--autori: Jana Kragovic 23/2015, Stevan Tulovic 45/2015-->
@extends('main')
@section('styles')
	<link rel="icon" href="slike/icon.png" type="image/png">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{ URL::asset('css/styleprofile.css') }}">	

@endsection
@section('content')
@if(Session::get('noConversation')!=null)
	<div class="alert alert-primary alert-dismissible fade show" role="alert">
 		<strong style="color:black;">{{Session::get('noConversation')}}</strong> 
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    		<span aria-hidden="true">&times;</span>
  		</button>
	</div>
@endif
<script type="text/javascript">
	public function resizeFun() {
   		document.getElementById("collapseInbox").setAttribute("style","overflow-x: hidden; overflow-y:scroll; width: 100%; height: " + 100 + "px;");
   		document.getElementById("messages").setAttribute("style","overflow-x: hidden; overflow-y:scroll; width: 100%; height: " + 0.7*screen.availHeight + "px;");
   		document.getElementById("msgSendDiv").setAttribute("style","width: 100%; margin-top: " + 0.02*screen.availHeight + "px;");
   	}
</script>
	<div class="container-fluid" style="min-height: 100%;">
		<div class="row mt-3">
			<div class="col-md-3"  style="background-color: rgba(5,5,5,0.4); width: 100%; padding: 0em">
				<button id="collapseButton"  class="btn-block btn buttonGrade mt-2 mb-2 " style="border-radius: 5px;" type="button" data-toggle="collapse" data-target="#collapseInbox" class="visible-xs visible-sm collapsed">Prikazi ćaskanja</button>
				<div  class="collapse" id="collapseInbox" onresize="resizeFun()">
  					@isset($res)
					@forelse($res['conversations'] as $item)
					<form name="selectMessageForm" action="inbox" method="GET">
					<a class="clearFormat" href="/inbox?conversation={{$item->id}}">
					@if($item->read == 0)
						<div  class="message unread row" style="margin: 30px; min-width: 150px;">
					@else
						<div  class="message read row" style="margin: 30px; min-width: 150px;">
					@endif
					{{-- <div  class="message row" style="margin: 30px; min-width: 150px;">	 --}}
						<div class="col-sm-12 mb-2">
							<img src="{{$item->icon}}" width="30px">
							<label style=" color: white;">
								{{$item->username}}
							</label>
						</div>
						<div class="col-sm-12">
						<div style="color:white;word-break: break-all;" >{{$item->lastMsg}}</div>
						</div>
					</div>
					</a>
					</form>
					@empty
					<div  class=" message row ">
						<div class="col-sm-12 mb-2">
							<label style=" white-space: pre-wrap; color: white;">
								Ni sa kim niste razgovarali
							</label>
						</div>
					</div>
					@endforelse
					@endisset
				</div>
			</div>

			<div class="col-md-9  " style="background-color: rgba(5,5,5,0.4); width: 100%;">
				<div class="row " >
					<div id="messages">
					@isset($res)
					@forelse($res['messages'] as $item)
						@if ($item->mine)
						<div  class="  col-sm-6 ml-auto mt-3" style="padding:10px; margin: 10px; background-color: rgba(5,5,10,0.8); border-radius: 15px;">
						@else
						<div  class="  col-sm-6  mt-3" style="padding:10px; margin: 10px; background-color: rgba(5,10,5,0.8);  border-radius: 15px;">
						@endif
							<div class="col-sm-12 mb-2">
								<img src="{{$item->icon}}" width="30px">
								<label style="color:
								 white;">
									{{$item->username}}
								</label>
							</div>
							<div class="col-sm-12" >
								<!--<label style="white-space: pre-wrap; color:white;">-->

							<div style=""><div style=" color:white;		word-break: break-all;">{{$item->content}}</div></div>

								<!--</label>-->
							</div>
						</div>

					@empty
					@endforelse
					@endisset

					</div>
					<div id="msgSendDiv" style="width: 100%;">
						<form name="postMessageForm" action="sendMessage" method="POST">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<textarea class="form-control"  placeholder="Napisite poruku..." cols="115" name="msgToSend" id="msgToSend"></textarea>

						<input type="hidden" name="conversation" value={{$res['focus']}}>	

						<button class="btn-block mt-2 buttonGrade">
							Posalji
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>

<script>
   	document.getElementById("collapseInbox").setAttribute("style","overflow-x: hidden; overflow-y:scroll; width: 100%; height: " + 0.77*screen.availHeight + "px;");
   	document.getElementById("messages").setAttribute("style","overflow-x: hidden; overflow-y:scroll; width: 100%; height: " + 0.61*screen.availHeight + "px;");
   	var objDiv = document.getElementById("messages");
	objDiv.scrollTop = objDiv.scrollHeight;
   	document.getElementById("msgSendDiv").setAttribute("style","width: 100%; margin-top: " + 0.02*screen.availHeight + "px;");

   	var scrolled = false;
	function updateScroll(){
    	if(!scrolled){
        	var element = document.getElementById("yourDivID");
        	element.scrollTop = element.scrollHeight;
    	}
	}

$("#yourDivID").on('scroll', function(){
    scrolled=true;
});
</script>
@endsection