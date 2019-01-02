
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../../../favicon.ico">
		<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
		<title>Top navbar example for Bootstrap</title>

		<!-- Bootstrap core CSS -->

		<!-- Custom styles for this template -->
	</head>
				<?php 
				function activeMenu($url)
				{
						return request()->is($url) ? 'active' :'';
				} ?>
	<body>

		<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
			<a class="navbar-brand" href="#">Top navbar</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item {{  activeMenu('/') }}">
						<a class="nav-link" href="<?php echo route('inicio') ?>">inicio</a> 
					</li>

					 @if(auth()->check())
					<li class="nav-item {{  activeMenu('contactos') }} ">
						<a class="nav-link"  href="<?php echo route('mensaje.create') ?>">contactanos</a> 
					</li>
					@if(auth()->user()->hasRoles(['admin','estudiante']))
					<li class="nav-item {{  activeMenu('usuarios') }} ">
						<a class="nav-link"  href="<?php echo route('usuarios.index') ?>">Usuario</a> 
					</li>
					@endif
					 @endif
					 <li class="nav-item {{  activeMenu('mensaje') }} ">
						<a class="nav-link"  href="<?php echo route('mensaje.index') ?>">Mensajes</a> 
					</li>
				</ul>
				<ul class="navbar-nav nav-bar-right">
					 @if(auth()->check())
					<li class="nav-item {{  activeMenu('logout') }}">
						  <a class="nav-link"  href="logout">Cerrar session de {{ auth()->user()->email }}</a> 
					</li>
					 @endif
					 @if (auth()->guest())
					<li class="nav-item {{  activeMenu('login') }}">
						<a class="nav-link "  href="login">Login</a> 
					</li>
					 @endif
					 <li class="nav-item dropdown">
					 	 @if(auth()->check())
								<a class="nav-link dropdown-toggle"  id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->name }}</a>
					 @endif
								<div class="dropdown-menu" aria-labelledby="dropdown01">
									<a class="dropdown-item" href="/logout">Cerrar session</a>
								</div>
						</li>
				</ul>
				{{-- <form class="form-inline mt-2 mt-md-0">
					<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
				</form> --}}
			</div>
		</nav>

		<div class="container">
			@yield('content')
		</div>
		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="{{asset('js/app.js')}}"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	</body>
</html>
	
