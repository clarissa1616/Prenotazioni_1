{{-- <div class="row fixed-left" id="admin-navbar">
    <div class="col-12 d-md-none bg-danger text-right">
        <button type="button" id="admin-nav-collapse" class="btn btn-outline-none my-auto mr-2">
            <h2 class="my-auto"><i class="fas fa-bars" id="admin-nav-icon"></i></h2>
        </button>
    </div>
    <div class="col-12 d-none d-md-block bg-info" id="admin-nav-menu">
        NAV_MENU
    </div>
</div> --}}

<nav class="navbar navbar-expand-md navbar-dark bg-footer floral-white">
    <a class="navbar-brand ml-5" href="{{route('home')}}">HOME</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#admin-nav-collapse"
        aria-controls="admin-nav-collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="admin-nav-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('admin.home')}}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Prenotazioni</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.rooms')}}">Camere</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.plans')}}">Convenzioni</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto mr-5">
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.users')}}">Utenti</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">{{Auth::user()->name}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt floral-white"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</nav>
