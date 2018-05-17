@extends('main')

@section('navbar')

	@include('navbar/navbar')

@endsection

@section('content')
	<div class="row">
		<div class="col-sm-8 mt-3 tab-content">
			<div class="tab-pane active" id="page1">
				<div class="row">
					<div class="col-sm-12">
						<div class="card mt-2">
							<div class="card-body">
								<h4 class="card-title" >
									<label>Naslov 1</label>
								</h4>
								<p class="card-text">Content 1</p>


								<p class="card-text collapse" id="collapseArticle1">Expand content 1</p>
								<a data-toggle="collapse" href="#collapseArticle1" onclick="proba('klik1')" >
									<i class="material-icons" > <label style="cursor:pointer;" id="klik1">expand_more</label></i>
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12 mt-2">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title" >
									<label>Naslov 2</label>
								</h4>
								<p class="card-text">Content 2</p>


								<p class="card-text collapse" id="collapseArticle2">Expand content 2</p>
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
						<div class="card mt-2">
							<div class="card-body">
								<h4 class="card-title" >
									<label>Naslov 1</label>
								</h4>
								<p class="card-text">Content 4</p>


								<p class="card-text collapse" id="collapseArticle4">Expand content 4</p>
								<a data-toggle="collapse" href="#collapseArticle4" onclick="proba('klik4')" >
									<i class="material-icons" > <label style="cursor:pointer;" id="klik4">expand_more</label></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			
					<ul class="pagination nav nav-pills mt-3">
						<li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
						<li class="page-item"><a class="page-link" data-toggle="pill" href="#page1">1</a></li>
						<li class="page-item"><a class="page-link"  data-toggle="pill" href="#page2">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item"><a class="page-link" href="#">Next</a></li>
					</ul>
				</div>
				
		</div>
		<div class="col-sm-4">
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