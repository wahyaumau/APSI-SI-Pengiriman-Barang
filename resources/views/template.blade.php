<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ ('SI Pengiriman Barang') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">		
	{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> --}}
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/minty/bootstrap.min.css">
	@yield('stylesheets')
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			<div class="container">
				<a class="navbar-brand" href="{{ url('/') }}">
                    {{ ('PT Tirta Jaya') }}
                </a>                
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
			<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">

				<ul class="navbar-nav mr-auto">
					@auth('owner')
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
					{{-- <li class="nav-item">
						<a class="nav-link" href="{{ route('gudang.index') }}">Gudang</a>
					</li> --}}
					<li class="nav-item">
						<a class="nav-link" href="{{ route('barang.index') }}">Barang</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('pemesanan.barang.konfirmasi.pemesanan.form') }}">List Pemesanan Barang</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('laporan.penjualan.barang') }}">Laporan Penjualan Barang</a>
					</li>					
					<li class="nav-item">
						<a class="nav-link" href="{{ route('pengambilan.barang.list') }}">Pesan Barang ke Supplier</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('pendataan.barang') }}">Pendataan Barang</a>
					</li>					
					<li class="nav-item">
						<a class="nav-link" href="{{ route('owner.logout') }}">Owner Logout<span class="sr-only"></span></a>
					</li>
					@endauth					

					@auth('web')
					<li class="nav-item">
						<a class="nav-link" href="{{ route('pemesanan.barang') }}">Pesan Barang<span class="sr-only"></span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('pemesanan.barang.list.pemesanan') }}">Lihat Pesanan Saya<span class="sr-only"></span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('owner.logout') }}">Pelanggan Logout<span class="sr-only"></span></a>
					</li>
					@endauth

					

					@auth('supplier')
					<li class="nav-item">
						<a class="nav-link" href="{{ route('pengambilan.barang.list.konfirmasi') }}">Konfirmasi Pengambilan Barang<span class="sr-only"></span></a>

					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('supplier.logout') }}">Supplier Logout<span class="sr-only"></span></a>
					</li>
					@endauth
				</ul>
				<ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->nama }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
			</div>
		</div>
		</nav>
		<main class="py-4">
            @yield('content')
        </main>
	</body>
	{{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> --}}
	@yield('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
</html>