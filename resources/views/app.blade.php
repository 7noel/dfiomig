<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ config('app.name', 'Laravel') }}</title>
	{!! Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css') !!}
	{!! Html::style('css/autocomplete.css') !!}
	{!! Html::style('css/others.css') !!}
	{!! Html::style('//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css') !!}

	<!-- Fonts -->
	{!! Html::style('//fonts.googleapis.com/css?family=Roboto:400,300') !!}

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon" />

</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

				@if( !Auth::guest() )

				<ul class="nav navbar-nav">
					@inject('menu','App\Http\Controllers\MenuController')
					@foreach($menu->links() as $modulo => $links)
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ $modulo }}<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
							@foreach($links as $link)
								@if(isset($link['div']))
								<li class="divider"></li>
								@endif
								@if(isset($link['route']))
								<li><a href="{{ route( $link['route'] ) }}">{{ $link['name'] }}</a></li>
								@else
								<li><a href="{{ $link['url'] }}">{{ $link['name'] }}</a></li>
								@endif
							@endforeach
							</ul>
						</li>
					@endforeach

				</ul>

				@endif

				<ul class="nav navbar-nav navbar-right">

				@if (Auth::guest())

					<li><a href="{{ url('/login') }}">Login</a></li>

					@if(1==0)

					<li><a href="{{ url('/register') }}">Register</a></li>
					
					@endif

				@else

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ url('/guard/change_password') }}">Cambiar Contraseña</a></li>
							<li class="divider"></li>
							<li>
								<a href="{{ url('/logout') }}"
									onclick="event.preventDefault();
									document.getElementById('logout-form').submit();">
									Salir
								</a>

								<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
							</li>
						</ul>
					</li>

				@endif

				</ul>
			</div>
		</div>
	</nav>

	@yield('content')
	<!-- Scripts -->
	{!! Html::script('//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js') !!}
	{!! Html::script('//code.jquery.com/ui/1.11.4/jquery-ui.js') !!}
	{!! Html::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js') !!}
	{!! Html::script('js/admin.js') !!}
	{!! Html::script('js/delete.js') !!}

	@yield('scripts')
</body>
</html>
