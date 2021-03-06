<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js',true) }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    @yield('styles')

    <!-- Styles -->
    <link href="{{ asset('css/app.css', true) }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('favico/fav.png', true) }}">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    
                                </li>
                                
                            @endif
                            {{--
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                            --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                </div>
                                
                            </li>
                        @endguest
                        
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container empujar">
            <div class="row">
                <div class="py-4 col-12">
                    @yield('botones')
                </div>
                
                <main class="py-4 col-12">
                    @yield('content')
                </main>
            </div>
        </div>
        
    </div>
    <div class="footer">
        <footer class="contenedor">
            <div class="footer_barra">
                    <h2 class="logro__nombre no-margin centrar-texto ">Disripci??n<span class="logo__bold">MX</span></h1>
                <nav class="navegacion">
                    <a href="{{route('nosotros.index')}}" class="navegacion__enlace">Nosotros</a>
                    <a href="{{route('obras.index')}}" class="navegacion__enlace">Obras</a>
                    <a href="{{route('blogs.index')}}" class="navegacion__enlace">Blogs</a>
                    <a href="{{route("contactanos.index")}}" class="navegacion__enlace">Contacto</a>
                    <a href="{{route("recetas.index")}}" class="navegacion__enlace">Administrador</a>
                </nav>
            </div>

        </footer>

        @yield('scripts')
</body>
</html>
