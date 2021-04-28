<x-app>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-6 p-0 m-0 vh50 overview filter">
                <a href="{{ Route('room.overview')}}">
                    <div class="vh50">
                        <h2 class="position-center floral-white font-weight-bold">{{ __('Overview del Borgo') }}</h2>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6 p-0 m-0 vh50 lacorte filter">
                <a href="{{ Route('room.lacorte')}}">
                    <div class="vh50">
                        <h2 class="position-center floral-white font-weight-bold">{{ __('La Corte') }}</h2>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6 p-0 m-0 vh50 ilborgo filter">
                <a href="{{ Route('room.ilborgo')}}">
                    <div class="vh50">
                        <h2 class="position-center floral-white font-weight-bold">{{ __('Il Borgo') }}</h2>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6 p-0 m-0 vh50 lavilla filter">
                <a href="{{ Route('room.lavilla')}}">
                    <div class="vh50">
                        <h2 class="position-center floral-white font-weight-bold">{{ __('La Villa') }}</h2>
                    </div>
                </a>
            </div>
        </div>
    </div>

</x-app>