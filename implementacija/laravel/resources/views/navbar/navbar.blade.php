<!--autor: Jana Kragovic 23/2015-->
<style>
	.bla{

  background-color: Transparent;
  border: none;
  outline: none;
  color: white;
  width:auto;
  font-size: 16px;
  opacity: 0.6;
  transition: 0.3s;
  display: inline-block;
  text-decoration: none;
  font-family : inherit;
  cursor: pointer;
	}
	.bla:hover {
		color:#184157;
		opacity: 1}
	
</style>
		<div  >
			<nav  class="navbar navbar-expand-sm navbar-dark mt-3">
			
					
				<!-- Brand/logo -->
				<a class="navbar-brand" href="#">TeamUp!</a>

				 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
   					 <span class="navbar-toggler-icon"></span>
  				</button>
				<!-- Linkovi levo-->
				<div class="collapse navbar-collapse" id="collapsibleNavbar">
				<ul class="navbar-nav">
					<li class="nav-item">
						@yield('levo1')
						@yield('link1')
						@yield('desno1')
					</li>
					<li class="nav-item">
						@yield('levo2')
						@yield('link2')
						@yield('desno2')
					</li>
					<li class="nav-item">
						@yield('levo3')
						@yield('link3')
						@yield('desno3')
					</li>

				</ul>

				<!-- linkovi desno-->

				<ul  class="navbar-nav   ml-auto" style="margin-right: 80px;"	>
					
					<li class=" nav-item">	
							@yield('levo5')
						@yield('link5')
							@yield('desno5')
					</li>
					<li   class=" nav-item">
							@yield('levo4')
							<a class="bla"




							href="inbox">
								@yield('link4')
							</a>
							@yield('desno4')
					</li>
				</ul>
				</div>

			</nav>
		</div>
