		<div>
			<nav class="navbar navbar-expand-sm navbar-dark mt-3">
				<!-- Brand/logo -->
				<a class="navbar-brand" href="#">TeamUp!</a>

				<!-- Linkovi levo-->
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

				<ul class="navbar-nav">
					<li class="nav-item">
						@yield('link4')
					</li>
					<li class="nav-item">
						@yield('link5')
					</li>
				</ul>

			</nav>
		</div>
