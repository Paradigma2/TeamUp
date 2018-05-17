<!doctype html>
<html>

	<head> 
		@include('_head')

	</head>
	<body>
		<div>
			<nav class="navbar navbar-expand-sm navbar-dark mt-3">
				<!-- Brand/logo -->
				<a class="navbar-brand" href="#">TeamUp!</a>

				<!-- Links -->
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="#">Lobi</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Pretraga clanaka</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Link 3</a>
					</li>
				</ul>
			</nav>
		</div>

		<div class="container">
			@yield('content')
		</div>

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	</body>
</html>