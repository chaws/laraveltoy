<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('page-style')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Entrar</a></li>
                            <li><a href="{{ route('register') }}">Registrar</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/property') }}">Imóveis</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Sair
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>
	<footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
						<div class="panel-body">
                            <div class="col-md-8">
                                <span id="clock">00:00:00</span> | <span>São Paulo</span> - <span id="temp">0</span>º
                            </div>
                            <div class="col-md-offset-4">
                                <!-- Branding Image -->
                                <a class="navbar-brand" href="{{ url('/') }}">
                                    {{ config('app.name', 'Laravel') }}
                                </a>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    
    @yield('page-js')

    <!-- Mover para app.js quando sobrar tempo -->
    <script type="text/javascript">
        // Mantem numeros com 2 digitos
        function ct(i) { return (i < 10) ? '0' + i : i; }

        // Inicia o relogio ao carregar a funcao
		+function startClock() {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            $('#clock').html(ct(h) + ":" + ct(m) + ":" + ct(s));
            setTimeout(startClock, 500);
         }();

        // Atualiza a temperatura atual de SP uma vez por minuto (free plan)
        +function startWeather() {
            var aMinute = 60000;
            $('#temp').load("{{ config('app.url') }}/weather");
            setTimeout(startWeather, aMinute);
        }();
    </script>
</body>
</html>
