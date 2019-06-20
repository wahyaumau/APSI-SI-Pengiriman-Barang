<!DOCTYPE html>
<html>
	<head>
		<title>SI Pengiriman Barang</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/minty/bootstrap.min.css">
		@yield('stylesheets')
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			<a class="navbar-brand" href="/">Home</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarColor01">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="{{ route('jenis_kendaraan.index') }}">Jenis Kendaraan<span class="sr-only"></span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('armada.index') }}">Armada</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('jenis_supir.index') }}">Jenis Supir</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('supir.index') }}">Supir</a>
					</li>					
				</ul>
				<ul>					
				</ul>
			</div>
		</nav>
		<div class="container-fluid">
			@yield('content')				
		</div>
	</body>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	@yield('scripts')
</html>