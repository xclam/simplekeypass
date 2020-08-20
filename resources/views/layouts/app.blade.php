<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Password Vault</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
@auth
	<div class="container-fluid">
		<div class="row flex-xl-nowrap">
			
			<div class="col-md-3 col-xl-2 bd-sidebar">
				
				<nav class="collapse bd-links">
					
					<a class="navbar-brand" href="{{ url('/') }}">Password Vault</a>
						
					<div class="bd-toc-item">
						<a class="bd-toc-link" href="{{ url('/') }}">{{__('Passwords')}}</a>
					</div>
					
					<div class="bd-toc-item active">
						<a class="bd-toc-link" href="#">{{__('Settings')}}</a>
						<ul class="nav bd-sidenav">
							<li><a href="{{ route('environments') }}">{{__('Environments')}}</a></li>
							<li><a href="{{ route('groups') }}">{{__('Groups')}}</a></li>
							<li><a href="{{ route('users') }}">{{__('Users')}}</a></li>
						</ul>
					</div>

					
					<div class="bd-toc-item">
						<a class="bd-toc-link" href="{{ url('/') }}">{{ Auth::user()->name }}</a>
					</div>
					
				</nav>
				
			</div>
			
			<main class="col-md-9 col-xl-10 py-md-3 pl-md-5 bd-content">
				@yield('content')
			</main>
			
		</div>
    </div>
@else
	<div class="container">
		<main class="">
				@yield('content')
			</main>
	</div>
@endauth
</body>
</html>
