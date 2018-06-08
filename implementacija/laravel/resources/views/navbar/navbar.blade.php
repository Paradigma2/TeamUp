<!--autor: Jana Kragovic 23/2015-->
		<div>
			<nav class="navbar navbar-expand-sm navbar-dark mt-3">
			
					
				<!-- Brand/logo -->
				<a class="navbar-brand" href="#">TeamUp!</a>

				 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
   					 <span class="navbar-toggler-icon"></span>
  				</button>
				<!-- Linkovi levo-->
				<div class="collapse navbar-collapse" id="collapsibleNavbar">
				<ul class="navbar-nav">
					<li class="nav-item">
						@yield('link1')
					</li>
					<li class="nav-item">
						@yield('link2')
					</li>
					<li class="nav-item">
						@yield('link3')
					</li>

				</ul>

				<!-- linkovi desno-->

				<ul class="navbar-nav   ml-auto" style="margin-right: 80px;"	>
					<li class=" nav-item">
						@yield('link4')
					</li>
					<li class=" nav-item">	
						@yield('link5')
					</li>
				</ul>
				</div>

			</nav>
		</div>
