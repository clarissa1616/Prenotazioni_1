{{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
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
                    
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
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
</nav> --}}

<div class="fixed-top">
    <nav class="navbar navbar-dark bg-transparent fixed-top">
        <button class="navbar-toggler" style="border:transparent" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent"
            aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span><i class="fas fa-bars fa-1x battleship-grey"></i></span>
        </button>
    </nav>
    <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-collapse p-4 vh-100 text-center text-navbar overflow-auto">
            <div class="container-fluid mt-5 li-style">
                @if (Auth::check())
                    <div class="absolute-top-right mt-2 mr-4">
                        <a href="{{route('admin.home')}}" class="mr-3">Admin</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                            <i class="fas fa-sign-out-alt ml-2"></i>
                        </a>
                    </div>
                @endif
                <div class="row">
                    <div class="col-12">
                        <a href="{{ Route('home') }}">
                            <i class="fas fa-campground fa-3x"></i>
                        </a>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-4">
                        <ul class="list-unstyled my-5 ">
                            <li class="my-3"><a href="{{ Route('rooms.index') }}">CAMERE</a></li>
                            <li class="my-3"><a href=""></a>BAR & RISTORANTI</li>
                            <li class="my-3"><a href=""></a>ALTRI SERVIZI</li>
                            <li class="my-3"><a href=""></a>BOTTEGA EGNAZIA</li>
                            <li class="my-3"><a href=""></a>ATTIVITA'</li>
                        </ul>
                    </div>

                    <div class="col-12 col-md-4">
                        <ul class="list-unstyled my-5">
                            <li class="my-3"><a href=""></a> PRENOTA </li>
                            <li class="my-3"><a href=""></a>TRAVEL TRADE</li>
                            <li class="my-3"><a href=""></a>CASA EGNAZIA</li>
                            <li class="my-3"><a href=""></a>PUGLIA</li>
                            <li class="my-3"><a href=""></a>COVID-19</li>
                        </ul>
                    </div>

                    <div class="col-12 col-md-4">
                        <ul class="list-unstyled my-5">
                            <li class="my-3"><a href=""></a> PRESS AREA</li>
                            <li class="my-3"><a href=""></a>PREMI</li>
                            <li class="my-3"><a href=""></a>LAVORA CON NOI</li>
                            <li class="my-3"><a href=""></a>CONTATTI</li>
                            <li class="my-3"><a href=""></a>MAPPA</li>
                        </ul>
                    </div>



                </div>
            </div>
            
        </div>
    </div>
</div>
